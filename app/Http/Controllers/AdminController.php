<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // ==========================================
    // CRUD BERITA
    // ==========================================

    public function beritaIndex()
    {
        $berita = Berita::latest('id')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function beritaCreate()
    {
        return view('admin.berita.create');
    }

    public function beritaStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'penulis' => 'nullable|string|max:100',
            'ringkasan' => 'nullable|string',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['is_published'] = $request->has('is_published') ? true : false;
        
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
            $data['gambar'] = $path;
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function beritaEdit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function beritaUpdate(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'penulis' => 'nullable|string|max:100',
            'ringkasan' => 'nullable|string',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['is_published'] = $request->has('is_published') ? true : false;

        // Auto generete slug ulang jika judul berubah (opsional, tapi dibiarkan sama sementara, atau di update)
        $data['slug'] = Str::slug($request->judul) . '-' . now()->format('YmdHis');

        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $path = $request->file('gambar')->store('berita', 'public');
            $data['gambar'] = $path;
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function beritaDestroy(Berita $berita)
    {
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }

    // ==========================================
    // CRUD GALERI
    // ==========================================

    public function galeriIndex()
    {
        $galeris = Galeri::latest('id')->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function galeriCreate()
    {
        return view('admin.galeri.create');
    }

    public function galeriStore(Request $request)
    {
        $request->validate([
            'entitas'     => 'required|in:pesantren,madrasah',
            'kategori'    => 'required|in:potret,prestasi',
            'judul_gambar'=> 'nullable|string|max:255',
            'gambar'      => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $path = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'entitas'      => $request->entitas,
            'kategori'     => $request->kategori,
            'judul_gambar' => $request->judul_gambar,
            'file_path'    => $path,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan ke galeri.');
    }

    public function galeriEdit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function galeriUpdate(Request $request, Galeri $galeri)
    {
        $request->validate([
            'entitas'     => 'required|in:pesantren,madrasah',
            'kategori'    => 'required|in:potret,prestasi',
            'judul_gambar'=> 'nullable|string|max:255',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $data = [
            'entitas'      => $request->entitas,
            'kategori'     => $request->kategori,
            'judul_gambar' => $request->judul_gambar,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if (Storage::disk('public')->exists($galeri->file_path)) {
                Storage::disk('public')->delete($galeri->file_path);
            }
            $data['file_path'] = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function galeriDestroy(Galeri $galeri)
    {
        if (Storage::disk('public')->exists($galeri->file_path)) {
            Storage::disk('public')->delete($galeri->file_path);
        }
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}

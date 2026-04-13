<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index(Request $request)
    {
        $query = Fasilitas::latest();

        if ($request->filled('entitas')) {
            $query->where('entitas', $request->entitas);
        }

        $fasilitas = $query->paginate(12)->withQueryString();

        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'entitas'       => 'required|in:pesantren,madrasah',
            'nama_fasilitas'=> 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
        ], [
            'entitas.required'        => 'Pilih entitas fasilitas.',
            'nama_fasilitas.required' => 'Nama fasilitas wajib diisi.',
            'gambar.image'            => 'File harus berupa gambar.',
            'gambar.max'              => 'Ukuran gambar maksimal 3MB.',
        ]);

        $data = $request->only(['entitas', 'nama_fasilitas', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('fasilitas', 'public');
        }

        Fasilitas::create($data);

        return redirect()
            ->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas "' . $request->nama_fasilitas . '" berhasil ditambahkan.');
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $request->validate([
            'entitas'       => 'required|in:pesantren,madrasah',
            'nama_fasilitas'=> 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
        ], [
            'entitas.required'        => 'Pilih entitas fasilitas.',
            'nama_fasilitas.required' => 'Nama fasilitas wajib diisi.',
            'gambar.image'            => 'File harus berupa gambar.',
            'gambar.max'              => 'Ukuran gambar maksimal 3MB.',
        ]);

        $data = $request->only(['entitas', 'nama_fasilitas', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($fasilitas->gambar && Storage::disk('public')->exists($fasilitas->gambar)) {
                Storage::disk('public')->delete($fasilitas->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('fasilitas', 'public');
        }

        $fasilitas->update($data);

        return redirect()
            ->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas "' . $fasilitas->nama_fasilitas . '" berhasil diperbarui.');
    }

    public function destroy(Fasilitas $fasilitas)
    {
        if ($fasilitas->gambar && Storage::disk('public')->exists($fasilitas->gambar)) {
            Storage::disk('public')->delete($fasilitas->gambar);
        }

        $nama = $fasilitas->nama_fasilitas;
        $fasilitas->delete();

        return redirect()
            ->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas "' . $nama . '" berhasil dihapus.');
    }
}

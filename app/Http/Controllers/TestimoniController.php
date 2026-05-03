<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::latest()->get();
        return view('admin.testimoni.index', compact('testimonis'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'peran'        => 'nullable|string|max:255',
            'inisial'      => 'nullable|string|max:5',
            'warna_avatar' => 'nullable|string|max:255',
            'isi'          => 'required|string',
            'bintang'      => 'required|integer|min:1|max:5',
            'is_active'    => 'nullable|boolean',
        ]);

        Testimoni::create([
            'nama'         => $request->nama,
            'peran'        => $request->peran,
            'inisial'      => strtoupper($request->inisial ?: substr($request->nama, 0, 1)),
            'warna_avatar' => $request->warna_avatar ?: 'linear-gradient(135deg,#10b981,#059669)',
            'isi'          => $request->isi,
            'bintang'      => $request->bintang,
            'is_active'    => $request->has('is_active'),
        ]);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimoni $testimoni)
    {
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'peran'        => 'nullable|string|max:255',
            'inisial'      => 'nullable|string|max:5',
            'warna_avatar' => 'nullable|string|max:255',
            'isi'          => 'required|string',
            'bintang'      => 'required|integer|min:1|max:5',
            'is_active'    => 'nullable|boolean',
        ]);

        $testimoni->update([
            'nama'         => $request->nama,
            'peran'        => $request->peran,
            'inisial'      => strtoupper($request->inisial ?: substr($request->nama, 0, 1)),
            'warna_avatar' => $request->warna_avatar ?: 'linear-gradient(135deg,#10b981,#059669)',
            'isi'          => $request->isi,
            'bintang'      => $request->bintang,
            'is_active'    => $request->has('is_active'),
        ]);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();
        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}

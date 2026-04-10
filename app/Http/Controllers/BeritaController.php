<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Tampilkan daftar semua berita (dengan search & filter kategori).
     */
    public function index(Request $request)
    {
        $query = Berita::published()->orderBy('tanggal_publikasi', 'desc');

        // Filter pencarian
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($qb) use ($q) {
                $qb->where('judul', 'like', "%{$q}%")
                   ->orWhere('ringkasan', 'like', "%{$q}%");
            });
        }

        // Filter kategori
        if ($request->filled('kategori') && $request->kategori !== 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        $beritaList   = $query->paginate(9)->withQueryString();
        $beritaUtama  = Berita::published()->orderBy('tanggal_publikasi', 'desc')->first();
        $kategoriList = Berita::published()->distinct()->pluck('kategori');

        return view('pesantren.berita', compact('beritaList', 'beritaUtama', 'kategoriList'));
    }

    /**
     * Tampilkan detail satu berita berdasarkan slug.
     */
    public function show(string $slug)
    {
        $berita = Berita::published()->where('slug', $slug)->firstOrFail();

        // Berita lainnya (selain yang sedang dibaca)
        $beritaLainnya = Berita::published()
            ->where('id', '!=', $berita->id)
            ->orderBy('tanggal_publikasi', 'desc')
            ->limit(4)
            ->get();

        return view('pesantren.berita-detail', compact('berita', 'beritaLainnya'));
    }
}

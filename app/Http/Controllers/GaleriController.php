<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        // Filter by kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter by entitas
        if ($request->filled('entitas')) {
            $query->where('entitas', $request->entitas);
        }

        $galeris = $query->latest('id')->paginate(12)->withQueryString();

        $totalFoto    = Galeri::count();
        $totalPotret  = Galeri::where('kategori', 'potret')->count();
        $totalPrestasi = Galeri::where('kategori', 'prestasi')->count();

        return view('pesantren.galeri.index', compact('galeris', 'totalFoto', 'totalPotret', 'totalPrestasi'));
    }
}

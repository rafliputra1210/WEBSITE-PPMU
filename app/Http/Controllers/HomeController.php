<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Berita;
use App\Models\Banner;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $programs    = Program::latest()->take(3)->get();
        $beritas     = Berita::latest('tanggal_publikasi')->take(3)->get();
        $banners     = Banner::where('is_active', true)->orderBy('order', 'asc')->get();
        $testimonis  = Testimoni::where('is_active', true)->latest()->get();

        return view('home', compact('programs', 'beritas', 'banners', 'testimonis'));
    }
}

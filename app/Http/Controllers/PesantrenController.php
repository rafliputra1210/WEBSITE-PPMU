<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesantrenController extends Controller
{
    public function index()
    {
        $banners = \App\Models\PesantrenBanner::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('pesantren.index', compact('banners'));
    }

    // Nanti kita akan tambahkan method untuk profil, donasi, pendaftaran, dll.
}
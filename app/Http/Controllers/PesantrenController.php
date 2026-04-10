<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesantrenController extends Controller
{
    public function index()
    {
        // Di sini nantinya Anda bisa mengambil data dinamis, 
        // misalnya ringkasan donasi terkumpul atau berita pesantren terbaru.
        return view('pesantren.index');
    }

    // Nanti kita akan tambahkan method untuk profil, donasi, pendaftaran, dll.
}
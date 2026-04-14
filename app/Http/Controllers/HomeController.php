<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->take(3)->get();
        $beritas = Berita::latest('tanggal_publikasi')->take(3)->get();

        return view('home', compact('programs', 'beritas'));
    }
}

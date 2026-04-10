<?php

use Illuminate\Support\Facades\Route;

// 1. Rute Beranda (Halaman Utama)
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. Kumpulan Rute Portal Pesantren
Route::prefix('pesantren')->name('pesantren.')->group(function () {
    Route::get('/', function () { 
        return view('pesantren.index'); 
    })->name('index');
    
    Route::get('/berita', function () { 
        return view('pesantren.berita'); 
    })->name('berita');
    
    Route::get('/berita/baca', function () { 
        return view('pesantren.berita-detail'); 
    })->name('berita.detail');
    
    Route::get('/pendaftaran', function () { 
        return "Halaman Pendaftaran Pesantren Segera Hadir"; 
    })->name('pendaftaran');
    Route::get('/donasi', function () { 
        return "Halaman Donasi / Investasi Akhirat Segera Hadir"; 
    })->name('donasi');
});

// 3. Kumpulan Rute Portal Madrasah
Route::prefix('madrasah')->name('madrasah.')->group(function () {
    Route::get('/', function () { 
        return view('madrasah.index'); 
    })->name('index');
    
    // INI RUTE BARU UNTUK MENGATASI ERROR:
    Route::get('/pendaftaran', function () { 
        return "Halaman Pendaftaran Madrasah Segera Hadir"; 
    })->name('pendaftaran');
    Route::get('/fasilitas', function () { 
        return "Halaman Fasilitas Madrasah Segera Hadir"; 
    })->name('fasilitas');
});
<?php

use Illuminate\Support\Facades\Route;

// 1. Halaman Utama (Beranda)
Route::get('/', function () {
    return view('home');
})->name('home');


// 2. Kumpulan Rute Portal Pesantren
Route::prefix('pesantren')->name('pesantren.')->group(function () {
    
    // Ini adalah rute 'pesantren.index' yang dicari oleh sistem
    Route::get('/', function () { 
        return view('pesantren.index'); 
    })->name('index');

    // Rute sementara (dummy) agar tombol tidak error saat diklik
    Route::get('/profil', function () { return "Halaman Profil Pesantren Segera Hadir"; })->name('profil');
    Route::get('/fasilitas', function () { return "Halaman Fasilitas Pesantren Segera Hadir"; })->name('fasilitas');
    Route::get('/galeri', function () { return "Halaman Galeri Pesantren Segera Hadir"; })->name('galeri');
    Route::get('/berita', function () { return "Halaman Berita Pesantren Segera Hadir"; })->name('berita');
    Route::get('/investasi-akhirat', function () { return "Halaman Donasi Pesantren Segera Hadir"; })->name('donasi');
    Route::get('/pendaftaran', function () { return "Halaman Pendaftaran Pesantren Segera Hadir"; })->name('pendaftaran');
});


// 3. Kumpulan Rute Portal Madrasah
Route::prefix('madrasah')->name('madrasah.')->group(function () {
    
    // Ini adalah rute 'madrasah.index'
    Route::get('/', function () { 
        return view('madrasah.index'); 
    })->name('index');

    // Rute sementara (dummy) agar tombol tidak error saat diklik
    Route::get('/profil', function () { return "Halaman Profil Madrasah Segera Hadir"; })->name('profil');
    Route::get('/fasilitas', function () { return "Halaman Fasilitas Madrasah Segera Hadir"; })->name('fasilitas');
    Route::get('/galeri', function () { return "Halaman Galeri Madrasah Segera Hadir"; })->name('galeri');
    Route::get('/berita', function () { return "Halaman Berita Madrasah Segera Hadir"; })->name('berita');
    Route::get('/pendaftaran', function () { return "Halaman Pendaftaran Madrasah Segera Hadir"; })->name('pendaftaran');
});

// 2. Kumpulan Rute Portal Pesantren
Route::prefix('pesantren')->name('pesantren.')->group(function () {
    Route::get('/', function () { return view('pesantren.index'); })->name('index');
    
    // Rute yang masih sementara:
    Route::get('/profil', function () { return "Halaman Profil Pesantren Segera Hadir"; })->name('profil');
    Route::get('/fasilitas', function () { return "Halaman Fasilitas Pesantren Segera Hadir"; })->name('fasilitas');
    Route::get('/galeri', function () { return "Halaman Galeri Pesantren Segera Hadir"; })->name('galeri');
    
    // INI YANG DIUBAH: Mengarah ke file desain berita
    Route::get('/berita', function () { 
        return view('pesantren.berita'); 
    })->name('berita');
    
    Route::get('/investasi-akhirat', function () { return "Halaman Donasi Pesantren Segera Hadir"; })->name('donasi');
    Route::get('/pendaftaran', function () { return "Halaman Pendaftaran Pesantren Segera Hadir"; })->name('pendaftaran');
});
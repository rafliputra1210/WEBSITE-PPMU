<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\BeritaController;

// 1. Rute Beranda (Halaman Utama)
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. Kumpulan Rute Portal Pesantren
Route::prefix('pesantren')->name('pesantren.')->group(function () {
    Route::get('/', function () { 
        return view('pesantren.index'); 
    })->name('index');
    
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.detail');
    
    Route::get('/pendaftaran', function () { 
        return view('pesantren.pendaftaran'); 
    })->name('pendaftaran');

    // Donasi / Investasi Akhirat
    Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
    Route::post('/donasi', [DonasiController::class, 'store'])->name('donasi.store');
});

// 3. Kumpulan Rute Portal Madrasah
Route::prefix('madrasah')->name('madrasah.')->group(function () {
    Route::get('/', function () { 
        return view('madrasah.index'); 
    })->name('index');
    
    Route::get('/pendaftaran', function () { 
        return view('madrasah.pendaftaran'); 
    })->name('pendaftaran');
    Route::get('/fasilitas', function () { 
        return view('madrasah.fasilitas'); 
    })->name('fasilitas');
    Route::get('/profil', function () { 
        return view('madrasah.profil'); 
    })->name('profil');
});

// 4. Kumpulan Rute Admin / Pengelola
use App\Http\Controllers\AdminController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // CRUD Berita
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [AdminController::class, 'beritaIndex'])->name('index');
        Route::get('/create', [AdminController::class, 'beritaCreate'])->name('create');
        Route::post('/', [AdminController::class, 'beritaStore'])->name('store');
        Route::get('/{berita}/edit', [AdminController::class, 'beritaEdit'])->name('edit');
        Route::put('/{berita}', [AdminController::class, 'beritaUpdate'])->name('update');
        Route::delete('/{berita}', [AdminController::class, 'beritaDestroy'])->name('destroy');
    });

});
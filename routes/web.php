<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AdminController;

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

    // POST: simpan form pendaftaran pesantren
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

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

    // POST: simpan form pendaftaran madrasah
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    Route::get('/fasilitas', function () { 
        return view('madrasah.fasilitas'); 
    })->name('fasilitas');

    Route::get('/profil', function () { 
        return view('madrasah.profil'); 
    })->name('profil');
});

// 4. Rute Publik Galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// 5. Kumpulan Rute Admin / Pengelola
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

    // CRUD Galeri
    Route::prefix('galeri')->name('galeri.')->group(function () {
        Route::get('/', [AdminController::class, 'galeriIndex'])->name('index');
        Route::get('/create', [AdminController::class, 'galeriCreate'])->name('create');
        Route::post('/', [AdminController::class, 'galeriStore'])->name('store');
        Route::get('/{galeri}/edit', [AdminController::class, 'galeriEdit'])->name('edit');
        Route::put('/{galeri}', [AdminController::class, 'galeriUpdate'])->name('update');
        Route::delete('/{galeri}', [AdminController::class, 'galeriDestroy'])->name('destroy');
    });

    // Manajemen Data Pendaftaran
    Route::prefix('pendaftaran')->name('pendaftaran.')->group(function () {
        Route::get('/', [PendaftaranController::class, 'adminIndex'])->name('index');
        Route::delete('/{pendaftaran}', [PendaftaranController::class, 'adminDestroy'])->name('destroy');
    });
});
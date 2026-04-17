<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FasilitasController;

// 1. Rute Beranda
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 2. Portal Pesantren
Route::prefix('pesantren')->name('pesantren.')->group(function () {
    Route::get('/', function () {
        return view('pesantren.index');
    })->name('index');

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.detail');

    Route::get('/profil', [\App\Http\Controllers\ProfileController::class, 'showPesantren'])->name('profil');

    // Pendaftaran Santri
    Route::get('/pendaftaran', function () {
        return view('pesantren.pendaftaran');
    })->name('pendaftaran');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    // Donasi
    Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
    Route::post('/donasi', [DonasiController::class, 'store'])->name('donasi.store');
});

// 3. Portal Madrasah
Route::prefix('madrasah')->name('madrasah.')->group(function () {
    Route::get('/', function () {
        return view('madrasah.index');
    })->name('index');

    Route::get('/pendaftaran', function () {
        return view('madrasah.pendaftaran');
    })->name('pendaftaran');

    Route::get('/fasilitas', function () {
        $fasilitas = \App\Models\Fasilitas::where('entitas', 'madrasah')->latest()->get();
        return view('madrasah.fasilitas', compact('fasilitas'));
    })->name('fasilitas');

    Route::get('/profil', [\App\Http\Controllers\ProfileController::class, 'showMadrasah'])->name('profil');
});

// 4. Galeri Publik
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// 5. Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Berita
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [AdminController::class, 'beritaIndex'])->name('index');
        Route::get('/create', [AdminController::class, 'beritaCreate'])->name('create');
        Route::post('/', [AdminController::class, 'beritaStore'])->name('store');
        Route::get('/{berita}/edit', [AdminController::class, 'beritaEdit'])->name('edit');
        Route::put('/{berita}', [AdminController::class, 'beritaUpdate'])->name('update');
        Route::delete('/{berita}', [AdminController::class, 'beritaDestroy'])->name('destroy');
    });

    // Galeri
    Route::prefix('galeri')->name('galeri.')->group(function () {
        Route::get('/', [AdminController::class, 'galeriIndex'])->name('index');
        Route::get('/create', [AdminController::class, 'galeriCreate'])->name('create');
        Route::post('/', [AdminController::class, 'galeriStore'])->name('store');
        Route::get('/{galeri}/edit', [AdminController::class, 'galeriEdit'])->name('edit');
        Route::put('/{galeri}', [AdminController::class, 'galeriUpdate'])->name('update');
        Route::delete('/{galeri}', [AdminController::class, 'galeriDestroy'])->name('destroy');
    });

    // Donasi
    Route::prefix('donasi')->name('donasi.')->group(function () {
        Route::get('/', [AdminController::class, 'donasiIndex'])->name('index');
        Route::get('/create', [AdminController::class, 'donasiCreate'])->name('create');
        Route::post('/', [AdminController::class, 'donasiStore'])->name('store');
        Route::get('/{donasi}/edit', [AdminController::class, 'donasiEdit'])->name('edit');
        Route::put('/{donasi}', [AdminController::class, 'donasiUpdate'])->name('update');
        Route::delete('/{donasi}', [AdminController::class, 'donasiDestroy'])->name('destroy');
    });

    // Pendaftaran Santri
    Route::prefix('pendaftaran')->name('pendaftaran.')->group(function () {
        Route::get('/', [PendaftaranController::class, 'adminIndex'])->name('index');
        Route::delete('/{pendaftaran}', [PendaftaranController::class, 'adminDestroy'])->name('destroy');
    });

    // Fasilitas
    Route::prefix('fasilitas')->name('fasilitas.')->group(function () {
        Route::get('/', [FasilitasController::class, 'index'])->name('index');
        Route::get('/create', [FasilitasController::class, 'create'])->name('create');
        Route::post('/', [FasilitasController::class, 'store'])->name('store');
        Route::get('/{fasilitas}/edit', [FasilitasController::class, 'edit'])->name('edit');
        Route::put('/{fasilitas}', [FasilitasController::class, 'update'])->name('update');
        Route::delete('/{fasilitas}', [FasilitasController::class, 'destroy'])->name('destroy');
    });

    // Program Unggulan
    Route::prefix('program')->name('program.')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProgramController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\ProgramController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\ProgramController::class, 'store'])->name('store');
        Route::get('/{program}/edit', [\App\Http\Controllers\ProgramController::class, 'edit'])->name('edit');
        Route::put('/{program}', [\App\Http\Controllers\ProgramController::class, 'update'])->name('update');
        Route::delete('/{program}', [\App\Http\Controllers\ProgramController::class, 'destroy'])->name('destroy');
    });

    // Profile Settings (Sejarah, Visi, Misi)
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProfileController::class, 'adminIndex'])->name('index');
        Route::put('/{id}', [\App\Http\Controllers\ProfileController::class, 'update'])->name('update');
    });
});
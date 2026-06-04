<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PesantrenBannerController;
use App\Http\Controllers\MadrasahBannerController;
use App\Http\Controllers\TestimoniController;

// 1. Rute Beranda
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 2. Portal Pesantren
Route::prefix('pesantren')->name('pesantren.')->group(function () {
    Route::get('/', [\App\Http\Controllers\PesantrenController::class, 'index'])->name('index');

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.detail');

    Route::get('/profil', [\App\Http\Controllers\ProfileController::class, 'showPesantren'])->name('profil');

    // Pendaftaran Santri
    Route::get('/pendaftaran', [PendaftaranController::class, 'showForm'])->name('pendaftaran');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/{id}/pembayaran', [PendaftaranController::class, 'pembayaran'])->name('pendaftaran.pembayaran');

    // Donasi
    Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
    Route::get('/donasi/laporan-pdf', [DonasiController::class, 'previewPdf'])->name('donasi.laporan-pdf');
    Route::post('/donasi', [DonasiController::class, 'store'])->name('donasi.store');
    Route::get('/donasi/{id}/pembayaran', [DonasiController::class, 'pembayaran'])->name('donasi.pembayaran');
    Route::post('/donasi/{id}/upload-bukti', [DonasiController::class, 'uploadBukti'])->name('donasi.uploadBukti');

    Route::get('/fasilitas', function () {
        $fasilitas = \App\Models\Fasilitas::where('entitas', 'pesantren')->latest()->get();
        return view('pesantren.fasilitas', compact('fasilitas'));
    })->name('fasilitas');
});

// 3. Portal Madrasah
Route::prefix('madrasah')->name('madrasah.')->group(function () {
    Route::get('/', function () {
        $banners = \App\Models\MadrasahBanner::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('madrasah.index', compact('banners'));
    })->name('index');

    Route::get('/pendaftaran', [PendaftaranController::class, 'showFormMadrasah'])->name('pendaftaran');
    Route::post('/pendaftaran', [PendaftaranController::class, 'storeMadrasah'])->name('pendaftaran.store');
    Route::get('/pendaftaran/{id}/pembayaran', [PendaftaranController::class, 'pembayaranMadrasah'])->name('pendaftaran.pembayaran');

    Route::get('/fasilitas', function () {
        $fasilitas = \App\Models\Fasilitas::where('entitas', 'madrasah')->latest()->get();
        return view('madrasah.fasilitas', compact('fasilitas'));
    })->name('fasilitas');

    Route::get('/profil', [\App\Http\Controllers\ProfileController::class, 'showMadrasah'])->name('profil');
});

// 4. Galeri Publik
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// Temporary route to run migrations
Route::get('/run-migrate', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        $output = \Illuminate\Support\Facades\Artisan::output();
        return '<pre style="background:#111;color:#0f0;padding:20px;font-size:14px;">✅ Migrasi berhasil dijalankan!<br><br>' . htmlspecialchars($output) . '</pre>';
    } catch (\Exception $e) {
        return '<pre style="background:#111;color:red;padding:20px;">❌ Error: ' . htmlspecialchars($e->getMessage()) . '</pre>';
    }
});

// Temporary route to setup admin user
Route::get('/setup-admin', function () {
    \App\Models\User::updateOrCreate(
        ['email' => 'admin@ppmu.com'],
        [
            'name' => 'Admin PPMU',
            'password' => \Illuminate\Support\Facades\Hash::make('password123')
        ]
    );
    return 'Akun admin berhasil dibuat! Email: admin@ppmu.com | Password: password123. Silakan <a href="/login">Login di sini</a>';
});

// 5. Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 6. Admin (Dilindungi Auth Middleware)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Banner
    Route::resource('banner', BannerController::class)->except(['show']);
    Route::resource('pesantren-banner', PesantrenBannerController::class)->except(['show']);
    Route::resource('madrasah-banner', MadrasahBannerController::class)->except(['show']);

    // Testimoni
    Route::resource('testimoni', TestimoniController::class)->except(['show']);

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

    // QRIS
    Route::prefix('qris')->name('qris.')->group(function () {
        Route::get('/', [AdminController::class, 'qrisIndex'])->name('index');
        Route::get('/create', [AdminController::class, 'qrisCreate'])->name('create');
        Route::post('/', [AdminController::class, 'qrisStore'])->name('store');
        Route::delete('/{qris}', [AdminController::class, 'qrisDestroy'])->name('destroy');
        Route::put('/{qris}/toggle', [AdminController::class, 'qrisToggle'])->name('toggle');
    });

    // Donasi
    Route::prefix('donasi')->name('donasi.')->group(function () {
        Route::get('/', [AdminController::class, 'donasiIndex'])->name('index');

        // Pengaturan Halaman Donasi
        Route::get('/settings', [AdminController::class, 'donasiSettings'])->name('settings');
        Route::post('/settings', [AdminController::class, 'donasiSettingsUpdate'])->name('settings.update');

        Route::get('/create', [AdminController::class, 'donasiCreate'])->name('create');
        Route::post('/', [AdminController::class, 'donasiStore'])->name('store');
        Route::get('/{donasi}/edit', [AdminController::class, 'donasiEdit'])->name('edit');
        Route::put('/{donasi}', [AdminController::class, 'donasiUpdate'])->name('update');
        Route::delete('/{donasi}', [AdminController::class, 'donasiDestroy'])->name('destroy');
    });

    // Buku Kas CRUD
    Route::prefix('buku-kas')->name('buku-kas.')->group(function () {
        Route::get('/', [\App\Http\Controllers\BukuKasController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\BukuKasController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\BukuKasController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\BukuKasController::class, 'destroy'])->name('destroy');
        Route::post('/sync', [\App\Http\Controllers\BukuKasController::class, 'syncDonasi'])->name('sync');
    });

    // Pendaftaran Santri
    Route::prefix('pendaftaran')->name('pendaftaran.')->group(function () {
        Route::get('/', [PendaftaranController::class, 'adminIndex'])->name('index');
        Route::get('/export', [PendaftaranController::class, 'adminExport'])->name('export');
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

    // Progres Pembangunan / Hasil Progres
    Route::prefix('progres')->name('progres.')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProgresController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\ProgresController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\ProgresController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [\App\Http\Controllers\ProgresController::class, 'editById'])->name('edit');
        Route::put('/{id}', [\App\Http\Controllers\ProgresController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\ProgresController::class, 'destroy'])->name('destroy');
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

    // Pembayaran PPDB (Rekening Bank)
    Route::prefix('pembayaran-ppdb')->name('pembayaran-ppdb.')->group(function () {
        Route::get('/', [AdminController::class, 'pembayaranPpdbIndex'])->name('index');
        Route::get('/create', [AdminController::class, 'pembayaranPpdbCreate'])->name('create');
        Route::post('/', [AdminController::class, 'pembayaranPpdbStore'])->name('store');
        Route::get('/{pembayaranPpdb}/edit', [AdminController::class, 'pembayaranPpdbEdit'])->name('edit');
        Route::put('/{pembayaranPpdb}', [AdminController::class, 'pembayaranPpdbUpdate'])->name('update');
        Route::put('/{pembayaranPpdb}/toggle', [AdminController::class, 'pembayaranPpdbToggle'])->name('toggle');
        Route::delete('/{pembayaranPpdb}', [AdminController::class, 'pembayaranPpdbDestroy'])->name('destroy');
    });

    // QRIS PPDB
    Route::prefix('qris-ppdb')->name('qris-ppdb.')->group(function () {
        Route::get('/', [AdminController::class, 'qrisPpdbIndex'])->name('index');
        Route::get('/create', [AdminController::class, 'qrisPpdbCreate'])->name('create');
        Route::post('/', [AdminController::class, 'qrisPpdbStore'])->name('store');
        Route::get('/{qrisPpdb}/edit', [AdminController::class, 'qrisPpdbEdit'])->name('edit');
        Route::put('/{qrisPpdb}', [AdminController::class, 'qrisPpdbUpdate'])->name('update');
        Route::put('/{qrisPpdb}/toggle', [AdminController::class, 'qrisPpdbToggle'])->name('toggle');
        Route::delete('/{qrisPpdb}', [AdminController::class, 'qrisPpdbDestroy'])->name('destroy');
    });
});
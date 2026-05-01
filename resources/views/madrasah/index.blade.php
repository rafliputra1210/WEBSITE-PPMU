@extends('layouts.app')

@section('title', 'Portal Madrasah — Educate')

@section('content')
<style>
    /* ==================== HERO MADRASAH ==================== */
    .hero-madrasah {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(5, 150, 105, 0.1) 100%);
        padding-top: 180px;
        padding-bottom: 100px;
        position: relative;
    }
    
    .btn-madrasah {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border: none;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.25);
    }
    
    .btn-madrasah:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.35);
    }

    .card-menu {
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: var(--radius-lg);
        cursor: pointer;
    }

    .card-menu:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(16, 185, 129, 0.1) !important;
        border-color: rgba(16, 185, 129, 0.2);
    }

    .icon-wrapper {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }
</style>

<section class="hero-madrasah">
    <div class="container relative z-10">
        <div class="row align-items-center justify-content-between g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <span class="badge bg-white text-success px-4 py-2 rounded-pill shadow-sm mb-4 border border-success-subtle fw-semibold tracking-wide">
                    📘 Madrasah Berprestasi Terdepan
                </span>
                <h1 class="display-4 fw-extrabold mb-4 text-dark leading-tight" style="letter-spacing: -1px;">
                    Portal <span class="text-success" style="background: linear-gradient(135deg, #10b981, #059669); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Madrasah</span>
                </h1>
                <p class="lead text-secondary mb-5 font-light" style="font-size: 1.1rem; max-width: 500px;">
                    Pendidikan formal unggulan dengan kurikulum integrasi nasional dan nilai-nilai keislaman. Menyiapkan generasi cerdas dan berakhlak mulia.
                </p>
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                    <a href="{{ route('madrasah.pendaftaran') }}" class="btn btn-madrasah btn-lg px-5 rounded-pill fw-bold">Daftar Madrasah</a>
                </div>
            </div>
            
            <div class="col-lg-5 d-none d-lg-block text-end">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Suasana Madrasah" class="img-fluid rounded-5 shadow-lg border border-white border-4" style="object-fit: cover; height: 450px; width: 100%;">
                    
                    <div class="position-absolute top-50 start-0 translate-middle-x bg-white p-3 rounded-4 shadow-lg text-start border border-light" style="width: 200px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <i class="bi bi-award fs-5"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Akreditasi A</h5>
                                <small class="text-muted fw-medium text-xs">Sejak Tahun 2015</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white" style="margin-top: -40px; position: relative; z-index: 20; border-radius: 40px 40px 0 0;">
    <div class="container py-4">
        <div class="row g-4 justify-content-center">
            
            <!-- Menu Cards -->
            <div class="col-md-4 col-sm-6">
                <a href="{{ route('madrasah.profil') }}" class="text-decoration-none">
                    <div class="card card-menu h-100 p-4 bg-white shadow-sm text-center border-0">
                        <div class="icon-wrapper bg-success-subtle text-success mx-auto">
                            <i class="bi bi-journal-text fs-2"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Profil Madrasah</h5>
                        <p class="text-muted small font-light mb-0">Sejarah, Visi, Misi, dan profil singkat Madrasah.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4 col-sm-6">
                <a href="{{ route('madrasah.fasilitas') }}" class="text-decoration-none">
                    <div class="card card-menu h-100 p-4 bg-white shadow-sm text-center border-0">
                        <div class="icon-wrapper bg-info-subtle text-info mx-auto">
                            <i class="bi bi-building-check fs-2"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Fasilitas Lengkap</h5>
                        <p class="text-muted small font-light mb-0">Informasi laboratorium, perpustakaan, dan area olahraga.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4 col-sm-6">
                <a href="{{ route('madrasah.pendaftaran') }}" class="text-decoration-none">
                    <div class="card card-menu h-100 p-4 bg-white shadow-sm text-center border-0">
                        <div class="icon-wrapper bg-success-subtle text-success mx-auto">
                            <i class="bi bi-person-plus fs-2"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Pendaftaran (PPDB)</h5>
                        <p class="text-muted small font-light mb-0">Informasi PPDB dan formulir pendaftaran siswa baru.</p>
                    </div>
                </a>
            </div>
            
            <div class="col-md-8 col-sm-12 mt-4">
                <div class="card p-4 shadow-sm border-0" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); border: 1px solid #bbf7d0 !important; border-radius: var(--radius-lg);">
                    <div class="row align-items-center h-100">
                        <div class="col-sm-8 text-start p-lg-4">
                            <span class="badge bg-success-subtle text-success mb-3 fw-bold rounded-pill px-3 py-2">E-Learning & LMS</span>
                            <h4 class="fw-bold text-dark mb-2">Portal Akademik Siswa</h4>
                            <p class="text-muted font-light mb-0">Akses ujian online, materi belajar, dan raport digital untuk mempermudah monitoring perkembangan siswa.</p>
                        </div>
                        <div class="col-sm-4 text-center mt-4 mt-sm-0">
                            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-lg" style="width: 90px; height: 90px;">
                                <i class="bi bi-laptop fs-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

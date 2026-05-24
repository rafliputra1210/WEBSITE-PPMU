@extends('layouts.app')

@section('title', 'Portal Madrasah — PPMU')

@section('content')
<style>
    /* === HERO CAROUSEL MADRASAH === */
    #madrasahCarousel {
        height: 85vh;
        min-height: 500px;
        position: relative;
    }
    .carousel-inner, .carousel-item {
        height: 100%;
    }
    .carousel-item img {
        object-fit: cover;
        height: 100%;
        width: 100%;
        filter: brightness(0.65);
    }
    .carousel-caption {
        bottom: 0;
        top: 0;
        display: flex !important;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding-bottom: 50px;
        z-index: 10;
        text-shadow: 0 4px 12px rgba(0,0,0,0.5);
    }
    .carousel-caption h1 {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 800;
        color: #fff;
        line-height: 1.2;
        margin-bottom: 1rem;
        animation: fadeSlideUp 0.7s ease both 0.1s;
    }
    .carousel-caption p {
        font-size: 1.2rem;
        color: rgba(255,255,255,0.9);
        max-width: 800px;
        margin-bottom: 2rem;
        line-height: 1.6;
        animation: fadeSlideUp 0.7s ease both 0.2s;
    }
    .carousel-btn {
        animation: fadeSlideUp 0.7s ease both 0.3s;
    }
    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .btn-madrasah-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #10b981, #059669);
        color: #fff;
        font-weight: 700;
        font-size: 1rem;
        border: none;
        border-radius: 50px;
        padding: 14px 36px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(16,185,129,0.35);
    }
    .btn-madrasah-primary:hover {
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(16,185,129,0.5);
    }

    /* === MENU CARDS === */
    .card-menu {
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 20px;
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

<!-- HERO CAROUSEL MADRASAH -->
<section id="madrasahCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        @if(isset($banners) && $banners->count() > 0)
            @foreach($banners as $index => $banner)
                <button type="button" data-bs-target="#madrasahCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        @else
            <button type="button" data-bs-target="#madrasahCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        @endif
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        @if(isset($banners) && $banners->count() > 0)
            @foreach($banners as $index => $banner)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100" alt="{{ $banner->title ?? 'Banner Madrasah' }}">

                    @if($banner->title || $banner->subtitle || $banner->button_text)
                    <div class="carousel-caption">
                        @if($banner->title)
                            <h1>{{ $banner->title }}</h1>
                        @endif

                        @if($banner->subtitle)
                            <p>{{ $banner->subtitle }}</p>
                        @endif

                        @if($banner->button_text && $banner->button_link)
                            <div class="carousel-btn">
                                <a href="{{ url($banner->button_link) }}" class="btn-madrasah-primary">
                                    {{ $banner->button_text }}
                                </a>
                            </div>
                        @endif
                    </div>
                    @endif
                </div>
            @endforeach
        @else
            <!-- Default Fallback Slide -->
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" class="d-block w-100" alt="Banner Default Madrasah">
                <div class="carousel-caption">
                    <h1>Madrasah <span style="color:#6ee7b7;">Berprestasi</span> & Berakhlak Mulia</h1>
                    <p>Pendidikan formal unggulan dengan kurikulum integrasi nasional dan nilai-nilai keislaman. Menyiapkan generasi cerdas dan berakhlak mulia.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center carousel-btn">
                        <a href="{{ route('madrasah.pendaftaran') }}" class="btn-madrasah-primary">
                            <i class="bi bi-pencil-square me-2"></i>Daftar Siswa Baru
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Controls -->
    @if(isset($banners) && $banners->count() > 1)
    <button class="carousel-control-prev" type="button" data-bs-target="#madrasahCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#madrasahCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    @endif
</section>

<!-- MENU CARDS -->
<section class="py-5 bg-white" style="position: relative; z-index: 20;">
    <div class="container py-4">
        <div class="row g-4 justify-content-center">

            <div class="col-md-4 col-sm-6">
                <a href="{{ route('madrasah.profil') }}" class="text-decoration-none">
                    <div class="card card-menu h-100 p-4 bg-white shadow-sm text-center border-0">
                        <div class="icon-wrapper bg-success-subtle text-success mx-auto">
                            <i class="bi bi-journal-text fs-2"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Profil Madrasah</h5>
                        <p class="text-muted small mb-0">Sejarah, Visi, Misi, dan profil singkat Madrasah.</p>
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
                        <p class="text-muted small mb-0">Informasi laboratorium, perpustakaan, dan area olahraga.</p>
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
                        <p class="text-muted small mb-0">Informasi PPDB dan formulir pendaftaran siswa baru.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-8 col-sm-12 mt-4">
                <div class="card p-4 shadow-sm border-0" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); border: 1px solid #bbf7d0 !important; border-radius: 20px;">
                    <div class="row align-items-center h-100">
                        <div class="col-sm-8 text-start p-lg-4">
                            <span class="badge bg-success-subtle text-success mb-3 fw-bold rounded-pill px-3 py-2">E-Learning & LMS</span>
                            <h4 class="fw-bold text-dark mb-2">Portal Akademik Siswa</h4>
                            <p class="text-muted mb-0">Akses ujian online, materi belajar, dan raport digital untuk mempermudah monitoring perkembangan siswa.</p>
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

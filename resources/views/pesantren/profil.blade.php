@extends('layouts.app')

@section('title', 'Profil & Sejarah - Pesantren PPMU')

@section('content')
<style>
    :root {
        --c-green-50: #ecfdf5;
        --c-green-100: #d1fae5;
        --c-green-500: #10b981;
        --c-green-600: #059669;
        --c-green-700: #047857;
        --c-green-800: #064e3b;
        --c-green-900: #022c22;
    }

    /* === HERO SECTION === */
    .profil-hero {
        background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
        padding: 180px 0 100px;
        position: relative;
        overflow: hidden;
    }

    .profil-hero::after {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.05) 0%, transparent 70%);
        top: -200px;
        right: -200px;
        border-radius: 50%;
        animation: pulseGlow 8s ease-in-out infinite;
    }

    .profil-hero::before {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.05) 0%, transparent 70%);
        bottom: -100px;
        left: -100px;
        border-radius: 50%;
        animation: pulseGlow 10s ease-in-out infinite reverse;
    }

    @keyframes pulseGlow {
        0%, 100% { transform: scale(1); opacity: 0.7; }
        50% { transform: scale(1.1); opacity: 1; }
    }

    .profil-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.2);
        color: var(--c-green-700);
        padding: 8px 20px;
        border-radius: 100px;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        margin-bottom: 1.5rem;
    }

    .profil-title {
        font-size: clamp(2.5rem, 5vw, 4.5rem);
        font-weight: 900;
        line-height: 1.1;
        color: #0f172a;
        letter-spacing: -1px;
    }

    .profil-title span {
        background: linear-gradient(135deg, var(--c-green-600), var(--c-green-500));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* === BREADCRUMB === */
    .custom-breadcrumb {
        background: #ffffff;
        padding: 12px 24px;
        border-radius: 100px;
        display: inline-flex;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        border: 1px solid #f1f5f9;
        margin-top: 2rem;
    }

    .custom-breadcrumb .breadcrumb {
        margin: 0;
    }

    .custom-breadcrumb .breadcrumb-item a {
        color: #64748b;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }

    .custom-breadcrumb .breadcrumb-item a:hover {
        color: var(--c-green-600);
    }

    .custom-breadcrumb .breadcrumb-item.active {
        color: var(--c-green-600);
        font-weight: 700;
    }

    /* === SEJARAH SECTION === */
    .section-sejarah {
        padding: 100px 0;
        background: #ffffff;
    }

    .sejarah-img-wrapper {
        position: relative;
        border-radius: 32px;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(0,0,0,0.1);
    }

    .sejarah-img-wrapper::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 32px;
        border: 2px solid rgba(255,255,255,0.2);
        pointer-events: none;
    }

    .sejarah-img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .sejarah-img-wrapper:hover .sejarah-img {
        transform: scale(1.03);
    }

    .sejarah-content {
        padding-left: 2rem;
    }

    .section-subtitle {
        color: var(--c-green-600);
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.85rem;
        margin-bottom: 12px;
        display: block;
    }

    .sejarah-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 24px;
        line-height: 1.2;
    }

    .sejarah-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #475569;
        white-space: pre-line;
    }

    /* === VISI MISI SECTION === */
    .section-visi-misi {
        padding: 100px 0;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        position: relative;
    }

    .card-visi-misi {
        border: none;
        border-radius: 32px;
        background: #ffffff;
        box-shadow: 0 20px 40px rgba(0,0,0,0.04);
        padding: 50px;
        height: 100%;
        position: relative;
        overflow: hidden;
        z-index: 1;
        transition: all 0.4s ease;
    }

    .card-visi-misi:hover {
        transform: translateY(-5px);
        box-shadow: 0 30px 60px rgba(16, 185, 129, 0.08);
    }

    .card-visi-misi::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 6px;
        background: linear-gradient(135deg, var(--c-green-600), var(--c-green-500));
    }

    .visi-misi-icon {
        width: 64px;
        height: 64px;
        background: var(--c-green-50);
        color: var(--c-green-600);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 30px;
    }

    .visi-title {
        font-size: 2rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 24px;
    }

    .visi-text {
        font-size: 1.4rem;
        font-weight: 600;
        line-height: 1.6;
        color: var(--c-green-700);
        font-style: italic;
    }

    .misi-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .misi-list li {
        position: relative;
        padding-left: 48px;
        margin-bottom: 24px;
        font-size: 1.1rem;
        line-height: 1.7;
        color: #475569;
        font-weight: 500;
    }

    .misi-list li::before {
        content: '\F26A';
        font-family: 'bootstrap-icons';
        position: absolute;
        left: 0;
        top: 0;
        width: 32px;
        height: 32px;
        background: var(--c-green-50);
        color: var(--c-green-600);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }

    /* === CTA SECTION === */
    .cta-section {
        padding: 80px 0;
        background: #ffffff;
    }

    .cta-box {
        background: linear-gradient(135deg, var(--c-green-800) 0%, var(--c-green-700) 100%);
        border-radius: 32px;
        padding: 60px 40px;
        text-align: center;
        color: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .cta-box::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.1;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .btn-cta {
        background: #ffffff;
        color: var(--c-green-700);
        padding: 16px 40px;
        border-radius: 100px;
        font-weight: 800;
        font-size: 1.1rem;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
        position: relative;
        z-index: 1;
    }

    .btn-cta:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        color: var(--c-green-800);
    }

    @media (max-width: 991px) {
        .sejarah-content { padding-left: 0; margin-top: 40px; }
        .sejarah-img { height: 400px; }
        .card-visi-misi { padding: 40px 30px; }
    }
</style>

<!-- HERO -->
<section class="profil-hero">
    <div class="container text-center position-relative z-1">
        <div class="profil-badge" data-aos="fade-up">
            <i class="bi bi-info-circle-fill"></i> PROFIL LEMBAGA
        </div>
        <h1 class="profil-title" data-aos="fade-up" data-aos-delay="100">
            Mengenal Lebih Dekat <br>
            <span>Pesantren PPMU</span>
        </h1>
        
        <div class="custom-breadcrumb" data-aos="fade-up" data-aos-delay="200">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pesantren.index') }}">Pesantren</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profil & Sejarah</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- SEJARAH -->
<section class="section-sejarah">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="sejarah-img-wrapper">
                    @if($profile && $profile->gambar)
                        <img src="{{ asset('storage/' . $profile->gambar) }}" class="sejarah-img" alt="Sejarah Pesantren">
                    @else
                        <img src="https://images.unsplash.com/photo-1541339907198-e08756ebafe3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="sejarah-img" alt="Sejarah Pesantren Placeholder">
                    @endif
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="sejarah-content">
                    <span class="section-subtitle">Awal Mula</span>
                    <h2 class="sejarah-title">Sejarah Berdirinya Pesantren</h2>
                    <div class="sejarah-text">
                        {{ $profile && $profile->sejarah ? $profile->sejarah : 'Data sejarah belum tersedia. Pengelola sedang memperbarui informasi ini untuk menyajikan kisah perjalanan panjang lembaga kami dalam mendidik generasi umat.' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VISI MISI -->
<section class="section-visi-misi">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                <div class="card-visi-misi">
                    <div class="visi-misi-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <h3 class="visi-title">Visi Kami</h3>
                    <p class="visi-text">
                        "{{ $profile && $profile->visi ? $profile->visi : 'Menjadi lembaga pendidikan yang unggul dalam keilmuan, mandiri, dan berakhlakul karimah berlandaskan nilai-nilai salaf.' }}"
                    </p>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                <div class="card-visi-misi">
                    <div class="visi-misi-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h3 class="visi-title">Misi Kami</h3>
                    @if($profile && $profile->misi)
                        <ul class="misi-list">
                            @foreach(explode("\n", $profile->misi) as $m)
                                @if(trim($m))
                                    <li>{{ trim($m) }}</li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <ul class="misi-list">
                            <li>Menyelenggarakan pendidikan Islam yang komprehensif memadukan ilmu agama dan umum.</li>
                            <li>Membentuk karakter santri yang berakhlak mulia dan berjiwa kepemimpinan.</li>
                            <li>Membekali santri dengan keterampilan hidup agar mandiri di tengah masyarakat.</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <div class="cta-box" data-aos="zoom-in">
            <h2 class="fw-bold mb-4 position-relative z-1" style="font-size: 2.5rem;">Ingin Bergabung Menjadi Bagian Dari Kami?</h2>
            <p class="mb-5 fs-5 text-white-50 position-relative z-1">Pendaftaran Santri Baru telah dibuka. Mari bersama membangun masa depan yang gemilang.</p>
            <a href="{{ route('pesantren.pendaftaran') }}" class="btn-cta">
                Daftar Santri Sekarang <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection
@extends('layouts.app')
@section('title', 'Portal Pesantren')

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

    /* === HERO CAROUSEL === */
    #pesantrenCarousel {
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

    /* === FEATURES === */
    .features-section {
        padding: 100px 0;
        background: #ffffff;
        position: relative;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
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

    .section-title {
        font-size: clamp(2rem, 4vw, 2.8rem);
        font-weight: 800;
        color: #0f172a;
        line-height: 1.2;
    }

    .feature-card {
        background: #ffffff;
        border: 1px solid #f1f5f9;
        border-radius: 24px;
        padding: 40px 30px;
        text-align: center;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .feature-card::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--c-green-600), var(--c-green-500));
        transform: scaleX(0);
        transition: transform 0.4s ease;
        transform-origin: left;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.1);
        border-color: transparent;
    }

    .feature-card:hover::after {
        transform: scaleX(1);
    }

    .feature-icon-wrapper {
        width: 80px; height: 80px;
        background: var(--c-green-50);
        color: var(--c-green-600);
        border-radius: 20px;
        display: inline-flex; align-items: center; justify-content: center;
        font-size: 2.2rem;
        margin-bottom: 24px;
        transition: all 0.3s;
    }

    .feature-card:hover .feature-icon-wrapper {
        background: linear-gradient(135deg, var(--c-green-600), var(--c-green-500));
        color: #ffffff;
        transform: scale(1.05) rotate(-5deg);
    }

    .feature-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 16px;
    }

    .feature-desc {
        color: #64748b;
        line-height: 1.7;
        margin-bottom: 24px;
    }

    .feature-link {
        color: var(--c-green-600);
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: gap 0.3s;
    }

    .feature-link:hover {
        gap: 12px;
        color: var(--c-green-700);
    }

    /* === STATS === */
    .stats-section {
        background: linear-gradient(135deg, var(--c-green-800) 0%, var(--c-green-700) 100%);
        padding: 80px 0;
        color: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.1;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .stat-box {
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .stat-number {
        font-size: clamp(3rem, 5vw, 4.5rem);
        font-weight: 900;
        line-height: 1;
        margin-bottom: 8px;
        color: #ffffff;
        text-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }

    .stat-label {
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--c-green-100);
    }

    /* === CTA === */
    .cta-section {
        padding: 100px 0;
        background: #f8fafc;
    }

    .cta-wrapper {
        background: #ffffff;
        border-radius: 32px;
        padding: 60px;
        text-align: center;
        box-shadow: 0 20px 40px rgba(0,0,0,0.03);
        border: 1px solid #e2e8f0;
        position: relative;
        overflow: hidden;
    }

    .cta-wrapper::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 6px;
        background: linear-gradient(90deg, var(--c-green-500), var(--c-green-600));
    }

    @media (max-width: 991px) {
        .hero-pesantren { min-height: auto; padding-top: 140px; text-align: center; }
        .hero-desc { margin: 0 auto 2.5rem; }
        .hero-image-wrapper { margin-top: 50px; }
        .floating-card { left: 50%; transform: translateX(-50%); bottom: -30px; width: 90%; justify-content: center; animation: none; }
        .cta-wrapper { padding: 40px 20px; }
    }
</style>

<!-- HERO CAROUSEL -->
<section id="pesantrenCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        @if(isset($banners) && $banners->count() > 0)
            @foreach($banners as $index => $banner)
                <button type="button" data-bs-target="#pesantrenCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        @else
            <button type="button" data-bs-target="#pesantrenCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        @endif
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        @if(isset($banners) && $banners->count() > 0)
            @foreach($banners as $index => $banner)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100" alt="{{ $banner->title ?? 'Banner Pesantren' }}">
                    
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
                                <a href="{{ url($banner->button_link) }}" class="btn-pesantren-primary px-5 py-3">
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
                <img src="{{ asset('images/foto1.jpeg') }}" onerror="this.src='https://images.unsplash.com/photo-1596422846543-75c6fb19f66b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80'" class="d-block w-100" alt="Banner Default">
                <div class="carousel-caption">
                    <h1>Membangun Generasi <span>Qur'ani & Mandiri</span></h1>
                    <p>Selamat datang di Portal Pesantren. Kami berdedikasi mencetak generasi unggul yang berilmu pengetahuan luas, berakhlakul karimah, dan siap menyongsong tantangan global.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center carousel-btn">
                        <a href="{{ route('pesantren.pendaftaran') }}" class="btn-pesantren-primary px-5 py-3">
                            <i class="bi bi-pencil-square me-2"></i>Daftar Santri Baru
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Controls -->
    @if(isset($banners) && $banners->count() > 1)
    <button class="carousel-control-prev" type="button" data-bs-target="#pesantrenCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#pesantrenCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    @endif
</section>



<!-- FEATURES -->
<section class="features-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">Layanan & Fasilitas</span>
            <h2 class="section-title">Eksplorasi Portal Pesantren</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <h3 class="feature-title">Profil & Sejarah</h3>
                    <p class="feature-desc">Mengenal lebih dekat visi, misi, serta struktur kepengurusan dan sejarah berdirinya pesantren.</p>
                    <a href="{{ route('pesantren.profil') }}" class="feature-link">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-buildings"></i>
                    </div>
                    <h3 class="feature-title">Fasilitas Asrama</h3>
                    <p class="feature-desc">Lihat sarana dan prasarana yang mendukung kenyamanan belajar dan menetap santri sehari-hari.</p>
                    <a href="{{ route('pesantren.fasilitas') }}" class="feature-link">Lihat Fasilitas <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h3 class="feature-title">Investasi Akhirat</h3>
                    <p class="feature-desc">Mari dukung program pengembangan dan operasional pesantren melalui infaq, shadaqah, atau wakaf.</p>
                    <a href="{{ route('pesantren.donasi') }}" class="feature-link">Donasi Sekarang <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <div class="cta-wrapper" data-aos="zoom-in">
            <h2 class="section-title mb-4">Mari Bergabung Bersama Kami</h2>
            <p class="hero-desc mx-auto mb-5">Pendaftaran Santri Baru Tahun Ajaran 2026/2027 telah dibuka. Daftarkan putra-putri Anda untuk mendapatkan pendidikan berbasis kepesantrenan yang terbaik.</p>
            <a href="{{ route('pesantren.pendaftaran') }}" class="btn-pesantren-primary btn-lg">
                <i class="bi bi-arrow-right-circle me-2"></i> Daftar Sekarang
            </a>
        </div>
    </div>
</section>

@endsection
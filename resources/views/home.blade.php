@extends('layouts.app')

@section('content')
<style>
    :root {
        --grad-hero: linear-gradient(135deg, #ffffff 0%, #f0fdf4 50%, #ecfdf5 100%);
        --grad-primary: linear-gradient(135deg, #059669 0%, #047857 100%);
        --grad-accent: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        --grad-green: linear-gradient(135deg, #059669 0%, #047857 100%);
        --c-primary: #059669;
        --c-primary-light: #10b981;
        --c-dark-green: #064e3b;
        --c-green: #059669;
        --radius-lg: 24px;
        --radius-xl: 32px;
        --shadow-glow: 0 0 40px rgba(5,150,105,0.12);
    }

    /* ==================== HERO ==================== */
    .hero-home {
        background: var(--grad-hero);
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        padding-top: 100px;
        background-image: var(--pattern-islamic);
        background-attachment: fixed;
    }

    .hero-home::before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(5,150,105,0.08) 0%, transparent 70%);
        top: -200px;
        right: -200px;
        border-radius: 50%;
        animation: pulseGlow 8s ease-in-out infinite;
    }

    .hero-home::after {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(5,150,105,0.06) 0%, transparent 70%);
        bottom: -100px;
        left: -100px;
        border-radius: 50%;
        animation: pulseGlow 10s ease-in-out infinite reverse;
    }

    @keyframes pulseGlow {
        0%, 100% { transform: scale(1); opacity: 0.7; }
        50% { transform: scale(1.1); opacity: 1; }
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(5,150,105,0.06);
        border: 1px solid rgba(5,150,105,0.15);
        backdrop-filter: blur(10px);
        padding: 10px 22px;
        border-radius: 100px;
        color: var(--c-dark-green);
        font-size: 0.82rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 1.5rem;
        animation: fadeSlideDown 0.6s ease both;
    }

    .hero-badge .pulse-dot {
        width: 8px;
        height: 8px;
        background: #059669;
        border-radius: 50%;
        box-shadow: 0 0 0 3px rgba(5,150,105,0.3);
        animation: pulseDot 2s infinite;
    }

    @keyframes pulseDot {
        0%, 100% { box-shadow: 0 0 0 3px rgba(5,150,105,0.3); }
        50% { box-shadow: 0 0 0 8px rgba(5,150,105,0.1); }
    }

    .hero-headline {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -2px;
        color: var(--c-dark-green);
        animation: fadeSlideUp 0.7s ease both 0.1s;
    }

    .hero-headline .gradient-text {
        background: var(--grad-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-sub {
        color: #475569;
        font-size: 1.1rem;
        line-height: 1.7;
        max-width: 500px;
        animation: fadeSlideUp 0.7s ease both 0.2s;
    }

    .hero-actions {
        animation: fadeSlideUp 0.7s ease both 0.3s;
    }

    .btn-hero-primary {
        background: var(--grad-primary);
        color: #fff;
        border: none;
        padding: 16px 38px;
        border-radius: 100px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(.4,0,.2,1);
        box-shadow: 0 8px 30px rgba(5,150,105,0.3);
        text-decoration: none;
        display: inline-block;
    }

    .btn-hero-primary:hover {
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 16px 40px rgba(5,150,105,0.4);
    }

    .btn-hero-ghost {
        color: var(--c-dark-green);
        border: 2px solid rgba(5,150,105,0.25);
        padding: 14px 35px;
        border-radius: 100px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(.4,0,.2,1);
        text-decoration: none;
        display: inline-block;
        background: rgba(5,150,105,0.04);
    }

    .btn-hero-ghost:hover {
        color: #fff;
        background: var(--c-primary);
        border-color: var(--c-primary);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(5,150,105,0.3);
    }

    .btn-cta-primary {
        background: #fff;
        color: var(--c-primary);
        border: none;
        padding: 16px 38px;
        border-radius: 100px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(.4,0,.2,1);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        text-decoration: none;
        display: inline-block;
    }

    .btn-cta-primary:hover {
        color: var(--c-dark-green);
        transform: translateY(-3px);
        box-shadow: 0 16px 40px rgba(0,0,0,0.25);
    }

    .btn-cta-ghost {
        color: #fff;
        border: 2px solid rgba(255,255,255,0.4);
        padding: 14px 35px;
        border-radius: 100px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(.4,0,.2,1);
        text-decoration: none;
        display: inline-block;
        background: rgba(255,255,255,0.05);
    }

    .btn-cta-ghost:hover {
        color: var(--c-primary);
        background: #fff;
        border-color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }

    .hero-stats {
        display: flex;
        gap: 2rem;
        margin-top: 2.5rem;
        padding-top: 2rem;
        border-top: 1px solid rgba(5,150,105,0.1);
        animation: fadeSlideUp 0.7s ease both 0.4s;
    }

    .hero-stat-item h3 {
        font-size: 1.8rem;
        font-weight: 800;
        color: #059669;
        margin-bottom: 2px;
        background: var(--grad-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-stat-item p {
        font-size: 0.75rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        margin: 0;
    }

    /* Hero Floating Card */
    .hero-visual {
        position: relative;
        animation: fadeSlideLeft 0.8s ease both 0.3s;
    }

    .hero-img-wrapper {
        position: relative;
        border-radius: var(--radius-xl);
        overflow: hidden;
        box-shadow: var(--shadow-glow), 0 30px 80px rgba(0,0,0,0.12);
        border: 1px solid rgba(5,150,105,0.1);
    }

    .hero-img-wrapper img {
        width: 100%;
        height: 480px;
        object-fit: cover;
        display: block;
    }

    .floating-card {
        position: absolute;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(5,150,105,0.1);
        border-radius: 16px;
        padding: 14px 18px;
        color: var(--c-dark-green);
        font-size: 0.8rem;
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    }

    .floating-card-1 {
        bottom: -20px;
        left: -30px;
        animation: float 6s ease-in-out infinite;
    }

    .floating-card-2 {
        top: 30px;
        right: -30px;
        animation: float 8s ease-in-out infinite reverse;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* ==================== FEATURES ==================== */
    .features-section {
        background: #ffffff;
        padding: 100px 0;
    }

    .section-chip {
        display: inline-block;
        background: rgba(5,150,105,0.06);
        color: var(--c-primary);
        border: 1px solid rgba(5,150,105,0.15);
        padding: 8px 20px;
        border-radius: 100px;
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 16px;
    }

    .section-title {
        font-size: clamp(2rem, 4vw, 2.8rem);
        font-weight: 800;
        letter-spacing: -1px;
        color: #0f172a;
        line-height: 1.2;
    }

    .section-subtitle {
        color: #64748b;
        font-size: 1.05rem;
        max-width: 540px;
        margin: 0 auto;
        line-height: 1.7;
    }

    .feature-card {
        background: #fff;
        border: 1px solid #f1f5f9;
        border-radius: 20px;
        padding: 2.5rem 2rem;
        height: 100%;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
        overflow: hidden;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: var(--grad-primary);
        transform: scaleX(0);
        transition: transform 0.4s ease;
        transform-origin: left;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 60px rgba(5,150,105,0.1);
        border-color: rgba(5,150,105,0.15);
    }

    .feature-card:hover::before {
        transform: scaleX(1);
    }

    .feature-icon {
        width: 64px;
        height: 64px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin-bottom: 1.5rem;
    }

    /* ==================== PROGRAMS ==================== */
    .programs-section {
        background: linear-gradient(180deg, #f0fdf4 0%, #ecfdf5 100%);
        padding: 100px 0;
    }

    .program-card {
        border-radius: 20px;
        overflow: hidden;
        background: #fff;
        border: 1px solid #e2e8f0;
        transition: all 0.4s ease;
    }

    .program-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.1);
    }

    .program-card-img {
        height: 220px;
        object-fit: cover;
        width: 100%;
    }

    .program-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        padding: 5px 14px;
        border-radius: 100px;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* ==================== STATS ==================== */
    .stats-section {
        background: var(--grad-hero);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23059669' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .stat-box {
        text-align: center;
        padding: 20px;
        position: relative;
    }

    .stat-box h2 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        margin-bottom: 4px;
        background: var(--grad-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-box p {
        color: #064e3b;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
        margin: 0;
        opacity: 0.7;
    }

    /* ==================== TESTIMONIALS ==================== */
    .testimonials-section {
        padding: 100px 0;
        background: #fff;
    }

    .testimonial-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 2rem;
        height: 100%;
        transition: all 0.3s ease;
    }

    .testimonial-card:hover {
        background: #fff;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        transform: translateY(-4px);
    }

    .testimonial-stars {
        color: #f59e0b;
        margin-bottom: 1rem;
        letter-spacing: 2px;
    }

    .testimonial-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #e2e8f0;
    }

    .avatar-placeholder {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1rem;
        flex-shrink: 0;
    }

    /* ==================== CTA ==================== */
    .cta-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
    }

    .cta-box {
        background: var(--grad-primary);
        border-radius: var(--radius-xl);
        padding: 70px 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-box::before {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(16,185,129,0.25) 0%, transparent 70%);
        top: -200px;
        right: -100px;
    }

    .cta-box::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(4,120,87,0.2) 0%, transparent 70%);
        bottom: -150px;
        left: -50px;
    }

    .cta-box * { position: relative; z-index: 1; }

    /* ==================== ANIMATIONS ==================== */
    @keyframes fadeSlideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeSlideLeft {
        from { opacity: 0; transform: translateX(40px); }
        to { opacity: 1; transform: translateX(0); }
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 991px) {
        .hero-home { min-height: auto; padding: 120px 0 60px; }
        .hero-headline { font-size: 2.2rem !important; letter-spacing: -1px; }
        .hero-sub { font-size: 1rem; }
        .hero-stats { gap: 1.5rem; }
        .hero-stat-item h3 { font-size: 1.4rem; }
        .features-section, .programs-section, .testimonials-section { padding: 70px 0; }
        .section-title { font-size: 1.8rem !important; }
        .stat-box h2 { font-size: 2.5rem !important; }
        .cta-box { padding: 50px 30px; }
    }

    @media (max-width: 575px) {
        .hero-home { padding: 100px 0 50px; }
        .hero-headline { font-size: 1.8rem !important; }
        .hero-stats { flex-wrap: wrap; gap: 1rem; }
        .btn-hero-primary, .btn-hero-ghost { padding: 12px 28px; font-size: 0.9rem; width: 100%; text-align: center; }
        .features-section, .programs-section, .testimonials-section { padding: 50px 0; }
        .section-title { font-size: 1.5rem !important; }
        .cta-box { padding: 40px 20px; border-radius: 20px; }
        .feature-card { padding: 2rem 1.5rem; }
    }

    /* Smooth link hover transitions */
    a { transition: color 0.2s ease, background 0.2s ease; }
</style>

<style>
    /* Custom Carousel Styles */
    #heroCarousel {
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
        filter: brightness(0.6); /* Darken image slightly for text readability */
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
        color: #e2e8f0;
        max-width: 700px;
        margin: 0 auto 2rem;
        animation: fadeSlideUp 0.7s ease both 0.2s;
    }
    .carousel-btn {
        animation: fadeSlideUp 0.7s ease both 0.3s;
    }
    .carousel-control-prev, .carousel-control-next {
        width: 5%;
        z-index: 11;
    }
</style>

{{-- ===================== HERO CAROUSEL ===================== --}}
<section class="hero-carousel-section">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        
        <!-- Indicators -->
        <div class="carousel-indicators">
            @if(isset($banners) && $banners->count() > 0)
                @foreach($banners as $index => $banner)
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            @else
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            @endif
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            @if(isset($banners) && $banners->count() > 0)
                @foreach($banners as $index => $banner)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100" alt="{{ $banner->title ?? 'Banner' }}">
                        
                        @if($banner->title || $banner->subtitle || $banner->button_text)
                        <div class="carousel-caption">
                            @if($banner->title)
                                <h1>{{ $banner->title }}</h1>
                            @endif
                            
                            @if($banner->subtitle)
                                <p>{{ $banner->subtitle }}</p>
                            @endif
                            
                            @if($banner->button_text && $banner->button_link)
                                <a href="{{ url($banner->button_link) }}" class="btn-hero-primary carousel-btn mt-3">
                                    {{ $banner->button_text }}
                                </a>
                            @endif
                        </div>
                        @endif
                    </div>
                @endforeach
            @else
                <!-- Default Fallback Slide -->
                <div class="carousel-item active">
                    <img src="{{ asset('images/foto1.jpeg') }}" class="d-block w-100" alt="Banner Default">
                    <div class="carousel-caption">
                        <h1>Raih Ilmu & Akhlak Mulia Bersama Kami</h1>
                        <p>Membangun Generasi Cerdas, Berakhlak Mulia, dan Berwawasan Global melalui sistem pendidikan Madrasah dan Pesantren yang modern dan terpadu.</p>
                        <div class="d-flex flex-wrap gap-3 justify-content-center mt-4 carousel-btn">
                            <a href="{{ route('pesantren.pendaftaran') }}" class="btn-hero-primary">
                                <i class="bi bi-pencil-square me-2"></i>Daftar Pesantren
                            </a>
                            <a href="{{ route('madrasah.pendaftaran') }}" class="btn-cta-ghost border-white text-white bg-transparent">
                                <i class="bi bi-mortarboard me-2"></i>Portal Madrasah
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

{{-- ===================== FEATURES SECTION ===================== --}}
<section class="features-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-chip">Layanan Kami</span>
            <h2 class="section-title">Ekosistem Pendidikan<br>yang Lengkap &amp; Modern</h2>
            <p class="section-subtitle mt-3">Kami menyediakan berbagai layanan unggulan untuk mendukung tumbuh kembang santri dan siswa secara holistik.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon" style="background:rgba(5,150,105,0.1);color:#059669;">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Berita &amp; Informasi</h4>
                    <p class="text-secondary mb-4" style="line-height:1.7;">Update terbaru seputar kegiatan akademik, prestasi santri, dan pengumuman penting dari lingkungan pesantren dan madrasah.</p>
                    <a href="{{ route('pesantren.berita') }}" class="text-decoration-none fw-semibold" style="color:var(--c-primary);">Baca Berita <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon" style="background:rgba(16,185,129,0.1);color:#10b981;">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Investasi Akhirat</h4>
                    <p class="text-secondary mb-4" style="line-height:1.7;">Salurkan donasi Anda secara transparan untuk pembangunan fasilitas, beasiswa santri, dan operasional pendidikan yang berkelanjutan.</p>
                    <a href="{{ route('pesantren.donasi') }}" class="text-decoration-none fw-semibold" style="color:#059669;">Donasi Sekarang <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <div class="feature-icon" style="background:rgba(4,120,87,0.1);color:#047857;">
                        <i class="bi bi-building-check"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Fasilitas Modern</h4>
                    <p class="text-secondary mb-4" style="line-height:1.7;">Sarana dan prasarana penunjang pembelajaran yang nyaman, lengkap, dan berbasis teknologi modern untuk mendukung potensi terbaik.</p>
                    <a href="{{ route('madrasah.fasilitas') }}" class="text-decoration-none fw-semibold" style="color:#047857;">Lihat Fasilitas <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon" style="background:rgba(6,78,59,0.08);color:#064e3b;">
                        <i class="bi bi-person-fill-check"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Portal Wali Santri</h4>
                    <p class="text-secondary mb-4" style="line-height:1.7;">Pantau perkembangan akademik, kehadiran, tagihan SPP, dan laporan keuangan putra-putri Anda secara real-time kapanpun, dimanapun.</p>
                    <a href="#" class="text-decoration-none fw-semibold" style="color:var(--c-primary);">Login Wali <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon" style="background:rgba(5,150,105,0.08);color:#059669;">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Galeri Prestasi</h4>
                    <p class="text-secondary mb-4" style="line-height:1.7;">Dokumentasi pencapaian membanggakan para santri dan siswa dalam berbagai kompetisi regional, nasional, hingga internasional.</p>
                    <a href="{{ route('galeri.index') }}" class="text-decoration-none fw-semibold" style="color:#059669;">Lihat Galeri <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon" style="background:rgba(16,185,129,0.08);color:#10b981;">
                        <i class="bi bi-clipboard2-data-fill"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">PPDB Online</h4>
                    <p class="text-secondary mb-4" style="line-height:1.7;">Proses Penerimaan Peserta Didik Baru yang mudah, cepat, dan transparan. Daftarkan putra-putri Anda sekarang juga.</p>
                    <a href="{{ route('pesantren.pendaftaran') }}" class="text-decoration-none fw-semibold" style="color:var(--c-primary);">Daftar PPDB <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== PROGRAMS SECTION ===================== --}}
<section class="programs-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-chip">Program Unggulan</span>
            <h2 class="section-title">Pilihan Program<br>Sesuai Kebutuhan</h2>
            <p class="section-subtitle mt-3">Dari program tahfidz intensif hingga pendidikan formal berwawasan keislaman — semua tersedia untuk putra-putri terbaik Anda.</p>
        </div>

        <div class="row g-4">
            @forelse($programs as $prog)
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="program-card position-relative shadow-sm h-100">
                    <div style="position:relative;">
                        <img src="{{ asset('storage/' . $prog->gambar) }}"
                             class="program-card-img" alt="{{ $prog->nama }}">
                        @if($prog->badge_teks)
                        <span class="program-badge {{ $prog->badge_warna ?: 'bg-success text-white' }}">
                            {{ $prog->badge_teks }}
                        </span>
                        @endif
                    </div>
                    <div class="p-4 d-flex flex-column h-100">
                        <h5 class="fw-bold text-dark mb-2">{{ $prog->nama }}</h5>
                        <p class="text-secondary small mb-3 flex-grow-1" style="line-height:1.6;">{{ $prog->deskripsi }}</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto">
                            <div class="d-flex gap-2">
                                <span class="badge {{ $prog->kategori == 'Pesantren' ? 'bg-success-subtle text-success' : 'bg-info-subtle text-info' }} rounded-pill px-3 py-2 small fw-semibold">
                                    {{ $prog->kategori }}
                                </span>
                            </div>
                            @php
                                $link = '#';
                                if($prog->link_daftar) {
                                    if(Route::has($prog->link_daftar)) {
                                        $link = route($prog->link_daftar);
                                    } else {
                                        $link = $prog->link_daftar;
                                    }
                                }
                            @endphp
                            <a href="{{ $link }}" class="text-primary fw-bold small text-decoration-none">Daftar →</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-4">
                <p class="text-muted">Belum ada program unggulan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ===================== STATS SECTION ===================== --}}
<section class="stats-section">
    <div class="container position-relative" style="z-index:1;">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <h2 class="counter" data-target="1200">0</h2>
                    <p>Santri Mukim</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <h2 class="counter" data-target="85">0</h2>
                    <p>Asatidz & Guru</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <h2 class="counter" data-target="15">0</h2>
                    <p>Tahun Berdiri</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <h2 class="counter" data-target="500">0</h2>
                    <p>Alumni Berprestasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== TESTIMONIALS ===================== --}}
<section class="testimonials-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-chip">Testimoni</span>
            <h2 class="section-title">Apa Kata Mereka?</h2>
            <p class="section-subtitle mt-3">Kepercayaan wali santri dan alumni adalah motivasi terbesar kami untuk terus berkembang.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="text-secondary mb-4" style="line-height:1.7;font-style:italic;">"Alhamdulillah, putra saya sangat berkembang sejak masuk pesantren ini. Tidak hanya hafalan Qur'an yang bertambah, akhlaknya pun semakin baik. Sangat recommended!"</p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-placeholder" style="background:linear-gradient(135deg,#10b981,#059669);color:#fff;">B</div>
                        <div>
                            <div class="fw-bold text-dark" style="font-size:0.9rem;">Bapak Hendra S.</div>
                            <div class="text-muted" style="font-size:0.78rem;">Wali Santri — Kelas 5 MI</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="text-secondary mb-4" style="line-height:1.7;font-style:italic;">"Fasilitas asramanya bersih, kasur nyaman, dan makanan bergizi. Sistem keamanannya juga ketat. Anak saya merasa betah dan semangat belajar setiap harinya."</p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-placeholder" style="background:linear-gradient(135deg,#10b981,#059669);color:#fff;">N</div>
                        <div>
                            <div class="fw-bold text-dark" style="font-size:0.9rem;">Ibu Nurhasanah</div>
                            <div class="text-muted" style="font-size:0.78rem;">Wali Santri — Tahfidz Junior</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="text-secondary mb-4" style="line-height:1.7;font-style:italic;">"Saya alumni pesantren ini angkatan 2018. Ilmu yang saya dapat di sini menjadi bekal kuat saat kuliah di luar negeri. Terima kasih para asatidz yang luar biasa."</p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-placeholder" style="background:linear-gradient(135deg,#f59e0b,#ef4444);color:#fff;">R</div>
                        <div>
                            <div class="fw-bold text-dark" style="font-size:0.9rem;">Ahmad Rizki Maulana</div>
                            <div class="text-muted" style="font-size:0.78rem;">Alumni 2018 — Mahasiswa Al-Azhar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== CTA SECTION ===================== --}}
<section class="cta-section">
    <div class="container">
        <div class="cta-box">
            <span class="section-chip" style="background:rgba(255,255,255,0.15);color:#fff;border-color:rgba(255,255,255,0.3);">PPDB 2026</span>
            <h2 class="section-title text-white mt-3" style="font-size:clamp(1.8rem,4vw,3rem);">
                Wujudkan Impian<br>Putra-Putri Anda
            </h2>
            <p class="mt-3 mb-5" style="color:#ecfdf5;opacity:0.8;font-size:1.05rem;max-width:540px;margin:1rem auto 2.5rem;">
                Bergabunglah bersama ribuan keluarga yang telah mempercayakan pendidikan putra-putri mereka kepada kami. Pendaftaran masih dibuka!
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('pesantren.pendaftaran') }}" class="btn-cta-primary">
                    <i class="bi bi-pencil-square me-2"></i>Daftar Pesantren
                </a>
                <a href="{{ route('madrasah.pendaftaran') }}" class="btn-cta-ghost">
                    <i class="bi bi-mortarboard me-2"></i>Daftar Madrasah
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        const animateCounter = (counter) => {
            const target = +counter.getAttribute('data-target');
            let count = 0;
            const inc = target / speed;

            const updateCount = () => {
                count += inc;
                if (count < target) {
                    counter.innerText = Math.ceil(count) + '+';
                    setTimeout(updateCount, 1);
                } else {
                    counter.innerText = target + '+';
                }
            };
            updateCount();
        };

        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        counters.forEach(counter => observer.observe(counter));
    });
</script>
@endsection
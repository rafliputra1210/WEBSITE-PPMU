@extends('layouts.app')

@section('content')
    <style>
        /* Memindahkan style keluar dari div container agar lebih rapi secara struktur HTML */
        :root {
            --poppins: 'Poppins', sans-serif;
            /* Gradient Tokens */
            --grad-hero: linear-gradient(135deg, rgba(13, 110, 253, 0.15) 0%, rgba(111, 66, 193, 0.15) 50%, rgba(13, 202, 240, 0.15) 100%);
            --grad-primary: linear-gradient(135deg, #0d6efd 0%, #6f42c1 100%);
            /* Shadow Tokens */
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
            --shadow-md: 0 10px 30px rgba(0,0,0,0.06);
            --shadow-lg: 0 20px 50px rgba(13, 110, 253, 0.1);
            /* UI Tokens */
            --radius-md: 16px;
            --radius-lg: 24px;
        }

        body {
            font-family: var(--poppins);
            background-color: #ffffff;
            color: #212529;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, .fw-bold {
            font-weight: 700 !important;
            letter-spacing: -0.5px;
        }

        /* 1. HEADER / NAVBAR: Semi-Glassmorphism Sticky Blur */
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(15px) saturate(180%);
            -webkit-backdrop-filter: blur(15px) saturate(180%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .navbar-brand .logo-icon {
            width: 35px;
            height: 35px;
            background: var(--grad-primary);
            color: white;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }

        /* 2. HERO SECTION: Animated Gradient & Illustration split */
        .hero-premium {
            background-image: var(--grad-hero);
            position: relative;
            padding-top: 160px; /* Space for sticky nav */
            padding-bottom: 120px;
        }

        /* Background Particle Animation Placeholder */
        .hero-premium::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(111, 66, 193, 0.2);
            border-radius: 50%;
            filter: blur(80px);
            top: 10%;
            left: -100px;
            animation: floatShape 20s infinite alternate;
        }

        .hero-premium .illustration-holder {
            /* Placeholder untuk gambar ilustrasi online learning */
            background-color: rgba(255,255,255,0.5);
            border-radius: var(--radius-lg);
            border: 2px solid #ffffff;
            box-shadow: var(--shadow-lg);
            aspect-ratio: 16/10;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6f42c1;
        }

        /* 3. FEATURES SECTION: Premium Cards Neumorphism */
        .card-feature {
            background: #ffffff;
            border: 1px solid #f1f3f5;
            border-radius: var(--radius-md);
            padding: 2.5rem 2rem;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: var(--shadow-sm);
            height: 100%;
        }

        .card-feature:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(13, 110, 253, 0.1);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            box-shadow: inset 0 0 15px rgba(255,255,255,0.5);
        }

        /* Missing Sections Styling Placeholders */
        .section-title-wrapper {
            margin-bottom: 60px;
        }

        .course-grid, .article-layout, .gallery-grid, .testimonial-carousel {
            background-color: #f8f9fa;
            border-radius: var(--radius-lg);
            padding: 40px;
            color: #6c757d;
            border: 1px dashed #dee2e6;
            margin-bottom: 30px;
        }

        /* Footer: Dark Elegant */
        .footer-dark {
            background-color: #111111;
            color: #adb5bd;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
            margin-top: 80px;
        }

        /* Utility: Buttons Premium */
        .btn-premium {
            background: var(--grad-primary);
            color: white;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-premium:hover {
            color: white;
            opacity: 0.9;
            transform: scale(1.03);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.2);
        }

        @keyframes floatShape {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(50px, 50px) rotate(10deg); }
        }
    </style>

    <header class="fixed-top glass-nav">
        <nav class="absolute top-0 left-0 w-full z-50 bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-4">
            
            <input type="checkbox" id="mobile-menu-saklar" class="hidden peer">

            <div class="flex justify-between items-center relative z-20">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-slate-900 flex items-center gap-2">
                    <span class="w-8 h-8 bg-teal-600 rounded-lg flex items-center justify-center text-white shadow-md">E</span>
                    Educate <span class="text-teal-600">.</span>
                </a>

                <label for="mobile-menu-saklar" class="md:hidden cursor-pointer text-slate-800 hover:text-teal-600 transition select-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>

                <div class="hidden md:flex items-center space-x-8 text-slate-600 font-medium">
                    <a href="{{ route('home') }}" class="text-teal-600 font-bold transition">Beranda</a>
                    <a href="{{ route('pesantren.index') }}" class="hover:text-teal-600 transition">Pesantren</a>
                    <a href="{{ route('madrasah.index') }}" class="hover:text-teal-600 transition">Madrasah</a>
                    <a href="{{ route('pesantren.berita') }}" class="hover:text-teal-600 transition">Berita</a>
                    <a href="{{ route('pesantren.pendaftaran') }}" class="bg-teal-600 text-white px-6 py-2.5 rounded-full font-bold hover:bg-teal-700 transition shadow-md">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

            <div class="hidden peer-checked:block md:hidden absolute top-full left-0 w-full bg-white shadow-xl border-t border-gray-100 z-10 pb-6">
                <div class="flex flex-col px-6 py-6 space-y-6 text-slate-700 font-medium text-lg">
                    <a href="{{ route('home') }}" class="text-teal-600 font-bold">Beranda</a>
                    <a href="{{ route('pesantren.index') }}" class="hover:text-teal-600 transition">Pesantren</a>
                    <a href="{{ route('madrasah.index') }}" class="hover:text-teal-600 transition">Madrasah</a>
                    <a href="{{ route('pesantren.berita') }}" class="hover:text-teal-600 transition">Berita Terkini</a>
                    <a href="#" class="hover:text-teal-600 transition">Galeri</a>
                    
                    <div class="pt-4 mt-2">
                        <a href="{{ route('pesantren.pendaftaran') }}" class="inline-block bg-teal-600 text-white px-8 py-3.5 rounded-full font-bold hover:bg-teal-700 transition shadow-md text-center">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    </header>

    <section class="hero-premium">
        <div class="container relative z-10">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <span class="inline-block py-1.5 px-3 rounded-full bg-white text-primary fw-semibold text-xs mb-4 shadow-sm border border-light">
                        ✨ Selamat Datang di Portal Pendidikan Terpadu
                    </span>
                    <h1 class="display-3 fw-extrabold mb-4 text-dark leading-tight">
                        Upgrade Your Skills <br class="d-none d-xl-block">for the <span class="text-primary" style="background: var(--grad-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Future</span>
                    </h1>
                    <p class="lead mb-5 text-muted max-w-xl mx-auto mx-lg-0 font-light">Membangun Generasi Cerdas, Berakhlak Mulia, dan Berwawasan Global melalui pendidikan Madrasah dan Pesantren.</p>
                    <div class="d-flex gap-3 justify-content-center justify-content-lg-start flex-wrap">
                        <a href="{{ route('pesantren.pendaftaran') }}" class="btn btn-premium btn-lg px-5 rounded-pill shadow fw-bold">Daftar Pesantren</a>
                        <a href="{{ route('madrasah.pendaftaran') }}" class="btn btn-outline-dark btn-lg px-5 rounded-pill fw-medium hover-bg-white shadow-sm border-2">Portal Madrasah</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="illustration-holder">
                        <i class="bi bi-person-workspace display-1 opacity-25"></i>
                        {{-- Ganti Icon di atas dengan <img src="hero-illustration.svg" alt="Students Online Learning"> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5 mt-5">
        <div class="text-center section-title-wrapper max-w-2xl mx-auto mb-5">
            <span class="text-uppercase tracking-widest text-primary fw-bold text-xs mb-2 d-block">Core Services</span>
            <h2 class="display-5 fw-bold text-dark">Layanan Utama Portal</h2>
            <p class="text-muted mt-3 font-light mx-auto" style="max-w: 500px">Kami menyediakan berbagai layanan unggulan untuk mendukung ekosistem pendidikan Madrasah dan Pesantren yang modern.</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card-feature text-center">
                    <div class="icon-box bg-primary-subtle text-primary">
                        <i class="bi bi-newspaper display-6"></i>
                    </div>
                    <h4 class="card-title fw-bold text-dark mb-3">Berita & Informasi</h4>
                    <p class="card-text text-muted font-light mb-4">Dapatkan update terbaru seputar kegiatan akademik, prestasi, dan pengumuman non-akademik di lingkungan portal.</p>
                    <a href="{{ route('pesantren.berita') }}" class="btn btn-outline-primary px-4 rounded-pill fw-medium btn-sm">Baca Berita →</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card-feature text-center">
                    <div class="icon-box bg-success-subtle text-success">
                        <i class="bi bi-wallet2 display-6"></i>
                    </div>
                    <h4 class="card-title fw-bold text-dark mb-3">Investasi Akhirat</h4>
                    <p class="card-text text-muted font-light mb-4">Salurkan donasi Anda secara transparan untuk pembangunan fasilitas, beasiswa, dan operasional pendidikan yang berkelanjutan.</p>
                    <a href="{{ route('pesantren.donasi') }}" class="btn btn-success px-4 rounded-pill fw-medium btn-sm shadow-sm">Mulai Donasi</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card-feature text-center">
                    <div class="icon-box bg-warning-subtle text-warning">
                        <i class="bi bi-building display-6"></i>
                    </div>
                    <h4 class="card-title fw-bold text-dark mb-3">Fasilitas Modern</h4>
                    <p class="card-text text-muted font-light mb-4">Eksplorasi sarana dan prasarana penunjang pembelajaran yang memadai, nyaman, dan berbasis teknologi modern.</p>
                    <a href="{{ route('madrasah.fasilitas') }}" class="btn btn-outline-warning text-dark px-4 rounded-pill fw-medium btn-sm">Lihat Fasilitas</a>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="section-title-wrapper text-center mb-5">
            <h2 class="display-6 fw-bold text-dark">Courses / articles / Gallery / Testimonials</h2>
            <p class="text-muted">Implement modern sections here (Carousel, Bento Grid, Zoom Gallery)</p>
        </div>
        <div class="row">
            <div class="col-12"><div class="course-grid shadow-sm text-center">Course Cards Grid Layout</div></div>
            <div class="col-12"><div class="article-layout shadow-sm text-center">Clean Article/Blog Layout</div></div>
            <div class="col-12"><div class="gallery-grid shadow-sm text-center">Grid Gallery with Hover Zoom</div></div>
            <div class="col-12"><div class="testimonial-carousel shadow-sm text-center">Carousel Student Reviews Slider</div></div>
        </div>
    </section>

    <footer class="footer-dark py-5 mt-5">
        <div class="container py-4 text-center">
            <p class="fw-bold text-white mb-2">Educate Portal</p>
            <p class="text-muted text-sm max-w-md mx-auto mb-4">Professional, inspiring, modern, and trustworthy platform for educational excellence.</p>
            <div class="d-flex gap-3 justify-content-center text-white mb-4">
                <i class="bi bi-facebook"></i><i class="bi bi-twitter-x"></i><i class="bi bi-instagram"></i><i class="bi bi-linkedin"></i>
            </div>
            <p class="text-xs m-0 text-muted">&copy; {{ date('Y') }} Educate Portal. All rights reserved.</p>
        </div>
    </footer>

@endsection
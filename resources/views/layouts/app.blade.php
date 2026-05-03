<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PPMUJakarta — Pesantren & Madrasah Terpadu')</title>
    <meta name="description" content="Portal resmi Pesantren dan Madrasah Terpadu. Mendidik generasi cerdas, berakhlak mulia, dan berwawasan global.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        :root {
            --font-main: 'Plus Jakarta Sans', sans-serif;
            --c-primary: #059669;
            --c-primary-light: #10b981;
            --c-dark-green: #064e3b;
            --c-accent: #047857;
            --grad-primary: linear-gradient(135deg, #059669 0%, #047857 100%);
            --grad-hero: linear-gradient(135deg, #ffffff 0%, #f0fdf4 50%, #dcfce7 100%);
            --nav-h: 72px;
            --radius-lg: 20px;
            --radius-xl: 28px;
            --pattern-islamic: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23059669' fill-opacity='0.03'%3E%3Cpath d='M40 0l40 40-40 40-40-40z'/%3E%3C/g%3E%3C/svg%3E");
        }

        body {
            font-family: var(--font-main);
            background-color: #fafbfc;
            color: #1e293b;
            overflow-x: hidden;
            margin: 0;
        }

        /* ======= NAVBAR ======= */
        #main-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: var(--nav-h);
            transition: all 0.4s cubic-bezier(.4,0,.2,1);
            background: var(--grad-primary);
            box-shadow: 0 4px 20px rgba(5,150,105,0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        #main-navbar.scrolled {
            background: linear-gradient(135deg, #064e3b 0%, #047857 100%);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Teks navbar */
        #main-navbar .brand-text { color: #ffffff; font-weight: 800; font-size: 1.15rem; letter-spacing: -0.5px; transition: color 0.3s; }
        #main-navbar .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 600; font-size: 0.9rem; padding: 0.4rem 0.9rem !important; border-radius: 8px; transition: all 0.2s; }
        #main-navbar .nav-link:hover { color: #ffffff !important; background: rgba(255, 255, 255, 0.15); }
        #main-navbar .nav-link.active-nav { color: #ffffff !important; background: rgba(255, 255, 255, 0.2); }
        #main-navbar.scrolled .brand-text { color: #ffffff !important; }
        #main-navbar.scrolled .nav-link { color: rgba(255,255,255,0.85) !important; }
        #main-navbar.scrolled .nav-link:hover,
        #main-navbar.scrolled .nav-link.active-nav { color: #ffffff !important; background: rgba(255, 255, 255, 0.15); }

        .nav-logo-box {
            width: 36px;
            height: 36px;
            background: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 1rem;
            color: var(--c-primary);
            flex-shrink: 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .btn-nav-ppdb {
            background: #ffffff;
            color: var(--c-primary) !important;
            border: none;
            padding: 9px 24px;
            border-radius: 100px;
            font-weight: 800;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(.4,0,.2,1);
            box-shadow: 0 4px 14px rgba(0,0,0,0.1);
            display: inline-block;
        }

        .btn-nav-ppdb:hover {
            color: var(--c-dark-green) !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }

        .btn-nav-login {
            color: rgba(255,255,255,0.85) !important;
            border: 1px solid rgba(255,255,255,0.3);
            padding: 7px 18px;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-nav-login:hover {
            background: rgba(255,255,255,0.15);
            color: #fff !important;
            border-color: rgba(255,255,255,0.5);
        }

        /* ======= LOGO MADRASAH (NAVBAR) ======= */
        .nav-madrasah-logo-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .nav-madrasah-logo {
            height: 40px;
            width: auto;
            object-fit: contain;
            transition: all 0.3s ease;
            flex-shrink: 0;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.15));
        }
        .nav-madrasah-logo:hover {
            transform: scale(1.06);
            filter: drop-shadow(0 4px 12px rgba(0,0,0,0.25));
        }
        #main-navbar.scrolled .nav-madrasah-logo {
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.08));
        }
        #main-navbar.scrolled .nav-madrasah-logo:hover {
            filter: drop-shadow(0 4px 10px rgba(99,102,241,0.2));
        }
        .nav-madrasah-label {
            font-size: 0.72rem;
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: 0.3px;
            color: rgba(255,255,255,0.9);
            transition: color 0.3s;
        }
        .nav-madrasah-label span {
            display: block;
            font-size: 0.62rem;
            font-weight: 500;
            opacity: 0.75;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        #main-navbar.scrolled .nav-madrasah-label {
            color: var(--c-dark-green);
        }
        /* Hide text label on medium screens, show only logo */
        @media (max-width: 1199px) {
            .nav-madrasah-label { display: none; }
        }
        /* Mobile logo in offcanvas header */
        .mob-madrasah-logo {
            height: 36px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.2));
        }

        /* ======= MOBILE HAMBURGER ======= */
        .nav-hamburger {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: rgba(255,255,255,0.18);
            border: 1.5px solid rgba(255,255,255,0.3);
            color: #fff;
            font-size: 1.4rem;
            cursor: pointer;
            transition: all 0.25s;
            flex-shrink: 0;
        }
        .nav-hamburger:hover {
            background: rgba(255,255,255,0.28);
        }
        #main-navbar.scrolled .nav-hamburger {
            background: rgba(255,255,255,0.15);
            border-color: rgba(255,255,255,0.3);
            color: #fff;
        }
        #main-navbar.scrolled .nav-hamburger:hover {
            background: rgba(255,255,255,0.25);
            color: #fff;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            border: 1px solid #f1f5f9;
            border-radius: 14px;
            padding: 8px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.12);
            min-width: 200px;
            animation: dropIn 0.2s ease;
        }

        @keyframes dropIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 9px 14px;
            font-weight: 500;
            font-size: 0.88rem;
            color: #334155;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background: rgba(5,150,105,0.08);
            color: var(--c-primary);
        }

        /* Main content - no top padding by default (hero handles it) */
        main { min-height: 80vh; }

        /* ======= FOOTER ======= */
        .site-footer {
            background: linear-gradient(135deg, #064e3b 0%, #022c22 100%);
            position: relative;
            color: #ecfdf5;
            padding: 80px 0 0;
            margin-top: 60px;
            border-top: none;
            overflow: hidden;
        }

        .site-footer::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .site-footer::after {
            content: '';
            position: absolute;
            top: -50%; right: -20%;
            width: 800px; height: 800px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.05) 0%, transparent 60%);
            border-radius: 50%;
            pointer-events: none;
        }

        .footer-brand { font-weight: 900; color: #ffffff; font-size: 1.5rem; letter-spacing: -0.5px; }
        
        .footer-brand-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px; height: 44px;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 14px;
            font-size: 1.2rem;
            font-weight: 900;
            color: #fff;
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
        }

        .footer-tagline {
            color: #a7f3d0;
            font-size: 0.95rem;
            line-height: 1.8;
            margin-top: 16px;
            max-width: 300px;
        }

        .footer-col-title {
            color: #ffffff;
            font-weight: 800;
            font-size: 1.1rem;
            margin-bottom: 24px;
            position: relative;
            display: inline-block;
        }

        .footer-col-title::after {
            content: '';
            position: absolute;
            bottom: -8px; left: 0;
            width: 40px; height: 3px;
            background: #10b981;
            border-radius: 2px;
        }

        .footer-link {
            display: flex;
            align-items: center;
            color: #a7f3d0;
            text-decoration: none;
            font-size: 0.9rem;
            padding: 6px 0;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .footer-link::before {
            content: '\F286';
            font-family: 'bootstrap-icons';
            font-size: 0.7rem;
            margin-right: 8px;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s;
            color: #10b981;
        }

        .footer-link:hover { color: #ffffff; padding-left: 5px; }
        .footer-link:hover::before { opacity: 1; transform: translateX(0); }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            color: #a7f3d0;
            margin-bottom: 20px;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        .footer-contact-icon {
            width: 36px; height: 36px;
            background: rgba(16, 185, 129, 0.15);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: #10b981;
            font-size: 1.1rem;
            flex-shrink: 0;
            transition: all 0.3s;
        }
        .footer-contact-item:hover .footer-contact-icon {
            background: #10b981;
            color: #ffffff;
            transform: translateY(-3px);
        }

        .footer-divider {
            border-color: rgba(255,255,255,0.1);
            margin: 60px 0 30px;
        }

        .footer-bottom {
            padding-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .footer-copy { font-size: 0.85rem; color: #a7f3d0; font-weight: 500; }

        .social-buttons {
            display: flex;
            gap: 12px;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .social-btn:hover {
            background: linear-gradient(135deg, #10b981, #059669);
            border-color: transparent;
            color: #fff;
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }

        /* ======= PAGE PADDING FOR NON-HERO PAGES ======= */
        .page-padded-top { padding-top: calc(var(--nav-h) + 20px); }

        /* ======= MOBILE OFFCANVAS MENU ======= */
        #mobileMenu {
            max-width: 300px;
            border-left: none;
        }
        .mob-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 20px;
            background: linear-gradient(135deg, #064e3b 0%, #047857 100%);
            border-bottom: none !important;
        }
        .mob-close-btn {
            width: 34px; height: 34px;
            border-radius: 8px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.18);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        .mob-close-btn:hover { background: rgba(255,255,255,0.22); }
        .mob-body {
            padding: 0;
            overflow-y: auto;
        }
        /* Section group */
        .mob-section {
            padding: 16px 20px 8px;
        }
        .mob-section-label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
        }
        .mob-section-line {
            flex: 1;
            height: 2px;
            border-radius: 2px;
        }
        .mob-section-text {
            font-size: 0.68rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            white-space: nowrap;
        }
        /* Nav links */
        .mob-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #1e293b;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
            margin-bottom: 2px;
        }
        .mob-link:hover {
            background: #f8fafc;
            color: var(--c-primary);
            transform: translateX(3px);
        }
        .mob-link.active-mob {
            background: rgba(5,150,105,0.08);
            color: var(--c-primary);
        }
        .mob-link .mob-icon {
            width: 34px; height: 34px;
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.95rem;
            flex-shrink: 0;
        }
        .mob-link .mob-arrow {
            margin-left: auto;
            font-size: 0.75rem;
            opacity: 0.35;
            transition: opacity 0.2s;
        }
        .mob-link:hover .mob-arrow { opacity: 0.7; }
        /* Separating line between sub-sections */
        .mob-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e2e8f0 30%, #e2e8f0 70%, transparent);
            margin: 6px 20px;
        }
        /* CTA footer inside offcanvas */
        .mob-cta {
            padding: 16px 20px 24px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .mob-cta-masuk {
            display: block;
            text-align: center;
            padding: 11px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.9rem;
            border: 2px solid var(--c-primary);
            color: var(--c-primary);
            text-decoration: none;
            transition: all 0.25s;
        }
        .mob-cta-masuk:hover {
            background: var(--c-primary);
            color: #fff;
        }
        .mob-cta-ppdb {
            display: block;
            text-align: center;
            padding: 12px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.9rem;
            background: var(--grad-primary);
            color: #fff;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(5,150,105,0.35);
            transition: all 0.3s;
        }
        .mob-cta-ppdb:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(5,150,105,0.45);
        }
        /* ======= FLOATING BUTTONS ======= */
        .floating-controls {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            z-index: 1050;
        }

        .btn-float {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            border: none;
        }

        .btn-float:hover {
            transform: scale(1.1) translateY(-5px);
            color: white;
        }

        .btn-wa {
            background: #25d366;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
        }

        .btn-back-to-top {
            background: var(--c-primary);
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
        }

        .btn-back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        @media (max-width: 575px) {
            .btn-float {
                width: 48px;
                height: 48px;
                font-size: 1.2rem;
            }
            .floating-controls {
                bottom: 20px;
                right: 20px;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f0fdf4; }
        ::-webkit-scrollbar-thumb { background: #a7f3d0; border-radius: 10px; border: 2px solid #f0fdf4; }
        ::-webkit-scrollbar-thumb:hover { background: #6ee7b7; }
    </style>

    @yield('styles')
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav id="main-navbar">
        <div class="container h-100 d-flex align-items-center justify-content-between">
            <!-- Brand + Logo Madrasah (kiri) -->
            <div class="d-flex align-items-center gap-3">
                <!-- Logo Madrasah -->
                <a href="{{ route('madrasah.index') }}" class="nav-madrasah-logo-wrap" title="Portal Madrasah">
                    <img src="{{ asset('images/logo.jpeg') }}"
                         alt="Logo Madrasah"
                         class="nav-madrasah-logo">
                </a>

                <!-- Divider -->
                <div style="width:1px;height:28px;background:rgba(16, 185, 129, 0.2);" id="nav-logo-divider"></div>

                <!-- Brand Educate -->
                <a href="{{ url('/') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                    
                </a>
            </div>

            <!-- Desktop Nav -->
            <ul class="navbar-nav flex-row align-items-center gap-1 d-none d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active-nav' : '' }}" href="{{ url('/') }}">Beranda</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('pesantren*') ? 'active-nav' : '' }}"
                       href="#" data-bs-toggle="dropdown" role="button">Pesantren</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('pesantren.index') }}"><i class="bi bi-house-heart me-2 text-success"></i>Portal Pesantren</a></li>
                        <li><a class="dropdown-item" href="{{ route('pesantren.profil') }}"><i class="bi bi-journal-text me-2 text-primary"></i>Profil & Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ route('pesantren.fasilitas') }}"><i class="bi bi-building-check me-2 text-warning"></i>Fasilitas</a></li>
                        <li><a class="dropdown-item" href="{{ route('pesantren.pendaftaran') }}"><i class="bi bi-person-plus me-2 text-primary"></i>Pendaftaran</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('madrasah*') ? 'active-nav' : '' }}"
                       href="#" data-bs-toggle="dropdown" role="button">Madrasah</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('madrasah.index') }}"><i class="bi bi-building me-2 text-primary"></i>Portal Madrasah</a></li>
                        <li><a class="dropdown-item" href="{{ route('madrasah.profil') }}"><i class="bi bi-journal-text me-2 text-info"></i>Profil & Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ route('madrasah.fasilitas') }}"><i class="bi bi-building-check me-2 text-warning"></i>Fasilitas</a></li>
                        <li><a class="dropdown-item" href="{{ route('madrasah.pendaftaran') }}"><i class="bi bi-person-plus me-2 text-success"></i>Pendaftaran</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pesantren/donasi*') ? 'active-nav' : '' }}" href="{{ route('pesantren.donasi') }}">Investasi Akhirat</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pesantren/berita*') ? 'active-nav' : '' }}" href="{{ route('pesantren.berita') }}">Berita</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('galeri*') ? 'active-nav' : '' }}" href="{{ route('galeri.index') }}">
                        <i class="bi bi-images me-1"></i>Galeri
                    </a>
                </li>
            </ul>

            <!-- CTA Buttons (Desktop) -->
            <div class="d-none d-lg-flex align-items-center gap-3">
                <a href="{{ route('pesantren.pendaftaran') }}" class="btn-nav-ppdb">PPDB 2026</a>
            </div>

            <!-- Mobile: Hamburger -->
            <div class="d-flex d-lg-none align-items-center gap-2">
                <button class="nav-hamburger"
                        data-bs-toggle="offcanvas" data-bs-target="#mobileMenu"
                        type="button" aria-label="Buka Menu">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
        <!-- Header -->
        <div class="mob-header">
            <!-- Brand kiri -->
            <a href="{{ url('/') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                <div class="nav-logo-box" style="width:32px;height:32px;font-size:0.85rem;">P</div>
                <span style="font-weight:800;font-size:1.1rem;color:#fff;">ppmiful<span style="color:#67e8f9;">.</span></span>
            </a>

            <!-- Close Button -->
            <button class="mob-close-btn" data-bs-dismiss="offcanvas" aria-label="Tutup">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="mob-body">

            <!-- Beranda -->
            <div class="mob-section">
                <a href="{{ url('/') }}" class="mob-link {{ request()->is('/') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#f0fdf4;color:#16a34a;"><i class="bi bi-house-fill"></i></span>
                    Beranda
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
                <a href="{{ route('pesantren.donasi') }}" class="mob-link {{ request()->is('pesantren/donasi*') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#fef2f2;color:#ef4444;"><i class="bi bi-heart-fill"></i></span>
                    Investasi Akhirat
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
            </div>

            <div class="mob-divider"></div>

            <!-- Pesantren Section -->
            <div class="mob-section">
                <div class="mob-section-label">
                    <span class="mob-section-text" style="color:#059669;">Pesantren</span>
                    <div class="mob-section-line" style="background:linear-gradient(to right,#059669,#10b981,transparent);"></div>
                </div>
                <a href="{{ route('pesantren.index') }}" class="mob-link {{ request()->is('pesantren') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#ecfdf5;color:#059669;"><i class="bi bi-house-heart-fill"></i></span>
                    Portal Pesantren
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
                <a href="{{ route('pesantren.profil') }}" class="mob-link {{ request()->is('pesantren/profil') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#f1f5f9;color:#475569;"><i class="bi bi-journal-text"></i></span>
                    Profil & Sejarah
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
                <a href="{{ route('pesantren.fasilitas') }}" class="mob-link {{ request()->is('pesantren/fasilitas') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#fffbeb;color:#d97706;"><i class="bi bi-building-check"></i></span>
                    Fasilitas
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
                <a href="{{ route('pesantren.pendaftaran') }}" class="mob-link {{ request()->is('pesantren/pendaftaran') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#f0fdf4;color:#16a34a;"><i class="bi bi-person-plus-fill"></i></span>
                    Pendaftaran
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
            </div>

            <div class="mob-divider"></div>

            <!-- Madrasah Section -->
            <div class="mob-section">
                <div class="mob-section-label">
                    <span class="mob-section-text" style="color:#0891b2;">Madrasah</span>
                    <div class="mob-section-line" style="background:linear-gradient(to right,#0891b2,#06b6d4,transparent);"></div>
                </div>
                <a href="{{ route('madrasah.index') }}" class="mob-link {{ request()->is('madrasah') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#ecfeff;color:#0891b2;"><i class="bi bi-building-fill"></i></span>
                    Portal Madrasah
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
                <a href="{{ route('madrasah.profil') }}" class="mob-link {{ request()->is('madrasah/profil') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#f1f5f9;color:#0891b2;"><i class="bi bi-journal-text"></i></span>
                    Profil & Sejarah
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
                <a href="{{ route('madrasah.fasilitas') }}" class="mob-link {{ request()->is('madrasah/fasilitas') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#fffbeb;color:#d97706;"><i class="bi bi-building-check"></i></span>
                    Fasilitas
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
                <a href="{{ route('madrasah.pendaftaran') }}" class="mob-link {{ request()->is('madrasah/pendaftaran') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#f0fdf4;color:#16a34a;"><i class="bi bi-person-plus-fill"></i></span>
                    Pendaftaran
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
            </div>

            <div class="mob-divider"></div>

            <!-- Berita & Galeri -->
            <div class="mob-section">
                <div class="mob-section-label">
                    <span class="mob-section-text" style="color:#64748b;">Konten</span>
                    <div class="mob-section-line" style="background:linear-gradient(to right,#94a3b8,transparent);"></div>
                </div>
                <a href="{{ route('pesantren.berita') }}" class="mob-link {{ request()->is('pesantren/berita*') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#faf5ff;color:#7c3aed;"><i class="bi bi-newspaper"></i></span>
                    Berita & Informasi
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
                <a href="{{ route('galeri.index') }}" class="mob-link {{ request()->is('galeri*') ? 'active-mob' : '' }}">
                    <span class="mob-icon" style="background:#fff7ed;color:#ea580c;"><i class="bi bi-image"></i></span>
                    Galeri Foto
                    <i class="bi bi-chevron-right mob-arrow"></i>
                </a>
            </div>

            <div class="mob-divider"></div>

            <!-- CTA -->
            <div class="mob-cta">
                <a href="{{ route('pesantren.pendaftaran') }}" class="mob-cta-ppdb">PPDB 2026 →</a>
            </div>

        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="site-footer">
        <div class="container position-relative z-1">
            <div class="row g-5">

                <!-- Brand Col -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="footer-brand-box">E</div>
                        <span class="footer-brand">Miftahul Ulum Jakarta<span style="color:#10b981;">.</span></span>
                    </div>
                    <p class="footer-tagline">Portal pendidikan terpadu Pesantren & Madrasah. Kami berdedikasi membentuk generasi Qur'ani yang berakhlak mulia dan berwawasan global.</p>
                    <div class="social-buttons mt-4">
                        <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>

                <!-- Pesantren Links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h4 class="footer-col-title">Pesantren</h4>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('pesantren.index') }}" class="footer-link">Portal Pesantren</a>
                        <a href="{{ route('pesantren.profil') }}" class="footer-link">Profil & Sejarah</a>
                        <a href="{{ route('pesantren.fasilitas') }}" class="footer-link">Fasilitas Asrama</a>
                        <a href="{{ route('pesantren.pendaftaran') }}" class="footer-link">Info Pendaftaran</a>
                        <a href="{{ route('pesantren.donasi') }}" class="footer-link">Investasi Akhirat</a>
                    </div>
                </div>

                <!-- Madrasah Links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h4 class="footer-col-title">Madrasah</h4>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('madrasah.index') }}" class="footer-link">Portal Madrasah</a>
                        <a href="{{ route('madrasah.profil') }}" class="footer-link">Profil Lembaga</a>
                        <a href="{{ route('madrasah.fasilitas') }}" class="footer-link">Fasilitas Sekolah</a>
                        <a href="{{ route('madrasah.pendaftaran') }}" class="footer-link">Info Pendaftaran</a>
                        <a href="{{ route('galeri.index') }}" class="footer-link">Galeri Prestasi</a>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="col-lg-4 col-md-6">
                    <h4 class="footer-col-title">Hubungi Kami</h4>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <strong>Alamat Utama</strong><br>
                            Gedung Utama Diniyah Mifathul Ulum Panggilingan Rt.08/Rw.06 Cakung Jakarta Timur
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div>
                            <strong>Telepon / WhatsApp</strong><br>
                            +62 878 0065 4979
                        </div>
                    </div>
                    <div class="footer-contact-item mb-0">
                        <div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div>
                            <strong>Email Resmi</strong><br>
                            yayasanmiftahululum57@gmail.com
                        </div>
                    </div>
                </div>

            </div>

            <hr class="footer-divider">
            
            <div class="footer-bottom">
                <div class="footer-copy">
                    &copy; {{ date('Y') }} <strong>ppmuajakarta</strong>. Hak Cipta Dilindungi.
                </div>
                <div class="d-flex gap-4">
                    <a href="#" class="footer-link text-decoration-none mb-0" style="padding:0;">Kebijakan Privasi</a>
                    <a href="#" class="footer-link text-decoration-none mb-0" style="padding:0;">Syarat Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Controls -->
    <div class="floating-controls">
        <a href="https://wa.me/6281234567890" target="_blank" class="btn-float btn-wa" title="Hubungi Kami via WhatsApp">
            <i class="bi bi-whatsapp"></i>
        </a>
        <button onclick="scrollToTop()" class="btn-float btn-back-to-top" title="Kembali ke Atas">
            <i class="bi bi-arrow-up"></i>
        </button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            mirror: false,
            offset: 100
        });

        // Back to Top & Nav Scroll
        const backToTop = document.querySelector('.btn-back-to-top');
        const navbar = document.getElementById('main-navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }

            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }, { passive: true });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>
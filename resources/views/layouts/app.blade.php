<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PPMUJakarta — Pesantren & Madrasah Terpadu')</title>
    <meta name="description" content="@yield('meta_description', 'Portal resmi Pesantren dan Madrasah Terpadu. Mendidik generasi cerdas, berakhlak mulia, dan berwawasan global.')">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'PPMUJakarta — Pesantren & Madrasah Terpadu')">
    <meta property="og:description" content="@yield('meta_description', 'Portal resmi Pesantren dan Madrasah Terpadu. Mendidik generasi cerdas, berakhlak mulia, dan berwawasan global.')">
    <meta property="og:image" content="@yield('og_image', asset('images/WEBSITE1.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'PPMUJakarta — Pesantren & Madrasah Terpadu')">
    <meta property="twitter:description" content="@yield('meta_description', 'Portal resmi Pesantren dan Madrasah Terpadu. Mendidik generasi cerdas, berakhlak mulia, dan berwawasan global.')">
    <meta property="twitter:image" content="@yield('og_image', asset('images/WEBSITE1.png'))">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/WEBSITE1.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
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
            transition: all 0.4s cubic-bezier(.4,0,.2,1);
            background: var(--grad-primary);
            box-shadow: 0 4px 20px rgba(5,150,105,0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 0;
        }

        @media (max-width: 991px) {
            #main-navbar {
                padding: 10px 0;
            }
        }

        .nav-logo {
            height: 55px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
            transition: all 0.3s ease;
        }

        @media (max-width: 991px) {
            .nav-logo {
                height: 45px;
                max-width: 240px;
            }
        }

        @media (max-width: 480px) {
            .nav-logo {
                height: 36px;
                max-width: 190px;
            }
        }

        #main-navbar.scrolled {
            background: linear-gradient(135deg, #064e3b 0%, #047857 100%);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        #main-navbar .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 600; font-size: 0.9rem; padding: 0.4rem 0.9rem !important; border-radius: 8px; transition: all 0.2s; }
        #main-navbar .nav-link:hover { color: #ffffff !important; background: rgba(255, 255, 255, 0.15); }
        #main-navbar .nav-link.active-nav { color: #ffffff !important; background: rgba(255, 255, 255, 0.2); }
        
        #main-navbar.scrolled .nav-link { color: rgba(255,255,255,0.85) !important; }
        #main-navbar.scrolled .nav-link:hover,
        #main-navbar.scrolled .nav-link.active-nav { color: #ffffff !important; background: rgba(255, 255, 255, 0.15); }

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
        .nav-hamburger:hover { background: rgba(255,255,255,0.28); }

        /* Dropdown Menu Desktop */
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

        .footer-brand { font-weight: 900; color: #ffffff; font-size: 1.5rem; letter-spacing: -0.5px; }
        
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



        /* ======= MOBILE OFFCANVAS MENU (BOOTSTRAP MURNI) ======= */
        #mobileMenu {
            max-width: 320px;
            border-left: none;
            background-color: #ffffff;
        }
        .mob-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 20px;
            background: linear-gradient(135deg, #064e3b 0%, #047857 100%);
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
        
        .mob-section { padding: 16px 20px 8px; }
        
        .mob-section-label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }
        .mob-section-line {
            flex: 1;
            height: 2px;
            border-radius: 2px;
        }
        .mob-section-text {
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            white-space: nowrap;
        }
        
        .mob-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #1e293b;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s;
            margin-bottom: 4px;
        }
        .mob-link:hover {
            background: #f8fafc;
            color: var(--c-primary);
            transform: translateX(4px);
        }
        .mob-link.active-mob {
            background: rgba(5,150,105,0.08);
            color: var(--c-primary);
        }
        
        .mob-link .mob-icon {
            width: 36px; height: 36px;
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }
        .mob-link .mob-arrow {
            margin-left: auto;
            font-size: 0.8rem;
            opacity: 0.35;
            transition: opacity 0.2s;
        }
        .mob-link:hover .mob-arrow { opacity: 0.7; }
        
        .mob-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e2e8f0 30%, #e2e8f0 70%, transparent);
            margin: 6px 20px;
        }

        .mob-cta { padding: 16px 20px 24px; }
        .mob-cta-ppdb {
            display: block;
            text-align: center;
            padding: 14px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 1rem;
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
            align-items: center;
            gap: 12px;
            z-index: 1050;
        }
        .btn-float, .btn-social-float {
            width: 48px; height: 48px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
            color: white;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            border: none;
        }
        .btn-float:hover, .btn-social-float:hover {
            transform: scale(1.1) translateY(-5px);
            color: white;
        }
        .btn-wa {
            background: #25d366;
        }
        .btn-ig { background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%); }
        .btn-yt { background: #FF0000; }
        .btn-tiktok { background: #000000; }
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
            .btn-float, .btn-social-float { width: 42px; height: 42px; font-size: 1.15rem; }
            .floating-controls { bottom: 20px; right: 20px; }
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

    <nav id="main-navbar">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('madrasah.index') }}" title="Portal Madrasah">
                    <img src="{{ asset('images/WEBSITE.png') }}" alt="Logo Madrasah" class="nav-logo"> 
                </a>
            </div>

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

            <div class="d-none d-lg-flex align-items-center gap-3">
                <a href="{{ route('pesantren.pendaftaran') }}" class="btn-nav-ppdb">PPDB 2026</a>
            </div>

            <div class="d-flex d-lg-none align-items-center gap-2">
                <button class="nav-hamburger" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" type="button" aria-label="Buka Menu">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
        
        <div class="mob-header">
            <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('images/WEBSITE1.png') }}" alt="Logo Pesantren" style="height: 40px; width: auto; object-fit: contain;">
            </a>
            <button class="mob-close-btn" data-bs-dismiss="offcanvas" aria-label="Tutup">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="mob-body">

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

            <div class="mob-cta">
                <a href="{{ route('pesantren.pendaftaran') }}" class="mob-cta-ppdb">PPDB 2026 →</a>
            </div>

        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container position-relative z-1">
            <div class="row g-5">

                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <span class="footer-brand">Miftahul Ulum Jakarta<span style="color:#10b981;">.</span></span>
                    </div>
                    <p class="footer-tagline">Portal pendidikan terpadu Pesantren & Madrasah. Kami berdedikasi membentuk generasi Qur'ani yang berakhlak mulia dan berwawasan global.</p>
                </div>

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

                <div class="col-lg-4 col-md-6">
                    <h4 class="footer-col-title">Hubungi Kami</h4>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <strong>Alamat Madrasah</strong><br>
                            Gedung Miftahul Ulum, Kp. Penggilingan RT.008/RW.006, Kel. Penggilingan Cakung Jakarta Timur DKI Jakarta
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <strong>Alamat Pondok Pesantren</strong><br>
                            Pondok Pesantren Miftahul Ulum, Kp. Pulongandang, Sindangsari Cabangbungin Bekasi Jawa Barat
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div>
                            <strong>Telepon / WhatsApp</strong><br>
                            +62 878-0065-4974<br>
                            +62 859-5986-6426
                        </div>
                    </div>
                    <div class="footer-contact-item mb-0">
                        <div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div>
                            <strong>Email Resmi</strong><br>
                            Admin@ppmiful.com
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

    <div class="floating-controls">
        <a href="https://www.instagram.com/mediamifulofficial/" target="_blank" class="btn-social-float btn-ig" title="Instagram">
            <i class="bi bi-instagram"></i>
        </a>
        <a href="https://youtube.com/@miftahululumtv?si=pSyQDU4wpBlN_8pZ" target="_blank" class="btn-social-float btn-yt" title="YouTube">
            <i class="bi bi-youtube"></i>
        </a>
        <a href="https://www.tiktok.com/@mediamifulofficial?_r=1&_t=ZS-96UH0FW4jSO" target="_blank" class="btn-social-float btn-tiktok" title="TikTok">
            <i class="bi bi-tiktok"></i>
        </a>
        <a href="https://wa.me/62859598664266" target="_blank" class="btn-float btn-wa" title="Hubungi Kami via WhatsApp">
            <i class="bi bi-whatsapp"></i>
        </a>
        <button onclick="scrollToTop()" class="btn-float btn-back-to-top" title="Kembali ke Atas">
            <i class="bi bi-arrow-up"></i>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

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
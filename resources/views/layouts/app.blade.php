<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Educate Portal — Pesantren & Madrasah Terpadu')</title>
    <meta name="description" content="Portal resmi Pesantren dan Madrasah Terpadu. Mendidik generasi cerdas, berakhlak mulia, dan berwawasan global.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * { box-sizing: border-box; }

        :root {
            --font-main: 'Plus Jakarta Sans', sans-serif;
            --c-primary: #6366f1;
            --c-violet: #8b5cf6;
            --c-cyan: #06b6d4;
            --c-green: #10b981;
            --grad-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #06b6d4 100%);
            --grad-hero: linear-gradient(135deg, #0a0f2e 0%, #1a1040 50%, #0d2137 100%);
            --nav-h: 72px;
            --radius-lg: 20px;
            --radius-xl: 28px;
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
            transition: all 0.35s ease;
            /* Default: transparent for hero pages */
            background: transparent;
        }

        #main-navbar.scrolled {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            box-shadow: 0 2px 30px rgba(0,0,0,0.06);
            border-bottom: 1px solid rgba(255,255,255,0.5);
        }

        #main-navbar.scrolled .nav-link { color: #334155 !important; }
        #main-navbar.scrolled .brand-text { color: #0f172a !important; }
        #main-navbar.scrolled .nav-link:hover,
        #main-navbar.scrolled .nav-link.active-nav { color: var(--c-primary) !important; }

        /* Default (transparent) colors */
        #main-navbar .brand-text { color: #ffffff; font-weight: 800; font-size: 1.15rem; letter-spacing: -0.5px; transition: color 0.3s; }
        #main-navbar .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 600; font-size: 0.9rem; padding: 0.4rem 0.9rem !important; border-radius: 8px; transition: all 0.2s; }
        #main-navbar .nav-link:hover { color: #fff !important; background: rgba(255,255,255,0.1); }
        #main-navbar .nav-link.active-nav { color: #fff !important; }

        .nav-logo-box {
            width: 36px;
            height: 36px;
            background: var(--grad-primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 1rem;
            color: white;
            flex-shrink: 0;
        }

        .btn-nav-ppdb {
            background: var(--grad-primary);
            color: #fff !important;
            border: none;
            padding: 8px 22px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99,102,241,0.35);
            display: inline-block;
        }

        .btn-nav-ppdb:hover {
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99,102,241,0.5);
        }

        .btn-nav-login {
            color: rgba(255,255,255,0.8) !important;
            border: 1px solid rgba(255,255,255,0.25);
            padding: 7px 18px;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }

        #main-navbar.scrolled .btn-nav-login {
            color: #475569 !important;
            border-color: #cbd5e1;
        }

        .btn-nav-login:hover {
            background: rgba(255,255,255,0.15);
            color: #fff !important;
        }

        #main-navbar.scrolled .btn-nav-login:hover {
            background: #f1f5f9;
            color: var(--c-primary) !important;
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
            background: rgba(99,102,241,0.08);
            color: var(--c-primary);
        }

        /* Main content - no top padding by default (hero handles it) */
        main { min-height: 80vh; }

        /* ======= FOOTER ======= */
        .site-footer {
            background: #0a0f2e;
            color: #94a3b8;
            padding: 80px 0 30px;
            margin-top: 0;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        .footer-brand { font-weight: 800; color: #f1f5f9; font-size: 1.15rem; }

        .footer-heading {
            color: #e2e8f0;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .footer-link {
            display: block;
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
            padding: 5px 0;
            transition: color 0.25s, padding-left 0.25s;
        }

        .footer-link:hover { color: #a5b4fc; padding-left: 6px; }

        .footer-contact {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 16px;
            font-size: 0.88rem;
        }

        .footer-contact-icon {
            width: 34px;
            height: 34px;
            background: rgba(99,102,241,0.15);
            color: #a5b4fc;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 0.9rem;
        }

        .footer-divider {
            border-color: rgba(255,255,255,0.06);
            margin: 40px 0 24px;
        }

        .social-btn {
            width: 38px;
            height: 38px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.25s;
        }

        .social-btn:hover {
            background: var(--c-primary);
            border-color: var(--c-primary);
            color: #fff;
            transform: translateY(-3px);
        }

        /* ======= PAGE PADDING FOR NON-HERO PAGES ======= */
        .page-padded-top { padding-top: calc(var(--nav-h) + 20px); }
    </style>

    @yield('styles')
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav id="main-navbar">
        <div class="container h-100 d-flex align-items-center justify-content-between">
            <!-- Brand -->
            <a href="{{ url('/') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                <div class="nav-logo-box">E</div>
                <span class="brand-text">Educate<span style="color:var(--c-cyan);">.</span></span>
            </a>

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
                        <li><a class="dropdown-item" href="{{ route('pesantren.donasi') }}"><i class="bi bi-heart me-2 text-danger"></i>Investasi Akhirat</a></li>
                        <li><a class="dropdown-item" href="{{ route('pesantren.pendaftaran') }}"><i class="bi bi-person-plus me-2 text-primary"></i>Pendaftaran</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('madrasah*') ? 'active-nav' : '' }}"
                       href="#" data-bs-toggle="dropdown" role="button">Madrasah</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('madrasah.index') }}"><i class="bi bi-building me-2 text-primary"></i>Portal Madrasah</a></li>
                        <li><a class="dropdown-item" href="{{ route('madrasah.fasilitas') }}"><i class="bi bi-building-check me-2 text-warning"></i>Fasilitas</a></li>
                        <li><a class="dropdown-item" href="{{ route('madrasah.pendaftaran') }}"><i class="bi bi-person-plus me-2 text-success"></i>Pendaftaran</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pesantren/berita*') ? 'active-nav' : '' }}" href="{{ route('pesantren.berita') }}">Berita</a>
                </li>
            </ul>

            <!-- CTA Buttons -->
            <div class="d-none d-lg-flex align-items-center gap-2">
                <a href="#" class="btn-nav-login">Masuk</a>
                <a href="{{ route('pesantren.pendaftaran') }}" class="btn-nav-ppdb">PPDB 2026</a>
            </div>

            <!-- Mobile Toggle -->
            <button class="d-lg-none border-0 p-0" style="background:transparent;color:rgba(255,255,255,0.85);"
                    data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" type="button">
                <i class="bi bi-list" style="font-size:1.8rem;"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" style="max-width:300px;">
        <div class="offcanvas-header border-bottom" style="padding: 20px;">
            <div class="d-flex align-items-center gap-2">
                <div class="nav-logo-box" style="width:30px;height:30px;font-size:0.8rem;">E</div>
                <span style="font-weight:800;font-size:1rem;color:#0f172a;">Educate<span style="color:var(--c-primary);">.</span></span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-4">
            <div class="d-flex flex-column gap-1">
                <a href="{{ url('/') }}" class="footer-link py-2" style="font-size:0.95rem;color:#0f172a;font-weight:600;">🏠 Beranda</a>
                <hr style="margin:10px 0;border-color:#f1f5f9;">
                <div style="font-size:0.75rem;text-transform:uppercase;letter-spacing:1px;color:#94a3b8;font-weight:700;margin-bottom:8px;">Pesantren</div>
                <a href="{{ route('pesantren.index') }}" class="footer-link">Portal Pesantren</a>
                <a href="{{ route('pesantren.donasi') }}" class="footer-link">Investasi Akhirat</a>
                <a href="{{ route('pesantren.pendaftaran') }}" class="footer-link">Pendaftaran</a>
                <hr style="margin:10px 0;border-color:#f1f5f9;">
                <div style="font-size:0.75rem;text-transform:uppercase;letter-spacing:1px;color:#94a3b8;font-weight:700;margin-bottom:8px;">Madrasah</div>
                <a href="{{ route('madrasah.index') }}" class="footer-link">Portal Madrasah</a>
                <a href="{{ route('madrasah.fasilitas') }}" class="footer-link">Fasilitas</a>
                <a href="{{ route('madrasah.pendaftaran') }}" class="footer-link">Pendaftaran</a>
                <hr style="margin:10px 0;border-color:#f1f5f9;">
                <a href="{{ route('pesantren.berita') }}" class="footer-link" style="color:#0f172a;font-weight:600;">📰 Berita</a>
                <div class="mt-4 d-flex flex-column gap-2">
                    <a href="#" class="btn btn-outline-primary rounded-pill fw-semibold">Masuk</a>
                    <a href="{{ route('pesantren.pendaftaran') }}" class="btn-nav-ppdb text-center rounded-pill" style="padding:10px;">PPDB 2026</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="site-footer">
        <div class="container">
            <div class="row g-5 mb-4">
                <!-- Brand Col -->
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div class="nav-logo-box">E</div>
                        <span class="footer-brand">Educate<span style="color:var(--c-cyan);">.</span></span>
                    </div>
                    <p style="color:#64748b;font-size:0.9rem;line-height:1.8;max-width:300px;">
                        Membangun generasi cerdas, berakhlak mulia, dan tangguh di era global melalui pendidikan terpadu Pesantren dan Madrasah.
                    </p>
                    <div class="d-flex gap-2 mt-4">
                        <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Pesantren -->
                <div class="col-lg-2 col-6">
                    <div class="footer-heading">Pesantren</div>
                    <a href="{{ route('pesantren.index') }}" class="footer-link">Tentang Kami</a>
                    <a href="{{ route('pesantren.pendaftaran') }}" class="footer-link">Pendaftaran</a>
                    <a href="{{ route('pesantren.donasi') }}" class="footer-link">Investasi Akhirat</a>
                    <a href="{{ route('pesantren.berita') }}" class="footer-link">Berita</a>
                </div>

                <!-- Madrasah -->
                <div class="col-lg-2 col-6">
                    <div class="footer-heading">Madrasah</div>
                    <a href="{{ route('madrasah.index') }}" class="footer-link">Tentang Kami</a>
                    <a href="{{ route('madrasah.pendaftaran') }}" class="footer-link">Pendaftaran</a>
                    <a href="{{ route('madrasah.fasilitas') }}" class="footer-link">Fasilitas</a>
                </div>

                <!-- Contact -->
                <div class="col-lg-4">
                    <div class="footer-heading">Hubungi Kami</div>
                    <div class="footer-contact">
                        <div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <span>Jl. Pendidikan No. 1, Pesantren Terpadu, Jawa Timur</span>
                    </div>
                    <div class="footer-contact">
                        <div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div>
                        <span>+62 812 3456 7890</span>
                    </div>
                    <div class="footer-contact">
                        <div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div>
                        <span>info@educateportal.sch.id</span>
                    </div>
                    <div class="footer-contact">
                        <div class="footer-contact-icon"><i class="bi bi-clock-fill"></i></div>
                        <span>Senin – Jumat, 08.00 – 16.00 WIB</span>
                    </div>
                </div>
            </div>

            <hr class="footer-divider">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <p class="mb-0" style="font-size:0.82rem;color:#475569;">
                    &copy; {{ date('Y') }} Educate Portal — Pesantren &amp; Madrasah Terpadu. All Rights Reserved.
                </p>
                <div class="d-flex gap-3" style="font-size:0.82rem;">
                    <a href="#" class="footer-link" style="padding:0;">Kebijakan Privasi</a>
                    <a href="#" class="footer-link" style="padding:0;">Syarat &amp; Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Navbar Scroll Effect -->
    <script>
        const navbar = document.getElementById('main-navbar');
        // Detect any dark-background hero section for transparent navbar
        const heroSection = document.querySelector('.hero-home, .donasi-hero, .hero-pesantren, .berita-hero, .hero-madrasah, .pendaftaran-hero, .profil-hero');

        function updateNav() {
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
                // If no hero on page, always show scrolled style
                if (!heroSection) navbar.classList.add('scrolled');
            }
        }

        // Non-hero pages: always show solid navbar
        if (!heroSection) {
            navbar.classList.add('scrolled');
        }

        window.addEventListener('scroll', updateNav, { passive: true });
        updateNav();
    </script>

    @yield('scripts')
</body>
</html>
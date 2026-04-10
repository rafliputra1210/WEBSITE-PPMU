<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educate Portal - Pesantren & Madrasah Terpadu</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --poppins: 'Poppins', sans-serif;
            --grad-primary: linear-gradient(135deg, #0d6efd 0%, #20c997 100%);
            --grad-hero: linear-gradient(135deg, rgba(13, 110, 253, 0.05) 0%, rgba(32, 201, 151, 0.05) 100%);
            --shadow-sm: 0 4px 15px rgba(0,0,0,0.03);
            --shadow-md: 0 10px 30px rgba(0,0,0,0.06);
            --radius-md: 16px;
            --radius-lg: 24px;
        }

        body {
            font-family: var(--poppins);
            background-color: #fafbfc;
            color: #2b3440;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6, .fw-bold {
            font-weight: 700 !important;
            letter-spacing: -0.5px;
        }

        /* Glassmorphism Navbar */
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }

        .navbar-brand .logo-icon {
            width: 38px;
            height: 38px;
            background: var(--grad-primary);
            color: white;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            margin-right: 10px;
        }

        .nav-link {
            font-weight: 500;
            color: #495057;
            padding: 0.5rem 1rem !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: #0d6efd;
        }

        /* Global Premium Buttons */
        .btn-premium {
            background: var(--grad-primary);
            color: white;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(13, 110, 253, 0.2);
        }
        
        .btn-premium:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3);
        }

        /* Footer Elegant */
        .footer-dark {
            background-color: #0f172a;
            color: #94a3b8;
            border-top: 4px solid #0d6efd;
            padding-top: 80px;
            padding-bottom: 30px;
            margin-top: 80px;
        }
        
        .footer-dark h5 {
            color: #f8fafc;
            margin-bottom: 20px;
        }
        
        .footer-dark a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-dark a:hover {
            color: #38bdf8;
        }

        /* Wrapper for main content to avoid overlap with sticky nav */
        main {
            min-height: 80vh;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top glass-nav py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold text-dark" href="{{ url('/') }}">
                <div class="logo-icon shadow-sm">E</div>
                Educate
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto gap-1 gap-lg-3">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Pesantren</a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-4">
                            <li><a class="dropdown-item py-2" href="#">Profil & Tentang</a></li>
                            <li><a class="dropdown-item py-2" href="#">Fasilitas</a></li>
                            <li><a class="dropdown-item py-2" href="#">Investasi Akhirat (Donasi)</a></li>
                            <li><a class="dropdown-item py-2" href="#">Galeri Prestasi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Madrasah</a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-4">
                            <li><a class="dropdown-item py-2" href="#">Profil Madrasah</a></li>
                            <li><a class="dropdown-item py-2" href="#">Fasilitas</a></li>
                            <li><a class="dropdown-item py-2" href="#">Galeri</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
                </ul>
                <div class="d-flex mt-3 mt-lg-0 gap-2">
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4 fw-semibold border-2">Masuk</a>
                    <a href="#" class="btn btn-premium rounded-pill px-4 fw-semibold">PPDB 2026</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer-dark">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <a class="navbar-brand d-flex align-items-center fw-bold text-white mb-3" href="#">
                        <div class="logo-icon shadow-sm me-2">E</div>
                        Educate Portal
                    </a>
                    <p class="text-sm pe-lg-5">Membangun generasi cerdas, berakhlak mulia, dan tangguh di era digital melalui pendidikan terpadu Pesantren dan Madrasah.</p>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5>Pesantren</h5>
                    <ul class="list-unstyled space-y-2">
                        <li class="mb-2"><a href="#">Profil</a></li>
                        <li class="mb-2"><a href="#">Pendaftaran</a></li>
                        <li class="mb-2"><a href="#">Investasi Akhirat</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5>Madrasah</h5>
                    <ul class="list-unstyled space-y-2">
                        <li class="mb-2"><a href="#">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#">Fasilitas</a></li>
                        <li class="mb-2"><a href="#">Galeri</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h5>Hubungi Kami</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="bi bi-geo-alt me-2 text-primary"></i> Jl. Pendidikan No. 123, Jawa Timur</li>
                        <li class="mb-3"><i class="bi bi-envelope me-2 text-primary"></i> info@educate.sch.id</li>
                        <li class="mb-3"><i class="bi bi-telephone me-2 text-primary"></i> +62 812 3456 7890</li>
                    </ul>
                </div>
            </div>
            <div class="text-center border-top border-secondary pt-4 mt-4">
                <p class="mb-0">&copy; 2026 Educate Portal. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
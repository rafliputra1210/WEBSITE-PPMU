<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ADMIN PPMU</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 20px;
            z-index: 1050;
            transition: all 0.3s;
        }
        .main-content {
            margin-left: 260px;
            padding: 30px;
            transition: all 0.3s;
        }
        .nav-link {
            color: #64748b;
            font-weight: 500;
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 5px;
            transition: all 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #f1f5f9;
            color: #4f46e5;
        }
        .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        .topbar {
            background: #ffffff;
            padding: 15px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .card-stat {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        .card-stat:hover {
            transform: translateY(-5px);
        }
        .logo-text {
            font-weight: 800;
            font-size: 1.2rem;
            color: #0f172a;
            margin-bottom: 30px;
            display: block;
            text-align: center;
        }
        
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.5);
            z-index: 1040;
            display: none;
        }

        .sidebar-overlay.active {
            display: block;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
            .topbar {
                padding: 15px;
            }
            .topbar h4 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <a href="{{ route('admin.dashboard') }}" class="logo-text text-decoration-none">
            PPMU<span class="text-primary">Admin</span>
        </a>
        
        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.banner.index') }}" class="nav-link {{ request()->is('admin/banner*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i> Banner Utama (Home)
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.pesantren-banner.index') }}" class="nav-link {{ request()->is('admin/pesantren-banner*') ? 'active' : '' }}">
                    <i class="bi bi-image-fill"></i> Banner Pesantren
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.testimoni.index') }}" class="nav-link {{ request()->is('admin/testimoni*') ? 'active' : '' }}">
                    <i class="bi bi-chat-quote-fill"></i> Testimoni
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.berita.index') }}" class="nav-link {{ request()->is('admin/berita*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Berita
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.donasi.index') }}" class="nav-link {{ request()->is('admin/donasi*') ? 'active' : '' }}">
                    <i class="bi bi-heart-fill"></i> Donasi & Donatur
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.qris.index') }}" class="nav-link {{ request()->is('admin/qris*') ? 'active' : '' }}">
                    <i class="bi bi-qr-code-scan"></i> Kelola QRIS
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.galeri.index') }}" class="nav-link {{ request()->is('admin/galeri*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i> Galeri
                </a>
            </li>

            <li class="nav-header text-uppercase text-xs fw-bold mt-3 mb-1 opacity-50 px-3" style="font-size: 0.7rem;">PPDB (Pendaftaran)</li>
            <li class="nav-item">
                <a href="{{ route('admin.pendaftaran.index') }}" class="nav-link {{ request()->is('admin/pendaftaran*') ? 'active' : '' }}">
                    <i class="bi bi-person-lines-fill"></i> Data Pendaftar
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.pembayaran-ppdb.index') }}" class="nav-link {{ request()->is('admin/pembayaran-ppdb*') ? 'active' : '' }}">
                    <i class="bi bi-bank"></i> Rekening PPDB
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.qris-ppdb.index') }}" class="nav-link {{ request()->is('admin/qris-ppdb*') ? 'active' : '' }}">
                    <i class="bi bi-qr-code"></i> QRIS PPDB
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.fasilitas.index') }}" class="nav-link {{ request()->is('admin/fasilitas*') ? 'active' : '' }}">
                    <i class="bi bi-building-check"></i> Fasilitas
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.progres.index') }}" class="nav-link {{ request()->is('admin/progres*') ? 'active' : '' }}">
                    <i class="bi bi-graph-up-arrow"></i> Hasil Progres
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.program.index') }}" class="nav-link {{ request()->is('admin/program*') ? 'active' : '' }}">
                    <i class="bi bi-star-fill"></i> Program
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.profile.index') }}" class="nav-link {{ request()->is('admin/profile*') ? 'active' : '' }}">
                    <i class="bi bi-person-workspace"></i> Pengaturan Profil
                </a>
            </li>
            <li class="nav-item mt-2">
                <div style="font-size:0.68rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;color:#94a3b8;padding:8px 16px;">PPDB</div>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.pembayaran-ppdb.index') }}" class="nav-link {{ request()->is('admin/pembayaran-ppdb*') ? 'active' : '' }}">
                    <i class="bi bi-credit-card-2-front"></i> Rekening PPDB
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.qris-ppdb.index') }}" class="nav-link {{ request()->is('admin/qris-ppdb*') ? 'active' : '' }}">
                    <i class="bi bi-qr-code"></i> QRIS PPDB
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.pendaftaran.index') }}" class="nav-link {{ request()->is('admin/pendaftaran*') ? 'active' : '' }}">
                    <i class="bi bi-person-lines-fill"></i> Pendaftaran
                </a>
            </li>
        </ul>
        
        <hr>
        <a href="{{ url('/') }}" class="nav-link text-danger" target="_blank">
            <i class="bi bi-box-arrow-right"></i> Kembali ke Web
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="d-flex align-items-center">
                <button class="btn btn-light d-md-none me-3" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h4 class="mb-0 fw-bold text-dark">@yield('title_page', 'Dashboard')</h4>
            </div>
            <div>
                <span class="fw-semibold d-none d-md-inline">Admin Sistem</span>
                <i class="bi bi-person-circle fs-4 ms-2 text-primary align-middle"></i>
            </div>
        </div>

        @yield('content')
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.getElementById("sidebarToggle");
        const sidebar = document.querySelector(".sidebar");
        const overlay = document.getElementById("sidebarOverlay");

        if (toggleBtn && sidebar && overlay) {
            toggleBtn.addEventListener("click", function() {
                sidebar.classList.toggle("active");
                overlay.classList.toggle("active");
            });

            overlay.addEventListener("click", function() {
                sidebar.classList.remove("active");
                overlay.classList.remove("active");
            });
        }
    });
</script>
@stack('scripts')
</body>
</html>

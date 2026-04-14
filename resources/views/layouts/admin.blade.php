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
            z-index: 100;
        }
        .main-content {
            margin-left: 260px;
            padding: 30px;
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
    </style>
</head>
<body>

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
                <a href="{{ route('admin.berita.index') }}" class="nav-link {{ request()->is('admin/berita*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Berita
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-heart-fill"></i> Donasi & Donatur
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.galeri.index') }}" class="nav-link {{ request()->is('admin/galeri*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i> Galeri
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.fasilitas.index') }}" class="nav-link {{ request()->is('admin/fasilitas*') ? 'active' : '' }}">
                    <i class="bi bi-building-check"></i> Fasilitas
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
            <h4 class="mb-0 fw-bold text-dark">@yield('title_page', 'Dashboard')</h4>
            <div>
                <span class="fw-semibold">Admin Sistem</span>
                <i class="bi bi-person-circle fs-4 ms-2 text-primary align-middle"></i>
            </div>
        </div>

        @yield('content')
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

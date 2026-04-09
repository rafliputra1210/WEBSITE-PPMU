<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPMU - Pondok Pesantren Mahasiswa Universal</title>
    <meta name="description" content="Pondok Pesantren Mahasiswa Universal - Cerdas, Berakhlak, dan Berprestasi. Menyatukan pendidikan madrasah dan kepesantrenan modern.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Outfit', sans-serif;
        }
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }
        .glass-dark {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .text-gradient {
            background: linear-gradient(135deg, #059669 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .bg-gradient-emerald {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .hero-bg {
            background-image: url('https://images.unsplash.com/photo-1585036156171-384164a8c675?auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .investasi-bg {
            background-image: url('https://images.unsplash.com/photo-1564619448831-4a11ee9ae8ef?auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .tab-btn {
            transition: all 0.3s ease;
        }
        .tab-btn.active {
            background-color: #059669; /* Emerald 600 */
            color: white;
            box-shadow: 0 10px 15px -3px rgba(5, 150, 105, 0.3);
        }
    </style>
</head>
<body class="antialiased text-slate-800" x-data="{ scrolled: false, mobileMenu: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">

    <!-- Navbar -->
    <nav :class="{ 'glass shadow-sm py-3': scrolled, 'bg-transparent py-5': !scrolled }" class="fixed w-full top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-emerald flex items-center justify-center text-white shadow-lg">
                        <i class="ph-fill ph-mosque text-xl"></i>
                    </div>
                    <div>
                        <span :class="{ 'text-slate-900': scrolled, 'text-white': !scrolled }" class="font-heading font-bold text-xl leading-none block transition-colors">PPMU</span>
                        <span :class="{ 'text-slate-600': scrolled, 'text-slate-200': !scrolled }" class="text-xs font-medium tracking-wider transition-colors">MAHASISWA UNIVERSAL</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#beranda" :class="{ 'text-slate-700 hover:text-emerald-600': scrolled, 'text-white/90 hover:text-white': !scrolled }" class="font-medium text-sm transition-colors">Beranda</a>
                    <a href="#pesantren" :class="{ 'text-slate-700 hover:text-emerald-600': scrolled, 'text-white/90 hover:text-white': !scrolled }" class="font-medium text-sm transition-colors">Pesantren</a>
                    <a href="#madrasah" :class="{ 'text-slate-700 hover:text-emerald-600': scrolled, 'text-white/90 hover:text-white': !scrolled }" class="font-medium text-sm transition-colors">Madrasah</a>
                    <a href="#investasi" :class="{ 'text-slate-700 hover:text-emerald-600': scrolled, 'text-white/90 hover:text-white': !scrolled }" class="font-medium text-sm transition-colors flex items-center gap-1">
                        <i class="ph-fill ph-heart text-rose-500"></i> Donasi
                    </a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-sm transition-all shadow-lg shadow-emerald-600/30">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" :class="{ 'text-slate-700 hover:bg-slate-100': scrolled, 'text-white hover:bg-white/20': !scrolled }" class="px-5 py-2.5 rounded-full font-medium text-sm transition-all">
                            Masuk
                        </a>
                        <a href="#pendaftaran" class="px-5 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-sm transition-all shadow-lg shadow-emerald-600/30">
                            Daftar Sekarang
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenu = !mobileMenu" :class="{ 'text-slate-900': scrolled, 'text-white': !scrolled }">
                        <i class="ph ph-list text-3xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenu" x-transition class="md:hidden absolute top-full left-0 w-full bg-white shadow-xl border-t border-slate-100">
            <div class="flex flex-col py-4 px-6 space-y-4">
                <a href="#beranda" class="text-slate-700 font-medium pb-2 border-b border-slate-50">Beranda</a>
                <a href="#pesantren" class="text-slate-700 font-medium pb-2 border-b border-slate-50">Pesantren</a>
                <a href="#madrasah" class="text-slate-700 font-medium pb-2 border-b border-slate-50">Madrasah</a>
                <a href="#investasi" class="text-emerald-600 font-medium pb-2 border-b border-slate-50 flex items-center gap-2"><i class="ph-fill ph-heart text-rose-500"></i> Investasi Akhirat</a>
                <div class="pt-2 flex flex-col gap-3">
                    <a href="{{ route('login') }}" class="w-full py-2.5 text-center rounded-lg border border-slate-200 text-slate-700 font-medium">Masuk</a>
                    <a href="#pendaftaran" class="w-full py-2.5 text-center rounded-lg bg-emerald-600 text-white font-medium">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen min-h-[700px] flex items-center hero-bg">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/70 to-slate-900/30"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full pt-20">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white/90 text-sm font-medium mb-6">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Penerimaan Santri Baru Telah Dibuka
                </div>
                <h1 class="text-5xl md:text-7xl font-heading font-extrabold text-white leading-tight mb-6">
                    Generasi Cerdas, <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Berakhlakul Karimah.</span>
                </h1>
                <p class="text-lg md:text-xl text-slate-300 font-light mb-10 max-w-2xl leading-relaxed">
                    Pondok Pesantren Mahasiswa Universal memadukan keunggulan pendidikan madrasah modern dengan tradisi kepesantrenan yang kuat untuk menyongsong masa depan permata umat.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#pesantren" class="px-8 py-3.5 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-lg transition-all shadow-[0_0_20px_rgba(5,150,105,0.4)] hover:shadow-[0_0_30px_rgba(5,150,105,0.6)] flex items-center gap-2">
                        Jelajahi Program <i class="ph-bold ph-arrow-right"></i>
                    </a>
                    <a href="#video-profil" class="px-8 py-3.5 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white font-semibold text-lg transition-all flex items-center gap-2">
                        <i class="ph-fill ph-play-circle text-2xl"></i> Video Profil
                    </a>
                </div>
            </div>
            
            <!-- Quick Stats -->
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl">
                <div class="backdrop-blur-md bg-white/5 border border-white/10 p-5 rounded-2xl">
                    <h3 class="text-3xl font-heading font-bold text-white mb-1">15+</h3>
                    <p class="text-slate-400 text-sm font-medium">Tahun Pengalaman</p>
                </div>
                <div class="backdrop-blur-md bg-white/5 border border-white/10 p-5 rounded-2xl">
                    <h3 class="text-3xl font-heading font-bold text-white mb-1">450+</h3>
                    <p class="text-slate-400 text-sm font-medium">Santri Aktif</p>
                </div>
                <div class="backdrop-blur-md bg-white/5 border border-white/10 p-5 rounded-2xl">
                    <h3 class="text-3xl font-heading font-bold text-white mb-1">98%</h3>
                    <p class="text-slate-400 text-sm font-medium">Tingkat Kelulusan</p>
                </div>
                <div class="backdrop-blur-md bg-white/5 border border-white/10 p-5 rounded-2xl">
                    <h3 class="text-3xl font-heading font-bold text-white mb-1">A</h3>
                    <p class="text-slate-400 text-sm font-medium">Akreditasi Madrasah</p>
                </div>
            </div>
        </div>
        
        <!-- Scrolling indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <a href="#program" class="text-white/50 hover:text-white transition-colors">
                <i class="ph ph-mouse-simple text-3xl"></i>
            </a>
        </div>
    </section>

    <!-- Interactive Program Section (Pesantren & Madrasah Setup) -->
    <section id="program" class="py-24 relative overflow-hidden" x-data="{ activeTab: 'pesantren' }">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 -mr-40 -mt-40 w-96 h-96 rounded-full bg-emerald-100 opacity-50 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-40 -mb-40 w-96 h-96 rounded-full bg-sky-100 opacity-50 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-sm font-bold text-emerald-600 tracking-widest uppercase mb-2">Program Unggulan</h2>
                <h3 class="text-4xl font-heading font-bold text-slate-900 mb-6">Pilar Pendidikan PPMU</h3>
                
                <!-- Custom Toggle Switch -->
                <div class="inline-flex items-center p-1.5 bg-slate-100 rounded-full border border-slate-200">
                    <button @click="activeTab = 'pesantren'" :class="activeTab === 'pesantren' ? 'bg-white shadow-md text-emerald-700' : 'text-slate-500 hover:text-slate-700'" class="px-8 py-3 rounded-full font-semibold text-lg transition-all">
                        Pesantren
                    </button>
                    <button @click="activeTab = 'madrasah'" :class="activeTab === 'madrasah' ? 'bg-white shadow-md text-blue-700' : 'text-slate-500 hover:text-slate-700'" class="px-8 py-3 rounded-full font-semibold text-lg transition-all">
                        Madrasah
                    </button>
                </div>
            </div>

            <!-- Pesantren Content -->
            <div x-show="activeTab === 'pesantren'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Feature 1 -->
                    <a href="#profil-pesantren" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-book-open-user text-2xl text-emerald-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Profil Pesantren</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Mengenal lebih dekat visi, misi, dan pimpinan Pondok Pesantren Mahasiswa Universal.</p>
                    </a>
                    
                    <!-- Feature 2 -->
                    <a href="#pendaftaran" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-user-plus text-2xl text-emerald-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Pendaftaran</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Informasi lengkap alur penerimaan santri baru, syarat, dan jadwal tes seleksi mukim.</p>
                    </a>

                    <!-- Feature 3 -->
                    <a href="#fasilitas" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-buildings text-2xl text-emerald-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Fasilitas</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Asrama nyaman, masjid representatif, perpustakaan kitab kuning, dan fasilitas pendukung lainnya.</p>
                    </a>

                    <!-- Feature 4 -->
                    <a href="#tentang" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-info text-2xl text-emerald-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Tentang Pesantren</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Sejarah berdirinya pesantren, kurikulum, serta metode pengajaran salaf dan khalaf.</p>
                    </a>

                    <!-- Feature 5 -->
                    <a href="#potret" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-camera text-2xl text-emerald-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Potret Pesantren</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Galeri kegiatan keseharian santri, sorogan, bandongan, dan kegiatan ro'an bersama.</p>
                    </a>

                    <!-- Feature 6 -->
                    <a href="#galeri-prestasi" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-medal text-2xl text-emerald-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Galeri Prestasi</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Kumpulan penghargaan santri dalam lomba MQK, pidato, pidato bahasa Arab, dan akademik.</p>
                    </a>

                    <!-- Feature 7 -->
                    <a href="#berita" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-newspaper text-2xl text-emerald-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Berita</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Informasi terkini, pengumuman, dan artikel kajian keislaman dari keluarga besar Pesantren.</p>
                    </a>
                    
                    <!-- Special Feature -->
                    <a href="#investasi" class="group bg-gradient-emerald p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer shadow-lg shadow-emerald-600/30">
                        <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform border border-white/30 backdrop-blur-sm">
                            <i class="ph-fill ph-hand-coins text-2xl text-white"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-white mb-2">Investasi Akhirat</h4>
                        <p class="text-emerald-50 text-sm leading-relaxed mb-4">Salurkan jariyah Anda untuk pembangunan dan pengembangan pesantren.</p>
                        <span class="text-white font-medium text-sm flex items-center gap-1 group-hover:gap-2 transition-all">Lihat Detail <i class="ph-bold ph-arrow-right"></i></span>
                    </a>
                </div>
            </div>

            <!-- Madrasah Content -->
            <div x-show="activeTab === 'madrasah'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Feature 1 -->
                    <a href="#profil-madrasah" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-graduation-cap text-2xl text-blue-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Profil Madrasah</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Mengenal struktur organisasi, guru ahli, dan akreditasi madrasah terpadu.</p>
                    </a>
                    
                    <!-- Feature 2 -->
                    <a href="#pendaftaran-madrasah" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-laptop text-2xl text-blue-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Pendaftaran PPDB</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Sistem pendaftaran online madrasah, jadwal tes tulis, dan daftar ulang.</p>
                    </a>

                    <!-- Feature 3 -->
                    <a href="#fasilitas-madrasah" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-microscope text-2xl text-blue-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Fasilitas Edukasi</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Laboratorium sains, lab komputer, ruang kelas ber-AC, dan fasilitas modern lainnya.</p>
                    </a>

                    <!-- Feature 4 -->
                    <a href="#tentang-madrasah" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-exam text-2xl text-blue-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Tentang Kurikulum</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Integrasi kurikulum kemenag dengan muatan lokal pesantren yang komprehensif.</p>
                    </a>

                    <!-- Feature 5 -->
                    <a href="#potret-madrasah" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-users-three text-2xl text-blue-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Potret Madrasah</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Dokumentasi KBM aktif, praktikum, OSIS, dan kegiatan ekstrakurikuler.</p>
                    </a>

                    <!-- Feature 6 -->
                    <a href="#prestasi-madrasah" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-trophy text-2xl text-blue-600"></i>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Galeri Prestasi</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">Catatan emas siswa-siswi dalam olimpiade sains, KSM, dan kejuaraan nasional.</p>
                    </a>

                    <!-- Feature 7 -->
                    <a href="#berita-madrasah" class="group glass-card p-6 rounded-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer xl:col-span-2 flex flex-col md:flex-row items-center gap-6">
                        <div class="w-14 h-14 shrink-0 rounded-2xl bg-blue-100 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="ph-fill ph-chalkboard-teacher text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-heading font-bold text-slate-800 mb-2">Berita Pendidikan Madrasah</h4>
                            <p class="text-slate-600 text-sm leading-relaxed">Update seputar kegiatan madrasah, pengembangan guru, dan informasi kalender akademik secara real-time.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Investasi Akhirat (Donation) Section -->
    <section id="investasi" class="py-24 investasi-bg relative">
        <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="px-4 py-1.5 rounded-full bg-emerald-500/20 text-emerald-400 text-sm font-semibold border border-emerald-500/30 mb-6 inline-block">Investasi Akhirat</span>
                    <h2 class="text-4xl md:text-5xl font-heading font-bold text-white mb-6 leading-tight">Bersama Membangun <br><span class="text-emerald-400">Pusat Peradaban Islam.</span></h2>
                    <p class="text-slate-300 text-lg mb-8 leading-relaxed">
                        Donasi Anda sangat berarti untuk pengembangan fasilitas dan asrama santri. Program "Investasi Akhirat" memberi kemudahan donatur untuk beramal jariyah dengan transparansi penuh.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#input-donatur" class="px-8 py-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-lg text-center transition-all flex items-center justify-center gap-2">
                            <i class="ph-fill ph-wallet"></i> Mulai Donasi
                        </a>
                        <a href="#laporan-statistik" class="px-8 py-4 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur border border-white/20 text-white font-bold text-lg text-center transition-all flex items-center justify-center gap-2">
                            <i class="ph-bold ph-chart-bar"></i> Laporan Statistik
                        </a>
                    </div>
                </div>

                <!-- Stats Dashboard Preview -->
                <div class="glass-dark p-8 rounded-3xl border border-slate-700/50 shadow-2xl relative">
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-emerald-500 rounded-full blur-3xl opacity-30"></div>
                    
                    <div class="flex justify-between items-center mb-8 border-b border-white/10 pb-4">
                        <h4 class="text-white font-heading font-semibold text-xl">Statistik Wakaf Pembangunan</h4>
                        <div class="px-3 py-1 bg-emerald-500/20 text-emerald-400 rounded-md text-xs font-bold">LIVE</div>
                    </div>
                    
                    <div class="mb-8">
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-slate-400">Terkumpul</span>
                            <span class="text-white font-bold">Rp 450.000.000</span>
                        </div>
                        <div class="w-full bg-slate-800 rounded-full h-3 mb-2">
                            <div class="bg-gradient-to-r from-emerald-500 to-teal-400 h-3 rounded-full" style="width: 45%"></div>
                        </div>
                        <div class="flex justify-between text-xs text-slate-500">
                            <span>45% dari target</span>
                            <span>Target: Rp 1 Milyar</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white/5 py-4 px-5 rounded-2xl border border-white/5">
                            <i class="ph-fill ph-users text-3xl text-emerald-400 mb-2"></i>
                            <h5 class="text-2xl font-bold text-white">124+</h5>
                            <p class="text-slate-400 text-xs mt-1">Donatur Aktif</p>
                        </div>
                        <div class="bg-white/5 py-4 px-5 rounded-2xl border border-white/5">
                            <i class="ph-fill ph-check-circle text-3xl text-blue-400 mb-2"></i>
                            <h5 class="text-2xl font-bold text-white">3</h5>
                            <p class="text-slate-400 text-xs mt-1">Proyek Selesai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Terkini -->
    <section id="berita" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-sm font-bold text-emerald-600 tracking-widest uppercase mb-2">Update Terkini</h2>
                    <h3 class="text-4xl font-heading font-bold text-slate-900">Berita & Artikel Menu</h3>
                </div>
                <a href="#" class="hidden md:flex items-center gap-1 text-slate-600 hover:text-emerald-600 font-medium transition-colors">
                    Lihat Semua Berita <i class="ph-bold ph-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News Card 1 -->
                <article class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="h-56 overflow-hidden relative">
                        <div class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-emerald-600">Pesantren</div>
                        <img src="https://images.unsplash.com/photo-1577553535919-4a460bdec22d?auto=format&fit=crop&w=800&q=80" alt="News Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-4 font-medium">
                            <span class="flex items-center gap-1"><i class="ph-fill ph-calendar-blank"></i> 24 Okt 2026</span>
                            <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                            <span class="flex items-center gap-1"><i class="ph-fill ph-user"></i> Admin</span>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors line-clamp-2">Peringatan Hari Santri Nasional dimeriahkan dengan Lomba MQK Tingkat Provinsi</h4>
                        <p class="text-slate-600 text-sm line-clamp-3 mb-5">Pondok Pesantren Mahasiswa Universal menjadi tuan rumah peringatan Hari Santri Nasional dengan mengadakan berbagai lomba keilmuan yang diikuti oleh pesantren se-provinsi...</p>
                        <a href="#" class="text-emerald-600 font-semibold text-sm flex items-center gap-1 group-hover:gap-2 transition-all">Baca Selengkapnya <i class="ph-bold ph-caret-right"></i></a>
                    </div>
                </article>

                <!-- News Card 2 -->
                <article class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="h-56 overflow-hidden relative">
                        <div class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-blue-600">Madrasah</div>
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=800&q=80" alt="News Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-4 font-medium">
                            <span class="flex items-center gap-1"><i class="ph-fill ph-calendar-blank"></i> 18 Okt 2026</span>
                            <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                            <span class="flex items-center gap-1"><i class="ph-fill ph-user"></i> Humas MA</span>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">Siswa Madrasah Aliyah PPMU Raih Medali Emas Olimpiade Sains Nasional</h4>
                        <p class="text-slate-600 text-sm line-clamp-3 mb-5">Prestasi membanggakan kembali ditorehkan oleh santri PPMU di kancah nasional, membuktikan bahwa santri tidak hanya unggul di bidang agama, tapi juga di bidang sains...</p>
                        <a href="#" class="text-blue-600 font-semibold text-sm flex items-center gap-1 group-hover:gap-2 transition-all">Baca Selengkapnya <i class="ph-bold ph-caret-right"></i></a>
                    </div>
                </article>

                <!-- News Card 3 -->
                <article class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="h-56 overflow-hidden relative">
                        <div class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-rose-600">Investasi Akhirat</div>
                        <img src="https://images.unsplash.com/photo-1542810634-71277d95dc8c?auto=format&fit=crop&w=800&q=80" alt="News Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-4 font-medium">
                            <span class="flex items-center gap-1"><i class="ph-fill ph-calendar-blank"></i> 10 Okt 2026</span>
                            <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                            <span class="flex items-center gap-1"><i class="ph-fill ph-user"></i> Panitia Pembangunan</span>
                        </div>
                        <h4 class="text-xl font-heading font-bold text-slate-900 mb-3 group-hover:text-rose-600 transition-colors line-clamp-2">Laporan Progres Pembangunan Gedung Asrama Putri Tahap 2</h4>
                        <p class="text-slate-600 text-sm line-clamp-3 mb-5">Alhamdulillah, berkat doa dan jariyah para donatur, pembangunan gedung asrama putri tahap 2 telah mencapai tahap pengerjaan struktur lantai 3 sesuai dengan jadwal kerja...</p>
                        <a href="#" class="text-rose-600 font-semibold text-sm flex items-center gap-1 group-hover:gap-2 transition-all">Baca Selengkapnya <i class="ph-bold ph-caret-right"></i></a>
                    </div>
                </article>
            </div>
            
            <div class="mt-8 text-center md:hidden">
                <a href="#" class="inline-flex items-center gap-1 text-emerald-600 font-semibold transition-colors">
                    Lihat Semua Berita <i class="ph-bold ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Call to Action Banner -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-primary rounded-3xl p-10 md:p-16 text-center space-y-8 relative overflow-hidden shadow-2xl">
                <!-- Decorative circles -->
                <div class="absolute -top-20 -left-20 w-64 h-64 border-[30px] border-white/5 rounded-full"></div>
                <div class="absolute -bottom-20 -right-20 w-64 h-64 border-[30px] border-emerald-500/10 rounded-full"></div>
                
                <div class="relative z-10 max-w-3xl mx-auto">
                    <h2 class="text-3xl md:text-5xl font-heading font-bold text-white mb-6">Siap Bergabung dengan Keluarga Besar PPMU?</h2>
                    <p class="text-slate-300 text-lg mb-10">Pendaftaran santri baru dan siswa madrasah tahun ajaran 2026/2027 telah dibuka. Kuota terbatas, segera daftarkan putra/putri Anda.</p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="#pendaftaran" class="px-8 py-4 rounded-full bg-emerald-500 hover:bg-emerald-400 text-slate-900 font-bold text-lg transition-all shadow-[0_0_20px_rgba(16,185,129,0.3)]">
                            Daftar Sekarang
                        </a>
                        <a href="#hubungi" class="px-8 py-4 rounded-full bg-white/10 hover:bg-white/20 text-white font-bold text-lg backdrop-blur border border-white/20 transition-all flex items-center justify-center gap-2">
                            <i class="ph-fill ph-whatsapp-logo text-green-400 text-xl"></i> Hubungi CS
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 pt-20 pb-10 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- Brand Info -->
                <div class="col-span-1 md:col-span-2 lg:col-span-1">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white">
                            <i class="ph-fill ph-mosque text-xl"></i>
                        </div>
                        <div>
                            <span class="text-white font-heading font-bold text-xl leading-none block">PPMU</span>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">
                        Pondok Pesantren Mahasiswa Universal berkomitmen mencetak generasi masa depan yang cerdas secara akademik dan kokoh dalam aqidah serta akhlak tauhid.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-emerald-600 hover:text-white transition-colors"><i class="ph-fill ph-facebook-logo text-xl"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-emerald-600 hover:text-white transition-colors"><i class="ph-fill ph-instagram-logo text-xl"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-emerald-600 hover:text-white transition-colors"><i class="ph-fill ph-youtube-logo text-xl"></i></a>
                    </div>
                </div>

                <!-- Links 1 -->
                <div>
                    <h4 class="text-white font-heading font-semibold text-lg mb-6">Pesantren</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">Profil Pesantren</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">Pendaftaran Santri</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">Fasilitas Asrama</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">Galeri Prestasi</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">Investasi Akhirat</a></li>
                    </ul>
                </div>

                <!-- Links 2 -->
                <div>
                    <h4 class="text-white font-heading font-semibold text-lg mb-6">Madrasah</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">Profil Madrasah</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">Pendaftaran PPDB</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">Kurikulum Pendidikan</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">Tenaga Pendidik</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-emerald-400 text-sm transition-colors">Berita Madrasah</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-heading font-semibold text-lg mb-6">Kontak Kami</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="ph-fill ph-map-pin text-emerald-500 text-xl mt-0.5"></i>
                            <span class="text-slate-400 text-sm">Jl. Pesantren No. 99, Kota Pendidikan, Provinsi Jawa Barat 12345</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="ph-fill ph-phone text-emerald-500 text-xl"></i>
                            <span class="text-slate-400 text-sm">(021) 1234-5678</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="ph-fill ph-envelope-simple text-emerald-500 text-xl"></i>
                            <span class="text-slate-400 text-sm">info@ppmu.sch.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-sm">&copy; {{ date('Y') }} Pondok Pesantren Mahasiswa Universal. Semua hak cipta dilindungi.</p>
                <div class="flex gap-6">
                    <a href="#" class="text-slate-500 hover:text-white text-sm transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="text-slate-500 hover:text-white text-sm transition-colors">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

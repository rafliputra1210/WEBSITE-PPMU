@extends('layouts.app')

@section('title', 'Galeri PPMU — Pondok Pesantren Mahasiswa Universal')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<style>
    :root {
        --primary: #16a34a;
        --primary-dark: #166534;
        --accent: #f59e0b;
        --dark: #0f172a;
        --text-muted: #64748b;
    }

    /* ===== HERO ===== */
    .gallery-hero {
        background: linear-gradient(135deg, var(--primary-dark) 0%, #14532d 50%, #0f172a 100%);
        padding: 110px 0 80px;
        position: relative;
        overflow: hidden;
    }
    .gallery-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
    }
    .gallery-hero .badge-pill {
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        color: #fff;
        border-radius: 50px;
        padding: 6px 18px;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    .gallery-hero h1 {
        font-size: clamp(1.9rem, 5vw, 3.5rem);
        font-weight: 800;
        color: #fff;
        line-height: 1.2;
    }
    .gallery-hero h1 span { color: #6ee7b7; }
    .gallery-hero p {
        color: rgba(255,255,255,0.75);
        font-size: clamp(0.9rem, 2.5vw, 1.05rem);
        line-height: 1.7;
    }

    /* Stats Pills */
    .stats-row {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 1.5rem;
    }
    .stat-pill {
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 50px;
        padding: 10px 22px;
        color: #fff;
        font-size: 0.85rem;
        backdrop-filter: blur(10px);
        text-align: center;
        min-width: 90px;
    }
    .stat-pill strong {
        font-size: 1.2rem;
        display: block;
        font-weight: 800;
    }
    .stat-pill span { font-size: 0.72rem; opacity: 0.8; }

    /* ===== FILTER BAR ===== */
    .filter-bar {
        background: #fff;
        border-radius: 16px;
        padding: 14px 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        margin-top: -28px;
        position: relative;
        z-index: 10;
    }
    .filter-label {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-muted);
        white-space: nowrap;
    }
    .filter-scroll {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: center;
    }
    /* On mobile: horizontal scroll */
    @media (max-width: 576px) {
        .filter-scroll {
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            padding-bottom: 4px;
        }
        .filter-scroll::-webkit-scrollbar { display: none; }
    }
    .filter-btn {
        border: 2px solid #e2e8f0;
        background: #fff;
        color: var(--text-muted);
        border-radius: 50px;
        padding: 6px 16px;
        font-size: 0.82rem;
        font-weight: 600;
        transition: all 0.25s;
        text-decoration: none;
        white-space: nowrap;
        flex-shrink: 0;
    }
    .filter-btn:hover, .filter-btn.active {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
    }
    .filter-btn.active-gold {
        background: var(--accent);
        border-color: var(--accent);
        color: #fff;
        transform: translateY(-1px);
    }
    .filter-divider {
        width: 1px;
        height: 24px;
        background: #e2e8f0;
        flex-shrink: 0;
    }

    /* ===== GALLERY GRID (MASONRY CSS COLUMNS) ===== */
    .gallery-section { padding: 32px 0 48px; }

    .gallery-grid {
        columns: 4;
        column-gap: 14px;
    }
    /* Laptop */
    @media (max-width: 1199px) { .gallery-grid { columns: 3; } }
    /* Tablet */
    @media (max-width: 767px)  { .gallery-grid { columns: 2; column-gap: 10px; } }
    /* Smartphone kecil */
    @media (max-width: 400px)  { .gallery-grid { columns: 1; } }

    .gallery-item {
        break-inside: avoid;
        margin-bottom: 14px;
        position: relative;
        border-radius: 14px;
        overflow: hidden;
        cursor: pointer;
        display: block;
        background: #f1f5f9;
    }
    .gallery-item img {
        width: 100%;
        display: block;
        transition: transform 0.4s ease;
    }
    .gallery-item:hover img { transform: scale(1.06); }
    /* Touch devices: always show overlay */
    @media (hover: none) {
        .gallery-overlay { opacity: 1 !important; }
        .gallery-overlay .zoom-icon { transform: translate(-50%, -50%) scale(1) !important; }
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.72) 0%, transparent 55%);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: flex-end;
        padding: 12px;
    }
    .gallery-item:hover .gallery-overlay { opacity: 1; }

    .gallery-overlay .zoom-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.5);
        background: rgba(255,255,255,0.95);
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        color: var(--primary);
        transition: transform 0.3s;
    }
    .gallery-item:hover .zoom-icon { transform: translate(-50%, -50%) scale(1); }

    .gallery-overlay .meta-badge {
        background: var(--primary);
        color: #fff;
        border-radius: 20px;
        padding: 2px 9px;
        font-size: 0.68rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .gallery-overlay .meta-badge.prestasi { background: var(--accent); }
    .gallery-caption {
        color: rgba(255,255,255,0.9);
        font-size: 0.78rem;
        font-weight: 600;
        margin-top: 3px;
        line-height: 1.3;
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: var(--text-muted);
    }
    .empty-state i {
        font-size: 3.5rem;
        color: #cbd5e1;
        margin-bottom: 16px;
        display: block;
    }
    .empty-state h5 { font-weight: 700; color: #334155; }

    /* ===== PAGINATION ===== */
    .pagination .page-link {
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        color: var(--primary);
        margin: 0 2px;
        font-weight: 600;
        font-size: 0.9rem;
    }
    .pagination .page-item.active .page-link {
        background: var(--primary);
        border-color: var(--primary);
    }

    /* ===== SECTION TITLE (tablet/desktop) ===== */
    .gallery-count-label {
        font-size: 0.82rem;
        color: var(--text-muted);
        font-weight: 500;
    }
</style>
@endsection

@section('content')

{{-- ===== HERO ===== --}}
<section class="gallery-hero">
    <div class="container text-center position-relative" style="z-index:1;">
        <span class="badge-pill mb-3 d-inline-block">📸 Galeri Foto</span>
        <h1 class="mt-2">Momen <span>Berharga</span><br>PPMU</h1>
        <p class="mx-auto mt-3" style="max-width:480px;">
            Abadikan setiap langkah perjalanan santri kami — dari keseharian, kegiatan, hingga prestasi membanggakan.
        </p>
        <div class="stats-row">
            <div class="stat-pill">
                <strong>{{ $totalFoto }}</strong>
                <span>Total Foto</span>
            </div>
            <div class="stat-pill">
                <strong>{{ $totalPotret }}</strong>
                <span>Potret</span>
            </div>
            <div class="stat-pill">
                <strong>{{ $totalPrestasi }}</strong>
                <span>Prestasi</span>
            </div>
        </div>
    </div>
</section>

{{-- ===== MAIN CONTENT ===== --}}
<div class="container">

    {{-- Filter Bar --}}
    <div class="filter-bar">
        <div class="d-flex align-items-center gap-3 flex-wrap">
            <span class="filter-label d-none d-sm-block">Filter:</span>
            <div class="filter-scroll">
                <a href="{{ route('galeri.index') }}"
                   class="filter-btn {{ !request('kategori') && !request('entitas') ? 'active' : '' }}">
                   🌐 Semua
                </a>
                <a href="{{ route('galeri.index', ['kategori' => 'potret']) }}"
                   class="filter-btn {{ request('kategori') == 'potret' ? 'active' : '' }}">
                   🖼️ Potret
                </a>
                <a href="{{ route('galeri.index', ['kategori' => 'prestasi']) }}"
                   class="filter-btn {{ request('kategori') == 'prestasi' ? 'active-gold' : '' }}">
                   🏆 Prestasi
                </a>
                <div class="filter-divider d-none d-sm-block"></div>
                <a href="{{ route('galeri.index', ['entitas' => 'pesantren']) }}"
                   class="filter-btn {{ request('entitas') == 'pesantren' ? 'active' : '' }}">
                   🕌 Pesantren
                </a>
                <a href="{{ route('galeri.index', ['entitas' => 'madrasah']) }}"
                   class="filter-btn {{ request('entitas') == 'madrasah' ? 'active' : '' }}">
                   📚 Madrasah
                </a>
            </div>
        </div>
    </div>

    {{-- Gallery Section --}}
    <div class="gallery-section">

        @if($galeris->count() > 0)
            {{-- Count label --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="gallery-count-label mb-0">
                    Menampilkan <strong>{{ $galeris->count() }}</strong> dari <strong>{{ $totalFoto }}</strong> foto
                </p>
            </div>

            {{-- Masonry Grid --}}
            <div class="gallery-grid">
                @foreach($galeris as $foto)
                <a class="gallery-item glightbox"
                   href="{{ asset('storage/' . $foto->file_path) }}"
                   data-gallery="ppmu-gallery"
                   data-description="{{ $foto->judul_gambar ?? '' }}"
                   data-title="{{ ucfirst($foto->kategori) }} · {{ ucfirst($foto->entitas) }}">
                    <img src="{{ asset('storage/' . $foto->file_path) }}"
                         alt="{{ $foto->judul_gambar ?? 'Foto Galeri PPMU' }}"
                         loading="lazy">
                    <div class="gallery-overlay">
                        <div class="zoom-icon"><i class="bi bi-zoom-in"></i></div>
                        <div style="flex:1;">
                            <span class="meta-badge {{ $foto->kategori }}">{{ ucfirst($foto->kategori) }}</span>
                            @if($foto->judul_gambar)
                                <div class="gallery-caption">{{ Str::limit($foto->judul_gambar, 50) }}</div>
                            @endif
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $galeris->links() }}
            </div>

        @else
            <div class="empty-state">
                <i class="bi bi-images"></i>
                <h5>Belum Ada Foto</h5>
                <p class="mt-1">Galeri masih kosong. Silakan coba filter lain atau kunjungi kembali nanti.</p>
                <a href="{{ route('galeri.index') }}" class="btn btn-outline-success rounded-pill px-4 mt-3">
                    <i class="bi bi-arrow-clockwise me-1"></i>Lihat Semua
                </a>
            </div>
        @endif
    </div>

</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    // Lightbox init
    const lightbox = GLightbox({
        touchNavigation: true,
        loop: true,
        autoplayVideos: false,
        keyboardNavigation: true,
        closeEffect: 'fade',
    });
</script>
@endsection
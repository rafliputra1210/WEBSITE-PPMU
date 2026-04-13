@extends('layouts.app')

@section('title', 'Berita & Informasi — Pesantren')

@section('content')
<style>
    /* ============ HERO ============ */
    .berita-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
        padding-top: 140px;
        padding-bottom: 70px;
        position: relative;
        overflow: hidden;
    }

    .berita-hero::before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(99,102,241,0.2) 0%, transparent 70%);
        top: -150px;
        right: -100px;
        border-radius: 50%;
    }

    .berita-hero::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(139,92,246,0.15) 0%, transparent 70%);
        bottom: -80px;
        left: -50px;
        border-radius: 50%;
    }

    .hero-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(99,102,241,0.15);
        border: 1px solid rgba(99,102,241,0.25);
        padding: 7px 18px;
        border-radius: 100px;
        color: #a5b4fc;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 1.2rem;
    }

    .berita-hero h1 {
        font-size: clamp(2.2rem, 5vw, 3.5rem);
        font-weight: 800;
        color: #fff;
        letter-spacing: -1.5px;
        line-height: 1.15;
    }

    .berita-hero p {
        color: #94a3b8;
        font-size: 1.05rem;
        max-width: 520px;
    }

    /* ============ SEARCH BAR ============ */
    .search-bar-wrapper {
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.12);
        backdrop-filter: blur(10px);
        border-radius: 100px;
        padding: 6px 6px 6px 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        max-width: 560px;
    }

    .search-bar-wrapper input {
        flex: 1;
        background: transparent;
        border: none;
        outline: none;
        color: #f8fafc;
        font-size: 0.95rem;
        font-family: inherit;
    }

    .search-bar-wrapper input::placeholder { color: #64748b; }

    .btn-search {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        color: #fff;
        border: none;
        padding: 10px 24px;
        border-radius: 100px;
        font-weight: 700;
        font-size: 0.88rem;
        cursor: pointer;
        transition: all 0.25s;
    }

    .btn-search:hover { opacity: 0.9; transform: translateX(2px); }

    /* ============ CATEGORY TABS ============ */
    .category-tabs {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 1.5rem;
    }

    .cat-tab {
        padding: 7px 18px;
        border-radius: 100px;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.1);
        color: #94a3b8;
        font-size: 0.82rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
    }

    .cat-tab:hover, .cat-tab.active-cat {
        background: rgba(99,102,241,0.2);
        border-color: rgba(99,102,241,0.4);
        color: #a5b4fc;
    }

    /* ============ FEATURED ARTICLE ============ */
    .berita-main {
        padding: 70px 0;
        background: #f8fafb;
    }

    .featured-card {
        border-radius: 24px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 15px 50px rgba(0,0,0,0.07);
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 400px;
        text-decoration: none;
        transition: all 0.35s ease;
        border: 1px solid #f1f5f9;
    }

    .featured-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 25px 60px rgba(99,102,241,0.12);
    }

    .featured-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .featured-content {
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .kategori-badge {
        display: inline-block;
        padding: 5px 14px;
        border-radius: 100px;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 1rem;
    }

    .featured-content h2 {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.3;
        letter-spacing: -0.5px;
        margin-bottom: 1rem;
    }

    .featured-content p {
        color: #64748b;
        line-height: 1.7;
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
    }

    .meta-info {
        display: flex;
        align-items: center;
        gap: 16px;
        font-size: 0.8rem;
        color: #94a3b8;
    }

    .meta-info .dot { width: 3px; height: 3px; background: #cbd5e1; border-radius: 50%; }

    /* ============ ARTICLE GRID ============ */
    .article-card {
        background: #fff;
        border: 1px solid #f1f5f9;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
        text-decoration: none;
        display: block;
    }

    .article-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.08);
        border-color: rgba(99,102,241,0.12);
    }

    .article-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .article-card:hover img { transform: scale(1.04); }

    .article-img-wrap { overflow: hidden; position: relative; }

    .article-body { padding: 1.5rem; }

    .article-body h5 {
        font-size: 1rem;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.4;
        margin-bottom: 0.6rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .article-body p {
        color: #64748b;
        font-size: 0.85rem;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .read-more {
        font-size: 0.82rem;
        font-weight: 700;
        color: #6366f1;
        display: flex;
        align-items: center;
        gap: 4px;
        transition: gap 0.2s;
    }

    .article-card:hover .read-more { gap: 8px; }

    /* ============ SECTION LABELS ============ */
    .section-label {
        font-size: 0.72rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #94a3b8;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 1.5rem;
    }

    .section-label::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #f1f5f9;
    }

    /* ============ PAGINATION ============ */
    .pagination .page-link {
        border: 1px solid #f1f5f9;
        border-radius: 10px;
        color: #334155;
        font-weight: 600;
        padding: 8px 14px;
        margin: 0 3px;
        transition: all 0.2s;
    }

    .pagination .page-link:hover {
        background: rgba(99,102,241,0.08);
        border-color: rgba(99,102,241,0.2);
        color: #6366f1;
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-color: transparent;
        box-shadow: 0 4px 12px rgba(99,102,241,0.3);
    }

    /* ============ EMPTY STATE ============ */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        background: rgba(99,102,241,0.08);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #6366f1;
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .featured-card { grid-template-columns: 1fr; }
        .featured-card img { height: 250px; }
        .featured-content { padding: 2rem; }
    }
</style>

{{-- ===== HERO ===== --}}
<section class="berita-hero">
    <div class="container position-relative" style="z-index:2;">
        <div class="hero-chip">
            <i class="bi bi-newspaper"></i> Portal Berita Pesantren
        </div>
        <h1>Berita &amp; Informasi<br><span style="background:linear-gradient(135deg,#818cf8,#c084fc);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Terkini</span></h1>
        <p class="mt-3 mb-4">Update terbaru seputar kegiatan akademik, prestasi santri, pengumuman penting, dan informasi lainnya dari pesantren.</p>

        {{-- Search --}}
        <form action="{{ route('pesantren.berita') }}" method="GET">
            <div class="search-bar-wrapper">
                <i class="bi bi-search" style="color:#64748b;font-size:0.95rem;"></i>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari berita atau informasi...">
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <button class="btn-search" type="submit">Cari</button>
            </div>
        </form>

        {{-- Category Tabs --}}
        <div class="category-tabs">
            <a href="{{ route('pesantren.berita') }}"
               class="cat-tab {{ !request('kategori') || request('kategori') === 'Semua' ? 'active-cat' : '' }}">
                Semua
            </a>
            @foreach($kategoriList as $kat)
            <a href="{{ route('pesantren.berita', ['kategori' => $kat, 'q' => request('q')]) }}"
               class="cat-tab {{ request('kategori') === $kat ? 'active-cat' : '' }}">
                {{ $kat }}
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== MAIN CONTENT ===== --}}
<section class="berita-main">
    <div class="container">

        {{-- Featured Article (hanya di halaman 1 tanpa search/filter) --}}
        @if($beritaUtama && !request('q') && !request('kategori') && $beritaList->currentPage() === 1)
        <div class="section-label mb-4">Artikel Utama</div>
        <a href="{{ route('pesantren.berita.detail', $beritaUtama->slug) }}" class="featured-card mb-5 d-md-grid d-block">
            <img src="{{ $beritaUtama->gambar ? asset('storage/' . $beritaUtama->gambar) : 'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=800' }}"
                 alt="{{ $beritaUtama->judul }}">
            <div class="featured-content">
                @php
                    $colors = ['Prestasi'=>'#059669,#d1fae5,#064e3b','Kegiatan'=>'#6366f1,#e0e7ff,#312e81','Pengumuman'=>'#dc2626,#fee2e2,#7f1d1d','Akademik'=>'#d97706,#fef3c7,#78350f','Pembangunan'=>'#0891b2,#cffafe,#164e63','Internasional'=>'#7c3aed,#ede9fe,#3b0764','Beasiswa'=>'#065f46,#d1fae5,#064e3b','Umum'=>'#64748b,#f1f5f9,#1e293b'];
                    $c = explode(',', $colors[$beritaUtama->kategori] ?? '64748b,#f1f5f9,#1e293b');
                @endphp
                <span class="kategori-badge" style="background:{{ $c[1] ?? '#f1f5f9' }};color:{{ $c[2] ?? '#1e293b' }};">
                    {{ $beritaUtama->kategori }}
                </span>
                <h2>{{ $beritaUtama->judul }}</h2>
                <p>{{ $beritaUtama->ringkasan ?? Str::limit(strip_tags($beritaUtama->konten), 160) }}</p>
                <div class="meta-info">
                    <span><i class="bi bi-person me-1"></i>{{ $beritaUtama->penulis }}</span>
                    <span class="dot"></span>
                    <span><i class="bi bi-calendar3 me-1"></i>{{ $beritaUtama->tanggal_publikasi->translatedFormat('d M Y') }}</span>
                </div>
            </div>
        </a>
        @endif

        {{-- Article Grid --}}
        @if($beritaList->count() > 0)

            @if(request('q') || request('kategori'))
            <div class="section-label">
                Hasil Pencarian
                @if(request('q'))<span class="ms-2" style="color:#6366f1;font-weight:700;text-transform:none;letter-spacing:0;">"{{ request('q') }}"</span>@endif
                — {{ $beritaList->total() }} artikel ditemukan
            </div>
            @else
            <div class="section-label">Berita Lainnya</div>
            @endif

            <div class="row g-4">
                @foreach($beritaList as $b)
                @php
                    $c = explode(',', $colors[$b->kategori] ?? '64748b,#f1f5f9,#1e293b');
                @endphp
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('pesantren.berita.detail', $b->slug) }}" class="article-card">
                        <div class="article-img-wrap">
                            <img src="{{ $b->gambar ? asset('storage/' . $b->gambar) : 'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=600' }}"
                                 alt="{{ $b->judul }}">
                            <span class="kategori-badge position-absolute" style="top:12px;left:12px;background:{{ $c[1] ?? '#f1f5f9' }};color:{{ $c[2] ?? '#1e293b' }};">
                                {{ $b->kategori }}
                            </span>
                        </div>
                        <div class="article-body">
                            <h5>{{ $b->judul }}</h5>
                            <p>{{ $b->ringkasan ?? Str::limit(strip_tags($b->konten), 120) }}</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="meta-info">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $b->tanggal_publikasi->diffForHumans() }}
                                </div>
                                <div class="read-more">
                                    Baca <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($beritaList->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $beritaList->links('pagination::bootstrap-5') }}
            </div>
            @endif

        @else
            <div class="empty-state">
                <div class="empty-icon"><i class="bi bi-newspaper"></i></div>
                <h5 style="font-weight:700;color:#1e293b;">Tidak ada berita ditemukan</h5>
                <p style="color:#64748b;max-width:350px;margin:8px auto 20px;">
                    Coba kata kunci lain atau pilih kategori yang berbeda.
                </p>
                <a href="{{ route('pesantren.berita') }}"
                   style="background:linear-gradient(135deg,#6366f1,#8b5cf6);color:#fff;padding:10px 28px;border-radius:100px;font-weight:700;text-decoration:none;font-size:0.9rem;">
                    Lihat Semua Berita
                </a>
            </div>
        @endif
    </div>
</section>

@endsection

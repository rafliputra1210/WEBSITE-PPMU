@extends('layouts.app')

@section('title', 'Berita & Informasi — Pesantren')

@section('content')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
        --berita-bg: #f8fafc;
        --c-dark-green: #064e3b;
    }

    /* ============ HERO SECTION ============ */
    .berita-hero {
        background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
        padding: 160px 0 100px;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(16, 185, 129, 0.1);
    }

    .berita-hero::before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
        top: -200px;
        right: -100px;
        border-radius: 50%;
    }

    .hero-content {
        position: relative;
        z-index: 10;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-label {
        display: inline-block;
        background: rgba(16, 185, 129, 0.08);
        border: 1px solid rgba(16, 185, 129, 0.2);
        padding: 8px 24px;
        border-radius: 100px;
        color: var(--c-dark-green);
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 1px;
        margin-bottom: 2rem;
    }

    .berita-hero h1 {
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 900;
        color: var(--c-dark-green);
        line-height: 1.1;
        letter-spacing: -2px;
        margin-bottom: 1.5rem;
    }

    .berita-hero p {
        font-size: 1.15rem;
        color: #475569;
        line-height: 1.6;
        margin-bottom: 3rem;
    }

    /* ============ SEARCH BOX ============ */
    .search-container {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
    }

    .search-box {
        background: #ffffff;
        border-radius: 20px;
        padding: 8px;
        display: flex;
        align-items: center;
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        transition: all 0.3s;
        border: 1px solid #e2e8f0;
    }

    .search-box:focus-within {
        transform: translateY(-2px);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.15);
        border-color: #10b981;
    }

    .search-box input {
        flex: 1;
        border: none;
        outline: none;
        padding: 12px 20px;
        font-size: 1rem;
        color: #1e293b;
        background: transparent;
    }

    .search-box input::placeholder { color: #94a3b8; }

    .btn-search-main {
        background: var(--primary-gradient);
        color: #fff;
        border: none;
        padding: 12px 30px;
        border-radius: 15px;
        font-weight: 700;
        transition: all 0.3s;
    }

    .btn-search-main:hover {
        opacity: 0.9;
        transform: scale(0.98);
    }

    /* ============ CATEGORIES ============ */
    .nav-categories {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 3rem;
        flex-wrap: wrap;
    }

    .cat-item {
        padding: 10px 24px;
        border-radius: 100px;
        background: rgba(16, 185, 129, 0.04);
        border: 1px solid rgba(16, 185, 129, 0.1);
        color: #475569;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
    }

    .cat-item:hover, .cat-item.active {
        background: #10b981;
        color: #ffffff;
        border-color: #10b981;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
    }

    /* ============ MAIN GRID ============ */
    .berita-container {
        padding: 100px 0;
        background: var(--berita-bg);
    }

    .article-card {
        background: #fff;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .article-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(0,0,0,0.06);
        border-color: #cbd5e1;
    }

    .article-img {
        height: 240px;
        overflow: hidden;
        position: relative;
    }

    .article-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .article-card:hover .article-img img {
        transform: scale(1.1);
    }

    .badge-cat {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
        padding: 6px 16px;
        border-radius: 100px;
        font-size: 0.75rem;
        font-weight: 800;
        color: #10b981;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .article-body {
        padding: 2rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .article-meta {
        font-size: 0.85rem;
        color: #64748b;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .article-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.4;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .article-excerpt {
        font-size: 0.95rem;
        color: #475569;
        line-height: 1.6;
        margin-bottom: 2rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex-grow: 1;
    }

    .btn-read {
        padding: 0;
        color: #10b981;
        font-weight: 700;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.9rem;
    }

    .btn-read i {
        transition: transform 0.3s;
    }

    .btn-read:hover i {
        transform: translateX(5px);
    }

    /* ============ FEATURED CARD ============ */
    .featured-article {
        margin-bottom: 5rem;
    }

    .f-card {
        background: #fff;
        border-radius: 32px;
        overflow: hidden;
        display: flex;
        min-height: 480px;
        box-shadow: 0 30px 70px rgba(0,0,0,0.05);
        border: 1px solid #e2e8f0;
    }

    .f-img { width: 55%; }
    .f-img img { width: 100%; height: 100%; object-fit: cover; }
    .f-content { 
        width: 45%; 
        padding: 4rem; 
        display: flex; 
        flex-direction: column; 
        justify-content: center; 
    }

    .f-content h2 {
        font-size: 2.2rem;
        font-weight: 900;
        color: #0f172a;
        letter-spacing: -1px;
        line-height: 1.2;
        margin-bottom: 1.5rem;
    }

    /* ============ PAGINATION ============ */
    .pagination-wrapper .page-link {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px !important;
        margin: 0 5px;
        border: 1px solid #e2e8f0;
        color: #64748b;
        font-weight: 700;
        transition: all 0.3s;
    }

    .pagination-wrapper .page-item.active .page-link {
        background: var(--primary-gradient);
        color: #fff;
        border-color: transparent;
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
    }

    @media (max-width: 991px) {
        .f-card { flex-direction: column; }
        .f-img, .f-content { width: 100%; }
        .f-content { padding: 3rem 2rem; }
    }
</style>

{{-- HERO --}}
<section class="berita-hero">
    <div class="container hero-content">
        <span class="hero-label">WARTA PESANTREN</span>
        <h1>Kabar &amp; Wawasan<br>Unggulan PPMU</h1>
        <p>Tetap terhubung dengan aktivitas terbaru, prestasi membanggakan, dan pengumuman resmi dari lingkungan pesantren kami.</p>

        {{-- Search Section --}}
        <div class="search-container">
            <form action="{{ route('pesantren.berita') }}" method="GET">
                <div class="search-box">
                    <i class="bi bi-search ms-3 text-muted"></i>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari topik atau berita...">
                    @if(request('kategori'))
                        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                    @endif
                    <button type="submit" class="btn-search-main">Cari Berita</button>
                </div>
            </form>
        </div>

        {{-- Category Filters --}}
        <div class="nav-categories">
            <a href="{{ route('pesantren.berita', ['q' => request('q')]) }}" 
               class="cat-item {{ !request('kategori') || request('kategori') === 'Semua' ? 'active' : '' }}">
                Semua Topik
            </a>
            @foreach($kategoriList as $kat)
            <a href="{{ route('pesantren.berita', ['kategori' => $kat, 'q' => request('q')]) }}" 
               class="cat-item {{ request('kategori') === $kat ? 'active' : '' }}">
                {{ $kat }}
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- CONTENT --}}
<section class="berita-container">
    <div class="container">

        {{-- Featured Article --}}
        @if($beritaUtama && !request('q') && !request('kategori') && $beritaList->currentPage() === 1)
        <div class="featured-article">
            <div class="f-card">
                <div class="f-img">
                    <img src="{{ $beritaUtama->gambar ? asset('storage/' . $beritaUtama->gambar) : 'https://images.unsplash.com/photo-1541339907198-e08756ebafe3?w=1000' }}" alt="">
                </div>
                <div class="f-content">
                    <span class="badge-cat" style="position:static; margin-bottom:1.5rem; display:inline-block;">{{ $beritaUtama->kategori }}</span>
                    <h2>{{ $beritaUtama->judul }}</h2>
                    <p class="article-excerpt">{{ $beritaUtama->ringkasan ?? Str::limit(strip_tags($beritaUtama->konten), 180) }}</p>
                    <div class="article-meta mt-auto">
                        <span><i class="bi bi-person-circle me-1"></i> {{ $beritaUtama->penulis }}</span>
                        <span><i class="bi bi-calendar3 me-1"></i> {{ ($beritaUtama->tanggal_publikasi ?? $beritaUtama->created_at)->translatedFormat('d M Y') }}</span>
                    </div>
                    <a href="{{ route('pesantren.berita.detail', $beritaUtama->slug) }}" class="btn-read mt-4">
                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @endif

        {{-- Info Pencarian --}}
        @if(request('q') || request('kategori'))
        <div class="mb-5 border-bottom pb-4">
            <h4 class="fw-bold">
                @if(request('q'))
                    Hasil pencarian untuk <span class="text-success">"{{ request('q') }}"</span>
                @else
                    Kategori <span class="text-success">{{ request('kategori') }}</span>
                @endif
            </h4>
            <p class="text-muted mb-0">Ditemukan {{ $beritaList->total() }} berita yang relevan.</p>
        </div>
        @endif

        {{-- Article Grid --}}
        @if($beritaList->count() > 0)
        <div class="row g-4">
            @foreach($beritaList as $b)
            <div class="col-md-6 col-lg-4">
                <div class="article-card">
                    <div class="article-img">
                        <img src="{{ $b->gambar ? asset('storage/' . $b->gambar) : 'https://images.unsplash.com/photo-1512233846066-51c360677508?w=600' }}" alt="">
                        <span class="badge-cat">{{ $b->kategori }}</span>
                    </div>
                    <div class="article-body">
                        <div class="article-meta">
                            <span><i class="bi bi-calendar3"></i> {{ ($b->tanggal_publikasi ?? $b->created_at)->translatedFormat('d M Y') }}</span>
                        </div>
                        <h3 class="article-title">{{ $b->judul }}</h3>
                        <p class="article-excerpt">{{ $b->ringkasan ?? Str::limit(strip_tags($b->konten), 100) }}</p>
                        <a href="{{ route('pesantren.berita.detail', $b->slug) }}" class="btn-read mt-auto">
                            Baca Artikel <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($beritaList->hasPages())
        <div class="pagination-wrapper d-flex justify-content-center mt-5 pt-5">
            {{ $beritaList->links('pagination::bootstrap-5') }}
        </div>
        @endif

        @else
        {{-- Empty State --}}
        <div class="text-center py-5">
            <div class="display-1 text-muted mb-4 opacity-25">
                <i class="bi bi-newspaper"></i>
            </div>
            <h3 class="fw-bold">Belum Ada Berita</h3>
            <p class="text-muted">Maaf, kami tidak menemukan berita yang cocok dengan kriteria Anda.</p>
            <a href="{{ route('pesantren.berita') }}" class="btn btn-success rounded-pill px-4 mt-3">Lihat Semua Berita</a>
        </div>
        @endif

    </div>
</section>

@endsection


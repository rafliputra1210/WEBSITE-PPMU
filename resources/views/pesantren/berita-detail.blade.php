@extends('layouts.app')

@section('title', $berita->judul . ' — Berita Pesantren')

@section('content')
<style>
    /* ===== PAGE WRAPPER ===== */
    .berita-detail-page {
        background: #f8fafb;
        padding-top: 100px;
        padding-bottom: 80px;
        min-height: 100vh;
    }

    /* ===== BREADCRUMB ===== */
    .breadcrumb-bar {
        background: #fff;
        border-bottom: 1px solid #f1f5f9;
        padding: 14px 0;
        position: fixed;
        top: 72px;
        left: 0;
        right: 0;
        z-index: 99;
    }

    .breadcrumb-bar .breadcrumb {
        margin: 0;
        font-size: 0.82rem;
    }

    .breadcrumb-item a { color: #6366f1; text-decoration: none; font-weight: 600; }
    .breadcrumb-item.active { color: #64748b; }
    .breadcrumb-item + .breadcrumb-item::before { color: #cbd5e1; }

    /* ===== MAIN ARTICLE ===== */
    .article-wrapper {
        max-width: 780px;
        margin: 0 auto;
    }

    .article-meta-top {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .kategori-pill {
        padding: 5px 16px;
        border-radius: 100px;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .article-title {
        font-size: clamp(1.8rem, 4vw, 2.6rem);
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -1px;
        line-height: 1.2;
        margin-bottom: 1.5rem;
    }

    .article-byline {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 16px 0;
        border-top: 1px solid #f1f5f9;
        border-bottom: 1px solid #f1f5f9;
        margin-bottom: 2rem;
        font-size: 0.85rem;
        color: #64748b;
    }

    .author-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .article-byline .author-name { font-weight: 700; color: #1e293b; }

    .hero-img-article {
        width: 100%;
        height: 480px;
        object-fit: cover;
        border-radius: 20px;
        margin-bottom: 2.5rem;
        display: block;
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
    }

    /* ===== ARTICLE BODY ===== */
    .prose {
        color: #334155;
        font-size: 1.05rem;
        line-height: 1.85;
    }

    .prose p {
        margin-bottom: 1.5rem;
    }

    .prose h2, .prose h3 {
        color: #0f172a;
        font-weight: 700;
        margin-top: 2.5rem;
        margin-bottom: 1rem;
        letter-spacing: -0.5px;
    }

    .prose blockquote {
        border-left: 4px solid #6366f1;
        padding: 1rem 1.5rem;
        margin: 2rem 0;
        background: rgba(99,102,241,0.05);
        border-radius: 0 12px 12px 0;
        font-style: italic;
        color: #475569;
    }

    .prose ul, .prose ol {
        padding-left: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .prose li { margin-bottom: 0.5rem; }

    /* ===== SHARE BUTTONS ===== */
    .share-section {
        background: #fff;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        padding: 1.5rem;
        margin-top: 3rem;
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .share-label {
        font-weight: 700;
        color: #1e293b;
        font-size: 0.9rem;
    }

    .share-btn {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        text-decoration: none;
        transition: all 0.25s;
        color: #fff;
        font-weight: 600;
    }

    .share-btn:hover { transform: translateY(-3px); color: #fff; }
    .share-btn.wa { background: #25d366; }
    .share-btn.fb { background: #1877f2; }
    .share-btn.tw { background: #000; }
    .share-btn.copy { background: #6366f1; cursor: pointer; }

    /* ===== NAVIGATION (PREV/NEXT) ===== */
    .article-nav {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-top: 3rem;
    }

    .nav-btn {
        background: #fff;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        padding: 1.2rem 1.5rem;
        text-decoration: none;
        transition: all 0.25s;
        display: block;
    }

    .nav-btn:hover {
        border-color: rgba(99,102,241,0.2);
        box-shadow: 0 8px 20px rgba(99,102,241,0.08);
    }

    .nav-btn .nav-label {
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #94a3b8;
        font-weight: 700;
    }

    .nav-btn .nav-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #1e293b;
        margin-top: 6px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ===== SIDEBAR ===== */
    .sidebar-card {
        background: #fff;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .sidebar-title {
        font-size: 0.78rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #94a3b8;
        margin-bottom: 1.2rem;
    }

    .related-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        padding: 10px 0;
        border-bottom: 1px solid #f8fafb;
        text-decoration: none;
        transition: all 0.2s;
    }

    .related-item:last-child { border-bottom: none; }

    .related-item:hover .related-title { color: #6366f1; }

    .related-img {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .related-title {
        font-size: 0.85rem;
        font-weight: 700;
        color: #1e293b;
        line-height: 1.4;
        transition: color 0.2s;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .related-date {
        font-size: 0.75rem;
        color: #94a3b8;
        margin-top: 4px;
    }

    /* TOC */
    .toc-item {
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        color: #475569;
        text-decoration: none;
        display: block;
        transition: all 0.2s;
        font-weight: 500;
    }
    .toc-item:hover { background: rgba(99,102,241,0.06); color: #6366f1; }

    @media (max-width: 768px) {
        .berita-detail-page { padding-top: 60px; }
        .breadcrumb-bar { top: 72px; }
        .hero-img-article { height: 240px; }
        .article-nav { grid-template-columns: 1fr; }
    }
</style>

{{-- Breadcrumb bar --}}
<div class="breadcrumb-bar">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house me-1"></i>Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pesantren.berita') }}">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($berita->judul, 50) }}</li>
            </ol>
        </nav>
    </div>
</div>

{{-- Main page --}}
<div class="berita-detail-page" style="padding-top:155px;">
    <div class="container">
        <div class="row g-5">
            {{-- ===== ARTICLE ===== --}}
            <div class="col-lg-8">
                <div class="article-wrapper">
                    {{-- Meta top --}}
                    <div class="article-meta-top">
                        @php
                            $catColors = [
                                'Prestasi'      => ['bg'=>'#d1fae5','color'=>'#064e3b'],
                                'Kegiatan'      => ['bg'=>'#e0e7ff','color'=>'#312e81'],
                                'Pengumuman'    => ['bg'=>'#fee2e2','color'=>'#7f1d1d'],
                                'Akademik'      => ['bg'=>'#fef3c7','color'=>'#78350f'],
                                'Pembangunan'   => ['bg'=>'#cffafe','color'=>'#164e63'],
                                'Internasional' => ['bg'=>'#ede9fe','color'=>'#3b0764'],
                                'Beasiswa'      => ['bg'=>'#dcfce7','color'=>'#14532d'],
                                'Umum'          => ['bg'=>'#f1f5f9','color'=>'#1e293b'],
                            ];
                            $cc = $catColors[$berita->kategori] ?? ['bg'=>'#f1f5f9','color'=>'#1e293b'];
                        @endphp
                        <span class="kategori-pill" style="background:{{ $cc['bg'] }};color:{{ $cc['color'] }};">
                            {{ $berita->kategori }}
                        </span>
                    </div>

                    {{-- Title --}}
                    <h1 class="article-title">{{ $berita->judul }}</h1>

                    {{-- Byline --}}
                    <div class="article-byline">
                        <div class="author-avatar">{{ strtoupper(substr($berita->penulis, 0, 1)) }}</div>
                        <div>
                            <div class="author-name">{{ $berita->penulis }}</div>
                            <div>{{ $berita->tanggal_publikasi->translatedFormat('d F Y') }}</div>
                        </div>
                        <span style="margin-left:auto;display:flex;align-items:center;gap:6px;color:#94a3b8;font-size:0.8rem;">
                            <i class="bi bi-clock"></i>
                            {{ ceil(str_word_count(strip_tags($berita->konten)) / 200) }} menit baca
                        </span>
                    </div>

                    {{-- Hero Image --}}
                    @if($berita->gambar)
                    <img src="{{ $berita->gambar }}" alt="{{ $berita->judul }}" class="hero-img-article">
                    @endif

                    {{-- Ringkasan --}}
                    @if($berita->ringkasan)
                    <div style="background:rgba(99,102,241,0.05);border-left:4px solid #6366f1;border-radius:0 12px 12px 0;padding:1rem 1.5rem;margin-bottom:2rem;">
                        <p style="margin:0;color:#475569;font-style:italic;font-size:1.05rem;line-height:1.7;">{{ $berita->ringkasan }}</p>
                    </div>
                    @endif

                    {{-- Article Body --}}
                    <div class="prose">
                        {!! $berita->konten !!}
                    </div>

                    {{-- Share --}}
                    <div class="share-section">
                        <span class="share-label"><i class="bi bi-share me-1"></i> Bagikan:</span>
                        <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . url()->current()) }}"
                           target="_blank" class="share-btn wa" title="WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                           target="_blank" class="share-btn fb" title="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(url()->current()) }}"
                           target="_blank" class="share-btn tw" title="Twitter/X">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <button class="share-btn copy" onclick="copyURL()" title="Salin tautan">
                            <i class="bi bi-link-45deg" id="copy-icon"></i>
                        </button>
                        <span id="copy-msg" style="color:#10b981;font-size:0.8rem;font-weight:700;display:none;">✓ Disalin!</span>
                    </div>

                    {{-- Tags --}}
                    <div style="margin-top:1.5rem;display:flex;gap:8px;flex-wrap:wrap;">
                        <span style="font-size:0.78rem;color:#94a3b8;font-weight:600;margin-right:4px;">#</span>
                        <a href="{{ route('pesantren.berita', ['kategori' => $berita->kategori]) }}"
                           style="background:#f1f5f9;color:#475569;padding:5px 14px;border-radius:100px;font-size:0.78rem;font-weight:600;text-decoration:none;transition:all 0.2s;"
                           onmouseover="this.style.background='rgba(99,102,241,0.1)';this.style.color='#6366f1';"
                           onmouseout="this.style.background='#f1f5f9';this.style.color='#475569';">
                            {{ $berita->kategori }}
                        </a>
                        <a href="{{ route('pesantren.berita') }}"
                           style="background:#f1f5f9;color:#475569;padding:5px 14px;border-radius:100px;font-size:0.78rem;font-weight:600;text-decoration:none;transition:all 0.2s;"
                           onmouseover="this.style.background='rgba(99,102,241,0.1)';this.style.color='#6366f1';"
                           onmouseout="this.style.background='#f1f5f9';this.style.color='#475569';">
                            Pesantren
                        </a>
                    </div>
                </div>

                {{-- Back button --}}
                <div class="text-center mt-5">
                    <a href="{{ route('pesantren.berita') }}"
                       style="display:inline-flex;align-items:center;gap:8px;background:#fff;border:1px solid #e2e8f0;border-radius:100px;padding:11px 28px;font-weight:700;font-size:0.9rem;color:#334155;text-decoration:none;transition:all 0.25s;"
                       onmouseover="this.style.borderColor='rgba(99,102,241,0.3)';this.style.color='#6366f1';"
                       onmouseout="this.style.borderColor='#e2e8f0';this.style.color='#334155';">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
                    </a>
                </div>
            </div>

            {{-- ===== SIDEBAR ===== --}}
            <div class="col-lg-4">
                <div style="position:sticky;top:145px;">
                    {{-- Berita Terkait --}}
                    <div class="sidebar-card">
                        <div class="sidebar-title">
                            <i class="bi bi-clock-history me-1"></i> Berita Terbaru
                        </div>
                        @forelse($beritaLainnya as $lain)
                        <a href="{{ route('pesantren.berita.detail', $lain->slug) }}" class="related-item">
                            <img src="{{ $lain->gambar ?? 'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=200' }}"
                                 class="related-img" alt="{{ $lain->judul }}">
                            <div>
                                <div class="related-title">{{ $lain->judul }}</div>
                                <div class="related-date">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $lain->tanggal_publikasi->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                        @empty
                        <p style="color:#94a3b8;font-size:0.85rem;text-align:center;padding:16px 0;">Belum ada berita lainnya.</p>
                        @endforelse
                    </div>

                    {{-- CTA Donasi --}}
                    <div class="sidebar-card" style="background:linear-gradient(135deg,#064e3b,#065f46);border-color:transparent;">
                        <div style="color:#6ee7b7;font-size:0.75rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;margin-bottom:12px;">
                            <i class="bi bi-heart-fill me-1"></i> Investasi Akhirat
                        </div>
                        <h6 style="color:#fff;font-weight:700;font-size:1rem;margin-bottom:8px;">Mari Berdonasi untuk Pesantren</h6>
                        <p style="color:#a7f3d0;font-size:0.83rem;line-height:1.6;margin-bottom:1.2rem;">Setiap rupiah donasi Anda akan menjadi amal jariyah yang terus mengalir pahalanya.</p>
                        <a href="{{ route('pesantren.donasi') }}"
                           style="display:block;text-align:center;background:rgba(255,255,255,0.15);color:#d1fae5;border:1px solid rgba(255,255,255,0.2);border-radius:10px;padding:10px;font-weight:700;font-size:0.85rem;text-decoration:none;transition:all 0.25s;"
                           onmouseover="this.style.background='rgba(255,255,255,0.25)';"
                           onmouseout="this.style.background='rgba(255,255,255,0.15)';">
                            Donasi Sekarang →
                        </a>
                    </div>

                    {{-- PPDB CTA --}}
                    <div class="sidebar-card" style="background:linear-gradient(135deg,rgba(99,102,241,0.05),rgba(139,92,246,0.05));border-color:rgba(99,102,241,0.15);">
                        <div style="font-size:0.75rem;font-weight:800;color:#6366f1;text-transform:uppercase;letter-spacing:1.5px;margin-bottom:10px;">PPDB 2026</div>
                        <h6 style="font-weight:700;color:#0f172a;margin-bottom:6px;">Pendaftaran Santri Baru Dibuka!</h6>
                        <p style="color:#64748b;font-size:0.82rem;line-height:1.6;margin-bottom:1rem;">Kuota terbatas. Daftarkan putra-putri Anda sekarang juga.</p>
                        <a href="{{ route('pesantren.pendaftaran') }}"
                           style="display:block;text-align:center;background:linear-gradient(135deg,#6366f1,#8b5cf6);color:#fff;border-radius:10px;padding:10px;font-weight:700;font-size:0.85rem;text-decoration:none;transition:all 0.25s;">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function copyURL() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            document.getElementById('copy-icon').className = 'bi bi-check-lg';
            document.getElementById('copy-msg').style.display = 'inline';
            setTimeout(() => {
                document.getElementById('copy-icon').className = 'bi bi-link-45deg';
                document.getElementById('copy-msg').style.display = 'none';
            }, 2500);
        });
    }
</script>
@endsection

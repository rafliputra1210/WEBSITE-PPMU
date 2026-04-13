@extends('layouts.app')

@section('title', 'Fasilitas Madrasah — PPMU')

@section('styles')
<style>
    .fasilitas-hero {
        background: linear-gradient(135deg, #0a0f2e 0%, #1a1040 60%, #0d2137 100%);
        padding: calc(var(--nav-h) + 50px) 0 60px;
        position: relative;
        overflow: hidden;
    }
    .fasilitas-hero::before {
        content: '';
        position: absolute;
        width: 500px; height: 500px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(6,182,212,0.12) 0%, transparent 70%);
        top: -100px; right: -100px;
        pointer-events: none;
    }
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(6,182,212,0.15);
        border: 1px solid rgba(6,182,212,0.3);
        color: #67e8f9;
        padding: 6px 16px;
        border-radius: 100px;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 20px;
    }
    .fasilitas-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
        height: 100%;
    }
    .fasilitas-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.13);
    }
    .fasilitas-card-img {
        height: 220px;
        object-fit: cover;
        width: 100%;
        transition: transform 0.4s ease;
    }
    .fasilitas-card:hover .fasilitas-card-img {
        transform: scale(1.05);
    }
    .fasilitas-card-img-wrap {
        overflow: hidden;
        position: relative;
    }
    .fasilitas-card-placeholder {
        height: 220px;
        background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
    }
    .fasilitas-card-body {
        padding: 22px 24px;
    }
    .fasilitas-card-title {
        font-weight: 700;
        font-size: 1rem;
        color: #1e293b;
        margin-bottom: 8px;
    }
    .fasilitas-card-desc {
        font-size: 0.88rem;
        color: #64748b;
        line-height: 1.65;
    }
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #94a3b8;
    }
    .empty-state i {
        font-size: 3.5rem;
        display: block;
        margin-bottom: 16px;
    }
</style>
@endsection

@section('content')

<!-- Hero -->
<div class="fasilitas-hero">
    <div class="container">
        <div class="text-center">
            <div class="hero-badge">
                <i class="bi bi-building-check"></i>
                Sarana & Prasarana
            </div>
            <h1 class="display-5 fw-bold text-white mb-3">Fasilitas Lengkap & Modern</h1>
            <p class="text-light opacity-75 mb-0" style="max-width:560px;margin:auto;font-size:1rem;">
                Kami menyediakan berbagai sarana dan prasarana terbaik untuk menunjang kegiatan akademik dan non-akademik siswa.
            </p>
        </div>
    </div>
</div>

<!-- Fasilitas Grid -->
<div class="page-padded-top" style="padding-top:0;background:#f8fafc;padding-bottom:80px;">
    <div class="container" style="margin-top:-40px;">

        @if($fasilitas->count() > 0)
        <div class="row g-4">
            @foreach($fasilitas as $item)
            <div class="col-md-6 col-lg-4">
                <div class="fasilitas-card">
                    <!-- Gambar -->
                    <div class="fasilitas-card-img-wrap">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 alt="{{ $item->nama_fasilitas }}"
                                 class="fasilitas-card-img">
                        @else
                            <div class="fasilitas-card-placeholder">
                                <div class="text-center">
                                    <i class="bi bi-building" style="font-size:2.5rem;display:block;margin-bottom:8px;"></i>
                                    <small>Belum ada foto</small>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- Konten -->
                    <div class="fasilitas-card-body">
                        <div class="fasilitas-card-title">{{ $item->nama_fasilitas }}</div>
                        @if($item->deskripsi)
                            <div class="fasilitas-card-desc">{{ $item->deskripsi }}</div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <!-- Kosong -->
        <div class="card border-0 shadow-sm" style="border-radius:18px;">
            <div class="empty-state">
                <i class="bi bi-building"></i>
                <div class="fw-semibold" style="font-size:1rem;color:#64748b;margin-bottom:6px;">Fasilitas belum tersedia</div>
                <div style="font-size:0.85rem;">Data fasilitas sedang dalam proses penambahan.</div>
            </div>
        </div>
        @endif

    </div>
</div>

@endsection
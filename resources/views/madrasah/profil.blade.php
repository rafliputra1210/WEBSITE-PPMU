@extends('layouts.app')

@section('title', 'Profil Madrasah - Educate Portal')

@section('content')
<style>
    .profil-hero {
        background: linear-gradient(135deg, #f0f7ff 0%, #e0f2fe 100%);
        padding: 160px 0 80px;
        position: relative;
    }
    .section-profil { padding: 80px 0; }
    .card-visi-misi {
        border: none;
        border-radius: 24px;
        background: #ffffff;
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.05);
        padding: 40px;
    }
    .visi-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #3b82f6, #06b6d4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 20px;
    }
    .misi-list { list-style: none; padding: 0; }
    .misi-list li {
        position: relative;
        padding-left: 35px;
        margin-bottom: 20px;
        font-size: 1.1rem;
        line-height: 1.7;
        color: #475569;
    }
    .misi-list li::before {
        content: '\F26A';
        font-family: 'bootstrap-icons';
        position: absolute;
        left: 0;
        top: 2px;
        color: #3b82f6;
        font-size: 1.3rem;
    }
    .sejarah-text {
        font-size: 1.15rem;
        line-height: 1.8;
        color: #334155;
        white-space: pre-line;
    }
</style>

<div class="profil-hero">
    <div class="container text-center">
        <span class="badge bg-primary-subtle text-primary px-4 py-2 rounded-pill mb-4 fw-bold">PROFIL MADRASAH</span>
        <h1 class="display-3 fw-black text-dark mb-0">Sejarah, Visi & Misi</h1>
        <nav aria-label="breadcrumb" class="mt-4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-primary">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('madrasah.index') }}" class="text-decoration-none text-primary">Madrasah</a></li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section-profil bg-white">
    <div class="container">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-lg-6 order-lg-2">
                @if($profile && $profile->gambar)
                    <img src="{{ asset('storage/' . $profile->gambar) }}" class="img-fluid rounded-5 shadow-lg w-100" style="object-fit: cover; height: 450px;">
                @else
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded-5 shadow-lg w-100" style="object-fit: cover; height: 450px;">
                @endif
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="pe-lg-4">
                    <h2 class="fw-bold text-dark mb-4" style="font-size: 2.5rem;">Sejarah Madrasah</h2>
                    <div class="sejarah-text">
                        {{ $profile && $profile->sejarah ? $profile->sejarah : 'Informasi sejarah madrasah sedang disusun oleh tim redaksi. Nantikan pembaruan segera.' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-5 text-center">
            <div class="col-lg-12 mb-4">
                <div class="card-visi-misi">
                    <h3 class="visi-title">Visi Madrasah</h3>
                    <p class="fs-3 text-secondary leading-relaxed mb-0 px-lg-5">
                        "{{ $profile && $profile->visi ? $profile->visi : 'Terwujudnya Peserta Didik yang Berakhlakul Karimah, Cerdas, dan Berwawasan Global.' }}"
                    </p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card-visi-misi text-start">
                    <h3 class="visi-title text-center mb-4">Misi Strategis</h3>
                    @if($profile && $profile->misi)
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <ul class="misi-list">
                                    @foreach(explode("\n", $profile->misi) as $m)
                                        @if(trim($m))
                                            <li>{{ trim($m) }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        <p class="text-muted text-center">Informasi misi sedang dalam tahap finalisasi.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
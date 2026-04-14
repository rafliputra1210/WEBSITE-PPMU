@extends('layouts.app')

@section('title', 'Profil & Sejarah - Pesantren PPMU')

@section('content')
<style>
    .profil-hero {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 160px 0 80px;
        position: relative;
        overflow: hidden;
    }
    .profil-hero::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
        top: -100px;
        right: -100px;
        border-radius: 50%;
    }
    .section-profil { padding: 80px 0; }
    .card-visi-misi {
        border: none;
        border-radius: 24px;
        background: #ffffff;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        padding: 40px;
    }
    .visi-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #10b981, #059669);
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
        color: #10b981;
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
        <span class="badge bg-success-subtle text-success px-4 py-2 rounded-pill mb-4 fw-bold">PROFIL LEMBAGA</span>
        <h1 class="display-3 fw-black text-dark mb-0">Sejarah, Visi & Misi</h1>
        <nav aria-label="breadcrumb" class="mt-4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pesantren.index') }}" class="text-decoration-none">Pesantren</a></li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section-profil bg-white">
    <div class="container">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-lg-6">
                @if($profile && $profile->gambar)
                    <img src="{{ asset('storage/' . $profile->gambar) }}" class="img-fluid rounded-5 shadow-lg w-100" style="object-fit: cover; height: 450px;">
                @else
                    <img src="https://images.unsplash.com/photo-1541339907198-e08756ebafe3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded-5 shadow-lg w-100" style="object-fit: cover; height: 450px;">
                @endif
            </div>
            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <h2 class="fw-bold text-dark mb-4" style="font-size: 2.5rem;">Sejarah Singkat</h2>
                    <div class="sejarah-text">
                        {{ $profile && $profile->sejarah ? $profile->sejarah : 'Data sejarah belum tersedia. Pengelola sedang memperbarui informasi ini.' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-5">
            <div class="col-lg-5">
                <div class="card-visi-misi h-100">
                    <h3 class="visi-title">Visi</h3>
                    <p class="fs-4 text-secondary leading-relaxed mb-0">
                        "{{ $profile && $profile->visi ? $profile->visi : 'Menjadi lembaga pendidikan yang unggul dalam ilmu dan mulia dalam akhlak.' }}"
                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card-visi-misi h-100">
                    <h3 class="visi-title">Misi</h3>
                    @if($profile && $profile->misi)
                        <ul class="misi-list">
                            @foreach(explode("\n", $profile->misi) as $m)
                                @if(trim($m))
                                    <li>{{ trim($m) }}</li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Informasi misi belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ / CTA --}}
<section class="py-5 bg-light border-top">
    <div class="container text-center py-4">
        <h4 class="fw-bold mb-4">Ingin bergabung bersama kami?</h4>
        <a href="{{ route('pesantren.pendaftaran') }}" class="btn btn-success btn-lg px-5 rounded-pill fw-bold shadow-sm">Daftar Santri Sekarang</a>
    </div>
</section>

@endsection
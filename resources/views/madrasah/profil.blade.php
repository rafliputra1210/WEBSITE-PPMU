@extends('layouts.app')

@section('title', 'Profil Madrasah — Educate')

@section('content')
<style>
    .profil-hero {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.08) 0%, rgba(37, 99, 235, 0.1) 100%);
        padding: 60px 0;
        border-radius: 0 0 40px 40px;
        margin-bottom: -40px;
    }
</style>

<div class="page-padded-top">
    <section class="profil-hero text-center mb-5 pb-5">
        <div class="container">
            <span class="badge bg-white text-primary px-3 py-2 rounded-pill shadow-sm mb-3">Tentang Kami</span>
            <h1 class="display-5 fw-bold text-dark">Profil Madrasah</h1>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Mengenal lebih dekat lembaga pendidikan kami yang berdedikasi menciptakan generasi masa depan gemilang.
            </p>
        </div>
    </section>

    <div class="container py-5 mt-4">
        <div class="row align-items-center flex-row-reverse g-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         class="img-fluid rounded-4 shadow-lg border border-4 border-white" alt="Profil Madrasah">
                    <div class="position-absolute bottom-0 start-0 translate-middle-y bg-white p-3 rounded-4 shadow-sm border border-light ms-n3" style="max-width: 250px;">
                        <h6 class="fw-bold mb-1"><i class="bi bi-star-fill text-warning me-2"></i>Mencetak 10.000+</h6>
                        <p class="mb-0 text-muted small">Alumni Berprestasi</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 pe-lg-5">
                <h6 class="text-primary text-uppercase fw-bold tracking-wide mb-2">Visi & Misi Kami</h6>
                <h2 class="display-6 fw-bold mb-4" style="letter-spacing:-0.5px;">Mencetak Generasi Cerdas & Beradab</h2>
                
                <p class="lead text-muted" style="font-size:1.05rem; line-height:1.7;">Madrasah kami memadukan kurikulum nasional yang komprehensif dengan pendidikan karakter islami yang kuat sejak tahun berdiri.</p>
                <p class="text-muted" style="line-height:1.7;">Dengan tenaga pendidik bersertifikasi dan lingkungan belajar yang interaktif, kami membekali siswa dengan kompetensi sains, teknologi, serta pemahaman agama yang inklusif untuk menyambut masa depan yang penuh tantangan global.</p>
                
                <div class="row mt-5 g-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center p-3 rounded-3" style="background:#eff6ff;">
                            <i class="bi bi-book display-6 text-primary me-3"></i>
                            <div>
                                <h5 class="fw-bold mb-0">Kurikulum</h5>
                                <small class="text-muted">Terintegrasi Nasional</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center p-3 rounded-3" style="background:#eff6ff;">
                            <i class="bi bi-trophy display-6 text-primary me-3"></i>
                            <div>
                                <h5 class="fw-bold mb-0">Akreditasi A</h5>
                                <small class="text-muted">Standar Pendidikan Tinggi</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
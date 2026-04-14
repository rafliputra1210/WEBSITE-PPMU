@extends('layouts.app')

@section('content')
<style>
    /* Mengubah gradient hero khusus untuk halaman pesantren menjadi nuansa Emerald/Teal yang sejuk */
    .hero-pesantren {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(20, 184, 166, 0.08) 100%);
        padding-top: 180px;
        padding-bottom: 100px;
        position: relative;
    }
    
    .btn-pesantren {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border: none;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.25);
    }
    
    .btn-pesantren:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.35);
    }

    .card-menu {
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: var(--radius-lg);
        cursor: pointer;
    }

    .card-menu:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(16, 185, 129, 0.1) !important;
        border-color: rgba(16, 185, 129, 0.2);
    }

    .icon-wrapper {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }
</style>

<section class="hero-pesantren">
    <div class="container relative z-10">
        <div class="row align-items-center justify-content-between g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <span class="badge bg-white text-success px-4 py-2 rounded-pill shadow-sm mb-4 border border-success-subtle fw-semibold tracking-wide">
                    🌿 Lembaga Pendidikan Islam Terpadu
                </span>
                <h1 class="display-4 fw-extrabold mb-4 text-dark leading-tight" style="letter-spacing: -1px;">
                    Portal <span class="text-success" style="background: linear-gradient(135deg, #10b981, #059669); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Pesantren</span>
                </h1>
                <p class="lead text-secondary mb-5 font-light" style="font-size: 1.1rem; max-width: 500px;">
                    Membentuk generasi Qur'ani yang mandiri, berilmu pengetahuan luas, dan berakhlakul karimah untuk menyongsong tantangan global.
                </p>
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                    <a href="{{ route('pesantren.pendaftaran') }}" class="btn btn-pesantren btn-lg px-5 rounded-pill fw-bold">Pendaftaran Santri Baru</a>
                </div>
            </div>
            
            <div class="col-lg-5 d-none d-lg-block text-end">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1596422846543-75c6fb19f66b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Suasana Pesantren" class="img-fluid rounded-5 shadow-lg border border-white border-4" style="object-fit: cover; height: 450px; width: 100%;">
                    
                    <div class="position-absolute top-50 start-0 translate-middle-x bg-white p-3 rounded-4 shadow-lg text-start border border-light" style="width: 200px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <i class="bi bi-book-half fs-5"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Tahfidz</h5>
                                <small class="text-muted fw-medium text-xs">Program Unggulan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white" style="margin-top: -40px; position: relative; z-index: 20; border-radius: 40px 40px 0 0;">
    <div class="container py-4">
        <div class="row g-4 justify-content-center">
            
            <div class="col-md-6">
                <a href="{{ route('pesantren.profil') }}" class="text-decoration-none">
                    <div class="card card-menu h-100 p-4 bg-white shadow-sm text-center">
                        <div class="icon-wrapper bg-primary-subtle text-primary mx-auto">
                            <i class="bi bi-journal-text fs-2"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Profil & Tentang</h5>
                        <p class="text-muted small font-light mb-0">Mengenal sejarah, visi, misi, dan struktur kepengurusan Pesantren kami.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="#" class="text-decoration-none">
                    <div class="card card-menu h-100 p-4 bg-white shadow-sm text-center">
                        <div class="icon-wrapper bg-info-subtle text-info mx-auto">
                            <i class="bi bi-buildings fs-2"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Fasilitas & Asrama</h5>
                        <p class="text-muted small font-light mb-0">Lihat sarana prasarana yang mendukung kenyamanan belajar dan menetap santri.</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 text-center justify-content-center border-top border-bottom py-4 border-light-subtle">
            <div class="col-6 col-md-3">
                <h2 class="display-5 fw-bold text-dark mb-0">1.2K+</h2>
                <p class="text-muted text-uppercase small tracking-wide fw-medium">Santri Mukim</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-5 fw-bold text-dark mb-0">85+</h2>
                <p class="text-muted text-uppercase small tracking-wide fw-medium">Asatidz & Pengurus</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-5 fw-bold text-dark mb-0">4</h2>
                <p class="text-muted text-uppercase small tracking-wide fw-medium">Program Kajian</p>
            </div>
        </div>
    </div>
</section>
@endsection
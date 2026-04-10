@extends('layouts.app')

@section('title', 'Pendaftaran Siswa Baru — Educate')

@section('content')
<style>
    /* ==================== PENDAFTARAN HERO ==================== */
    .pendaftaran-hero {
        background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 40%, #1d4ed8 100%);
        padding-top: 140px;
        padding-bottom: 80px;
        position: relative;
        overflow: hidden;
    }

    .pendaftaran-hero::before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(59,130,246,0.25) 0%, transparent 70%);
        top: -200px;
        right: -150px;
        border-radius: 50%;
        animation: glowPulse 10s ease-in-out infinite;
    }

    @keyframes glowPulse {
        0%, 100% { transform: scale(1); opacity: 0.6; }
        50% { transform: scale(1.15); opacity: 1; }
    }

    .pendaftaran-hero h1 {
        font-size: clamp(2.2rem, 5vw, 3.5rem);
        font-weight: 800;
        color: #ffffff;
        line-height: 1.15;
        letter-spacing: -1px;
    }

    /* ==================== FORM SECTION ==================== */
    .form-card-main {
        background: #ffffff;
        border-radius: 24px;
        padding: 3rem;
        box-shadow: 0 25px 60px rgba(0,0,0,0.08);
        border: 1px solid #e2e8f0;
        position: relative;
        z-index: 2;
        margin-top: -60px;
    }

    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 0.95rem;
        background: #fafbfc;
        transition: all 0.25s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59,130,246,0.1);
        background: #fff;
    }

    .btn-submit-reg {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: #fff;
        border: none;
        padding: 16px 40px;
        border-radius: 100px;
        font-weight: 800;
        font-size: 1.05rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(37,99,235,0.3);
        width: 100%;
    }

    .btn-submit-reg:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(37,99,235,0.4);
    }
    
    .timeline-step {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
    }
    
    .timeline-step .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #eff6ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        flex-shrink: 0;
        margin-right: 15px;
    }
</style>

<section class="pendaftaran-hero">
    <div class="container position-relative" style="z-index:2;">
        <div class="text-center">
            <span class="badge bg-white text-primary px-3 py-2 rounded-pill shadow-sm mb-3">Tahun Ajaran 2026/2027</span>
            <h1>Penerimaan Siswa Baru</h1>
            <p class="mt-3 mb-0 text-light mx-auto" style="max-width: 600px; font-size: 1.1rem; opacity: 0.9;">
                Mari bergabung bersama ribuan siswa berprestasi lainnya. Segera daftarkan diri Anda sebelum kuota terpenuhi.
            </p>
        </div>
    </div>
</section>

<div class="container pb-5 mb-5">
    <div class="form-card-main">
        <div class="row g-5">
            <!-- Form -->
            <div class="col-lg-7">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div style="width:50px;height:50px;background:linear-gradient(135deg,#3b82f6,#2563eb);border-radius:14px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.3rem;">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div>
                        <h4 style="font-weight:800;color:#0f172a;margin:0;">Formulir Pendaftaran</h4>
                        <p style="margin:0;color:#64748b;font-size:0.85rem;">Mohon isi data calon siswa dengan valid dan benar.</p>
                    </div>
                </div>

                <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Mohon maaf, sistem pendaftaran online sedang dalam pemeliharaan. Silakan datang langsung ke Tata Usaha.');">
                    @csrf
                    
                    <h6 class="text-primary fw-bold mb-3 mt-4">Data Pribadi Siswa</h6>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Sesuai Akta Kelahiran" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">NISN</label>
                            <input type="number" class="form-control" placeholder="Nomor Induk Siswa Nasional" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Jenis Kelamin</label>
                            <select class="form-select" required>
                                <option value="">Pilih...</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tempat Lahir</label>
                            <input type="text" class="form-control" placeholder="Kota Kelahiran" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tanggal Lahir</label>
                            <input type="date" class="form-control" required>
                        </div>
                    </div>

                    <h6 class="text-primary fw-bold mb-3 mt-5">Data Orang Tua / Wali</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Ayah</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">No. HP Ayah</label>
                            <input type="tel" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Ibu</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">No. HP Ibu</label>
                            <input type="tel" class="form-control" required>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn-submit-reg">Kirim Formulir Pendaftaran</button>
                    </div>
                </form>
            </div>

            <!-- Sidebar Info -->
            <div class="col-lg-5">
                <div class="bg-light p-4 rounded-4 border border-light-subtle h-100">
                    <h5 class="fw-bold mb-4 text-dark"><i class="bi bi-info-circle-fill text-primary me-2"></i>Alur Pendaftaran</h5>
                    
                    <div class="timeline-step">
                        <div class="icon-circle">1</div>
                        <div>
                            <h6 class="fw-bold mb-1">Isi Formulir Online</h6>
                            <p class="text-muted small mb-0">Lengkapi data diri melalui formulir di samping dengan data yang valid.</p>
                        </div>
                    </div>
                    
                    <div class="timeline-step">
                        <div class="icon-circle">2</div>
                        <div>
                            <h6 class="fw-bold mb-1">Verifikasi Berkas</h6>
                            <p class="text-muted small mb-0">Bawa dokumen fisik (Akta, KK, Ijazah/SKL) ke tata usaha untuk diverifikasi divalidasi admin.</p>
                        </div>
                    </div>
                    
                    <div class="timeline-step">
                        <div class="icon-circle">3</div>
                        <div>
                            <h6 class="fw-bold mb-1">Tes Seleksi</h6>
                            <p class="text-muted small mb-0">Mengikuti tes akademik dan wawancara sesuai jadwal yang diumumkan.</p>
                        </div>
                    </div>
                    
                    <div class="timeline-step mb-0">
                        <div class="icon-circle">4</div>
                        <div>
                            <h6 class="fw-bold mb-1">Daftar Ulang</h6>
                            <p class="text-muted small mb-0">Jika dinyatakan lulus, siswa wajib melakukan daftar ulang dan pengukuran seragam.</p>
                        </div>
                    </div>
                    
                    <hr class="my-4 text-secondary">
                    
                    <div class="d-flex align-items-center bg-white p-3 rounded-3 shadow-sm border border-danger-subtle">
                        <div class="bg-danger-subtle text-danger p-2 rounded-circle me-3">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">Warning</h6>
                            <small class="text-muted">Pemalsuan data akan berakibat pembatalan status pendaftaran.</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
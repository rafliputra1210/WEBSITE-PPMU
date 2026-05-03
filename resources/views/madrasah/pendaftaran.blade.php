@extends('layouts.app')

@section('title', 'Pendaftaran Siswa Baru — Educate')

@section('content')
<style>
    /* ==================== PENDAFTARAN HERO ==================== */
    .pendaftaran-hero {
        background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
        padding-top: 140px;
        padding-bottom: 80px;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(16, 185, 129, 0.1);
    }

    .pendaftaran-hero::before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%);
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
        color: #0f172a;
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
        border-color: #10b981;
        box-shadow: 0 0 0 4px rgba(16,185,129,0.1);
        background: #fff;
    }

    .btn-submit-reg {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #fff;
        border: none;
        padding: 16px 40px;
        border-radius: 100px;
        font-weight: 800;
        font-size: 1.05rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(16,185,129,0.3);
        width: 100%;
    }

    .btn-submit-reg:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(16,185,129,0.4);
        color: #fff;
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
        background: #ecfdf5;
        color: #10b981;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        flex-shrink: 0;
        margin-right: 15px;
    }

    .rekening-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 16px;
        transition: all 0.3s ease;
        position: relative;
    }
    .rekening-card:hover {
        border-color: #10b981;
        box-shadow: 0 8px 20px rgba(16,185,129,0.06);
    }
    .bank-logo {
        width: 48px; height: 48px;
        background: #f8fafc;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-weight: 800; color: #10b981; font-size: 0.9rem;
        flex-shrink: 0;
        border: 1px solid #f1f5f9;
    }
    .copy-btn {
        background: #10b981;
        color: #fff;
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.72rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }
    .copy-btn:hover {
        background: #059669;
        transform: scale(1.05);
    }
</style>

<section class="pendaftaran-hero">
    <div class="container position-relative" style="z-index:2;">
        <div class="text-center">
            <span class="badge bg-success text-white px-3 py-2 rounded-pill shadow-sm mb-3">Tahun Ajaran 2026/2027</span>
            <h1>Penerimaan Siswa Baru</h1>
            <p class="mt-3 mb-0 text-secondary mx-auto" style="max-width: 600px; font-size: 1.1rem;">
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
                    <div style="width:50px;height:50px;background:linear-gradient(135deg,#10b981,#059669);border-radius:14px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.3rem;">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div>
                        <h4 style="font-weight:800;color:#0f172a;margin:0;">Formulir Pendaftaran</h4>
                        <p style="margin:0;color:#64748b;font-size:0.85rem;">Mohon isi data calon siswa dengan valid dan benar.</p>
                    </div>
                </div>

                {{-- Alert Sukses --}}
                @if(session('success'))
                <div class="alert alert-success rounded-4 p-4 mb-4 border-0 shadow-sm" style="background: #ecfdf5; color: #065f46;">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:40px;height:40px;background:#10b981;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;">
                            <i class="bi bi-check-lg"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Pendaftaran Berhasil!</div>
                            <div class="small opacity-75">{{ session('success') }}</div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Alert Validasi Error --}}
                @if($errors->any())
                <div class="alert alert-danger rounded-4 p-4 mb-4 border-0 shadow-sm">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Terdapat kesalahan:</strong>
                    <ul class="mb-0 mt-2 small ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('madrasah.pendaftaran.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="mendaftar_ke" value="madrasah">
                    
                    <h6 class="text-success fw-bold mb-3 mt-4">Data Pribadi Siswa</h6>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Sesuai Akta Kelahiran" value="{{ old('nama_lengkap') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tempat Lahir <span class="text-danger">*</span></label>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Kota Kelahiran" value="{{ old('tempat_lahir') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Contoh: 15-08-2010" value="{{ old('tanggal_lahir') }}" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Asal Sekolah <span class="text-danger">*</span></label>
                            <input type="text" name="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror" placeholder="Nama sekolah sebelumnya" value="{{ old('asal_sekolah') }}" required>
                        </div>
                    </div>

                    <h6 class="text-success fw-bold mb-3 mt-5">Data Orang Tua / Wali</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Wali / Orang Tua <span class="text-danger">*</span></label>
                            <input type="text" name="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror" value="{{ old('nama_wali') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nomor WhatsApp Aktif <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text" style="border: 2px solid #e2e8f0; border-right: none; background: #f8fafc; border-radius: 12px 0 0 12px;">
                                    <i class="bi bi-whatsapp text-success"></i>
                                </span>
                                <input type="tel" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror" style="border-radius: 0 12px 12px 0;" placeholder="08xxxxxxxxxx" value="{{ old('no_wa') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn-submit-reg">
                            <i class="bi bi-send-fill me-2"></i> Kirim Formulir Pendaftaran
                        </button>
                    </div>
                </form>
            </div>

            <!-- Sidebar Info -->
            <div class="col-lg-5">
                <div class="bg-light p-4 rounded-4 border border-light-subtle h-100">
                    <h5 class="fw-bold mb-4 text-dark"><i class="bi bi-info-circle-fill text-success me-2"></i>Alur Pendaftaran</h5>
                    
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

                    {{-- Informasi Pembayaran --}}
                    @if(isset($rekeningList) && ($rekeningList->count() > 0 || $qrisList->count() > 0))
                    <hr class="my-4 text-secondary">
                    <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-credit-card-fill text-success me-2"></i>Informasi Pembayaran</h5>

                    @foreach($rekeningList as $rek)
                    <div class="rekening-card mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bank-logo">{{ strtoupper(substr($rek->nama_bank, 0, 3)) }}</div>
                            <div class="flex-grow-1">
                                <div style="font-size:0.7rem;color:#059669;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">{{ $rek->nama_bank }}</div>
                                <div style="font-size:1.1rem;font-weight:800;color:#064e3b;letter-spacing:1px;">{{ $rek->no_rekening }}</div>
                                <div style="font-size:0.75rem;color:#64748b;">a.n. {{ $rek->atas_nama }}</div>
                            </div>
                            <button class="copy-btn" onclick="copyToClipboard('{{ $rek->no_rekening }}', this)">
                                <i class="bi bi-clipboard me-1"></i>Salin
                            </button>
                        </div>
                        @if($rek->keterangan)
                        <div style="font-size:0.75rem;color:#475569;background:#f8fafc;border-radius:8px;padding:8px 10px;margin-top:10px;border-left:3px solid #10b981;">
                            {{ $rek->keterangan }}
                        </div>
                        @endif
                    </div>
                    @endforeach

                    @foreach($qrisList as $qris)
                    <div class="rekening-card mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bank-logo p-1">
                                <img src="{{ asset('storage/' . $qris->gambar) }}" alt="QRIS" style="width:100%;height:100%;object-fit:contain;">
                            </div>
                            <div class="flex-grow-1">
                                <div style="font-size:0.7rem;color:#059669;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">Bayar via QRIS</div>
                                <div style="font-size:1rem;font-weight:800;color:#064e3b;">{{ $qris->nama ?: 'Scan Kode QRIS' }}</div>
                            </div>
                            <button class="copy-btn px-3" style="background:#0f172a;" onclick="window.open('{{ asset('storage/' . $qris->gambar) }}', '_blank')">
                                <i class="bi bi-arrows-fullscreen"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach

                    <div class="alert alert-success py-2 px-3 mt-2 border-0 rounded-3" style="font-size: 0.75rem; background: #ecfdf5; color: #065f46;">
                        <i class="bi bi-info-circle-fill me-1"></i> Simpan bukti transfer untuk dikonfirmasi via WhatsApp.
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(text, btn) {
        navigator.clipboard.writeText(text).then(() => {
            const originalContent = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check2"></i> Tersalin';
            btn.style.background = '#064e3b';
            setTimeout(() => {
                btn.innerHTML = originalContent;
                btn.style.background = '#10b981';
            }, 2000);
        });
    }
</script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
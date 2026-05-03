@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran Pendaftaran — PPMU')

@section('content')
<style>
    .pembayaran-hero {
        background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
        padding: calc(var(--nav-h) + 50px) 0 60px;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(16, 185, 129, 0.1);
    }
    .pembayaran-hero::before {
        content: '';
        position: absolute;
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
        top: -100px; right: -100px;
        border-radius: 50%;
    }
    .form-card {
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        overflow: hidden;
        border: 1px solid #f1f5f9;
        margin-top: -60px;
        position: relative;
        z-index: 2;
    }
    .form-card-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 30px;
        color: #fff;
    }
    .form-card-body {
        padding: 40px;
    }
    .rekening-box {
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 20px;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .rekening-box:hover {
        border-color: #10b981;
        background: rgba(16,185,129,0.02);
    }
    .bank-logo {
        width: 56px; height: 56px;
        background: #f8fafc;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-weight: 800; color: #10b981; font-size: 0.9rem;
        flex-shrink: 0;
        border: 1px solid #f1f5f9;
    }
    .copy-btn {
        background: #10b981;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 10px;
        font-size: 0.8rem;
        font-weight: 700;
        transition: all 0.2s;
    }
    .copy-btn:hover {
        background: #059669;
        transform: scale(1.05);
    }
    .wa-btn {
        background: #25d366;
        color: #fff;
        padding: 16px 32px;
        border-radius: 100px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
        box-shadow: 0 10px 20px rgba(37,211,102,0.2);
    }
    .wa-btn:hover {
        background: #128c7e;
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(37,211,102,0.3);
        color: #fff;
    }
</style>

<div class="pembayaran-hero">
    <div class="container text-center">
        <div class="badge bg-success-subtle text-success px-3 py-2 rounded-pill mb-3 fw-bold">
            <i class="bi bi-check-circle-fill me-2"></i>Pendaftaran Berhasil Disimpan
        </div>
        <h1 class="display-6 fw-bold text-dark mb-2">Instruksi Pembayaran</h1>
        <p class="text-secondary opacity-75">Silakan selesaikan pembayaran biaya pendaftaran untuk melanjutkan proses seleksi.</p>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-card">
                <div class="form-card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-1 fw-bold">Ringkasan Pendaftaran</h4>
                        <div class="small opacity-75">Nama: {{ $pendaftaran->nama_lengkap }}</div>
                    </div>
                    <div class="text-end">
                        <div class="small opacity-75">Tujuan</div>
                        <h4 class="mb-0 fw-bold">{{ strtoupper($pendaftaran->mendaftar_ke) }}</h4>
                    </div>
                </div>
                <div class="form-card-body">
                    
                    @if(session('success'))
                    <div class="alert alert-success border-0 rounded-4 p-3 mb-4" style="background:#ecfdf5; color:#065f46;">
                        <i class="bi bi-info-circle-fill me-2"></i> {{ session('success') }}
                    </div>
                    @endif

                    <h5 class="fw-bold mb-4 text-dark">Langkah 1: Pilih Metode Pembayaran</h5>
                    
                    @foreach($rekeningList as $rek)
                    <div class="rekening-box">
                        <div class="bank-logo">{{ strtoupper(substr($rek->nama_bank, 0, 3)) }}</div>
                        <div class="flex-grow-1">
                            <div style="font-size:0.75rem;color:#059669;font-weight:700;text-transform:uppercase;letter-spacing:1px;">{{ $rek->nama_bank }}</div>
                            <div style="font-size:1.3rem;font-weight:800;color:#064e3b;letter-spacing:1px;margin:2px 0;" id="rek-{{ $rek->id }}">{{ $rek->no_rekening }}</div>
                            <div style="font-size:0.85rem;color:#64748b;">Atas Nama: <span class="fw-bold text-dark">{{ $rek->atas_nama }}</span></div>
                        </div>
                        <button class="copy-btn" onclick="copyToClipboard('{{ $rek->no_rekening }}', this)">
                            <i class="bi bi-clipboard me-1"></i>Salin
                        </button>
                    </div>
                    @if($rek->keterangan)
                    <div class="alert alert-light border-0 rounded-3 small mb-4 py-2" style="margin-top:-15px; margin-left:76px; color:#475569;">
                        <i class="bi bi-info-circle me-1"></i> {{ $rek->keterangan }}
                    </div>
                    @endif
                    @endforeach

                    @foreach($qrisList as $qris)
                    <div class="rekening-box flex-column align-items-center text-center py-4">
                        <div style="font-size:0.75rem;color:#059669;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:15px;">Metode: QRIS (E-Wallet & Mobile Banking)</div>
                        
                        <div style="background:#fff; padding:15px; border:1px solid #e2e8f0; border-radius:16px; margin-bottom:15px;">
                            <img src="{{ asset('storage/' . $qris->gambar) }}" alt="QRIS" style="width:220px; height:220px; object-fit:contain;">
                        </div>

                        <div style="font-size:1.1rem;font-weight:800;color:#064e3b;margin-bottom:5px;">{{ $qris->nama ?: 'Scan QRIS PPMU' }}</div>
                        <div style="font-size:0.85rem;color:#64748b;">Dapat di-scan menggunakan: <span class="fw-medium text-dark">Gopay, OVO, Dana, LinkAja, BCA Mobile, dll.</span></div>
                        
                        <a href="{{ asset('storage/' . $qris->gambar) }}" target="_blank" class="btn btn-sm btn-outline-secondary mt-3 rounded-pill px-3">
                            <i class="bi bi-arrows-fullscreen me-1"></i> Perbesar Gambar
                        </a>
                    </div>
                    @endforeach

                    <div class="mt-5 pt-4 border-top">
                        <h5 class="fw-bold mb-3 text-dark">Langkah 2: Konfirmasi Pembayaran</h5>
                        <p class="text-secondary mb-4">
                            Setelah melakukan pembayaran, mohon kirimkan bukti transfer melalui WhatsApp ke Admin untuk mempercepat proses verifikasi pendaftaran Anda.
                        </p>
                        
                        <div class="text-center">
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20ingin%20konfirmasi%20pembayaran%20pendaftaran%20atas%20nama%20{{ urlencode($pendaftaran->nama_lengkap) }}%20ke%20tujuan%20{{ $pendaftaran->mendaftar_ke }}" target="_blank" class="wa-btn">
                                <i class="bi bi-whatsapp"></i> Konfirmasi via WhatsApp
                            </a>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <a href="{{ route('home') }}" class="text-decoration-none text-muted small">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                        </a>
                    </div>

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
@endsection

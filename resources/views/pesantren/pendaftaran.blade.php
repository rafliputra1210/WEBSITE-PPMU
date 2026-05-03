@extends('layouts.app')

@section('title', 'Pendaftaran Santri Baru — PPMU')

@section('styles')
<style>
    .pendaftaran-hero {
        background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
        padding: calc(var(--nav-h) + 50px) 0 60px;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(16, 185, 129, 0.1);
    }
    .pendaftaran-hero::before {
        content: '';
        position: absolute;
        width: 500px; height: 500px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
        top: -100px; right: -100px;
        pointer-events: none;
    }
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(16, 185, 129, 0.08);
        border: 1px solid rgba(16, 185, 129, 0.2);
        color: #064e3b;
        padding: 6px 16px;
        border-radius: 100px;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 20px;
    }
    .form-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.12);
        overflow: hidden;
    }
    .form-card-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 28px 36px;
    }
    .form-card-body {
        padding: 36px;
    }
    .form-section-title {
        font-size: 0.72rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #10b981;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .form-section-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: linear-gradient(to right, #e2e8f0, transparent);
    }
    .form-label {
        font-weight: 600;
        font-size: 0.85rem;
        color: #374151;
        margin-bottom: 6px;
    }
    .form-control, .form-select {
        border: 1.5px solid #e5e7eb;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 0.9rem;
        transition: all 0.2s;
        color: #1e293b;
    }
    .form-control:focus, .form-select:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16,185,129,0.12);
        outline: none;
    }
    .form-control.is-invalid, .form-select.is-invalid {
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239,68,68,0.1);
    }
    .invalid-feedback { font-size: 0.78rem; }
    .btn-submit {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 14px 40px;
        font-weight: 700;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
        transition: all 0.3s;
        box-shadow: 0 4px 20px rgba(16,185,129,0.2);
        width: 100%;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(16,185,129,0.35);
        color: #fff;
    }
    .alert-success-custom {
        background: linear-gradient(135deg, #ecfdf5, #d1fae5);
        border: 1px solid #6ee7b7;
        border-radius: 14px;
        padding: 20px 24px;
        color: #065f46;
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
    }
    .alert-success-custom .check-icon {
        width: 44px; height: 44px;
        background: #10b981;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #fff;
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    .info-card {
        background: linear-gradient(135deg, #ffffff, #f0fdf4);
        border: 1px solid #dcfce7;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    }
    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 16px;
    }
    .info-item:last-child { margin-bottom: 0; }
    .info-icon {
        width: 36px; height: 36px;
        border-radius: 9px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
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
@endsection

@section('content')

<!-- Hero -->
<div class="pendaftaran-hero">
    <div class="container">
        <div class="text-center">
            <div class="hero-badge">
                <i class="bi bi-person-plus-fill"></i>
                PPDB 2026 / 2027
            </div>
            <h1 class="display-5 fw-bold text-dark mb-3">Formulir Pendaftaran Santri</h1>
            <p class="text-secondary mb-0" style="max-width:520px;margin:auto;font-size:1rem;">
                Isi data dengan lengkap dan benar. Tim kami akan menghubungi Anda melalui WhatsApp setelah pendaftaran diterima.
            </p>
        </div>
    </div>
</div>

<!-- Content -->
<div class="page-padded-top" style="padding-top:0;background:#f8fafc;padding-bottom:80px;">
    <div class="container" style="margin-top:-40px;">
        <div class="row g-4 justify-content-center">

            <!-- Form -->
            <div class="col-lg-8">
                <div class="form-card">
                    <div class="form-card-header">
                        <h2 class="h5 fw-bold text-white mb-1">
                            <i class="bi bi-clipboard-check me-2"></i>Data Pendaftaran
                        </h2>
                        <p class="text-white opacity-75 mb-0" style="font-size:0.85rem;">
                            Semua field bertanda <span class="text-warning fw-bold">*</span> wajib diisi
                        </p>
                    </div>
                    <div class="form-card-body">

                        {{-- Alert Sukses --}}
                        @if(session('success'))
                        <div class="alert-success-custom">
                            <div class="check-icon"><i class="bi bi-check-lg"></i></div>
                            <div>
                                <div class="fw-bold" style="font-size:0.95rem;">Pendaftaran Berhasil!</div>
                                <div style="font-size:0.85rem;margin-top:3px;">{{ session('success') }}</div>
                            </div>
                        </div>
                        @endif

                        {{-- Alert Validasi Error --}}
                        @if($errors->any())
                        <div class="alert alert-danger rounded-3 mb-4" style="font-size:0.85rem;">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong>Terdapat kesalahan:</strong>
                            <ul class="mb-0 mt-1 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('pesantren.pendaftaran.store') }}" method="POST">
                            @csrf

                            <!-- Data Diri -->
                            <div class="form-section-title">
                                <i class="bi bi-person-circle"></i> Data Diri Calon Santri
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap"
                                       class="form-control @error('nama_lengkap') is-invalid @enderror"
                                       placeholder="Nama sesuai akta kelahiran"
                                       value="{{ old('nama_lengkap') }}">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" name="tempat_lahir"
                                           class="form-control @error('tempat_lahir') is-invalid @enderror"
                                           placeholder="Kota / Kabupaten"
                                           value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="text" name="tanggal_lahir"
                                           class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                           placeholder="Contoh: 15-08-2010"
                                           value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Asal Sekolah <span class="text-danger">*</span></label>
                                <input type="text" name="asal_sekolah"
                                       class="form-control @error('asal_sekolah') is-invalid @enderror"
                                       placeholder="Nama sekolah sebelumnya (SD/SMP/MTs)"
                                       value="{{ old('asal_sekolah') }}">
                                @error('asal_sekolah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tujuan Pendaftaran -->
                            <div class="form-section-title">
                                <i class="bi bi-building"></i> Tujuan Pendaftaran
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Mendaftar Ke <span class="text-danger">*</span></label>
                                <select name="mendaftar_ke"
                                        class="form-select @error('mendaftar_ke') is-invalid @enderror">
                                    <option value="" disabled {{ old('mendaftar_ke') ? '' : 'selected' }}>-- Pilih Tujuan --</option>
                                    <option value="pesantren" {{ old('mendaftar_ke') == 'pesantren' ? 'selected' : '' }}>
                                        🕌 Pondok Pesantren Mahasiswa Universal (PPMU)
                                    </option>
                                    <option value="madrasah" {{ old('mendaftar_ke') == 'madrasah' ? 'selected' : '' }}>
                                        🏫 Madrasah / Sekolah Formal
                                    </option>
                                </select>
                                @error('mendaftar_ke')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Data Wali -->
                            <div class="form-section-title">
                                <i class="bi bi-people"></i> Data Orang Tua / Wali
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Wali / Orang Tua <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_wali"
                                           class="form-control @error('nama_wali') is-invalid @enderror"
                                           placeholder="Nama lengkap orang tua / wali"
                                           value="{{ old('nama_wali') }}">
                                    @error('nama_wali')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nomor WhatsApp Aktif <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="border-radius:10px 0 0 10px;border:1.5px solid #e5e7eb;background:#f8fafc;">
                                            <i class="bi bi-whatsapp text-success"></i>
                                        </span>
                                        <input type="text" name="no_wa"
                                               class="form-control @error('no_wa') is-invalid @enderror"
                                               style="border-radius:0 10px 10px 0;"
                                               placeholder="08xxxxxxxxxx"
                                               value="{{ old('no_wa') }}">
                                        @error('no_wa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn-submit">
                                <i class="bi bi-send-fill me-2"></i>Kirim Pendaftaran
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Info Samping -->
            <div class="col-lg-4">
                <!-- Alur Pendaftaran -->
                <div class="info-card mb-4">
                    <div class="fw-bold text-dark mb-3" style="font-size:0.9rem;">
                        <i class="bi bi-list-ol me-2 text-primary"></i>Alur Pendaftaran
                    </div>
                    <div class="info-item">
                        <div class="step-badge">1</div>
                        <div>
                            <div class="fw-semibold" style="font-size:0.85rem;">Isi Formulir Online</div>
                            <div class="text-muted" style="font-size:0.78rem;">Lengkapi semua data dengan benar</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="step-badge">2</div>
                        <div>
                            <div class="fw-semibold" style="font-size:0.85rem;">Konfirmasi WhatsApp</div>
                            <div class="text-muted" style="font-size:0.78rem;">Tim kami menghubungi dalam 1x24 jam</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="step-badge">3</div>
                        <div>
                            <div class="fw-semibold" style="font-size:0.85rem;">Seleksi & Wawancara</div>
                            <div class="text-muted" style="font-size:0.78rem;">Datang ke pesantren untuk wawancara</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="step-badge" style="background:#10b981;">4</div>
                        <div>
                            <div class="fw-semibold" style="font-size:0.85rem;">Diterima & Registrasi</div>
                            <div class="text-muted" style="font-size:0.78rem;">Selesaikan administrasi daftar ulang</div>
                        </div>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="info-card">
                    <div class="fw-bold text-dark mb-3" style="font-size:0.9rem;">
                        <i class="bi bi-headset me-2 text-success"></i>Butuh Bantuan?
                    </div>
                    <div class="info-item">
                        <div class="info-icon" style="background:#ecfdf5;color:#059669;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div>
                            <div class="fw-semibold text-dark" style="font-size:0.82rem;">WhatsApp</div>
                            <div class="text-muted" style="font-size:0.78rem;">+62 812 3456 7890</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon" style="background:#fef3c7;color:#d97706;">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div>
                            <div class="fw-semibold text-dark" style="font-size:0.82rem;">Jam Layanan</div>
                            <div class="text-muted" style="font-size:0.78rem;">Senin – Jumat, 08.00 – 16.00</div>
                        </div>
                    </div>
                </div>

                {{-- Informasi Pembayaran --}}
                @if($rekeningList->count() > 0 || $qrisList->count() > 0)
                <div class="info-card mt-4">
                    <div class="fw-bold text-dark mb-3" style="font-size:0.9rem;">
                        <i class="bi bi-credit-card me-2 text-success"></i>Informasi Pembayaran (Biaya Pendaftaran)
                    </div>

                    @foreach($rekeningList as $rek)
                    <div class="rekening-card mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bank-logo">{{ strtoupper(substr($rek->nama_bank, 0, 3)) }}</div>
                            <div class="flex-grow-1">
                                <div style="font-size:0.7rem;color:#059669;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">{{ $rek->nama_bank }}</div>
                                <div style="font-size:1.1rem;font-weight:800;color:#064e3b;letter-spacing:1px;" id="rek-{{ $rek->id }}">{{ $rek->no_rekening }}</div>
                                <div style="font-size:0.78rem;color:#64748b;">a.n. {{ $rek->atas_nama }}</div>
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

                    <div class="alert alert-info py-2 px-3 mt-2 border-0 rounded-3" style="font-size: 0.75rem;">
                        <i class="bi bi-info-circle-fill me-1"></i> Simpan bukti transfer untuk dikonfirmasi via WhatsApp.
                    </div>
                </div>
                @endif

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

@endsection
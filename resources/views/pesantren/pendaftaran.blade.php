@extends('layouts.app')

@section('title', 'Pendaftaran PPDB 2026 — Pesantren PPMU')

@section('styles')
<style>
    .reg-hero {
        background: linear-gradient(135deg, #0a0f2e 0%, #1a1040 60%, #0d2137 100%);
        padding: calc(var(--nav-h) + 40px) 0 60px;
        position: relative;
        overflow: hidden;
    }
    .reg-hero::before {
        content: '';
        position: absolute;
        width: 500px; height: 500px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(99,102,241,0.15) 0%, transparent 70%);
        top: -100px; right: -100px;
        pointer-events: none;
    }
    .reg-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(99,102,241,0.15);
        border: 1px solid rgba(99,102,241,0.3);
        color: #a5b4fc;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 100px;
        margin-bottom: 18px;
    }
    .reg-hero h1 {
        color: #fff;
        font-weight: 800;
        font-size: clamp(1.8rem, 4vw, 2.6rem);
        line-height: 1.2;
        margin-bottom: 12px;
    }
    .reg-hero p {
        color: rgba(255,255,255,0.65);
        font-size: 1rem;
    }
    .form-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.12);
        overflow: hidden;
    }
    .form-card-header {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        padding: 22px 30px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .form-card-header .icon-wrap {
        width: 44px; height: 44px;
        background: rgba(255,255,255,0.2);
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.3rem; color: #fff;
        flex-shrink: 0;
    }
    .form-card-header h5 {
        color: #fff;
        font-weight: 700;
        margin: 0;
        font-size: 1.1rem;
    }
    .form-card-header p {
        color: rgba(255,255,255,0.75);
        margin: 0;
        font-size: 0.82rem;
    }
    .form-card-body { padding: 30px; }
    .form-section-title {
        font-size: 0.72rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        color: #94a3b8;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .form-section-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e2e8f0;
    }
    .form-label {
        font-weight: 600;
        font-size: 0.85rem;
        color: #374151;
        margin-bottom: 6px;
    }
    .form-control, .form-select {
        border-radius: 10px;
        border: 1.5px solid #e2e8f0;
        padding: 10px 14px;
        font-size: 0.9rem;
        color: #1e293b;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-control:focus, .form-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
        outline: none;
    }
    .form-control.is-invalid, .form-select.is-invalid {
        border-color: #ef4444;
    }
    .invalid-feedback { font-size: 0.8rem; }
    .btn-submit-reg {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 13px 30px;
        font-weight: 700;
        font-size: 1rem;
        width: 100%;
        transition: all 0.3s;
        box-shadow: 0 6px 20px rgba(99,102,241,0.35);
    }
    .btn-submit-reg:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(99,102,241,0.45);
        color: #fff;
    }
    .info-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 20px;
    }
    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 14px;
    }
    .info-item:last-child { margin-bottom: 0; }
    .info-icon {
        width: 36px; height: 36px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }
    .info-item p { margin: 0; font-size: 0.85rem; color: #475569; line-height: 1.5; }
    .info-item strong { color: #1e293b; display: block; font-size: 0.88rem; margin-bottom: 2px; }
    .alert-success-custom {
        background: linear-gradient(135deg, rgba(16,185,129,0.08), rgba(5,150,105,0.08));
        border: 1px solid rgba(16,185,129,0.3);
        border-radius: 12px;
        padding: 16px 20px;
        color: #065f46;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')

{{-- Hero --}}
<section class="reg-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="reg-badge"><i class="bi bi-mortarboard-fill"></i> PPDB 2026 / 2027</span>
                <h1>Daftar Sekarang,<br>Raih Masa Depan Gemilang</h1>
                <p>Bergabunglah bersama ribuan santri dan siswa di Pesantren &amp; Madrasah PPMU. Isi formulir di bawah ini dan tim kami akan segera menghubungi Anda.</p>
            </div>
        </div>
    </div>
</section>

{{-- Form Section --}}
<section style="background:#f8fafc; padding: 60px 0 80px;">
    <div class="container">
        <div class="row g-4">

            {{-- Form Pendaftaran --}}
            <div class="col-lg-8">
                <div class="form-card">
                    <div class="form-card-header">
                        <div class="icon-wrap"><i class="bi bi-pencil-square"></i></div>
                        <div>
                            <h5>Formulir Pendaftaran Santri / Siswa Baru</h5>
                            <p>Isi semua data dengan lengkap dan benar</p>
                        </div>
                    </div>
                    <div class="form-card-body">

                        {{-- Alert Sukses --}}
                        @if(session('success'))
                        <div class="alert-success-custom">
                            <i class="bi bi-check-circle-fill" style="font-size:1.3rem;color:#10b981;flex-shrink:0;"></i>
                            {{ session('success') }}
                        </div>
                        @endif

                        {{-- Alert Error --}}
                        @if($errors->any())
                        <div class="alert alert-danger rounded-3 mb-4">
                            <strong><i class="bi bi-exclamation-triangle me-2"></i>Mohon perbaiki kesalahan berikut:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('pesantren.pendaftaran.store') }}" method="POST" id="form-pendaftaran">
                            @csrf

                            {{-- Data Diri --}}
                            <div class="form-section-title">Data Calon Santri / Siswa</div>

                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap"
                                       class="form-control @error('nama_lengkap') is-invalid @enderror"
                                       placeholder="Masukkan nama lengkap sesuai akta"
                                       value="{{ old('nama_lengkap') }}" required>
                                @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" name="tempat_lahir"
                                           class="form-control @error('tempat_lahir') is-invalid @enderror"
                                           placeholder="Kota / Kabupaten"
                                           value="{{ old('tempat_lahir') }}" required>
                                    @error('tempat_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_lahir"
                                           class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                           value="{{ old('tanggal_lahir') }}" required>
                                    @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Asal Sekolah <span class="text-danger">*</span></label>
                                <input type="text" name="asal_sekolah"
                                       class="form-control @error('asal_sekolah') is-invalid @enderror"
                                       placeholder="Nama sekolah sebelumnya (SD / SMP / MTs)"
                                       value="{{ old('asal_sekolah') }}" required>
                                @error('asal_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Mendaftar Ke <span class="text-danger">*</span></label>
                                <select name="mendaftar_ke" class="form-select @error('mendaftar_ke') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('mendaftar_ke') ? '' : 'selected' }}>-- Pilih tujuan pendaftaran --</option>
                                    <option value="pesantren" {{ old('mendaftar_ke') == 'pesantren' ? 'selected' : '' }}>🕌 Pesantren PPMU</option>
                                    <option value="madrasah" {{ old('mendaftar_ke') == 'madrasah' ? 'selected' : '' }}>🏫 Madrasah PPMU</option>
                                </select>
                                @error('mendaftar_ke')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            {{-- Data Wali --}}
                            <div class="form-section-title">Data Orang Tua / Wali</div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Wali <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_wali"
                                           class="form-control @error('nama_wali') is-invalid @enderror"
                                           placeholder="Nama orang tua / wali"
                                           value="{{ old('nama_wali') }}" required>
                                    @error('nama_wali')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nomor WhatsApp Aktif <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="border-radius:10px 0 0 10px;border:1.5px solid #e2e8f0;border-right:0;background:#f8fafc;color:#475569;font-size:0.85rem;">
                                            <i class="bi bi-whatsapp text-success me-1"></i> +62
                                        </span>
                                        <input type="text" name="no_wa"
                                               class="form-control @error('no_wa') is-invalid @enderror"
                                               placeholder="8xxxxxxxxxx"
                                               value="{{ old('no_wa') }}"
                                               style="border-radius:0 10px 10px 0;" required>
                                        @error('no_wa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn-submit-reg">
                                <i class="bi bi-send-fill me-2"></i>Kirim Formulir Pendaftaran
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            {{-- Sidebar Info --}}
            <div class="col-lg-4">
                <div class="info-card mb-3">
                    <div class="form-section-title" style="margin-bottom:16px;">Informasi Pendaftaran</div>
                    <div class="info-item">
                        <div class="info-icon" style="background:#eef2ff;color:#6366f1;"><i class="bi bi-calendar-check-fill"></i></div>
                        <div>
                            <strong>Periode Pendaftaran</strong>
                            <p>1 Januari – 30 Juni 2026</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon" style="background:#f0fdf4;color:#16a34a;"><i class="bi bi-cash-coin"></i></div>
                        <div>
                            <strong>Biaya Pendaftaran</strong>
                            <p>Gratis — tidak dipungut biaya apapun</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon" style="background:#fff7ed;color:#ea580c;"><i class="bi bi-whatsapp"></i></div>
                        <div>
                            <strong>Konfirmasi via WhatsApp</strong>
                            <p>Tim kami akan menghubungi dalam 1×24 jam</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon" style="background:#faf5ff;color:#7c3aed;"><i class="bi bi-file-earmark-text-fill"></i></div>
                        <div>
                            <strong>Dokumen yang Disiapkan</strong>
                            <p>Fotocopy KK, Akta Kelahiran, Ijazah / SKHUN terakhir</p>
                        </div>
                    </div>
                </div>

                <div class="info-card" style="background:linear-gradient(135deg,#0a0f2e,#1a1040);border-color:rgba(255,255,255,0.08);">
                    <p style="color:rgba(255,255,255,0.6);font-size:0.82rem;margin-bottom:10px;">Ada pertanyaan?</p>
                    <p style="color:#fff;font-weight:700;font-size:0.95rem;margin-bottom:14px;">Hubungi kami langsung via WhatsApp</p>
                    <a href="https://wa.me/6281234567890" target="_blank"
                       style="display:flex;align-items:center;justify-content:center;gap:8px;background:#25d366;color:#fff;border-radius:100px;padding:10px 20px;text-decoration:none;font-weight:700;font-size:0.9rem;transition:all 0.25s;">
                        <i class="bi bi-whatsapp"></i> Chat WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
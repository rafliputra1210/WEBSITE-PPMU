@extends('layouts.app')

@section('title', 'Investasi Akhirat — Donasi untuk Pesantren')

@section('content')
<style>
    /* ==================== DONASI STYLE ==================== */

    /* CLEANED */

    /* ==================== PROGRESS CARD ==================== */
    .progress-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 2.5rem;
        box-shadow: 0 25px 60px rgba(0,0,0,0.08);
        border: 1px solid #e2e8f0;
        position: relative;
        z-index: 2;
        margin-top: -60px;
    }

    .progress-main {
        height: 20px;
        background: #f1f5f9;
        border-radius: 100px;
        overflow: hidden;
        position: relative;
    }

    .progress-main .bar {
        height: 100%;
        background: linear-gradient(90deg, #10b981 0%, #34d399 50%, #6ee7b7 100%);
        border-radius: 100px;
        transition: width 1.5s cubic-bezier(0.22, 1, 0.36, 1);
        position: relative;
    }

    .progress-main .bar::after {
        content: '';
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 14px;
        height: 14px;
        background: #fff;
        border: 3px solid #10b981;
        border-radius: 50%;
        box-shadow: 0 0 0 4px rgba(16,185,129,0.2);
    }

    .stat-mini {
        text-align: center;
        padding: 16px;
    }

    .stat-mini h4 {
        font-size: 1.6rem;
        font-weight: 800;
        color: #064e3b;
        margin-bottom: 2px;
    }

    .stat-mini p {
        font-size: 0.78rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        margin: 0;
    }

    /* ==================== NOMINAL BUTTONS ==================== */
    .nominal-btn {
        border: 2px solid #e2e8f0;
        background: #fff;
        padding: 12px 8px;
        border-radius: 14px;
        color: #334155;
        font-weight: 700;
        font-size: 0.9rem;
        transition: all 0.25s ease;
        cursor: pointer;
        text-align: center;
        width: 100%;
    }

    .nominal-btn:hover, .nominal-btn.active {
        border-color: #10b981;
        background: rgba(16,185,129,0.06);
        color: #064e3b;
        box-shadow: 0 0 0 3px rgba(16,185,129,0.1);
    }

    .nominal-btn small {
        display: block;
        font-weight: 500;
        color: #94a3b8;
        font-size: 0.72rem;
        margin-top: 2px;
    }

    /* ==================== FORM SECTION ==================== */
    .donasi-form-section {
        padding: 60px 0 80px;
        background: #f8fafb;
    }

    .form-card {
        background: #fff;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.04);
        border: 1px solid #f1f5f9;
    }

    .form-card .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 13px 16px;
        font-size: 0.95rem;
        transition: all 0.25s ease;
        background: #fafbfc;
    }

    .form-card .form-control:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 4px rgba(16,185,129,0.1);
        background: #fff;
    }

    .form-card .form-label {
        font-weight: 700;
        color: #1e293b;
        font-size: 0.88rem;
        margin-bottom: 6px;
    }

    .btn-donasi-submit {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #fff;
        border: none;
        padding: 16px 40px;
        border-radius: 100px;
        font-weight: 800;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 30px rgba(16,185,129,0.35);
        width: 100%;
    }

    .btn-donasi-submit:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 16px 40px rgba(16,185,129,0.45);
    }

    /* ==================== REKENING INFO ==================== */
    .rekening-card {
        background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        border: 1px solid #bbf7d0;
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .rekening-card:hover {
        box-shadow: 0 8px 25px rgba(16,185,129,0.1);
    }

    .bank-logo {
        width: 48px;
        height: 48px;
        background: #fff;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.7rem;
        color: #064e3b;
        border: 1px solid #bbf7d0;
        flex-shrink: 0;
    }

    .copy-btn {
        background: #10b981;
        border: none;
        color: #fff;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }

    .copy-btn:hover {
        background: #059669;
    }

    /* ==================== DONATUR LIST ==================== */
    .donatur-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .donatur-item:last-child { border-bottom: none; }

    .donatur-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
        color: #fff;
        flex-shrink: 0;
    }

    /* ==================== WHY DONATE ==================== */
    .why-card {
        background: #fff;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        padding: 2rem 1.5rem;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
    }

    .why-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.06);
    }

    .why-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-bottom: 1rem;
    }

    /* ==================== ALERT ==================== */
    .alert-donasi {
        background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        border: 1px solid #86efac;
        border-radius: 16px;
        padding: 20px 24px;
        color: #064e3b;
        display: flex;
        align-items: flex-start;
        gap: 14px;
        animation: slideDown 0.4s ease;
    }

    .alert-donasi .alert-icon {
        width: 40px;
        height: 40px;
        background: #10b981;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .section-chip-green {
        display: inline-block;
        background: rgba(16,185,129,0.1);
        color: #059669;
        border: 1px solid rgba(16,185,129,0.2);
        padding: 6px 18px;
        border-radius: 100px;
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 16px;
    }

    /* ==================== DONASI HERO ==================== */
    .donasi-hero {
        background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
        padding-top: calc(var(--nav-h) + 40px);
        padding-bottom: 120px;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(16, 185, 129, 0.1);
    }

    .donasi-hero::before {
        content: '';
        position: absolute;
        width: 40vw;
        height: 40vw;
        background: radial-gradient(circle, rgba(16,185,129,0.15) 0%, transparent 70%);
        top: -10vw;
        right: -10vw;
        border-radius: 50%;
    }

    .donasi-hero::after {
        content: '';
        position: absolute;
        width: 30vw;
        height: 30vw;
        background: radial-gradient(circle, rgba(52,211,153,0.1) 0%, transparent 70%);
        bottom: -5vw;
        left: -5vw;
        border-radius: 50%;
    }

    .hero-poster-wrapper {
        position: relative;
        z-index: 2;
        max-width: 1100px;
        margin: 0 auto;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 30px 70px rgba(0,0,0,0.12);
        border: 1px solid rgba(16, 185, 129, 0.1);
        transition: transform 0.4s ease;
    }

    .hero-poster-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 40px 70px rgba(0,0,0,0.5);
    }
    
    .hero-poster {
        width: 100%;
        height: auto;
        display: block;
    }

    /* ==================== PROGRESS CARD ==================== */
</style>

{{-- ===================== DONASI HERO ===================== --}}
<section class="donasi-hero px-3">
    <div class="container position-relative" style="z-index:2;">
        <div class="hero-poster-wrapper">
            @php
                $heroPoster = \App\Models\Setting::get('donasi_hero_poster');
            @endphp
            <img src="{{ $heroPoster ? asset('storage/' . $heroPoster) : asset('images/Stiker Investasi.png') }}" 
                 alt="Poster Investasi Akhirat" class="hero-poster">
        </div>
    </div>
</section>

{{-- ===================== PROGRESS SECTION ===================== --}}
<section class="container">
    <div class="progress-card" data-aos="fade-up">
        {{-- Flash Message --}}
        @if(session('success'))
        <div class="alert-donasi mb-4">
            <div class="alert-icon"><i class="bi bi-check-lg"></i></div>
            <div>
                <div style="font-weight:700;margin-bottom:4px;">Donasi Berhasil Tercatat!</div>
                <div style="font-size:0.88rem;color:#065f46;">{{ session('success') }}</div>
            </div>
        </div>
        @endif

        <div class="text-center mb-4">
            <span class="section-chip-green">Target Pembangunan Masjid Pesantren</span>
            <h2 style="font-size:2.2rem;font-weight:900;color:#064e3b;letter-spacing:-1px;">
                Rp {{ number_format($totalTerkumpul, 0, ',', '.') }}
            </h2>
            <p style="color:#64748b;font-size:0.9rem;">
                terkumpul dari target <strong style="color:#1e293b;">Rp {{ number_format($targetDonasi, 0, ',', '.') }}</strong>
            </p>
        </div>

        <div class="progress-main mb-4">
            <div class="bar" style="width: {{ $persentase }}%;"></div>
        </div>

        <div class="row g-3">
            <div class="col-4">
                <div class="stat-mini">
                    <h4>{{ $persentase }}%</h4>
                    <p>Tercapai</p>
                </div>
            </div>
            <div class="col-4">
                <div class="stat-mini" style="border-left:2px solid #f1f5f9;border-right:2px solid #f1f5f9;">
                    <h4>{{ $jumlahDonatur }}</h4>
                    <p>Donatur</p>
                </div>
            </div>
            <div class="col-4">
                <div class="stat-mini">
                    <h4>Rp {{ number_format($targetDonasi - $totalTerkumpul, 0, ',', '.') }}</h4>
                    <p>Sisa Target</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== FORM + SIDEBAR ===================== --}}
<section class="donasi-form-section">
    <div class="container">
        <div class="row g-5">
            {{-- FORM COLUMN --}}
            <div class="col-lg-8 mx-auto">
                <div class="form-card" data-aos="fade-up">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div style="width:48px;height:48px;background:linear-gradient(135deg,#10b981,#059669);border-radius:14px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.2rem;">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <div>
                            <h4 style="font-weight:800;color:#0f172a;margin:0;font-size:1.2rem;">Formulir Donasi</h4>
                            <p style="margin:0;color:#64748b;font-size:0.82rem;">Isi data di bawah untuk menyalurkan donasi Anda</p>
                        </div>
                    </div>

                    <form action="{{ route('pesantren.donasi.store') }}" method="POST">
                        @csrf

                        {{-- NAMA --}}
                        <div class="mb-4">
                            <label class="form-label">Nama Donatur</label>
                            <input type="text" name="nama_donatur" class="form-control @error('nama_donatur') is-invalid @enderror"
                                   placeholder="Kosongkan jika ingin anonim (Hamba Allah)" value="{{ old('nama_donatur') }}">
                            @error('nama_donatur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- NO WA --}}
                        <div class="mb-4">
                            <label class="form-label">Nomor WhatsApp <span style="font-weight:400;color:#94a3b8;">(Opsional)</span></label>
                            <input type="text" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror"
                                   placeholder="Contoh: 081234567890" value="{{ old('no_wa') }}">
                            @error('no_wa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- JENIS DONASI --}}
                        <div class="mb-4">
                            <label class="form-label">Jenis Donasi</label>
                            <select name="jenis_donasi" id="jenis_donasi" class="form-control @error('jenis_donasi') is-invalid @enderror" onchange="toggleNominal(this.value)">
                                <option value="nominal" {{ old('jenis_donasi') == 'nominal' ? 'selected' : '' }}>Donasi Uang (Nominal)</option>
                                <option value="material" {{ old('jenis_donasi') == 'material' ? 'selected' : '' }}>Donasi Barang (Material)</option>
                            </select>
                            @error('jenis_donasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- NOMINAL QUICK SELECT --}}
                        <div class="mb-3" id="nominal_quick_select">
                            <label class="form-label">Pilih Nominal</label>
                            <div class="row g-2">
                                <div class="col-4 col-md-3">
                                    <button type="button" class="nominal-btn" data-nominal="50000" onclick="setNominal(this, 50000)">
                                        Rp 50rb
                                    </button>
                                </div>
                                <div class="col-4 col-md-3">
                                    <button type="button" class="nominal-btn" data-nominal="100000" onclick="setNominal(this, 100000)">
                                        Rp 100rb
                                    </button>
                                </div>
                                <div class="col-4 col-md-3">
                                    <button type="button" class="nominal-btn" data-nominal="250000" onclick="setNominal(this, 250000)">
                                        Rp 250rb
                                    </button>
                                </div>
                                <div class="col-4 col-md-3">
                                    <button type="button" class="nominal-btn" data-nominal="500000" onclick="setNominal(this, 500000)">
                                        Rp 500rb
                                    </button>
                                </div>
                                <div class="col-4 col-md-3">
                                    <button type="button" class="nominal-btn" data-nominal="1000000" onclick="setNominal(this, 1000000)">
                                        Rp 1 Juta
                                    </button>
                                </div>
                                <div class="col-4 col-md-3">
                                    <button type="button" class="nominal-btn" data-nominal="2500000" onclick="setNominal(this, 2500000)">
                                        Rp 2.5 Juta
                                    </button>
                                </div>
                                <div class="col-4 col-md-3">
                                    <button type="button" class="nominal-btn" data-nominal="5000000" onclick="setNominal(this, 5000000)">
                                        Rp 5 Juta
                                    </button>
                                </div>
                                <div class="col-4 col-md-3">
                                    <button type="button" class="nominal-btn" data-nominal="10000000" onclick="setNominal(this, 10000000)">
                                        Rp 10 Juta
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- NOMINAL INPUT --}}
                        <div class="mb-4" id="nominal_input_group">
                            <label class="form-label">Nominal Donasi (Rp)</label>
                            <input type="number" name="jumlah_donasi" id="jumlah_donasi"
                                   class="form-control @error('jumlah_donasi') is-invalid @enderror"
                                   placeholder="Minimal Rp 10.000" value="{{ old('jumlah_donasi') }}" min="10000">
                            @error('jumlah_donasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div style="font-size:0.78rem;color:#94a3b8;margin-top:6px;">
                                <i class="bi bi-info-circle me-1"></i> Atau ketik nominal bebas di atas. Minimal Rp 10.000
                            </div>
                        </div>

                        {{-- DOA / PESAN --}}
                        <div class="mb-4">
                            <label class="form-label">Doa / Pesan <span style="font-weight:400;color:#94a3b8;">(Opsional)</span></label>
                            <textarea name="pesan" class="form-control @error('pesan') is-invalid @enderror" rows="3"
                                      placeholder="Semoga menjadi amal jariyah yang bermanfaat...">{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn-donasi-submit">
                            <i class="bi bi-heart-fill me-2"></i>Donasi Sekarang
                        </button>
                    </form>
                </div>
            </div>

            {{-- SIDEBAR COLUMN --}}
            <div class="col-lg-4">
                {{-- REKENING INFO --}}
                <div class="form-card mb-4" data-aos="fade-left" data-aos-delay="100">
                    <h5 style="font-weight:800;color:#0f172a;margin-bottom:1.2rem;font-size:1.05rem;">
                        <i class="bi bi-bank me-2 text-success"></i>Informasi Rekening
                    </h5>

                    <div class="rekening-card mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bank-logo">BSI</div>
                            <div class="flex-grow-1">
                                <div style="font-size:0.75rem;color:#059669;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">Bank Syariah Indonesia</div>
                                <div style="font-size:1.15rem;font-weight:800;color:#064e3b;letter-spacing:1px;" id="rek-bsi">
                                    {{ \App\Models\Setting::get('donasi_rekening_bsi', '7172 8399 01') }}
                                </div>
                                <div style="font-size:0.78rem;color:#64748b;">a.n. {{ \App\Models\Setting::get('donasi_rekening_nama', 'Yayasan Pesantren Terpadu') }}</div>
                            </div>
                            <button class="copy-btn" onclick="copyRek('rek-bsi')">
                                <i class="bi bi-clipboard me-1"></i>Salin
                            </button>
                        </div>
                    </div>

                    <div class="rekening-card">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bank-logo">BRI</div>
                            <div class="flex-grow-1">
                                <div style="font-size:0.75rem;color:#059669;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">Bank Rakyat Indonesia</div>
                                <div style="font-size:1.15rem;font-weight:800;color:#064e3b;letter-spacing:1px;" id="rek-bri">
                                    {{ \App\Models\Setting::get('donasi_rekening_bri', '0123 0456 7890 123') }}
                                </div>
                                <div style="font-size:0.78rem;color:#64748b;">a.n. {{ \App\Models\Setting::get('donasi_rekening_nama', 'Yayasan Pesantren Terpadu') }}</div>
                            </div>
                            <button class="copy-btn" onclick="copyRek('rek-bri')">
                                <i class="bi bi-clipboard me-1"></i>Salin
                            </button>
                        </div>
                    </div>

                    @forelse($listQris as $qris)
                    <div class="rekening-card mt-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bank-logo" style="width: 56px; height: 56px; overflow: hidden; padding: 4px;">
                                <img src="{{ asset('storage/' . $qris->gambar) }}" 
                                     alt="QRIS" style="width:100%; height:100%; object-fit:contain;">
                            </div>
                            <div class="flex-grow-1">
                                <div style="font-size:0.75rem;color:#059669;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">Scan QRIS</div>
                                <div style="font-size:1rem;font-weight:800;color:#064e3b;letter-spacing:0.5px;">{{ $qris->nama ?: 'E-Wallet/M-Banking' }}</div>
                                <div style="font-size:0.78rem;color:#64748b;">a.n. {{ \App\Models\Setting::get('donasi_rekening_nama', 'Yayasan Pesantren Terpadu') }}</div>
                            </div>
                            <button class="copy-btn py-2 px-3" style="background:#0f172a;" onclick="window.open('{{ asset('storage/' . $qris->gambar) }}', '_blank')">
                                <i class="bi bi-arrows-fullscreen me-1"></i> Lihat
                            </button>
                        </div>
                    </div>
                    @empty
                    <div class="rekening-card mt-3">
                        <div class="d-flex align-items-center gap-3">
                            @php $qrisSetting = \App\Models\Setting::get('donasi_qris'); @endphp
                            <div class="bank-logo" style="width: 56px; height: 56px;">
                                <img src="{{ $qrisSetting ? asset('storage/' . $qrisSetting) : 'https://upload.wikimedia.org/wikipedia/commons/d/d0/QRIS_logo.svg' }}" 
                                     alt="QRIS" style="width:100%; height:100%; object-fit:contain;">
                            </div>
                            <div class="flex-grow-1">
                                <div style="font-size:0.75rem;color:#059669;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">Scan QRIS</div>
                                <div style="font-size:1rem;font-weight:800;color:#064e3b;letter-spacing:0.5px;">Gunakan Aplikasi E-Wallet/M-Banking</div>
                                <div style="font-size:0.78rem;color:#64748b;">a.n. {{ \App\Models\Setting::get('donasi_rekening_nama', 'Yayasan Pesantren Terpadu') }}</div>
                            </div>
                            <button class="copy-btn py-2 px-3" style="background:#0f172a;" onclick="alert('Silakan scan QRIS dengan aplikasi M-Banking atau E-Wallet Anda.')">
                                <i class="bi bi-qr-code-scan me-1"></i> Scan
                            </button>
                        </div>
                    </div>
                    @endforelse
                </div>

                {{-- DONATUR TERBARU --}}
                <div class="form-card" data-aos="fade-left" data-aos-delay="200">
                    <h5 style="font-weight:800;color:#0f172a;margin-bottom:1rem;font-size:1.05rem;">
                        <i class="bi bi-people-fill me-2 text-success"></i>Donatur Terbaru
                    </h5>

                    @forelse($donaturTerbaru as $d)
                        <div class="donatur-item">
                            <div class="donatur-avatar" style="background:linear-gradient(135deg,
                                {{ ['#10b981,#059669','#6366f1,#8b5cf6','#f59e0b,#d97706','#06b6d4,#0891b2','#ef4444,#dc2626'][$loop->index % 5] }});">
                                {{ strtoupper(substr($d->nama_donatur, 0, 1)) }}
                            </div>
                            <div class="flex-grow-1">
                                <div style="font-weight:700;color:#1e293b;font-size:0.9rem;">{{ $d->nama_donatur }}</div>
                                <div style="font-size:0.78rem;color:#94a3b8;">
                                    {{ $d->tanggal_donasi->diffForHumans() }} 
                                    @if($d->no_wa)
                                        | WA: {{ substr($d->no_wa, 0, 4) . '***' . substr($d->no_wa, -2) }}
                                    @endif
                                </div>
                            </div>
                            <div style="font-weight:800;color:#059669;font-size:0.9rem;">
                                @if($d->jenis_donasi == 'material')
                                    <span class="badge bg-success bg-opacity-25 text-success px-2 py-1">Donasi Material</span>
                                @else
                                    Rp {{ number_format($d->jumlah_donasi, 0, ',', '.') }}
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <div style="width:60px;height:60px;background:rgba(16,185,129,0.1);border-radius:50%;display:inline-flex;align-items:center;justify-content:center;margin-bottom:12px;">
                                <i class="bi bi-heart" style="font-size:1.5rem;color:#10b981;"></i>
                            </div>
                            <p style="color:#94a3b8;font-size:0.88rem;margin:0;">Jadilah donatur pertama!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== PROGRES PEMBANGUNAN ===================== --}}
@if($progres->count() > 0)
<section style="padding:60px 0;background:#fff;">
    <div class="container">
        <div class="text-center mb-5">
             <span class="section-chip-green">Laporan</span>
             <h2 style="font-size:clamp(1.8rem,4vw,2.4rem);font-weight:800;color:#0f172a;letter-spacing:-0.5px;">
                 Progres Pembangunan
             </h2>
             <p style="color:#64748b;font-size:1rem;max-width:520px;margin:12px auto 0;">
                 Perkembangan terbaru pembangunan dari dana yang telah Anda amanahkan.
             </p>
        </div>

        <div class="row g-4">
            @foreach($progres as $p)
            <div class="col-md-6 col-lg-4">
                <div class="form-card p-0 h-100 d-flex flex-column" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->judul }}" style="width:100%; height:200px; object-fit:cover; border-radius:20px 20px 0 0;">
                    <div class="p-4 flex-grow-1">
                        <h5 style="font-weight:800; color:#0f172a; margin-bottom:10px;">{{ $p->judul }}</h5>
                        <p style="font-size:0.9rem; color:#64748b; line-height:1.6; margin:0;">
                            {{ Str::limit(strip_tags($p->keterangan), 120) }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================== LEADERBOARD DONASI ===================== --}}
<section style="padding:60px 0;background:#f8fafb;border-top:1px solid #f1f5f9;">
    <div class="container">
        <div class="text-center mb-5">
             <span class="section-chip-green">Transparansi</span>
             <h2 style="font-size:clamp(1.8rem,4vw,2.4rem);font-weight:800;color:#0f172a;letter-spacing:-0.5px;">
                 Leaderboard Donasi
             </h2>
             <p style="color:#64748b;font-size:1rem;max-width:520px;margin:12px auto 0;">
                 Daftar hamba Allah yang telah menyisihkan sebagian hartanya untuk pembangunan pesantren.
             </p>
        </div>

        <div class="form-card mx-auto" style="max-width:900px; padding:1.5rem;" data-aos="fade-up">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="min-width: 600px;">
                    <thead style="background: rgba(16,185,129,0.05);">
                        <tr>
                            <th class="ps-3 py-3 rounded-start" style="font-size:0.85rem;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;border-bottom:none;">Rank</th>
                            <th class="py-3" style="font-size:0.85rem;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;border-bottom:none;">Nama Donatur</th>
                            <th class="py-3" style="font-size:0.85rem;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;border-bottom:none;">Jenis Donasi</th>
                            <th class="py-3" style="font-size:0.85rem;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;border-bottom:none;">Nomor WA</th>
                            <th class="pe-3 py-3 rounded-end text-end" style="font-size:0.85rem;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;border-bottom:none;">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leaderboardDonasi as $index => $donatur)
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td class="ps-3 py-3">
                                @if($index == 0)
                                    <span class="badge" style="background:#f59e0b;color:#fff;font-size:1rem;padding:0.4rem 0.6rem;"><i class="bi bi-trophy-fill"></i> 1</span>
                                @elseif($index == 1)
                                    <span class="badge" style="background:#94a3b8;color:#fff;font-size:0.9rem;padding:0.35rem 0.55rem;"><i class="bi bi-trophy-fill"></i> 2</span>
                                @elseif($index == 2)
                                    <span class="badge" style="background:#b45309;color:#fff;font-size:0.85rem;padding:0.3rem 0.5rem;"><i class="bi bi-trophy-fill"></i> 3</span>
                                @else
                                    <span style="font-weight:800;color:#94a3b8;margin-left:10px;">{{ $index + 1 }}</span>
                                @endif
                            </td>
                            <td class="py-3">
                                <div style="font-weight:700;color:#1e293b;font-size:0.95rem;">{{ $donatur->nama_donatur }}</div>
                                <div style="font-size:0.75rem;color:#94a3b8;">{{ $donatur->tanggal_donasi->format('d M Y') }}</div>
                            </td>
                            <td class="py-3">
                                @if($donatur->jenis_donasi == 'material')
                                    <span class="badge bg-success bg-opacity-25 text-success">Barang/Material</span>
                                @else
                                    <span class="badge bg-primary bg-opacity-25 text-primary">Uang/Nominal</span>
                                @endif
                            </td>
                            <td class="py-3">
                                <span style="font-family:monospace;font-size:0.9rem;color:#64748b;">
                                    @if($donatur->no_wa)
                                        {{ substr($donatur->no_wa, 0, 4) . '***' . substr($donatur->no_wa, -2) }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </td>
                            <td class="pe-3 py-3 text-end">
                                <div style="font-weight:800;color:#059669;font-size:0.95rem;">
                                    @if($donatur->jenis_donasi == 'material')
                                        -
                                    @else
                                        Rp {{ number_format($donatur->jumlah_donasi, 0, ',', '.') }}
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div style="color:#94a3b8;font-size:0.9rem;">Belum ada data donatur...</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- ===================== WHY DONATE ===================== --}}
<section style="padding:80px 0;background:#fff;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-chip-green">Mengapa Berdonasi?</span>
            <h2 style="font-size:clamp(1.8rem,4vw,2.4rem);font-weight:800;color:#0f172a;letter-spacing:-0.5px;">
                Setiap Donasi Anda Sangat Berharga
            </h2>
            <p style="color:#64748b;font-size:1rem;max-width:520px;margin:12px auto 0;">
                Dana yang terkumpul akan digunakan secara transparan untuk berbagai kebutuhan pesantren.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="why-card">
                    <div class="why-icon" style="background:rgba(16,185,129,0.1);color:#10b981;">
                        <i class="bi bi-building-fill"></i>
                    </div>
                    <h6 style="font-weight:800;color:#1e293b;">Pembangunan Masjid</h6>
                    <p class="small" style="color:#64748b;margin:0;line-height:1.6;">Membangun masjid baru sebagai pusat ibadah dan kegiatan santri.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="why-card">
                    <div class="why-icon" style="background:rgba(99,102,241,0.1);color:#6366f1;">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <h6 style="font-weight:800;color:#1e293b;">Beasiswa Santri</h6>
                    <p class="small" style="color:#64748b;margin:0;line-height:1.6;">Membiayai santri berprestasi dari keluarga kurang mampu.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="why-card">
                    <div class="why-icon" style="background:rgba(245,158,11,0.1);color:#f59e0b;">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <h6 style="font-weight:800;color:#1e293b;">Sarana Belajar</h6>
                    <p class="small" style="color:#64748b;margin:0;line-height:1.6;">Menyediakan buku, kitab, dan peralatan penunjang pembelajaran.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="why-card">
                    <div class="why-icon" style="background:rgba(239,68,68,0.1);color:#ef4444;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h6 style="font-weight:800;color:#1e293b;">Operasional Harian</h6>
                    <p class="small" style="color:#64748b;margin:0;line-height:1.6;">Membantu biaya operasional seperti makan, listrik, dan air bersih.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== QURAN VERSE ===================== --}}
<section style="padding:60px 0;background:linear-gradient(135deg,#064e3b 0%,#065f46 100%);">
    <div class="container">
        <div class="text-center" style="max-width:700px;margin:auto;">
            <i class="bi bi-quote" style="font-size:3rem;color:rgba(110,231,183,0.3);"></i>
            <p style="color:#d1fae5;font-size:1.15rem;font-style:italic;line-height:1.9;margin-top:8px;">
                "Perumpamaan orang yang menginfakkan hartanya di jalan Allah seperti sebutir biji yang menumbuhkan tujuh tangkai, pada setiap tangkai ada seratus biji. Allah melipatgandakan bagi siapa yang Dia kehendaki."
            </p>
            <p style="color:#6ee7b7;font-weight:700;font-size:0.9rem;margin-top:16px;">— QS. Al-Baqarah: 261</p>
        </div>
    </div>
</section>



@endsection

@section('scripts')
<script>
    // Quick nominal selection
    function setNominal(btn, nominal) {
        document.getElementById('jumlah_donasi').value = nominal;
        document.querySelectorAll('.nominal-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    }

    // Copy rekening number
    function copyRek(elementId) {
        const text = document.getElementById(elementId).innerText.replace(/\s/g, '');
        navigator.clipboard.writeText(text).then(() => {
            const btn = event.target.closest('.copy-btn');
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check-lg me-1"></i>Tersalin!';
            btn.style.background = '#059669';
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.style.background = '#10b981';
            }, 2000);
        });
    }

    // Auto-sync nominal buttons with input
    document.getElementById('jumlah_donasi').addEventListener('input', function() {
        const val = parseInt(this.value);
        document.querySelectorAll('.nominal-btn').forEach(b => {
            b.classList.toggle('active', parseInt(b.dataset.nominal) === val);
        });
    });

    // Toggle Nominal/Material
    function toggleNominal(jenis) {
        const quickSelect = document.getElementById('nominal_quick_select');
        const inputGroup = document.getElementById('nominal_input_group');
        const inputField = document.getElementById('jumlah_donasi');
        
        if (jenis === 'material') {
            quickSelect.style.display = 'none';
            inputGroup.style.display = 'none';
            inputField.removeAttribute('required');
        } else {
            quickSelect.style.display = 'block';
            inputGroup.style.display = 'block';
            inputField.setAttribute('required', 'required');
        }
    }
    
    // Init state on load
    window.addEventListener('DOMContentLoaded', () => {
        const val = document.getElementById('jenis_donasi').value;
        toggleNominal(val);
    });
</script>
@endsection
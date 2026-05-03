@extends('layouts.app')

@section('title', 'Pembayaran Donasi — PPMU')

@section('content')
<style>
    .pembayaran-hero {
        background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
        padding: calc(var(--nav-h) + 50px) 0 60px;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(16, 185, 129, 0.1);
    }
    .form-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        overflow: hidden;
        border: 1px solid #f1f5f9;
        margin-top: -40px;
        position: relative;
        z-index: 2;
    }
    .form-card-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 24px 30px;
        color: #fff;
    }
    .form-card-body {
        padding: 30px;
    }
    .rekening-box {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 16px;
        transition: all 0.3s;
        cursor: pointer;
    }
    .rekening-box:hover, .rekening-box.active {
        border-color: #10b981;
        background: rgba(16,185,129,0.05);
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
        font-size: 0.75rem;
        color: #064e3b;
        border: 1px solid #e2e8f0;
    }
    .btn-submit {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 14px 40px;
        font-weight: 700;
        font-size: 0.95rem;
        width: 100%;
        transition: all 0.3s;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(16,185,129,0.35);
        color: #fff;
    }
    .copy-btn {
        background: #10b981;
        border: none;
        color: #fff;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 700;
    }
</style>

<div class="pembayaran-hero">
    <div class="container text-center">
        <h1 class="display-6 fw-bold text-dark mb-3">Selesaikan Donasi Anda</h1>
        <p class="text-secondary mb-0">Silakan ikuti instruksi pembayaran di bawah ini.</p>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="form-card">
                <div class="form-card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-1 fw-bold">Ringkasan Donasi</h4>
                        <div class="small opacity-75">ID Donasi: #{{ str_pad($donatur->id, 5, '0', STR_PAD_LEFT) }}</div>
                    </div>
                    <div class="text-end">
                        <div class="small opacity-75">Nominal</div>
                        <h4 class="mb-0 fw-bold">
                            @if($donatur->jenis_donasi == 'material')
                                Donasi Material
                            @else
                                Rp {{ number_format($donatur->jumlah_donasi, 0, ',', '.') }}
                            @endif
                        </h4>
                    </div>
                </div>
                <div class="form-card-body">
                    
                    @if(session('success'))
                        <div class="alert alert-success mb-4 border-0" style="background:#d1fae5;color:#065f46;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h6 class="fw-bold mb-3">Pilih Tujuan Pembayaran</h6>
                    
                    <!-- BSI -->
                    <label class="rekening-box d-flex align-items-center gap-3 w-100">
                        <input type="radio" name="pilih_metode" value="Transfer BSI" class="form-check-input mt-0" style="width:20px;height:20px;" checked onchange="updateMetode('Transfer BSI')">
                        <div class="bank-logo">BSI</div>
                        <div class="flex-grow-1">
                            <div class="fw-bold text-dark" id="rek-bsi">{{ \App\Models\Setting::get('donasi_rekening_bsi', '7172 8399 01') }}</div>
                            <div class="small text-muted">Bank Syariah Indonesia a.n {{ \App\Models\Setting::get('donasi_rekening_nama', 'Yayasan Pesantren') }}</div>
                        </div>
                        <button type="button" class="copy-btn" onclick="copyRek('rek-bsi')">Salin</button>
                    </label>

                    <!-- BRI -->
                    <label class="rekening-box d-flex align-items-center gap-3 w-100">
                        <input type="radio" name="pilih_metode" value="Transfer BRI" class="form-check-input mt-0" style="width:20px;height:20px;" onchange="updateMetode('Transfer BRI')">
                        <div class="bank-logo">BRI</div>
                        <div class="flex-grow-1">
                            <div class="fw-bold text-dark" id="rek-bri">{{ \App\Models\Setting::get('donasi_rekening_bri', '0123 0456 7890') }}</div>
                            <div class="small text-muted">Bank Rakyat Indonesia a.n {{ \App\Models\Setting::get('donasi_rekening_nama', 'Yayasan Pesantren') }}</div>
                        </div>
                        <button type="button" class="copy-btn" onclick="copyRek('rek-bri')">Salin</button>
                    </label>

                    <!-- QRIS -->
                    @forelse($listQris as $qris)
                    <label class="rekening-box d-flex align-items-center gap-3 w-100">
                        <input type="radio" name="pilih_metode" value="QRIS - {{ $qris->nama }}" class="form-check-input mt-0" style="width:20px;height:20px;" onchange="updateMetode('QRIS - {{ $qris->nama }}')">
                        <div class="bank-logo" style="border:none; padding: 4px;">
                            <img src="{{ asset('storage/' . $qris->gambar) }}" alt="QRIS" style="width:100%;height:100%;object-fit:contain;">
                        </div>
                        <div class="flex-grow-1">
                            <div class="fw-bold text-dark">Scan QRIS ({{ $qris->nama ?: 'E-Wallet' }})</div>
                            <div class="small text-muted">Semua Bank & E-Wallet</div>
                        </div>
                        <button type="button" class="copy-btn py-1 px-2" style="background:#0f172a; color:#fff;" onclick="window.open('{{ asset('storage/' . $qris->gambar) }}', '_blank'); event.preventDefault();">Lihat</button>
                    </label>
                    @empty
                    <label class="rekening-box d-flex align-items-center gap-3 w-100">
                        <input type="radio" name="pilih_metode" value="QRIS" class="form-check-input mt-0" style="width:20px;height:20px;" onchange="updateMetode('QRIS')">
                        <div class="bank-logo" style="border:none;">
                            @php $qrisSetting = \App\Models\Setting::get('donasi_qris'); @endphp
                            <img src="{{ $qrisSetting ? asset('storage/' . $qrisSetting) : 'https://upload.wikimedia.org/wikipedia/commons/d/d0/QRIS_logo.svg' }}" alt="QRIS" style="width:100%;height:100%;object-fit:contain;">
                        </div>
                        <div class="flex-grow-1">
                            <div class="fw-bold text-dark">Scan QRIS</div>
                            <div class="small text-muted">Semua Bank & E-Wallet</div>
                        </div>
                    </label>
                    @endforelse

                    @if($donatur->jenis_donasi == 'material')
                    <!-- Drop Off -->
                    <label class="rekening-box d-flex align-items-center gap-3 w-100">
                        <input type="radio" name="pilih_metode" value="Material/Drop-off" class="form-check-input mt-0" style="width:20px;height:20px;" onchange="updateMetode('Material/Drop-off')">
                        <div class="bank-logo" style="background:#f1f5f9;"><i class="bi bi-box-seam fs-5"></i></div>
                        <div class="flex-grow-1">
                            <div class="fw-bold text-dark">Kirim Barang Langsung</div>
                            <div class="small text-muted">Antar/kirim ke alamat pesantren PPMU</div>
                        </div>
                    </label>
                    @endif

                    <hr class="my-4" style="border-color:#e2e8f0;">

                    <!-- Form Upload Bukti -->
                    <h6 class="fw-bold mb-3">Upload Bukti Transfer/Sumbangan</h6>
                    <form action="{{ route('pesantren.donasi.uploadBukti', $donatur->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="metode_pembayaran" id="metode_pembayaran" value="Transfer BSI">

                        <div class="mb-4">
                            <label class="form-label text-muted small fw-semibold">Pilih File Bukti (Foto/Screenshot) <span class="text-danger">*</span></label>
                            <input type="file" name="bukti_pembayaran" class="form-control @error('bukti_pembayaran') is-invalid @enderror" accept="image/*" required>
                            @error('bukti_pembayaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Maksimal ukuran file 4MB (Format: JPG, PNG, WEBP).</div>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="bi bi-upload me-2"></i>Kirim Bukti Pembayaran
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateMetode(metode) {
        document.getElementById('metode_pembayaran').value = metode;
        
        // Toggle active class on labels
        document.querySelectorAll('.rekening-box').forEach(box => {
            box.classList.remove('active');
        });
        const checkedRadio = document.querySelector('input[name="pilih_metode"]:checked');
        if(checkedRadio) {
            checkedRadio.closest('.rekening-box').classList.add('active');
        }
    }

    function copyRek(elementId) {
        var text = document.getElementById(elementId).innerText;
        var elem = document.createElement("textarea");
        document.body.appendChild(elem);
        elem.value = text;
        elem.select();
        document.execCommand("copy");
        document.body.removeChild(elem);
        alert("Nomor rekening berhasil disalin: " + text);
    }
</script>
@endsection

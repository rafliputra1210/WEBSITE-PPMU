@extends('layouts.admin')

@section('title_page', 'Pengaturan Investasi Akhirat')

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5 class="fw-bold mb-0">Atur Konten Halaman Donasi</h5>
                    <a href="{{ route('admin.donasi.index') }}" class="btn btn-outline-secondary btn-sm" style="border-radius:8px;">
                        <i class="bi bi-arrow-left me-1"></i> Data Donatur
                    </a>
                </div>

                @if(session('success'))
                <div class="alert alert-success rounded-3 mb-4 border-0 shadow-sm" style="font-size:0.85rem;">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('admin.donasi.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Target Donasi --}}
                    <div class="mb-4">
                        <label for="donasi_target" class="form-label fw-semibold">Target Donasi (Rp)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-2" style="border-radius: 12px 0 0 12px;">Rp</span>
                            <input type="number" id="donasi_target" name="donasi_target" 
                                   class="form-control border-2 @error('donasi_target') is-invalid @enderror" 
                                   style="border-radius: 0 12px 12px 0;"
                                   value="{{ old('donasi_target', $settings['donasi_target']) }}" required>
                        </div>
                        @error('donasi_target')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Masukkan angka tanpa titik/koma. Contoh: 500000000</div>
                    </div>

                    <hr class="my-4 opacity-50">

                    {{-- Informasi Rekening --}}
                    <h6 class="fw-bold mb-3"><i class="bi bi-bank me-2 text-primary"></i>Informasi Rekening & QRIS</h6>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="donasi_rekening_bsi" class="form-label fw-semibold">No. Rekening BSI</label>
                                <input type="text" id="donasi_rekening_bsi" name="donasi_rekening_bsi" 
                                       class="form-control @error('donasi_rekening_bsi') is-invalid @enderror" 
                                       style="border-radius:10px;"
                                       value="{{ old('donasi_rekening_bsi', $settings['donasi_rekening_bsi']) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="donasi_rekening_bri" class="form-label fw-semibold">No. Rekening BRI</label>
                                <input type="text" id="donasi_rekening_bri" name="donasi_rekening_bri" 
                                       class="form-control @error('donasi_rekening_bri') is-invalid @enderror" 
                                       style="border-radius:10px;"
                                       value="{{ old('donasi_rekening_bri', $settings['donasi_rekening_bri']) }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="donasi_rekening_nama" class="form-label fw-semibold">Atas Nama Rekening</label>
                                <input type="text" id="donasi_rekening_nama" name="donasi_rekening_nama" 
                                       class="form-control @error('donasi_rekening_nama') is-invalid @enderror" 
                                       style="border-radius:10px;"
                                       value="{{ old('donasi_rekening_nama', $settings['donasi_rekening_nama']) }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Gambar QRIS (Opsional)</label>
                        @if($settings['donasi_qris'])
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $settings['donasi_qris']) }}" alt="QRIS" 
                                     style="height:100px; border-radius:8px; border:1px solid #e2e8f0;">
                            </div>
                        @endif
                        <input type="file" name="donasi_qris" class="form-control @error('donasi_qris') is-invalid @enderror" style="border-radius:10px;">
                        @error('donasi_qris')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4 opacity-50">

                    {{-- Hero Poster --}}
                    <h6 class="fw-bold mb-3"><i class="bi bi-image me-2 text-primary"></i>Visual Halaman</h6>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Poster Utama (Hero Banner)</label>
                        @if($settings['donasi_hero_poster'])
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $settings['donasi_hero_poster']) }}" alt="Hero Poster" 
                                     class="img-fluid rounded-3 border shadow-sm" style="max-height:200px;">
                            </div>
                        @endif
                        <input type="file" name="donasi_hero_poster" class="form-control @error('donasi_hero_poster') is-invalid @enderror" style="border-radius:10px;">
                        @error('donasi_hero_poster')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Gambar ini akan tampil di paling atas halaman Investasi Akhirat.</div>
                    </div>

                    <div class="d-grid pt-2">
                        <button type="submit" class="btn btn-primary py-3 fw-bold" style="border-radius:12px;">
                            <i class="bi bi-check-lg me-2"></i>Simpan Semua Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4" style="border-radius:16px; background:linear-gradient(135deg, #10b981 0%, #059669 100%); color:#fff;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3"><i class="bi bi-info-circle me-2"></i>Tentang Pengaturan</h6>
                <p class="small opacity-75 mb-0">
                    Halaman ini digunakan untuk mengatur informasi publik pada halaman <strong>Investasi Akhirat</strong>. 
                    Target donasi akan mempengaruhi persentase progres yang tampil secara otomatis berdasarkan donasi yang berstatus "Berhasil".
                </p>
            </div>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3">Lihat Hasil</h6>
                <p class="small text-muted mb-4">Klik tombol di bawah untuk melihat perubahan pada halaman publik.</p>
                <a href="{{ route('pesantren.donasi') }}" target="_blank" class="btn btn-outline-primary w-100 py-2" style="border-radius:10px;">
                    <i class="bi bi-eye me-2"></i>Lihat Halaman Publik
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

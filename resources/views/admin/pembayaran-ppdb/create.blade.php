@extends('layouts.admin')

@section('title', 'Tambah Rekening PPDB')

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.pembayaran-ppdb.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div>
        <h4 class="fw-bold mb-0">Tambah Rekening PPDB</h4>
        <p class="text-muted mb-0 small">Isi data rekening bank untuk pembayaran pendaftaran</p>
    </div>
</div>

<div class="card shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.pembayaran-ppdb.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Untuk Lembaga <span class="text-danger">*</span></label>
                <select name="entitas" class="form-select @error('entitas') is-invalid @enderror" required>
                    <option value="">-- Pilih Lembaga --</option>
                    <option value="pesantren" {{ old('entitas') == 'pesantren' ? 'selected' : '' }}>🕌 Pesantren</option>
                    <option value="madrasah" {{ old('entitas') == 'madrasah' ? 'selected' : '' }}>🏫 Madrasah</option>
                </select>
                @error('entitas')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Bank <span class="text-danger">*</span></label>
                <input type="text" name="nama_bank" class="form-control @error('nama_bank') is-invalid @enderror"
                       placeholder="Contoh: BSI, BRI, BNI, Mandiri" value="{{ old('nama_bank') }}" required>
                @error('nama_bank')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nomor Rekening <span class="text-danger">*</span></label>
                <input type="text" name="no_rekening" class="form-control @error('no_rekening') is-invalid @enderror"
                       placeholder="Contoh: 7172 8399 01" value="{{ old('no_rekening') }}" required>
                @error('no_rekening')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Atas Nama <span class="text-danger">*</span></label>
                <input type="text" name="atas_nama" class="form-control @error('atas_nama') is-invalid @enderror"
                       placeholder="Nama pemilik rekening" value="{{ old('atas_nama') }}" required>
                @error('atas_nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Keterangan Pembayaran</label>
                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3"
                          placeholder="Contoh: Biaya pendaftaran Rp 150.000 — Transfer ke rekening ini lalu kirim bukti ke admin.">{{ old('keterangan') }}</textarea>
                <div class="form-text">Keterangan ini akan tampil di halaman pendaftaran untuk memandu calon santri.</div>
                @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-save me-1"></i> Simpan Rekening
                </button>
                <a href="{{ route('admin.pembayaran-ppdb.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

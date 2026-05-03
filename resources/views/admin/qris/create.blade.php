@extends('layouts.admin')
@section('title_page', 'Tambah QRIS')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.qris.index') }}" class="btn btn-light rounded-circle p-2 me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h5 class="fw-bold mb-0">Upload QRIS Baru</h5>
                </div>

                <form action="{{ route('admin.qris.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama / Keterangan (Opsional)</label>
                        <input type="text" name="nama" class="form-control rounded-3 @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Contoh: QRIS BSI, Gopay, Dana, dll">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Gambar QRIS <span class="text-danger">*</span></label>
                        <input type="file" name="gambar" class="form-control rounded-3 @error('gambar') is-invalid @enderror" required accept="image/*">
                        <div class="form-text">Format: JPG, PNG, WEBP. Maks: 4MB.</div>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-3 py-2 fw-semibold">
                        <i class="bi bi-cloud-arrow-up me-2"></i>Simpan QRIS
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

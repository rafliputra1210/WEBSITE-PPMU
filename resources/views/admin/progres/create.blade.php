@extends('layouts.admin')

@section('title_page', 'Tambah Hasil Progres')

@section('content')

<div class="mb-4 d-flex align-items-center">
    <a href="{{ route('admin.progres.index') }}" class="btn btn-outline-secondary me-3" style="border-radius:10px;">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <h4 class="fw-bold mb-0">Tambah Data Progres Baru</h4>
</div>

<div class="card border-0 shadow-sm" style="border-radius:14px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.progres.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-4">
                <div class="col-md-8">
                    <label class="form-label fw-bold">Judul Progres</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul') }}" required placeholder="Contoh: Pembangunan Kelas Baru Tahap 1">
                    @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-8">
                    <label class="form-label fw-bold">Foto Progres</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" 
                           accept="image/*" required>
                    <small class="text-muted mt-1 d-block">Format: JPG, PNG maksimal 2MB</small>
                    @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12">
                    <label class="form-label fw-bold">Keterangan / Deskripsi</label>
                    <textarea name="keterangan" rows="5" class="form-control @error('keterangan') is-invalid @enderror" 
                              placeholder="Tuliskan detail atau deskripsi mengenai progres ini...">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="mb-4">
            <div class="d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-light" style="border-radius:8px;">Reset</button>
                <button type="submit" class="btn btn-primary px-4" style="border-radius:8px;">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

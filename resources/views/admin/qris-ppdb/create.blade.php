@extends('layouts.admin')

@section('title', 'Unggah QRIS PPDB')

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.qris-ppdb.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div>
        <h4 class="fw-bold mb-0">Unggah QRIS PPDB</h4>
        <p class="text-muted mb-0 small">Upload gambar kode QRIS untuk pembayaran pendaftaran</p>
    </div>
</div>

<div class="card shadow-sm" style="max-width:500px;">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.qris-ppdb.store') }}" enctype="multipart/form-data">
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
                <label class="form-label fw-semibold">Label / Nama QRIS</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                       placeholder="Contoh: QRIS BSI, GoPay, dll." value="{{ old('nama') }}">
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">File Gambar QRIS <span class="text-danger">*</span></label>
                <input type="file" name="gambar" id="gambarInput"
                       class="form-control @error('gambar') is-invalid @enderror"
                       accept="image/jpeg,image/png,image/jpg,image/webp" required
                       onchange="previewImage(this)">
                <div class="form-text">Format: JPG, PNG, WEBP. Maks 4MB.</div>
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <img id="preview" src="#" alt="Preview" class="mt-3 rounded border d-none"
                     style="max-width:200px; max-height:200px; object-fit:contain;">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-upload me-1"></i> Simpan QRIS
                </button>
                <a href="{{ route('admin.qris-ppdb.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.classList.remove('d-none'); };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection

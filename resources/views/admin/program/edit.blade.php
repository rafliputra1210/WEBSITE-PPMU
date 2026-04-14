@extends('layouts.admin')

@section('title_page', 'Edit Program Unggulan')

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.program.index') }}" class="btn btn-outline-secondary btn-sm" style="border-radius:8px;">
        <i class="bi bi-arrow-left"></i>
    </a>
    <h4 class="fw-bold mb-0">Edit Program</h4>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <form action="{{ route('admin.program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Nama Program <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $program->nama) }}" required>
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="Pesantren" {{ old('kategori', $program->kategori) == 'Pesantren' ? 'selected' : '' }}>Pesantren</option>
                            <option value="Madrasah" {{ old('kategori', $program->kategori) == 'Madrasah' ? 'selected' : '' }}>Madrasah</option>
                        </select>
                        @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $program->deskripsi) }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Badge Teks</label>
                            <input type="text" name="badge_teks" class="form-control" value="{{ old('badge_teks', $program->badge_teks) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Badge Warna (CSS Class)</label>
                            <input type="text" name="badge_warna" class="form-control" value="{{ old('badge_warna', $program->badge_warna) }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Link Pendaftaran</label>
                        <input type="text" name="link_daftar" class="form-control" value="{{ old('link_daftar', $program->link_daftar) }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Gambar Program</label>
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $program->gambar) }}" style="width:200px; height:120px; border-radius:12px; object-fit:cover; border:1px solid #ddd;">
                            <p class="text-muted small mt-1">Gambar saat ini</p>
                        </div>
                        <div class="upload-area" id="uploadArea" style="border:2px dashed #cbd5e1; border-radius:12px; padding:30px; text-align:center; cursor:pointer; background:#f8fafc;">
                            <i class="bi bi-cloud-upload fs-1 text-muted d-block mb-2"></i>
                            <span class="text-muted small">Klik atau drag untuk ganti gambar</span>
                            <input type="file" name="gambar" id="gambarInput" style="display:none;" accept="image/*" onchange="previewImage(this)">
                        </div>
                        <div id="imagePreview" class="mt-3" style="display:none;">
                            <img id="previewImg" src="" style="max-width:100%; height:200px; border-radius:12px; object-fit:cover;">
                        </div>
                        @error('gambar') <div class="text-danger mt-1 small">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-5 py-2 fw-bold" style="border-radius:12px;">Simpan Perubahan</button>
                        <a href="{{ route('admin.program.index') }}" class="btn btn-outline-secondary px-4 py-2" style="border-radius:12px;">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('uploadArea').onclick = () => document.getElementById('gambarInput').click();

    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection

@extends('layouts.admin')

@section('title_page', 'Upload Foto Galeri')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light btn-sm rounded-pill me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h5 class="fw-bold mb-0">Upload Foto ke Galeri</h5>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" id="formGaleri">
                    @csrf

                    {{-- Preview Gambar --}}
                    <div class="mb-4 text-center">
                        <div id="previewContainer" class="rounded-4 overflow-hidden d-inline-block" style="width:100%; max-width:500px; height:280px; background:#f1f5f9; border: 2px dashed #cbd5e1; cursor:pointer; display:flex; align-items:center; justify-content:center;" onclick="document.getElementById('gambarInput').click()">
                            <img id="previewImg" src="" alt="" class="w-100 h-100" style="object-fit:cover; display:none;">
                            <div id="previewPlaceholder" class="text-center text-muted p-4">
                                <i class="bi bi-cloud-upload fs-1 d-block mb-2 text-primary"></i>
                                <strong>Klik untuk pilih foto</strong>
                                <p class="small mt-1">JPG, PNG, GIF, WEBP — Maks. 4MB</p>
                            </div>
                        </div>
                        <input type="file" name="gambar" id="gambarInput" class="d-none" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul / Keterangan Foto <span class="text-muted fw-normal">(Opsional)</span></label>
                        <input type="text" name="judul_gambar" class="form-control" value="{{ old('judul_gambar') }}"
                               placeholder="Contoh: Santri meraih juara MTQ 2025...">
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Entitas <span class="text-danger">*</span></label>
                            <select name="entitas" class="form-select" required>
                                <option value="">-- Pilih Entitas --</option>
                                <option value="pesantren" {{ old('entitas') == 'pesantren' ? 'selected' : '' }}>Pesantren</option>
                                <option value="madrasah" {{ old('entitas') == 'madrasah' ? 'selected' : '' }}>Madrasah</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="potret" {{ old('kategori') == 'potret' ? 'selected' : '' }}>🖼️ Potret (Foto Kegiatan)</option>
                                <option value="prestasi" {{ old('kategori') == 'prestasi' ? 'selected' : '' }}>🏆 Prestasi</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-upload me-2"></i>Upload ke Galeri
                        </button>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-light rounded-pill px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('gambarInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev) {
        document.getElementById('previewImg').src = ev.target.result;
        document.getElementById('previewImg').style.display = 'block';
        document.getElementById('previewPlaceholder').style.display = 'none';
    };
    reader.readAsDataURL(file);
});
</script>
@endsection

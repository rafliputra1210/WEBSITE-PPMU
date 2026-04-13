@extends('layouts.admin')

@section('title_page', 'Edit Foto Galeri')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light btn-sm rounded-pill me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h5 class="fw-bold mb-0">Edit Foto Galeri</h5>
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

                <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Preview Gambar --}}
                    <div class="mb-4 text-center">
                        <div class="rounded-4 overflow-hidden d-inline-block" style="width:100%; max-width:500px; height:280px; cursor:pointer;" onclick="document.getElementById('gambarInput').click()">
                            <img id="previewImg" src="{{ asset('storage/' . $galeri->file_path) }}" alt="{{ $galeri->judul_gambar }}"
                                 class="w-100 h-100" style="object-fit:cover;">
                        </div>
                        <input type="file" name="gambar" id="gambarInput" class="d-none" accept="image/*">
                        <p class="text-muted small mt-2"><i class="bi bi-info-circle"></i> Klik gambar untuk menggantinya. Biarkan kosong jika tidak ingin mengubah foto.</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul / Keterangan Foto <span class="text-muted fw-normal">(Opsional)</span></label>
                        <input type="text" name="judul_gambar" class="form-control" value="{{ old('judul_gambar', $galeri->judul_gambar) }}"
                               placeholder="Contoh: Santri meraih juara MTQ 2025...">
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Entitas <span class="text-danger">*</span></label>
                            <select name="entitas" class="form-select" required>
                                <option value="pesantren" {{ old('entitas', $galeri->entitas) == 'pesantren' ? 'selected' : '' }}>Pesantren</option>
                                <option value="madrasah" {{ old('entitas', $galeri->entitas) == 'madrasah' ? 'selected' : '' }}>Madrasah</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-select" required>
                                <option value="potret" {{ old('kategori', $galeri->kategori) == 'potret' ? 'selected' : '' }}>🖼️ Potret (Foto Kegiatan)</option>
                                <option value="prestasi" {{ old('kategori', $galeri->kategori) == 'prestasi' ? 'selected' : '' }}>🏆 Prestasi</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
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
    };
    reader.readAsDataURL(file);
});
</script>
@endsection

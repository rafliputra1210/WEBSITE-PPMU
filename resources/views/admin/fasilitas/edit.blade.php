@extends('layouts.admin')

@section('title_page', 'Edit Fasilitas')

@section('content')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-secondary btn-sm" style="border-radius:8px;">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div>
        <h4 class="fw-bold mb-0">Edit Fasilitas</h4>
        <p class="text-muted mb-0" style="font-size:0.82rem;">Perbarui data fasilitas: <strong>{{ $fasilitas->nama_fasilitas }}</strong></p>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">

                @if($errors->any())
                <div class="alert alert-danger rounded-3 mb-4" style="font-size:0.85rem;">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Terdapat kesalahan:</strong>
                    <ul class="mb-0 mt-1 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Entitas --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Entitas / Milik <span class="text-danger">*</span></label>
                        <div class="row g-3">
                            <div class="col-6">
                                <input type="radio" class="btn-check" name="entitas" id="ent_pesantren"
                                       value="pesantren"
                                       {{ (old('entitas', $fasilitas->entitas) == 'pesantren') ? 'checked' : '' }} required>
                                <label class="btn btn-outline-primary w-100 py-3" for="ent_pesantren" style="border-radius:12px;">
                                    <span style="font-size:1.5rem;display:block;">🕌</span>
                                    <strong>Pesantren</strong>
                                </label>
                            </div>
                            <div class="col-6">
                                <input type="radio" class="btn-check" name="entitas" id="ent_madrasah"
                                       value="madrasah"
                                       {{ (old('entitas', $fasilitas->entitas) == 'madrasah') ? 'checked' : '' }}>
                                <label class="btn btn-outline-info w-100 py-3" for="ent_madrasah" style="border-radius:12px;">
                                    <span style="font-size:1.5rem;display:block;">🏫</span>
                                    <strong>Madrasah</strong>
                                </label>
                            </div>
                        </div>
                        @error('entitas')
                            <div class="text-danger mt-1" style="font-size:0.8rem;"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nama Fasilitas --}}
                    <div class="mb-4">
                        <label for="nama_fasilitas" class="form-label fw-semibold">
                            Nama Fasilitas <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="nama_fasilitas" name="nama_fasilitas"
                               class="form-control @error('nama_fasilitas') is-invalid @enderror"
                               placeholder="Contoh: Masjid, Laboratorium Komputer..."
                               value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}">
                        @error('nama_fasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  placeholder="Jelaskan fasilitas ini secara singkat...">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Foto Fasilitas</label>

                        {{-- Gambar saat ini --}}
                        @if($fasilitas->gambar)
                        <div class="mb-3 p-3 rounded-3" style="background:#f8fafc;border:1px solid #e2e8f0;">
                            <div class="text-muted mb-2" style="font-size:0.78rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">
                                <i class="bi bi-image me-1"></i>Foto Saat Ini
                            </div>
                            <img src="{{ asset('storage/' . $fasilitas->gambar) }}"
                                 alt="{{ $fasilitas->nama_fasilitas }}"
                                 style="max-height:160px;border-radius:10px;object-fit:cover;border:2px solid #e2e8f0;">
                            <div class="mt-2" style="font-size:0.78rem;color:#64748b;">
                                <i class="bi bi-info-circle me-1"></i>Upload gambar baru untuk mengganti foto ini
                            </div>
                        </div>
                        @endif

                        {{-- Upload baru --}}
                        <div class="upload-area" id="uploadArea"
                             style="border:2px dashed #cbd5e1;border-radius:12px;padding:24px;text-align:center;cursor:pointer;transition:all 0.2s;background:#f8fafc;">
                            <i class="bi bi-cloud-upload" style="font-size:1.8rem;color:#94a3b8;display:block;margin-bottom:6px;"></i>
                            <div class="fw-semibold text-muted" style="font-size:0.85rem;">
                                {{ $fasilitas->gambar ? 'Klik untuk ganti foto' : 'Klik atau drag & drop gambar' }}
                            </div>
                            <div class="text-muted" style="font-size:0.75rem;">JPG, PNG, WEBP — Maks. 3MB</div>
                            <input type="file" id="gambar" name="gambar" accept="image/*"
                                   class="@error('gambar') is-invalid @enderror"
                                   style="display:none;" onchange="previewImage(this)">
                        </div>
                        <div id="imagePreview" style="display:none;margin-top:12px;">
                            <img id="previewImg" src="" alt="Preview"
                                 style="max-height:180px;border-radius:10px;object-fit:cover;border:2px solid #e2e8f0;">
                            <button type="button" onclick="clearImage()" class="btn btn-sm btn-outline-danger ms-2" style="border-radius:8px;">
                                <i class="bi bi-x-lg"></i> Batal
                            </button>
                        </div>
                        @error('gambar')
                            <div class="text-danger mt-1" style="font-size:0.8rem;"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4" style="border-radius:10px;">
                            <i class="bi bi-floppy me-1"></i>Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-secondary px-4" style="border-radius:10px;">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Info Card -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-3" style="border-radius:16px;">
            <div class="card-body p-4">
                <div class="fw-bold mb-3" style="font-size:0.85rem;color:#1e293b;">
                    <i class="bi bi-info-circle-fill me-2 text-primary"></i>Info Fasilitas
                </div>
                <div class="d-flex justify-content-between mb-2" style="font-size:0.82rem;">
                    <span class="text-muted">ID</span>
                    <span class="fw-semibold">#{{ $fasilitas->id }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2" style="font-size:0.82rem;">
                    <span class="text-muted">Dibuat</span>
                    <span class="fw-semibold">{{ $fasilitas->created_at->format('d M Y') }}</span>
                </div>
                <div class="d-flex justify-content-between" style="font-size:0.82rem;">
                    <span class="text-muted">Diperbarui</span>
                    <span class="fw-semibold">{{ $fasilitas->updated_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        {{-- Hapus --}}
        <div class="card border-0 shadow-sm" style="border-radius:16px;border:1px solid #fecaca !important;">
            <div class="card-body p-4">
                <div class="fw-bold mb-2" style="font-size:0.85rem;color:#dc2626;">
                    <i class="bi bi-trash3-fill me-2"></i>Hapus Fasilitas
                </div>
                <p class="text-muted mb-3" style="font-size:0.8rem;">Tindakan ini tidak dapat dibatalkan. Foto fasilitas juga akan dihapus.</p>
                <form action="{{ route('admin.fasilitas.destroy', $fasilitas->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus fasilitas \'{{ $fasilitas->nama_fasilitas }}\'? Tindakan ini tidak dapat dibatalkan.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm w-100" style="border-radius:8px;">
                        <i class="bi bi-trash3 me-1"></i>Hapus Fasilitas Ini
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('uploadArea').addEventListener('click', function() {
        document.getElementById('gambar').click();
    });
    document.getElementById('uploadArea').addEventListener('dragover', function(e) {
        e.preventDefault();
        this.style.borderColor = '#6366f1';
        this.style.background = '#eef2ff';
    });
    document.getElementById('uploadArea').addEventListener('dragleave', function() {
        this.style.borderColor = '#cbd5e1';
        this.style.background = '#f8fafc';
    });
    document.getElementById('uploadArea').addEventListener('drop', function(e) {
        e.preventDefault();
        this.style.borderColor = '#cbd5e1';
        this.style.background = '#f8fafc';
        const file = e.dataTransfer.files[0];
        if (file) {
            const input = document.getElementById('gambar');
            const dt = new DataTransfer();
            dt.items.add(file);
            input.files = dt.files;
            previewImage(input);
        }
    });

    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
                document.getElementById('uploadArea').style.display = 'none';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function clearImage() {
        document.getElementById('gambar').value = '';
        document.getElementById('imagePreview').style.display = 'none';
        document.getElementById('uploadArea').style.display = 'block';
    }
</script>
@endpush

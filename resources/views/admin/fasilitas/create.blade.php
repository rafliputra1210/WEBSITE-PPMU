@extends('layouts.admin')

@section('title_page', 'Tambah Fasilitas')

@section('content')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-secondary btn-sm" style="border-radius:8px;">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div>
        <h4 class="fw-bold mb-0">Tambah Fasilitas Baru</h4>
        <p class="text-muted mb-0" style="font-size:0.82rem;">Isi data fasilitas pesantren atau madrasah</p>
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

                <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Entitas --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Entitas / Milik <span class="text-danger">*</span></label>
                        <div class="row g-3">
                            <div class="col-6">
                                <input type="radio" class="btn-check" name="entitas" id="ent_pesantren"
                                       value="pesantren" {{ old('entitas') == 'pesantren' ? 'checked' : '' }} required>
                                <label class="btn btn-outline-primary w-100 py-3" for="ent_pesantren" style="border-radius:12px;">
                                    <span style="font-size:1.5rem;display:block;">🕌</span>
                                    <strong>Pesantren</strong>
                                </label>
                            </div>
                            <div class="col-6">
                                <input type="radio" class="btn-check" name="entitas" id="ent_madrasah"
                                       value="madrasah" {{ old('entitas') == 'madrasah' ? 'checked' : '' }}>
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
                               placeholder="Contoh: Masjid, Laboratorium Komputer, Lapangan Olahraga..."
                               value="{{ old('nama_fasilitas') }}">
                        @error('nama_fasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  placeholder="Jelaskan fasilitas ini secara singkat...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Upload Gambar --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Foto Fasilitas</label>
                        <div class="upload-area" id="uploadArea"
                             style="border:2px dashed #cbd5e1;border-radius:12px;padding:30px;text-align:center;cursor:pointer;transition:all 0.2s;background:#f8fafc;">
                            <i class="bi bi-cloud-upload" style="font-size:2rem;color:#94a3b8;display:block;margin-bottom:8px;"></i>
                            <div class="fw-semibold text-muted" style="font-size:0.88rem;">Klik atau drag & drop gambar</div>
                            <div class="text-muted" style="font-size:0.78rem;">JPG, PNG, WEBP — Maks. 3MB</div>
                            <input type="file" id="gambar" name="gambar" accept="image/*"
                                   class="@error('gambar') is-invalid @enderror"
                                   style="display:none;" onchange="previewImage(this)">
                        </div>
                        <div id="imagePreview" style="display:none;margin-top:12px;">
                            <img id="previewImg" src="" alt="Preview"
                                 style="max-height:200px;border-radius:10px;object-fit:cover;border:2px solid #e2e8f0;">
                            <button type="button" onclick="clearImage()" class="btn btn-sm btn-outline-danger ms-2" style="border-radius:8px;">
                                <i class="bi bi-x-lg"></i> Hapus
                            </button>
                        </div>
                        @error('gambar')
                            <div class="text-danger mt-1" style="font-size:0.8rem;"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4" style="border-radius:10px;">
                            <i class="bi bi-floppy me-1"></i>Simpan Fasilitas
                        </button>
                        <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-secondary px-4" style="border-radius:10px;">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Tips -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm" style="border-radius:16px;background:linear-gradient(135deg,#f8faff,#eef2ff);">
            <div class="card-body p-4">
                <div class="fw-bold mb-3" style="color:#4f46e5;font-size:0.88rem;">
                    <i class="bi bi-lightbulb-fill me-2"></i>Tips Pengisian
                </div>
                <ul class="list-unstyled mb-0" style="font-size:0.82rem;color:#475569;">
                    <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Pilih entitas sesuai kepemilikan fasilitas</li>
                    <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Nama fasilitas harus jelas dan singkat</li>
                    <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Deskripsi membantu pengunjung memahami fasilitas</li>
                    <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Upload foto berkualitas baik (landscape lebih bagus)</li>
                    <li><i class="bi bi-check2-circle text-success me-2"></i>Ukuran gGambar min. 800x600 pixel untuk kualitas optimal</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Click upload area to trigger file input
    document.getElementById('uploadArea').addEventListener('click', function() {
        document.getElementById('gambar').click();
    });

    // Drag over styling
    document.getElementById('uploadArea').addEventListener('dragover', function(e) {
        e.preventDefault();
        this.style.borderColor = '#6366f1';
        this.style.background = '#eef2ff';
    });
    document.getElementById('uploadArea').addEventListener('dragleave', function(e) {
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

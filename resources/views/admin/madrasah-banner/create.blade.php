@extends('layouts.admin')
@section('title_page', 'Tambah Banner Madrasah')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form action="{{ route('admin.madrasah-banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger rounded-3 mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Banner (Opsional)</label>
                        <input type="text" name="title" class="form-control rounded-3" value="{{ old('title') }}" placeholder="Contoh: Selamat Datang di Madrasah">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sub Judul / Deskripsi (Opsional)</label>
                        <textarea name="subtitle" class="form-control rounded-3" rows="3" placeholder="Teks kecil di bawah judul">{{ old('subtitle') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Teks Tombol (Opsional)</label>
                                <input type="text" name="button_text" class="form-control rounded-3" value="{{ old('button_text') }}" placeholder="Contoh: Daftar Sekarang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Link Tombol (Opsional)</label>
                                <input type="text" name="button_link" class="form-control rounded-3" value="{{ old('button_link') }}" placeholder="/madrasah/pendaftaran">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Banner (Wajib)</label>
                        <input type="file" name="image" class="form-control rounded-3 @error('image') is-invalid @enderror" required accept="image/*" id="imageInput">
                        <div class="form-text">Format: JPG, PNG, WEBP. Rekomendasi rasio landscape (16:9).</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mt-2" id="imagePreviewWrapper" style="display:none;">
                            <img id="imagePreview" src="" class="img-fluid rounded" style="max-height: 150px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Urutan (Order)</label>
                        <input type="number" name="order" class="form-control rounded-3" value="{{ old('order', 0) }}">
                    </div>

                    <div class="mb-4 form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="isActive" value="1" checked>
                        <label class="form-check-label fw-semibold" for="isActive">Aktif / Tayangkan</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded-3 fw-semibold py-2">Simpan Banner</button>
                        <a href="{{ route('admin.madrasah-banner.index') }}" class="btn btn-light rounded-3 fw-semibold py-2">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                document.getElementById('imagePreview').src = evt.target.result;
                document.getElementById('imagePreviewWrapper').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection

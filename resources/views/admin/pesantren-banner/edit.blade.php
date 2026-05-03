@extends('layouts.admin')
@section('title_page', 'Edit Banner Pesantren')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form action="{{ route('admin.pesantren-banner.update', $pesantrenBanner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
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
                        <input type="text" name="title" class="form-control rounded-3" value="{{ old('title', $pesantrenBanner->title) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sub Judul / Deskripsi (Opsional)</label>
                        <textarea name="subtitle" class="form-control rounded-3" rows="3">{{ old('subtitle', $pesantrenBanner->subtitle) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Teks Tombol (Opsional)</label>
                                <input type="text" name="button_text" class="form-control rounded-3" value="{{ old('button_text', $pesantrenBanner->button_text) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Link Tombol (Opsional)</label>
                                <input type="text" name="button_link" class="form-control rounded-3" value="{{ old('button_link', $pesantrenBanner->button_link) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Banner</label>
                        @if($pesantrenBanner->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $pesantrenBanner->image) }}" class="rounded img-fluid" style="max-height: 150px;">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control rounded-3 @error('image') is-invalid @enderror" accept="image/*">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Urutan (Order)</label>
                        <input type="number" name="order" class="form-control rounded-3" value="{{ old('order', $pesantrenBanner->order) }}">
                    </div>

                    <div class="mb-4 form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="isActive" value="1" {{ $pesantrenBanner->is_active ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="isActive">Aktif / Tayangkan</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded-3 fw-semibold py-2">Update Banner</button>
                        <a href="{{ route('admin.pesantren-banner.index') }}" class="btn btn-light rounded-3 fw-semibold py-2">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title_page', 'Tambah Berita')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        
        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row g-4 mb-4">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Berita *</label>
                        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required placeholder="Masukkan judul...">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">RingkasanSingkat (Opsional)</label>
                        <textarea name="ringkasan" class="form-control" rows="2" placeholder="Ringkasan singkat untuk SEO atau highlight...">{{ old('ringkasan') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi Konten Berita *</label>
                        <textarea name="konten" id="konten" class="form-control" rows="10" required placeholder="Tulis isi berita di sini...">{{ old('konten') }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border border-light shadow-sm mb-3">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Publishing</h6>
                            
                            <div class="form-check form-switch mb-3 mt-2">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">Langsung Publish?</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 rounded-pill">Simpan Berita</button>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-light w-100 rounded-pill mt-2">Batal</a>
                        </div>
                    </div>

                    <div class="card border border-light shadow-sm mb-3">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Detail Lainnya</h6>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted small">Kategori</label>
                                <input type="text" name="kategori" class="form-control form-control-sm" value="{{ old('kategori') }}" placeholder="Contoh: Pendidikan, Event">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted small">Penulis</label>
                                <input type="text" name="penulis" class="form-control form-control-sm" value="{{ old('penulis') ?? 'Admin Sistem' }}">
                            </div>
                        </div>
                    </div>

                    <div class="card border border-light shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Gambar Utama (Thumbnail)</h6>
                            <input type="file" name="gambar" class="form-control form-control-sm accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection

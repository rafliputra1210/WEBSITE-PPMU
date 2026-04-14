@extends('layouts.admin')

@section('title_page', 'Pengaturan Profil')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold mb-0">Profil Sekolah & Pesantren</h4>
    <p class="text-muted" style="font-size:0.85rem;">Kelola sejarah, visi, dan misi untuk Pesantren dan Madrasah.</p>
</div>

@if(session('success'))
<div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius:12px;">
    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
</div>
@endif

<div class="row g-4">
    {{-- PESANTREN --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm" style="border-radius:20px;">
            <div class="card-header bg-white py-3 border-0" style="border-radius:20px 20px 0 0;">
                <div class="d-flex align-items-center gap-2">
                    <div style="width:10px; height:24px; background:#4f46e5; border-radius:4px;"></div>
                    <h5 class="fw-bold mb-0">Portal Pesantren</h5>
                </div>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.profile.update', $pesantren->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Sejarah Pesantren</label>
                        <textarea name="sejarah" class="form-control" rows="5" placeholder="Tuliskan sejarah berdirinya pesantren...">{{ old('sejarah', $pesantren->sejarah) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Visi</label>
                        <textarea name="visi" class="form-control" rows="2" placeholder="Visi pesantren...">{{ old('visi', $pesantren->visi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Misi</label>
                        <textarea name="misi" class="form-control" rows="4" placeholder="Misi pesantren (gunakan baris baru untuk setiap poin)...">{{ old('misi', $pesantren->misi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Foto Profile / Pimpinan</label>
                        @if($pesantren->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $pesantren->gambar) }}" class="rounded shadow-sm" style="height:100px; object-fit:cover;">
                        </div>
                        @endif
                        <input type="file" name="gambar" class="form-control">
                        <div class="form-text text-muted" style="font-size:0.75rem;">JPG/PNG, Maks. 2MB</div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius:10px;">
                        <i class="bi bi-save me-1"></i> Simpan Profil Pesantren
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- MADRASAH --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm" style="border-radius:20px;">
            <div class="card-header bg-white py-3 border-0" style="border-radius:20px 20px 0 0;">
                <div class="d-flex align-items-center gap-2">
                    <div style="width:10px; height:24px; background:#06b6d4; border-radius:4px;"></div>
                    <h5 class="fw-bold mb-0">Portal Madrasah</h5>
                </div>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.profile.update', $madrasah->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Sejarah Madrasah</label>
                        <textarea name="sejarah" class="form-control" rows="5" placeholder="Tuliskan sejarah berdirinya madrasah...">{{ old('sejarah', $madrasah->sejarah) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Visi</label>
                        <textarea name="visi" class="form-control" rows="2" placeholder="Visi madrasah...">{{ old('visi', $madrasah->visi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Misi</label>
                        <textarea name="misi" class="form-control" rows="4" placeholder="Misi madrasah...">{{ old('misi', $madrasah->misi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Foto Profile / Gedung</label>
                        @if($madrasah->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $madrasah->gambar) }}" class="rounded shadow-sm" style="height:100px; object-fit:cover;">
                        </div>
                        @endif
                        <input type="file" name="gambar" class="form-control">
                        <div class="form-text text-muted" style="font-size:0.75rem;">JPG/PNG, Maks. 2MB</div>
                    </div>

                    <button type="submit" class="btn btn-info w-100 py-2 fw-bold text-white" style="border-radius:10px;">
                        <i class="bi bi-save me-1"></i> Simpan Profil Madrasah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

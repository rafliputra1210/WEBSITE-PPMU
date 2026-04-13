@extends('layouts.admin')

@section('title_page', 'Manajemen Fasilitas')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">Manajemen Fasilitas</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem;">Total: <strong>{{ $fasilitas->total() }}</strong> fasilitas terdaftar</p>
    </div>
    <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary" style="border-radius:10px;">
        <i class="bi bi-plus-lg me-1"></i> Tambah Fasilitas
    </a>
</div>

{{-- Alert --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- Filter --}}
<div class="card border-0 shadow-sm mb-4" style="border-radius:14px;">
    <div class="card-body p-3">
        <form method="GET" action="{{ route('admin.fasilitas.index') }}" class="row g-2 align-items-end">
            <div class="col-md-3">
                <label class="form-label mb-1" style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">Filter Entitas</label>
                <select name="entitas" class="form-select form-select-sm">
                    <option value="">-- Semua --</option>
                    <option value="pesantren" {{ request('entitas') == 'pesantren' ? 'selected' : '' }}>🕌 Pesantren</option>
                    <option value="madrasah" {{ request('entitas') == 'madrasah' ? 'selected' : '' }}>🏫 Madrasah</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-funnel me-1"></i>Filter
                </button>
            </div>
            @if(request('entitas'))
            <div class="col-md-2">
                <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-secondary btn-sm w-100">
                    <i class="bi bi-x-circle me-1"></i>Reset
                </a>
            </div>
            @endif
        </form>
    </div>
</div>

{{-- Grid Fasilitas --}}
@if($fasilitas->count() > 0)
<div class="row g-3">
    @foreach($fasilitas as $item)
    <div class="col-md-6 col-xl-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px;overflow:hidden;">
            <div class="card-body p-3">
                {{-- Badge entitas --}}
                <div class="mb-2">
                    @if($item->entitas === 'pesantren')
                        <span class="badge rounded-pill" style="background:#eef2ff;color:#6366f1;font-size:0.72rem;font-weight:600;padding:4px 10px;">🕌 Pesantren</span>
                    @else
                        <span class="badge rounded-pill" style="background:#ecfeff;color:#0891b2;font-size:0.72rem;font-weight:600;padding:4px 10px;">🏫 Madrasah</span>
                    @endif
                </div>

                <h6 class="fw-bold mb-1" style="font-size:0.92rem;color:#1e293b;">{{ $item->nama_fasilitas }}</h6>

                @if($item->deskripsi)
                <p class="text-muted mb-3" style="font-size:0.8rem;line-height:1.5;
                    display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                    {{ $item->deskripsi }}
                </p>
                @else
                <p class="text-muted mb-3" style="font-size:0.8rem;font-style:italic;">Belum ada deskripsi</p>
                @endif

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.fasilitas.edit', $item->id) }}"
                       class="btn btn-sm btn-outline-primary flex-fill" style="border-radius:8px;font-size:0.82rem;">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST"
                          onsubmit="return confirm('Hapus fasilitas \'{{ $item->nama_fasilitas }}\'?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius:8px;">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="card-footer bg-transparent border-0 px-3 pb-3 pt-0">
                <small class="text-muted" style="font-size:0.72rem;">
                    <i class="bi bi-clock me-1"></i>{{ $item->created_at->format('d M Y') }}
                </small>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Pagination --}}
@if($fasilitas->hasPages())
<div class="mt-4 d-flex justify-content-center">
    {{ $fasilitas->links() }}
</div>
@endif

@else
<div class="card border-0 shadow-sm" style="border-radius:14px;">
    <div class="card-body text-center py-5">
        <i class="bi bi-building" style="font-size:3rem;color:#cbd5e1;display:block;margin-bottom:12px;"></i>
        <h6 class="fw-semibold text-muted">Belum ada data fasilitas</h6>
        <p class="text-muted mb-4" style="font-size:0.85rem;">Tambahkan fasilitas pesantren atau madrasah untuk ditampilkan di website.</p>
        <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary" style="border-radius:10px;">
            <i class="bi bi-plus-lg me-1"></i>Tambah Fasilitas Pertama
        </a>
    </div>
</div>
@endif

@endsection

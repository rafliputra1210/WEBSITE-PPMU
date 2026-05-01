@extends('layouts.admin')

@section('title_page', 'Manajemen Hasil Progres')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">Hasil Progres Pembangunan</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem;">Total: <strong>{{ $progres->total() }}</strong> progres terdaftar</p>
    </div>
    <a href="{{ route('admin.progres.create') }}" class="btn btn-primary" style="border-radius:10px;">
        <i class="bi bi-plus-lg me-1"></i> Tambah Progres
    </a>
</div>

{{-- Alert --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- Grid Progres --}}
@if($progres->count() > 0)
<div class="row g-3">
    @foreach($progres as $item)
    <div class="col-md-6 col-xl-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius:14px;overflow:hidden;">
            @if($item->foto)
            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->judul }}" style="height:200px;object-fit:cover;">
            @else
            <div class="bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                <i class="bi bi-image text-muted" style="font-size:3rem;"></i>
            </div>
            @endif
            <div class="card-body p-3">
                <h6 class="fw-bold mb-1" style="font-size:0.92rem;color:#1e293b;">{{ $item->judul }}</h6>

                @if($item->keterangan)
                <p class="text-muted mb-3" style="font-size:0.8rem;line-height:1.5;
                    display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                    {{ $item->keterangan }}
                </p>
                @else
                <p class="text-muted mb-3" style="font-size:0.8rem;font-style:italic;">Belum ada keterangan</p>
                @endif

                <div class="d-flex gap-2 mt-auto">
                    <a href="{{ route('admin.progres.edit', $item->id) }}"
                       class="btn btn-sm btn-outline-primary flex-fill" style="border-radius:8px;font-size:0.82rem;">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <form action="{{ route('admin.progres.destroy', $item->id) }}" method="POST"
                          onsubmit="return confirm('Hapus progres \'{{ $item->judul }}\'?')">
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
@if($progres->hasPages())
<div class="mt-4 d-flex justify-content-center">
    {{ $progres->links() }}
</div>
@endif

@else
<div class="card border-0 shadow-sm" style="border-radius:14px;">
    <div class="card-body text-center py-5">
        <i class="bi bi-graph-up-arrow" style="font-size:3rem;color:#cbd5e1;display:block;margin-bottom:12px;"></i>
        <h6 class="fw-semibold text-muted">Belum ada data progres</h6>
        <p class="text-muted mb-4" style="font-size:0.85rem;">Tambahkan progres pembangunan untuk ditampilkan sebagai laporan ke jamaah/publik.</p>
        <a href="{{ route('admin.progres.create') }}" class="btn btn-primary" style="border-radius:10px;">
            <i class="bi bi-plus-lg me-1"></i>Tambah Progres Pertama
        </a>
    </div>
</div>
@endif

@endsection

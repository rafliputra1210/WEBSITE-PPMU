@extends('layouts.admin')

@section('title', 'Kelola QRIS PPDB')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">QRIS Pembayaran PPDB</h4>
        <p class="text-muted mb-0 small">Kelola kode QRIS untuk pembayaran pendaftaran Pesantren & Madrasah</p>
    </div>
    <a href="{{ route('admin.qris-ppdb.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg me-1"></i> Unggah QRIS
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row g-4">
    @forelse($qrisPpdb as $q)
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card shadow-sm h-100">
            <img src="{{ asset('storage/' . $q->gambar) }}" class="card-img-top p-3"
                 style="height:180px; object-fit:contain; background:#f8fafc;">
            <div class="card-body p-3">
                <span class="badge {{ $q->entitas == 'pesantren' ? 'bg-success' : 'bg-primary' }} mb-2">
                    {{ ucfirst($q->entitas) }}
                </span>
                <p class="fw-bold mb-1 small">{{ $q->nama ?: 'QRIS ' . ucfirst($q->entitas) }}</p>
                <div class="d-flex gap-2 mt-2">
                    <form method="POST" action="{{ route('admin.qris-ppdb.toggle', $q) }}" class="flex-fill">
                        @csrf @method('PUT')
                        <button class="btn btn-sm w-100 {{ $q->is_active ? 'btn-success' : 'btn-outline-secondary' }}">
                            {{ $q->is_active ? 'Aktif' : 'Nonaktif' }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.qris-ppdb.destroy', $q) }}" onsubmit="return confirm('Hapus QRIS ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center text-muted py-5">
        <i class="bi bi-qr-code fs-1 d-block mb-3 opacity-25"></i>
        Belum ada QRIS PPDB. Klik <strong>Unggah QRIS</strong> untuk menambahkan.
    </div>
    @endforelse
</div>
@endsection

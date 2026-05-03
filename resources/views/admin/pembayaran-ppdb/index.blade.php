@extends('layouts.admin')

@section('title', 'Kelola Rekening PPDB')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Rekening Pembayaran PPDB</h4>
        <p class="text-muted mb-0 small">Kelola rekening bank untuk pembayaran pendaftaran Pesantren & Madrasah</p>
    </div>
    <a href="{{ route('admin.pembayaran-ppdb.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg me-1"></i> Tambah Rekening
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- Pesantren --}}
<h6 class="fw-bold text-success mb-2"><i class="bi bi-building me-1"></i> Pesantren</h6>
<div class="card mb-4 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama Bank</th>
                    <th>No. Rekening</th>
                    <th>Atas Nama</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rekening->where('entitas', 'pesantren') as $r)
                <tr>
                    <td><span class="badge bg-success bg-opacity-10 text-success fw-bold">{{ $r->nama_bank }}</span></td>
                    <td><code>{{ $r->no_rekening }}</code></td>
                    <td>{{ $r->atas_nama }}</td>
                    <td class="text-muted small">{{ $r->keterangan ?: '-' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.pembayaran-ppdb.toggle', $r) }}">
                            @csrf @method('PUT')
                            <button class="btn btn-sm {{ $r->is_active ? 'btn-success' : 'btn-secondary' }}">
                                {{ $r->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td class="text-end">
                        <form method="POST" action="{{ route('admin.pembayaran-ppdb.destroy', $r) }}" onsubmit="return confirm('Hapus rekening ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-3">Belum ada rekening untuk Pesantren.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Madrasah --}}
<h6 class="fw-bold text-primary mb-2"><i class="bi bi-building me-1"></i> Madrasah</h6>
<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama Bank</th>
                    <th>No. Rekening</th>
                    <th>Atas Nama</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rekening->where('entitas', 'madrasah') as $r)
                <tr>
                    <td><span class="badge bg-primary bg-opacity-10 text-primary fw-bold">{{ $r->nama_bank }}</span></td>
                    <td><code>{{ $r->no_rekening }}</code></td>
                    <td>{{ $r->atas_nama }}</td>
                    <td class="text-muted small">{{ $r->keterangan ?: '-' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.pembayaran-ppdb.toggle', $r) }}">
                            @csrf @method('PUT')
                            <button class="btn btn-sm {{ $r->is_active ? 'btn-success' : 'btn-secondary' }}">
                                {{ $r->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td class="text-end">
                        <form method="POST" action="{{ route('admin.pembayaran-ppdb.destroy', $r) }}" onsubmit="return confirm('Hapus rekening ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-3">Belum ada rekening untuk Madrasah.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

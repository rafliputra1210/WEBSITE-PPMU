@extends('layouts.admin')
@section('title_page', 'Kelola QRIS Donasi')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar QRIS</h5>
            <a href="{{ route('admin.qris.create') }}" class="btn btn-primary rounded-3 px-4 fw-semibold">
                <i class="bi bi-plus-lg me-2"></i>Tambah QRIS
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Gambar QRIS</th>
                        <th>Nama / Keterangan</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($qris as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="QRIS" class="rounded" style="height: 60px; object-fit: contain;">
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $item->nama ?: '(Tanpa Nama)' }}</div>
                            </td>
                            <td>
                                @if($item->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Non-Aktif</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <form action="{{ route('admin.qris.toggle', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-outline-warning rounded-3 me-1" title="Ubah Status">
                                        <i class="bi bi-power"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.qris.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus QRIS ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-3">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data QRIS.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $qris->links() }}
        </div>
    </div>
</div>
@endsection

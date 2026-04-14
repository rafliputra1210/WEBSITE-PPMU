@extends('layouts.admin')

@section('title_page', 'Kelola Program Unggulan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Program Unggulan</h4>
        <p class="text-muted mb-0" style="font-size:0.82rem;">Kelola program-program unggulan yang tampil di beranda.</p>
    </div>
    <a href="{{ route('admin.program.create') }}" class="btn btn-primary px-4 py-2" style="border-radius:12px; font-weight:600;">
        <i class="bi bi-plus-lg me-1"></i>Tambah Program
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" style="border-radius:12px;" role="alert">
    <div class="d-flex align-items-center">
        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
        <div>{{ session('success') }}</div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow-sm" style="border-radius:20px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted" style="width:80px;">No</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Program</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Kategori</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $index => $item)
                    <tr>
                        <td class="ps-4 fw-medium text-muted">
                            {{ $programs->firstItem() + $index }}
                        </td>
                        <td class="py-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ asset('storage/' . $item->gambar) }}" 
                                     alt="{{ $item->nama }}" 
                                     style="width:50px; height:50px; border-radius:10px; object-fit:cover;">
                                <div>
                                    <div class="fw-bold text-dark">{{ $item->nama }}</div>
                                    <div class="text-muted small">{{ Str::limit($item->deskripsi, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge {{ $item->kategori == 'Pesantren' ? 'bg-success-subtle text-success' : 'bg-info-subtle text-info' }} rounded-pill px-3 py-2 small fw-semibold">
                                {{ $item->kategori }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.program.edit', $item->id) }}" 
                                   class="btn btn-sm btn-outline-primary" 
                                   style="border-radius:8px; width:34px; height:34px; display:inline-flex; align-items:center; justify-content:center;">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.program.destroy', $item->id) }}" method="POST" 
                                      onsubmit="return confirm('Hapus program ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                            style="border-radius:8px; width:34px; height:34px; display:inline-flex; align-items:center; justify-content:center;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                Belum ada data program
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-4">
    {{ $programs->links() }}
</div>
@endsection

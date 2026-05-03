@extends('layouts.admin')
@section('title_page', 'Banner Portal Pesantren')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Banner Pesantren</h5>
            <a href="{{ route('admin.pesantren-banner.create') }}" class="btn btn-primary rounded-3 px-4 fw-semibold">
                <i class="bi bi-plus-lg me-2"></i>Tambah Banner
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
                        <th>Urutan</th>
                        <th>Gambar</th>
                        <th>Teks Utama</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($banners as $banner)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $banner->order }}</span></td>
                            <td>
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner" class="rounded" style="height: 60px; object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $banner->title ?: '(Tanpa Teks)' }}</div>
                                <div class="small text-muted">{{ Str::limit($banner->subtitle, 40) }}</div>
                            </td>
                            <td>
                                @if($banner->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Non-Aktif</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.pesantren-banner.edit', $banner->id) }}" class="btn btn-sm btn-outline-primary rounded-3">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.pesantren-banner.destroy', $banner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus banner ini?')">
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
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data banner pesantren.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title_page', 'Kelola Galeri')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Foto Galeri</h5>
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-plus-circle me-2"></i>Upload Foto
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Filter --}}
        <div class="d-flex gap-2 mb-4 flex-wrap">
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm {{ !request('kategori') ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3">Semua</a>
            <a href="{{ route('admin.galeri.index', ['kategori' => 'potret']) }}" class="btn btn-sm {{ request('kategori') == 'potret' ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3">🖼️ Potret</a>
            <a href="{{ route('admin.galeri.index', ['kategori' => 'prestasi']) }}" class="btn btn-sm {{ request('kategori') == 'prestasi' ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3">🏆 Prestasi</a>
        </div>

        @if($galeris->count() > 0)
            <div class="row g-3">
                @foreach($galeris as $item)
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
                        <div style="position: relative; height: 180px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $item->file_path) }}"
                                 alt="{{ $item->judul_gambar ?? 'Foto Galeri' }}"
                                 class="w-100 h-100"
                                 style="object-fit: cover; transition: transform 0.3s;"
                                 onmouseover="this.style.transform='scale(1.05)'"
                                 onmouseout="this.style.transform='scale(1)'">
                            <span class="badge position-absolute top-0 start-0 m-2 {{ $item->kategori === 'prestasi' ? 'bg-warning text-dark' : 'bg-info' }}">
                                {{ ucfirst($item->kategori) }}
                            </span>
                            <span class="badge position-absolute top-0 end-0 m-2 bg-dark bg-opacity-75">
                                {{ ucfirst($item->entitas) }}
                            </span>
                        </div>
                        <div class="card-body p-2">
                            <p class="small fw-semibold mb-1 text-truncate">{{ $item->judul_gambar ?? '(Tanpa judul)' }}</p>
                            <div class="d-flex gap-1 justify-content-end">
                                <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus foto ini dari galeri?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $galeris->links() }}
            </div>
        @else
            <div class="text-center py-5 text-muted">
                <i class="bi bi-images fs-1 d-block mb-3"></i>
                <p>Belum ada foto di galeri. Mulai upload sekarang!</p>
                <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary rounded-pill px-4">
                    <i class="bi bi-plus-circle me-2"></i>Upload Foto Pertama
                </a>
            </div>
        @endif
    </div>
</div>

<script>
// Bootstrap JS sudah di layout
document.addEventListener('DOMContentLoaded', function () {
    // Dismiss alert auto
    setTimeout(function () {
        document.querySelectorAll('.alert').forEach(el => {
            let alert = bootstrap.Alert.getOrCreateInstance(el);
            alert.close();
        });
    }, 4000);
});
</script>
@endsection

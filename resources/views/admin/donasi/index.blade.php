@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0">Manajemen Donasi</h6>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.donasi.settings') }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-gear-fill me-2"></i>Atur Halaman</a>
                        <a href="{{ route('admin.donasi.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus me-2"></i>Tambah Donatur</a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Donatur</th>
                                <th scope="col">Jenis/Nominal</th>
                                <th scope="col">Metode & Bukti</th>
                                <th scope="col">Tgl Donasi</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($donaturs as $index => $item)
                                <tr>
                                    <th scope="row">{{ $donaturs->firstItem() + $index }}</th>
                                    <td>
                                        <strong>{{ $item->nama_donatur }}</strong><br>
                                        <small class="text-muted">WA: {{ $item->no_wa ?? '-' }}</small>
                                    </td>
                                    <td>
                                        @if($item->jenis_donasi == 'material')
                                            <span class="badge bg-success">Material</span>
                                        @else
                                            <span class="text-primary fw-bold">Rp {{ number_format($item->jumlah_donasi, 0, ',', '.') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->metode_pembayaran)
                                            <div class="small fw-bold">{{ $item->metode_pembayaran }}</div>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                        
                                        @if($item->bukti_pembayaran)
                                            <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-1" style="font-size: 0.75rem;">
                                                <i class="bi bi-image me-1"></i>Lihat Bukti
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $item->tanggal_donasi->format('d M Y') }}</td>
                                    <td>
                                        @if($item->status == 'berhasil')
                                            <span class="badge bg-success">Berhasil</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.donasi.edit', $item->id) }}" class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.donasi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada donasi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                {{-- Pagination Placeholder --}}
                <div class="mt-3">
                    {{ $donaturs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

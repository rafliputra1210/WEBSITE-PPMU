@extends('layouts.admin')
@section('title_page', 'Testimoni')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Testimoni</h5>
            <a href="{{ route('admin.testimoni.create') }}" class="btn btn-primary rounded-3 px-4 fw-semibold">
                <i class="bi bi-plus-lg me-2"></i>Tambah Testimoni
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
                        <th>#</th>
                        <th>Nama & Peran</th>
                        <th>Isi Testimoni</th>
                        <th>Bintang</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonis as $i => $t)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                         style="width:38px;height:38px;font-size:0.9rem;background:{{ $t->warna_avatar }};flex-shrink:0;">
                                        {{ $t->inisial }}
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark" style="font-size:0.9rem;">{{ $t->nama }}</div>
                                        <div class="text-muted" style="font-size:0.75rem;">{{ $t->peran }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="max-width:300px;">
                                <span class="text-secondary" style="font-size:0.85rem;">{{ Str::limit($t->isi, 80) }}</span>
                            </td>
                            <td>
                                <span class="text-warning" style="letter-spacing:1px;">
                                    @for($s = 1; $s <= 5; $s++)
                                        {{ $s <= $t->bintang ? '★' : '☆' }}
                                    @endfor
                                </span>
                            </td>
                            <td>
                                @if($t->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Non-Aktif</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.testimoni.edit', $t->id) }}" class="btn btn-sm btn-outline-primary rounded-3">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.testimoni.destroy', $t->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
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
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-chat-quote fs-2 d-block mb-2 text-secondary"></i>
                                Belum ada testimoni. <a href="{{ route('admin.testimoni.create') }}">Tambahkan sekarang</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

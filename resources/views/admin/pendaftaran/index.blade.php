@extends('layouts.admin')

@section('title_page', 'Data Pendaftaran Santri')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">Data Pendaftar Santri</h4>
        <p class="text-muted mb-0" style="font-size:0.85rem;">Total: <strong>{{ $pendaftarans->total() }}</strong> pendaftar terdaftar</p>
    </div>
</div>

{{-- Alert --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- Filter & Search --}}
<div class="card border-0 shadow-sm mb-4" style="border-radius:14px;">
    <div class="card-body p-3">
        <form method="GET" action="{{ route('admin.pendaftaran.index') }}" class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="form-label mb-1" style="font-size:0.78rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Cari Nama / No. WA / Sekolah</label>
                <input type="text" name="search" class="form-control form-control-sm"
                       placeholder="Ketik untuk mencari..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label mb-1" style="font-size:0.78rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Filter Tujuan</label>
                <select name="filter" class="form-select form-select-sm">
                    <option value="">-- Semua --</option>
                    <option value="pesantren" {{ request('filter') == 'pesantren' ? 'selected' : '' }}>Pesantren</option>
                    <option value="madrasah" {{ request('filter') == 'madrasah' ? 'selected' : '' }}>Madrasah</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-search me-1"></i>Filter
                </button>
            </div>
            @if(request('search') || request('filter'))
            <div class="col-md-2">
                <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-outline-secondary btn-sm w-100">
                    <i class="bi bi-x-circle me-1"></i>Reset
                </a>
            </div>
            @endif
        </form>
    </div>
</div>

{{-- Tabel --}}
<div class="card border-0 shadow-sm" style="border-radius:14px;overflow:hidden;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead style="background:#f8fafc;">
                <tr>
                    <th class="ps-4" style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#64748b;border-bottom:1px solid #f1f5f9;">#</th>
                    <th style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#64748b;border-bottom:1px solid #f1f5f9;">Nama Lengkap</th>
                    <th style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#64748b;border-bottom:1px solid #f1f5f9;">TTL</th>
                    <th style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#64748b;border-bottom:1px solid #f1f5f9;">Asal Sekolah</th>
                    <th style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#64748b;border-bottom:1px solid #f1f5f9;">Mendaftar Ke</th>
                    <th style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#64748b;border-bottom:1px solid #f1f5f9;">Nama Wali</th>
                    <th style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#64748b;border-bottom:1px solid #f1f5f9;">No. WhatsApp</th>
                    <th style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#64748b;border-bottom:1px solid #f1f5f9;">Tgl Daftar</th>
                    <th class="text-center pe-4" style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#64748b;border-bottom:1px solid #f1f5f9;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendaftarans as $item)
                <tr>
                    <td class="ps-4 text-muted" style="font-size:0.85rem;">
                        {{ $pendaftarans->firstItem() + $loop->index }}
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#6366f1,#8b5cf6);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:0.85rem;flex-shrink:0;">
                                {{ strtoupper(substr($item->nama_lengkap, 0, 1)) }}
                            </div>
                            <span class="fw-semibold" style="font-size:0.88rem;">{{ $item->nama_lengkap }}</span>
                        </div>
                    </td>
                    <td style="font-size:0.85rem;color:#64748b;">
                        {{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}
                    </td>
                    <td style="font-size:0.85rem;">{{ $item->asal_sekolah }}</td>
                    <td>
                        @if($item->mendaftar_ke === 'pesantren')
                            <span class="badge rounded-pill" style="background:#eef2ff;color:#6366f1;font-weight:600;font-size:0.75rem;padding:5px 10px;">
                                🕌 Pesantren
                            </span>
                        @else
                            <span class="badge rounded-pill" style="background:#ecfeff;color:#0891b2;font-weight:600;font-size:0.75rem;padding:5px 10px;">
                                🏫 Madrasah
                            </span>
                        @endif
                    </td>
                    <td style="font-size:0.85rem;">{{ $item->nama_wali }}</td>
                    <td>
                        <a href="https://wa.me/{{ preg_replace('/^0/', '62', $item->no_wa) }}"
                           target="_blank"
                           class="text-decoration-none d-flex align-items-center gap-1"
                           style="font-size:0.85rem;color:#059669;">
                            <i class="bi bi-whatsapp"></i> {{ $item->no_wa }}
                        </a>
                    </td>
                    <td style="font-size:0.82rem;color:#64748b;">
                        {{ $item->created_at->format('d M Y') }}<br>
                        <span style="font-size:0.75rem;">{{ $item->created_at->format('H:i') }} WIB</span>
                    </td>
                    <td class="text-center pe-4">
                        <form action="{{ route('admin.pendaftaran.destroy', $item->id) }}" method="POST"
                              onsubmit="return confirm('Hapus data pendaftaran {{ $item->nama_lengkap }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius:8px;">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-5">
                        <div style="color:#94a3b8;">
                            <i class="bi bi-inbox" style="font-size:2.5rem;display:block;margin-bottom:10px;"></i>
                            <div class="fw-semibold">Belum ada data pendaftaran</div>
                            <div style="font-size:0.82rem;margin-top:4px;">Pendaftar yang mengisi formulir akan muncul di sini</div>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
@if($pendaftarans->hasPages())
<div class="mt-4 d-flex justify-content-center">
    {{ $pendaftarans->links() }}
</div>
@endif

@endsection

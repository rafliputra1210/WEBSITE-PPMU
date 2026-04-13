<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran — Admin PPMU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: #f1f5f9; font-family: 'Segoe UI', sans-serif; }
        .admin-sidebar {
            position: fixed; top: 0; left: 0; bottom: 0;
            width: 240px; background: #0a0f2e;
            padding: 24px 16px; z-index: 100;
        }
        .sidebar-brand { color: #fff; font-weight: 800; font-size: 1.1rem; margin-bottom: 30px; display: block; text-decoration: none; padding: 0 8px; }
        .sidebar-brand span { color: #6366f1; }
        .sidebar-link {
            display: flex; align-items: center; gap: 10px;
            color: rgba(255,255,255,0.6); text-decoration: none;
            padding: 9px 12px; border-radius: 10px;
            font-size: 0.88rem; font-weight: 500;
            transition: all 0.2s; margin-bottom: 4px;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background: rgba(99,102,241,0.2); color: #fff;
        }
        .sidebar-link i { font-size: 1rem; width: 20px; }
        .admin-main { margin-left: 240px; padding: 30px; min-height: 100vh; }
        .page-header { background: #fff; border-radius: 16px; padding: 20px 24px; margin-bottom: 24px; box-shadow: 0 1px 6px rgba(0,0,0,0.06); display: flex; align-items: center; justify-content: space-between; }
        .page-header h4 { margin: 0; font-weight: 700; color: #0f172a; }
        .card-table { background: #fff; border-radius: 16px; box-shadow: 0 1px 6px rgba(0,0,0,0.06); overflow: hidden; }
        .card-table-header { padding: 18px 24px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
        .stat-badge { background: #eef2ff; color: #4f46e5; font-weight: 700; font-size: 0.8rem; padding: 5px 12px; border-radius: 100px; }
        .table { margin: 0; }
        .table thead th { background: #f8fafc; color: #64748b; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; padding: 12px 16px; border: none; border-bottom: 1px solid #e2e8f0; }
        .table tbody td { padding: 13px 16px; vertical-align: middle; border-color: #f1f5f9; font-size: 0.88rem; color: #374151; }
        .table tbody tr:hover { background: #fafbff; }
        .badge-pesantren { background: rgba(99,102,241,0.1); color: #4f46e5; font-weight: 600; font-size: 0.75rem; padding: 4px 10px; border-radius: 100px; }
        .badge-madrasah { background: rgba(6,182,212,0.1); color: #0891b2; font-weight: 600; font-size: 0.75rem; padding: 4px 10px; border-radius: 100px; }
        .btn-del { background: rgba(239,68,68,0.08); color: #ef4444; border: none; padding: 5px 12px; border-radius: 8px; font-size: 0.8rem; font-weight: 600; transition: all 0.2s; }
        .btn-del:hover { background: #ef4444; color: #fff; }
        .search-wrap { display: flex; gap: 8px; }
        .search-wrap input, .search-wrap select { border-radius: 8px; border: 1.5px solid #e2e8f0; padding: 7px 12px; font-size: 0.85rem; color: #374151; }
        .search-wrap input:focus, .search-wrap select:focus { border-color: #6366f1; outline: none; box-shadow: none; }
        .search-wrap button { background: #6366f1; color: #fff; border: none; border-radius: 8px; padding: 7px 16px; font-size: 0.85rem; font-weight: 600; }
        .empty-state { text-align: center; padding: 60px 20px; color: #94a3b8; }
        .empty-state i { font-size: 3rem; margin-bottom: 12px; display: block; }
        .alert-admin { border-radius: 10px; font-size: 0.88rem; }
        .wa-link { color: #16a34a; text-decoration: none; font-weight: 600; }
        .wa-link:hover { text-decoration: underline; }
        .no-row { font-size: 0.75rem; color: #94a3b8; }
    </style>
</head>
<body>

{{-- Sidebar --}}
<aside class="admin-sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">Admin <span>PPMU</span></a>

    <div style="font-size:0.65rem;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,0.3);padding:0 12px;margin-bottom:8px;">Konten</div>
    <a href="{{ route('admin.berita.index') }}" class="sidebar-link"><i class="bi bi-newspaper"></i> Berita</a>
    <a href="{{ route('admin.galeri.index') }}" class="sidebar-link"><i class="bi bi-images"></i> Galeri</a>

    <div style="font-size:0.65rem;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,0.3);padding:0 12px;margin:14px 0 8px;">Pendaftaran</div>
    <a href="{{ route('admin.pendaftaran.index') }}" class="sidebar-link active"><i class="bi bi-people-fill"></i> Data Pendaftaran</a>

    <div style="position:absolute;bottom:20px;left:16px;right:16px;">
        <a href="{{ url('/') }}" class="sidebar-link"><i class="bi bi-house"></i> Lihat Website</a>
    </div>
</aside>

{{-- Main --}}
<main class="admin-main">

    {{-- Header --}}
    <div class="page-header">
        <div>
            <h4><i class="bi bi-people-fill text-primary me-2"></i>Data Pendaftaran PPDB</h4>
            <p class="text-muted mb-0" style="font-size:0.82rem;">Seluruh pendaftar yang masuk melalui website</p>
        </div>
        <span class="stat-badge">{{ $pendaftarans->total() }} Pendaftar</span>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show alert-admin mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- Table Card --}}
    <div class="card-table">
        <div class="card-table-header">
            <div style="font-size:0.85rem;font-weight:700;color:#0f172a;">Daftar Pendaftar</div>
            <form method="GET" class="search-wrap">
                <input type="text" name="search" placeholder="Cari nama / wali / WA…" value="{{ request('search') }}">
                <select name="filter">
                    <option value="">Semua</option>
                    <option value="pesantren" {{ request('filter') == 'pesantren' ? 'selected' : '' }}>Pesantren</option>
                    <option value="madrasah" {{ request('filter') == 'madrasah' ? 'selected' : '' }}>Madrasah</option>
                </select>
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>

        @if($pendaftarans->isEmpty())
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <p>Belum ada data pendaftaran yang masuk.</p>
        </div>
        @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>TTL</th>
                        <th>Asal Sekolah</th>
                        <th>Mendaftar Ke</th>
                        <th>Nama Wali</th>
                        <th>WhatsApp</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftarans as $index => $p)
                    <tr>
                        <td class="no-row">{{ $pendaftarans->firstItem() + $index }}</td>
                        <td><strong>{{ $p->nama_lengkap }}</strong></td>
                        <td style="white-space:nowrap;">{{ $p->tempat_lahir }},<br><span style="color:#64748b;">{{ $p->tanggal_lahir }}</span></td>
                        <td>{{ $p->asal_sekolah }}</td>
                        <td>
                            @if($p->mendaftar_ke == 'pesantren')
                            <span class="badge-pesantren">🕌 Pesantren</span>
                            @else
                            <span class="badge-madrasah">🏫 Madrasah</span>
                            @endif
                        </td>
                        <td>{{ $p->nama_wali }}</td>
                        <td>
                            <a href="https://wa.me/{{ preg_replace('/^0/', '62', $p->no_wa) }}" target="_blank" class="wa-link">
                                <i class="bi bi-whatsapp me-1"></i>{{ $p->no_wa }}
                            </a>
                        </td>
                        <td style="white-space:nowrap;color:#64748b;">{{ $p->created_at->format('d M Y') }}<br><span style="font-size:0.75rem;">{{ $p->created_at->format('H:i') }}</span></td>
                        <td>
                            <form method="POST" action="{{ route('admin.pendaftaran.destroy', $p->id) }}"
                                  onsubmit="return confirm('Hapus data pendaftaran {{ $p->nama_lengkap }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-del"><i class="bi bi-trash3"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($pendaftarans->hasPages())
        <div style="padding: 16px 24px; border-top: 1px solid #f1f5f9;">
            {{ $pendaftarans->links() }}
        </div>
        @endif
        @endif
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

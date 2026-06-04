@extends('layouts.admin')

@section('title_page', 'Kelola Buku Kas Donasi')

@section('content')
<div class="container-fluid pt-4 px-4">
    <!-- Ringkasan Statistik Bulanan -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 card-stat">
                <i class="bi bi-arrow-down-left-square-fill text-success fs-1"></i>
                <div class="ms-3 text-end">
                    <p class="mb-2 text-muted small text-uppercase fw-bold">Pemasukan Bulan Ini</p>
                    <h5 class="mb-0 text-success fw-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 card-stat">
                <i class="bi bi-arrow-up-right-square-fill text-danger fs-1"></i>
                <div class="ms-3 text-end">
                    <p class="mb-2 text-muted small text-uppercase fw-bold">Pengeluaran Bulan Ini</p>
                    <h5 class="mb-0 text-danger fw-bold">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 card-stat">
                <i class="bi bi-wallet2 text-primary fs-1"></i>
                <div class="ms-3 text-end">
                    <p class="mb-2 text-muted small text-uppercase fw-bold">Total Saldo Kas</p>
                    <h5 class="mb-0 text-primary fw-bold">Rp {{ number_format($saldoKumulatif, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Success/Error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <!-- Header & Kontrol -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div>
                        <h6 class="mb-1 text-dark fw-bold">Buku Kas Laporan Bulanan</h6>
                        <p class="text-muted small mb-0">Kelola arus kas masuk dan pengeluaran donasi pembangunan pesantren</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <form action="{{ route('admin.buku-kas.sync') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-success btn-sm">
                                <i class="bi bi-arrow-repeat me-2"></i>Sinkronisasi Donasi
                            </button>
                        </form>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="bi bi-plus-lg me-2"></i>Tambah Transaksi
                        </button>
                    </div>
                </div>

                <!-- Form Filter Bulanan -->
                <form action="{{ route('admin.buku-kas.index') }}" method="GET" class="row g-2 mb-4 bg-white p-3 rounded border border-light">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted">Bulan</label>
                        <select name="bulan" class="form-select form-select-sm">
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ sprintf('%02d', $m) }}" {{ $bulan == sprintf('%02d', $m) ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($m)->isoFormat('MMMM') }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted">Tahun</label>
                        <select name="tahun" class="form-select form-select-sm">
                            @for ($y = date('Y') - 5; $y <= date('Y') + 2; $y++)
                                <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-secondary btn-sm w-100"><i class="bi bi-filter me-2"></i>Terapkan Filter</button>
                    </div>
                </form>

                <!-- Tabel Transaksi -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr class="table-secondary">
                                <th scope="col" style="width: 5%;">#</th>
                                <th scope="col" style="width: 15%;">Tanggal</th>
                                <th scope="col" style="width: 15%;">Kategori</th>
                                <th scope="col" style="width: 30%;">Keterangan</th>
                                <th scope="col" style="width: 15%;" class="text-end">Jumlah</th>
                                <th scope="col" style="width: 20%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->tanggal->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge bg-light text-dark border">{{ $item->kategori }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $item->keterangan }}</strong>
                                        @if($item->donatur_id)
                                            <br><small class="text-success"><i class="bi bi-link-45deg"></i> Terikat Donatur #{{ $item->donatur_id }}</small>
                                        @endif
                                    </td>
                                    <td class="text-end fw-bold {{ $item->tipe == 'pemasukan' ? 'text-success' : 'text-danger' }}">
                                        {{ $item->tipe == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($item->nominal, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-info btn-edit" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#modalEdit"
                                                data-id="{{ $item->id }}"
                                                data-tanggal="{{ $item->tanggal->format('Y-m-d') }}"
                                                data-tipe="{{ $item->tipe }}"
                                                data-kategori="{{ $item->kategori }}"
                                                data-keterangan="{{ $item->keterangan }}"
                                                data-nominal="{{ $item->nominal }}"
                                                data-is-donatur="{{ $item->donatur_id ? 'true' : 'false' }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                        @if(!$item->donatur_id)
                                            <form action="{{ route('admin.buku-kas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        @else
                                            <button class="btn btn-sm btn-outline-secondary" onclick="alert('Transaksi otomatis donasi tidak bisa dihapus di sini. Silakan kelola di menu Manajemen Donasi.')"><i class="bi bi-trash-fill"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">Belum ada transaksi di bulan ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Transaksi -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.buku-kas.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalTambahLabel"><i class="bi bi-plus-circle-fill text-primary me-2"></i>Tambah Transaksi Buku Kas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Tipe Transaksi</label>
                        <select name="tipe" class="form-select" required>
                            <option value="pengeluaran" selected>Pengeluaran (Uang Keluar)</option>
                            <option value="pemasukan">Pemasukan (Uang Masuk)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Kategori</label>
                        <input type="text" name="kategori" class="form-control" placeholder="Contoh: Operasional, Pembangunan Masjid, Air/Listrik, dll" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nominal (Rp)</label>
                        <input type="number" name="nominal" class="form-control" placeholder="Nominal Rp" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Keterangan / Keterangan Tambahan</label>
                        <textarea name="keterangan" class="form-control" rows="3" placeholder="Deskripsikan transaksi secara singkat..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Transaksi -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEdit" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalEditLabel"><i class="bi bi-pencil-square text-info me-2"></i>Edit Transaksi Buku Kas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" id="edit_tanggal" class="form-control" required>
                    </div>
                    <div id="editable_fields">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Tipe Transaksi</label>
                            <select name="tipe" id="edit_tipe" class="form-select" required>
                                <option value="pengeluaran">Pengeluaran (Uang Keluar)</option>
                                <option value="pemasukan">Pemasukan (Uang Masuk)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Kategori</label>
                            <input type="text" name="kategori" id="edit_kategori" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nominal (Rp)</label>
                            <input type="number" name="nominal" id="edit_nominal" class="form-control" min="0" required>
                        </div>
                    </div>
                    <!-- Warning Info for Donation-tied records -->
                    <div id="donation_lock_info" class="alert alert-warning py-2 mb-3 small d-none">
                        <i class="bi bi-lock-fill me-1"></i> Transaksi terhubung dengan data donatur. Tipe, kategori, dan nominal hanya dapat dikelola di Manajemen Donasi demi kecocokan data.
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Keterangan</label>
                        <textarea name="keterangan" id="edit_keterangan" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info text-white">Perbarui Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editButtons = document.querySelectorAll(".btn-edit");
        editButtons.forEach(btn => {
            btn.addEventListener("click", function() {
                const id = this.dataset.id;
                const tanggal = this.dataset.tanggal;
                const tipe = this.dataset.tipe;
                const kategori = this.dataset.kategori;
                const keterangan = this.dataset.keterangan;
                const nominal = this.dataset.nominal;
                const isDonatur = this.dataset.isDonatur === 'true';

                // Set Action URL
                document.getElementById("formEdit").setAttribute("action", `/admin/buku-kas/${id}`);

                // Set values
                document.getElementById("edit_tanggal").value = tanggal;
                document.getElementById("edit_tipe").value = tipe;
                document.getElementById("edit_kategori").value = kategori;
                document.getElementById("edit_nominal").value = Math.round(nominal);
                document.getElementById("edit_keterangan").value = keterangan;

                // Handle Lock Fields
                const editFields = document.getElementById("editable_fields");
                const lockInfo = document.getElementById("donation_lock_info");
                
                if (isDonatur) {
                    editFields.classList.add("d-none");
                    lockInfo.classList.remove("d-none");
                } else {
                    editFields.classList.remove("d-none");
                    lockInfo.classList.add("d-none");
                }
            });
        });
    });
</script>
@endpush

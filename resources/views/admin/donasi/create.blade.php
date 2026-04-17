@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8 mx-auto">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Donasi</h6>
                <form action="{{ route('admin.donasi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Donatur</label>
                        <input type="text" name="nama_donatur" class="form-control @error('nama_donatur') is-invalid @enderror" value="{{ old('nama_donatur', 'Hamba Allah') }}" required>
                        @error('nama_donatur') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">No WhatsApp</label>
                        <input type="text" name="no_wa" class="form-control" value="{{ old('no_wa') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Donasi</label>
                        <select name="jenis_donasi" id="jenis_donasi" class="form-select" onchange="toggleNominal()" required>
                            <option value="nominal" {{ old('jenis_donasi') == 'nominal' ? 'selected' : '' }}>Nominal (Uang)</option>
                            <option value="material" {{ old('jenis_donasi') == 'material' ? 'selected' : '' }}>Material (Barang)</option>
                        </select>
                    </div>

                    <div class="mb-3" id="nominal_box">
                        <label class="form-label">Jumlah Donasi (Rp)</label>
                        <input type="number" name="jumlah_donasi" id="jumlah_donasi" class="form-control" value="{{ old('jumlah_donasi') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pesan / Doa</label>
                        <textarea name="pesan" class="form-control" rows="3">{{ old('pesan') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Donasi</label>
                        <input type="date" name="tanggal_donasi" class="form-control" value="{{ old('tanggal_donasi', date('Y-m-d')) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="berhasil" selected>Berhasil</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="{{ route('admin.donasi.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function toggleNominal() {
    var jenis = document.getElementById('jenis_donasi').value;
    var box = document.getElementById('nominal_box');
    if (jenis == 'material') {
        box.style.display = 'none';
        document.getElementById('jumlah_donasi').value = '';
    } else {
        box.style.display = 'block';
    }
}
window.onload = toggleNominal;
</script>
@endsection

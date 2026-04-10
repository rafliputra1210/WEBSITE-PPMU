@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h4 class="mb-0 fw-bold">Formulir Pendaftaran Peserta Didik Baru (PPDB)</h4>
                    <p class="mb-0 small text-white-50">Tahun Ajaran 2026/2027</p>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Lengkap Siswa</label>
                            <input type="text" class="form-control form-control-lg bg-light" placeholder="Sesuai Akta Kelahiran">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tempat Lahir</label>
                                <input type="text" class="form-control bg-light" placeholder="Kota/Kabupaten">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal Lahir</label>
                                <input type="text" class="form-control bg-light" placeholder="DD-MM-YYYY (Contoh: 12-05-2010)">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Nomor Induk Siswa Nasional (NISN)</label>
                                <input type="text" class="form-control bg-light" placeholder="Jika ada">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Asal Sekolah</label>
                                <input type="text" class="form-control bg-light" placeholder="SD / MI Asal">
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="fw-bold mb-3 text-primary">Data Orang Tua / Wali</h6>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Nama Orang Tua / Wali</label>
                                <input type="text" class="form-control bg-light">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">No. WhatsApp Aktif</label>
                                <input type="text" class="form-control bg-light" placeholder="08xxxxxxxxxx">
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold">Kirim Formulir Pendaftaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
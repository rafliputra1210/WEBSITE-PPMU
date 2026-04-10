@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white text-center py-3">
                    <h4 class="mb-0">Formulir Pendaftaran Santri Baru</h4>
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama lengkap">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Kota/Kabupaten">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" placeholder="Contoh: 15-08-2010">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Asal Sekolah</label>
                                <input type="text" class="form-control" placeholder="Nama sekolah sebelumnya">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nama Wali</label>
                                <input type="text" class="form-control" placeholder="Nama orang tua / wali">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Nomor WhatsApp Aktif</label>
                            <input type="text" class="form-control" placeholder="08xxxxxxxxxx">
                        </div>
                        <div class="d-grid text-center">
                            <button type="submit" class="btn btn-success btn-lg">Kirim Pendaftaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
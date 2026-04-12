@extends('layouts.admin')

@section('title_page', 'Dashboard Utama')

@section('content')
<div class="row g-4">
    <div class="col-md-3">
        <div class="card card-stat bg-primary text-white p-4">
            <h5 class="fw-normal bg-primary mb-1">Total Berita</h5>
            <h2 class="fw-bold mb-0">12</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat bg-success text-white p-4">
            <h5 class="fw-normal bg-success mb-1">Donatur</h5>
            <h2 class="fw-bold mb-0">45</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat bg-warning text-dark p-4">
            <h5 class="fw-normal bg-warning mb-1">Pendaftar</h5>
            <h2 class="fw-bold mb-0">128</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat bg-info text-white p-4">
            <h5 class="fw-normal bg-info mb-1">Galeri Foto</h5>
            <h2 class="fw-bold mb-0">34</h2>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4">Aktivitas Terbaru Pendaftar</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Tujuan</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ahmad Fulan</td>
                                <td>Pesantren Terpadu</td>
                                <td>12 Apr 2026</td>
                                <td><span class="badge bg-success rounded-pill">Diterima</span></td>
                            </tr>
                            <tr>
                                <td>Budi Santoso</td>
                                <td>Madrasah Aliyah</td>
                                <td>11 Apr 2026</td>
                                <td><span class="badge bg-warning text-dark rounded-pill">Menunggu</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

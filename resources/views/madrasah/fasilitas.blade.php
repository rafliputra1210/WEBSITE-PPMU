@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h6 class="text-primary fw-bold text-uppercase">Fasilitas Pendukung</h6>
        <h2 class="fw-bold">Lingkungan Belajar yang Nyaman & Modern</h2>
        <p class="text-muted">Kami menyediakan fasilitas terbaik untuk mendukung potensi akademik dan non-akademik siswa.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm card-custom">
                <img src="https://source.unsplash.com/600x400/?laboratory,science" class="card-img-top rounded-top" alt="Laboratorium IPA">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Laboratorium Sains Terpadu</h5>
                    <p class="card-text text-muted">Dilengkapi dengan alat peraga modern untuk praktikum Fisika, Kimia, dan Biologi secara komprehensif.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm card-custom">
                <img src="https://source.unsplash.com/600x400/?computer,lab" class="card-img-top rounded-top" alt="Laboratorium Komputer">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Laboratorium Komputer & Bahasa</h5>
                    <p class="card-text text-muted">PC spesifikasi terkini dengan akses internet cepat untuk menunjang pembelajaran TIK dan uji kompetensi bahasa.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm card-custom">
                <img src="https://source.unsplash.com/600x400/?sport,court" class="card-img-top rounded-top" alt="Fasilitas Olahraga">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Sarana Olahraga Indoor & Outdoor</h5>
                    <p class="card-text text-muted">Lapangan basket, voli, dan futsal untuk mendukung kebugaran fisik dan ekstrakurikuler siswa.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
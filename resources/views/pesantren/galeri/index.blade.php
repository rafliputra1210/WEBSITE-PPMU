@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Galeri Prestasi & Potret</h2>
        
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active bg-success" href="#">Semua</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="#">Fasilitas</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="#">Prestasi</a></li>
        </ul>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <img src="https://source.unsplash.com/600x400/?classroom" class="card-img-top" alt="Fasilitas">
                <div class="card-body">
                    <h6 class="card-title fw-bold">Ruang Kelas Nyaman</h6>
                    <p class="card-text text-muted small">Fasilitas belajar yang dilengkapi dengan teknologi modern.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <img src="https://source.unsplash.com/600x400/?award,student" class="card-img-top" alt="Prestasi">
                <div class="card-body">
                    <h6 class="card-title fw-bold">Juara 1 MTQ Nasional</h6>
                    <p class="card-text text-muted small">Prestasi santri dalam ajang Musabaqah Tilawatil Quran 2025.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <img src="https://source.unsplash.com/600x400/?library" class="card-img-top" alt="Fasilitas">
                <div class="card-body">
                    <h6 class="card-title fw-bold">Perpustakaan Terpadu</h6>
                    <p class="card-text text-muted small">Koleksi ribuan buku fisik maupun literatur digital.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
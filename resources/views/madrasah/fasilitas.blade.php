@extends('layouts.app')

@section('title', 'Fasilitas Madrasah — Educate')

@section('content')
<div class="page-padded-top bg-light pb-5" style="min-height: 100vh;">
    <div class="container py-5">
        <div class="text-center mb-5">
            <span class="badge bg-info-subtle text-info px-3 py-2 rounded-pill shadow-sm mb-3 border border-info-subtle">Informasi Sarana</span>
            <h2 class="fw-bold display-6" style="letter-spacing:-1px;">Fasilitas Lengkap & Modern</h2>
            <p class="text-muted mx-auto mt-2" style="max-width: 600px;">Kami menyediakan berbagai sarana dan prasarana terbaik berbasis teknologi untuk menunjang kegiatan eksplorasi akademik dan non-akademik siswa.</p>
        </div>

        <div class="row g-4 mt-2">
            <!-- Lab IPA -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-custom hover-lift">
                    <div style="position:relative;">
                        <img src="https://images.unsplash.com/photo-1581093588401-fbb62a02f120?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             class="card-img-top" alt="Laboratorium IPA" style="height: 220px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3 bg-white p-2 rounded-3 shadow-sm text-info">
                            <i class="bi bi-droplet-half fs-5"></i>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold text-dark">Laboratorium Sains Terpadu</h5>
                        <p class="card-text text-muted font-light" style="font-size: 0.95rem;">Dilengkapi dengan alat peraga modern dan reagen lengkap untuk praktikum Fisika, Kimia, dan Biologi secara komprehensif didampingi harfiah ahli.</p>
                    </div>
                </div>
            </div>

            <!-- Lab Komputer -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-custom hover-lift">
                    <div style="position:relative;">
                        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             class="card-img-top" alt="Laboratorium Komputer" style="height: 220px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3 bg-white p-2 rounded-3 shadow-sm text-primary">
                            <i class="bi bi-pc-display fs-5"></i>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold text-dark">Lab. Komputer & TI</h5>
                        <p class="card-text text-muted font-light" style="font-size: 0.95rem;">PC berspesifikasi terkini, full AC, dan akses internet berkecepatan tinggi untuk menunjang pembelajaran IT, coding, dan ujian berbasis komputer (CBT).</p>
                    </div>
                </div>
            </div>

            <!-- Olahraga -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-custom hover-lift">
                    <div style="position:relative;">
                        <img src="https://images.unsplash.com/photo-1552667466-07770ae110d0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             class="card-img-top" alt="Fasilitas Olahraga" style="height: 220px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3 bg-white p-2 rounded-3 shadow-sm text-success">
                            <i class="bi bi-dribbble fs-5"></i>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold text-dark">Sarana Olahraga Terpadu</h5>
                        <p class="card-text text-muted font-light" style="font-size: 0.95rem;">Tersedia lapangan futsal, bola voli, badminton, dan basket indoor/outdoor untuk mengasah minat, bakat, serta kebugaran jasmani siswa-siswi.</p>
                    </div>
                </div>
            </div>
            
            <!-- Perpustakaan -->
             <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-custom hover-lift">
                    <div style="position:relative;">
                        <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             class="card-img-top" alt="Perpustakaan" style="height: 220px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3 bg-white p-2 rounded-3 shadow-sm text-warning">
                            <i class="bi bi-book fs-5"></i>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold text-dark">Perpustakaan Digital</h5>
                        <p class="card-text text-muted font-light" style="font-size: 0.95rem;">Ribuan koleksi buku fisik dan e-book yang dapat diakses, area baca yang tenang, ber-AC, dengan sistem peminjaman yang sudah full komputerisasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }
</style>
@endsection
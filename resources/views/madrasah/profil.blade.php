@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row align-items-center flex-row-reverse">
        <div class="col-lg-6 mb-4 mb-lg-0 ps-lg-5">
            <img src="https://source.unsplash.com/800x600/?students,study" class="img-fluid rounded shadow-lg" alt="Profil Madrasah">
        </div>
        <div class="col-lg-6 pe-lg-5">
            <h6 class="text-primary text-uppercase fw-bold">Profil Madrasah</h6>
            <h2 class="display-6 fw-bold mb-4">Mencetak Generasi Cerdas & Beradab</h2>
            <p class="lead text-muted">Madrasah kami memadukan kurikulum nasional yang komprehensif dengan pendidikan karakter islami yang kuat.</p>
            <p>Dengan tenaga pendidik bersertifikasi dan lingkungan belajar yang interaktif, kami membekali siswa dengan kompetensi sains, teknologi, serta pemahaman agama yang inklusif untuk menyambut masa depan.</p>
            
            <div class="row mt-5">
                <div class="col-6 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-book display-6 text-primary me-3"></i>
                        <div>
                            <h5 class="fw-bold mb-0">Kurikulum</h5>
                            <small class="text-muted">Terintegrasi</small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-trophy display-6 text-primary me-3"></i>
                        <div>
                            <h5 class="fw-bold mb-0">Akreditasi A</h5>
                            <small class="text-muted">Standar Nasional</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
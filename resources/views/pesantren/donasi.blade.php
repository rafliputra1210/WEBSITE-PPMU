@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Investasi Akhirat</h2>
        <p class="text-muted">Mari bersama membangun fasilitas pendidikan yang lebih baik.</p>
    </div>

    <div class="row mb-5">
        <div class="col-md-6 offset-md-3">
            <div class="card bg-light border-0 shadow-sm text-center p-4">
                <h5 class="text-success mb-3">Target Pembangunan Masjid Pesantren</h5>
                <h3 class="fw-bold">Rp 150.000.000</h3>
                <p class="text-muted small">Terkumpul dari target Rp 500.000.000</p>
                <div class="progress" style="height: 25px;">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%;">30%</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="mb-4 text-center">Formulir Donasi</h5>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Nama Hamba Allah</label>
                        <input type="text" class="form-control" placeholder="Boleh dikosongkan (Hamba Allah)">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nominal Donasi (Rp)</label>
                        <input type="number" class="form-control" placeholder="Contoh: 100000">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Doa / Pesan</label>
                        <textarea class="form-control" rows="3" placeholder="Tuliskan doa Anda..."></textarea>
                    </div>
                    <button class="btn btn-success w-100">Lanjutkan Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
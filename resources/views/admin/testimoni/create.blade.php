@extends('layouts.admin')
@section('title_page', 'Tambah Testimoni')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        @if ($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.testimoni.store') }}" method="POST">
            @csrf

            <div class="row g-4">
                {{-- Kolom Kiri --}}
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Pemberi Testimoni <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control rounded-3 @error('nama') is-invalid @enderror"
                               value="{{ old('nama') }}" placeholder="Contoh: Bapak Hendra S." required>
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Peran / Keterangan</label>
                        <input type="text" name="peran" class="form-control rounded-3"
                               value="{{ old('peran') }}" placeholder="Contoh: Wali Santri — Kelas 5 MI">
                        <div class="form-text">Tampil sebagai keterangan di bawah nama.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi Testimoni <span class="text-danger">*</span></label>
                        <textarea name="isi" rows="5" class="form-control rounded-3 @error('isi') is-invalid @enderror"
                                  placeholder="Tulis testimoni..." required>{{ old('isi') }}</textarea>
                        @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Inisial (Huruf Avatar)</label>
                        <input type="text" name="inisial" class="form-control rounded-3"
                               value="{{ old('inisial') }}" placeholder="B" maxlength="5">
                        <div class="form-text">Jika kosong, diambil dari huruf pertama nama.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Warna Avatar</label>
                        <select name="warna_avatar" class="form-select rounded-3">
                            <option value="linear-gradient(135deg,#10b981,#059669)" {{ old('warna_avatar') == 'linear-gradient(135deg,#10b981,#059669)' ? 'selected' : '' }}>🟢 Hijau</option>
                            <option value="linear-gradient(135deg,#3b82f6,#2563eb)" {{ old('warna_avatar') == 'linear-gradient(135deg,#3b82f6,#2563eb)' ? 'selected' : '' }}>🔵 Biru</option>
                            <option value="linear-gradient(135deg,#f59e0b,#ef4444)" {{ old('warna_avatar') == 'linear-gradient(135deg,#f59e0b,#ef4444)' ? 'selected' : '' }}>🟠 Oranye-Merah</option>
                            <option value="linear-gradient(135deg,#8b5cf6,#6d28d9)" {{ old('warna_avatar') == 'linear-gradient(135deg,#8b5cf6,#6d28d9)' ? 'selected' : '' }}>🟣 Ungu</option>
                            <option value="linear-gradient(135deg,#ec4899,#be185d)" {{ old('warna_avatar') == 'linear-gradient(135deg,#ec4899,#be185d)' ? 'selected' : '' }}>🩷 Pink</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Rating Bintang <span class="text-danger">*</span></label>
                        <select name="bintang" class="form-select rounded-3" required>
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('bintang', 5) == $i ? 'selected' : '' }}>
                                    {{ str_repeat('★', $i) . str_repeat('☆', 5 - $i) }} ({{ $i }})
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-4 form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                               id="isActive" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="isActive">Tampilkan di Website</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded-3 fw-semibold py-2">
                            <i class="bi bi-save me-2"></i>Simpan Testimoni
                        </button>
                        <a href="{{ route('admin.testimoni.index') }}" class="btn btn-light rounded-3 fw-semibold py-2">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

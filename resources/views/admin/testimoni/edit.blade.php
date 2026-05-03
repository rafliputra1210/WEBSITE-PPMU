@extends('layouts.admin')
@section('title_page', 'Edit Testimoni')

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

        <form action="{{ route('admin.testimoni.update', $testimoni->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">
                {{-- Kolom Kiri --}}
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Pemberi Testimoni <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control rounded-3 @error('nama') is-invalid @enderror"
                               value="{{ old('nama', $testimoni->nama) }}" required>
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Peran / Keterangan</label>
                        <input type="text" name="peran" class="form-control rounded-3"
                               value="{{ old('peran', $testimoni->peran) }}"
                               placeholder="Contoh: Wali Santri — Kelas 5 MI">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi Testimoni <span class="text-danger">*</span></label>
                        <textarea name="isi" rows="5" class="form-control rounded-3 @error('isi') is-invalid @enderror"
                                  required>{{ old('isi', $testimoni->isi) }}</textarea>
                        @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Inisial (Huruf Avatar)</label>
                        <input type="text" name="inisial" class="form-control rounded-3"
                               value="{{ old('inisial', $testimoni->inisial) }}" maxlength="5">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Warna Avatar</label>
                        <select name="warna_avatar" class="form-select rounded-3">
                            @php
                                $colors = [
                                    'linear-gradient(135deg,#10b981,#059669)' => '🟢 Hijau',
                                    'linear-gradient(135deg,#3b82f6,#2563eb)' => '🔵 Biru',
                                    'linear-gradient(135deg,#f59e0b,#ef4444)' => '🟠 Oranye-Merah',
                                    'linear-gradient(135deg,#8b5cf6,#6d28d9)' => '🟣 Ungu',
                                    'linear-gradient(135deg,#ec4899,#be185d)' => '🩷 Pink',
                                ];
                            @endphp
                            @foreach($colors as $val => $label)
                                <option value="{{ $val }}" {{ old('warna_avatar', $testimoni->warna_avatar) == $val ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Rating Bintang <span class="text-danger">*</span></label>
                        <select name="bintang" class="form-select rounded-3" required>
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('bintang', $testimoni->bintang) == $i ? 'selected' : '' }}>
                                    {{ str_repeat('★', $i) . str_repeat('☆', 5 - $i) }} ({{ $i }})
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-4 form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                               id="isActive" value="1" {{ old('is_active', $testimoni->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="isActive">Tampilkan di Website</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded-3 fw-semibold py-2">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.testimoni.index') }}" class="btn btn-light rounded-3 fw-semibold py-2">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

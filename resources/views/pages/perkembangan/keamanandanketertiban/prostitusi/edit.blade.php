@extends('layouts.master')

@section('title', 'Edit Data Prostitusi')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Prostitusi
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.prostitusi.update', $prostitusi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           id="tanggal" name="tanggal"
                           value="{{ old('tanggal', \Carbon\Carbon::parse($prostitusi->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka & radio sesuai kolom di migration --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Penduduk Pramu Nikmat <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_penduduk_pramu_nikmat" min="0"
                           class="form-control @error('jumlah_penduduk_pramu_nikmat') is-invalid @enderror"
                           value="{{ old('jumlah_penduduk_pramu_nikmat', $prostitusi->jumlah_penduduk_pramu_nikmat) }}" required>
                    @error('jumlah_penduduk_pramu_nikmat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Lokalisasi Prostitusi <span class="text-danger">*</span>
                    </label>
                    <div class="form-check">
                        <input class="form-check-input @error('lokalisasi_prostitusi') is-invalid @enderror" type="radio"
                               name="lokalisasi_prostitusi" id="lokalisasi_ada" value="Ada"
                               {{ old('lokalisasi_prostitusi', $prostitusi->lokalisasi_prostitusi) == 'Ada' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="lokalisasi_ada">Ada</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('lokalisasi_prostitusi') is-invalid @enderror" type="radio"
                               name="lokalisasi_prostitusi" id="lokalisasi_tidak" value="Tidak Ada"
                               {{ old('lokalisasi_prostitusi', $prostitusi->lokalisasi_prostitusi) == 'Tidak Ada' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="lokalisasi_tidak">Tidak Ada</label>
                    </div>
                    @error('lokalisasi_prostitusi')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Tempat Pramu Nikmat <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_tempat_pramunikmat" min="0"
                           class="form-control @error('jumlah_tempat_pramunikmat') is-invalid @enderror"
                           value="{{ old('jumlah_tempat_pramunikmat', $prostitusi->jumlah_tempat_pramunikmat) }}" required>
                    @error('jumlah_tempat_pramunikmat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Prostitusi <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_prostitusi" min="0"
                           class="form-control @error('jumlah_kasus_prostitusi') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_prostitusi', $prostitusi->jumlah_kasus_prostitusi) }}" required>
                    @error('jumlah_kasus_prostitusi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Pembinaan Pelaku <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_pembinaan_pelaku" min="0"
                           class="form-control @error('jumlah_pembinaan_pelaku') is-invalid @enderror"
                           value="{{ old('jumlah_pembinaan_pelaku', $prostitusi->jumlah_pembinaan_pelaku) }}" required>
                    @error('jumlah_pembinaan_pelaku')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Penertiban Tempat <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_penertiban_tempat" min="0"
                           class="form-control @error('jumlah_penertiban_tempat') is-invalid @enderror"
                           value="{{ old('jumlah_penertiban_tempat', $prostitusi->jumlah_penertiban_tempat) }}" required>
                    @error('jumlah_penertiban_tempat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.keamanandanketertiban.prostitusi.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Tambah Data Prasarana Air Bersih')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2"></i>
            Tambah Data Prasarana Air Bersih
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label fw-semibold">
                            <i class="fas fa-calendar me-1"></i>
                            Tanggal <span class="text-danger">*</span>
                        </label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                               id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mb-3">Data Sumber Air</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sumur_pompa" class="form-label fw-semibold">
                            <i class="fas fa-industry me-1"></i>
                            Sumur Pompa (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('sumur_pompa') is-invalid @enderror"
                               id="sumur_pompa" name="sumur_pompa" value="{{ old('sumur_pompa', 0) }}"
                               min="0" required>
                        @error('sumur_pompa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sumur_gali" class="form-label fw-semibold">
                            <i class="fas fa-water me-1"></i>
                            Sumur Gali (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('sumur_gali') is-invalid @enderror"
                               id="sumur_gali" name="sumur_gali" value="{{ old('sumur_gali', 0) }}"
                               min="0" required>
                        @error('sumur_gali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="mata_air" class="form-label fw-semibold">
                            <i class="fas fa-tint me-1"></i>
                            Mata Air (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('mata_air') is-invalid @enderror"
                               id="mata_air" name="mata_air" value="{{ old('mata_air', 0) }}"
                               min="0" required>
                        @error('mata_air')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="embung" class="form-label fw-semibold">
                            <i class="fas fa-lake me-1"></i>
                            Embung (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('embung') is-invalid @enderror"
                               id="embung" name="embung" value="{{ old('embung', 0) }}"
                               min="0" required>
                        @error('embung')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mb-3">Fasilitas Distribusi Air</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hidran_umum" class="form-label fw-semibold">
                            <i class="fas fa-faucet me-1"></i>
                            Hidran Umum (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('hidran_umum') is-invalid @enderror"
                               id="hidran_umum" name="hidran_umum" value="{{ old('hidran_umum', 0) }}"
                               min="0" required>
                        @error('hidran_umum')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tangki_air_bersih" class="form-label fw-semibold">
                            <i class="fas fa-battery-full me-1"></i>
                            Tangki Air Bersih (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('tangki_air_bersih') is-invalid @enderror"
                               id="tangki_air_bersih" name="tangki_air_bersih" value="{{ old('tangki_air_bersih', 0) }}"
                               min="0" required>
                        @error('tangki_air_bersih')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mb-3">Penampungan dan Pengolahan Air</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="penampung_air_hujan" class="form-label fw-semibold">
                            <i class="fas fa-cloud-rain me-1"></i>
                            Penampung Air Hujan (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('penampung_air_hujan') is-invalid @enderror"
                               id="penampung_air_hujan" name="penampung_air_hujan" value="{{ old('penampung_air_hujan', 0) }}"
                               min="0" required>
                        @error('penampung_air_hujan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="bangunan_pengolahan_air" class="form-label fw-semibold">
                            <i class="fas fa-cogs me-1"></i>
                            Bangunan Pengolahan Air (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('bangunan_pengolahan_air') is-invalid @enderror"
                               id="bangunan_pengolahan_air" name="bangunan_pengolahan_air" value="{{ old('bangunan_pengolahan_air', 0) }}"
                               min="0" required>
                        @error('bangunan_pengolahan_air')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Field dengan tanda <span class="text-danger">*</span> wajib diisi
                        </small>

                        <div class="btn-group gap-2">
                            <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.index') }}"
                                class="btn btn-outline-secondary rounded">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary rounded">
                                Simpan Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
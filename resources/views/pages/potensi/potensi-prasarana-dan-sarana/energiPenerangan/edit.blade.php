@extends('layouts.master')

@section('title', 'Edit Data Energi Penerangan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-edit me-2"></i>
                            <h4 class="card-title mb-0">Edit Data Energi Penerangan</h4>
                        </div>
                    </div>
                </div>

                <form action="{{ route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.update', $energiPenerangan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Dasar -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Informasi Dasar
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tanggal" class="form-label fw-semibold">
                                            <i class="fas fa-calendar text-muted me-1"></i>
                                            Tanggal <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                               id="tanggal" name="tanggal" value="{{ old('tanggal', $energiPenerangan->tanggal->format('Y-m-d')) }}" required>
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sumber Listrik -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-plug text-primary me-2"></i>
                                Sumber Listrik
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="listrik_pln" class="form-label fw-semibold">
                                            <i class="fas fa-plug me-1"></i>
                                            Listrik PLN (unit) <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control @error('listrik_pln') is-invalid @enderror"
                                               id="listrik_pln" name="listrik_pln" value="{{ old('listrik_pln', $energiPenerangan->listrik_pln) }}"
                                               min="0" required>
                                        @error('listrik_pln')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="diesel_umum" class="form-label fw-semibold">
                                            <i class="fas fa-gas-pump me-1"></i>
                                            Diesel Umum (unit) <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control @error('diesel_umum') is-invalid @enderror"
                                               id="diesel_umum" name="diesel_umum" value="{{ old('diesel_umum', $energiPenerangan->diesel_umum) }}"
                                               min="0" required>
                                        @error('diesel_umum')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="genset_pribadi" class="form-label fw-semibold">
                                            <i class="fas fa-battery-full me-1"></i>
                                            Genset Pribadi (unit) <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control @error('genset_pribadi') is-invalid @enderror"
                                               id="genset_pribadi" name="genset_pribadi" value="{{ old('genset_pribadi', $energiPenerangan->genset_pribadi) }}"
                                               min="0" required>
                                        @error('genset_pribadi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tanpa_penerangan" class="form-label fw-semibold">
                                            <i class="fas fa-moon me-1"></i>
                                            Tanpa Penerangan (unit) <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control @error('tanpa_penerangan') is-invalid @enderror"
                                               id="tanpa_penerangan" name="tanpa_penerangan" value="{{ old('tanpa_penerangan', $energiPenerangan->tanpa_penerangan) }}"
                                               min="0" required>
                                        @error('tanpa_penerangan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sumber Energi Tradisional -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-tree text-primary me-2"></i>
                                Sumber Energi Tradisional
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="lampu_minyak" class="form-label fw-semibold">
                                            <i class="fas fa-oil-can me-1"></i>
                                            Lampu Minyak (unit) <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control @error('lampu_minyak') is-invalid @enderror"
                                               id="lampu_minyak" name="lampu_minyak" value="{{ old('lampu_minyak', $energiPenerangan->lampu_minyak) }}"
                                               min="0" required>
                                        @error('lampu_minyak')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="kayu_bakar" class="form-label fw-semibold">
                                            <i class="fas fa-tree me-1"></i>
                                            Kayu Bakar (unit) <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control @error('kayu_bakar') is-invalid @enderror"
                                               id="kayu_bakar" name="kayu_bakar" value="{{ old('kayu_bakar', $energiPenerangan->kayu_bakar) }}"
                                               min="0" required>
                                        @error('kayu_bakar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="batu_bara" class="form-label fw-semibold">
                                            <i class="fas fa-cubes me-1"></i>
                                            Batu Bara (unit) <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control @error('batu_bara') is-invalid @enderror"
                                               id="batu_bara" name="batu_bara" value="{{ old('batu_bara', $energiPenerangan->batu_bara) }}"
                                               min="0" required>
                                        @error('batu_bara')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
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
                                    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.index') }}"
                                        class="btn btn-outline-secondary rounded">
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary rounded">
                                        Update Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

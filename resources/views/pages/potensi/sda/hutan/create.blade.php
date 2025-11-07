@extends('layouts.master')

@section('title', 'Tambah Data Kepemilikan Lahan Hutan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Kepemilikan Lahan Hutan
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('hutan.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Data Kepemilikan Lahan Hutan</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="milik_negara" class="form-label">Milik Negara (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="milik_negara"
                                name="milik_negara" value="{{ old('milik_negara', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="milik_adat_ulayat" class="form-label">Milik Adat/Ulayat (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="milik_adat_ulayat"
                                name="milik_adat_ulayat" value="{{ old('milik_adat_ulayat', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="perhutani_instansi_sektoral" class="form-label">Perhutani/Instansi Sektoral (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="perhutani_instansi_sektoral"
                                name="perhutani_instansi_sektoral" value="{{ old('perhutani_instansi_sektoral', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="milik_masyarakat_perorangan" class="form-label">Milik Masyarakat Perorangan (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="milik_masyarakat_perorangan"
                                name="milik_masyarakat_perorangan" value="{{ old('milik_masyarakat_perorangan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_hutan" class="form-label">Luas Hutan (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="luas_hutan"
                                name="luas_hutan" value="{{ old('luas_hutan', 0) }}">
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
                                <a href="{{ route('hutan.index') }}" class="btn btn-outline-secondary rounded">
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

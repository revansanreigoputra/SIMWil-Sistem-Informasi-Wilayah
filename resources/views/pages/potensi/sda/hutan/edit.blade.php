@extends('layouts.master')

@section('title', 'Edit Data Kepemilikan Lahan Hutan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Kepemilikan Lahan Hutan
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('hutan.update', $hutan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ old('tanggal', $hutan->tanggal->format('Y-m-d')) }}" required>
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
                                name="milik_negara" value="{{ old('milik_negara', $hutan->milik_negara) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="milik_adat_ulayat" class="form-label">Milik Adat/Ulayat (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="milik_adat_ulayat"
                                name="milik_adat_ulayat" value="{{ old('milik_adat_ulayat', $hutan->milik_adat_ulayat) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="perhutani_instansi_sektoral" class="form-label">Perhutani/Instansi Sektoral (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="perhutani_instansi_sektoral"
                                name="perhutani_instansi_sektoral" value="{{ old('perhutani_instansi_sektoral', $hutan->perhutani_instansi_sektoral) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="milik_masyarakat_perorangan" class="form-label">Milik Masyarakat Perorangan (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="milik_masyarakat_perorangan"
                                name="milik_masyarakat_perorangan" value="{{ old('milik_masyarakat_perorangan', $hutan->milik_masyarakat_perorangan) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_hutan" class="form-label">Luas Hutan (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="luas_hutan"
                                name="luas_hutan" value="{{ old('luas_hutan', $hutan->luas_hutan) }}">
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
                                    <i class="fas fa-save me-1"></i>
                                    Update Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

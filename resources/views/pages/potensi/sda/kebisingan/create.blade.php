@extends('layouts.master')

@section('title', 'Tambah Data Kebisingan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Kebisingan
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('kebisingan.store') }}" method="POST">
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

                <div class="mb-3">
                    <label for="tingkat_kebisingan" class="form-label fw-semibold">
                        <i class="fas fa-volume-up me-1"></i>
                        Tingkat Kebisingan <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('tingkat_kebisingan') is-invalid @enderror" id="tingkat_kebisingan"
                        name="tingkat_kebisingan" required>
                        <option value="">Pilih Tingkat Kebisingan</option>
                        <option value="ringan" {{ old('tingkat_kebisingan') == 'ringan' ? 'selected' : '' }}>Ringan</option>
                        <option value="sedang" {{ old('tingkat_kebisingan') == 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="tinggi" {{ old('tingkat_kebisingan') == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                    </select>
                    @error('tingkat_kebisingan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sumber_kebisingan" class="form-label fw-semibold">
                        <i class="fas fa-microphone me-1"></i>
                        Sumber Kebisingan <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('sumber_kebisingan') is-invalid @enderror"
                        id="sumber_kebisingan" name="sumber_kebisingan" value="{{ old('sumber_kebisingan') }}" required>
                    @error('sumber_kebisingan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ekses_dampak_kebisingan" class="form-label fw-semibold">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Ekses Dampak Kebisingan <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('ekses_dampak_kebisingan') is-invalid @enderror"
                        id="ekses_dampak_kebisingan" name="ekses_dampak_kebisingan" required>
                        <option value="">Pilih Ekses Dampak Kebisingan</option>
                        <option value="ya" {{ old('ekses_dampak_kebisingan') == 'ya' ? 'selected' : '' }}>Ya</option>
                        <option value="tidak" {{ old('ekses_dampak_kebisingan') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                    </select>
                    @error('ekses_dampak_kebisingan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="efek_terhadap_penduduk" class="form-label fw-semibold">
                        <i class="fas fa-users me-1"></i>
                        Efek Terhadap Penduduk
                    </label>
                    <textarea class="form-control @error('efek_terhadap_penduduk') is-invalid @enderror" id="efek_terhadap_penduduk"
                        name="efek_terhadap_penduduk" rows="3">{{ old('efek_terhadap_penduduk') }}</textarea>
                    @error('efek_terhadap_penduduk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="my-4">

                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Field dengan tanda <span class="text-danger">*</span> wajib diisi
                            </small>

                            <div class="btn-group gap-2">
                                <a href="{{ route('kebisingan.index') }}"
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

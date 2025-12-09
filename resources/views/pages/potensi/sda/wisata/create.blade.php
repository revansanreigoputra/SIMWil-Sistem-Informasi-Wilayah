@extends('layouts.master')

@section('title', 'Tambah Data Wisata')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Wisata
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('wisata.store') }}" method="POST">
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
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="area_wisata_id" class="form-label fw-semibold">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                Area Wisata <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('area_wisata_id') is-invalid @enderror" id="area_wisata_id"
                                name="area_wisata_id" required>
                                <option value="">-- Pilih Area Wisata --</option>
                                @foreach ($areaWisatas as $area)
                                    <option value="{{ $area->id }}"
                                        {{ old('area_wisata_id') == $area->id ? 'selected' : '' }}>
                                        {{ $area->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('area_wisata_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keberadaan" class="form-label fw-semibold">
                                <i class="fas fa-check-square me-1"></i>
                                Keberadaan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('keberadaan') is-invalid @enderror" id="keberadaan"
                                name="keberadaan" required>
                                <option value="">-- Pilih Keberadaan --</option>
                                <option value="ada" {{ old('keberadaan') == 'ada' ? 'selected' : '' }}>Ada</option>
                                <option value="tidak ada" {{ old('keberadaan') == 'tidak ada' ? 'selected' : '' }}>Tidak Ada
                                </option>
                            </select>
                            @error('keberadaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="luas_m2" class="form-label fw-semibold">
                                <i class="fas fa-ruler me-1"></i>
                                Luas (m²) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="0.01" class="form-control @error('luas_m2') is-invalid @enderror"
                                id="luas_m2" name="luas_m2" value="{{ old('luas_m2', 0) }}" min="0" required>
                            @error('luas_m2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tingkat_pemanfaatan" class="form-label fw-semibold">
                                <i class="fas fa-chart-bar me-1"></i>
                                Tingkat Pemanfaatan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('tingkat_pemanfaatan') is-invalid @enderror"
                                id="tingkat_pemanfaatan" name="tingkat_pemanfaatan" required>
                                <option value="">-- Pilih Tingkat Pemanfaatan --</option>
                                <option value="aktif" {{ old('tingkat_pemanfaatan') == 'aktif' ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="pasif" {{ old('tingkat_pemanfaatan') == 'pasif' ? 'selected' : '' }}>Pasif
                                </option>
                            </select>
                            @error('tingkat_pemanfaatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>
                        Simpan
                    </button>
                    <a href="{{ route('wisata.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

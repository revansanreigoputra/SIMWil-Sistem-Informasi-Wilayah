@extends('layouts.master')

@section('title', 'Edit Data Kualitas Air Minum')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Kualitas Air Minum
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('kualitas-air-minum.update', $kualitasAirMinum->id) }}" method="POST">
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
                                name="tanggal" value="{{ old('tanggal', $kualitasAirMinum->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_air_minum_id" class="form-label fw-semibold">
                                <i class="fas fa-water me-1"></i>
                                Jenis Air Minum <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_air_minum_id') is-invalid @enderror" id="jenis_air_minum_id"
                                name="jenis_air_minum_id" required>
                                <option value="">Pilih Jenis Air Minum</option>
                                @foreach ($jenisAirMinums as $jenis)
                                    <option value="{{ $jenis->id }}" {{ old('jenis_air_minum_id', $kualitasAirMinum->jenis_air_minum_id) == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_air_minum_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Baik <span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="baik" id="baik_ya" value="ya" {{ old('baik', $kualitasAirMinum->baik) == 'ya' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="baik_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="baik" id="baik_tidak" value="tidak" {{ old('baik', $kualitasAirMinum->baik) == 'tidak' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="baik_tidak">Tidak</label>
                                </div>
                            </div>
                            @error('baik')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Berbau <span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="berbau" id="berbau_ya" value="ya" {{ old('berbau', $kualitasAirMinum->berbau) == 'ya' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="berbau_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="berbau" id="berbau_tidak" value="tidak" {{ old('berbau', $kualitasAirMinum->berbau) == 'tidak' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="berbau_tidak">Tidak</label>
                                </div>
                            </div>
                            @error('berbau')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Berwarna <span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="berwarna" id="berwarna_ya" value="ya" {{ old('berwarna', $kualitasAirMinum->berwarna) == 'ya' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="berwarna_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="berwarna" id="berwarna_tidak" value="tidak" {{ old('berwarna', $kualitasAirMinum->berwarna) == 'tidak' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="berwarna_tidak">Tidak</label>
                                </div>
                            </div>
                            @error('berwarna')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Berasa <span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="berasa" id="berasa_ya" value="ya" {{ old('berasa', $kualitasAirMinum->berasa) == 'ya' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="berasa_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="berasa" id="berasa_tidak" value="tidak" {{ old('berasa', $kualitasAirMinum->berasa) == 'tidak' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="berasa_tidak">Tidak</label>
                                </div>
                            </div>
                            @error('berasa')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
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
                                <a href="{{ route('kualitas-air-minum.index') }}"
                                    class="btn btn-outline-secondary rounded">
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

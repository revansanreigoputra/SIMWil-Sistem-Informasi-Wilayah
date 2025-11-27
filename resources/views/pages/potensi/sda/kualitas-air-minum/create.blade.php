@extends('layouts.master')

@section('title', 'Tambah Data Kualitas Air Minum')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Kualitas Air Minum
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('kualitas-air-minum.store') }}" method="POST">
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
                            <label for="jenis_air_minum_id" class="form-label fw-semibold">
                                <i class="fas fa-water me-1"></i>
                                Jenis Air Minum <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_air_minum_id') is-invalid @enderror" id="jenis_air_minum_id"
                                name="jenis_air_minum_id" required>
                                <option value="">Pilih Jenis Air Minum</option>
                                @foreach ($jenisAirMinums as $jenis)
                                    <option value="{{ $jenis->id }}" {{ old('jenis_air_minum_id') == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_air_minum_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="baik" class="form-label fw-semibold">
                                <i class="fas fa-check-circle me-1"></i>
                                Baik <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('baik') is-invalid @enderror" id="baik" name="baik" required>
                                <option value="">Pilih</option>
                                <option value="ya" {{ old('baik') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('baik') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('baik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="berbau" class="form-label fw-semibold">
                                <i class="fas fa-smell me-1"></i>
                                Berbau <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('berbau') is-invalid @enderror" id="berbau" name="berbau" required>
                                <option value="">Pilih</option>
                                <option value="ya" {{ old('berbau') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('berbau') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('berbau')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="berwarna" class="form-label fw-semibold">
                                <i class="fas fa-palette me-1"></i>
                                Berwarna <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('berwarna') is-invalid @enderror" id="berwarna" name="berwarna" required>
                                <option value="">Pilih</option>
                                <option value="ya" {{ old('berwarna') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('berwarna') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('berwarna')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="berasa" class="form-label fw-semibold">
                                <i class="fas fa-water me-1"></i>
                                Berasa <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('berasa') is-invalid @enderror" id="berasa" name="berasa" required>
                                <option value="">Pilih</option>
                                <option value="ya" {{ old('berasa') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('berasa') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('berasa')
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
                                <a href="{{ route('kualitas-air-minum.index') }}"
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

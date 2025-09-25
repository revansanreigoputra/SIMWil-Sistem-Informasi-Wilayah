@extends('layouts.master')

@section('title', 'Tambah Data Prasarana Sanitasi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2"></i>
            Tambah Data Prasarana Sanitasi
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.store') }}" method="POST">
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

            <h6 class="fw-bold text-primary mb-3">Data Prasarana Sanitasi</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sumur_resapan_air" class="form-label fw-semibold">
                            <i class="fas fa-water me-1"></i>
                            Sumur Resapan Air (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('sumur_resapan_air') is-invalid @enderror"
                            id="sumur_resapan_air" name="sumur_resapan_air" value="{{ old('sumur_resapan_air', 0) }}"
                            min="0" required>
                        @error('sumur_resapan_air')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="mck_umum" class="form-label fw-semibold">
                            <i class="fas fa-restroom me-1"></i>
                            MCK Umum (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('mck_umum') is-invalid @enderror"
                            id="mck_umum" name="mck_umum" value="{{ old('mck_umum', 0) }}"
                            min="0" required>
                        @error('mck_umum')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jamban_keluarga" class="form-label fw-semibold">
                            <i class="fas fa-home me-1"></i>
                            Jamban Keluarga (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('jamban_keluarga') is-invalid @enderror"
                            id="jamban_keluarga" name="jamban_keluarga" value="{{ old('jamban_keluarga', 0) }}"
                            min="0" required>
                        @error('jamban_keluarga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mb-3">Data Drainase</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="saluran_drainase" class="form-label fw-semibold">
                            <i class="fas fa-stream me-1"></i>
                            Saluran Drainase <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('saluran_drainase') is-invalid @enderror"
                            id="saluran_drainase" name="saluran_drainase" required>
                            <option value="">Pilih Saluran Drainase</option>
                            @foreach($saluranDrainaseOptions as $value => $label)
                                <option value="{{ $value }}" {{ old('saluran_drainase') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('saluran_drainase')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kondisi_saluran" class="form-label fw-semibold">
                            <i class="fas fa-tools me-1"></i>
                            Kondisi Saluran <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('kondisi_saluran') is-invalid @enderror"
                            id="kondisi_saluran" name="kondisi_saluran" required>
                            <option value="">Pilih Kondisi Saluran</option>
                            @foreach($kondisiSaluranOptions as $value => $label)
                                <option value="{{ $value }}" {{ old('kondisi_saluran') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('kondisi_saluran')
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
                            <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.index') }}"
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
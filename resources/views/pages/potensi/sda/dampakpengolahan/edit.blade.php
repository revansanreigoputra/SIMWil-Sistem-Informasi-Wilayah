@extends('layouts.master')

@section('title', 'Edit Data Dampak Pengolahan Hutan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Dampak Pengolahan Hutan
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('dampakpengolahan.update', $dampakpengolahan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal"
                                value="{{ old('tanggal', $dampakpengolahan->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_dampak_id" class="form-label fw-semibold">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                Jenis Dampak <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_dampak_id') is-invalid @enderror"
                                id="jenis_dampak_id" name="jenis_dampak_id" required>
                                <option value="" disabled>Pilih Jenis Dampak</option>
                                @foreach ($jenisDampaks as $jenis)
                                    <option value="{{ $jenis->id }}"
                                        {{ old('jenis_dampak_id', $dampakpengolahan->jenis_dampak_id) == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_dampak_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label fw-semibold">
                                <i class="fas fa-info-circle me-1"></i>
                                Keterangan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('keterangan') is-invalid @enderror" id="keterangan"
                                name="keterangan" required>
                                <option value="Ada" {{ old('keterangan', $dampakpengolahan->keterangan) == 'Ada' ? 'selected' : '' }}>Ada</option>
                                <option value="Tidak Ada" {{ old('keterangan', $dampakpengolahan->keterangan) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                            </select>
                            @error('keterangan')
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
                                <a href="{{ route('dampakpengolahan.index') }}" class="btn btn-outline-secondary rounded">
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

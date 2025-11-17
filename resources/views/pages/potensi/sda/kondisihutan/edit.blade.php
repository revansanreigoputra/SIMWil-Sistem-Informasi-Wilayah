@extends('layouts.master')

@section('title', 'Edit Data Kondisi Hutan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Kondisi Hutan
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('kondisihutan.update', $kondisihutan->id) }}" method="POST">
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
                                value="{{ old('tanggal', $kondisihutan->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_hutan_id" class="form-label fw-semibold">
                                <i class="fas fa-seedling me-1"></i>
                                Jenis Hutan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_hutan_id') is-invalid @enderror"
                                id="jenis_hutan_id" name="jenis_hutan_id" required>
                                <option value="" disabled>Pilih Jenis Hutan</option>
                                @foreach ($jenisHutans as $jenis)
                                    <option value="{{ $jenis->id }}"
                                        {{ old('jenis_hutan_id', $kondisihutan->jenis_hutan_id) == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_hutan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Data Kondisi</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kondisi_baik" class="form-label">Kondisi Baik (ha)</label>
                            <input type="number" step="0.01" class="form-control @error('kondisi_baik') is-invalid @enderror" id="kondisi_baik"
                                name="kondisi_baik" value="{{ old('kondisi_baik', $kondisihutan->kondisi_baik) }}">
                             @error('kondisi_baik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kondisi_buruk" class="form-label">Kondisi Buruk (ha)</label>
                            <input type="number" step="0.01" class="form-control @error('kondisi_buruk') is-invalid @enderror" id="kondisi_buruk"
                                name="kondisi_buruk" value="{{ old('kondisi_buruk', $kondisihutan->kondisi_buruk) }}">
                             @error('kondisi_buruk')
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
                                <a href="{{ route('kondisihutan.index') }}" class="btn btn-outline-secondary rounded">
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

@extends('layouts.master')

@section('title', 'Edit Data Sumber Air Bersih')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Sumber Air Bersih
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('p-sumber-air-bersih.update', $pSumberAirBersih->id) }}" method="POST">
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
                                name="tanggal" value="{{ old('tanggal', $pSumberAirBersih->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sumber_air_bersih_id" class="form-label fw-semibold">
                                <i class="fas fa-water me-1"></i>
                                Jenis Sumber Air Bersih <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('sumber_air_bersih_id') is-invalid @enderror" id="sumber_air_bersih_id"
                                name="sumber_air_bersih_id" required>
                                <option value="">Pilih Jenis Sumber Air Bersih</option>
                                @foreach ($sumberAirBersihs as $sumber)
                                    <option value="{{ $sumber->id }}" {{ old('sumber_air_bersih_id', $pSumberAirBersih->sumber_air_bersih_id) == $sumber->id ? 'selected' : '' }}>
                                        {{ $sumber->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sumber_air_bersih_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label fw-semibold">
                                <i class="fas fa-calculator me-1"></i>
                                Jumlah <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                name="jumlah" value="{{ old('jumlah', $pSumberAirBersih->jumlah) }}" required>
                            @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pemanfaat" class="form-label fw-semibold">
                                <i class="fas fa-users me-1"></i>
                                Pemanfaat <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('pemanfaat') is-invalid @enderror" id="pemanfaat"
                                name="pemanfaat" value="{{ old('pemanfaat', $pSumberAirBersih->pemanfaat) }}" required>
                            @error('pemanfaat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kondisi" class="form-label fw-semibold">
                                <i class="fas fa-heartbeat me-1"></i>
                                Kondisi <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('kondisi') is-invalid @enderror" id="kondisi"
                                name="kondisi" required>
                                <option value="">Pilih Kondisi</option>
                                <option value="baik" {{ old('kondisi', $pSumberAirBersih->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
                                <option value="rusak" {{ old('kondisi', $pSumberAirBersih->kondisi) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                            </select>
                            @error('kondisi')
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
                                <a href="{{ route('p-sumber-air-bersih.index') }}"
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

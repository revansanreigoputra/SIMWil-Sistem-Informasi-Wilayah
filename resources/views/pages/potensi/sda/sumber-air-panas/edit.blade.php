@extends('layouts.master')

@section('title', 'Edit Data Sumber Air Panas')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Sumber Air Panas
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('p-sumber-air-panas.update', $pSumberAirPanas->id) }}" method="POST">
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
                                name="tanggal" value="{{ old('tanggal', $pSumberAirPanas->tanggal->format('Y-m-d')) }}"
                                required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_sumber_air_panas_id" class="form-label fw-semibold">
                                <i class="fas fa-water me-1"></i>
                                Jenis Sumber Air Panas <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_sumber_air_panas_id') is-invalid @enderror"
                                id="jenis_sumber_air_panas_id" name="jenis_sumber_air_panas_id" required>
                                <option value="">Pilih Jenis Sumber Air Panas</option>
                                @foreach ($sumberAirPanas as $sumber)
                                    <option value="{{ $sumber->id }}"
                                        {{ old('jenis_sumber_air_panas_id', $pSumberAirPanas->jenis_sumber_air_panas_id) == $sumber->id ? 'selected' : '' }}>
                                        {{ $sumber->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_sumber_air_panas_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_lokasi" class="form-label fw-semibold">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                Jumlah Lokasi <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1"
                                class="form-control @error('jumlah_lokasi') is-invalid @enderror" id="jumlah_lokasi"
                                name="jumlah_lokasi" value="{{ old('jumlah_lokasi', $pSumberAirPanas->jumlah_lokasi) }}"
                                required>
                            @error('jumlah_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @php
                        $pemanfaatan = is_string($pSumberAirPanas->pemanfaatan)
                            ? json_decode($pSumberAirPanas->pemanfaatan, true)
                            : $pSumberAirPanas->pemanfaatan;

                        $kepemilikan = is_string($pSumberAirPanas->kepemilikan)
                            ? json_decode($pSumberAirPanas->kepemilikan, true)
                            : $pSumberAirPanas->kepemilikan;
                    @endphp

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-hand-holding-water me-1"></i>
                                Pemanfaatan
                            </label>
                            <div>
                                @foreach ($pemanfaatanOptions as $option)
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="pemanfaatan[]" value="{{ $option }}"
                                            {{ in_array($option, old('pemanfaatan', $pemanfaatan ?? [])) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="pemanfaatan_{{ $option }}">
                                            {{ ucfirst($option) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('pemanfaatan')
                                <div class="text-danger fs-6 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-building me-1"></i>
                                Kepemilikan
                            </label>
                            <div>
                                @foreach ($kepemilikanOptions as $option)
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="kepemilikan[]" value="{{ $option }}"
                                            {{ in_array($option, old('kepemilikan', $kepemilikan ?? [])) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="kepemilikan_{{ $option }}">
                                            {{ ucfirst($option) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('kepemilikan')
                                <div class="text-danger fs-6 mt-1">{{ $message }}</div>
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
                                <a href="{{ route('p-sumber-air-panas.index') }}"
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

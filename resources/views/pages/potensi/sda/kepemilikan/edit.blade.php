@extends('layouts.master')

@section('title', 'Edit Data Kepemilikan Lahan Buah')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Kepemilikan Lahan Buah
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('kepemilikan.update', $kepemilikan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ old('tanggal', $kepemilikan->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Luas Lahan (Pohon)</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_kurang_10" class="form-label">Memiliki < 10</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_kurang_10" name="memiliki_kurang_10" value="{{ old('memiliki_kurang_10', $kepemilikan->memiliki_kurang_10) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_10_50" class="form-label">Memiliki 10-50</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_10_50" name="memiliki_10_50" value="{{ old('memiliki_10_50', $kepemilikan->memiliki_10_50) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_50_100" class="form-label">Memiliki 50-100</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_50_100" name="memiliki_50_100" value="{{ old('memiliki_50_100', $kepemilikan->memiliki_50_100) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_100_500" class="form-label">Memiliki 100-500</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_100_500" name="memiliki_100_500" value="{{ old('memiliki_100_500', $kepemilikan->memiliki_100_500) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_500_1000" class="form-label">Memiliki 500-1000</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_500_1000" name="memiliki_500_1000" value="{{ old('memiliki_500_1000', $kepemilikan->memiliki_500_1000) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_lebih_1000" class="form-label">Memiliki > 1000</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_lebih_1000" name="memiliki_lebih_1000" value="{{ old('memiliki_lebih_1000', $kepemilikan->memiliki_lebih_1000) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Jumlah Keluarga</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jumlah_keluarga_memiliki_tanah" class="form-label">Memiliki Tanah</label>
                            <input type="number" class="form-control" id="jumlah_keluarga_memiliki_tanah" name="jumlah_keluarga_memiliki_tanah" value="{{ old('jumlah_keluarga_memiliki_tanah', $kepemilikan->jumlah_keluarga_memiliki_tanah) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jumlah_keluarga_tidak_memiliki_tanah" class="form-label">Tidak Memiliki Tanah</label>
                            <input type="number" class="form-control" id="jumlah_keluarga_tidak_memiliki_tanah" name="jumlah_keluarga_tidak_memiliki_tanah" value="{{ old('jumlah_keluarga_tidak_memiliki_tanah', $kepemilikan->jumlah_keluarga_tidak_memiliki_tanah) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jumlah_keluarga_petani_buah" class="form-label">Petani Buah</label>
                            <input type="number" class="form-control" id="jumlah_keluarga_petani_buah" name="jumlah_keluarga_petani_buah" value="{{ old('jumlah_keluarga_petani_buah', $kepemilikan->jumlah_keluarga_petani_buah) }}">
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
                                <a href="{{ route('kepemilikan.index') }}"
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

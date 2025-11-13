@extends('layouts.master')

@section('title', 'Tambah Data Kepemilikan Lahan Kebun')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                Tambah Data Kepemilikan Lahan Kebun
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('kebun.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-12">
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

                <h6 class="fw-bold text-primary mt-4 mb-3">Luas Lahan Perkebunan (Ha)</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_kurang_dari_5_ha" class="form-label">Memiliki < 5 Ha</label>
                                    <input type="number" step="0.01" class="form-control" id="memiliki_kurang_dari_5_ha"
                                        name="memiliki_kurang_dari_5_ha" value="{{ old('memiliki_kurang_dari_5_ha', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_10_50_ha" class="form-label">Memiliki 10-50 Ha</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_10_50_ha"
                                name="memiliki_10_50_ha" value="{{ old('memiliki_10_50_ha', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_50_100_ha" class="form-label">Memiliki 50-100 Ha</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_50_100_ha"
                                name="memiliki_50_100_ha" value="{{ old('memiliki_50_100_ha', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_100_500_ha" class="form-label">Memiliki 100-500 Ha</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_100_500_ha"
                                name="memiliki_100_500_ha" value="{{ old('memiliki_100_500_ha', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_500_1000_ha" class="form-label">Memiliki 500-1000 Ha</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_500_1000_ha"
                                name="memiliki_500_1000_ha" value="{{ old('memiliki_500_1000_ha', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="memiliki_lebih_dari_1000_ha" class="form-label">Memiliki > 1000 Ha</label>
                            <input type="number" step="0.01" class="form-control" id="memiliki_lebih_dari_1000_ha"
                                name="memiliki_lebih_dari_1000_ha" value="{{ old('memiliki_lebih_dari_1000_ha', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Jumlah Keluarga</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jumlah_keluarga_memiliki_tanah" class="form-label">Memiliki Tanah</label>
                            <input type="number" class="form-control" id="jumlah_keluarga_memiliki_tanah"
                                name="jumlah_keluarga_memiliki_tanah"
                                value="{{ old('jumlah_keluarga_memiliki_tanah', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jumlah_keluarga_tidak_memiliki_tanah" class="form-label">Tidak Memiliki
                                Tanah</label>
                            <input type="number" class="form-control" id="jumlah_keluarga_tidak_memiliki_tanah"
                                name="jumlah_keluarga_tidak_memiliki_tanah"
                                value="{{ old('jumlah_keluarga_tidak_memiliki_tanah', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jumlah_keluarga_petani_perkebunan" class="form-label">Petani Perkebunan</label>
                            <input type="number" class="form-control" id="jumlah_keluarga_petani_perkebunan"
                                name="jumlah_keluarga_petani_perkebunan" value="{{ old('jumlah_keluarga_petani_perkebunan', 0) }}">
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
                                <a href="{{ route('kebun.index') }}" class="btn btn-outline-secondary rounded">
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

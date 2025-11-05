@extends('layouts.master')

@section('title', 'Edit Data Kepemilikan Lahan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Kepemilikan Lahan
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('lahan.update', $lahan->id) }}" method="POST">
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
                                name="tanggal" value="{{ old('tanggal', $lahan->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Keluarga Pemilik Tanah Pertanian (Ha)</h6>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="memiliki_kurang_10_ha" class="form-label">Memiliki < 10 Ha</label>
                            <input type="number" class="form-control" id="memiliki_kurang_10_ha" name="memiliki_kurang_10_ha" value="{{ old('memiliki_kurang_10_ha', $lahan->memiliki_kurang_10_ha) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="memiliki_10_50_ha" class="form-label">Memiliki 10-50 Ha</label>
                            <input type="number" class="form-control" id="memiliki_10_50_ha" name="memiliki_10_50_ha" value="{{ old('memiliki_10_50_ha', $lahan->memiliki_10_50_ha) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="memiliki_50_100_ha" class="form-label">Memiliki 50-100 Ha</label>
                            <input type="number" class="form-control" id="memiliki_50_100_ha" name="memiliki_50_100_ha" value="{{ old('memiliki_50_100_ha', $lahan->memiliki_50_100_ha) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="memiliki_lebih_100_ha" class="form-label">Memiliki > 100 Ha</label>
                            <input type="number" class="form-control" id="memiliki_lebih_100_ha" name="memiliki_lebih_100_ha" value="{{ old('memiliki_lebih_100_ha', $lahan->memiliki_lebih_100_ha) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Jumlah Keluarga</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jml_keluarga_memiliki_tanah" class="form-label">Memiliki Tanah</label>
                            <input type="number" class="form-control" id="jml_keluarga_memiliki_tanah" name="jml_keluarga_memiliki_tanah" value="{{ old('jml_keluarga_memiliki_tanah', $lahan->jml_keluarga_memiliki_tanah) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jml_keluarga_tidak_memiliki_tanah" class="form-label">Tidak Memiliki Tanah</label>
                            <input type="number" class="form-control" id="jml_keluarga_tidak_memiliki_tanah" name="jml_keluarga_tidak_memiliki_tanah" value="{{ old('jml_keluarga_tidak_memiliki_tanah', $lahan->jml_keluarga_tidak_memiliki_tanah) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jml_keluarga_petani_tanaman_pangan" class="form-label">Petani Tanaman Pangan</label>
                            <input type="number" class="form-control" id="jml_keluarga_petani_tanaman_pangan" name="jml_keluarga_petani_tanaman_pangan" value="{{ old('jml_keluarga_petani_tanaman_pangan', $lahan->jml_keluarga_petani_tanaman_pangan) }}">
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
                                <a href="{{ route('lahan.index') }}"
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

@extends('layouts.master')

@section('title', 'Tambah Data Iklim, Tanah, dan Erosi')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Iklim, Tanah, dan Erosi
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('iklim.store') }}" method="POST">
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
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Bagian Iklim</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="curah_hujan" class="form-label">Curah Hujan (mm)</label>
                            <input type="number" step="0.01" class="form-control" id="curah_hujan"
                                name="curah_hujan" value="{{ old('curah_hujan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jumlah_bulan_hujan" class="form-label">Jumlah Bulan Hujan</label>
                            <input type="number" class="form-control" id="jumlah_bulan_hujan"
                                name="jumlah_bulan_hujan" value="{{ old('jumlah_bulan_hujan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kelembapan_udara" class="form-label">Kelembapan Udara (%)</label>
                            <input type="number" step="0.01" class="form-control" id="kelembapan_udara"
                                name="kelembapan_udara" value="{{ old('kelembapan_udara', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="suhu_rata_rata" class="form-label">Suhu Rata-rata (°C)</label>
                            <input type="number" step="0.01" class="form-control" id="suhu_rata_rata"
                                name="suhu_rata_rata" value="{{ old('suhu_rata_rata', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tinggi_permukaan_laut" class="form-label">Tinggi Permukaan Laut (mdpl)</label>
                            <input type="number" step="0.01" class="form-control" id="tinggi_permukaan_laut"
                                name="tinggi_permukaan_laut" value="{{ old('tinggi_permukaan_laut', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Bagian Tanah</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="warna_tanah" class="form-label">Warna Tanah</label>
                            <select class="form-control" id="warna_tanah" name="warna_tanah">
                                <option value="kuning" {{ old('warna_tanah') == 'kuning' ? 'selected' : '' }}>Kuning</option>
                                <option value="hitam" {{ old('warna_tanah') == 'hitam' ? 'selected' : '' }}>Hitam</option>
                                <option value="abu-abu" {{ old('warna_tanah') == 'abu-abu' ? 'selected' : '' }}>Abu-abu</option>
                                <option value="merah" {{ old('warna_tanah') == 'merah' ? 'selected' : '' }}>Merah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tekstur_tanah" class="form-label">Tekstur Tanah</label>
                            <select class="form-control" id="tekstur_tanah" name="tekstur_tanah">
                                <option value="pasiran" {{ old('tekstur_tanah') == 'pasiran' ? 'selected' : '' }}>Pasiran</option>
                                <option value="debulan" {{ old('tekstur_tanah') == 'debulan' ? 'selected' : '' }}>Debulan</option>
                                <option value="lempungan" {{ old('tekstur_tanah') == 'lempungan' ? 'selected' : '' }}>Lempungan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kemiringan_tanah" class="form-label">Kemiringan Tanah (%)</label>
                            <input type="number" step="0.01" class="form-control" id="kemiringan_tanah"
                                name="kemiringan_tanah" value="{{ old('kemiringan_tanah', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lahan_kritis" class="form-label">Lahan Kritis (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="lahan_kritis"
                                name="lahan_kritis" value="{{ old('lahan_kritis', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lahan_terlantar" class="form-label">Lahan Terlantar (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="lahan_terlantar"
                                name="lahan_terlantar" value="{{ old('lahan_terlantar', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Bagian Erosi</h6>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanah_erosi_ringan" class="form-label">Tanah Erosi Ringan (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_erosi_ringan"
                                name="tanah_erosi_ringan" value="{{ old('tanah_erosi_ringan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanah_erosi_sedang" class="form-label">Tanah Erosi Sedang (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_erosi_sedang"
                                name="tanah_erosi_sedang" value="{{ old('tanah_erosi_sedang', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanah_erosi_berat" class="form-label">Tanah Erosi Berat (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_erosi_berat"
                                name="tanah_erosi_berat" value="{{ old('tanah_erosi_berat', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanah_tidak_ada_erosi" class="form-label">Tanah Tidak Ada Erosi (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_tidak_ada_erosi"
                                name="tanah_tidak_ada_erosi" value="{{ old('tanah_tidak_ada_erosi', 0) }}">
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
                                <a href="{{ route('iklim.index') }}" class="btn btn-outline-secondary rounded">
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

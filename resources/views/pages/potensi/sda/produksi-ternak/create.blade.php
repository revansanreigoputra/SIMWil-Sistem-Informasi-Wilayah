@extends('layouts.master')

@section('title', 'Tambah Data Produksi Ternak')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Produksi Ternak
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('produksi-ternak.store') }}" method="POST">
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
                            <label for="jenis_produksi_ternak_id" class="form-label fw-semibold">
                                <i class="fas fa-tag me-1"></i>
                                Jenis Produksi <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_produksi_ternak_id') is-invalid @enderror" id="jenis_produksi_ternak_id"
                                name="jenis_produksi_ternak_id" required>
                                <option value="">Pilih Jenis Produksi</option>
                                @foreach ($jenisProduksiTernaks as $jenis)
                                    <option value="{{ $jenis->id }}" {{ old('jenis_produksi_ternak_id') == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_produksi_ternak_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hasil_produksi" class="form-label fw-semibold">
                                <i class="fas fa-calculator me-1"></i>
                                Hasil Produksi (Number) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="0.01" class="form-control @error('hasil_produksi') is-invalid @enderror" id="hasil_produksi"
                                name="hasil_produksi" value="{{ old('hasil_produksi', 0) }}" required>
                            @error('hasil_produksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="satuan_produksi_ternak_id" class="form-label fw-semibold">
                                <i class="fas fa-balance-scale me-1"></i>
                                Satuan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('satuan_produksi_ternak_id') is-invalid @enderror" id="satuan_produksi_ternak_id"
                                name="satuan_produksi_ternak_id" required>
                                <option value="">Pilih Satuan</option>
                                @foreach ($satuanProduksiTernaks as $satuan)
                                    <option value="{{ $satuan->id }}" {{ old('satuan_produksi_ternak_id') == $satuan->id ? 'selected' : '' }}>
                                        {{ $satuan->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('satuan_produksi_ternak_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nilai_produksi_tahun_ini" class="form-label fw-semibold">
                                <i class="fas fa-money-bill-wave me-1"></i>
                                Nilai Produksi Tahun Ini
                            </label>
                            <input type="number" step="0.01" class="form-control @error('nilai_produksi_tahun_ini') is-invalid @enderror" id="nilai_produksi_tahun_ini"
                                name="nilai_produksi_tahun_ini" value="{{ old('nilai_produksi_tahun_ini', 0) }}">
                            @error('nilai_produksi_tahun_ini')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nilai_bahan_baku_yang_digunakan" class="form-label fw-semibold">
                                <i class="fas fa-dolly me-1"></i>
                                Nilai Bahan Baku yang Digunakan
                            </label>
                            <input type="number" step="0.01" class="form-control @error('nilai_bahan_baku_yang_digunakan') is-invalid @enderror" id="nilai_bahan_baku_yang_digunakan"
                                name="nilai_bahan_baku_yang_digunakan" value="{{ old('nilai_bahan_baku_yang_digunakan', 0) }}">
                            @error('nilai_bahan_baku_yang_digunakan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nilai_bahan_penolong_yang_digunakan" class="form-label fw-semibold">
                                <i class="fas fa-tools me-1"></i>
                                Nilai Bahan Penolong yang Digunakan
                            </label>
                            <input type="number" step="0.01" class="form-control @error('nilai_bahan_penolong_yang_digunakan') is-invalid @enderror" id="nilai_bahan_penolong_yang_digunakan"
                                name="nilai_bahan_penolong_yang_digunakan" value="{{ old('nilai_bahan_penolong_yang_digunakan', 0) }}">
                            @error('nilai_bahan_penolong_yang_digunakan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_ternak_tahun_ini" class="form-label fw-semibold">
                                <i class="fas fa-cow me-1"></i>
                                Jumlah Ternak Tahun Ini
                            </label>
                            <input type="number" class="form-control @error('jumlah_ternak_tahun_ini') is-invalid @enderror" id="jumlah_ternak_tahun_ini"
                                name="jumlah_ternak_tahun_ini" value="{{ old('jumlah_ternak_tahun_ini', 0) }}">
                            @error('jumlah_ternak_tahun_ini')
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
                                <a href="{{ route('produksi-ternak.index') }}"
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

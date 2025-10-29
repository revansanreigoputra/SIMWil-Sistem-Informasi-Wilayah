@extends('layouts.master')

@section('title', 'Edit Data Hasil Produksi')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Hasil Produksi
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('hasil.update', $hasil->id) }}" method="POST">
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
                                name="tanggal" value="{{ old('tanggal', $hasil->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="komoditas_pangan_id" class="form-label fw-semibold">
                                <i class="fas fa-seedling me-1"></i>
                                Komoditas Pangan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('komoditas_pangan_id') is-invalid @enderror" id="komoditas_pangan_id" name="komoditas_pangan_id" required>
                                <option value="" disabled>Pilih Komoditas</option>
                                @foreach($komoditasPangans as $komoditas)
                                    <option value="{{ $komoditas->id }}" {{ old('komoditas_pangan_id', $hasil->komoditas_pangan_id) == $komoditas->id ? 'selected' : '' }}>{{ $komoditas->nama }}</option>
                                @endforeach
                            </select>
                            @error('komoditas_pangan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Data Produksi</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_produksi" class="form-label">Luas Produksi (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="luas_produksi" name="luas_produksi" value="{{ old('luas_produksi', $hasil->luas_produksi) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hasil_produksi" class="form-label">Hasil Produksi (Ton)</label>
                            <input type="number" step="0.01" class="form-control" id="hasil_produksi" name="hasil_produksi" value="{{ old('hasil_produksi', $hasil->hasil_produksi) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="harga_lokal" class="form-label">Harga Lokal (Rp)</label>
                            <input type="number" class="form-control" id="harga_lokal" name="harga_lokal" value="{{ old('harga_lokal', $hasil->harga_lokal) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Biaya Produksi</h6>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="biaya_pemupukan" class="form-label">Biaya Pemupukan (Rp)</label>
                            <input type="number" class="form-control" id="biaya_pemupukan" name="biaya_pemupukan" value="{{ old('biaya_pemupukan', $hasil->biaya_pemupukan) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="biaya_bibit" class="form-label">Biaya Bibit (Rp)</label>
                            <input type="number" class="form-control" id="biaya_bibit" name="biaya_bibit" value="{{ old('biaya_bibit', $hasil->biaya_bibit) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="biaya_obat" class="form-label">Biaya Obat (Rp)</label>
                            <input type="number" class="form-control" id="biaya_obat" name="biaya_obat" value="{{ old('biaya_obat', $hasil->biaya_obat) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="biaya_lainnya" class="form-label">Biaya Lainnya (Rp)</label>
                            <input type="number" class="form-control" id="biaya_lainnya" name="biaya_lainnya" value="{{ old('biaya_lainnya', $hasil->biaya_lainnya) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Nilai & Saldo</h6>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nilai_produksi_tahun_ini" class="form-label">Nilai Produksi Tahun Ini (Rp)</label>
                            <input type="number" class="form-control" id="nilai_produksi_tahun_ini" name="nilai_produksi_tahun_ini" value="{{ old('nilai_produksi_tahun_ini', $hasil->nilai_produksi_tahun_ini) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="saldo_produksi" class="form-label">Saldo Produksi (Rp)</label>
                            <input type="number" class="form-control" id="saldo_produksi" name="saldo_produksi" value="{{ old('saldo_produksi', $hasil->saldo_produksi) }}">
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
                                <a href="{{ route('hasil.index') }}"
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

@extends('layouts.master')

@section('title', 'Detail Data Hasil Produksi')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-file-alt me-2"></i>
                Detail Data Hasil Produksi
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $hasiltanaman->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $hasiltanaman->desa->nama_desa }}</p>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Komoditas</label>
                        <p class="form-control-plaintext">{{ $hasiltanaman->komoditas->nama }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Data Produksi</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas Produksi (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($hasiltanaman->luas_produksi, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hasil Produksi (Ton)</label>
                        <p class="form-control-plaintext">{{ number_format($hasiltanaman->hasil_produksi, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga Lokal (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasiltanaman->harga_lokal, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Biaya Produksi</h6>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Biaya Pemupukan (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasiltanaman->biaya_pemupukan, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Biaya Bibit (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasiltanaman->biaya_bibit, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Biaya Obat (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasiltanaman->biaya_obat, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Biaya Lainnya (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasiltanaman->biaya_lainnya, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

             <h6 class="fw-bold text-primary mt-4 mb-3">Nilai & Saldo</h6>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nilai_produksi_tahun_ini" class="form-label">Nilai Produksi Tahun Ini (Rp)</label>
                            <p class="form-control-plaintext">{{ number_format($hasiltanaman->nilai_produksi_tahun_ini, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="saldo_produksi" class="form-label">Saldo Produksi (Rp)</label>
                             <p class="form-control-plaintext">{{ number_format($hasiltanaman->saldo_produksi, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('hasiltanaman.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('hasiltanaman.update')
                        <a href="{{ route('hasiltanaman.edit', $hasiltanaman->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection

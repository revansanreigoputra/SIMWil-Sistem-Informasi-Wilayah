@extends('layouts.master')

@section('title', 'Detail Data Hasil Produksi Kebun')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-leaf me-2"></i>
                Detail Data Hasil Produksi Kebun
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $hasilkebun->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $hasilkebun->desa->nama_desa }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Komoditas</label>
                        <p class="form-control-plaintext">{{ $hasilkebun->komoditas->nama }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Perkebunan Swasta/Negara</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas Perkebunan (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->luas_perkebunan_swasta_negara, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hasil Perkebunan (Ton)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->hasil_perkebunan_swasta_negara, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Perkebunan Rakyat</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas Perkebunan (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->luas_perkebunan_rakyat, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hasil Perkebunan (Ton)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->hasil_perkebunan_rakyat, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Data Ekonomi</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga Lokal (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->harga_lokal, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nilai Produksi Tahun Ini (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->nilai_produksi_tahun_ini, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Saldo Produksi (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->saldo_produksi, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Biaya Produksi</h6>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Biaya Pemupukan (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->biaya_pemupukan, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Biaya Bibit (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->biaya_bibit, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Biaya Obat (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->biaya_obat, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Biaya Lainnya (Rp)</label>
                        <p class="form-control-plaintext">{{ number_format($hasilkebun->biaya_lainnya, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Pemasaran Hasil</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Langsung ke Konsumen</label>
                        <p class="form-control-plaintext">{{ $hasilkebun->dijual_langsung_ke_konsumen }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui KUD</label>
                        <p class="form-control-plaintext">{{ $hasilkebun->dijual_melalui_kud }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui Tengkulak</label>
                        <p class="form-control-plaintext">{{ $hasilkebun->dijual_melalui_tengkulak }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui Pengecer</label>
                        <p class="form-control-plaintext">{{ $hasilkebun->dijual_melalui_pengecer }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual ke Lumbung Desa</label>
                        <p class="form-control-plaintext">{{ $hasilkebun->dijual_ke_lumbung_desa }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tidak Dijual</label>
                        <p class="form-control-plaintext">{{ $hasilkebun->tidak_dijual }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('hasilkebun.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('hasilkebun.update')
                        <a href="{{ route('hasilkebun.edit', $hasilkebun->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.master')

@section('title', 'Detail Data Iklim, Tanah, dan Erosi')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-map me-2"></i>
                Detail Data Iklim, Tanah, dan Erosi
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $iklim->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $iklim->desa->nama_desa }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Bagian Iklim</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Curah Hujan (mm)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->curah_hujan, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Bulan Hujan</label>
                        <p class="form-control-plaintext">{{ $iklim->jumlah_bulan_hujan }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kelembapan Udara (%)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->kelembapan_udara, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Suhu Rata-rata (°C)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->suhu_rata_rata, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tinggi Permukaan Laut (mdpl)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->tinggi_permukaan_laut, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Bagian Tanah</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Warna Tanah</label>
                        <p class="form-control-plaintext">{{ ucfirst($iklim->warna_tanah) }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tekstur Tanah</label>
                        <p class="form-control-plaintext">{{ ucfirst($iklim->tekstur_tanah) }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kemiringan Tanah (%)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->kemiringan_tanah, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lahan Kritis (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->lahan_kritis, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lahan Terlantar (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->lahan_terlantar, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Bagian Erosi</h6>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanah Erosi Ringan (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->tanah_erosi_ringan, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanah Erosi Sedang (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->tanah_erosi_sedang, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanah Erosi Berat (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->tanah_erosi_berat, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanah Tidak Ada Erosi (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($iklim->tanah_tidak_ada_erosi, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

             <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('iklim.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('iklim.update')
                        <a href="{{ route('iklim.edit', $iklim->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection

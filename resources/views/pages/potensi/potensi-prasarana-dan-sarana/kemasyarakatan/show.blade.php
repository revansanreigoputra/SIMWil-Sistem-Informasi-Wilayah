@extends('layouts.master')

@section('title', 'Detail Data Kemasyarakatan')

@section('action')
    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.kemasyarakatan.edit', $kemasyarakatan->id) }}" class="btn btn-warning mb-3">
        <i class="fas fa-edit me-2"></i>
        Edit Data
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-eye me-2"></i>
                            <h4 class="card-title mb-0">Detail Data Kemasyarakatan</h4>
                        </div>
                    </div>
                </div>

                <!-- Informasi Dasar -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-info-circle text-primary me-2"></i>
                            Informasi Dasar
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Tanggal</label>
                                    <p class="form-control-plaintext">{{ $kemasyarakatan->tanggal->format('d-m-Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GEDUNG KANTOR LKD/LKK -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-building text-primary me-2"></i>
                            Gedung Kantor LKD/LKK
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Gedung Lembaga Kemasyarakatan</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->gedung_lembaga_kemasyarakatan == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->gedung_lembaga_kemasyarakatan == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Peralatan Kantor</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->peralatan_kantor_lkd == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->peralatan_kantor_lkd == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Mesin Tik</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->mesin_tik_lkd == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->mesin_tik_lkd == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Kardek</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->kardek_lkd == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->kardek_lkd == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Lainnya</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->lainnya_lkd == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->lainnya_lkd == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Buku Administrasi Lembaga</label>
                                    <p class="form-control-plaintext">{{ $kemasyarakatan->buku_administrasi_lembaga_lkd ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Jumlah Meja Kursi</label>
                                    <p class="form-control-plaintext">{{ $kemasyarakatan->jumlah_meja_kursi_lkd ?: '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LKMD / LPM -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-users text-primary me-2"></i>
                            LKMD / LPM
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Memiliki Kantor Sendiri</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->memiliki_kantor_sendiri == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->memiliki_kantor_sendiri == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Peralatan Kantor</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->peralatan_kantor_lpm == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->peralatan_kantor_lpm == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Mesin Tik</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->mesin_tik_lpm == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->mesin_tik_lpm == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Kardek</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->kardek_lpm == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->kardek_lpm == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Lainnya</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->lainnya_lpm == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->lainnya_lpm == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Buku Administrasi Lembaga</label>
                                    <p class="form-control-plaintext">{{ $kemasyarakatan->buku_administrasi_lembaga_lpm ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Jumlah Meja Kursi</label>
                                    <p class="form-control-plaintext">{{ $kemasyarakatan->jumlah_meja_kursi_lpm ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Buku Administrasi</label>
                                    <p class="form-control-plaintext">{{ $kemasyarakatan->buku_administrasi_lpm ?: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Jumlah Kegiatan</label>
                                    <p class="form-control-plaintext">{{ $kemasyarakatan->jumlah_kegiatan_lpm ?: '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PKK -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-female text-primary me-2"></i>
                            PKK
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">PKK</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->pkk == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->pkk == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Gedung Kantor</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->gedung_kantor_pkk == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->gedung_kantor_pkk == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Peralatan Kantor</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->peralatan_kantor_pkk == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->peralatan_kantor_pkk == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Kepengurusan</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->kepengurusan_pkk == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->kepengurusan_pkk == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Kegiatan</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->kegiatan_pkk == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->kegiatan_pkk == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Buku Administrasi</label>
                                    <p class="form-control-plaintext">{{ $kemasyarakatan->buku_administrasi_pkk ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Jumlah Kegiatan</label>
                                    <p class="form-control-plaintext">{{ $kemasyarakatan->jumlah_kegiatan_pkk ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Kelengkapan Darmawisata</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->kelengkapan_darmawisata_pkk == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->kelengkapan_darmawisata_pkk == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Kelengkapan Pokja</label>
                                    <p class="form-control-plaintext">
                                        @if ($kemasyarakatan->kelengkapan_pokja_pkk == 'ada')
                                            <span class="badge bg-success">Ada</span>
                                        @elseif($kemasyarakatan->kelengkapan_pokja_pkk == 'tidak ada')
                                            <span class="badge bg-danger">Tidak Ada</span>
                                        @else
                                            <span class="badge bg-secondary">-</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card shadow-sm">
                    <div class="card-footer bg-light">
                        <div class="btn-group gap-2">
                            <a href="{{ route('potensi.potensi-prasarana-dan-sarana.kemasyarakatan.index') }}"
                                class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <a href="{{ route('potensi.potensi-prasarana-dan-sarana.kemasyarakatan.edit', $kemasyarakatan->id) }}"
                                class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i> Edit Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-style')
    <style>
        .form-control-plaintext {
            padding-top: 0.375rem;
            padding-bottom: 0.375rem;
            margin-bottom: 0;
            line-height: 1.5;
            color: #495057;
            background-color: transparent;
            border: solid transparent;
            border-width: 1px 0;
        }

        .card {
            border: none;
            border-radius: 0.5rem;
        }

        .card-header {
            border-radius: 0.5rem 0.5rem 0 0 !important;
            border-bottom: 1px solid #dee2e6;
        }

        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        .badge {
            font-size: 0.875em;
        }
    </style>
@endpush

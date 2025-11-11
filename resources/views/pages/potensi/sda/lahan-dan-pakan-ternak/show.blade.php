@extends('layouts.master')

@section('title', 'Detail Data Lahan Pemeliharaan dan Pakan Ternak')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-seedling me-2"></i>
                Detail Data Lahan Pemeliharaan dan Pakan Ternak
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $lahanPakanTernak->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $lahanPakanTernak->desa->nama_desa }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Lahan Pakan Ternak (Ha)</h6>
            <div class="row">
                @php
                    $lahan_pakan_ternak_data = [
                        'Luas Tanaman Pakan Ternak' => 'luas_tanaman_pakan_ternak',
                        'Produksi Hijauan Makanan Ternak' => 'produksi_hijauan_makanan_ternak',
                        'Dipasok Dari Luar Desa/Kelurahan' => 'dipasok_dari_luar_desa_kelurahan',
                        'Disubsidi Dinas' => 'disubsidi_dinas',
                        'Lainnya Pakan Ternak' => 'lainnya_pakan_ternak',
                    ];
                @endphp
                @foreach ($lahan_pakan_ternak_data as $label => $field)
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ $label }}</label>
                            <p class="form-control-plaintext">{{ number_format($lahanPakanTernak->$field, 2, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Kepemilikan Lahan Pakan Ternak (Ha)</h6>
            <div class="row">
                @php
                    $kepemilikan_lahan_pakan_ternak = [
                        'Milik Masyarakat Umum' => 'milik_masyarakat_umum',
                        'Milik Perusahaan Peternakan/Ranch' => 'milik_perusahaan_peternakan_ranch',
                        'Milik Perorangan' => 'milik_perorangan',
                        'Sewa Pakai' => 'sewa_pakai',
                        'Milik Pemerintah' => 'milik_pemerintah',
                        'Milik Masyarakat Adat' => 'milik_masyarakat_adat',
                        'Lainnya Pemeliharaan Ternak' => 'lainnya_pemeliharaan_ternak',
                        'Luas Lahan Gembalaan' => 'luas_lahan_gembalaan',
                    ];
                @endphp
                @foreach ($kepemilikan_lahan_pakan_ternak as $label => $field)
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ $label }}</label>
                            <p class="form-control-plaintext">{{ number_format($lahanPakanTernak->$field, 2, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('lahan-pakan-ternak.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('lahan-pakan-ternak.update')
                        <a href="{{ route('lahan-pakan-ternak.edit', $lahanPakanTernak->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection

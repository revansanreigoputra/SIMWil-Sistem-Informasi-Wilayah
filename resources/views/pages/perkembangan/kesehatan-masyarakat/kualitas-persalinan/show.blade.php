@extends('layouts.master')

@section('title', 'Detail Kualitas Persalinan')

@section('action')
    <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.edit', $data->id) }}" class="btn btn-warning mb-3">
        <i class="fas fa-edit me-2"></i> Edit Data
    </a>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Informasi Dasar -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> Informasi Dasar</h5>
        </div>
        <div class="card-body">
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</p>
        </div>
    </div>

    <!-- Tempat Persalinan -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0"><i class="fas fa-hospital me-2 text-primary"></i> Tempat Persalinan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach([
                    'persalinan_rumah_sakit_umum' => 'Persalinan Rumah Sakit Umum',
                    'persalinan_puskesmas' => 'Persalinan Puskesmas',
                    'persalinan_praktek_bidan' => 'Persalinan Praktek Bidan',
                    'persalinan_rumah_bersalin' => 'Persalinan Rumah Bersalin',
                    'persalinan_polindes' => 'Persalinan Polindes',
                    'persalinan_balai_kesehatan_ibu_anak' => 'Persalinan Balai Kesehatan Ibu Anak',
                    'persalinan_praktek_dokter' => 'Persalinan Praktek Dokter',
                    'rumah_sendiri' => 'Rumah Sendiri',
                    'rumah_dukun' => 'Rumah Dukun'
                ] as $key => $label)
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">{{ $label }}</label>
                        <p class="form-control-plaintext">{{ number_format($data->$key ?? 0) }} orang</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Penolong Persalinan -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0"><i class="fas fa-user-nurse text-primary me-2"></i> Penolong Persalinan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach([
                    'ditolong_dokter' => 'Ditolong Dokter',
                    'ditolong_bidan' => 'Ditolong Bidan',
                    'ditolong_perawat' => 'Ditolong Perawat',
                    'ditolong_dukun_bersalin' => 'Ditolong Dukun Bersalin',
                    'ditolong_keluarga' => 'Ditolong Keluarga'
                ] as $key => $label)
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">{{ $label }}</label>
                        <p class="form-control-plaintext">{{ number_format($data->$key ?? 0) }} orang</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Total Persalinan -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0"><i class="fas fa-list-ol text-primary me-2"></i> Total Persalinan</h5>
        </div>
        <div class="card-body">
            <p class="form-control-plaintext">{{ number_format($data->total_persalinan ?? 0) }} orang</p>
        </div>
    </div>
</div>
@endsection

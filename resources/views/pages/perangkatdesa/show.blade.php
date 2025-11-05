@extends('layouts.master')

@section('title', 'Detail Perangkat Desa')

@section('content')
@can('perangkat_desa.view')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-person-badge-fill me-2"></i> Detail Perangkat Desa
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <tbody>
                    <tr>
                        <th width="40%" class="fw-semibold bg-light">Nama</th>
                        <td>{{ $perangkatDesa->nama }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jabatan</th>
                        <td>{{ $perangkatDesa->nama_jabatan }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Desa</th>
                        <td>{{ $perangkatDesa->nama_desa }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Tanggal Lahir</th>
                        <td>{{ $perangkatDesa->tanggal_lahir ? \Carbon\Carbon::parse($perangkatDesa->tanggal_lahir)->format('d F Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jenis Kelamin</th>
                        <td>{{ $perangkatDesa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Golongan Darah</th>
                        <td>{{ $perangkatDesa->golongan_darah ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Kontak</th>
                        <td>{{ $perangkatDesa->kontak ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Masa Jabatan</th>
                        <td>{{ $perangkatDesa->masa_jabatan ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Nama Istri</th>
                        <td>{{ $perangkatDesa->nama_pasangan ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Anak</th>
                        <td>{{ $perangkatDesa->jumlah_anak }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Alamat</th>
                        <td>{{ $perangkatDesa->alamat ?: '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if ($perangkatDesa->sambutan)
            <div class="mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th class="fw-bold">
                                <i class="bi bi-chat-quote-fill me-2"></i> Sambutan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{!! nl2br(e($perangkatDesa->sambutan)) !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-4 d-flex justify-content-end gap-2">
            <a href="{{ route('perangkat_desa.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

    </div>
</div>
@else
    {{-- Jika pengguna tidak memiliki izin --}}
    <div class="alert alert-danger text-center">
        <h4 class="alert-heading">Akses Ditolak!</h4>
        <p>Maaf, Anda tidak memiliki izin untuk melihat detail data ini. Silakan hubungi Administrator.</p>
    </div>
@endcan
@endsection

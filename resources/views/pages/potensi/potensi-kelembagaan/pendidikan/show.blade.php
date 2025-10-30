@extends('layouts.master')

@section('title', 'Detail Data Lembaga Pendidikan')

@section('content')
@can('pendidikan.show')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-info-circle me-2"></i> Detail Lembaga Pendidikan
        </h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th width="30%" class="fw-semibold bg-light">Tanggal</th>
                        <td>{{ $data->tanggal ? \Carbon\Carbon::parse($data->tanggal)->format('d F Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Kategori Sekolah</th>
                        <td>{{ $data->kategori->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jenis Sekolah / Tingkatan</th>
                        <td>{{ $data->jenisSekolah->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Status</th>
                        <td>{{ $data->status ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Negeri</th>
                        <td>{{ $data->jumlah_negeri ?? '0' }} Gedung</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Swasta</th>
                        <td>{{ $data->jumlah_swasta ?? '0' }} Gedung</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Dimiliki Desa</th>
                        <td>{{ $data->jumlah_dimiliki_desa ?? '0' }} Gedung</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Total Jumlah Sekolah</th>
                        <td>{{ $data->jumlah ?? '0' }} Gedung</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Pengajar</th>
                        <td>{{ $data->jumlah_pengajar ?? '0' }} Orang</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-end gap-2">
            {{-- Tombol Kembali hanya muncul jika user punya akses ke halaman index --}}
            @can('pendidikan.index')
            <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            @endcan
        </div>
    </div>
</div>
@else
    {{-- Jika pengguna tidak punya izin 'pendidikan.show', tampilkan pesan ini --}}
    <div class="alert alert-danger text-center">
        <h4 class="alert-heading">Akses Ditolak!</h4>
        <p>Maaf, Anda tidak memiliki izin untuk melihat detail data ini. Silakan hubungi Administrator.</p>
    </div>
@endcan
@endsection
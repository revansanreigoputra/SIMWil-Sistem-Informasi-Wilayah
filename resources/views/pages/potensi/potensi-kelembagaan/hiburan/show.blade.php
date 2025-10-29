@extends('layouts.master')

@section('title', 'Detail Data Usaha Jasa, Hiburan, dll')

@section('content')
@can('hiburan.show')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-info-circle me-2"></i> Detail Usaha Jasa, Hiburan, dll
        </h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th width="30%" class="fw-semibold bg-light">Tanggal</th>
                        <td>{{ \Carbon\Carbon::parse($hiburan->tanggal)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Kategori</th>
                        <td>{{ $hiburan->kategori?->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jenis Usaha</th>
                        <td>{{ $hiburan->jenisUsaha?->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Unit</th>
                        <td>{{ $hiburan->jumlah_unit ?? '0' }} Unit</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Jenis Produk</th>
                        <td>{{ $hiburan->jenis_produk ?? '0' }} Jenis</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Tenaga Kerja</th>
                        <td>{{ $hiburan->jumlah_tenaga_kerja ?? '0' }} Orang</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-4 d-flex justify-content-end gap-2">
            {{-- Tombol Kembali hanya muncul jika user punya akses ke halaman index --}}
            @can('hiburan.index')
            <a href="{{ route('potensi.potensi-kelembagaan.hiburan.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            @endcan
        </div>
    </div>
</div>
@else
    {{-- Jika pengguna tidak punya izin 'hiburan.show', tampilkan pesan ini --}}
    <div class="alert alert-danger text-center">
        <h4 class="alert-heading">Akses Ditolak!</h4>
        <p>Maaf, Anda tidak memiliki izin untuk melihat detail data ini. Silakan hubungi Administrator.</p>
    </div>
@endcan
@endsection
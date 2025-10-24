@extends('layouts.master')

@section('title', 'Detail Data Lembaga Pendidikan')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-info-circle me-2"></i> Detail Lembaga Pendidikan
        </h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th width="30%">Tanggal</th>
                    <td>{{ $data->tanggal ? \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Kategori Sekolah</th>
                    <td>{{ $data->kategori->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Sekolah / Tingkatan</th>
                    <td>{{ $data->jenisSekolah->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $data->status ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Negeri</th>
                    <td>{{ $data->jumlah_negeri ?? 0 }}</td>
                </tr>
                <tr>
                    <th>Jumlah Swasta</th>
                    <td>{{ $data->jumlah_swasta ?? 0 }}</td>
                </tr>
                <tr>
                    <th>Jumlah Dimiliki Desa</th>
                    <td>{{ $data->jumlah_dimiliki_desa ?? 0 }}</td>
                </tr>
                <tr>
                    <th>Total Jumlah Sekolah</th>
                    <td>{{ $data->jumlah ?? 0 }}</td>
                </tr>
                <tr>
                    <th>Jumlah Pengajar</th>
                    <td>{{ $data->jumlah_pengajar ?? 0 }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4 d-flex justify-content-end gap-2">
            <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection

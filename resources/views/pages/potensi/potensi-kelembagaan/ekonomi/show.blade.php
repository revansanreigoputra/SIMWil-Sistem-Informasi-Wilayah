@extends('layouts.master')

@section('title', 'Detail Data Lembaga Ekonomi')

@section('content')
{{-- Mengganti permission ke 'show' agar lebih spesifik --}}
@can('lembaga-ekonomi.view')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-info-circle me-2"></i> Detail Lembaga Ekonomi
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th width="30%">Tanggal</th>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Kategori Lembaga</th>
                        <td>{{ $data->kategori->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Lembaga</th>
                        <td>{{ $data->jenis->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $data->jumlah ?? 0 }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pengurus</th>
                        <td>{{ $data->jumlah_pengurus ?? 0 }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Jenis Kegiatan</th>
                        <td>{{ $data->jumlah_kegiatan ?? 0 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('potensi.potensi-kelembagaan.ekonomi.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
{{-- Menambahkan @else dan @endcan --}}
@else
<div class="alert alert-danger mt-3">
    <i class="bi bi-exclamation-triangle me-2"></i>
    Kamu tidak memiliki izin untuk melihat detail data Lembaga Ekonomi.
</div>
@endcan
@endsection

@extends('layouts.master')

@section('title', 'Detail Data Usaha Jasa, Hiburan, dll')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-info-circle me-2"></i> Detail Usaha Jasa, Hiburan, dll
        </h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th width="30%">Tanggal</th>
                        <td>{{ \Carbon\Carbon::parse($hiburan->tanggal)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $hiburan->kategori?->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Usaha</th>
                        <td>{{ $hiburan->jenisUsaha?->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah (Unit)</th>
                        <td>{{ $hiburan->jumlah_unit ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Produk</th>
                        <td>{{ $hiburan->jenis_produk ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Tenaga Kerja</th>
                        <td>{{ $hiburan->jumlah_tenaga_kerja ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-4 d-flex justify-content-end gap-2">
            <a href="{{ route('potensi.potensi-kelembagaan.hiburan.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection

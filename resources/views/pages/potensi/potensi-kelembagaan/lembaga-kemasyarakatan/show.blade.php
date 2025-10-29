@extends('layouts.master')

@section('title', 'Detail Data Lembaga Kemasyarakatan')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-info-circle me-2"></i> Detail Lembaga Kemasyarakatan
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
                        <th>Jenis Lembaga</th>
                        <td>{{ $data->jenisLembaga->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $data->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Dasar Hukum</th>
                        <td>{{ $data->dasarHukum->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pengurus</th>
                        <td>{{ $data->jumlah_pengurus }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Jenis Kegiatan</th>
                        <td>{{ $data->jumlah_jenis_kegiatan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Kantor</th>
                        <td>{{ $data->alamat_kantor ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Ruang Lingkup Kegiatan</th>
                        <td>{{ $data->ruang_lingkup_kegiatan ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-4 d-flex justify-content-end">
            @can('lembaga-kemasyarakatan.view')
                <a href="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            @endcan
        </div>
    </div>
</div>
@endsection

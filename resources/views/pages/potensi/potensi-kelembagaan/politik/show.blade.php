@extends('layouts.master')

@section('title', 'Detail Data Partisipasi Politik')

@section('content')
@can('lembaga-politik.view')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Partisipasi Politik</h5>
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
                        <th>Jenis Partisipasi Politik</th>
                        <td>{{ $data->partisipasiPolitik->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Wanita Hak Pilih</th>
                        <td>{{ $data->jumlah_wanita_hak_pilih }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pria Hak Pilih</th>
                        <td>{{ $data->jumlah_pria_hak_pilih }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pemilih</th>
                        <td>{{ $data->jumlah_pemilih }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Wanita Memilih</th>
                        <td>{{ $data->jumlah_wanita_memilih }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pria Memilih</th>
                        <td>{{ $data->jumlah_pria_memilih }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Penggunaan Hak Pilih</th>
                        <td>{{ $data->jumlah_penggunaan_hak_pilih }}</td>
                    </tr>
                    <tr>
                        <th>Persentase (%)</th>
                        <td>{{ number_format($data->persentase, 2) }}%</td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $data->created_at->translatedFormat('d F Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Diperbarui Pada</th>
                        <td>{{ $data->updated_at->translatedFormat('d F Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-4 d-flex justify-content-between">
            <a href="{{ route('potensi.potensi-kelembagaan.politik.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@else
<div class="alert alert-danger mt-3">
    <i class="bi bi-exclamation-triangle me-2"></i> Anda tidak memiliki izin untuk melihat detail data ini.
</div>
@endcan
@endsection
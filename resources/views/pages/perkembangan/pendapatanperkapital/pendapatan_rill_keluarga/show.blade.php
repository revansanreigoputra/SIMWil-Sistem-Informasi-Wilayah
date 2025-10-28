@extends('layouts.master')

@section('title', 'Detail Data Pendapatan Riil Keluarga')

@section('content')
<div class="container">
    <h4>Detail Data Pendapatan Riil Keluarga</h4>
    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="30%">Desa</th>
                    <td>{{ $item->desa->nama_desa ?? 'Tidak tersedia' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Jumlah Kepala Keluarga (KK)</th>
                    <td>{{ $item->kk }}</td>
                </tr>
                <tr>
                    <th>Jumlah Anggota Keluarga (AK)</th>
                    <td>{{ $item->ak }}</td>
                </tr>
                <tr>
                    <th>Pendapatan Kepala Keluarga (Rp)</th>
                    <td>{{ number_format($item->pendapatan_kk, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Pendapatan Anggota Keluarga (Rp)</th>
                    <td>{{ number_format($item->pendapatan_ak, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Total Pendapatan (Rp)</th>
                    <td>{{ number_format($item->total1, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Pendapatan per Anggota (Rp)</th>
                    <td>{{ number_format($item->total2, 2, ',', '.') }}</td>
                </tr>
            </table>

            <div class="mt-3 d-flex gap-2">
                <a href="{{ route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index') }}" 
                   class="btn btn-secondary">Kembali</a>
                <a href="{{ route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.edit', $item->id) }}" 
                   class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection

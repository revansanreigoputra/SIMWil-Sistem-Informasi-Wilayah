@extends('layouts.master')

@section('title', 'Detail Aset Sarana Transportasi Umum')

@section('content')
<div class="container">
    <h4>Detail Aset Sarana Transportasi Umum</h4>
    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="25%">Desa</th>
                    <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                    <th>Jenis Aset</th>
                    <td>{{ $item->asetSarana->nama ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Jumlah Pemilik (Orang)</th>
                    <td>{{ $item->jumlah_pemilik ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Jumlah Aset (Unit)</th>
                    <td>{{ $item->jumlah_aset ?? '-' }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <a href="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.edit', $item->id) }}" class="btn btn-warning">
                    Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

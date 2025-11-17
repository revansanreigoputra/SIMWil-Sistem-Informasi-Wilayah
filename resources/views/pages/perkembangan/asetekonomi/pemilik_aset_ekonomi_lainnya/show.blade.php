@extends('layouts.master')

@section('title', 'Detail Pemilik Aset Ekonomi Lainnya')

@section('content')
<div class="container">
    <h4>Detail Data Pemilik Aset Ekonomi Lainnya</h4>

    <div class="card mt-3">
        <div class="card-body">

            <table class="table table-borderless">
                <tr>
                    <th width="25%">Desa</th>
                    <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Jenis Aset</th>
                    <td>{{ $item->asetLainnya->nama ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                    <th>Jumlah</th>
                    <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.edit', $item->id) }}" class="btn btn-warning">
                    Edit
                </a>
            </div>

        </div>
    </div>
</div>
@endsection

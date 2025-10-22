@extends('layouts.master')

@section('title', 'Detail Pemilik Aset Ekonomi Lainnya')

@section('content')
<div class="container">
    <h4>Detail Data Pemilik Aset Ekonomi Lainnya</h4>

    <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="25%">Desa</th>
                    <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Aset</th>
                    <td>{{ $item->jenisAsetLainnya->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $item->jumlah }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

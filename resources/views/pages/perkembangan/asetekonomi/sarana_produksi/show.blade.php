@extends('layouts.master')

@section('title', 'Detail Sarana Produksi')

@section('content')
<div class="container">
    <h4>Detail Data Sarana Produksi</h4>

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
                    <th>Memiliki penggilingan padi (Orang)</th>
                    <td>{{ number_format($item->produksi1, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki traktor (Orang)</th>
                    <td>{{ number_format($item->produksi2, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki kapal penangkap ikan (Orang)</th>
                    <td>{{ number_format($item->produksi3, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki alat pengolahan hasil perikanan (Orang)</th>
                    <td>{{ number_format($item->produksi4, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki alat pengolahan hasil peternakan (Orang)</th>
                    <td>{{ number_format($item->produksi5, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki alat pengolahan hasil perkebunan (Orang)</th>
                    <td>{{ number_format($item->produksi6, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki alat pengolahan hasil hutan (Orang)</th>
                    <td>{{ number_format($item->produksi7, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki alat produksi dan pengolah hasil pertambangan (Orang)</th>
                    <td>{{ number_format($item->produksi8, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki alat produksi dan pengolah hasil pariwisata (Orang)</th>
                    <td>{{ number_format($item->produksi9, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki alat produksi dan pengolah hasil industri jasa perdagangan (Orang)</th>
                    <td>{{ number_format($item->produksi10, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki alat produksi dan pengolah hasil industri kerajinan keluarga skala kecil dan menengah (Orang)</th>
                    <td>{{ number_format($item->produksi11, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Memiliki alat produksi dan pengolah hasil industri Migas (Orang)</th>
                    <td>{{ number_format($item->produksi12, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ number_format($item->produksi13 ?? $item->jumlah, 0, ',', '.') }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection

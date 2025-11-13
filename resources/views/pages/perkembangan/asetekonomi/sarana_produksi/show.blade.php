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
                    <td>{{ $saranaProduksi->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($saranaProduksi->tanggal)->format('d-m-Y') }}</td>
                </tr>
                @for($i = 1; $i <= 12; $i++)
                    <tr>
                        <th>
                            @switch($i)
                                @case(1) Memiliki penggilingan padi (Orang) @break
                                @case(2) Memiliki traktor (Orang) @break
                                @case(3) Memiliki kapal penangkap ikan (Orang) @break
                                @case(4) Memiliki alat pengolahan hasil perikanan (Orang) @break
                                @case(5) Memiliki alat pengolahan hasil peternakan (Orang) @break
                                @case(6) Memiliki alat pengolahan hasil perkebunan (Orang) @break
                                @case(7) Memiliki alat pengolahan hasil hutan (Orang) @break
                                @case(8) Memiliki alat produksi dan pengolah hasil pertambangan (Orang) @break
                                @case(9) Memiliki alat produksi dan pengolah hasil pariwisata (Orang) @break
                                @case(10) Memiliki alat produksi dan pengolah hasil industri jasa perdagangan (Orang) @break
                                @case(11) Memiliki alat produksi dan pengolah hasil industri kerajinan keluarga skala kecil dan menengah (Orang) @break
                                @case(12) Memiliki alat produksi dan pengolah hasil industri Migas (Orang) @break
                            @endswitch
                        </th>
                        <td>{{ number_format($saranaProduksi->{'produksi'.$i} ?? 0, 0, ',', '.') }}</td>
                    </tr>
                @endfor
                <tr>
                    <th>Jumlah</th>
                    <td>{{ number_format($saranaProduksi->produksi13 ?? $saranaProduksi->jumlah, 0, ',', '.') }}</td>
                </tr>
            </table>

            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.edit', $saranaProduksi->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection

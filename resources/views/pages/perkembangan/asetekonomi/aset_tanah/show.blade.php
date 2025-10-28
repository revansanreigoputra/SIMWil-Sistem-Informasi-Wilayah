@extends('layouts.master')

@section('title', 'Detail Data Penguasaan Aset Tanah')

@section('content')
<div class="container">
    <h4>Detail Data Penguasaan Aset Tanah</h4>

    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="25%">Desa</th>
                    <td>{{ $asetTanah->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($asetTanah->tanggal)->format('d-m-Y') }}</td>
                </tr>
                @php
                    $fields = [
                        'tidak_memiliki' => 'Tidak Memiliki Tanah',
                        'tanah1' => 'Kurang dari 0,1 Ha',
                        'tanah2' => '0,1 – 0,2 Ha',
                        'tanah3' => '0,21 – 0,5 Ha',
                        'tanah4' => '0,51 – 1 Ha',
                        'tanah5' => '1,1 – 2 Ha',
                        'tanah6' => '2,1 – 3 Ha',
                        'tanah7' => '3,1 – 4 Ha',
                        'tanah8' => '4,1 – 5 Ha',
                        'tanah9' => '5,1 – 7 Ha',
                        'tanah10' => '7,1 – 10 Ha',
                        'tanah11' => '10,1 Ha',
                        'memiliki_lebih' => 'Lebih dari 10 Ha',
                        'jumlah' => 'Jumlah Total'
                    ];
                @endphp

                @foreach ($fields as $field => $label)
                    <tr>
                        <th>{{ $label }}</th>
                        <td>{{ $asetTanah->$field ?? '-' }}</td>
                    </tr>
                @endforeach
            </table>

            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('perkembangan.asetekonomi.aset_tanah.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('perkembangan.asetekonomi.aset_tanah.edit', $asetTanah->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection

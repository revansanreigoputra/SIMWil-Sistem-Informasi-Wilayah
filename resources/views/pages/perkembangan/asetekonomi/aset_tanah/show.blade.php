@extends('layouts.master')

@section('title', 'Detail Data Penguasaan Aset Tanah')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Detail Data Penguasaan Aset Tanah</h5>
    </div>

    <div class="card-body">
        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Desa</label>
            <div class="col-sm-8 col-form-label">
                {{ $asetTanah->desa->nama_desa ?? '-' }}
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Tanggal</label>
            <div class="col-sm-8 col-form-label">
                {{ \Carbon\Carbon::parse($asetTanah->tanggal)->format('d-m-Y') }}
            </div>
        </div>

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
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">{{ $label }}</label>
                <div class="col-sm-8 col-form-label">
                    {{ $asetTanah->$field ?? '-' }}
                </div>
            </div>
        @endforeach

        <div class="text-end">
            <a href="{{ route('perkembangan.asetekonomi.aset_tanah.index') }}" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Detail Data Menurut Sektor Usaha')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Detail Data Menurut Sektor Usaha</h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">

            <tr>
                <th width="30%">Tanggal</th>
                <td>
                    {{ $menurut_sektor_usaha->tanggal 
                        ? \Carbon\Carbon::parse($menurut_sektor_usaha->tanggal)->format('d-m-Y')
                        : '-' 
                    }}
                </td>
            </tr>

            <tr>
                <th>Sektor Usaha</th>
                <td>{{ $menurut_sektor_usaha->sektor->nama ?? '-' }}</td>
            </tr>

            <tr>
                <th>Jumlah Keluarga (KK)</th>
                <td>{{ $menurut_sektor_usaha->kk }}</td>
            </tr>

            <tr>
                <th>Total Anggota</th>
                <td>{{ $menurut_sektor_usaha->anggota }}</td>
            </tr>

            <tr>
                <th>Buruh (KK)</th>
                <td>{{ $menurut_sektor_usaha->buruh }}</td>
            </tr>

            <tr>
                <th>Total Anggota Buruh</th>
                <td>{{ $menurut_sektor_usaha->anggota_buruh }}</td>
            </tr>

            <tr>
                <th>Pendapatan Perkapita</th>
                <td>Rp {{ number_format($menurut_sektor_usaha->pendapatan, 0, ',', '.') }}</td>
            </tr>

        </table>

        <div class="mt-3 d-flex justify-content-between">
            <a href="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.edit', $menurut_sektor_usaha->id) }}" class="btn btn-warning">
                Edit
            </a>
        </div>
    </div>
</div>
@endsection

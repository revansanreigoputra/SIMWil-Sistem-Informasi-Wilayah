@extends('layouts.master')

@section('title', 'Detail - Cakupan Imunisasi')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-4 text-primary">Detail Data Cakupan Imunisasi</h5>

        <table class="table table-bordered">
            <tr>
                <th>Tanggal</th>
                <td>{{ $data->tanggal }}</td>
            </tr>
            <tr>
                <th>Bayi usia 2 bulan</th>
                <td>{{ $data->bayi_usia_2_bulan }}</td>
            </tr>
            <tr>
                <th>DPT1 + BCG + Polio 1</th>
                <td>{{ $data->bayi_2_bulan_dpt1_bcg_polio1 }}</td>
            </tr>
            <tr>
                <th>Bayi usia 3 bulan</th>
                <td>{{ $data->bayi_usia_3_bulan }}</td>
            </tr>
            <tr>
                <th>DPT2 + Polio 2</th>
                <td>{{ $data->bayi_3_bulan_dpt2_polio2 }}</td>
            </tr>
            <tr>
                <th>Bayi usia 4 bulan</th>
                <td>{{ $data->bayi_usia_4_bulan }}</td>
            </tr>
            <tr>
                <th>DPT3 + Polio 3</th>
                <td>{{ $data->bayi_4_bulan_dpt3_polio3 }}</td>
            </tr>
            <tr>
                <th>Bayi usia 9 bulan</th>
                <td>{{ $data->bayi_usia_9_bulan }}</td>
            </tr>
            <tr>
                <th>Campak</th>
                <td>{{ $data->bayi_9_bulan_campak }}</td>
            </tr>
            <tr>
                <th>Cacar</th>
                <td>{{ $data->bayi_imunisasi_cacar }}</td>
            </tr>
        </table>

        <div class="mt-4">
            <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

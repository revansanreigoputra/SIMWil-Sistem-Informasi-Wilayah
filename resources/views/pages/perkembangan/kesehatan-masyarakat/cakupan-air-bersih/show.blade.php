@extends('layouts.master')

@section('title', 'Detail - CAKUPAN PEMENUHAN KEBUTUHAN AIR BERSIH')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Detail Cakupan Pemenuhan Kebutuhan Air Bersih</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th style="width: 35%;">Tanggal</th>
                    <td>{{ $cakupanAirBersih->tanggal }}</td>
                </tr>
                <tr>
                    <th>Desa</th>
                    <td>{{ $cakupanAirBersih->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga menggunakan sumur gali</th>
                    <td>{{ number_format($cakupanAirBersih->sumur_gali, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga pelanggan PAM</th>
                    <td>{{ number_format($cakupanAirBersih->pelanggan_pam, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga menggunakan Penampung Air Hujan</th>
                    <td>{{ number_format($cakupanAirBersih->penampung_air_hujan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga menggunakan sumur pompa</th>
                    <td>{{ number_format($cakupanAirBersih->sumur_pompa, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga menggunakan perpipaan air kran</th>
                    <td>{{ number_format($cakupanAirBersih->perpipaan_air_kran, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga menggunakan hidran umum</th>
                    <td>{{ number_format($cakupanAirBersih->hidran_umum, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga menggunakan air sungai</th>
                    <td>{{ number_format($cakupanAirBersih->air_sungai, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga menggunakan embung</th>
                    <td>{{ number_format($cakupanAirBersih->embung, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga yang menggunakan mata air</th>
                    <td>{{ number_format($cakupanAirBersih->mata_air, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga yang tidak mendapat akses air minum dari air laut</th>
                    <td>{{ number_format($cakupanAirBersih->tidak_akses_air_laut, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah keluarga yang tidak mendapat akses air minum dari sumber di atas</th>
                    <td>{{ number_format($cakupanAirBersih->tidak_akses_sumber_lain, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Total Jumlah Keluarga</th>
                    <td>{{ number_format($cakupanAirBersih->total_keluarga, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end gap-2 mt-3">
            <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.index') }}" class="btn btn-secondary">Kembali</a>
            {{-- Tombol Edit --}}
            @can('cakupan-air-bersih.update')
            <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.edit', $cakupanAirBersih->id) }}" class="btn btn-warning">Edit</a>
            @endcan
        </div>
    </div>
</div>
@endsection
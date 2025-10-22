@extends('layouts.master')

@section('title', 'Detail - PERILAKU HIDUP BERSIH DAN SEHAT')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Informasi Umum</h5>
        <table class="table table-bordered">
            <tr>
                <th>Desa</th>
                <td>{{ $perilaku->desa->nama_desa ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $perilaku->tanggal }}</td>
            </tr>
        </table>

        <h5 class="mt-4 mb-2">Kepemilikan WC</h5>
        <table class="table table-bordered">
            <tr><th>WC Sehat</th><td>{{ $perilaku->keluarga_wc_sehat }}</td></tr>
            <tr><th>WC Tidak Standar</th><td>{{ $perilaku->keluarga_wc_tidak_standar }}</td></tr>
            <tr><th>Buang Air di Sungai</th><td>{{ $perilaku->keluarga_buang_air_sungai }}</td></tr>
            <tr><th>Fasilitas MCK Umum</th><td>{{ $perilaku->keluarga_mck_umum }}</td></tr>
        </table>

        <h5 class="mt-4 mb-2">Frekuensi Makan Keluarga</h5>
        <table class="table table-bordered">
            <tr><th>Makan 1x</th><td>{{ $perilaku->makan_1x }}</td></tr>
            <tr><th>Makan 2x</th><td>{{ $perilaku->makan_2x }}</td></tr>
            <tr><th>Makan 3x</th><td>{{ $perilaku->makan_3x }}</td></tr>
            <tr><th>Makan > 3x</th><td>{{ $perilaku->makan_lebih_3x }}</td></tr>
            <tr><th>Belum Tentu Makan</th><td>{{ $perilaku->belum_tentu_makan }}</td></tr>
        </table>

        <h5 class="mt-4 mb-2">Tempat Berobat Keluarga</h5>
        <table class="table table-bordered">
            <tr><th>Dukun Terlatih</th><td>{{ $perilaku->dukun_terlatih }}</td></tr>
            <tr><th>Tenaga Kesehatan</th><td>{{ $perilaku->tenaga_kesehatan }}</td></tr>
            <tr><th>Obat Tradisional</th><td>{{ $perilaku->obat_tradisional_dukun }}</td></tr>
            <tr><th>Paranormal</th><td>{{ $perilaku->paranormal }}</td></tr>
            <tr><th>Obat Keluarga Sendiri</th><td>{{ $perilaku->obat_keluarga_sendiri }}</td></tr>
            <tr><th>Tidak Diobati</th><td>{{ $perilaku->tidak_diobati }}</td></tr>
        </table>

        <div class="mt-3">
            <a href="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Detail - PERKEMBANGAN PASANGAN USIA SUBUR DAN KB')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">Detail Data Perkembangan Pasangan Usia Subur dan KB</h4>

        <table class="table table-bordered">
            <tr>
                <th width="30%">Tanggal</th>
                <td>{{ $pasanganUsiaSuburKb->tanggal }}</td>
            </tr>

            @if(isset($pasanganUsiaSuburKb->desa))
            <tr>
                <th>Desa</th>
                <td>{{ $pasanganUsiaSuburKb->desa->nama_desa ?? '-' }}</td>
            </tr>
            @endif

            <tr class="table-primary"><th colspan="2">A. Data Pasangan Usia Subur</th></tr>
            <tr>
                <th>Remaja Putri (12–17 tahun)</th>
                <td>{{ $pasanganUsiaSuburKb->remaja_putri_12_17 }}</td>
            </tr>
            <tr>
                <th>Perempuan Usia Subur (15–49 tahun)</th>
                <td>{{ $pasanganUsiaSuburKb->perempuan_usia_subur_15_49 }}</td>
            </tr>
            <tr>
                <th>Wanita Kawin Muda (&lt; 16 tahun)</th>
                <td>{{ $pasanganUsiaSuburKb->wanita_kawin_muda_kurang_16 }}</td>
            </tr>
            <tr>
                <th>Pasangan Usia Subur (PUS)</th>
                <td>{{ $pasanganUsiaSuburKb->pasangan_usia_subur }}</td>
            </tr>

            <tr class="table-primary"><th colspan="2">B. Data Keluarga Berencana (KB)</th></tr>
            <tr>
                <th>Pengguna KB Suntik</th>
                <td>{{ $pasanganUsiaSuburKb->pengguna_kontrasepsi_suntik }}</td>
            </tr>
            <tr>
                <th>Pengguna KB Spiral</th>
                <td>{{ $pasanganUsiaSuburKb->pengguna_kontrasepsi_spiral }}</td>
            </tr>
            <tr>
                <th>Pengguna KB Kondom</th>
                <td>{{ $pasanganUsiaSuburKb->pengguna_kontrasepsi_kondom }}</td>
            </tr>
            <tr>
                <th>Pengguna KB Pil</th>
                <td>{{ $pasanganUsiaSuburKb->pengguna_kontrasepsi_pil }}</td>
            </tr>
            <tr>
                <th>Vasektomi</th>
                <td>{{ $pasanganUsiaSuburKb->pengguna_kontrasepsi_vasektomi }}</td>
            </tr>
            <tr>
                <th>Tubektomi</th>
                <td>{{ $pasanganUsiaSuburKb->pengguna_kontrasepsi_tubektomi }}</td>
            </tr>
            <tr>
                <th>KB Alamiah</th>
                <td>{{ $pasanganUsiaSuburKb->pengguna_kb_alamiah }}</td>
            </tr>
            <tr>
                <th>KB Tradisional</th>
                <td>{{ $pasanganUsiaSuburKb->pengguna_kb_tradisional }}</td>
            </tr>
            <tr>
                <th>Metode Lainnya</th>
                <td>{{ $pasanganUsiaSuburKb->pengguna_kontrasepsi_lainnya }}</td>
            </tr>

            <tr class="table-primary"><th colspan="2">C. Akseptor dan Non-KB</th></tr>
            <tr>
                <th>Jumlah Akseptor KB</th>
                <td>{{ $pasanganUsiaSuburKb->akseptor_kb }}</td>
            </tr>
            <tr>
                <th>PUS Tidak Menggunakan KB</th>
                <td>{{ $pasanganUsiaSuburKb->pus_tidak_menggunakan_kb }}</td>
            </tr>
        </table>

        <a href="{{ route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection

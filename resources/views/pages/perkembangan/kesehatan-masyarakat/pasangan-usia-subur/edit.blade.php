@extends('layouts.master')

@section('title', 'Edit - PERKEMBANGAN PASANGAN USIA SUBUR DAN KB')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>

            <h5 class="mt-4">A. Data Pasangan Usia Subur</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Remaja Putri (12–17 tahun)</label>
                    <input type="number" name="remaja_putri_12_17" class="form-control" value="{{ $data->remaja_putri_12_17 }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Perempuan Usia Subur (15–49 tahun)</label>
                    <input type="number" name="perempuan_usia_subur_15_49" class="form-control" value="{{ $data->perempuan_usia_subur_15_49 }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Wanita Kawin Muda (&lt; 16 tahun)</label>
                    <input type="number" name="wanita_kawin_muda_kurang_16" class="form-control" value="{{ $data->wanita_kawin_muda_kurang_16 }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Pasangan Usia Subur (PUS)</label>
                    <input type="number" name="pasangan_usia_subur" class="form-control" value="{{ $data->pasangan_usia_subur }}">
                </div>
            </div>

            <h5 class="mt-4">B. Data Keluarga Berencana (KB)</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Pengguna KB Suntik</label>
                    <input type="number" name="pengguna_kontrasepsi_suntik" class="form-control" value="{{ $data->pengguna_kontrasepsi_suntik }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Pengguna KB Spiral</label>
                    <input type="number" name="pengguna_kontrasepsi_spiral" class="form-control" value="{{ $data->pengguna_kontrasepsi_spiral }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Pengguna KB Kondom</label>
                    <input type="number" name="pengguna_kontrasepsi_kondom" class="form-control" value="{{ $data->pengguna_kontrasepsi_kondom }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Pengguna KB Pil</label>
                    <input type="number" name="pengguna_kontrasepsi_pil" class="form-control" value="{{ $data->pengguna_kontrasepsi_pil }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Metode Vasektomi</label>
                    <input type="number" name="pengguna_kontrasepsi_vasektomi" class="form-control" value="{{ $data->pengguna_kontrasepsi_vasektomi }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Metode Tubektomi</label>
                    <input type="number" name="pengguna_kontrasepsi_tubektomi" class="form-control" value="{{ $data->pengguna_kontrasepsi_tubektomi }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Metode KB Alami</label>
                    <input type="number" name="pengguna_kb_alamiah" class="form-control" value="{{ $data->pengguna_kb_alamiah }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>KB Tradisional</label>
                    <input type="number" name="pengguna_kb_tradisional" class="form-control" value="{{ $data->pengguna_kb_tradisional }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Lainnya</label>
                    <input type="number" name="pengguna_kontrasepsi_lainnya" class="form-control" value="{{ $data->pengguna_kontrasepsi_lainnya }}">
                </div>
            </div>

            <h5 class="mt-4">C. Tambahan</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Akseptor KB</label>
                    <input type="number" name="akseptor_kb" class="form-control" value="{{ $data->akseptor_kb }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>PUS Tidak Menggunakan KB</label>
                    <input type="number" name="pus_tidak_menggunakan_kb" class="form-control" value="{{ $data->pus_tidak_menggunakan_kb }}">
                </div>
            </div>

            <button type="submit" class="btn btn-warning mt-3">Perbarui</button>
            <a href="{{ route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
</div>
@endsection

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
                    <label>Pasangan Usia Subur (PUS)</label>
                    <input type="number" name="pasangan_usia_subur" class="form-control" value="{{ $data->pasangan_usia_subur }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Wanita Kawin Muda (&lt; 16 tahun)</label>
                    <input type="number" name="wanita_kawin_muda_16" class="form-control" value="{{ $data->wanita_kawin_muda_16 }}">
                </div>
            </div>

            <h5 class="mt-4">B. Data Keluarga Berencana (KB)</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Pengguna KB Suntik</label>
                    <input type="number" name="alat_kontrasepsi_suntik" class="form-control" value="{{ $data->alat_kontrasepsi_suntik }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Pengguna KB Spiral</label>
                    <input type="number" name="metode_spiral" class="form-control" value="{{ $data->metode_spiral }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Pengguna KB Kondom</label>
                    <input type="number" name="kontrasepsi_kondom" class="form-control" value="{{ $data->kontrasepsi_kondom }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Pengguna KB Pil</label>
                    <input type="number" name="kontrasepsi_pil" class="form-control" value="{{ $data->kontrasepsi_pil }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Metode Vasektomi</label>
                    <input type="number" name="metode_vasektomi" class="form-control" value="{{ $data->metode_vasektomi }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Metode Tubektomi</label>
                    <input type="number" name="metode_tubektomi" class="form-control" value="{{ $data->metode_tubektomi }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Metode KB Alami</label>
                    <input type="number" name="metode_kb_alamiah" class="form-control" value="{{ $data->metode_kb_alamiah }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>KB Tradisional</label>
                    <input type="number" name="kb_tradisional" class="form-control" value="{{ $data->kb_tradisional }}">
                </div>
            </div>

            <h5 class="mt-4">C. Tambahan (Opsional)</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Total Peserta KB Aktif</label>
                    <input type="number" name="total_kb_aktif" class="form-control" value="{{ $data->total_kb_aktif }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Jumlah Akseptor Baru</label>
                    <input type="number" name="akseptor_baru" class="form-control" value="{{ $data->akseptor_baru }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Jumlah Drop Out</label>
                    <input type="number" name="drop_out" class="form-control" value="{{ $data->drop_out }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Total Peserta KB</label>
                    <input type="number" name="total_kb" class="form-control" value="{{ $data->total_kb }}">
                </div>
            </div>

            <button type="submit" class="btn btn-warning mt-3">Perbarui</button>
            <a href="{{ route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
</div>
@endsection

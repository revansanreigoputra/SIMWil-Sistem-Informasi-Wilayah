@extends('layouts.master')

@section('title', 'Tambah - Cakupan Imunisasi')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <h5 class="mt-4 mb-3 text-primary">Data Cakupan Imunisasi</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Bayi usia 2 bulan</label>
                    <input type="number" name="bayi_usia_2_bulan" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Bayi DPT1 + BCG + Polio 1</label>
                    <input type="number" name="bayi_2_bulan_dpt1_bcg_polio1" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Bayi usia 3 bulan</label>
                    <input type="number" name="bayi_usia_3_bulan" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Bayi DPT2 + Polio 2</label>
                    <input type="number" name="bayi_3_bulan_dpt2_polio2" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Bayi usia 4 bulan</label>
                    <input type="number" name="bayi_usia_4_bulan" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Bayi DPT3 + Polio 3</label>
                    <input type="number" name="bayi_4_bulan_dpt3_polio3" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Bayi usia 9 bulan</label>
                    <input type="number" name="bayi_usia_9_bulan" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Bayi Campak</label>
                    <input type="number" name="bayi_9_bulan_campak" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Bayi Imunisasi Cacar</label>
                    <input type="number" name="bayi_imunisasi_cacar" class="form-control">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Edit - SEKTOR LISTRIK, GAS DAN AIR MINUM')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            EDIT SEKTOR LISTRIK, GAS DAN AIR MINUM
        </div>
        <div class="card-body">
            <form action="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.update', $sektor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal *</label>
                    <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal', $sektor->tanggal) }}" required>
                </div>

                {{-- Sub sektor Listrik --}}
                <h5 class="card-header bg-primary text-white fw-bold">Subsektor Listrik</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Jumlah jenis kegiatan pembangkitan dan penyaluran tenaga listrik</label>
                        <input type="number" class="form-control" name="jumlah_kegiatan_listrik" value="{{ old('jumlah_kegiatan_listrik', $sektor->jumlah_kegiatan_listrik) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Jumlah nilai produksi listrik</label>
                        <input type="number" class="form-control" name="nilai_produksi_listrik" value="{{ old('nilai_produksi_listrik', $sektor->nilai_produksi_listrik) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Jumlah total nilai transaksi</label>
                        <input type="number" class="form-control" name="total_nilai_transaksi_listrik" value="{{ old('total_nilai_transaksi_listrik', $sektor->total_nilai_transaksi_listrik) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Jumlah biaya antara yang dikeluarkan</label>
                        <input type="number" class="form-control" name="biaya_antara_listrik" value="{{ old('biaya_antara_listrik', $sektor->biaya_antara_listrik) }}">
                    </div>
                </div>

                {{-- Sub sektor Gas --}}
                <h5 class="card-header bg-primary text-white fw-bold">Subsektor Gas</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Jumlah kegiatan penyediaan gas</label>
                        <input type="number" class="form-control" name="jumlah_kegiatan_gas" value="{{ old('jumlah_kegiatan_gas', $sektor->jumlah_kegiatan_gas) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nilai aset produksi gas</label>
                        <input type="number" class="form-control" name="nilai_aset_produksi_gas" value="{{ old('nilai_aset_produksi_gas', $sektor->nilai_aset_produksi_gas) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nilai transaksi gas</label>
                        <input type="number" class="form-control" name="nilai_transaksi_gas" value="{{ old('nilai_transaksi_gas', $sektor->nilai_transaksi_gas) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Biaya antara yang dikeluarkan</label>
                        <input type="number" class="form-control" name="biaya_antara_gas" value="{{ old('biaya_antara_gas', $sektor->biaya_antara_gas) }}">
                    </div>
                </div>

                {{-- Sub sektor Air Minum --}}
                <h5 class="card-header bg-primary text-white fw-bold">Subsektor Air Minum</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Jumlah jenis kegiatan penyediaan dan penyaluran air minum</label>
                        <input type="number" class="form-control" name="jumlah_kegiatan_air" value="{{ old('jumlah_kegiatan_air', $sektor->jumlah_kegiatan_air) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nilai aset penyediaan air minum</label>
                        <input type="number" class="form-control" name="nilai_aset_air" value="{{ old('nilai_aset_air', $sektor->nilai_aset_air) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nilai produksi air minum</label>
                        <input type="number" class="form-control" name="nilai_produksi_air" value="{{ old('nilai_produksi_air', $sektor->nilai_produksi_air) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nilai transaksi air minum</label>
                        <input type="number" class="form-control" name="nilai_transaksi_air" value="{{ old('nilai_transaksi_air', $sektor->nilai_transaksi_air) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Biaya antara yang dikeluarkan</label>
                        <input type="number" class="form-control" name="biaya_antara_air" value="{{ old('biaya_antara_air', $sektor->biaya_antara_air) }}">
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-warning">Perbarui</button>
                    <a href="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

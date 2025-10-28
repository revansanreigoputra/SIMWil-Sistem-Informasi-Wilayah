@extends('layouts.master')

@section('title', 'Edit Data - Sektor Perdagangan, Hotel, dan Restoran')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Data Sektor Perdagangan, Hotel, dan Restoran</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.update', $perdagangan->id) }}" method="POST">
            @csrf
            @method('PUT')

                </div>

                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $perdagangan->tanggal }}" required>
                </div>
            </div>

            <hr>
            <h5>Sub-Sektor Perdagangan Besar</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Total Jenis Perdagangan Besar</label>
                    <input type="number" name="total_jenis_perdagangan_besar" class="form-control" value="{{ $perdagangan->total_jenis_perdagangan_besar }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Nilai Transaksi Besar</label>
                    <input type="number" name="total_nilai_transaksi_besar" class="form-control" value="{{ $perdagangan->total_nilai_transaksi_besar }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Aset Perdagangan Besar</label>
                    <input type="number" name="total_aset_perdagangan_besar" class="form-control" value="{{ $perdagangan->total_aset_perdagangan_besar }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Biaya Dikeluarkan Besar</label>
                    <input type="number" name="total_biaya_dikeluarkan_besar" class="form-control" value="{{ $perdagangan->total_biaya_dikeluarkan_besar }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Biaya Antara Besar</label>
                    <input type="number" name="total_biaya_antara_besar" class="form-control" value="{{ $perdagangan->total_biaya_antara_besar }}">
                </div>
            </div>

            <hr>
            <h5>Sub-Sektor Perdagangan Kecil</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Total Jenis Perdagangan Kecil</label>
                    <input type="number" name="total_jenis_perdagangan_kecil" class="form-control" value="{{ $perdagangan->total_jenis_perdagangan_kecil }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Nilai Transaksi Kecil</label>
                    <input type="number" name="total_nilai_transaksi_kecil" class="form-control" value="{{ $perdagangan->total_nilai_transaksi_kecil }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Biaya Dikeluarkan Kecil</label>
                    <input type="number" name="total_biaya_dikeluarkan_kecil" class="form-control" value="{{ $perdagangan->total_biaya_dikeluarkan_kecil }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Aset Perdagangan Kecil</label>
                    <input type="number" name="total_aset_perdagangan_kecil" class="form-control" value="{{ $perdagangan->total_aset_perdagangan_kecil }}">
                </div>
            </div>

            <hr>
            <h5>Sub-Sektor Hotel</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Total Penginapan</label>
                    <input type="number" name="total_penginapan" class="form-control" value="{{ $perdagangan->total_penginapan }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Pendapatan Hotel</label>
                    <input type="number" name="total_pendapatan_hotel" class="form-control" value="{{ $perdagangan->total_pendapatan_hotel }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Biaya Pemeliharaan Hotel</label>
                    <input type="number" name="total_biaya_pemeliharaan_hotel" class="form-control" value="{{ $perdagangan->total_biaya_pemeliharaan_hotel }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Biaya Antara Hotel</label>
                    <input type="number" name="total_biaya_antara_hotel" class="form-control" value="{{ $perdagangan->total_biaya_antara_hotel }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Pendapatan Diperoleh Hotel</label>
                    <input type="number" name="total_pendapatan_diperoleh_hotel" class="form-control" value="{{ $perdagangan->total_pendapatan_diperoleh_hotel }}">
                </div>
            </div>

            <hr>
            <h5>Sub-Sektor Restoran</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Total Tempat Konsumsi</label>
                    <input type="number" name="total_tempat_konsumsi" class="form-control" value="{{ $perdagangan->total_tempat_konsumsi }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Biaya Konsumsi Dikeluarkan</label>
                    <input type="number" name="biaya_konsumsi_dikeluarkan" class="form-control" value="{{ $perdagangan->biaya_konsumsi_dikeluarkan }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Biaya Lainnya Restoran</label>
                    <input type="number" name="biaya_lainnya_restoran" class="form-control" value="{{ $perdagangan->biaya_lainnya_restoran }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Pendapatan Restoran</label>
                    <input type="number" name="total_pendapatan_restoran" class="form-control" value="{{ $perdagangan->total_pendapatan_restoran }}">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Data</button>
               <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.index') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

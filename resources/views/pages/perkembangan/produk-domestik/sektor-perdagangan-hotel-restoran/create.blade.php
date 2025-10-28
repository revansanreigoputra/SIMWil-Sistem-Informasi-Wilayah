@extends('layouts.master')

@section('title', 'Tambah Data - SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.store') }}" method="POST">
            @csrf

                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
            </div>

            {{-- SUB-SEKTOR PERDAGANGAN BESAR --}}
            <h5 class="fw-bold text-primary mt-3">🟠 Sub-Sektor Perdagangan Besar</h5>
            <div class="row">
                <div class="col-md-3">
                    <label>Jumlah Jenis Perdagangan Besar</label>
                    <input type="number" name="total_jenis_perdagangan_besar" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Total Nilai Transaksi</label>
                    <input type="number" name="total_nilai_transaksi_besar" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Total Aset</label>
                    <input type="number" name="total_aset_perdagangan_besar" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Total Biaya Dikeluarkan</label>
                    <input type="number" name="total_biaya_dikeluarkan_besar" class="form-control">
                </div>
                <div class="col-md-3 mt-3">
                    <label>Total Biaya Antara</label>
                    <input type="number" name="total_biaya_antara_besar" class="form-control">
                </div>
            </div>

            {{-- SUB-SEKTOR PERDAGANGAN KECIL --}}
            <h5 class="fw-bold text-primary mt-4">🟠 Sub-Sektor Perdagangan Kecil</h5>
            <div class="row">
                <div class="col-md-3">
                    <label>Jumlah Jenis Perdagangan Kecil</label>
                    <input type="number" name="total_jenis_perdagangan_kecil" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Total Nilai Transaksi</label>
                    <input type="number" name="total_nilai_transaksi_kecil" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Total Biaya Dikeluarkan</label>
                    <input type="number" name="total_biaya_dikeluarkan_kecil" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Total Aset</label>
                    <input type="number" name="total_aset_perdagangan_kecil" class="form-control">
                </div>
            </div>

            {{-- SUB-SEKTOR HOTEL --}}
            <h5 class="fw-bold text-primary mt-4">🟠 Sub-Sektor Hotel</h5>
            <div class="row">
                <div class="col-md-3">
                    <label>Jumlah Penginapan</label>
                    <input type="number" name="total_penginapan" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Total Pendapatan Hotel</label>
                    <input type="number" name="total_pendapatan_hotel" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Total Biaya Pemeliharaan Hotel</label>
                    <input type="number" name="total_biaya_pemeliharaan_hotel" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Total Biaya Antara Hotel</label>
                    <input type="number" name="total_biaya_antara_hotel" class="form-control">
                </div>
                <div class="col-md-3 mt-3">
                    <label>Total Pendapatan Diperoleh Hotel</label>
                    <input type="number" name="total_pendapatan_diperoleh_hotel" class="form-control">
                </div>
            </div>

            {{-- SUB-SEKTOR RESTORAN --}}
            <h5 class="fw-bold text-primary mt-4">Sub-Sektor Restoran</h5>
            <div class="row">
                <div class="col-md-3">
                    <label>Total Tempat Konsumsi</label>
                    <input type="number" name="total_tempat_konsumsi" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Biaya Konsumsi Dikeluarkan</label>
                    <input type="number" name="biaya_konsumsi_dikeluarkan" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Biaya Lainnya Restoran</label>
                    <input type="number" name="biaya_lainnya_restoran" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Total Pendapatan Restoran</label>
                    <input type="number" name="total_pendapatan_restoran" class="form-control">
                </div>
            </div>

            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

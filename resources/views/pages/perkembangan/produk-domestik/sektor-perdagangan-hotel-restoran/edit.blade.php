@extends('layouts.master')

@section('title', 'Edit Data - SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white fw-bold">
        Edit Data Sektor Perdagangan, Hotel, dan Restoran
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.update', $perdagangan->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Tanggal --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $perdagangan->tanggal }}" required>
                </div>
            </div>

            {{-- SUB-SEKTOR PERDAGANGAN BESAR --}}
            <div class="border rounded p-3 mb-4">
                <h5 class="fw-bold text-primary mb-3">🟠 Sub-Sektor Perdagangan Besar</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Jumlah Jenis Perdagangan Besar</label>
                        <input type="number" name="total_jenis_perdagangan_besar" class="form-control" value="{{ $perdagangan->total_jenis_perdagangan_besar }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Nilai Transaksi</label>
                        <input type="number" name="total_nilai_transaksi_besar" class="form-control" value="{{ $perdagangan->total_nilai_transaksi_besar }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Aset</label>
                        <input type="number" name="total_aset_perdagangan_besar" class="form-control" value="{{ $perdagangan->total_aset_perdagangan_besar }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Biaya Dikeluarkan</label>
                        <input type="number" name="total_biaya_dikeluarkan_besar" class="form-control" value="{{ $perdagangan->total_biaya_dikeluarkan_besar }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label mt-3">Total Biaya Antara</label>
                        <input type="number" name="total_biaya_antara_besar" class="form-control" value="{{ $perdagangan->total_biaya_antara_besar }}">
                    </div>
                </div>
            </div>

            {{-- SUB-SEKTOR PERDAGANGAN KECIL --}}
            <div class="border rounded p-3 mb-4">
                <h5 class="fw-bold text-primary mb-3">🟠 Sub-Sektor Perdagangan Kecil</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Jumlah Jenis Perdagangan Kecil</label>
                        <input type="number" name="total_jenis_perdagangan_kecil" class="form-control" value="{{ $perdagangan->total_jenis_perdagangan_kecil }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Nilai Transaksi</label>
                        <input type="number" name="total_nilai_transaksi_kecil" class="form-control" value="{{ $perdagangan->total_nilai_transaksi_kecil }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Biaya Dikeluarkan</label>
                        <input type="number" name="total_biaya_dikeluarkan_kecil" class="form-control" value="{{ $perdagangan->total_biaya_dikeluarkan_kecil }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Aset</label>
                        <input type="number" name="total_aset_perdagangan_kecil" class="form-control" value="{{ $perdagangan->total_aset_perdagangan_kecil }}">
                    </div>
                </div>
            </div>

            {{-- SUB-SEKTOR HOTEL --}}
            <div class="border rounded p-3 mb-4">
                <h5 class="fw-bold text-primary mb-3">🟠 Sub-Sektor Hotel</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Jumlah Penginapan</label>
                        <input type="number" name="total_penginapan" class="form-control" value="{{ $perdagangan->total_penginapan }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Pendapatan Hotel</label>
                        <input type="number" name="total_pendapatan_hotel" class="form-control" value="{{ $perdagangan->total_pendapatan_hotel }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Biaya Pemeliharaan</label>
                        <input type="number" name="total_biaya_pemeliharaan_hotel" class="form-control" value="{{ $perdagangan->total_biaya_pemeliharaan_hotel }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Biaya Antara Hotel</label>
                        <input type="number" name="total_biaya_antara_hotel" class="form-control" value="{{ $perdagangan->total_biaya_antara_hotel }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label mt-3">Total Pendapatan Diperoleh</label>
                        <input type="number" name="total_pendapatan_diperoleh_hotel" class="form-control" value="{{ $perdagangan->total_pendapatan_diperoleh_hotel }}">
                    </div>
                </div>
            </div>

            {{-- SUB-SEKTOR RESTORAN --}}
            <div class="border rounded p-3 mb-4">
                <h5 class="fw-bold text-primary mb-3">🟠 Sub-Sektor Restoran</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Total Tempat Konsumsi</label>
                        <input type="number" name="total_tempat_konsumsi" class="form-control" value="{{ $perdagangan->total_tempat_konsumsi }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Biaya Konsumsi Dikeluarkan</label>
                        <input type="number" name="biaya_konsumsi_dikeluarkan" class="form-control" value="{{ $perdagangan->biaya_konsumsi_dikeluarkan }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Biaya Lainnya</label>
                        <input type="number" name="biaya_lainnya_restoran" class="form-control" value="{{ $perdagangan->biaya_lainnya_restoran }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Pendapatan Restoran</label>
                        <input type="number" name="total_pendapatan_restoran" class="form-control" value="{{ $perdagangan->total_pendapatan_restoran }}">
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-primary px-4">💾 Update</button>
                <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.index') }}" class="btn btn-secondary px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Tambah Data - SEKTOR ANGKUTAN & KOMUNIKASI')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Formulir Tambah Data Sektor Angkutan & Komunikasi</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-angkutan.store') }}" method="POST">
            @csrf

            {{-- ==================== Tanggal ==================== --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
            </div>

            {{-- ==================== Sub-Sektor Angkutan ==================== --}}
            <h6 class="mt-4 fw-bold text-primary">Sub-Sektor Angkutan</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah Kegiatan Pengangkutan</label>
                    <input type="number" name="jml_kegiatan_pengangkutan" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Total Kendaraan Angkutan</label>
                    <input type="number" name="jml_total_kendaraan_angkutan" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nilai Total Transaksi Pengangkutan (Rp)</label>
                    <input type="number" name="nilai_total_transaksi_pengangkutan" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nilai Total Biaya Dikeluarkan (Rp)</label>
                    <input type="number" name="nilai_total_biaya_dikeluarkan" class="form-control" value="0" required>
                </div>
            </div>

            {{-- ==================== Sub-Sektor Jasa Penunjang Angkutan ==================== --}}
            <h6 class="mt-4 fw-bold text-primary">Sub-Sektor Jasa Penunjang Angkutan</h6>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Jumlah Kegiatan Pelabuhan/Terminal</label>
                    <input type="number" name="jml_kegiatan_pelabuhan_terminal" class="form-control" value="0" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Total Nilai Transaksi Penunjang (Rp)</label>
                    <input type="number" name="total_nilai_transaksi_penunjang" class="form-control" value="0" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nilai Biaya Antara Dikeluarkan (Rp)</label>
                    <input type="number" name="nilai_biaya_antara_dikeluarkan" class="form-control" value="0" required>
                </div>
            </div>

            {{-- ==================== Sub-Sektor Komunikasi ==================== --}}
            <h6 class="mt-4 fw-bold text-primary">Sub-Sektor Komunikasi</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah Kegiatan Informasi & Telekomunikasi</label>
                    <input type="number" name="jml_kegiatan_informasi_telekomunikasi" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nilai Aset Telekomunikasi (Rp)</label>
                    <input type="number" name="jml_nilai_aset_telekomunikasi" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nilai Transaksi Informasi (Rp)</label>
                    <input type="number" name="nilai_transaksi_informasi" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Biaya Dikeluarkan (Rp)</label>
                    <input type="number" name="biaya_dikeluarkan" class="form-control" value="0" required>
                </div>
            </div>

            {{-- ==================== Tombol Aksi ==================== --}}
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('perkembangan.produk-domestik.sektor-angkutan.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

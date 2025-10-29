@extends('layouts.master')

@section('title', 'Tambah Data - SEKTOR KEUANGAN, REAL ESTATE DAN JASA PERUSAHAAN')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Formulir Tambah Data Sektor Keuangan, Real Estate, dan Jasa Perusahaan</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.store') }}" method="POST">
            @csrf

            <div class="row">
                {{-- ==================== Tanggal ==================== --}}
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
            </div>

            {{-- ==================== Sub-Sektor Perbankan ==================== --}}
            <h6 class="mt-4 fw-bold text-primary">Sub-Sektor Perbankan</h6>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Jumlah Transaksi Perbankan</label>
                    <input type="number" name="jumlah_transaksi_perbankan" class="form-control" value="0" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Jumlah nilai transaksi perbankan (Rp)</label>
                    <input type="number" name="nilai_transaksi_perbankan" class="form-control" value="0" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Jumlah biaya yang dikeluarkan (Rp)</label>
                    <input type="number" name="biaya_perbankan" class="form-control" value="0" required>
                </div>
            </div>

            {{-- ==================== Sub-Sektor Lembaga Keuangan Bukan Bank ==================== --}}
            <h6 class="mt-4 fw-bold text-primary">Sub-Sektor Lembaga Keuangan Bukan Bank</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah lembaga keuangan bukan bank (Unit)</label>
                    <input type="number" name="jumlah_lembaga_bukan_bank" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah kegiatan jasa penunjang lembaga keuangan bukan bank (Jenis)</label>
                    <input type="number" name="jumlah_kegiatan_lembaga_bukan_bank" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nilai transaksi lembaga keuangan bukan bank (Rp)</label>
                    <input type="number" name="nilai_transaksi_bukan_bank" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Biaya yang dikeluarkan (Rp)</label>
                    <input type="number" name="biaya_bukan_bank" class="form-control" value="0" required>
                </div>
            </div>

            {{-- ==================== Sub-Sektor Sewa Bangunan ==================== --}}
            <h6 class="mt-4 fw-bold text-primary">Sub-Sektor Sewa Bangunan</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah usaha persewaan bangunan dan tanah (Unit)</label>
                    <input type="number" name="jumlah_usaha_sewa" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Total nilai persewaan yang dicapai (Rp)</label>
                    <input type="number" name="nilai_sewa" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Biaya yang dikeluarkan (Rp)</label>
                    <input type="number" name="biaya_sewa" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Biaya lainnya (Rp)</label>
                    <input type="number" name="biaya_lain_sewa" class="form-control" value="0" required>
                </div>
            </div>

            {{-- ==================== Sub-Sektor Jasa Perusahaan ==================== --}}
            <h6 class="mt-4 fw-bold text-primary">Sub-Sektor Jasa Perusahaan</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah perusahaan jasa (Jenis)</label>
                    <input type="number" name="jumlah_perusahaan_jasa" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nilai transaksi perusahaan jasa (Rp)</label>
                    <input type="number" name="nilai_transaksi_perusahaan" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Biaya yang dikeluarkan (Rp)</label>
                    <input type="number" name="biaya_perusahaan" class="form-control" value="0" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Biaya lainnya (Rp)</label>
                    <input type="number" name="biaya_lain_perusahaan" class="form-control" value="0" required>
                </div>
            </div>

            {{-- ==================== Tombol Aksi ==================== --}}
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

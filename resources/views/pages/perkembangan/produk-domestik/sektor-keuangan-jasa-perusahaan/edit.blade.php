@extends('layouts.master')

@section('title', 'Edit Data - SEKTOR KEUANGAN, JASA & PERUSAHAAN')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white fw-bold">
        Edit Data Sektor Keuangan, Jasa & Perusahaan
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.update', $sektorKeuanganJasaPerusahaan->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Tanggal --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" 
                           value="{{ $sektorKeuanganJasaPerusahaan->tanggal }}" required>
                </div>
            </div>

            {{-- SUB-SEKTOR BANK --}}
            <div class="border rounded p-3 mb-4">
                <h5 class="fw-bold text-primary mb-3">🏦 Sub-Sektor Bank</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Jumlah Transaksi Perbankan</label>
                        <input type="number" name="jumlah_transaksi_perbankan" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->jumlah_transaksi_perbankan }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Nilai Transaksi Perbankan</label>
                        <input type="number" name="nilai_transaksi_perbankan" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->nilai_transaksi_perbankan }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Biaya Perbankan</label>
                        <input type="number" name="biaya_perbankan" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->biaya_perbankan }}">
                    </div>
                </div>
            </div>

            {{-- SUB-SEKTOR LEMBAGA KEUANGAN BUKAN BANK --}}
            <div class="border rounded p-3 mb-4">
                <h5 class="fw-bold text-primary mb-3">🏛️ Sub-Sektor Lembaga Keuangan Bukan Bank</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Jumlah Lembaga Bukan Bank</label>
                        <input type="number" name="jumlah_lembaga_bukan_bank" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->jumlah_lembaga_bukan_bank }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Jumlah Kegiatan Lembaga</label>
                        <input type="number" name="jumlah_kegiatan_lembaga_bukan_bank" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->jumlah_kegiatan_lembaga_bukan_bank }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Nilai Transaksi Bukan Bank</label>
                        <input type="number" name="nilai_transaksi_bukan_bank" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->nilai_transaksi_bukan_bank }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Biaya Bukan Bank</label>
                        <input type="number" name="biaya_bukan_bank" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->biaya_bukan_bank }}">
                    </div>
                </div>
            </div>

            {{-- SUB-SEKTOR SEWA BANGUNAN --}}
            <div class="border rounded p-3 mb-4">
                <h5 class="fw-bold text-primary mb-3">🏘️ Sub-Sektor Sewa Bangunan</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Jumlah Usaha Sewa</label>
                        <input type="number" name="jumlah_usaha_sewa" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->jumlah_usaha_sewa }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Nilai Sewa</label>
                        <input type="number" name="nilai_sewa" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->nilai_sewa }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Biaya Sewa</label>
                        <input type="number" name="biaya_sewa" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->biaya_sewa }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Biaya Lain Sewa</label>
                        <input type="number" name="biaya_lain_sewa" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->biaya_lain_sewa }}">
                    </div>
                </div>
            </div>

            {{-- SUB-SEKTOR JASA PERUSAHAAN --}}
            <div class="border rounded p-3 mb-4">
                <h5 class="fw-bold text-primary mb-3">🏢 Sub-Sektor Jasa Perusahaan</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Jumlah Perusahaan Jasa</label>
                        <input type="number" name="jumlah_perusahaan_jasa" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->jumlah_perusahaan_jasa }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Nilai Transaksi Perusahaan</label>
                        <input type="number" name="nilai_transaksi_perusahaan" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->nilai_transaksi_perusahaan }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Biaya Perusahaan</label>
                        <input type="number" name="biaya_perusahaan" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->biaya_perusahaan }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Biaya Lain Perusahaan</label>
                        <input type="number" name="biaya_lain_perusahaan" class="form-control"
                               value="{{ $sektorKeuanganJasaPerusahaan->biaya_lain_perusahaan }}">
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-success px-4">💾 Simpan Perubahan</button>
                <a href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.index') }}" class="btn btn-secondary px-4">Batal</a>
            </div>

        </form>
    </div>
</div>
@endsection

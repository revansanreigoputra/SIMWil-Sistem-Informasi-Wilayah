@extends('layouts.master')

@section('title', 'Edit - SEKTOR KEUANGAN, JASA & PERUSAHAAN')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.update', $sektorKeuanganJasaPerusahaan->id) }}" method="POST">
            @csrf
            @method('PUT')

          

                {{-- Tanggal --}}
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->tanggal }}">
                </div>
            </div>

            <hr>
            <h5 class="mt-3">Sub-Sektor Bank</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Jumlah Transaksi Perbankan</label>
                    <input type="number" name="jumlah_transaksi_perbankan" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->jumlah_transaksi_perbankan }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Nilai Transaksi Perbankan</label>
                    <input type="number" name="nilai_transaksi_perbankan" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->nilai_transaksi_perbankan }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Biaya Perbankan</label>
                    <input type="number" name="biaya_perbankan" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->biaya_perbankan }}">
                </div>
            </div>

            <hr>
            <h5 class="mt-3">Sub-Sektor Lembaga Keuangan Bukan Bank</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Jumlah Lembaga Bukan Bank</label>
                    <input type="number" name="jumlah_lembaga_bukan_bank" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->jumlah_lembaga_bukan_bank }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Jumlah Kegiatan Lembaga</label>
                    <input type="number" name="jumlah_kegiatan_lembaga_bukan_bank" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->jumlah_kegiatan_lembaga_bukan_bank }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Nilai Transaksi Bukan Bank</label>
                    <input type="number" name="nilai_transaksi_bukan_bank" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->nilai_transaksi_bukan_bank }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Biaya Bukan Bank</label>
                    <input type="number" name="biaya_bukan_bank" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->biaya_bukan_bank }}">
                </div>
            </div>

            <hr>
            <h5 class="mt-3">Sub-Sektor Sewa Bangunan</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Jumlah Usaha Sewa</label>
                    <input type="number" name="jumlah_usaha_sewa" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->jumlah_usaha_sewa }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Nilai Sewa</label>
                    <input type="number" name="nilai_sewa" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->nilai_sewa }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Biaya Sewa</label>
                    <input type="number" name="biaya_sewa" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->biaya_sewa }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Biaya Lain Sewa</label>
                    <input type="number" name="biaya_lain_sewa" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->biaya_lain_sewa }}">
                </div>
            </div>

            <hr>
            <h5 class="mt-3">Sub-Sektor Jasa Perusahaan</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Jumlah Perusahaan Jasa</label>
                    <input type="number" name="jumlah_perusahaan_jasa" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->jumlah_perusahaan_jasa }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Nilai Transaksi Perusahaan</label>
                    <input type="number" name="nilai_transaksi_perusahaan" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->nilai_transaksi_perusahaan }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Biaya Perusahaan</label>
                    <input type="number" name="biaya_perusahaan" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->biaya_perusahaan }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Biaya Lain Perusahaan</label>
                    <input type="number" name="biaya_lain_perusahaan" class="form-control" value="{{ $sektorKeuanganJasaPerusahaan->biaya_lain_perusahaan }}">
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

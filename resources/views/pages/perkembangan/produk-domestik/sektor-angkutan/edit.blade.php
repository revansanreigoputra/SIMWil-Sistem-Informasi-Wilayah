@extends('layouts.master')

@section('title', 'Edit - SEKTOR ANGKUTAN & KOMUNIKASI')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-angkutan.update', $angkutan->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Tanggal --}}
            <div class="col-md-6 mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $angkutan->tanggal }}">
            </div>

            <hr>
            <h5 class="mt-3">Sub-Sektor Angkutan</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Jumlah Kegiatan Pengangkutan</label>
                    <input type="number" name="jml_kegiatan_pengangkutan" class="form-control" value="{{ $angkutan->jml_kegiatan_pengangkutan }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Total Kendaraan Angkutan</label>
                    <input type="number" name="jml_total_kendaraan_angkutan" class="form-control" value="{{ $angkutan->jml_total_kendaraan_angkutan }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Nilai Total Transaksi Pengangkutan (Rp)</label>
                    <input type="number" name="nilai_total_transaksi_pengangkutan" class="form-control" value="{{ $angkutan->nilai_total_transaksi_pengangkutan }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Nilai Total Biaya Dikeluarkan (Rp)</label>
                    <input type="number" name="nilai_total_biaya_dikeluarkan" class="form-control" value="{{ $angkutan->nilai_total_biaya_dikeluarkan }}">
                </div>
            </div>

            <hr>
            <h5 class="mt-3">Sub-Sektor Jasa Penunjang Angkutan</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Jumlah Kegiatan Pelabuhan/Terminal</label>
                    <input type="number" name="jml_kegiatan_pelabuhan_terminal" class="form-control" value="{{ $angkutan->jml_kegiatan_pelabuhan_terminal }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Total Nilai Transaksi Penunjang (Rp)</label>
                    <input type="number" name="total_nilai_transaksi_penunjang" class="form-control" value="{{ $angkutan->total_nilai_transaksi_penunjang }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Nilai Biaya Antara Dikeluarkan (Rp)</label>
                    <input type="number" name="nilai_biaya_antara_dikeluarkan" class="form-control" value="{{ $angkutan->nilai_biaya_antara_dikeluarkan }}">
                </div>
            </div>

            <hr>
            <h5 class="mt-3">Sub-Sektor Komunikasi</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Jumlah Kegiatan Informasi & Telekomunikasi</label>
                    <input type="number" name="jml_kegiatan_informasi_telekomunikasi" class="form-control" value="{{ $angkutan->jml_kegiatan_informasi_telekomunikasi }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Nilai Aset Telekomunikasi (Rp)</label>
                    <input type="number" name="jml_nilai_aset_telekomunikasi" class="form-control" value="{{ $angkutan->jml_nilai_aset_telekomunikasi }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Nilai Transaksi Informasi (Rp)</label>
                    <input type="number" name="nilai_transaksi_informasi" class="form-control" value="{{ $angkutan->nilai_transaksi_informasi }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Biaya Dikeluarkan (Rp)</label>
                    <input type="number" name="biaya_dikeluarkan" class="form-control" value="{{ $angkutan->biaya_dikeluarkan }}">
                </div>
            </div>

            <div class="text-end mt-3">
                <a href="{{ route('perkembangan.produk-domestik.sektor-angkutan.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Tambah Data Wajib Belajar 9 Tahun')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Wajib Belajar 9 Tahun</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Desa</label>
                    <select name="desa_id" id="desa_id" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4 mb-2">
                    <label>Jumlah Penduduk Usia 7–15 Tahun (Orang)</label>
                    <input type="number" name="penduduk" id="penduduk" class="form-control" value="{{ old('penduduk') }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Jumlah Masih Sekolah (Orang)</label>
                    <input type="number" name="masih_sekolah" id="masih_sekolah" class="form-control" value="{{ old('masih_sekolah') }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Jumlah Tidak Sekolah (Orang)</label>
                    <input type="number" name="tidak_sekolah" id="tidak_sekolah" class="form-control" value="{{ old('tidak_sekolah') }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Persentase Masih Sekolah (%)</label>
                    <input type="number" id="persentase_masih" name="persentase_masih" class="form-control" value="{{ old('persentase_masih') }}" readonly>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Persentase Tidak Sekolah (%)</label>
                    <input type="number" id="persentase_tidak" name="persentase_tidak" class="form-control" value="{{ old('persentase_tidak') }}" readonly>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const penduduk = document.getElementById('penduduk');
        const masihSekolah = document.getElementById('masih_sekolah');
        const tidakSekolah = document.getElementById('tidak_sekolah');
        const persentaseMasih = document.getElementById('persentase_masih');
        const persentaseTidak = document.getElementById('persentase_tidak');

        function hitungPersentase() {
            const total = parseFloat(penduduk.value) || 0;
            const masih = parseFloat(masihSekolah.value) || 0;
            const tidak = parseFloat(tidakSekolah.value) || 0;

            if (total > 0) {
                persentaseMasih.value = ((masih / total) * 100).toFixed(2);
                persentaseTidak.value = ((tidak / total) * 100).toFixed(2);
            } else {
                persentaseMasih.value = 0;
                persentaseTidak.value = 0;
            }
        }

        [penduduk, masihSekolah, tidakSekolah].forEach(el => el.addEventListener('input', hitungPersentase));
    });
</script>
@endpush

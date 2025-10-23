@extends('layouts.master')

@section('title', 'Tambah Data Pendapatan Riil Keluarga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Pendapatan Riil Keluarga</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Desa</label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('id_desa') == $desa->id ? 'selected' : '' }}>
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
                    <label>Jumlah KK</label>
                    <input type="number" name="kk" id="kk" class="form-control" value="{{ old('kk') }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Jumlah Anggota Keluarga (AK)</label>
                    <input type="number" name="ak" id="ak" class="form-control" value="{{ old('ak') }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Pendapatan Kepala Keluarga (Rp)</label>
                    <input type="number" name="pendapatan_kk" id="pendapatan_kk" class="form-control" value="{{ old('pendapatan_kk') }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Pendapatan Anggota Keluarga (Rp)</label>
                    <input type="number" name="pendapatan_ak" id="pendapatan_ak" class="form-control" value="{{ old('pendapatan_ak') }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Total Pendapatan (Rp)</label>
                    <input type="number" id="total1" name="total1" class="form-control" value="{{ old('total1') }}" readonly>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Pendapatan per Anggota (Rp)</label>
                    <input type="number" id="total2" name="total2" class="form-control" value="{{ old('total2') }}" readonly>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ak = document.getElementById('ak');
        const pendKK = document.getElementById('pendapatan_kk');
        const pendAK = document.getElementById('pendapatan_ak');
        const total1 = document.getElementById('total1');
        const total2 = document.getElementById('total2');

        function hitung() {
            const kkVal = parseFloat(pendKK.value) || 0;
            const akVal = parseFloat(pendAK.value) || 0;
            const anggota = parseFloat(ak.value) || 1;
            const tot = kkVal + akVal;
            const perAnggota = tot / anggota;
            total1.value = tot;
            total2.value = perAnggota.toFixed(2);
        }

        [ak, pendKK, pendAK].forEach(el => el.addEventListener('input', hitung));
    });
</script>
@endpush

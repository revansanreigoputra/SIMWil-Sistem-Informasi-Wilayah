@extends('layouts.master')

@section('title', 'Tambah Data Penguasaan Aset Tanah')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Penguasaan Aset Tanah</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.aset_tanah.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>
                <!-- Desa otomatis dari session -->
                <input type="hidden" name="id_desa" value="{{ session('desa_id') }}">
            </div>

            <div class="row mt-2">
                <div class="col-md-4 mb-2">
                    <label>Tidak Memiliki Tanah</label>
                    <input type="number" name="tidak_memiliki" class="form-control jumlah-field" value="{{ old('tidak_memiliki',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>Kurang dari 0,1 Ha</label>
                    <input type="number" name="tanah1" class="form-control jumlah-field" value="{{ old('tanah1',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>0,1 – 0,2 Ha</label>
                    <input type="number" name="tanah2" class="form-control jumlah-field" value="{{ old('tanah2',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>0,21 – 0,5 Ha</label>
                    <input type="number" name="tanah3" class="form-control jumlah-field" value="{{ old('tanah3',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>0,51 – 1 Ha</label>
                    <input type="number" name="tanah4" class="form-control jumlah-field" value="{{ old('tanah4',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>1,1 – 2 Ha</label>
                    <input type="number" name="tanah5" class="form-control jumlah-field" value="{{ old('tanah5',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>2,1 – 3 Ha</label>
                    <input type="number" name="tanah6" class="form-control jumlah-field" value="{{ old('tanah6',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>3,1 – 4 Ha</label>
                    <input type="number" name="tanah7" class="form-control jumlah-field" value="{{ old('tanah7',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>4,1 – 5 Ha</label>
                    <input type="number" name="tanah8" class="form-control jumlah-field" value="{{ old('tanah8',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>5,1 – 7 Ha</label>
                    <input type="number" name="tanah9" class="form-control jumlah-field" value="{{ old('tanah9',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>7,1 – 10 Ha</label>
                    <input type="number" name="tanah10" class="form-control jumlah-field" value="{{ old('tanah10',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>10,1 Ha</label>
                    <input type="number" name="tanah11" class="form-control jumlah-field" value="{{ old('tanah11',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>Lebih dari 10 Ha</label>
                    <input type="number" name="memiliki_lebih" class="form-control jumlah-field" value="{{ old('memiliki_lebih',0) }}" placeholder="Masukkan jumlah">
                </div>
                <div class="col-md-4 mb-2">
                    <label>Jumlah Total</label>
                    <input type="number" name="jumlah" id="jumlah_total" class="form-control" value="{{ old('jumlah',0) }}" readonly>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.aset_tanah.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    // Hitung otomatis total
    function hitungTotal() {
        let total = 0;
        document.querySelectorAll('.jumlah-field').forEach(input => {
            total += parseInt(input.value) || 0;
        });
        document.getElementById('jumlah_total').value = total;
    }

    document.querySelectorAll('.jumlah-field').forEach(input => {
        input.addEventListener('input', hitungTotal);
    });

    // Hitung saat load halaman
    hitungTotal();
</script>
@endpush

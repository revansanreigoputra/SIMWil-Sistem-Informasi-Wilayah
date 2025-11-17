@extends('layouts.master')

@section('title', 'Edit Data Penguasaan Aset Tanah')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Penguasaan Aset Tanah</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.aset_tanah.update', $asetTanah->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $asetTanah->tanggal) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Desa</label>
                    <input type="text" class="form-control" value="{{ $asetTanah->desa->nama_desa ?? '-' }}" readonly>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4 mb-2">
                    <label>Tidak Memiliki Tanah</label>
                    <input type="number" name="tidak_memiliki" id="tidak_memiliki" class="form-control" value="{{ old('tidak_memiliki', $asetTanah->tidak_memiliki) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>Kurang dari 0,1 Ha</label>
                    <input type="number" name="tanah1" id="tanah1" class="form-control" value="{{ old('tanah1', $asetTanah->tanah1) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>0,1 – 0,2 Ha</label>
                    <input type="number" name="tanah2" id="tanah2" class="form-control" value="{{ old('tanah2', $asetTanah->tanah2) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>0,21 – 0,5 Ha</label>
                    <input type="number" name="tanah3" id="tanah3" class="form-control" value="{{ old('tanah3', $asetTanah->tanah3) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>0,51 – 1 Ha</label>
                    <input type="number" name="tanah4" id="tanah4" class="form-control" value="{{ old('tanah4', $asetTanah->tanah4) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>1,1 – 2 Ha</label>
                    <input type="number" name="tanah5" id="tanah5" class="form-control" value="{{ old('tanah5', $asetTanah->tanah5) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>2,1 – 3 Ha</label>
                    <input type="number" name="tanah6" id="tanah6" class="form-control" value="{{ old('tanah6', $asetTanah->tanah6) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>3,1 – 4 Ha</label>
                    <input type="number" name="tanah7" id="tanah7" class="form-control" value="{{ old('tanah7', $asetTanah->tanah7) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>4,1 – 5 Ha</label>
                    <input type="number" name="tanah8" id="tanah8" class="form-control" value="{{ old('tanah8', $asetTanah->tanah8) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>5,1 – 7 Ha</label>
                    <input type="number" name="tanah9" id="tanah9" class="form-control" value="{{ old('tanah9', $asetTanah->tanah9) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>7,1 – 10 Ha</label>
                    <input type="number" name="tanah10" id="tanah10" class="form-control" value="{{ old('tanah10', $asetTanah->tanah10) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>10,1 Ha</label>
                    <input type="number" name="tanah11" id="tanah11" class="form-control" value="{{ old('tanah11', $asetTanah->tanah11) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>Lebih dari 10 Ha</label>
                    <input type="number" name="memiliki_lebih" id="memiliki_lebih" class="form-control" value="{{ old('memiliki_lebih', $asetTanah->memiliki_lebih) }}">
                </div>
                <div class="col-md-4 mb-2">
                    <label>Jumlah Total</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah', $asetTanah->jumlah) }}" readonly>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.aset_tanah.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    function hitungTotal() {
        let total = 0;
        const fields = ['tidak_memiliki','tanah1','tanah2','tanah3','tanah4','tanah5','tanah6','tanah7','tanah8','tanah9','tanah10','tanah11','memiliki_lebih'];
        fields.forEach(id => {
            let val = parseInt(document.getElementById(id).value) || 0;
            total += val;
        });
        document.getElementById('jumlah').value = total;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const fields = ['tidak_memiliki','tanah1','tanah2','tanah3','tanah4','tanah5','tanah6','tanah7','tanah8','tanah9','tanah10','tanah11','memiliki_lebih'];
        fields.forEach(id => {
            document.getElementById(id).addEventListener('input', hitungTotal);
        });
        hitungTotal(); // hitung saat load
    });
</script>
@endpush

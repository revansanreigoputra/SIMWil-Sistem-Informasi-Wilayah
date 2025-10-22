@extends('layouts.master')

@section('title', 'Tambah Data Pemilik Aset Ekonomi Lainnya')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Pemilik Aset Ekonomi Lainnya</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="desa_id" class="form-label">Desa</label>
                <select name="desa_id" id="desa_id" class="form-control" required>
                    <option value="">-- Pilih Desa --</option>
                    @foreach ($desas as $desa)
                        <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jenis_aset_lainnya_id" class="form-label">Jenis Aset</label>
                <select name="jenis_aset_lainnya_id" id="jenis_aset_lainnya_id" class="form-control" required>
                    <option value="">-- Pilih Jenis Aset --</option>
                    @foreach ($jenisAsets as $aset)
                        <option value="{{ $aset->id }}">{{ $aset->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

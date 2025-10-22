@extends('layouts.master')

@section('title', 'Edit Data Pemilik Aset Ekonomi Lainnya')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Pemilik Aset Ekonomi Lainnya</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="desa_id" class="form-label">Desa</label>
                <select name="desa_id" id="desa_id" class="form-control" required>
                    @foreach ($desas as $desa)
                        <option value="{{ $desa->id }}" {{ $desa->id == $item->desa_id ? 'selected' : '' }}>
                            {{ $desa->nama_desa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jenis_aset_lainnya_id" class="form-label">Jenis Aset</label>
                <select name="jenis_aset_lainnya_id" id="jenis_aset_lainnya_id" class="form-control" required>
                    @foreach ($jenisAsets as $aset)
                        <option value="{{ $aset->id }}" {{ $aset->id == $item->jenis_aset_lainnya_id ? 'selected' : '' }}>
                            {{ $aset->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ $item->tanggal }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" value="{{ $item->jumlah }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

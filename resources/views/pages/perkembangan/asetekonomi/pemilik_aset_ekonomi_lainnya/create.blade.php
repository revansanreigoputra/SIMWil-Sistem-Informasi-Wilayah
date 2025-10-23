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

            <div class="row">
                {{-- Desa dihapus karena otomatis dari session --}}
                
                <div class="col-md-6 mb-2">
                    <label>Jenis Aset</label>
                    <select name="id_jenis_aset_lainnya" id="id_jenis_aset_lainnya" class="form-control" required>
                        <option value="">-- Pilih Jenis Aset --</option>
                        @foreach ($jenisAsets as $aset)
                            <option value="{{ $aset->id }}" {{ old('id_jenis_aset_lainnya') == $aset->id ? 'selected' : '' }}>
                                {{ $aset->nama_jenis_aset }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

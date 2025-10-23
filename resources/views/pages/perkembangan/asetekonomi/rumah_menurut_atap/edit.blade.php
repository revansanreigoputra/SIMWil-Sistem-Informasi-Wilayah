@extends('layouts.master')

@section('title', 'Edit Data Rumah Menurut Atap')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Rumah Menurut Atap</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_desa" class="form-label">Desa</label>
                    <select name="id_desa" id="id_desa" class="form-select" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('id_desa', $item->id_desa) == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="id_aset_atap" class="form-label">Jenis Atap</label>
                    <select name="id_aset_atap" id="id_aset_atap" class="form-select" required>
                        <option value="">-- Pilih Jenis Atap --</option>
                        @foreach($jenisAtaps as $jenis)
                            <option value="{{ $jenis->id }}" {{ old('id_aset_atap', $item->id_aset_atap) == $jenis->id ? 'selected' : '' }}>
                                {{ $jenis->nama_jenis_atap }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" 
                           class="form-control" 
                           value="{{ old('tanggal', $item->tanggal) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah" class="form-label">Jumlah Rumah</label>
                    <input type="number" name="jumlah" id="jumlah" 
                           class="form-control" 
                           min="0" 
                           value="{{ old('jumlah', $item->jumlah) }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

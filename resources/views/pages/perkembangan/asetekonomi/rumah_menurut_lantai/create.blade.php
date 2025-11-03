@extends('layouts.master')

@section('title', 'Tambah Data Rumah Menurut Lantai')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Rumah Menurut Lantai</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.rumah_menurut_lantai.store') }}" method="POST">
            @csrf

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
                    <label for="desa_id" class="form-label">Desa</label>
                    <select name="desa_id" id="desa_id" class="form-select" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jenis_lantai_id" class="form-label">Jenis Lantai</label>
                    <select name="jenis_lantai_id" id="jenis_lantai_id" class="form-select" required>
                        <option value="">-- Pilih Jenis Lantai --</option>
                        @foreach($jenisLantais as $jenis)
                            <option value="{{ $jenis->id }}" {{ old('jenis_lantai_id') == $jenis->id ? 'selected' : '' }}>
                                {{ $jenis->nama_lantai }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" min="0" value="{{ old('jumlah', 0) }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_lantai.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

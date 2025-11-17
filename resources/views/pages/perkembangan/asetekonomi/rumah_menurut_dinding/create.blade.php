@extends('layouts.master')

@section('title', 'Tambah Data Rumah Menurut Dinding')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Rumah Menurut Dinding</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.rumah_menurut_dinding.store') }}" method="POST">
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
                    <label for="id_aset_dinding" class="form-label">Jenis Dinding</label>
                    <select name="id_aset_dinding" id="id_aset_dinding" class="form-select" required>
                        <option value="">-- Pilih Jenis Dinding --</option>
                        @foreach($asetDindings as $dinding)
                            <option value="{{ $dinding->id }}">{{ $dinding->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" min="0" value="0" required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_dinding.index') }}" class="btn btn-secondary">
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

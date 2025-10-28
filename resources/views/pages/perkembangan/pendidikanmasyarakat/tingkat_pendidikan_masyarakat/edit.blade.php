@extends('layouts.master')

@section('title', 'Edit Data Tingkat Pendidikan Masyarakat')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Tingkat Pendidikan Masyarakat</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" 
                           value="{{ old('tanggal', $item->tanggal) }}" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4 mb-2">
                    <label>Tidak Tamat SD</label>
                    <input type="number" name="tidak_tamat_sd" class="form-control" 
                           value="{{ old('tidak_tamat_sd', $item->tidak_tamat_sd) }}">
                </div>

                <div class="col-md-4 mb-2">
                    <label>SD</label>
                    <input type="number" name="sd" class="form-control" 
                           value="{{ old('sd', $item->sd) }}">
                </div>

                <div class="col-md-4 mb-2">
                    <label>SLTP</label>
                    <input type="number" name="sltp" class="form-control" 
                           value="{{ old('sltp', $item->sltp) }}">
                </div>

                <div class="col-md-4 mb-2">
                    <label>SLTA</label>
                    <input type="number" name="slta" class="form-control" 
                           value="{{ old('slta', $item->slta) }}">
                </div>

                <div class="col-md-4 mb-2">
                    <label>Diploma</label>
                    <input type="number" name="diploma" class="form-control" 
                           value="{{ old('diploma', $item->diploma) }}">
                </div>

                <div class="col-md-4 mb-2">
                    <label>Sarjana</label>
                    <input type="number" name="sarjana" class="form-control" 
                           value="{{ old('sarjana', $item->sarjana) }}">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4 mb-2">
                    <label>% Buta Huruf</label>
                    <input type="number" step="0.01" name="p_buta" class="form-control" 
                           value="{{ old('p_buta', $item->p_buta) }}">
                </div>

                <div class="col-md-4 mb-2">
                    <label>% Tamat Sekolah</label>
                    <input type="number" step="0.01" name="p_tamat" class="form-control" 
                           value="{{ old('p_tamat', $item->p_tamat) }}">
                </div>

                <div class="col-md-4 mb-2">
                    <label>% Penyandang Cacat</label>
                    <input type="number" step="0.01" name="p_cacat" class="form-control" 
                           value="{{ old('p_cacat', $item->p_cacat) }}">
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index') }}" 
                   class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Data Tingkat Pendidikan Masyarakat</h4>

    <form action="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Dropdown Desa --}}
        <div class="mb-3">
            <label for="desa_id" class="form-label">Desa</label>
            <select name="desa_id" id="desa_id" class="form-control" required>
                <option value="">-- Pilih Desa --</option>
                @foreach ($desas as $desa)
                    <option value="{{ $desa->id }}" {{ $item->desa_id == $desa->id ? 'selected' : '' }}>
                        {{ $desa->nama_desa }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tahun & Tingkat Pendidikan --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" name="tahun" id="tahun" class="form-control" value="{{ $item->tahun }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="tidak_tamat_sd" class="form-label">Tidak Tamat SD</label>
                <input type="number" name="tidak_tamat_sd" id="tidak_tamat_sd" class="form-control" value="{{ $item->tidak_tamat_sd }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="sd" class="form-label">SD</label>
                <input type="number" name="sd" id="sd" class="form-control" value="{{ $item->sd }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="sltp" class="form-label">SLTP</label>
                <input type="number" name="sltp" id="sltp" class="form-control" value="{{ $item->sltp }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="slta" class="form-label">SLTA</label>
                <input type="number" name="slta" id="slta" class="form-control" value="{{ $item->slta }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="diploma" class="form-label">Diploma</label>
                <input type="number" name="diploma" id="diploma" class="form-control" value="{{ $item->diploma }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="sarjana" class="form-label">Sarjana</label>
                <input type="number" name="sarjana" id="sarjana" class="form-control" value="{{ $item->sarjana }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="p_buta" class="form-label">% Buta Huruf</label>
                <input type="number" step="0.01" name="p_buta" id="p_buta" class="form-control" value="{{ $item->p_buta }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="p_tamat" class="form-label">% Tamat Sekolah</label>
                <input type="number" step="0.01" name="p_tamat" id="p_tamat" class="form-control" value="{{ $item->p_tamat }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="p_cacat" class="form-label">% Penyandang Cacat</label>
            <input type="number" step="0.01" name="p_cacat" id="p_cacat" class="form-control" value="{{ $item->p_cacat }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

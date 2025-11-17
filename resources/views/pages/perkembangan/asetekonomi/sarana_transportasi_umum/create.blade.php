@extends('layouts.master')

@section('title', 'Tambah Aset Sarana Transportasi Umum')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Aset Sarana Transportasi Umum</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id_desa" value="{{ session('desa_id') }}">

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control"
                        required value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-2">
                    <label class="form-label">Jenis Aset <span class="text-danger">*</span></label>
                    <select name="jenis_aset" class="form-control" required>
                        <option value="">-- Pilih Jenis Aset --</option>
                        @foreach($jenis_aset_list as $aset)
                            <option value="{{ $aset->id }}"
                                {{ old('jenis_aset') == $aset->id ? 'selected' : '' }}>
                                {{ $aset->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenis_aset')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label class="form-label">Jumlah Pemilik</label>
                    <input type="number" name="jumlah_pemilik" class="form-control" min="0"
                        value="{{ old('jumlah_pemilik', 0) }}">
                </div>

                <div class="col-md-6 mb-2">
                    <label class="form-label">Jumlah Aset</label>
                    <input type="number" name="jumlah_aset" class="form-control" min="0"
                        value="{{ old('jumlah_aset', 0) }}">
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.index') }}"
                    class="btn btn-secondary">Kembali</a>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </div>
</div>
@endsection

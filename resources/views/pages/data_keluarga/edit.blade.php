@extends('layouts.master')

@section('title', 'Edit Data Kepala Keluarga')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Edit Data Kepala Keluarga</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('data_keluarga.update', $dataKeluarga->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Bagian Data KK --}}
                <div class="card-body">
                    <div class="row g-2">
                        <div class="card bg-card-inside-form p-2">
                            <div class=" p-1">
                                <label class="form-label">Nomor KK *</label>
                                <input type="text" name="no_kk" class="form-control"
                                    value="{{ old('no_kk', $dataKeluarga->no_kk) }}" required>
                            </div>
                            <div class=" ">
                                <label class="form-label">Nama Kepala Keluarga *</label>
                                <input type="text" name="kepala_keluarga" class="form-control"
                                    value="{{ old('kepala_keluarga', $dataKeluarga->kepala_keluarga) }}" required>
                            </div>
                        </div>
                        <div class="card bg-card-inside-form p-2">


                            <div class="p-1">
                                <label class="form-label">Alamat *</label>
                                <textarea name="alamat" class="form-control" rows="1" required>{{ old('alamat', $dataKeluarga->alamat) }}</textarea>
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">RT *</label>
                                <input type="text" name="rt" class="form-control"
                                    value="{{ old('rt', $dataKeluarga->rt) }}" required>
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">RW *</label>
                                <input type="text" name="rw" class="form-control"
                                    value="{{ old('rw', $dataKeluarga->rw) }}" required>
                            </div>


                            <div class="p-1">
                                <label class="form-label">Desa *</label>
                                <input type="text" name="desa_name" class="form-control"
                                    value="{{ $dataKeluarga->desas->nama_desa ?? '' }}" disabled>
                                <input type="hidden" name="desa_id" value="{{ $dataKeluarga->desas->id ?? '' }}">
                            </div>
                            <div class=" ">
                                <label class="form-label">Kecamatan *</label>
                                <input type="text" name="kecamatan_name" class="form-control"
                                    value="{{ $dataKeluarga->kecamatans->nama_kecamatan ?? '' }}" disabled>
                                <input type="hidden" name="kecamatan_id" value="{{ $dataKeluarga->kecamatans->id ?? '' }}">

                            </div>
                        </div>
                        <div class="p-1">
                            <label class="form-label">Nama Pengisi *</label>
                            <input type="text" name="nama_pengisi_name" class="form-control"
                                value="{{ old('nama_pengisi_name', $dataKeluarga->perangkatDesas->nama ?? '') }}" required>
                            <input type="hidden" name="nama_pengisi_id"
                                value="{{ $dataKeluarga->perangkatDesas->id ?? '' }}">
                        </div>


                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('data_keluarga.index') }}" class="btn btn-warning">Kembali</a>
                        </div>
            </form>
        </div>
    </div>
@endsection
{{--   --}}

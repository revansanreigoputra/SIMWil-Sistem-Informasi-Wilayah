@extends('layouts.master')

@section('title', 'Edit Data Kartu Keluarga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Kartu Keluarga (KK)</h5>
    </div>
    <div class="card-body">
        {{-- Form Update KK --}}
        <form action="{{ route('data_keluarga.update', $kk->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                {{-- Nomor KK --}}
                <div class="col-md-6">
                    <label for="no_kk" class="form-label">Nomor KK <span class="text-danger">*</span></label>
                    <input type="text" name="no_kk" id="no_kk"
                           class="form-control @error('no_kk') is-invalid @enderror"
                           value="{{ old('no_kk', $kk->no_kk) }}" placeholder="Masukkan 16 digit Nomor KK" required>
                    @error('no_kk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Kepala Keluarga --}}
                <div class="col-md-6">
                    <label for="kepala_keluarga" class="form-label">Nama Kepala Keluarga <span class="text-danger">*</span></label>
                    <input type="text" name="kepala_keluarga" id="kepala_keluarga"
                           class="form-control @error('kepala_keluarga') is-invalid @enderror"
                           value="{{ old('kepala_keluarga', $kk->kepala_keluarga) }}" placeholder="Sesuai yang tertera di KK" required>
                    @error('kepala_keluarga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Alamat --}}
                <div class="col-12">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat" id="alamat"
                              class="form-control @error('alamat') is-invalid @enderror"
                              rows="2" placeholder="Alamat lengkap sesuai KK" required>{{ old('alamat', $kk->alamat) }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- RT --}}
                <div class="col-md-6">
                    <label for="rt" class="form-label">RT <span class="text-danger">*</span></label>
                    <input type="text" name="rt" id="rt"
                           class="form-control @error('rt') is-invalid @enderror"
                           value="{{ old('rt', $kk->rt) }}" placeholder="Contoh: 001" required>
                    @error('rt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- RW --}}
                <div class="col-md-6">
                    <label for="rw" class="form-label">RW <span class="text-danger">*</span></label>
                    <input type="text" name="rw" id="rw"
                           class="form-control @error('rw') is-invalid @enderror"
                           value="{{ old('rw', $kk->rw) }}" placeholder="Contoh: 005" required>
                    @error('rw') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Dusun --}}
                <div class="col-md-6">
                    <label for="dusun" class="form-label">Nama Dusun</label>
                    <input type="text" name="dusun" id="dusun"
                           class="form-control" value="{{ old('dusun', $kk->dusun) }}" placeholder="Nama dusun/kampung">
                </div>

                {{-- Bulan Pendataan --}}
                <div class="col-md-6">
                    <label for="bulan" class="form-label">Bulan Pendataan <span class="text-danger">*</span></label>
                    <input type="text" name="bulan" id="bulan" class="form-control"
                           value="{{ old('bulan', $kk->bulan) }}" required>
                </div>

                {{-- Tahun Pendataan --}}
                <div class="col-md-6">
                    <label for="tahun" class="form-label">Tahun Pendataan <span class="text-danger">*</span></label>
                    <input type="text" name="tahun" id="tahun" class="form-control"
                           value="{{ old('tahun', $kk->tahun) }}" required>
                </div>

                {{-- Nama Pengisi --}}
                <div class="col-md-6">
                    <label for="nama_pengisi" class="form-label">Nama Pengisi</label>
                    <input type="text" name="nama_pengisi" id="nama_pengisi" class="form-control"
                           value="{{ old('nama_pengisi', $kk->nama_pengisi) }}">
                </div>

                {{-- Pekerjaan Pengisi --}}
                <div class="col-md-6">
                    <label for="pekerjaan" class="form-label">Pekerjaan Pengisi</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                           value="{{ old('pekerjaan', $kk->pekerjaan) }}">
                </div>

                {{-- Jabatan Pengisi --}}
                <div class="col-md-6">
                    <label for="jabatan" class="form-label">Jabatan Pengisi</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control"
                           value="{{ old('jabatan', $kk->jabatan) }}">
                </div>

                {{-- Sumber Data --}}
                <div class="col-12">
                    <label for="sumber_data" class="form-label">Sumber Data</label>
                    <textarea name="sumber_data" id="sumber_data" class="form-control" rows="2">{{ old('sumber_data', $kk->sumber_data) }}</textarea>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('data_keluarga.index') }}" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

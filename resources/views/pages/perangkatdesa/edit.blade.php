@extends('layouts.master')

@section('title', 'Edit Perangkat Desa')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Perangkat Desa</h3>
                </div>

                <div class="card-body">
                    {{-- Error Alert --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('perangkat_desa.update', $perangkatDesa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="desa_id">Desa <span class="text-danger">*</span></label>
                                <select name="desa_id" id="desa_id"
                                    class="form-control @error('desa_id') is-invalid @enderror" required>
                                    <option value="">Pilih Desa</option>
                                    @foreach ($desas as $desa)
                                        <option value="{{ $desa->id }}" {{ old('desa_id', $perangkatDesa->desa_id) == $desa->id ? 'selected' : '' }}>
                                            {{ $desa->nama_desa }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('desa_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="jabatan_id">Jabatan <span class="text-danger">*</span></label>
                                <select name="jabatan_id" id="jabatan_id"
                                    class="form-control @error('jabatan_id') is-invalid @enderror" required>
                                    <option value="">Pilih Jabatan</option>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}" {{ old('jabatan_id', $perangkatDesa->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                                            {{ $jabatan->nama_jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jabatan_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $perangkatDesa->nama) }}" required>
                                @error('nama')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    value="{{ old('tanggal_lahir', $perangkatDesa->tanggal_lahir ? \Carbon\Carbon::parse($perangkatDesa->tanggal_lahir)->format('Y-m-d') : '') }}">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin', $perangkatDesa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin', $perangkatDesa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="golongan_darah">Golongan Darah</label>
                                <input type="text" name="golongan_darah" id="golongan_darah"
                                    class="form-control @error('golongan_darah') is-invalid @enderror"
                                    value="{{ old('golongan_darah', $perangkatDesa->golongan_darah) }}" maxlength="3">
                                @error('golongan_darah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kontak">Kontak</label>
                                <input type="text" name="kontak" id="kontak"
                                    class="form-control @error('kontak') is-invalid @enderror"
                                    value="{{ old('kontak', $perangkatDesa->kontak) }}">
                                @error('kontak')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="masa_jabatan">Masa Jabatan</label>
                                <input type="text" name="masa_jabatan" id="masa_jabatan"
                                    class="form-control @error('masa_jabatan') is-invalid @enderror"
                                    value="{{ old('masa_jabatan', $perangkatDesa->masa_jabatan) }}">
                                @error('masa_jabatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_istri">Nama Pasangan</label>
                                <input type="text" name="nama_istri" id="nama_istri"
                                    class="form-control @error('nama_istri') is-invalid @enderror"
                                    value="{{ old('nama_istri', $perangkatDesa->nama_istri) }}">
                                @error('nama_istri')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="jumlah_anak">Jumlah Anak</label>
                                <input type="number" name="jumlah_anak" id="jumlah_anak"
                                    class="form-control @error('jumlah_anak') is-invalid @enderror"
                                    value="{{ old('jumlah_anak', $perangkatDesa->jumlah_anak) }}" min="0">
                                @error('jumlah_anak')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="foto"
                                    class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                                @if ($perangkatDesa->foto)
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $perangkatDesa->foto) }}" alt="Foto"
                                            class="img-thumbnail" style="max-width: 100px;">
                                    </div>
                                @endif
                                @error('foto')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                rows="3">{{ old('alamat', $perangkatDesa->alamat) }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sambutan">Sambutan</label>
                            <textarea name="sambutan" id="sambutan"
                                class="form-control @error('sambutan') is-invalid @enderror"
                                rows="3">{{ old('sambutan', $perangkatDesa->sambutan) }}</textarea>
                            @error('sambutan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <a href="{{ route('perangkat_desa.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

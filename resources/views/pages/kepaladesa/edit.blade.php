@extends('layouts.master')

@section('title', 'Edit Kepala Desa')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Data Kepala Desa</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('kepala-desa.update', $kepalaDesa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama_kepala_desa" class="form-label">Nama Kepala Desa <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_kepala_desa') is-invalid @enderror" 
                               id="nama_kepala_desa" name="nama_kepala_desa" 
                               value="{{ old('nama_kepala_desa', $kepalaDesa->nama_kepala_desa) }}" required>
                        @error('nama_kepala_desa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                               id="tanggal_lahir" name="tanggal_lahir" 
                               value="{{ old('tanggal_lahir', $kepalaDesa->tanggal_lahir ? $kepalaDesa->tanggal_lahir->format('Y-m-d') : '') }}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('jenis_kelamin', $kepalaDesa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $kepalaDesa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="golongan_darah" class="form-label">Golongan Darah</label>
                        <select class="form-select @error('golongan_darah') is-invalid @enderror" 
                                id="golongan_darah" name="golongan_darah">
                            <option value="">Pilih Golongan Darah</option>
                            <option value="A" {{ old('golongan_darah', $kepalaDesa->golongan_darah) == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('golongan_darah', $kepalaDesa->golongan_darah) == 'B' ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ old('golongan_darah', $kepalaDesa->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                            <option value="O" {{ old('golongan_darah', $kepalaDesa->golongan_darah) == 'O' ? 'selected' : '' }}>O</option>
                        </select>
                        @error('golongan_darah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak</label>
                        <input type="text" class="form-control @error('kontak') is-invalid @enderror" 
                               id="kontak" name="kontak" 
                               value="{{ old('kontak', $kepalaDesa->kontak) }}">
                        @error('kontak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="masa_jabatan" class="form-label">Masa Jabatan</label>
                        <input type="text" class="form-control @error('masa_jabatan') is-invalid @enderror" 
                               id="masa_jabatan" name="masa_jabatan" 
                               value="{{ old('masa_jabatan', $kepalaDesa->masa_jabatan) }}" placeholder="Contoh: 2020-2025">
                        @error('masa_jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama_istri" class="form-label">Nama Istri</label>
                        <input type="text" class="form-control @error('nama_istri') is-invalid @enderror" 
                               id="nama_istri" name="nama_istri" 
                               value="{{ old('nama_istri', $kepalaDesa->nama_istri) }}">
                        @error('nama_istri')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jumlah_anak" class="form-label">Jumlah Anak</label>
                        <input type="number" class="form-control @error('jumlah_anak') is-invalid @enderror" 
                               id="jumlah_anak" name="jumlah_anak" 
                               value="{{ old('jumlah_anak', $kepalaDesa->jumlah_anak) }}" min="0">
                        @error('jumlah_anak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                          id="alamat" name="alamat" rows="3">{{ old('alamat', $kepalaDesa->alamat) }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sambutan" class="form-label">Sambutan</label>
                <textarea class="form-control @error('sambutan') is-invalid @enderror" 
                          id="sambutan" name="sambutan" rows="4">{{ old('sambutan', $kepalaDesa->sambutan) }}</textarea>
                @error('sambutan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                @if($kepalaDesa->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $kepalaDesa->foto) }}" alt="{{ $kepalaDesa->nama_kepala_desa }}" 
                         class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                    <div class="form-text">Foto saat ini</div>
                </div>
                @endif
                <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                       id="foto" name="foto" accept="image/*">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB</div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('kepala-desa.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
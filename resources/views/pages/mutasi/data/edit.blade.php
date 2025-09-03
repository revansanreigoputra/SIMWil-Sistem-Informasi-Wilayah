@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-user-edit text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark">Edit Data Mutasi Penduduk</h4>
    </div>
@endsection

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i> Edit Data Mutasi</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('mutasi.data.update', $mutasi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="nik" class="form-label fw-bold">NIK</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-id-card text-primary"></i></span>
                            <input type="text" id="nik" name="nik" class="form-control" 
                                value="{{ old('nik', $mutasi->nik) }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nomor" class="form-label fw-bold">Nomor Surat</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-hashtag text-primary"></i></span>
                            <input type="text" id="nomor" name="nomor" class="form-control" 
                                value="{{ old('nomor', $mutasi->nomor) }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal" class="form-label fw-bold">Tanggal Mutasi</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-primary"></i></span>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" 
                                value="{{ old('tanggal', $mutasi->tanggal->format('Y-m-d')) }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="jenis" class="form-label fw-bold">Jenis Mutasi</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-random text-primary"></i></span>
                            <select id="jenis" name="jenis" class="form-select" required>
                                <option value="">-- Pilih Jenis Mutasi --</option>
                                <option value="pendatang" {{ $mutasi->jenis == 'pendatang' ? 'selected' : '' }}>Pendatang</option>
                                <option value="pindah" {{ $mutasi->jenis == 'pindah' ? 'selected' : '' }}>Pindah</option>
                                <option value="meninggal" {{ $mutasi->jenis == 'meninggal' ? 'selected' : '' }}>Meninggal</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="penyebab" class="form-label fw-bold">Penyebab</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-info-circle text-primary"></i></span>
                            <input type="text" id="penyebab" name="penyebab" class="form-control" 
                                value="{{ old('penyebab', $mutasi->penyebab) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="kecamatan" class="form-label fw-bold">Kecamatan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt text-primary"></i></span>
                            <input type="text" id="kecamatan" name="kecamatan" class="form-control" 
                                value="{{ old('kecamatan', $mutasi->kecamatan) }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="desa" class="form-label fw-bold">Desa</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-home text-primary"></i></span>
                            <input type="text" id="desa" name="desa" class="form-control" 
                                value="{{ old('desa', $mutasi->desa) }}" required>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <a href="{{ route('mutasi.data.index') }}" class="btn btn-outline-secondary px-4 me-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

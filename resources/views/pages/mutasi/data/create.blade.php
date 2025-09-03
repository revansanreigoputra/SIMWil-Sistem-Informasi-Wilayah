@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-user-plus text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark">Tambah Data Mutasi Penduduk</h4>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i> Form Tambah Mutasi</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('mutasi.data.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="nik" class="form-label fw-bold">NIK</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-id-card text-primary"></i></span>
                            <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukkan NIK" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nomor" class="form-label fw-bold">Nomor Surat</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-hashtag text-primary"></i></span>
                            <input type="text" id="nomor" name="nomor" class="form-control" placeholder="Masukkan Nomor Surat" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal" class="form-label fw-bold">Tanggal Mutasi</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-primary"></i></span>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="jenis" class="form-label fw-bold">Jenis Mutasi</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-random text-primary"></i></span>
                            <select id="jenis" name="jenis" class="form-select" required>
                                <option value="">-- Pilih Jenis Mutasi --</option>
                                @foreach (['pendatang', 'pindah', 'meninggal'] as $item)
                                    <option value="{{ $item }}" {{ old('jenis') == $item ? 'selected' : '' }}>
                                        {{ ucfirst($item) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="penyebab" class="form-label fw-bold">Penyebab</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-info-circle text-primary"></i></span>
                            <input type="text" id="penyebab" name="penyebab" class="form-control" placeholder="Masukkan penyebab mutasi" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="kecamatan" class="form-label fw-bold">Kecamatan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt text-primary"></i></span>
                            <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="desa" class="form-label fw-bold">Desa</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-home text-primary"></i></span>
                            <input type="text" id="desa" name="desa" class="form-control" placeholder="Masukkan Desa" required>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <a href="{{ route('mutasi.data.index') }}" class="btn btn-outline-secondary px-4 me-2">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

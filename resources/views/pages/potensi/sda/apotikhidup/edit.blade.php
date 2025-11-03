@extends('layouts.master')

@section('title', 'Edit Data Apotik Hidup')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Apotik Hidup
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('apotikhidup.update', $apotikhidup->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ old('tanggal', $apotikhidup->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                            <label for="komoditas_obat_id" class="form-label fw-semibold">
                                <i class="fas fa-pills me-1"></i>
                                Komoditas Obat <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('komoditas_obat_id') is-invalid @enderror" id="komoditas_obat_id" name="komoditas_obat_id" required>
                                <option value="" disabled>Pilih Komoditas</option>
                                @foreach($komoditasObats as $komoditas)
                                    <option value="{{ $komoditas->id }}" {{ old('komoditas_obat_id', $apotikhidup->komoditas_obat_id) == $komoditas->id ? 'selected' : '' }}>{{ $komoditas->nama }}</option>
                                @endforeach
                            </select>
                            @error('komoditas_obat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Data Produksi</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_produksi" class="form-label">Luas Produksi (m²)</label>
                            <input type="number" step="0.01" class="form-control @error('luas_produksi') is-invalid @enderror" id="luas_produksi" name="luas_produksi" value="{{ old('luas_produksi', $apotikhidup->luas_produksi) }}">
                             @error('luas_produksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hasil_produksi" class="form-label">Hasil Produksi (kg)</label>
                            <input type="number" step="0.01" class="form-control @error('hasil_produksi') is-invalid @enderror" id="hasil_produksi" name="hasil_produksi" value="{{ old('hasil_produksi', $apotikhidup->hasil_produksi) }}">
                             @error('hasil_produksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jumlah_produksi" class="form-label">Jumlah Produksi</label>
                            <input type="number" step="0.01" class="form-control @error('jumlah_produksi') is-invalid @enderror" id="jumlah_produksi" name="jumlah_produksi" value="{{ old('jumlah_produksi', $apotikhidup->jumlah_produksi) }}">
                             @error('jumlah_produksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Field dengan tanda <span class="text-danger">*</span> wajib diisi
                            </small>

                            <div class="btn-group gap-2">
                                <a href="{{ route('apotikhidup.index') }}"
                                    class="btn btn-outline-secondary rounded">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary rounded">
                                    <i class="fas fa-save me-1"></i>
                                    Update Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

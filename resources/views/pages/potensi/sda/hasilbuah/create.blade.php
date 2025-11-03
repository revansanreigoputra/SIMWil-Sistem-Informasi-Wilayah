@extends('layouts.master')

@section('title', 'Tambah Data Hasil Produksi Buah')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-apple-alt me-2"></i>
                Tambah Data Hasil Produksi Buah
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('hasilbuah.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="komoditas_buah_id" class="form-label fw-semibold">
                                <i class="fas fa-seedling me-1"></i>
                                Nama Komoditas <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('komoditas_buah_id') is-invalid @enderror"
                                id="komoditas_buah_id" name="komoditas_buah_id" required>
                                <option value="" disabled selected>Pilih Komoditas</option>
                                @foreach ($komoditasBuahs as $komoditas)
                                    <option value="{{ $komoditas->id }}"
                                        {{ old('komoditas_buah_id') == $komoditas->id ? 'selected' : '' }}>
                                        {{ $komoditas->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('komoditas_buah_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Data Produksi</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="luas_produksi" class="form-label">Luas Produksi (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="luas_produksi"
                                name="luas_produksi" value="{{ old('luas_produksi', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hasil_produksi" class="form-label">Hasil Produksi (Ton)</label>
                            <input type="number" step="0.01" class="form-control" id="hasil_produksi"
                                name="hasil_produksi" value="{{ old('hasil_produksi', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Pemasaran Hasil</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dijual_langsung_konsumen" class="form-label">Dijual Langsung ke Konsumen</label>
                            <select class="form-select" name="dijual_langsung_konsumen">
                                <option value="Tidak" {{ old('dijual_langsung_konsumen') == 'Tidak' ? 'selected' : '' }}>
                                    Tidak</option>
                                <option value="Ya" {{ old('dijual_langsung_konsumen') == 'Ya' ? 'selected' : '' }}>Ya
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dijual_ke_pasar" class="form-label">Dijual ke Pasar</label>
                            <select class="form-select" name="dijual_ke_pasar">
                                <option value="Tidak" {{ old('dijual_ke_pasar') == 'Tidak' ? 'selected' : '' }}>Tidak
                                </option>
                                <option value="Ya" {{ old('dijual_ke_pasar') == 'Ya' ? 'selected' : '' }}>Ya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dijual_melalui_kud" class="form-label">Dijual Melalui KUD</label>
                            <select class="form-select" name="dijual_melalui_kud">
                                <option value="Tidak" {{ old('dijual_melalui_kud') == 'Tidak' ? 'selected' : '' }}>Tidak
                                </option>
                                <option value="Ya" {{ old('dijual_melalui_kud') == 'Ya' ? 'selected' : '' }}>Ya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dijual_melalui_tengkulak" class="form-label">Dijual Melalui Tengkulak</label>
                            <select class="form-select" name="dijual_melalui_tengkulak">
                                <option value="Tidak" {{ old('dijual_melalui_tengkulak') == 'Tidak' ? 'selected' : '' }}>
                                    Tidak</option>
                                <option value="Ya" {{ old('dijual_melalui_tengkulak') == 'Ya' ? 'selected' : '' }}>Ya
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dijual_melalui_pengecer" class="form-label">Dijual Melalui Pengecer</label>
                            <select class="form-select" name="dijual_melalui_pengecer">
                                <option value="Tidak" {{ old('dijual_melalui_pengecer') == 'Tidak' ? 'selected' : '' }}>
                                    Tidak</option>
                                <option value="Ya" {{ old('dijual_melalui_pengecer') == 'Ya' ? 'selected' : '' }}>Ya
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dijual_ke_lumbung_desa" class="form-label">Dijual ke Lumbung Desa</label>
                            <select class="form-select" name="dijual_ke_lumbung_desa">
                                <option value="Tidak" {{ old('dijual_ke_lumbung_desa') == 'Tidak' ? 'selected' : '' }}>
                                    Tidak</option>
                                <option value="Ya" {{ old('dijual_ke_lumbung_desa') == 'Ya' ? 'selected' : '' }}>Ya
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tidak_dijual" class="form-label">Tidak Dijual</label>
                            <select class="form-select" name="tidak_dijual">
                                <option value="Tidak" {{ old('tidak_dijual') == 'Tidak' ? 'selected' : '' }}>Tidak
                                </option>
                                <option value="Ya" {{ old('tidak_dijual') == 'Ya' ? 'selected' : '' }}>Ya</option>
                            </select>
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
                                <a href="{{ route('hasilbuah.index') }}" class="btn btn-outline-secondary rounded">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary rounded">
                                    Simpan Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

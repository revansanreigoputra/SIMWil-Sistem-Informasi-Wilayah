@extends('layouts.master')

@section('title', 'Tambah Data Hasil Produksi Kebun')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-leaf me-2"></i>
                Tambah Data Hasil Produksi Kebun
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('hasilkebun.store') }}" method="POST">
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
                            <label for="komoditas_perkebunan_id" class="form-label fw-semibold">
                                <i class="fas fa-seedling me-1"></i>
                                Nama Komoditas <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('komoditas_perkebunan_id') is-invalid @enderror"
                                id="komoditas_perkebunan_id" name="komoditas_perkebunan_id" required>
                                <option value="" disabled selected>Pilih Komoditas</option>
                                @foreach ($komoditas as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('komoditas_perkebunan_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('komoditas_perkebunan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Perkebunan Swasta/Negara</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="luas_perkebunan_swasta_negara" class="form-label">Luas Perkebunan (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="luas_perkebunan_swasta_negara"
                                name="luas_perkebunan_swasta_negara" value="{{ old('luas_perkebunan_swasta_negara', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hasil_perkebunan_swasta_negara" class="form-label">Hasil Perkebunan (Ton)</label>
                            <input type="number" step="0.01" class="form-control" id="hasil_perkebunan_swasta_negara"
                                name="hasil_perkebunan_swasta_negara" value="{{ old('hasil_perkebunan_swasta_negara', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Perkebunan Rakyat</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="luas_perkebunan_rakyat" class="form-label">Luas Perkebunan (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="luas_perkebunan_rakyat"
                                name="luas_perkebunan_rakyat" value="{{ old('luas_perkebunan_rakyat', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hasil_perkebunan_rakyat" class="form-label">Hasil Perkebunan (Ton)</label>
                            <input type="number" step="0.01" class="form-control" id="hasil_perkebunan_rakyat"
                                name="hasil_perkebunan_rakyat" value="{{ old('hasil_perkebunan_rakyat', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Data Ekonomi</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="harga_lokal" class="form-label">Harga Lokal (Rp)</label>
                            <input type="number" step="0.01" class="form-control" id="harga_lokal" name="harga_lokal"
                                value="{{ old('harga_lokal', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nilai_produksi_tahun_ini" class="form-label">Nilai Produksi Tahun Ini (Rp)</label>
                            <input type="number" step="0.01" class="form-control" id="nilai_produksi_tahun_ini"
                                name="nilai_produksi_tahun_ini" value="{{ old('nilai_produksi_tahun_ini', 0) }}">
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="mb-3">
                            <label for="saldo_produksi" class="form-label">Saldo Produksi (Rp)</label>
                            <input type="number" step="0.01" class="form-control" id="saldo_produksi"
                                name="saldo_produksi" value="{{ old('saldo_produksi', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Biaya Produksi</h6>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="biaya_pemupukan" class="form-label">Biaya Pemupukan (Rp)</label>
                            <input type="number" step="0.01" class="form-control" id="biaya_pemupukan"
                                name="biaya_pemupukan" value="{{ old('biaya_pemupukan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="biaya_bibit" class="form-label">Biaya Bibit (Rp)</label>
                            <input type="number" step="0.01" class="form-control" id="biaya_bibit" name="biaya_bibit"
                                value="{{ old('biaya_bibit', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="biaya_obat" class="form-label">Biaya Obat (Rp)</label>
                            <input type="number" step="0.01" class="form-control" id="biaya_obat" name="biaya_obat"
                                value="{{ old('biaya_obat', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="biaya_lainnya" class="form-label">Biaya Lainnya (Rp)</label>
                            <input type="number" step="0.01" class="form-control" id="biaya_lainnya"
                                name="biaya_lainnya" value="{{ old('biaya_lainnya', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Pemasaran Hasil</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dijual_langsung_ke_konsumen" class="form-label">Dijual Langsung ke Konsumen</label>
                            <select class="form-select" name="dijual_langsung_ke_konsumen">
                                <option value="Tidak" {{ old('dijual_langsung_ke_konsumen') == 'Tidak' ? 'selected' : '' }}>
                                    Tidak</option>
                                <option value="Ya" {{ old('dijual_langsung_ke_konsumen') == 'Ya' ? 'selected' : '' }}>Ya
                                </option>
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
                                <a href="{{ route('hasilkebun.index') }}" class="btn btn-outline-secondary rounded">
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

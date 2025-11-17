@extends('layouts.master')

@section('title', 'Tambah Data Jenis dan Produksi Ikan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Jenis dan Produksi Ikan
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('p-nama-ikan.store') }}" method="POST">
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
                            <label for="nama_ikan_id" class="form-label fw-semibold">
                                <i class="fas fa-fish me-1"></i>
                                Nama Ikan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('nama_ikan_id') is-invalid @enderror" id="nama_ikan_id"
                                name="nama_ikan_id" required>
                                <option value="">Pilih Nama Ikan</option>
                                @foreach ($namaIkans as $ikan)
                                    <option value="{{ $ikan->id }}" {{ old('nama_ikan_id') == $ikan->id ? 'selected' : '' }}>
                                        {{ $ikan->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nama_ikan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hasil_produksi" class="form-label fw-semibold">
                                <i class="fas fa-box-open me-1"></i>
                                Hasil Produksi (Number) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('hasil_produksi') is-invalid @enderror" id="hasil_produksi"
                                name="hasil_produksi" value="{{ old('hasil_produksi', 0) }}" required>
                            @error('hasil_produksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="harga_jual" class="form-label fw-semibold">
                                <i class="fas fa-money-bill-wave me-1"></i>
                                Harga Jual (Number) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual"
                                name="harga_jual" value="{{ old('harga_jual', 0) }}" required>
                            @error('harga_jual')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nilai_produksi" class="form-label fw-semibold">
                                <i class="fas fa-dollar-sign me-1"></i>
                                Nilai Produksi (Number) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('nilai_produksi') is-invalid @enderror" id="nilai_produksi"
                                name="nilai_produksi" value="{{ old('nilai_produksi', 0) }}" required>
                            @error('nilai_produksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nilai_bahan_baku" class="form-label fw-semibold">
                                <i class="fas fa-boxes me-1"></i>
                                Nilai Bahan Baku (Number) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('nilai_bahan_baku') is-invalid @enderror" id="nilai_bahan_baku"
                                name="nilai_bahan_baku" value="{{ old('nilai_bahan_baku', 0) }}" required>
                            @error('nilai_bahan_baku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nilai_bahan_penolong" class="form-label fw-semibold">
                                <i class="fas fa-tools me-1"></i>
                                Nilai Bahan Penolong (Number) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('nilai_bahan_penolong') is-invalid @enderror" id="nilai_bahan_penolong"
                                name="nilai_bahan_penolong" value="{{ old('nilai_bahan_penolong', 0) }}" required>
                            @error('nilai_bahan_penolong')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="biaya_antara_yang_dihabiskan" class="form-label fw-semibold">
                                <i class="fas fa-exchange-alt me-1"></i>
                                Biaya Antara Yang Dihabiskan (Number) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('biaya_antara_yang_dihabiskan') is-invalid @enderror" id="biaya_antara_yang_dihabiskan"
                                name="biaya_antara_yang_dihabiskan" value="{{ old('biaya_antara_yang_dihabiskan', 0) }}" required>
                            @error('biaya_antara_yang_dihabiskan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="saldo_produksi" class="form-label fw-semibold">
                                <i class="fas fa-balance-scale me-1"></i>
                                Saldo Produksi (Number) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('saldo_produksi') is-invalid @enderror" id="saldo_produksi"
                                name="saldo_produksi" value="{{ old('saldo_produksi', 0) }}" required>
                            @error('saldo_produksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_jenis_usaha_perikanan" class="form-label fw-semibold">
                                <i class="fas fa-industry me-1"></i>
                                Jumlah Jenis Usaha Perikanan (Number) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('jumlah_jenis_usaha_perikanan') is-invalid @enderror" id="jumlah_jenis_usaha_perikanan"
                                name="jumlah_jenis_usaha_perikanan" value="{{ old('jumlah_jenis_usaha_perikanan', 0) }}" required>
                            @error('jumlah_jenis_usaha_perikanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dijual_langsung_ke_konsumen" class="form-label fw-semibold">
                                <i class="fas fa-users me-1"></i>
                                Dijual Langsung Ke Konsumen <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dijual_langsung_ke_konsumen') is-invalid @enderror" id="dijual_langsung_ke_konsumen"
                                name="dijual_langsung_ke_konsumen" required>
                                <option value="ya" {{ old('dijual_langsung_ke_konsumen') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('dijual_langsung_ke_konsumen') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('dijual_langsung_ke_konsumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dijual_langsung_ke_pasar" class="form-label fw-semibold">
                                <i class="fas fa-store me-1"></i>
                                Dijual Langsung Ke Pasar <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dijual_langsung_ke_pasar') is-invalid @enderror" id="dijual_langsung_ke_pasar"
                                name="dijual_langsung_ke_pasar" required>
                                <option value="ya" {{ old('dijual_langsung_ke_pasar') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('dijual_langsung_ke_pasar') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('dijual_langsung_ke_pasar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dijual_melalui_kud" class="form-label fw-semibold">
                                <i class="fas fa-handshake me-1"></i>
                                Dijual Melalui KUD <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dijual_melalui_kud') is-invalid @enderror" id="dijual_melalui_kud"
                                name="dijual_melalui_kud" required>
                                <option value="ya" {{ old('dijual_melalui_kud') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('dijual_melalui_kud') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('dijual_melalui_kud')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dijual_melalui_tengkulak" class="form-label fw-semibold">
                                <i class="fas fa-user-tie me-1"></i>
                                Dijual Melalui Tengkulak <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dijual_melalui_tengkulak') is-invalid @enderror" id="dijual_melalui_tengkulak"
                                name="dijual_melalui_tengkulak" required>
                                <option value="ya" {{ old('dijual_melalui_tengkulak') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('dijual_melalui_tengkulak') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('dijual_melalui_tengkulak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dijual_melalui_pengecer" class="form-label fw-semibold">
                                <i class="fas fa-shopping-cart me-1"></i>
                                Dijual Melalui Pengecer <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dijual_melalui_pengecer') is-invalid @enderror" id="dijual_melalui_pengecer"
                                name="dijual_melalui_pengecer" required>
                                <option value="ya" {{ old('dijual_melalui_pengecer') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('dijual_melalui_pengecer') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('dijual_melalui_pengecer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dijual_ke_lumbung_desa_kelurahan" class="form-label fw-semibold">
                                <i class="fas fa-warehouse me-1"></i>
                                Dijual Ke Lumbung Desa/Kelurahan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dijual_ke_lumbung_desa_kelurahan') is-invalid @enderror" id="dijual_ke_lumbung_desa_kelurahan"
                                name="dijual_ke_lumbung_desa_kelurahan" required>
                                <option value="ya" {{ old('dijual_ke_lumbung_desa_kelurahan') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('dijual_ke_lumbung_desa_kelurahan') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('dijual_ke_lumbung_desa_kelurahan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tidak_dijual" class="form-label fw-semibold">
                                <i class="fas fa-ban me-1"></i>
                                Tidak Dijual <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('tidak_dijual') is-invalid @enderror" id="tidak_dijual"
                                name="tidak_dijual" required>
                                <option value="ya" {{ old('tidak_dijual') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="tidak" {{ old('tidak_dijual') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('tidak_dijual')
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
                                <a href="{{ route('p-nama-ikan.index') }}"
                                    class="btn btn-outline-secondary rounded">
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

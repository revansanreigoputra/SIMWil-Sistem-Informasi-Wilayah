@extends('layouts.master')

@section('title', 'Edit Data Deposit dan Produksi Galian')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Deposit Produksi Galian
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('deposit-produksi-galian.update', $depositProduksiGalian->id) }}" method="POST">
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
                                name="tanggal" value="{{ old('tanggal', $depositProduksiGalian->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="komoditas_galian_id" class="form-label fw-semibold">
                                <i class="fas fa-gem me-1"></i>
                                Jenis Bahan Galian <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('komoditas_galian_id') is-invalid @enderror" id="komoditas_galian_id"
                                name="komoditas_galian_id" required>
                                <option value="">Pilih Jenis Bahan Galian</option>
                                @foreach ($komoditasGalians as $komoditas)
                                    <option value="{{ $komoditas->id }}" {{ old('komoditas_galian_id', $depositProduksiGalian->komoditas_galian_id) == $komoditas->id ? 'selected' : '' }}>
                                        {{ $komoditas->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('komoditas_galian_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">
                                <i class="fas fa-info-circle me-1"></i>
                                Status <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status"
                                name="status" required>
                                <option value="">Pilih Status</option>
                                <option value="ada tapi belum produktif" {{ old('status', $depositProduksiGalian->status) == 'ada tapi belum produktif' ? 'selected' : '' }}>Ada tapi belum produktif</option>
                                <option value="ada dan sudah produktif" {{ old('status', $depositProduksiGalian->status) == 'ada dan sudah produktif' ? 'selected' : '' }}>Ada dan sudah produktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hasil_produksi" class="form-label fw-semibold">
                                <i class="fas fa-boxes me-1"></i>
                                Hasil Produksi <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('hasil_produksi') is-invalid @enderror" id="hasil_produksi"
                                name="hasil_produksi" required>
                                <option value="">Pilih Hasil Produksi</option>
                                <option value="kecil" {{ old('hasil_produksi', $depositProduksiGalian->hasil_produksi) == 'kecil' ? 'selected' : '' }}>Kecil</option>
                                <option value="sedang" {{ old('hasil_produksi', $depositProduksiGalian->hasil_produksi) == 'sedang' ? 'selected' : '' }}>Sedang</option>
                                <option value="besar" {{ old('hasil_produksi', $depositProduksiGalian->hasil_produksi) == 'besar' ? 'selected' : '' }}>Besar</option>
                            </select>
                            @error('hasil_produksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dijual_langsung_ke_konsumen" class="form-label fw-semibold">
                                <i class="fas fa-handshake me-1"></i>
                                Dijual Langsung Ke Konsumen <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dijual_langsung_ke_konsumen') is-invalid @enderror" id="dijual_langsung_ke_konsumen"
                                name="dijual_langsung_ke_konsumen" required>
                                <option value="tidak" {{ old('dijual_langsung_ke_konsumen', $depositProduksiGalian->dijual_langsung_ke_konsumen) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="ya" {{ old('dijual_langsung_ke_konsumen', $depositProduksiGalian->dijual_langsung_ke_konsumen) == 'ya' ? 'selected' : '' }}>Ya</option>
                            </select>
                            @error('dijual_langsung_ke_konsumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dijual_melalui_kud" class="form-label fw-semibold">
                                <i class="fas fa-store me-1"></i>
                                Dijual Melalui KUD <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dijual_melalui_kud') is-invalid @enderror" id="dijual_melalui_kud"
                                name="dijual_melalui_kud" required>
                                <option value="tidak" {{ old('dijual_melalui_kud', $depositProduksiGalian->dijual_melalui_kud) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="ya" {{ old('dijual_melalui_kud', $depositProduksiGalian->dijual_melalui_kud) == 'ya' ? 'selected' : '' }}>Ya</option>
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
                                <option value="tidak" {{ old('dijual_melalui_tengkulak', $depositProduksiGalian->dijual_melalui_tengkulak) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="ya" {{ old('dijual_melalui_tengkulak', $depositProduksiGalian->dijual_melalui_tengkulak) == 'ya' ? 'selected' : '' }}>Ya</option>
                            </select>
                            @error('dijual_melalui_tengkulak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dijual_melalui_pengecer" class="form-label fw-semibold">
                                <i class="fas fa-shopping-bag me-1"></i>
                                Dijual Melalui Pengecer <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dijual_melalui_pengecer') is-invalid @enderror" id="dijual_melalui_pengecer"
                                name="dijual_melalui_pengecer" required>
                                <option value="tidak" {{ old('dijual_melalui_pengecer', $depositProduksiGalian->dijual_melalui_pengecer) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="ya" {{ old('dijual_melalui_pengecer', $depositProduksiGalian->dijual_melalui_pengecer) == 'ya' ? 'selected' : '' }}>Ya</option>
                            </select>
                            @error('dijual_melalui_pengecer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dijual_ke_perusahaan" class="form-label fw-semibold">
                                <i class="fas fa-building me-1"></i>
                                Dijual Ke Perusahaan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dijual_ke_perusahaan') is-invalid @enderror" id="dijual_ke_perusahaan"
                                name="dijual_ke_perusahaan" required>
                                <option value="tidak" {{ old('dijual_ke_perusahaan', $depositProduksiGalian->dijual_ke_perusahaan) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="ya" {{ old('dijual_ke_perusahaan', $depositProduksiGalian->dijual_ke_perusahaan) == 'ya' ? 'selected' : '' }}>Ya</option>
                            </select>
                            @error('dijual_ke_perusahaan')
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
                                <option value="tidak" {{ old('dijual_ke_lumbung_desa_kelurahan', $depositProduksiGalian->dijual_ke_lumbung_desa_kelurahan) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="ya" {{ old('dijual_ke_lumbung_desa_kelurahan', $depositProduksiGalian->dijual_ke_lumbung_desa_kelurahan) == 'ya' ? 'selected' : '' }}>Ya</option>
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
                                <option value="tidak" {{ old('tidak_dijual', $depositProduksiGalian->tidak_dijual) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="ya" {{ old('tidak_dijual', $depositProduksiGalian->tidak_dijual) == 'ya' ? 'selected' : '' }}>Ya</option>
                            </select>
                            @error('tidak_dijual')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kepemilikan" class="form-label fw-semibold">
                                <i class="fas fa-users me-1"></i>
                                Kepemilikan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('kepemilikan') is-invalid @enderror" id="kepemilikan"
                                name="kepemilikan" required>
                                <option value="">Pilih Kepemilikan</option>
                                <option value="pemerintah" {{ old('kepemilikan', $depositProduksiGalian->kepemilikan) == 'pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                                <option value="swasta" {{ old('kepemilikan', $depositProduksiGalian->kepemilikan) == 'swasta' ? 'selected' : '' }}>Swasta</option>
                                <option value="perorangan" {{ old('kepemilikan', $depositProduksiGalian->kepemilikan) == 'perorangan' ? 'selected' : '' }}>Perorangan</option>
                                <option value="adat" {{ old('kepemilikan', $depositProduksiGalian->kepemilikan) == 'adat' ? 'selected' : '' }}>Adat</option>
                                <option value="lainnya" {{ old('kepemilikan', $depositProduksiGalian->kepemilikan) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('kepemilikan')
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
                                <a href="{{ route('deposit-produksi-galian.index') }}"
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

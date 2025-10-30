@extends('layouts.master')

@section('title', 'Edit Data Prasarana Kebersihan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Prasarana Kebersihan
            </h5>
        </div>

        <div class="card-body">
            <form
                action="{{ route('potensi.potensi-prasarana-dan-sarana.kebersihan.update', ['prasaranakebersihan' => $prasaranakebersihan->id]) }}"
                method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal"
                                value="{{ old('tanggal', $prasaranakebersihan->tanggal?->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mb-3">Data Prasarana Kebersihan</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tps_lokasi" class="form-label fw-semibold">Lokasi TPS</label>
                            <input type="text" class="form-control @error('tps_lokasi') is-invalid @enderror"
                                id="tps_lokasi" name="tps_lokasi" value="{{ old('tps_lokasi', $prasaranakebersihan->tps_lokasi) }}">
                            @error('tps_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tpa_lokasi" class="form-label fw-semibold">Lokasi TPA</label>
                            <input type="text" class="form-control @error('tpa_lokasi') is-invalid @enderror"
                                id="tpa_lokasi" name="tpa_lokasi" value="{{ old('tpa_lokasi', $prasaranakebersihan->tpa_lokasi) }}">
                            @error('tpa_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="alat_penghancur" class="form-label fw-semibold">Alat Penghancur</label>
                            <input type="text" class="form-control @error('alat_penghancur') is-invalid @enderror"
                                id="alat_penghancur" name="alat_penghancur" value="{{ old('alat_penghancur', $prasaranakebersihan->alat_penghancur) }}">
                            @error('alat_penghancur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="gerobak_sampah" class="form-label fw-semibold">Gerobak Sampah</label>
                            <input type="number" class="form-control @error('gerobak_sampah') is-invalid @enderror"
                                id="gerobak_sampah" name="gerobak_sampah" value="{{ old('gerobak_sampah', $prasaranakebersihan->gerobak_sampah) }}" min="0">
                            @error('gerobak_sampah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tong_sampah" class="form-label fw-semibold">Tong Sampah</label>
                            <input type="number" class="form-control @error('tong_sampah') is-invalid @enderror"
                                id="tong_sampah" name="tong_sampah" value="{{ old('tong_sampah', $prasaranakebersihan->tong_sampah) }}" min="0">
                            @error('tong_sampah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="truk_pengangkut" class="form-label fw-semibold">Truk Pengangkut</label>
                            <input type="number" class="form-control @error('truk_pengangkut') is-invalid @enderror"
                                id="truk_pengangkut" name="truk_pengangkut" value="{{ old('truk_pengangkut', $prasaranakebersihan->truk_pengangkut) }}" min="0">
                            @error('truk_pengangkut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="satgas_kebersihan" class="form-label fw-semibold">Satgas Kebersihan (Kelompok)</label>
                            <input type="number" class="form-control @error('satgas_kebersihan') is-invalid @enderror"
                                id="satgas_kebersihan" name="satgas_kebersihan" value="{{ old('satgas_kebersihan', $prasaranakebersihan->satgas_kebersihan) }}" min="0">
                            @error('satgas_kebersihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="anggota_satgas" class="form-label fw-semibold">Anggota Satgas</label>
                            <input type="number" class="form-control @error('anggota_satgas') is-invalid @enderror"
                                id="anggota_satgas" name="anggota_satgas" value="{{ old('anggota_satgas', $prasaranakebersihan->anggota_satgas) }}" min="0">
                            @error('anggota_satgas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pemulung" class="form-label fw-semibold">Pemulung</label>
                            <input type="number" class="form-control @error('pemulung') is-invalid @enderror"
                                id="pemulung" name="pemulung" value="{{ old('pemulung', $prasaranakebersihan->pemulung) }}" min="0">
                            @error('pemulung')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tempat_pengelolaan_sampah" class="form-label fw-semibold">Tempat Pengelolaan Sampah</label>
                            <input type="text" class="form-control @error('tempat_pengelolaan_sampah') is-invalid @enderror"
                                id="tempat_pengelolaan_sampah" name="tempat_pengelolaan_sampah" value="{{ old('tempat_pengelolaan_sampah', $prasaranakebersihan->tempat_pengelolaan_sampah) }}">
                            @error('tempat_pengelolaan_sampah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pengelolaan_sampah_rt" class="form-label fw-semibold">Pengelolaan Sampah RT</label>
                            <select class="form-select @error('pengelolaan_sampah_rt') is-invalid @enderror"
                                id="pengelolaan_sampah_rt" name="pengelolaan_sampah_rt">
                                <option value="">Pilih Jenis Pengelolaan</option>
                                <option value="pemerintah" {{ old('pengelolaan_sampah_rt', $prasaranakebersihan->pengelolaan_sampah_rt) == 'pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                                <option value="perorangan" {{ old('pengelolaan_sampah_rt', $prasaranakebersihan->pengelolaan_sampah_rt) == 'perorangan' ? 'selected' : '' }}>Perorangan</option>
                                <option value="swadaya" {{ old('pengelolaan_sampah_rt', $prasaranakebersihan->pengelolaan_sampah_rt) == 'swadaya' ? 'selected' : '' }}>Swadaya</option>
                            </select>
                            @error('pengelolaan_sampah_rt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pengelolaan_sampah_lainnya" class="form-label fw-semibold">Pengelolaan Sampah Lainnya</label>
                            <input type="text" class="form-control @error('pengelolaan_sampah_lainnya') is-invalid @enderror"
                                id="pengelolaan_sampah_lainnya" name="pengelolaan_sampah_lainnya" value="{{ old('pengelolaan_sampah_lainnya', $prasaranakebersihan->pengelolaan_sampah_lainnya) }}">
                            @error('pengelolaan_sampah_lainnya')
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
                                <a href="{{ route('potensi.potensi-prasarana-dan-sarana.kebersihan.index') }}"
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

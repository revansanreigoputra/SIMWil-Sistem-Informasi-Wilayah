@extends('layouts.master')

@section('title', 'Tambah Data Populasi Ternak')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Populasi Ternak
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('jenis-populasi-ternak.store') }}" method="POST">
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
                            <label for="jenis_ternak_id" class="form-label fw-semibold">
                                <i class="fas fa-cow me-1"></i>
                                Jenis Ternak <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_ternak_id') is-invalid @enderror" id="jenis_ternak_id"
                                name="jenis_ternak_id" required>
                                <option value="">Pilih Jenis Ternak</option>
                                @foreach ($jenisTernaks as $jenisTernak)
                                    <option value="{{ $jenisTernak->id }}"
                                        {{ old('jenis_ternak_id') == $jenisTernak->id ? 'selected' : '' }}>
                                        {{ $jenisTernak->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_ternak_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_pemilik" class="form-label fw-semibold">
                                <i class="fas fa-users me-1"></i>
                                Jumlah Pemilik <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('jumlah_pemilik') is-invalid @enderror"
                                id="jumlah_pemilik" name="jumlah_pemilik" value="{{ old('jumlah_pemilik', 0) }}" required>
                            @error('jumlah_pemilik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="populasi" class="form-label fw-semibold">
                                <i class="fas fa-chart-bar me-1"></i>
                                Populasi <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('populasi') is-invalid @enderror" id="populasi"
                                name="populasi" value="{{ old('populasi', 0) }}" required>
                            @error('populasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Saluran Penjualan</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Dijual Langsung ke Konsumen <span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_langsung_ke_konsumen" id="dijual_langsung_ke_konsumen_ya" value="ya" {{ old('dijual_langsung_ke_konsumen') == 'ya' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_langsung_ke_konsumen_ya">Ya</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_langsung_ke_konsumen" id="dijual_langsung_ke_konsumen_tidak" value="tidak" {{ old('dijual_langsung_ke_konsumen', 'tidak') == 'tidak' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_langsung_ke_konsumen_tidak">Tidak</label>
                            </div>
                            @error('dijual_langsung_ke_konsumen')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Dijual Ke Pasar Hewan <span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_ke_pasar_hewan" id="dijual_ke_pasar_hewan_ya" value="ya" {{ old('dijual_ke_pasar_hewan') == 'ya' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_ke_pasar_hewan_ya">Ya</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_ke_pasar_hewan" id="dijual_ke_pasar_hewan_tidak" value="tidak" {{ old('dijual_ke_pasar_hewan', 'tidak') == 'tidak' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_ke_pasar_hewan_tidak">Tidak</label>
                            </div>
                            @error('dijual_ke_pasar_hewan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Dijual Melalui KUD <span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_melalui_kud" id="dijual_melalui_kud_ya" value="ya" {{ old('dijual_melalui_kud') == 'ya' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_melalui_kud_ya">Ya</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_melalui_kud" id="dijual_melalui_kud_tidak" value="tidak" {{ old('dijual_melalui_kud', 'tidak') == 'tidak' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_melalui_kud_tidak">Tidak</label>
                            </div>
                            @error('dijual_melalui_kud')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Dijual Melalui Tengkulak <span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_melalui_tengkulak" id="dijual_melalui_tengkulak_ya" value="ya" {{ old('dijual_melalui_tengkulak') == 'ya' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_melalui_tengkulak_ya">Ya</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_melalui_tengkulak" id="dijual_melalui_tengkulak_tidak" value="tidak" {{ old('dijual_melalui_tengkulak', 'tidak') == 'tidak' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_melalui_tengkulak_tidak">Tidak</label>
                            </div>
                            @error('dijual_melalui_tengkulak')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Dijual Melalui Pengecer <span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_melalui_pengecer" id="dijual_melalui_pengecer_ya" value="ya" {{ old('dijual_melalui_pengecer') == 'ya' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_melalui_pengecer_ya">Ya</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_melalui_pengecer" id="dijual_melalui_pengecer_tidak" value="tidak" {{ old('dijual_melalui_pengecer', 'tidak') == 'tidak' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_melalui_pengecer_tidak">Tidak</label>
                            </div>
                            @error('dijual_melalui_pengecer')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Dijual Ke Lumbung Desa/Kelurahan <span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_ke_lumbung_desa_kelurahan" id="dijual_ke_lumbung_desa_kelurahan_ya" value="ya" {{ old('dijual_ke_lumbung_desa_kelurahan') == 'ya' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_ke_lumbung_desa_kelurahan_ya">Ya</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dijual_ke_lumbung_desa_kelurahan" id="dijual_ke_lumbung_desa_kelurahan_tidak" value="tidak" {{ old('dijual_ke_lumbung_desa_kelurahan', 'tidak') == 'tidak' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="dijual_ke_lumbung_desa_kelurahan_tidak">Tidak</label>
                            </div>
                            @error('dijual_ke_lumbung_desa_kelurahan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Tidak Dijual <span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tidak_dijual" id="tidak_dijual_ya" value="ya" {{ old('tidak_dijual') == 'ya' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="tidak_dijual_ya">Ya</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tidak_dijual" id="tidak_dijual_tidak" value="tidak" {{ old('tidak_dijual', 'tidak') == 'tidak' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="tidak_dijual_tidak">Tidak</label>
                            </div>
                            @error('tidak_dijual')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
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
                                <a href="{{ route('jenis-populasi-ternak.index') }}"
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

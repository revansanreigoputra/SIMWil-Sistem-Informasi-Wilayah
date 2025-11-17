@extends('layouts.master')

@section('title', 'Edit Data Lembaga Kemasyarakatan')

@section('content')
@can('lembaga-kemasyarakatan.edit')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-people-fill me-2"></i>Form Edit Data Lembaga Kemasyarakatan
        </h5>
    </div>

    <div class="card-body p-4">
        <form action="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- SECTION 1: Data Umum --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-info-circle me-1"></i> Data Umum Lembaga Kemasyarakatan
                </h6>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" class="form-control"
                            value="{{ old('tanggal', $data->tanggal) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jenis Lembaga <span class="text-danger">*</span></label>
                        <select name="jenis_lembaga_id" class="form-select" required>
                            <option value="">-- Pilih Jenis Lembaga --</option>
                            @foreach ($jenisLembaga as $jenis)
                                <option value="{{ $jenis->id }}" {{ old('jenis_lembaga_id', $data->jenis_lembaga_id) == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('jenis_lembaga_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jumlah Lembaga</label>
                        <div class="input-group">
                            <input type="number" name="jumlah" class="form-control text-end"
                                value="{{ old('jumlah', $data->jumlah) }}" min="0">
                            <span class="input-group-text">Unit</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Dasar Hukum Pembentukan <span class="text-danger">*</span></label>
                        <select name="dasar_hukum_id" class="form-select" required>
                            <option value="">-- Pilih Dasar Hukum --</option>
                            @foreach ($dasarHukum as $dasar)
                                <option value="{{ $dasar->id }}" {{ old('dasar_hukum_id', $data->dasar_hukum_id) == $dasar->id ? 'selected' : '' }}>
                                    {{ $dasar->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('dasar_hukum_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Data Kegiatan Lembaga --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-activity me-1"></i> Data Kegiatan Lembaga
                </h6>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Jumlah Pengurus</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_pengurus" class="form-control text-end"
                                value="{{ old('jumlah_pengurus', $data->jumlah_pengurus) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Jumlah Jenis Kegiatan</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_jenis_kegiatan" class="form-control text-end"
                                value="{{ old('jumlah_jenis_kegiatan', $data->jumlah_jenis_kegiatan) }}" min="0">
                            <span class="input-group-text">Jenis</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Alamat Kantor</label>
                        <input type="text" name="alamat_kantor" class="form-control"
                            placeholder="Masukkan alamat kantor"
                            value="{{ old('alamat_kantor', $data->alamat_kantor) }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Ruang Lingkup Kegiatan</label>
                        <input type="text" name="ruang_lingkup_kegiatan" class="form-control"
                            placeholder="Contoh: Desa / Kecamatan"
                            value="{{ old('ruang_lingkup_kegiatan', $data->ruang_lingkup_kegiatan) }}">
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@else
<div class="alert alert-danger mt-3">
    <i class="bi bi-exclamation-triangle me-2"></i>
    Kamu tidak memiliki izin untuk mengedit data Lembaga Kemasyarakatan.
</div>
@endcan
@endsection

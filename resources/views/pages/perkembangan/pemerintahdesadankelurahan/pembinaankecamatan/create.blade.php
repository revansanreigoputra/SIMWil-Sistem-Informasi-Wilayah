@extends('layouts.master')

@section('title', 'Tambah Data Pembinaan Kecamatan')

@section('content')
<div class="card shadow-sm boreder-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Pembinaan Kecamatan
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.store') }}" method="POST">
            @csrf

            <div class="row">
            <!-- Kolom Tanggal -->
            <div class="col-md-6 mb-3">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar me-1"></i>
                    Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                    name="tanggal" value="{{ old('tanggal') }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kolom Desa -->
            <div class="col-md-6 mb-3">
                <label for="id_desa" class="form-label fw-semibold">
                    <i class="fas fa-map-marker-alt me-1"></i>
                    Desa <span class="text-danger">*</span>
                </label>
                <select name="id_desa" id="id_desa" class="form-control" required>
                    <option value="">-- Pilih Desa --</option>
                    @foreach ($desas as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_desa }}</option>
                    @endforeach
                </select>
            </div>
            </div>

            {{-- Input angka sesuai field di controller --}}
            @php
                $numericFields = [
                    'fasilitasi_penyusunan_perdes' => 'Fasilitasi penyusunan Perdes',
                    'fasilitasi_administrasi_tata_pemerintahan' => 'Fasilitasi administrasi & tata pemerintahan',
                    'fasilitasi_pengelolaan_keuangan' => 'Fasilitasi pengelolaan keuangan',
                    'fasilitasi_urusan_otonomi' => 'Fasilitasi urusan otonomi',
                    'fasilitasi_penerapan_peraturan' => 'Fasilitasi penerapan peraturan',
                    'fasilitasi_penyediaan_data' => 'Fasilitasi penyediaan data',
                    'fasilitasi_pelaksanaan_tugas' => 'Fasilitasi pelaksanaan tugas',
                    'fasilitasi_ketenteraman' => 'Fasilitasi ketenteraman',
                    'fasilitasi_penetapan_penguatan' => 'Fasilitasi penetapan & penguatan',
                    'penanggulangan_kemiskinan_apbd' => 'Kegiatan penanggulangan kemiskinan (APBD)',
                    'fasilitasi_partisipasi_masyarakat' => 'Fasilitasi partisipasi masyarakat',
                    'fasilitasi_kerjasama_desa' => 'Fasilitasi kerjasama desa',
                    'fasilitasi_program_pemberdayaan' => 'Fasilitasi program pemberdayaan',
                    'fasilitasi_kerjasama_lembaga' => 'Fasilitasi kerjasama lembaga',
                    'fasilitasi_bantuan_teknis' => 'Fasilitasi bantuan teknis',
                    'fasilitasi_koordinasi_unit_kerja' => 'Fasilitasi koordinasi unit kerja',
                ];
            @endphp

            @foreach ($numericFields as $name => $label)
                <div class="row mb-3">
                    <label for="{{ $name }}" class="col-sm-9 col-form-label">{{ $label }} <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="number" min="0" name="{{ $name }}" id="{{ $name }}"
                               class="form-control @error($name) is-invalid @enderror"
                               value="{{ old($name) }}" required>
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Tambah Data Lembaga Kemasyarakatan')

@section('content')
@can('create lembaga kemasyarakatan')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Tambah Data Lembaga Kemasyarakatan</h5>
    </div>
    <div class="card-body">
        {{-- Tampilkan pesan error jika validasi gagal --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.store') }}" 
              method="POST" id="form-lembaga-kemasyarakatan">
            @csrf

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control"
                               value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Lembaga *</label>
                        <select name="jenis_lembaga_id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($jenisLembaga as $jenis)
                                <option value="{{ $jenis->id }}" 
                                    {{ old('jenis_lembaga_id') == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" 
                               value="{{ old('jumlah', 0) }}" min="0">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Dasar Hukum Pembentukan *</label>
                        <select name="dasar_hukum_id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($dasarHukum as $dasar)
                                <option value="{{ $dasar->id }}" 
                                    {{ old('dasar_hukum_id') == $dasar->id ? 'selected' : '' }}>
                                    {{ $dasar->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- Data Kegiatan --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Kegiatan</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pengurus (Orang)</label>
                        <input type="number" name="jumlah_pengurus" class="form-control" 
                               value="{{ old('jumlah_pengurus', 0) }}" min="0">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Jenis Kegiatan</label>
                        <input type="number" name="jumlah_jenis_kegiatan" class="form-control" 
                               value="{{ old('jumlah_jenis_kegiatan', 0) }}" min="0">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Alamat Kantor</label>
                        <input type="text" name="alamat_kantor" class="form-control"
                               placeholder="Masukkan alamat kantor" value="{{ old('alamat_kantor') }}">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Ruang Lingkup Kegiatan</label>
                        <input type="text" name="ruang_lingkup_kegiatan" class="form-control"
                               placeholder="Contoh: Desa / Kecamatan" 
                               value="{{ old('ruang_lingkup_kegiatan') }}">
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index') }}" 
                   class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@else
    <div class="alert alert-danger mt-4">
        <i class="bi bi-exclamation-triangle"></i>
        Kamu tidak memiliki izin untuk menambah data Lembaga Kemasyarakatan.
    </div>
@endcan
@endsection

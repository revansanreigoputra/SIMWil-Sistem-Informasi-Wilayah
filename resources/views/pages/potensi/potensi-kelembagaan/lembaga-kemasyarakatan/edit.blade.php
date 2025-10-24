@extends('layouts.master')

@section('title', 'Edit Data Lembaga Kemasyarakatan')

@section('content')
@can('edit lembaga kemasyarakatan')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Edit Data Lembaga Kemasyarakatan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control"
                            value="{{ old('tanggal', $data->tanggal) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Lembaga *</label>
                        <select name="jenis_lembaga_id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($jenisLembaga as $jl)
                                <option value="{{ $jl->id }}"
                                    {{ old('jenis_lembaga_id', $data->jenis_lembaga_id) == $jl->id ? 'selected' : '' }}>
                                    {{ $jl->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control"
                            value="{{ old('jumlah', $data->jumlah) }}" min="0">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Dasar Hukum Pembentukan *</label>
                        <select name="dasar_hukum_id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($dasarHukum as $dh)
                                <option value="{{ $dh->id }}"
                                    {{ old('dasar_hukum_id', $data->dasar_hukum_id) == $dh->id ? 'selected' : '' }}>
                                    {{ $dh->nama }}
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
                            value="{{ old('jumlah_pengurus', $data->jumlah_pengurus) }}" min="0">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Jenis Kegiatan</label>
                        <input type="number" name="jumlah_jenis_kegiatan" class="form-control"
                            value="{{ old('jumlah_jenis_kegiatan', $data->jumlah_jenis_kegiatan) }}" min="0">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Alamat Kantor</label>
                        <input type="text" name="alamat_kantor" class="form-control"
                            value="{{ old('alamat_kantor', $data->alamat_kantor) }}">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Ruang Lingkup Kegiatan</label>
                        <input type="text" name="ruang_lingkup_kegiatan" class="form-control"
                            value="{{ old('ruang_lingkup_kegiatan', $data->ruang_lingkup_kegiatan) }}">
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between">
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Data
                    </button>
                    <a href="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index') }}"
                       class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@else
    <div class="alert alert-danger">
        <i class="bi bi-exclamation-triangle"></i> Kamu tidak memiliki izin untuk mengedit data ini.
    </div>
@endcan
@endsection

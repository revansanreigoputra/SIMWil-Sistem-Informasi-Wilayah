@extends('layouts.master')

@section('title', 'Edit Data Partisipasi Politik')

@section('content')
@can('lembaga-politik.edit')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-pencil-square me-2"></i> Form Edit Data Partisipasi Politik
        </h5>
    </div>

    <div class="card-body p-4">
        <form action="{{ route('potensi.potensi-kelembagaan.politik.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- SECTION 1: Data Umum --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-info-circle me-1"></i> Data Umum Partisipasi Politik
                </h6>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" class="form-control"
                            value="{{ old('tanggal', $data->tanggal) }}" required>
                        @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jenis Partisipasi Politik <span class="text-danger">*</span></label>
                        <select name="partisipasi_politik_id" class="form-select" required>
                            <option value="">-- Pilih Partisipasi Politik --</option>
                            @foreach ($partisipasi as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('partisipasi_politik_id', $data->partisipasi_politik_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('partisipasi_politik_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Data Pemilih --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-people-fill me-1"></i> Data Pemilih
                </h6>

                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Jumlah Wanita Hak Pilih</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_wanita_hak_pilih" class="form-control text-end"
                                value="{{ old('jumlah_wanita_hak_pilih', $data->jumlah_wanita_hak_pilih) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                        @error('jumlah_wanita_hak_pilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Jumlah Pria Hak Pilih</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_pria_hak_pilih" class="form-control text-end"
                                value="{{ old('jumlah_pria_hak_pilih', $data->jumlah_pria_hak_pilih) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                        @error('jumlah_pria_hak_pilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Jumlah Pemilih</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_pemilih" class="form-control text-end"
                                value="{{ old('jumlah_pemilih', $data->jumlah_pemilih) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                        @error('jumlah_pemilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>

            {{-- SECTION 3: Penggunaan Hak Pilih --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-bar-chart-line me-1"></i> Penggunaan Hak Pilih
                </h6>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Jumlah Wanita Memilih</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_wanita_memilih" class="form-control text-end"
                                value="{{ old('jumlah_wanita_memilih', $data->jumlah_wanita_memilih) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                        @error('jumlah_wanita_memilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Jumlah Pria Memilih</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_pria_memilih" class="form-control text-end"
                                value="{{ old('jumlah_pria_memilih', $data->jumlah_pria_memilih) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                        @error('jumlah_pria_memilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Jumlah Penggunaan Hak Pilih</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_penggunaan_hak_pilih" class="form-control text-end"
                                value="{{ old('jumlah_penggunaan_hak_pilih', $data->jumlah_penggunaan_hak_pilih) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                        @error('jumlah_penggunaan_hak_pilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Persentase</label>
                        <div class="input-group">
                            <input type="number" name="persentase" class="form-control text-end"
                                value="{{ old('persentase', $data->persentase) }}" step="0.01" min="0">
                            <span class="input-group-text">%</span>
                        </div>
                        @error('persentase') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>

            {{-- TOMBOL AKSI --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('potensi.potensi-kelembagaan.politik.index') }}" class="btn btn-outline-secondary">
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
    <i class="bi bi-shield-lock-fill me-2"></i>
    Anda tidak memiliki izin untuk mengedit data partisipasi politik.
</div>
@endcan
@endsection

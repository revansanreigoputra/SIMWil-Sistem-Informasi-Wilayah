@extends('layouts.master')

@section('title', 'Tambah Kop Surat')

@section('content')
<div class="row justify-content-center">
    <div class="card shadow-sm border-0 rounded-3">

        <div class="card-header bg-primary text-white rounded-top">
            <h5 class="mb-0 fw-bold">
                <i class="fas fa-edit me-2"></i> Tambah Kop Surat
            </h5>
        </div>

        <div class="card-body bg-light">
            <form action="{{ route('kop_templates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama Kop Surat --}}
                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold text-dark">Nama Kop Surat</label>
                    <textarea class="form-control rounded-3" id="nama" name="nama" rows="3"> </textarea>
                    <div class="form-text">Contoh: PEMERINTAH PROVINSI ... KABUPATEN ...</div>
                </div>

                {{-- Jenis Kop - Hidden Input for fixed value --}}
                <input type="hidden" name="jenis_kop" value="kop surat">
                <div class="mb-3">
                    <label for="jenis_kop" class="form-label fw-semibold text-dark">Jenis Kop</label>
                    <select class="form-select rounded-3" id="jenis_kop" name="jenis_kop">
                        @foreach (['kop surat', 'kop laporan'] as $jenis)
                            <option value="{{ $jenis }}" {{ old('jenis_kop') == $jenis ? 'selected' : '' }}>
                                {{ ucfirst($jenis) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- Logo --}}
                <div class="mb-3">
                    <label for="logo" class="form-label fw-semibold text-dark">Logo</label>
                    <div class="d-flex align-items-center mt-2">
                    
                        <input type="file" class="form-control rounded-3" id="logo" name="logo">
                    </div>
                    <div class="form-text">Unggah logo baru jika ingin mengganti.</div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('kop_templates.index') }}"
                        class="btn btn-outline-primary rounded-pill px-4 me-2">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
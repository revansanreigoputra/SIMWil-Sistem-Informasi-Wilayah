@extends('layouts.master')

@section('title', 'Edit Kop Surat')

@section('content')
<div class="row justify-content-center">
    <div class="card shadow-sm border-0 rounded-3">

        {{-- Header --}}
        <div class="card-header bg-primary text-white rounded-top">
            <h5 class="mb-0 fw-bold">
                <i class="fas fa-pencil-alt me-2"></i> Edit Kop Surat
            </h5>
        </div>

        {{-- Body --}}
        <div class="card-body bg-light">
            {{-- Form action points to the update route with the kopTemplate ID --}}
            <form action="{{ route('kop_templates.update', $kopTemplate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 

                {{-- Nama Kop Surat --}}
                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold text-dark">Nama Kop Surat</label>
                    
                    <textarea class="form-control rounded-3 @error('nama') is-invalid @enderror" id="nama" name="nama" rows="3">{{ old('nama', $kopTemplate->nama) }}</textarea>
                    <div class="form-text">Contoh: PEMERINTAH PROVINSI ... KABUPATEN ...</div>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Jenis Kop - Select dropdown with pre-selected option --}}
                <div class="mb-3">
                    <label for="jenis_kop" class="form-label fw-semibold text-dark">Jenis Kop</label>
                    <select class="form-select rounded-3 @error('jenis_kop') is-invalid @enderror" id="jenis_kop" name="jenis_kop">
                        @foreach (['kop surat', 'kop laporan'] as $jenis)
                            <option value="{{ $jenis }}" {{ old('jenis_kop', $kopTemplate->jenis_kop) == $jenis ? 'selected' : '' }}>
                                {{ ucfirst($jenis) }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenis_kop')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Logo --}}
                <div class="mb-3">
                    <label for="logo" class="form-label fw-semibold text-dark">Logo</label>
                    <div class="d-flex align-items-center mt-2">
                        @if($kopTemplate->logo)
                            <img src="{{ asset('storage/' . $kopTemplate->logo) }}" 
                                 alt="Logo Saat Ini" 
                                 class="me-3 rounded shadow-sm border bg-white p-1" 
                                 width="100">
                        @else
                            <span class="me-3 text-muted">Tidak ada logo saat ini.</span>
                        @endif
                        <input type="file" class="form-control rounded-3 @error('logo') is-invalid @enderror" id="logo" name="logo">
                    </div>
                    <div class="form-text">Unggah logo baru jika ingin mengganti.</div>
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Footer dalam card --}}
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('kop_templates.index') }}"
                        class="btn btn-outline-primary rounded-pill px-4 me-2">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 text-white">
                        <i class="fas fa-save me-1"></i> Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
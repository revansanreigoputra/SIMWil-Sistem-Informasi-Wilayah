@extends('layouts.master')

@section('title', 'Edit Format Nomor Surat')

@section('action')
<a href="{{ route('format_nomor_surats.index') }}" class="btn btn-primary ">
    <i class="bi bi-arrow-left-circle me-2"></i> Kembali
</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white rounded-top">
            <h5 class="mb-0 fw-bold">
                <i class="fas fa-edit me-2"></i> Edit Format Nomor Surat
            </h5>
        </div>

        <div class="card-body bg-light">
            {{-- Form action points to the update route with the model ID --}}
            <form action="{{ route('format_nomor_surats.update', $formatNomorSurat->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Use 'kode' to match the store function's validation --}}
                <div class="mb-3">
                    <label for="kode" class="form-label fw-semibold text-dark">Kode Surat</label>
                    <input type="text"
                        class="form-control @error('kode') is-invalid @enderror"
                        id="kode"
                        name="kode"
                        value="{{ old('kode', $formatNomorSurat->kode) }}">
                    <div class="form-text">Contoh: /21/SKUMUM/DS/</div>
                    @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Use 'nama' to match the store function's validation --}}
                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold text-dark">Nama Surat</label>
                    <input type="text"
                        class="form-control @error('nama') is-invalid @enderror"
                        id="nama"
                        name="nama"
                        value="{{ old('nama', $formatNomorSurat->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('format_nomor_surats.index') }}"
                        class="btn btn-outline-primary rounded-pill px-4 me-2">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
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
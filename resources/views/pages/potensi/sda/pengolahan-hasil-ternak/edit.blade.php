@extends('layouts.master')

@section('title', 'Edit Data Pengolahan Hasil Ternak')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Pengolahan Hasil Ternak
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('pengolahan-hasil-ternak.update', $pengolahanHasilTernak->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal"
                                value="{{ old('tanggal', $pengolahanHasilTernak->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_olahan_hasil_ternak_id" class="form-label fw-semibold">
                                <i class="fas fa-industry me-1"></i>
                                Jenis Usaha Pengolahan Hasil Produksi Ternak <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_olahan_hasil_ternak_id') is-invalid @enderror"
                                id="jenis_olahan_hasil_ternak_id" name="jenis_olahan_hasil_ternak_id" required>
                                <option value="">Pilih Jenis Usaha</option>
                                @foreach ($jenisUsahaPengolahanHasilTernaks as $jenisUsaha)
                                    <option value="{{ $jenisUsaha->id }}"
                                        {{ old('jenis_olahan_hasil_ternak_id', $pengolahanHasilTernak->jenis_olahan_hasil_ternak_id) == $jenisUsaha->id ? 'selected' : '' }}>
                                        {{ $jenisUsaha->nama ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_olahan_hasil_ternak_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_pemilik" class="form-label fw-semibold">
                                <i class="fas fa-users me-1"></i>
                                Jumlah Pemilik <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('jumlah_pemilik') is-invalid @enderror"
                                id="jumlah_pemilik" name="jumlah_pemilik"
                                value="{{ old('jumlah_pemilik', $pengolahanHasilTernak->jumlah_pemilik) }}" required
                                min="0">
                            @error('jumlah_pemilik')
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
                                <a href="{{ route('pengolahan-hasil-ternak.index') }}"
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

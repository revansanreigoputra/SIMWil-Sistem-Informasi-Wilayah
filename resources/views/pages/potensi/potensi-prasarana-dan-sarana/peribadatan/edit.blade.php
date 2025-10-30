@extends('layouts.master')

@section('title', 'Edit Data Prasarana Peribadatan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Prasarana Peribadatan
            </h5>
        </div>

        <div class="card-body">
            <form
                action="{{ route('potensi.potensi-prasarana-dan-sarana.peribadatan.update', ['prasarana_peribadatan' => $prasaranaPeribadatan->id]) }}"
                method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desa_id" class="form-label fw-semibold">
                                <i class="fas fa-building me-1"></i>
                                Desa <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('desa_id') is-invalid @enderror" id="desa_id"
                                name="desa_id" required>
                                <option value="">Pilih Desa</option>
                                @foreach ($desas as $desa)
                                    <option value="{{ $desa->id }}"
                                        {{ old('desa_id', $prasaranaPeribadatan->desa_id) == $desa->id ? 'selected' : '' }}>
                                        {{ $desa->nama_desa }}
                                    </option>
                                @endforeach
                            </select>
                            @error('desa_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal"
                                value="{{ old('tanggal', $prasaranaPeribadatan->tanggal?->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mb-3">Data Prasarana Peribadatan</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tempat_ibadah_id" class="form-label fw-semibold">
                                <i class="fas fa-place-of-worship me-1"></i>
                                Tempat Ibadah <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('tempat_ibadah_id') is-invalid @enderror"
                                id="tempat_ibadah_id" name="tempat_ibadah_id" required>
                                <option value="">Pilih Tempat Ibadah</option>
                                @foreach ($tempatIbadahs as $tempat)
                                    <option value="{{ $tempat->id }}"
                                        {{ old('tempat_ibadah_id', $prasaranaPeribadatan->tempat_ibadah_id) == $tempat->id ? 'selected' : '' }}>
                                        {{ $tempat->nama_tempat }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tempat_ibadah_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label fw-semibold">
                                <i class="fas fa-hashtag me-1"></i>
                                Jumlah <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                id="jumlah" name="jumlah"
                                value="{{ old('jumlah', $prasaranaPeribadatan->jumlah) }}" min="0" required>
                            @error('jumlah')
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
                                <a href="{{ route('potensi.potensi-prasarana-dan-sarana.peribadatan.index') }}"
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

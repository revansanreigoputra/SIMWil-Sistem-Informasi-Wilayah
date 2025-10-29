@extends('layouts.master')

@section('title', 'Edit Data Prasarana Pendidikan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Prasarana Pendidikan
            </h5>
        </div>

        <div class="card-body">
            <form
                action="{{ route('potensi.potensi-prasarana-dan-sarana.ppendidikan.update', ['prasaranapendidikan' => $prasaranapendidikan->id]) }}"
                method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal"
                                value="{{ old('tanggal', $prasaranapendidikan->tanggal?->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mb-3">Data Prasarana Pendidikan</h6>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="jenis_gedung_id" class="form-label fw-semibold">
                                <i class="fas fa-building me-1"></i>
                                Jenis Prasarana Pendidikan <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_gedung_id') is-invalid @enderror"
                                id="jenis_gedung_id" name="jenis_gedung_id" required>
                                <option value="">Pilih Jenis Prasarana Pendidikan</option>
                                @foreach ($jenisGedungs as $jenis)
                                    <option value="{{ $jenis->id }}"
                                        {{ old('jenis_gedung_id', $prasaranapendidikan->jenis_gedung_id) == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_gedung_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_sewa" class="form-label fw-semibold">
                                <i class="fas fa-hashtag me-1"></i>
                                Jumlah Sewa <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('jumlah_sewa') is-invalid @enderror"
                                id="jumlah_sewa" name="jumlah_sewa"
                                value="{{ old('jumlah_sewa', $prasaranapendidikan->jumlah_sewa) }}" min="0" required>
                            @error('jumlah_sewa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_milik_sendiri" class="form-label fw-semibold">
                                <i class="fas fa-hashtag me-1"></i>
                                Jumlah Milik Sendiri <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('jumlah_milik_sendiri') is-invalid @enderror"
                                id="jumlah_milik_sendiri" name="jumlah_milik_sendiri"
                                value="{{ old('jumlah_milik_sendiri', $prasaranapendidikan->jumlah_milik_sendiri) }}" min="0" required>
                            @error('jumlah_milik_sendiri')
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
                                <a href="{{ route('potensi.potensi-prasarana-dan-sarana.ppendidikan.index') }}"
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

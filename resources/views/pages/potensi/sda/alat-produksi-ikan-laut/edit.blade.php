@extends('layouts.master')

@section('title', 'Edit Data Alat Produksi Ikan Laut')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Alat Produksi Ikan Laut
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('p-alat-produksi-ikan-laut.update', $pAlatProduksiIkanLaut->id) }}" method="POST">
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
                                name="tanggal" value="{{ old('tanggal', $pAlatProduksiIkanLaut->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="alat_produksi_ikan_laut_id" class="form-label fw-semibold">
                                <i class="fas fa-fish me-1"></i>
                                Jenis dan Alat Produksi <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('alat_produksi_ikan_laut_id') is-invalid @enderror" id="alat_produksi_ikan_laut_id"
                                name="alat_produksi_ikan_laut_id" required>
                                <option value="">Pilih Jenis dan Alat Produksi</option>
                                @foreach ($alatProduksiIkanLauts as $alat)
                                    <option value="{{ $alat->id }}" {{ old('alat_produksi_ikan_laut_id', $pAlatProduksiIkanLaut->alat_produksi_ikan_laut_id) == $alat->id ? 'selected' : '' }}>
                                        {{ $alat->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('alat_produksi_ikan_laut_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_alat_luas" class="form-label fw-semibold">
                                <i class="fas fa-calculator me-1"></i>
                                Jumlah Alat / Luas <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('jumlah_alat_luas') is-invalid @enderror" id="jumlah_alat_luas"
                                name="jumlah_alat_luas" value="{{ old('jumlah_alat_luas', $pAlatProduksiIkanLaut->jumlah_alat_luas) }}" required>
                            @error('jumlah_alat_luas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hasil_produksi" class="form-label fw-semibold">
                                <i class="fas fa-box-open me-1"></i>
                                Hasil Produksi (Ton/Tahun) <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1" class="form-control @error('hasil_produksi') is-invalid @enderror" id="hasil_produksi"
                                name="hasil_produksi" value="{{ old('hasil_produksi', $pAlatProduksiIkanLaut->hasil_produksi) }}" required>
                            @error('hasil_produksi')
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
                                <a href="{{ route('p-alat-produksi-ikan-laut.index') }}"
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

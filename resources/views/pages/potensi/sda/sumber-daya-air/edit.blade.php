@extends('layouts.master')

@section('title', 'Edit Data Sumber Daya Air')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Sumber Daya Air
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('sumber-daya-air.update', $sumberDayaAir->id) }}" method="POST">
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
                                name="tanggal" value="{{ old('tanggal', $sumberDayaAir->tanggal->format('Y-m-d')) }}"
                                required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_potensi_air_id" class="form-label fw-semibold">
                                <i class="fas fa-water me-1"></i>
                                Jenis Air <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_potensi_air_id') is-invalid @enderror"
                                id="jenis_potensi_air_id" name="jenis_potensi_air_id" required>
                                <option value="">Pilih Jenis Air</option>
                                @foreach ($jenisPotensiAirs as $jenisAir)
                                    <option value="{{ $jenisAir->id }}"
                                        {{ old('jenis_potensi_air_id', $sumberDayaAir->jenis_potensi_air_id) == $jenisAir->id ? 'selected' : '' }}>
                                        {{ $jenisAir->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_potensi_air_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_luas" class="form-label fw-semibold">
                                <i class="fas fa-calculator me-1"></i>
                                Jumlah / Luas <span class="text-danger">*</span>
                            </label>
                            <input type="number" step="1"
                                class="form-control @error('jumlah_luas') is-invalid @enderror" id="jumlah_luas"
                                name="jumlah_luas" value="{{ old('jumlah_luas', $sumberDayaAir->jumlah_luas) }}" required>
                            @error('jumlah_luas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="debit_volume" class="form-label fw-semibold">
                                <i class="fas fa-stream me-1"></i>
                                Debit / Volume <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('debit_volume') is-invalid @enderror" id="debit_volume"
                                name="debit_volume" required>
                                <option value="">Pilih Debit / Volume</option>
                                @foreach (['kecil', 'sedang', 'besar'] as $debit)
                                    <option value="{{ $debit }}"
                                        {{ old('debit_volume', $sumberDayaAir->debit_volume) == $debit ? 'selected' : '' }}>
                                        {{ ucfirst($debit) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('debit_volume')
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
                                <a href="{{ route('sumber-daya-air.index') }}" class="btn btn-outline-secondary rounded">
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

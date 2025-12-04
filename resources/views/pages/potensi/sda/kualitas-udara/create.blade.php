@extends('layouts.master')

@section('title', 'Tambah Data Kualitas Udara')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Kualitas Udara
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('kualitas-udara.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sumber_pencemaran_id" class="form-label fw-semibold">
                                Sumber Pencemaran <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('sumber_pencemaran_id') is-invalid @enderror"
                                id="sumber_pencemaran_id" name="sumber_pencemaran_id" required>
                                <option value="">Pilih Sumber Pencemaran</option>
                                @foreach ($pencemaranSources as $source)
                                    <option value="{{ $source->id }}"
                                        {{ old('sumber_pencemaran_id') == $source->id ? 'selected' : '' }}>
                                        {{ $source->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sumber_pencemaran_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_lokasi_sumber_pencemaran" class="form-label fw-semibold">
                                Jumlah Lokasi Sumber Pencemaran <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('jumlah_lokasi_sumber_pencemaran') is-invalid @enderror"
                                id="jumlah_lokasi_sumber_pencemaran" name="jumlah_lokasi_sumber_pencemaran"
                                value="{{ old('jumlah_lokasi_sumber_pencemaran', 0) }}" required>
                            @error('jumlah_lokasi_sumber_pencemaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_polutan" class="form-label fw-semibold">
                                Jenis Polutan <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('jenis_polutan') is-invalid @enderror"
                                id="jenis_polutan" name="jenis_polutan" value="{{ old('jenis_polutan') }}" required>
                            @error('jenis_polutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Efek Terhadap Kesehatan <span class="text-danger">*</span></label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('efek_terhadap_kesehatan') is-invalid @enderror" type="radio" name="efek_terhadap_kesehatan" id="efek_gangguan_penglihatan" value="gangguan penglihatan" {{ old('efek_terhadap_kesehatan') == 'gangguan penglihatan' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="efek_gangguan_penglihatan">Gangguan Penglihatan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('efek_terhadap_kesehatan') is-invalid @enderror" type="radio" name="efek_terhadap_kesehatan" id="efek_gangguan_pendengaran" value="gangguan pendengaran" {{ old('efek_terhadap_kesehatan') == 'gangguan pendengaran' ? 'checked' : '' }}>
                            <label class="form-check-label" for="efek_gangguan_pendengaran">Gangguan Pendengaran</label>
                        </div>
                        @error('efek_terhadap_kesehatan')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kepemilikan Pemda <span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('kepemilikan_pemda') is-invalid @enderror" type="radio" name="kepemilikan_pemda" id="pemda_ya" value="ya" {{ old('kepemilikan_pemda') == 'ya' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="pemda_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('kepemilikan_pemda') is-invalid @enderror" type="radio" name="kepemilikan_pemda" id="pemda_tidak" value="tidak" {{ old('kepemilikan_pemda', 'tidak') == 'tidak' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pemda_tidak">Tidak</label>
                                </div>
                                @error('kepemilikan_pemda')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kepemilikan Swasta <span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('kepemilikan_swasta') is-invalid @enderror" type="radio" name="kepemilikan_swasta" id="swasta_ya" value="ya" {{ old('kepemilikan_swasta') == 'ya' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="swasta_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('kepemilikan_swasta') is-invalid @enderror" type="radio" name="kepemilikan_swasta" id="swasta_tidak" value="tidak" {{ old('kepemilikan_swasta', 'tidak') == 'tidak' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="swasta_tidak">Tidak</label>
                                </div>
                                @error('kepemilikan_swasta')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kepemilikan Perorangan <span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('kepemilikan_perorangan') is-invalid @enderror" type="radio" name="kepemilikan_perorangan" id="perorangan_ya" value="ya" {{ old('kepemilikan_perorangan') == 'ya' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="perorangan_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('kepemilikan_perorangan') is-invalid @enderror" type="radio" name="kepemilikan_perorangan" id="perorangan_tidak" value="tidak" {{ old('kepemilikan_perorangan', 'tidak') == 'tidak' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perorangan_tidak">Tidak</label>
                                </div>
                                @error('kepemilikan_perorangan')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
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
                                <a href="{{ route('kualitas-udara.index') }}"
                                    class="btn btn-outline-secondary rounded">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary rounded">
                                    Simpan Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

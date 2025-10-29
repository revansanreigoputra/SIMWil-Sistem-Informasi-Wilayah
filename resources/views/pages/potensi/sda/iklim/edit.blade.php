@extends('layouts.master')

@section('title', 'Edit Data Iklim, Tanah, dan Erosi')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Iklim, Tanah, dan Erosi
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('iklim.update', $iklim->id) }}" method="POST">
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
                                name="tanggal" value="{{ old('tanggal', $iklim->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Bagian Iklim</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="curah_hujan" class="form-label">Curah Hujan (mm)</label>
                            <input type="number" step="0.01" class="form-control" id="curah_hujan"
                                name="curah_hujan" value="{{ old('curah_hujan', $iklim->curah_hujan) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jumlah_bulan_hujan" class="form-label">Jumlah Bulan Hujan</label>
                            <input type="number" class="form-control" id="jumlah_bulan_hujan"
                                name="jumlah_bulan_hujan" value="{{ old('jumlah_bulan_hujan', $iklim->jumlah_bulan_hujan) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kelembapan_udara" class="form-label">Kelembapan Udara (%)</label>
                            <input type="number" step="0.01" class="form-control" id="kelembapan_udara"
                                name="kelembapan_udara" value="{{ old('kelembapan_udara', $iklim->kelembapan_udara) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="suhu_rata_rata" class="form-label">Suhu Rata-rata (°C)</label>
                            <input type="number" step="0.01" class="form-control" id="suhu_rata_rata"
                                name="suhu_rata_rata" value="{{ old('suhu_rata_rata', $iklim->suhu_rata_rata) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tinggi_permukaan_laut" class="form-label">Tinggi Permukaan Laut (mdpl)</label>
                            <input type="number" step="0.01" class="form-control" id="tinggi_permukaan_laut"
                                name="tinggi_permukaan_laut" value="{{ old('tinggi_permukaan_laut', $iklim->tinggi_permukaan_laut) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Bagian Tanah</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="warna_tanah" class="form-label">Warna Tanah</label>
                            <select class="form-control" id="warna_tanah" name="warna_tanah">
                                <option value="kuning" {{ old('warna_tanah', $iklim->warna_tanah) == 'kuning' ? 'selected' : '' }}>Kuning</option>
                                <option value="hitam" {{ old('warna_tanah', $iklim->warna_tanah) == 'hitam' ? 'selected' : '' }}>Hitam</option>
                                <option value="abu-abu" {{ old('warna_tanah', $iklim->warna_tanah) == 'abu-abu' ? 'selected' : '' }}>Abu-abu</option>
                                <option value="merah" {{ old('warna_tanah', $iklim->warna_tanah) == 'merah' ? 'selected' : '' }}>Merah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tekstur_tanah" class="form-label">Tekstur Tanah</label>
                            <select class="form-control" id="tekstur_tanah" name="tekstur_tanah">
                                <option value="pasiran" {{ old('tekstur_tanah', $iklim->tekstur_tanah) == 'pasiran' ? 'selected' : '' }}>Pasiran</option>
                                <option value="debulan" {{ old('tekstur_tanah', $iklim->tekstur_tanah) == 'debulan' ? 'selected' : '' }}>Debulan</option>
                                <option value="lempungan" {{ old('tekstur_tanah', $iklim->tekstur_tanah) == 'lempungan' ? 'selected' : '' }}>Lempungan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kemiringan_tanah" class="form-label">Kemiringan Tanah (%)</label>
                            <input type="number" step="0.01" class="form-control" id="kemiringan_tanah"
                                name="kemiringan_tanah" value="{{ old('kemiringan_tanah', $iklim->kemiringan_tanah) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lahan_kritis" class="form-label">Lahan Kritis (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="lahan_kritis"
                                name="lahan_kritis" value="{{ old('lahan_kritis', $iklim->lahan_kritis) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lahan_terlantar" class="form-label">Lahan Terlantar (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="lahan_terlantar"
                                name="lahan_terlantar" value="{{ old('lahan_terlantar', $iklim->lahan_terlantar) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Bagian Erosi</h6>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanah_erosi_ringan" class="form-label">Tanah Erosi Ringan (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_erosi_ringan"
                                name="tanah_erosi_ringan" value="{{ old('tanah_erosi_ringan', $iklim->tanah_erosi_ringan) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanah_erosi_sedang" class="form-label">Tanah Erosi Sedang (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_erosi_sedang"
                                name="tanah_erosi_sedang" value="{{ old('tanah_erosi_sedang', $iklim->tanah_erosi_sedang) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanah_erosi_berat" class="form-label">Tanah Erosi Berat (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_erosi_berat"
                                name="tanah_erosi_berat" value="{{ old('tanah_erosi_berat', $iklim->tanah_erosi_berat) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="tanah_tidak_ada_erosi" class="form-label">Tanah Tidak Ada Erosi (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_tidak_ada_erosi"
                                name="tanah_tidak_ada_erosi" value="{{ old('tanah_tidak_ada_erosi', $iklim->tanah_tidak_ada_erosi) }}">
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
                                <a href="{{ route('iklim.index') }}" class="btn btn-outline-secondary rounded">
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

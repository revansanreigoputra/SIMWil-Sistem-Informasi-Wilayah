@extends('layouts.master')

@section('title', 'Tambah Transportasi Darat')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Transportasi Darat
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.store') }}" method="POST">
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
                            <label for="kategori_prasarana_transportasi_darat_id" class="form-label fw-semibold">
                                <i class="fas fa-tags me-1"></i>
                                Kategori <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('kategori_prasarana_transportasi_darat_id') is-invalid @enderror" id="kategori_prasarana_transportasi_darat_id"
                                name="kategori_prasarana_transportasi_darat_id" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_prasarana_transportasi_darat_id') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_prasarana_transportasi_darat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="jenis_prasarana_transportasi_darat_id" class="form-label fw-semibold">
                                <i class="fas fa-road me-1"></i>
                                Jenis Sarana Prasarana <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_prasarana_transportasi_darat_id') is-invalid @enderror"
                                id="jenis_prasarana_transportasi_darat_id" name="jenis_prasarana_transportasi_darat_id" required>
                                <option value="">-- Pilih Jenis Sarana Prasarana --</option>
                            </select>
                            @error('jenis_prasarana_transportasi_darat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kondisi_baik" class="form-label fw-semibold">
                                <i class="fas fa-check-circle text-success me-1"></i>
                                Kondisi Baik <small class="text-muted">(Meter)</small> <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('kondisi_baik') is-invalid @enderror"
                                    id="kondisi_baik" name="kondisi_baik" value="{{ old('kondisi_baik') }}" min="0"
                                    step="0.01" required placeholder="0">
                                <span class="input-group-text">m</span>
                            </div>
                            @error('kondisi_baik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kondisi_rusak" class="form-label fw-semibold">
                                <i class="fas fa-times-circle text-danger me-1"></i>
                                Kondisi Rusak <small class="text-muted">(Meter)</small> <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('kondisi_rusak') is-invalid @enderror"
                                    id="kondisi_rusak" name="kondisi_rusak" value="{{ old('kondisi_rusak') }}"
                                    min="0" step="0.01" required placeholder="0">
                                <span class="input-group-text">m</span>
                            </div>
                            @error('kondisi_rusak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label fw-semibold">
                                <i class="fas fa-calculator me-1"></i>
                                Total Jumlah <small class="text-muted">(Meter/Unit)</small> <span
                                    class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    id="jumlah" name="jumlah" value="{{ old('jumlah') }}" min="0" step="0.01"
                                    required placeholder="0" readonly>
                                <span class="input-group-text">m/unit</span>
                            </div>
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
                                <a href="{{ route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.index') }}"
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

@push('addon-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kondisiBaikInput = document.getElementById('kondisi_baik');
            const kondisiRusakInput = document.getElementById('kondisi_rusak');
            const jumlahInput = document.getElementById('jumlah');

            function hitungJumlah() {
                const baik = parseFloat(kondisiBaikInput.value) || 0;
                const rusak = parseFloat(kondisiRusakInput.value) || 0;
                jumlahInput.value = baik + rusak;
            }

            kondisiBaikInput.addEventListener('input', hitungJumlah);
            kondisiRusakInput.addEventListener('input', hitungJumlah);

            const kategoriSelect = document.getElementById('kategori_prasarana_transportasi_darat_id');
            const jenisSelect = document.getElementById('jenis_prasarana_transportasi_darat_id');
            const jenises = @json($jenises);

            kategoriSelect.addEventListener('change', function() {
                const selectedKategoriId = this.value;
                jenisSelect.innerHTML = '<option value="">-- Pilih Jenis Sarana Prasarana --</option>';

                if (selectedKategoriId) {
                    const filteredJenises = jenises.filter(function(jenis) {
                        return jenis.kategori_prasarana_transportasi_darat_id == selectedKategoriId;
                    });

                    filteredJenises.forEach(function(jenis) {
                        const option = document.createElement('option');
                        option.value = jenis.id;
                        option.textContent = jenis.nama;
                        jenisSelect.appendChild(option);
                    });
                }
            });
        });
    </script>
@endpush

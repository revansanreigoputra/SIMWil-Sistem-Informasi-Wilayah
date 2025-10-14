@extends('layouts.master')

@section('title', 'Edit Data Komunikasi Informasi')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit Data Komunikasi Informasi
            </h5>
        </div>

        <div class="card-body">
            <form
                action="{{ route('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.update', ['komunikasi_informasi' => $komunikasiInformasi->id]) }}"
                method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="desa_id" class="form-label fw-semibold">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                Desa <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('desa_id') is-invalid @enderror" id="desa_id"
                                name="desa_id" required>
                                <option value="">Pilih Desa</option>
                                @foreach ($desas as $desa)
                                    <option value="{{ $desa->id }}"
                                        {{ old('desa_id', $komunikasiInformasi->desa_id) == $desa->id ? 'selected' : '' }}>
                                        {{ $desa->nama_desa }}
                                    </option>
                                @endforeach
                            </select>
                            @error('desa_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal"
                                value="{{ old('tanggal', $komunikasiInformasi->tanggal?->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mb-3">Data Komunikasi Informasi</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label fw-semibold">
                                <i class="fas fa-tags me-1"></i>
                                Kategori <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id"
                                name="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ old('kategori_id', $komunikasiInformasi->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_id" class="form-label fw-semibold">
                                <i class="fas fa-list me-1"></i>
                                Jenis <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_id') is-invalid @enderror" id="jenis_id"
                                name="jenis_id" required>
                                <option value="">Pilih Jenis</option>
                                @foreach ($jenises as $jenis)
                                    <option value="{{ $jenis->id }}"
                                        {{ old('jenis_id', $komunikasiInformasi->jenis_id) == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label fw-semibold">
                                <i class="fas fa-hashtag me-1"></i>
                                Jumlah <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                name="jumlah" value="{{ old('jumlah', $komunikasiInformasi->jumlah) }}" min="0"
                                required>
                            @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="satuan" class="form-label fw-semibold">
                                <i class="fas fa-balance-scale me-1"></i>
                                Satuan <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan"
                                name="satuan" value="{{ old('satuan', $komunikasiInformasi->satuan) }}"
                                placeholder="Contoh: unit, buah, dll" required>
                            @error('satuan')
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
                                <a href="{{ route('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.index') }}"
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

@push('addon-script')
    <script>
        $(document).ready(function() {
            function loadJenis(kategoriId, selectedJenisId = null) {
                var jenisSelect = $('#jenis_id');
                if (kategoriId) {
                    $.ajax({
                        url: '/get-jenis-komunikasi-by-kategori/' + kategoriId,
                        type: 'GET',
                        success: function(data) {
                            jenisSelect.empty();
                            jenisSelect.append('<option value="">Pilih Jenis</option>');
                            $.each(data, function(key, jenis) {
                                var selected = selectedJenisId == jenis.id ? 'selected' : '';
                                jenisSelect.append('<option value="' + jenis.id + '" ' +
                                    selected + '>' + jenis.nama + '</option>');
                            });
                        },
                        error: function() {
                            jenisSelect.empty();
                            jenisSelect.append('<option value="">Pilih Jenis</option>');
                        }
                    });
                } else {
                    jenisSelect.empty();
                    jenisSelect.append('<option value="">Pilih Jenis</option>');
                }
            }

            // Saat kategori berubah
            $('#kategori_id').change(function() {
                var kategoriId = $(this).val();
                loadJenis(kategoriId);
            });

            // Saat halaman dimuat, isi dropdown jenis sesuai kategori yang sudah ada
            var initialKategoriId = $('#kategori_id').val();
            var initialJenisId = "{{ old('jenis_id', $komunikasiInformasi->jenis_id) }}";
            if (initialKategoriId) {
                loadJenis(initialKategoriId, initialJenisId);
            }
        });
    </script>
@endpush

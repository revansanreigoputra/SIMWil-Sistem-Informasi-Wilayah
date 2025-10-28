@extends('layouts.master')

@section('title', 'Ubah Data Dusun')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-edit me-2"></i>
                            <h4 class="card-title mb-0">Ubah Data Dusun</h4>
                        </div>
                    </div>
                </div>

                <form action="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-dusun.update', $dusun->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Dasar -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Informasi Dasar
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="desa_id" class="form-label fw-semibold">
                                            <i class="fas fa-map-marker-alt text-muted me-1"></i>
                                            Desa <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select @error('desa_id') is-invalid @enderror" id="desa_id" name="desa_id" required>
                                            <option value="">-- Pilih Desa --</option>
                                            @foreach($desas as $desa)
                                                <option value="{{ $desa->id }}" {{ old('desa_id', $dusun->desa_id) == $desa->id ? 'selected' : '' }}>{{ $desa->nama_desa }}</option>
                                            @endforeach
                                        </select>
                                        @error('desa_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tanggal" class="form-label fw-semibold">
                                            <i class="fas fa-calendar text-muted me-1"></i>
                                            Tanggal <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal" value="{{ old('tanggal', $dusun->tanggal) }}" required>
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fasilitas -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-building text-primary me-2"></i>
                                Fasilitas
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="gedung_kantor" class="form-label fw-semibold">
                                            Gedung Kantor
                                        </label>
                                        <select class="form-select @error('gedung_kantor') is-invalid @enderror"
                                            id="gedung_kantor" name="gedung_kantor">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada" {{ old('gedung_kantor', $dusun->gedung_kantor) == 'ada' ? 'selected' : '' }}>Ada</option>
                                            <option value="tidak ada" {{ old('gedung_kantor', $dusun->gedung_kantor) == 'tidak ada' ? 'selected' : '' }}>Tidak Ada</option>
                                        </select>
                                        @error('gedung_kantor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="alat_tulis_kantor" class="form-label fw-semibold">
                                            Alat Tulis Kantor
                                        </label>
                                        <select class="form-select @error('alat_tulis_kantor') is-invalid @enderror"
                                            id="alat_tulis_kantor" name="alat_tulis_kantor">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada" {{ old('alat_tulis_kantor', $dusun->alat_tulis_kantor) == 'ada' ? 'selected' : '' }}>Ada</option>
                                            <option value="tidak ada" {{ old('alat_tulis_kantor', $dusun->alat_tulis_kantor) == 'tidak ada' ? 'selected' : '' }}>Tidak Ada</option>
                                        </select>
                                        @error('alat_tulis_kantor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="barang_inventaris" class="form-label fw-semibold">
                                            Barang Inventaris
                                        </label>
                                        <select class="form-select @error('barang_inventaris') is-invalid @enderror"
                                            id="barang_inventaris" name="barang_inventaris">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada" {{ old('barang_inventaris', $dusun->barang_inventaris) == 'ada' ? 'selected' : '' }}>Ada</option>
                                            <option value="tidak ada" {{ old('barang_inventaris', $dusun->barang_inventaris) == 'tidak ada' ? 'selected' : '' }}>Tidak Ada</option>
                                        </select>
                                        @error('barang_inventaris')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="buku_administrasi" class="form-label fw-semibold">
                                            Buku Administrasi
                                        </label>
                                        <select class="form-select @error('buku_administrasi') is-invalid @enderror"
                                            id="buku_administrasi" name="buku_administrasi">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada" {{ old('buku_administrasi', $dusun->buku_administrasi) == 'ada' ? 'selected' : '' }}>Ada</option>
                                            <option value="tidak ada" {{ old('buku_administrasi', $dusun->buku_administrasi) == 'tidak ada' ? 'selected' : '' }}>Tidak Ada</option>
                                        </select>
                                        @error('buku_administrasi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kegiatan dan Pengurus -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-users text-primary me-2"></i>
                                Kegiatan dan Pengurus
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jenis_kegiatan" class="form-label fw-semibold">
                                            Jenis Kegiatan
                                        </label>
                                        <input type="number"
                                            class="form-control @error('jenis_kegiatan') is-invalid @enderror" id="jenis_kegiatan"
                                            name="jenis_kegiatan" value="{{ old('jenis_kegiatan', $dusun->jenis_kegiatan) }}" min="0"
                                            placeholder="Masukkan jumlah">
                                        @error('jenis_kegiatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jumlah_pengurus" class="form-label fw-semibold">
                                            Jumlah Pengurus
                                        </label>
                                        <input type="number"
                                            class="form-control @error('jumlah_pengurus') is-invalid @enderror" id="jumlah_pengurus"
                                            name="jumlah_pengurus" value="{{ old('jumlah_pengurus', $dusun->jumlah_pengurus) }}" min="0"
                                            placeholder="Masukkan jumlah">
                                        @error('jumlah_pengurus')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="lainnya" class="form-label fw-semibold">
                                            Lainnya
                                        </label>
                                        <select class="form-select @error('lainnya') is-invalid @enderror"
                                            id="lainnya" name="lainnya">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada" {{ old('lainnya', $dusun->lainnya) == 'ada' ? 'selected' : '' }}>Ada</option>
                                            <option value="tidak ada" {{ old('lainnya', $dusun->lainnya) == 'tidak ada' ? 'selected' : '' }}>Tidak Ada</option>
                                        </select>
                                        @error('lainnya')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="card shadow-sm">
                        <div class="card-footer bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">
                                    <small>
                                        <i class="fas fa-info-circle me-1"></i>
                                        Field dengan tanda <span class="text-danger fw-bold">*</span> wajib diisi
                                    </small>
                                </div>

                                <div class="btn-group gap-2">
                                    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-dusun.index') }}"
                                        class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-1"></i> Kembali
                                    </a>
                                    <button type="reset" class="btn btn-outline-warning">
                                        <i class="fas fa-undo me-1"></i> Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('addon-style')
    <style>
        .form-label {
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .card {
            border: none;
            border-radius: 0.5rem;
        }

        .card-header {
            border-radius: 0.5rem 0.5rem 0 0 !important;
            border-bottom: 1px solid #dee2e6;
        }

        .btn-group .btn+.btn {
            margin-left: 0.5rem;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        hr {
            border-top: 1px solid #dee2e6;
            opacity: 1;
        }

        .form-group {
            position: relative;
        }

        @media (max-width: 768px) {
            .btn-group {
                flex-direction: column;
                width: 100%;
            }

            .btn-group .btn {
                margin-left: 0;
                margin-bottom: 0.5rem;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
@endpush

@push('addon-script')
    <script>
        $(document).ready(function() {
            // Form validation enhancement
            $('form').on('submit', function(e) {
                let hasError = false;

                // Check required fields
                $('input[required], select[required]').each(function() {
                    if (!$(this).val()) {
                        $(this).addClass('is-invalid');
                        hasError = true;
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (hasError) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: $('.is-invalid').first().offset().top - 100
                    }, 500);

                    // Show alert
                    alert('Mohon lengkapi semua field yang wajib diisi!');
                }
            });

            // Remove invalid class on input
            $('.form-control, .form-select').on('input change', function() {
                if ($(this).val()) {
                    $(this).removeClass('is-invalid');
                }
            });

            // Smooth scroll to top after form reset
            $('button[type="reset"]').on('click', function() {
                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 500);
                }, 100);
            });
        });
    </script>
@endpush

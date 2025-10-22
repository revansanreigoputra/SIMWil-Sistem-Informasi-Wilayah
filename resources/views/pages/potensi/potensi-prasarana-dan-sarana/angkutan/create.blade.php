@extends('layouts.master')

@section('title', 'Tambah Data Sarana Transportasi')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-plus-circle me-2"></i>
                            <h4 class="card-title mb-0">Tambah Data Sarana Transportasi</h4>
                        </div>
                    </div>
                </div>

                <form action="{{ route('potensi.potensi-prasarana-dan-sarana.angkutan.store') }}" method="POST">
                    @csrf

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
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tanggal" class="form-label fw-semibold">
                                            <i class="fas fa-calendar text-muted me-1"></i>
                                            Tanggal <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}" required>
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Transportasi -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-bus text-primary me-2"></i>
                                Detail Transportasi
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="kategori_id" class="form-label fw-semibold">
                                            Kategori <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select @error('kategori_id') is-invalid @enderror"
                                            id="kategori_id" name="kategori_id" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($kategoriTransportasis as $kategori)
                                                <option value="{{ $kategori->id }}"
                                                    {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                                    {{ $kategori->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jenis_id" class="form-label fw-semibold">
                                            Jenis <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select @error('jenis_id') is-invalid @enderror" id="jenis_id"
                                            name="jenis_id" required>
                                            <option value="">-- Pilih Jenis --</option>
                                            {{-- Jenis akan diisi via AJAX --}}
                                        </select>
                                        @error('jenis_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jumlah" class="form-label fw-semibold">
                                            Jumlah <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                            id="jumlah" name="jumlah" value="{{ old('jumlah', 0) }}" min="0"
                                            placeholder="Masukkan jumlah" required>
                                        @error('jumlah')
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
                                    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.angkutan.index') }}"
                                        class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-1"></i> Kembali
                                    </a>
                                    <button type="reset" class="btn btn-outline-warning">
                                        <i class="fas fa-undo me-1"></i> Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Simpan Data
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
            $('#kategori_id').on('change', function() {
                var kategoriId = $(this).val();
                $('#jenis_id').html('<option value="">-- Pilih Jenis --</option>');
                if (kategoriId) {
                    $.get('/get-jenis-by-kategori/' + kategoriId, function(data) {
                        $.each(data, function(i, jenis) {
                            $('#jenis_id').append('<option value="' + jenis.id + '">' +
                                jenis.nama_jenis + '</option>');
                        });
                    });
                }
            });

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

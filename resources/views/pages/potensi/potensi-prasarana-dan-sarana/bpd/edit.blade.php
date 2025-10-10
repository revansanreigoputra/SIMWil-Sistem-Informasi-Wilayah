@extends('layouts.master')

@section('title', 'Ubah Data BPD')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-edit me-2"></i>
                            <h4 class="card-title mb-0">Ubah Data BPD</h4>
                        </div>
                    </div>
                </div>

                <form action="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-bpd.update', $bpd->id) }}" method="POST">
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
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tanggal" class="form-label fw-semibold">
                                            <i class="fas fa-calendar text-muted me-1"></i>
                                            Tanggal <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal"
                                            value="{{ old('tanggal', $bpd->tanggal ? $bpd->tanggal->format('Y-m-d') : '') }}" required>
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gedung Kantor -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-building text-primary me-2"></i>
                                Gedung Kantor
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="gedung_kantor" class="form-label fw-semibold">
                                            Status Gedung Kantor
                                        </label>
                                        <select class="form-select @error('gedung_kantor') is-invalid @enderror"
                                            id="gedung_kantor" name="gedung_kantor">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada"
                                                {{ old('gedung_kantor', $bpd->gedung_kantor) == 'ada' ? 'selected' : '' }}>
                                                Ada
                                            </option>
                                            <option value="tidak ada"
                                                {{ old('gedung_kantor', $bpd->gedung_kantor) == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('gedung_kantor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="ruang_kerja" class="form-label fw-semibold">
                                            Jumlah Ruang Kerja
                                        </label>
                                        <input type="number"
                                            class="form-control @error('ruang_kerja') is-invalid @enderror" id="ruang_kerja"
                                            name="ruang_kerja" value="{{ old('ruang_kerja', $bpd->ruang_kerja) }}"
                                            min="0" placeholder="Masukkan jumlah">
                                        @error('ruang_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kondisi -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-clipboard-check text-primary me-2"></i>
                                Kondisi
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="balai_bpd" class="form-label fw-semibold">
                                            Balai BPD
                                        </label>
                                        <select class="form-select @error('balai_bpd') is-invalid @enderror"
                                            id="balai_bpd" name="balai_bpd">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada"
                                                {{ old('balai_bpd', $bpd->balai_bpd) == 'ada' ? 'selected' : '' }}>
                                                Ada
                                            </option>
                                            <option value="tidak ada"
                                                {{ old('balai_bpd', $bpd->balai_bpd) == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('balai_bpd')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="kondisi" class="form-label fw-semibold">
                                            Kondisi
                                        </label>
                                        <select class="form-select @error('kondisi') is-invalid @enderror" id="kondisi"
                                            name="kondisi">
                                            <option value="">-- Pilih Kondisi --</option>
                                            <option value="baik"
                                                {{ old('kondisi', $bpd->kondisi) == 'baik' ? 'selected' : '' }}>
                                                Baik
                                            </option>
                                            <option value="rusak"
                                                {{ old('kondisi', $bpd->kondisi) == 'rusak' ? 'selected' : '' }}>
                                                Rusak
                                            </option>
                                        </select>
                                        @error('kondisi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="listrik" class="form-label fw-semibold">
                                            Listrik
                                        </label>
                                        <select class="form-select @error('listrik') is-invalid @enderror"
                                            id="listrik" name="listrik">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada"
                                                {{ old('listrik', $bpd->listrik) == 'ada' ? 'selected' : '' }}>
                                                Ada
                                            </option>
                                            <option value="tidak ada"
                                                {{ old('listrik', $bpd->listrik) == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('listrik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="air_bersih" class="form-label fw-semibold">
                                            Air Bersih
                                        </label>
                                        <select class="form-select @error('air_bersih') is-invalid @enderror"
                                            id="air_bersih" name="air_bersih">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada dan kondisi baik"
                                                {{ old('air_bersih', $bpd->air_bersih) == 'ada dan kondisi baik' ? 'selected' : '' }}>
                                                Ada dan Kondisi Baik
                                            </option>
                                            <option value="ada dan kondisi rusak"
                                                {{ old('air_bersih', $bpd->air_bersih) == 'ada dan kondisi rusak' ? 'selected' : '' }}>
                                                Ada dan Kondisi Rusak
                                            </option>
                                            <option value="tidak ada air bersih"
                                                {{ old('air_bersih', $bpd->air_bersih) == 'tidak ada air bersih' ? 'selected' : '' }}>
                                                Tidak Ada Air Bersih
                                            </option>
                                        </select>
                                        @error('air_bersih')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="telepon" class="form-label fw-semibold">
                                            Telepon
                                        </label>
                                        <select class="form-select @error('telepon') is-invalid @enderror"
                                            id="telepon" name="telepon">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada"
                                                {{ old('telepon', $bpd->telepon) == 'ada' ? 'selected' : '' }}>
                                                Ada
                                            </option>
                                            <option value="tidak ada"
                                                {{ old('telepon', $bpd->telepon) == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('telepon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inventaris dan Alat Tulis Kantor -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-boxes text-primary me-2"></i>
                                Inventaris dan Alat Tulis Kantor
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @php
                                    $inventaris = [
                                        'mesin_tik' => 'Mesin Tik',
                                        'meja' => 'Meja',
                                        'kursi' => 'Kursi',
                                        'lemari_arsip' => 'Lemari Arsip',
                                        'komputer' => 'Komputer',
                                        'mesin_fax' => 'Mesin Fax',
                                    ];
                                @endphp

                                @foreach ($inventaris as $field => $label)
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="{{ $field }}" class="form-label fw-semibold">
                                                {{ $label }}
                                            </label>
                                            <input type="number" class="form-control @error($field) is-invalid @enderror"
                                                id="{{ $field }}" name="{{ $field }}"
                                                value="{{ old($field, $bpd->$field) }}" min="0"
                                                placeholder="Jumlah">
                                            @error($field)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group mb-0">
                                <label for="inventaris_lainnya" class="form-label fw-semibold">
                                    Inventaris Lainnya
                                </label>
                                <select class="form-select @error('inventaris_lainnya') is-invalid @enderror"
                                    id="inventaris_lainnya" name="inventaris_lainnya">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="ada"
                                        {{ old('inventaris_lainnya', $bpd->inventaris_lainnya) == 'ada' ? 'selected' : '' }}>
                                        Ada
                                    </option>
                                    <option value="tidak ada"
                                        {{ old('inventaris_lainnya', $bpd->inventaris_lainnya) == 'tidak ada' ? 'selected' : '' }}>
                                        Tidak Ada</option>
                                </select>
                                @error('inventaris_lainnya')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Administrasi BPD -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-file-alt text-primary me-2"></i>
                                Administrasi BPD
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @php
                                    $administrasi = [
                                        'buku_administrasi_kegiatan' => 'Buku Administrasi Kegiatan',
                                        'buku_administrasi_keanggotaan' => 'Buku Administrasi Keanggotaan',
                                        'buku_kegiatan' => 'Buku Kegiatan',
                                        'buku_himpunan_peraturan_desa' => 'Buku Himpunan Peraturan Desa',
                                    ];
                                @endphp

                                @foreach ($administrasi as $field => $label)
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="{{ $field }}" class="form-label fw-semibold">
                                                {{ $label }}
                                            </label>
                                            <input type="number" class="form-control @error($field) is-invalid @enderror"
                                                id="{{ $field }}" name="{{ $field }}"
                                                value="{{ old($field, $bpd->$field) }}" min="0"
                                                placeholder="Jumlah">
                                            @error($field)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group mb-0">
                                <label for="administrasi_lainnya" class="form-label fw-semibold">
                                    Administrasi Lainnya
                                </label>
                                <select class="form-select @error('administrasi_lainnya') is-invalid @enderror"
                                    id="administrasi_lainnya" name="administrasi_lainnya">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="ada"
                                        {{ old('administrasi_lainnya', $bpd->administrasi_lainnya) == 'ada' ? 'selected' : '' }}>
                                        Ada
                                    </option>
                                    <option value="tidak ada"
                                        {{ old('administrasi_lainnya', $bpd->administrasi_lainnya) == 'tidak ada' ? 'selected' : '' }}>
                                        Tidak Ada</option>
                                </select>
                                @error('administrasi_lainnya')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-bpd.index') }}"
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
            // Auto enable/disable jumlah ruang kerja
            $('#gedung_kantor').on('change', function() {
                const ruangKerja = $('#ruang_kerja');
                if ($(this).val() === 'ada') {
                    ruangKerja.prop('disabled', false);
                    if (ruangKerja.val() == 0) ruangKerja.val(1);
                } else {
                    ruangKerja.prop('disabled', true).val(0);
                }
            }).trigger('change');

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

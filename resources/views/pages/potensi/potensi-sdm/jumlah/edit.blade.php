@extends('layouts.master')

@section('title', 'Edit Jumlah')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                 Edit Data Jumlah: {{ $jumlah->tanggal }}
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('potensi.potensi-sdm.jumlah.update', $jumlah->id) }}" method="POST" id="form-edit-jumlah">
                @csrf
                @method('PUT')

                {{-- Section: Informasi Jumlah --}}
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2 mb-3">
                            <i class="fas fa-info-circle"></i> Informasi Jumlah
                        </h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal" class="form-label required">
                                <i class="fas fa-calendar"></i> Tanggal
                            </label>
                            <input type="date" name="tanggal" id="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', $jumlah->tanggal) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_laki" class="form-label required">
                                <i class="fas fa-male"></i> Jumlah Laki-laki
                            </label>
                            <input type="number" name="jumlah_laki" id="jumlah_laki"
                                class="form-control @error('jumlah_laki') is-invalid @enderror"
                                value="{{ old('jumlah_laki', $jumlah->jumlah_laki) }}" placeholder="Masukkan jumlah laki-laki" required min="0">
                            @error('jumlah_laki')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_perempuan" class="form-label required">
                                <i class="fas fa-female"></i> Jumlah Perempuan
                            </label>
                            <input type="number" name="jumlah_perempuan" id="jumlah_perempuan"
                                class="form-control @error('jumlah_perempuan') is-invalid @enderror"
                                value="{{ old('jumlah_perempuan', $jumlah->jumlah_perempuan) }}" placeholder="Masukkan jumlah perempuan" required min="0">
                            @error('jumlah_perempuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_total" class="form-label required">
                                <i class="fas fa-users"></i> Jumlah Total
                            </label>
                            <input type="number" name="jumlah_total" id="jumlah_total"
                                class="form-control @error('jumlah_total') is-invalid @enderror"
                                value="{{ old('jumlah_total', $jumlah->jumlah_total) }}" placeholder="Masukkan jumlah total" required min="0">
                            @error('jumlah_total')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_kk" class="form-label required">
                                <i class="fas fa-home"></i> Jumlah KK
                            </label>
                            <input type="number" name="jumlah_kk" id="jumlah_kk"
                                class="form-control @error('jumlah_kk') is-invalid @enderror"
                                value="{{ old('jumlah_kk', $jumlah->jumlah_kk) }}" placeholder="Masukkan jumlah KK" required min="0">
                            @error('jumlah_kk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_penduduk" class="form-label required">
                                <i class="fas fa-user-friends"></i> Jumlah Penduduk
                            </label>
                            <input type="number" name="jumlah_penduduk" id="jumlah_penduduk"
                                class="form-control @error('jumlah_penduduk') is-invalid @enderror"
                                value="{{ old('jumlah_penduduk', $jumlah->jumlah_penduduk) }}" placeholder="Masukkan jumlah penduduk" required min="0">
                            @error('jumlah_penduduk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-muted">
                                <i class="fas fa-info-circle"></i> Terakhir Diupdate
                            </label>
                            <div class="form-control-plaintext bg-light rounded p-2">
                                <i class="fas fa-calendar-alt text-muted"></i>
                                {{ $jumlah->updated_at ? $jumlah->updated_at->format('d/m/Y H:i:s') : 'Belum pernah diupdate' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('potensi.potensi-sdm.jumlah.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <a href="{{ route('potensi.potensi-sdm.jumlah.show', $jumlah->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                            <button type="button" class="btn btn-warning" onclick="resetToOriginal()">
                                <i class="fas fa-undo"></i> Reset ke Data Asli
                            </button>
                            <button type="submit" class="btn btn-primary" id="submit-button">
                                <i class="fas fa-save"></i> Update Data
                            </button>
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
            // Store original values for reset function
            const originalValues = {
                tanggal: "{{ $jumlah->tanggal }}",
                jumlah_laki: "{{ $jumlah->jumlah_laki }}",
                jumlah_perempuan: "{{ $jumlah->jumlah_perempuan }}",
                jumlah_total: "{{ $jumlah->jumlah_total }}",
                jumlah_kk: "{{ $jumlah->jumlah_kk }}",
                jumlah_penduduk: "{{ $jumlah->jumlah_penduduk }}"
            };

            // Form validation
            $('#form-edit-jumlah').on('submit', function(e) {
                let isValid = true;

                // Check required fields
                $(this).find('[required]').each(function() {
                    if (!$(this).val()) {
                        $(this).addClass('is-invalid');
                        isValid = false;
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    return;
                }
            });

            // Remove invalid class on input
            $('input, select').on('input change', function() {
                if ($(this).val()) {
                    $(this).removeClass('is-invalid');
                }
            });

            // Highlight changed fields
            $('input, select').on('change', function() {
                const fieldName = $(this).attr('name');
                const currentValue = $(this).val();

                if (originalValues[fieldName] != currentValue) {
                    $(this).addClass('border-warning');
                    $(this).closest('.form-group').find('label').addClass('text-warning font-weight-bold');
                } else {
                    $(this).removeClass('border-warning');
                    $(this).closest('.form-group').find('label').removeClass(
                        'text-warning font-weight-bold');
                }
            });
        });

        // Reset to original values function
        function resetToOriginal() {
            const originalValues = {
                tanggal: "{{ $jumlah->tanggal }}",
                jumlah_laki: "{{ $jumlah->jumlah_laki }}",
                jumlah_perempuan: "{{ $jumlah->jumlah_perempuan }}",
                jumlah_total: "{{ $jumlah->jumlah_total }}",
                jumlah_kk: "{{ $jumlah->jumlah_kk }}",
                jumlah_penduduk: "{{ $jumlah->jumlah_penduduk }}"
            };

            Object.keys(originalValues).forEach(key => {
                $(`[name="${key}"]`).val(originalValues[key]).trigger('change');
            });

            // Remove all warning highlights
            $('input, select').removeClass('border-warning');
            $('.form-group label').removeClass('text-warning font-weight-bold');
        }
    </script>
@endpush

@push('addon-style')
    <style>
        .required::after {
            content: " *";
            color: red;
            font-weight: bold;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-label i {
            margin-right: 0.5rem;
            color: #6c757d;
        }

        .card {
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            border: none;
        }

        .input-group-text {
            background-color: #e9ecef;
            border-color: #ced4da;
            font-size: 0.875rem;
        }

        .btn {
            border-radius: 0.375rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin-left: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .alert {
            border-radius: 0.375rem;
        }

        .border-warning {
            border-color: #ffc107 !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .text-warning.font-weight-bold {
            color: #e0a800 !important;
        }

        .form-control-plaintext {
            font-size: 0.9rem;
        }

        .info-box {
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }

        .info-box-icon {
            border-radius: 0.375rem 0 0 0.375rem;
        }

        /* Select2 Bootstrap 4 Theme Adjustments */
        .select2-container--bootstrap4 .select2-selection--single {
            height: calc(2.25rem + 2px);
            border-color: #ced4da;
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
            line-height: calc(2.25rem - 2px);
            padding-left: 0.75rem;
        }

        /* Tambahan untuk tombol yang lebih responsif */
        .btn {
            min-width: 120px;
        }

        @media (max-width: 768px) {
            .d-flex.justify-content-end {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                margin-left: 0;
                margin-top: 0.5rem;
            }
        }
    </style>
@endpush

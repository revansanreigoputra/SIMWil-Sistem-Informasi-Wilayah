@extends('layouts.master')

@section('title', 'Tambah Data Usia')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Tambah Data Usia
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('potensi.potensi-sdm.usia.store') }}" method="POST" id="form-usia">
                @csrf

                {{-- Section: Informasi Dasar --}}
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2 mb-3">
                            <i class="fas fa-info-circle"></i> Informasi Dasar
                        </h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal" class="form-label required">
                                <i class="fas fa-calendar-alt"></i> Tanggal
                            </label>
                            <input type="date" name="tanggal" id="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}"
                                required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Section: Data Laki-laki --}}
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-info border-bottom pb-2 mb-3 mt-4">
                            <i class="fas fa-male"></i> Data Laki-laki (Usia 0-75)
                        </h5>
                    </div>
                </div>
                <div class="row">
                    @for ($i = 0; $i <= 75; $i++)
                        <div class="col-md-2 col-sm-4 col-6">
                            <div class="form-group">
                                <label for="l{{ $i }}" class="form-label">L{{ $i }}</label>
                                <input type="number" name="l{{ $i }}" id="l{{ $i }}"
                                    class="form-control @error('l' . $i) is-invalid @enderror"
                                    value="{{ old('l' . $i) }}" min="0">
                                @error('l' . $i)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endfor
                </div>

                {{-- Section: Data Perempuan --}}
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-danger border-bottom pb-2 mb-3 mt-4">
                            <i class="fas fa-female"></i> Data Perempuan (Usia 0-75)
                        </h5>
                    </div>
                </div>
                <div class="row">
                    @for ($i = 0; $i <= 75; $i++)
                        <div class="col-md-2 col-sm-4 col-6">
                            <div class="form-group">
                                <label for="p{{ $i }}" class="form-label">P{{ $i }}</label>
                                <input type="number" name="p{{ $i }}" id="p{{ $i }}"
                                    class="form-control @error('p' . $i) is-invalid @enderror"
                                    value="{{ old('p' . $i) }}" min="0">
                                @error('p' . $i)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endfor
                </div>

                {{-- Form Actions --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('potensi.potensi-sdm.usia.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <button type="reset" class="btn btn-warning">
                                <i class="fas fa-undo"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Data
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
            // Form validation
            $('#form-usia').on('submit', function(e) {
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
                    Swal.fire({
                        title: 'Form Tidak Lengkap',
                        text: 'Mohon lengkapi semua field yang wajib diisi',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                }
            });

            // Remove invalid class on input
            $('input, select').on('input change', function() {
                if ($(this).val()) {
                    $(this).removeClass('is-invalid');
                }
            });
        });
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
        }

        .border-bottom {
            border-bottom: 2px solid !important;
        }

        .text-primary {
            color: #007bff !important;
        }

        .text-info {
            color: #17a2b8 !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        .form-group {
            margin-bottom: 1.5rem;
            gap: 5px;
        }

        .alert {
            border-radius: 0.375rem;
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
    </style>
@endpush

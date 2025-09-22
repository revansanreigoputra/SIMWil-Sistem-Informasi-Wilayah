@extends('layouts.master')

@section('title', 'Edit Data Usia')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Edit Data Usia: {{ \Carbon\Carbon::parse($usia->tanggal)->format('d/m/Y') }}
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('potensi.potensi-sdm.usia.update', $usia->id) }}" method="POST" id="form-edit-usia">
                @csrf
                @method('PUT')

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
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', \Carbon\Carbon::parse($usia->tanggal)->format('Y-m-d')) }}"
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
                                    value="{{ old('l' . $i, $usia->{"l{$i}"}) }}" min="0">
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
                                    value="{{ old('p' . $i, $usia->{"p{$i}"}) }}" min="0">
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
                            <a href="{{ route('potensi.potensi-sdm.usia.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <a href="{{ route('potensi.potensi-sdm.usia.show', $usia->id) }}" class="btn btn-secondary">
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
                tanggal: "{{ \Carbon\Carbon::parse($usia->tanggal)->format('d/m/Y') }}",
                @for ($i = 0; $i <= 75; $i++)
                    l{{ $i }}: "{{ $usia->{"l{$i}"} ?? 0 }}",
                @endfor
                @for ($i = 0; $i <= 75; $i++)
                    p{{ $i }}: "{{ $usia->{"p{$i}"} ?? 0 }}",
                @endfor
            };

            // Form validation
            $('#form-edit-usia').on('submit', function(e) {
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
            $('input').on('change', function() {
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
                tanggal: "{{ \Carbon\Carbon::parse($usia->tanggal)->format('d/m/Y') }}",
                @for ($i = 0; $i <= 75; $i++)
                    l{{ $i }}: "{{ $usia->{"l{$i}"} ?? 0 }}",
                @endfor
                @for ($i = 0; $i <= 75; $i++)
                    p{{ $i }}: "{{ $usia->{"p{$i}"} ?? 0 }}",
                @endfor
            };

            Object.keys(originalValues).forEach(key => {
                $(`[name="${key}"]`).val(originalValues[key]).trigger('change');
            });

            // Remove all warning highlights
            $('input').removeClass('border-warning');
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

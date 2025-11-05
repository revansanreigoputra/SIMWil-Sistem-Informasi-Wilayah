@extends('layouts.master')

@section('title', 'Tambah Potensi Mata Pencaharian Pokok')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                 Tambah Data Potensi Mata Pencaharian Pokok
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('potensi.potensi-sdm.mata-pencaharian-pokok.store') }}" method="POST" id="form-mata-pencaharian-pokok">
                @csrf

                {{-- Section: Informasi Potensi Mata Pencaharian Pokok --}}
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2 mb-3">
                            <i class="fas fa-info-circle"></i> Informasi Potensi Mata Pencaharian Pokok
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
                                class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}"
                                required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mata_pencaharian_id" class="form-label required">
                                <i class="fas fa-briefcase"></i> Mata Pencaharian
                            </label>
                            <select name="mata_pencaharian_id" id="mata_pencaharian_id"
                                class="form-control select2 @error('mata_pencaharian_id') is-invalid @enderror" required>
                                <option value="">Pilih Mata Pencaharian</option>
                                @foreach ($mataPencaharians as $mataPencaharian)
                                    <option value="{{ $mataPencaharian->id }}"
                                        {{ old('mata_pencaharian_id') == $mataPencaharian->id ? 'selected' : '' }}>
                                        {{ $mataPencaharian->mata_pencaharian }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mata_pencaharian_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="laki_laki" class="form-label required">
                                <i class="fas fa-male"></i> Jumlah Laki-laki
                            </label>
                            <input type="number" name="laki_laki" id="laki_laki"
                                class="form-control @error('laki_laki') is-invalid @enderror" value="{{ old('laki_laki') }}"
                                placeholder="Masukkan jumlah laki-laki" required min="0">
                            @error('laki_laki')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="perempuan" class="form-label required">
                                <i class="fas fa-female"></i> Jumlah Perempuan
                            </label>
                            <input type="number" name="perempuan" id="perempuan"
                                class="form-control @error('perempuan') is-invalid @enderror" value="{{ old('perempuan') }}"
                                placeholder="Masukkan jumlah perempuan" required min="0">
                            @error('perempuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="total" class="form-label required">
                                <i class="fas fa-users"></i> Total
                            </label>
                            <input type="number" name="total" id="total"
                                class="form-control @error('total') is-invalid @enderror"
                                placeholder="Jumlah akan terisi otomatis" required min="0" readonly>
                            @error('total')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('potensi.potensi-sdm.mata-pencaharian-pokok.index') }}" class="btn btn-secondary">
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
            // Initialize Select2
            $('.select2').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih Mata Pencaharian',
                allowClear: true
            });

            // Calculate total based on laki_laki and perempuan inputs
            function calculateTotal() {
                const lakiLaki = parseInt($('#laki_laki').val()) || 0;
                const perempuan = parseInt($('#perempuan').val()) || 0;
                const total = lakiLaki + perempuan;
                $('#total').val(total);
            }

            // Add event listeners for input changes
            $('#laki_laki, #perempuan').on('input', function() {
                calculateTotal();
            });

            // Form validation
            $('#form-mata-pencaharian-pokok').on('submit', function(e) {
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

            // Calculate initial total if values exist
            calculateTotal();
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

        .text-success {
            color: #28a745 !important;
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

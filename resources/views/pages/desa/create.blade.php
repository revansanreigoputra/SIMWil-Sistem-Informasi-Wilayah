@extends('layouts.master')

@section('title', 'Tambah Desa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                 Tambah Data Desa
            </h5>
        </div>

        <div class="card-body">

            <form action="{{ route('desa.store') }}" method="POST" id="form-desa">
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
                            <label for="kecamatan_id" class="form-label required">
                                <i class="fas fa-map-marker-alt"></i> Kecamatan
                            </label>
                            <select name="kecamatan_id" id="kecamatan_id"
                                class="form-control @error('kecamatan_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kecamatan --</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}"
                                        {{ old('kecamatan_id') == $kecamatan->id ? 'selected' : '' }}>
                                        {{ $kecamatan->nama_kecamatan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kecamatan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_desa" class="form-label required">
                                <i class="fas fa-home"></i> Nama Desa
                            </label>
                            <input type="text" name="nama_desa" id="nama_desa"
                                class="form-control @error('nama_desa') is-invalid @enderror" value="{{ old('nama_desa') }}"
                                placeholder="Masukkan nama desa" required>
                            @error('nama_desa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="form-label">
                                <i class="fas fa-tag"></i> Status
                            </label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="desa" {{ old('status') == 'desa' ? 'selected' : '' }}>Desa</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_pum" class="form-label required">
                                <i class="fas fa-barcode"></i> Kode PUM
                            </label>
                            <input type="text" name="kode_pum" id="kode_pum"
                                class="form-control @error('kode_pum') is-invalid @enderror" value="{{ old('kode_pum') }}"
                                placeholder="Masukkan kode PUM" required>
                            @error('kode_pum')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Section: Informasi Geografis --}}
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-success border-bottom pb-2 mb-3 mt-4">
                            <i class="fas fa-globe-americas"></i> Informasi Geografis
                        </h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelurahan_terluar" class="form-label">
                                <i class="fas fa-map"></i> Kelurahan Terluar
                            </label>
                            <input type="text" name="kelurahan_terluar" id="kelurahan_terluar"
                                class="form-control @error('kelurahan_terluar') is-invalid @enderror"
                                value="{{ old('kelurahan_terluar') }}" placeholder="Masukkan kelurahan terluar">
                            @error('kelurahan_terluar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipologi" class="form-label">
                                <i class="fas fa-layer-group"></i> Tipologi
                            </label>
                            <select name="tipologi" id="tipologi"
                                class="form-control @error('tipologi') is-invalid @enderror">
                                <option value="">-- Pilih Tipologi --</option>
                                <option value="Dataran Tinggi" {{ old('tipologi') == 'Dataran Tinggi' ? 'selected' : '' }}>
                                    Dataran Tinggi</option>
                                <option value="Dataran Rendah" {{ old('tipologi') == 'Dataran Rendah' ? 'selected' : '' }}>
                                    Dataran Rendah</option>
                                <option value="Pesisir" {{ old('tipologi') == 'Pesisir' ? 'selected' : '' }}>Pesisir
                                </option>
                                <option value="Pegunungan" {{ old('tipologi') == 'Pegunungan' ? 'selected' : '' }}>
                                    Pegunungan</option>
                                <option value="Perbukitan" {{ old('tipologi') == 'Perbukitan' ? 'selected' : '' }}>
                                    Perbukitan</option>
                            </select>
                            @error('tipologi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="luas" class="form-label">
                                <i class="fas fa-expand-arrows-alt"></i> Luas (Ha)
                            </label>
                            <div class="input-group">
                                <input type="number" name="luas" id="luas"
                                    class="form-control @error('luas') is-invalid @enderror" value="{{ old('luas') }}"
                                    placeholder="0" step="0.01" min="0">
                                <div class="input-group-append">
                                    <span class="input-group-text">Ha</span>
                                </div>
                                @error('luas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bujur" class="form-label">
                                <i class="fas fa-compass"></i> Bujur (Longitude)
                            </label>
                            <div class="input-group">
                                <input type="number" name="bujur" id="bujur"
                                    class="form-control @error('bujur') is-invalid @enderror" value="{{ old('bujur') }}"
                                    placeholder="106.123456" step="0.000001" min="-180" max="180">
                                <div class="input-group-append">
                                    <span class="input-group-text">°</span>
                                </div>
                                @error('bujur')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lintang" class="form-label">
                                <i class="fas fa-crosshairs"></i> Lintang (Latitude)
                            </label>
                            <div class="input-group">
                                <input type="number" name="lintang" id="lintang"
                                    class="form-control @error('lintang') is-invalid @enderror"
                                    value="{{ old('lintang') }}" placeholder="-6.123456" step="0.000001" min="-90"
                                    max="90">
                                <div class="input-group-append">
                                    <span class="input-group-text">°</span>
                                </div>
                                @error('lintang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ketinggian" class="form-label">
                                <i class="fas fa-mountain"></i> Ketinggian (mdpl)
                            </label>
                            <div class="input-group">
                                <input type="number" name="ketinggian" id="ketinggian"
                                    class="form-control @error('ketinggian') is-invalid @enderror"
                                    value="{{ old('ketinggian') }}" placeholder="0" min="0" max="9000">
                                <div class="input-group-append">
                                    <span class="input-group-text">mdpl</span>
                                </div>
                                @error('ketinggian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('desa.index') }}" class="btn btn-secondary">
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
            $('#form-desa').on('submit', function(e) {
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

            // Auto format coordinates
            $('#bujur, #lintang').on('blur', function() {
                let value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    $(this).val(value.toFixed(6));
                }
            });

            // Initialize Select2 for better dropdown experience
            $('#kecamatan_id, #status, #tipologi').select2({
                theme: 'bootstrap4',
                width: '100%'
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

        /* .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-bottom: none;
        }

        .card-header .card-title {
            margin: 0;
            font-weight: 600;
        } */

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
/* 
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            transform: translateY(-1px);
        } */

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

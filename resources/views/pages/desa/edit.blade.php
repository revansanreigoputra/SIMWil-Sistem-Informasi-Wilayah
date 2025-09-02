@extends('layouts.master')

@section('title', 'Edit Desa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit"></i> Edit Data Desa: {{ $desa->nama_desa }}
            </h3>
        </div>

        <div class="card-body">
            <form action="{{ route('desa.update', $desa->id) }}" method="POST" id="form-edit-desa">
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
                            <label for="kecamatan_id" class="form-label required">
                                <i class="fas fa-map-marker-alt"></i> Kecamatan
                            </label>
                            <select name="kecamatan_id" id="kecamatan_id"
                                class="form-control @error('kecamatan_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kecamatan --</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}"
                                        {{ old('kecamatan_id', $desa->kecamatan_id) == $kecamatan->id ? 'selected' : '' }}>
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
                                class="form-control @error('nama_desa') is-invalid @enderror"
                                value="{{ old('nama_desa', $desa->nama_desa) }}" placeholder="Masukkan nama desa" required>
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
                                <option value="desa" {{ old('status', $desa->status) == 'desa' ? 'selected' : '' }}>Desa
                                </option>
                                <option value="kelurahan"
                                    {{ old('status', $desa->status) == 'kelurahan' ? 'selected' : '' }}>Kelurahan</option>
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
                                class="form-control @error('kode_pum') is-invalid @enderror"
                                value="{{ old('kode_pum', $desa->kode_pum) }}" placeholder="Masukkan kode PUM" required>
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
                                value="{{ old('kelurahan_terluar', $desa->kelurahan_terluar) }}"
                                placeholder="Masukkan kelurahan terluar">
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
                                <option value="Dataran Tinggi"
                                    {{ old('tipologi', $desa->tipologi) == 'Dataran Tinggi' ? 'selected' : '' }}>Dataran
                                    Tinggi</option>
                                <option value="Dataran Rendah"
                                    {{ old('tipologi', $desa->tipologi) == 'Dataran Rendah' ? 'selected' : '' }}>Dataran
                                    Rendah</option>
                                <option value="Pesisir"
                                    {{ old('tipologi', $desa->tipologi) == 'Pesisir' ? 'selected' : '' }}>Pesisir</option>
                                <option value="Pegunungan"
                                    {{ old('tipologi', $desa->tipologi) == 'Pegunungan' ? 'selected' : '' }}>Pegunungan
                                </option>
                                <option value="Perbukitan"
                                    {{ old('tipologi', $desa->tipologi) == 'Perbukitan' ? 'selected' : '' }}>Perbukitan
                                </option>
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
                                    class="form-control @error('luas') is-invalid @enderror"
                                    value="{{ old('luas', $desa->luas) }}" placeholder="0" step="0.01"
                                    min="0">
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
                                    class="form-control @error('bujur') is-invalid @enderror"
                                    value="{{ old('bujur', $desa->bujur) }}" placeholder="106.123456" step="0.000001"
                                    min="-180" max="180">
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
                                    value="{{ old('lintang', $desa->lintang) }}" placeholder="-6.123456" step="0.000001"
                                    min="-90" max="90">
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
                                    value="{{ old('ketinggian', $desa->ketinggian) }}" placeholder="0" min="0"
                                    max="9000">
                                <div class="input-group-append">
                                    <span class="input-group-text">mdpl</span>
                                </div>
                                @error('ketinggian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-muted">
                                <i class="fas fa-info-circle"></i> Terakhir Diupdate
                            </label>
                            <div class="form-control-plaintext bg-light rounded p-2">
                                <i class="fas fa-calendar-alt text-muted"></i>
                                {{ $desa->updated_at ? $desa->updated_at->format('d/m/Y H:i:s') : 'Belum pernah diupdate' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('desa.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <a href="{{ route('desa.show', $desa->id) }}" class="btn btn-secondary">
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

    {{-- Info Card --}}
    <div class="card mt-3">
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-calendar-plus"></i></span>
                        <div class="info-box-content py-1 text-white">
                            <span class="info-box-text">Dibuat</span>
                            <span class="info-box-number">{{ $desa->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-edit"></i></span>
                        <div class="info-box-content py-1 text-white">
                            <span class="info-box-text">Terakhir Edit</span>
                            <span class="info-box-number">{{ $desa->updated_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="fas fa-map-marker-alt"></i></span>
                        <div class="info-box-content py-1 text-white">
                            <span class="info-box-text">Kecamatan</span>
                            <span class="info-box-number">{{ $desa->kecamatan->nama_kecamatan ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fas fa-barcode"></i></span>
                        <div class="info-box-content py-1 text-white">
                            <span class="info-box-text">Kode PUM</span>
                            <span class="info-box-number">{{ $desa->kode_pum }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            // Store original values for reset function
            const originalValues = {
                kecamatan_id: "{{ $desa->kecamatan_id }}",
                nama_desa: "{{ $desa->nama_desa }}",
                status: "{{ $desa->status }}",
                kode_pum: "{{ $desa->kode_pum }}",
                kelurahan_terluar: "{{ $desa->kelurahan_terluar }}",
                tipologi: "{{ $desa->tipologi }}",
                luas: "{{ $desa->luas }}",
                bujur: "{{ $desa->bujur }}",
                lintang: "{{ $desa->lintang }}",
                ketinggian: "{{ $desa->ketinggian }}"
            };

            // Form validation
            $('#form-edit-desa').on('submit', function(e) {
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

            // Auto format coordinates
            $('#bujur, #lintang').on('blur', function() {
                let value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    $(this).val(value.toFixed(6));
                }
            });

            // Initialize Select2
            $('#kecamatan_id, #status, #tipologi').select2({
                theme: 'bootstrap4',
                width: '100%'
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
                kecamatan_id: "{{ $desa->kecamatan_id }}",
                nama_desa: "{{ $desa->nama_desa }}",
                status: "{{ $desa->status }}",
                kode_pum: "{{ $desa->kode_pum }}",
                kelurahan_terluar: "{{ $desa->kelurahan_terluar }}",
                tipologi: "{{ $desa->tipologi }}",
                luas: "{{ $desa->luas }}",
                bujur: "{{ $desa->bujur }}",
                lintang: "{{ $desa->lintang }}",
                ketinggian: "{{ $desa->ketinggian }}"
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

        .card-header {
            background: linear-gradient(135deg, #fd7e14 0%, #e83e8c 100%);
            color: white;
            border-bottom: none;
        }

        .card-header .card-title {
            margin: 0;
            font-weight: 600;
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

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            transform: translateY(-1px);
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
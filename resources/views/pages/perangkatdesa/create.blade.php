@extends('layouts.master')

@section('title', 'Tambah Perangkat Desa')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Perangkat Desa</h3>
                    </div>

                    <div class="card-body">
                        {{-- Error Alert --}}
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        {{-- Form --}}
                        <form action="{{ route('perangkat_desa.store') }}" method="POST" enctype="multipart/form-data"
                            id="perangkat-desa-form">
                            @csrf

                            {{-- Row 1: Desa & Jabatan --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="desa_id">Desa <span class="text-danger">*</span></label>
                                        <select name="desa_id" id="desa_id"
                                            class="form-control @error('desa_id') is-invalid @enderror" required>
                                            <option value="">-- Pilih Desa --</option>
                                            @foreach ($desas as $desa)
                                                <option value="{{ $desa->id }}"
                                                    {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                                    {{ $desa->nama_desa }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('desa_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jabatan_id">Jabatan <span class="text-danger">*</span></label>
                                        <select name="jabatan_id" id="jabatan_id"
                                            class="form-control @error('jabatan_id') is-invalid @enderror" required>
                                            <option value="">-- Pilih Jabatan --</option>
                                            @foreach ($jabatans as $jabatan)
                                                <option value="{{ $jabatan->id }}"
                                                    {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                                                    {{ $jabatan->nama_jabatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('jabatan_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Row 1.5: Masa Jabatan --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="masa_jabatan">Masa Jabatan</label>
                                        <input type="text" name="masa_jabatan" id="masa_jabatan"
                                            class="form-control @error('masa_jabatan') is-invalid @enderror"
                                            value="{{ old('masa_jabatan') }}" placeholder="Contoh: 2020-2026">
                                        <span id="masa-jabatan-error" class="text-danger" style="display:none;"></span>
                                        @error('masa_jabatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Row 2: Nama & Tanggal Lahir --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" id="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ old('tanggal_lahir') }}" max="{{ date('Y-m-d') }}">
                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Row 3: Jenis Kelamin & Golongan Darah --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select name="jenis_kelamin" id="jenis_kelamin"
                                            class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="golongan_darah">Golongan Darah</label>
                                        <select name="golongan_darah" id="golongan_darah"
                                            class="form-control @error('golongan_darah') is-invalid @enderror">
                                            <option value="">-- Pilih Golongan Darah --</option>
                                            <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A
                                            </option>
                                            <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B
                                            </option>
                                            <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB
                                            </option>
                                            <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O
                                            </option>
                                        </select>
                                        @error('golongan_darah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Row 4: Kontak --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kontak">Nomor Kontak</label>
                                        <input type="tel" name="kontak" id="kontak"
                                            class="form-control @error('kontak') is-invalid @enderror"
                                            value="{{ old('kontak') }}" placeholder="Contoh: 08123456789">
                                        @error('kontak')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pendidikan_id">Pendidikan</label>
                                        <select name="pendidikan_id" id="pendidikan_id"
                                            class="form-control @error('pendidikan_id') is-invalid @enderror">
                                            <option value="">-- Pilih Pendidikan --</option>
                                            @foreach ($pendidikans as $pendidikan)
                                                <option value="{{ $pendidikan->id }}"
                                                    {{ old('pendidikan_id') == $pendidikan->id ? 'selected' : '' }}>
                                                    {{ $pendidikan->pendidikan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Row 5: Nama Pasangan & Jumlah Anak --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_pasangan">Nama Pasangan</label>
                                            <input type="text" name="nama_pasangan" id="nama_pasangan"
                                                class="form-control @error('nama_pasangan') is-invalid @enderror"
                                                value="{{ old('nama_pasangan') }}" placeholder="Masukkan nama pasangan">
                                            @error('nama_pasangan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah_anak">Jumlah Anak</label>
                                            <input type="number" name="jumlah_anak" id="jumlah_anak"
                                                class="form-control @error('jumlah_anak') is-invalid @enderror"
                                                value="{{ old('jumlah_anak', 0) }}" min="0" max="20"
                                                placeholder="0">
                                            @error('jumlah_anak')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Row 6: Foto --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="foto">Foto Profil</label>
                                            <div class="custom-file">
                                                <input type="file" name="foto" id="foto"
                                                    class="custom-file-input @error('foto') is-invalid @enderror"
                                                    accept="image/jpeg,image/png,image/jpg">
                                                <label class="custom-file-label" for="foto">Pilih file
                                                    foto...</label>
                                            </div>
                                            <small class="form-text text-muted">
                                                Format yang didukung: JPG, JPEG, PNG. Maksimal 2MB.
                                            </small>
                                            @error('foto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Row 7: Alamat --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat Lengkap</label>
                                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
                                                placeholder="Masukkan alamat lengkap...">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Row 8: Sambutan --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="sambutan">Sambutan/Visi Misi</label>
                                            <textarea name="sambutan" id="sambutan" class="form-control @error('sambutan') is-invalid @enderror"
                                                rows="4" placeholder="Masukkan sambutan atau visi misi...">{{ old('sambutan') }}</textarea>
                                            @error('sambutan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Action Buttons --}}
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group d-flex justify-content-end">
                                            <a href="{{ route('perangkat_desa.index') }}" class="btn btn-secondary mr-3">
                                                <i class="fas fa-times"></i> Batal
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Simpan Data
                                            </button>
                                        </div>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            // Custom file input
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').html(fileName);
            });

            // Form validation
            $('#perangkat-desa-form').on('submit', function(e) {
                let isValid = true;
                let errorMessage = '';

                // Validate required fields
                const requiredFields = [{
                        field: '#desa_id',
                        message: 'Desa harus dipilih'
                    },
                    {
                        field: '#jabatan_id',
                        message: 'Jabatan harus dipilih'
                    },
                    {
                        field: '#nama',
                        message: 'Nama harus diisi'
                    },
                    {
                        field: '#jenis_kelamin',
                        message: 'Jenis kelamin harus dipilih'
                    }
                ];

                requiredFields.forEach(function(item) {
                    if (!$(item.field).val()) {
                        isValid = false;
                        errorMessage += '• ' + item.message + '\n';
                        $(item.field).addClass('is-invalid');
                    } else {
                        $(item.field).removeClass('is-invalid');
                    }
                });

                // Validate phone number format
                const kontak = $('#kontak').val();
                if (kontak && !/^(\+62|62|0)[0-9]{9,13}$/.test(kontak.replace(/\s/g, ''))) {
                    isValid = false;
                    errorMessage += '• Format nomor kontak tidak valid\n';
                    $('#kontak').addClass('is-invalid');
                }

                if (!isValid) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Validasi Form',
                        text: errorMessage,
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                }
            });

            // Auto format phone number
            $('#kontak').on('input', function() {
                let value = $(this).val().replace(/\D/g, '');
                if (value.startsWith('62')) {
                    value = '+' + value;
                } else if (value.startsWith('0')) {
                    // Keep as is
                }
                $(this).val(value);
            });

            // Select2 for better dropdown experience
            if (typeof $.fn.select2 !== 'undefined') {
                $('#desa_id, #jabatan_id, #jenis_kelamin, #golongan_darah').select2({
                    theme: 'bootstrap4',
                    width: '100%'
                });
            }

            // Function to check for duplicates
            function checkDuplicate() {
                const desa_id = $('#desa_id').val();
                const jabatan_id = $('#jabatan_id').val();
                const masa_jabatan = $('#masa_jabatan').val();

                if (desa_id && jabatan_id && masa_jabatan) {
                    $.ajax({
                        url: '{{ route('perangkat_desa.check_duplicate') }}',
                        method: 'POST',
                        data: {
                            desa_id: desa_id,
                            jabatan_id: jabatan_id,
                            masa_jabatan: masa_jabatan,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.duplicate) {
                                $('#masa-jabatan-error').text(response.message).show();
                                $('#masa_jabatan').addClass('is-invalid');
                            } else {
                                $('#masa-jabatan-error').hide();
                                $('#masa_jabatan').removeClass('is-invalid');
                            }
                        },
                        error: function() {
                            console.log('Error checking duplicate');
                        }
                    });
                } else {
                    $('#masa-jabatan-error').hide();
                    $('#masa_jabatan').removeClass('is-invalid');
                }
            }

            // Check for duplicates when fields change
            $('#desa_id, #jabatan_id, #masa_jabatan').on('change input', function() {
                checkDuplicate();
            });
        });
    </script>
@endpush

@push('addon-style')
    <style>
        .card {
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            border-radius: 0.375rem;
        }

        /* .card-header {
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    color: white;
                    border-radius: 0.375rem 0.375rem 0 0 !important;
                } */

        /* .card-header .card-title {
                    color: white;
                    font-weight: 600;
                } */

        .form-group {
            margin-bottom: 1.5rem;
            gap: 5px;
        }

        .form-group label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .btn {
            border-radius: 0.375rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }

        /* .btn-primary {
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    border: none;
                }

                .btn-primary:hover {
                    background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
                    transform: translateY(-1px);
                } */

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
            transform: translateY(-1px);
        }

        .custom-file-label {
            border-radius: 0.375rem;
        }

        .custom-file-input:focus~.custom-file-label {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .alert {
            border-radius: 0.375rem;
            border: none;
            margin-bottom: 1.5rem;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        .form-text {
            font-size: 0.8rem;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .form-group {
                margin-bottom: 1rem;
            }

            .btn {
                margin-bottom: 0.5rem;
                width: 100%;
            }

            .btn.ml-2 {
                margin-left: 0 !important;
            }
        }
    </style>
@endpush

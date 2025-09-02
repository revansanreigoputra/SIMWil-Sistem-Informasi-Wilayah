@extends('layouts.master')

@section('title', 'Edit Perangkat Desa')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Perangkat Desa</h3>
                    </div>

                    <div class="card-body">
                        {{-- Error Alert --}}
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <form action="{{ route('perangkat_desa.update', $perangkatDesa->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="desa_id">Desa <span class="text-danger">*</span></label>
                                    <select name="desa_id" id="desa_id"
                                        class="form-control @error('desa_id') is-invalid @enderror" required>
                                        <option value="">Pilih Desa</option>
                                        @foreach ($desas as $desa)
                                            <option value="{{ $desa->id }}"
                                                {{ old('desa_id', $perangkatDesa->desa_id) == $desa->id ? 'selected' : '' }}>
                                                {{ $desa->nama_desa }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('desa_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="jabatan_id">Jabatan <span class="text-danger">*</span></label>
                                    <select name="jabatan_id" id="jabatan_id"
                                        class="form-control @error('jabatan_id') is-invalid @enderror" required>
                                        <option value="">Pilih Jabatan</option>
                                        @foreach ($jabatans as $jabatan)
                                            <option value="{{ $jabatan->id }}"
                                                {{ old('jabatan_id', $perangkatDesa->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                                                {{ $jabatan->nama_jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jabatan_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama">Nama <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $perangkatDesa->nama) }}" required>
                                    @error('nama')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        value="{{ old('tanggal_lahir', $perangkatDesa->tanggal_lahir ? \Carbon\Carbon::parse($perangkatDesa->tanggal_lahir)->format('Y-m-d') : '') }}">
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L"
                                            {{ old('jenis_kelamin', $perangkatDesa->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="P"
                                            {{ old('jenis_kelamin', $perangkatDesa->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="golongan_darah">Golongan Darah</label>
                                    <input type="text" name="golongan_darah" id="golongan_darah"
                                        class="form-control @error('golongan_darah') is-invalid @enderror"
                                        value="{{ old('golongan_darah', $perangkatDesa->golongan_darah) }}" maxlength="3">
                                    @error('golongan_darah')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kontak">Kontak</label>
                                    <input type="text" name="kontak" id="kontak"
                                        class="form-control @error('kontak') is-invalid @enderror"
                                        value="{{ old('kontak', $perangkatDesa->kontak) }}">
                                    @error('kontak')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="masa_jabatan">Masa Jabatan</label>
                                    <input type="text" name="masa_jabatan" id="masa_jabatan"
                                        class="form-control @error('masa_jabatan') is-invalid @enderror"
                                        value="{{ old('masa_jabatan', $perangkatDesa->masa_jabatan) }}">
                                    <span id="masa-jabatan-error" class="text-danger" style="display:none;"></span>
                                    @error('masa_jabatan')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama_pasangan">Nama Pasangan</label>
                                    <input type="text" name="nama_pasangan" id="nama_pasangan"
                                        class="form-control @error('nama_pasangan') is-invalid @enderror"
                                        value="{{ old('nama_pasangan', $perangkatDesa->nama_pasangan) }}">
                                    @error('nama_pasangan')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="jumlah_anak">Jumlah Anak</label>
                                    <input type="number" name="jumlah_anak" id="jumlah_anak"
                                        class="form-control @error('jumlah_anak') is-invalid @enderror"
                                        value="{{ old('jumlah_anak', $perangkatDesa->jumlah_anak) }}" min="0">
                                    @error('jumlah_anak')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto"
                                        class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                                    @if ($perangkatDesa->foto)
                                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah
                                            foto</small>
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $perangkatDesa->foto) }}" alt="Foto"
                                                class="img-thumbnail" style="max-width: 100px;">
                                        </div>
                                    @endif
                                    @error('foto')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat', $perangkatDesa->alamat) }}</textarea>
                                @error('alamat')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sambutan">Sambutan</label>
                                <textarea name="sambutan" id="sambutan" class="form-control @error('sambutan') is-invalid @enderror"
                                    rows="3">{{ old('sambutan', $perangkatDesa->sambutan) }}</textarea>
                                @error('sambutan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Action Buttons --}}
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="form-group d-flex justify-content-end">
                                        <a href="{{ route('perangkat_desa.index') }}" class="btn btn-secondary mr-3">
                                            <i class="fas fa-times"></i> Batal
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Update
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
            // Function to check for duplicates
            function checkDuplicate() {
                const desa_id = $('#desa_id').val();
                const jabatan_id = $('#jabatan_id').val();
                const masa_jabatan = $('#masa_jabatan').val();

                if (desa_id && jabatan_id && masa_jabatan) {
                    $.ajax({
                        url: '{{ route("perangkat_desa.check_duplicate") }}',
                        method: 'POST',
                        data: {
                            desa_id: desa_id,
                            jabatan_id: jabatan_id,
                            masa_jabatan: masa_jabatan,
                            exclude_id: '{{ $perangkatDesa->id }}',
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

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 0.375rem 0.375rem 0 0 !important;
        }

        .card-header .card-title {
            color: white;
            font-weight: 600;
        }

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

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            transform: translateY(-1px);
        }

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
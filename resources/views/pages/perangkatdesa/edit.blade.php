@extends('layouts.master')

@section('title', 'Edit Perangkat Desa')

@section('content')
@can('perangkat_desa.update')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-pencil-square me-2"></i>Form Edit Perangkat Desa
        </h5>
    </div>

    <div class="card-body p-4">
        {{-- Form --}}
        <form action="{{ route('perangkat_desa.update', $perangkatDesa->id) }}" method="POST"
            enctype="multipart/form-data" id="perangkat-desa-form">
            @csrf
            @method('PUT')

            {{-- SECTION 1: Informasi Jabatan --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-briefcase-fill me-2"></i>Informasi Jabatan</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="desa_id" class="form-label fw-semibold">Desa <span
                                class="text-danger">*</span></label>
                        <select name="desa_id" id="desa_id"
                            class="form-select @error('desa_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Desa --</option>
                            @foreach ($desas as $desa)
                                <option value="{{ $desa->id }}"
                                    {{ old('desa_id', $perangkatDesa->desa_id) == $desa->id ? 'selected' : '' }}>
                                    {{ $desa->nama_desa }}
                                </option>
                            @endforeach
                        </select>
                        @error('desa_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="jabatan_id" class="form-label fw-semibold">Jabatan <span
                                class="text-danger">*</span></label>
                        <select name="jabatan_id" id="jabatan_id"
                            class="form-select @error('jabatan_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Jabatan --</option>
                            @foreach ($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}"
                                    {{ old('jabatan_id', $perangkatDesa->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                                    {{ $jabatan->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jabatan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="masa_jabatan" class="form-label fw-semibold">Masa Jabatan</label>
                        <input type="text" name="masa_jabatan" id="masa_jabatan"
                            class="form-control @error('masa_jabatan') is-invalid @enderror"
                            value="{{ old('masa_jabatan', $perangkatDesa->masa_jabatan) }}"
                            placeholder="Contoh: 2020-2026">
                        <span id="masa-jabatan-error" class="text-danger" style="font-size: .875em; display:none;"></span>
                        @error('masa_jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Data Diri --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-success"><i class="bi bi-person-lines-fill me-2"></i>Data Diri</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label fw-semibold">Nama Lengkap <span
                                class="text-danger">*</span></label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama', $perangkatDesa->nama) }}" placeholder="Masukkan nama lengkap"
                            required>
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            value="{{ old('tanggal_lahir', $perangkatDesa->tanggal_lahir ? \Carbon\Carbon::parse($perangkatDesa->tanggal_lahir)->format('Y-m-d') : '') }}"
                            max="{{ date('Y-m-d') }}">
                        @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin <span
                                class="text-danger">*</span></label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L"
                                {{ old('jenis_kelamin', $perangkatDesa->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="P"
                                {{ old('jenis_kelamin', $perangkatDesa->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="golongan_darah" class="form-label fw-semibold">Golongan Darah</label>
                        <select name="golongan_darah" id="golongan_darah"
                            class="form-select @error('golongan_darah') is-invalid @enderror">
                            <option value="">-- Pilih Golongan Darah --</option>
                            <option value="A"
                                {{ old('golongan_darah', $perangkatDesa->golongan_darah) == 'A' ? 'selected' : '' }}>A
                            </option>
                            <option value="B"
                                {{ old('golongan_darah', $perangkatDesa->golongan_darah) == 'B' ? 'selected' : '' }}>B
                            </option>
                            <option value="AB"
                                {{ old('golongan_darah', $perangkatDesa->golongan_darah) == 'AB' ? 'selected' : '' }}>AB
                            </option>
                            <option value="O"
                                {{ old('golongan_darah', $perangkatDesa->golongan_darah) == 'O' ? 'selected' : '' }}>O
                            </option>
                        </select>
                        @error('golongan_darah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="pendidikan_id" class="form-label fw-semibold">Pendidikan</label>
                        <select name="pendidikan_id" id="pendidikan_id"
                            class="form-select @error('pendidikan_id') is-invalid @enderror">
                            <option value="">-- Pilih Pendidikan --</option>
                            @foreach ($pendidikans as $pendidikan)
                                <option value="{{ $pendidikan->id }}"
                                    {{ old('pendidikan_id', $perangkatDesa->pendidikan_id) == $pendidikan->id ? 'selected' : '' }}>
                                    {{ $pendidikan->pendidikan }}
                                </option>
                            @endforeach
                        </select>
                        @error('pendidikan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            {{-- SECTION 3: Kontak & Keluarga --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-info"><i class="bi bi-people-fill me-2"></i>Kontak & Keluarga</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="kontak" class="form-label fw-semibold">Nomor Kontak</label>
                        <input type="tel" name="kontak" id="kontak"
                            class="form-control @error('kontak') is-invalid @enderror"
                            value="{{ old('kontak', $perangkatDesa->kontak) }}"
                            placeholder="Contoh: 08123456789">
                        @error('kontak') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nama_pasangan" class="form-label fw-semibold">Nama Pasangan</label>
                        <input type="text" name="nama_pasangan" id="nama_pasangan"
                            class="form-control @error('nama_pasangan') is-invalid @enderror"
                            value="{{ old('nama_pasangan', $perangkatDesa->nama_pasangan) }}"
                            placeholder="Masukkan nama pasangan">
                        @error('nama_pasangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="jumlah_anak" class="form-label fw-semibold">Jumlah Anak</label>
                        <input type="number" name="jumlah_anak" id="jumlah_anak"
                            class="form-control @error('jumlah_anak') is-invalid @enderror"
                            value="{{ old('jumlah_anak', $perangkatDesa->jumlah_anak) }}" min="0" max="20"
                            placeholder="0">
                        @error('jumlah_anak') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label for="alamat" class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
                            placeholder="Masukkan alamat lengkap...">{{ old('alamat', $perangkatDesa->alamat) }}</textarea>
                        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            {{-- SECTION 4: Lainnya --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-secondary"><i class="bi bi-folder-fill me-2"></i>Lainnya</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="foto" class="form-label fw-semibold">Foto Profil</label>
                        <input type="file" name="foto" id="foto"
                            class="form-control @error('foto') is-invalid @enderror"
                            accept="image/jpeg,image/png,image/jpg">
                        <small class="form-text text-muted">
                            Format: JPG, JPEG, PNG. Maks 2MB. Kosongkan jika tidak ingin mengubah.
                        </small>
                        @if ($perangkatDesa->foto)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $perangkatDesa->foto) }}" alt="Foto Profil"
                                    class="img-thumbnail" style="max-width: 100px;">
                                <small class="d-block text-muted">Foto Saat Ini</small>
                            </div>
                        @endif
                        @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label for="sambutan" class="form-label fw-semibold">Sambutan</label>
                        <textarea name="sambutan" id="sambutan" class="form-control @error('sambutan') is-invalid @enderror"
                            rows="3" placeholder="Tuliskan sambutan...">{{ old('sambutan', $perangkatDesa->sambutan) }}</textarea>
                        @error('sambutan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('perangkat_desa.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Update
                </button>
            </div>

        </form>
    </div>
</div>
@endcan
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
                        url: '{{ route('perangkat_desa.check_duplicate') }}',
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
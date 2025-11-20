@extends('layouts.master')

@section('title', 'Tambah Kepala Keluarga')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Formulir Tambah Data Keluarga (KK)</h5>
            </div>
            @if (session('error_banner'))
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-exclamation-circle-fill me-2 fs-4"></i>
                        <div>
                            <strong>Terjadi Kesalahan!</strong>
                            <br>
                            {{ session('error_banner') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- BATAS ALERT ERROR --}}
            <form action="{{ route('data_keluarga.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    {{-- Bagian 1: Data KK (Kartu Keluarga) --}}
                    <div class="card bg-light p-3 mb-4">
                        <h6 class="text-primary mb-3">I. Data Kartu Keluarga</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="no_kk">Nomor KK <span class="text-danger">*</span></label>
                                <input type="number" name="no_kk" id="no_kk"
                                    class="form-control @error('no_kk') is-invalid @enderror" value="{{ old('no_kk') }}"
                                    required>
                                @error('no_kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="kepala_keluarga">Nama Kepala Keluarga <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="kepala_keluarga" id="kepala_keluarga"
                                    class="form-control @error('kepala_keluarga') is-invalid @enderror"
                                    value="{{ old('kepala_keluarga') }}" required>
                                @error('kepala_keluarga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Bagian 2: Data Alamat --}}
                    <div class="card bg-light p-3 mb-4">
                        <h6 class="text-primary mb-3">II. Data Alamat</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="rt">RT <span class="text-danger">*</span></label>
                                <input type="number" name="rt" id="rt"
                                    class="form-control @error('rt') is-invalid @enderror" value="{{ old('rt') }}"
                                    required>
                                @error('rt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="rw">RW <span class="text-danger">*</span></label>
                                <input type="number" name="rw" id="rw"
                                    class="form-control @error('rw') is-invalid @enderror" value="{{ old('rw') }}"
                                    required>
                                @error('rw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="desa_id">Nama Desa <span
                                        class="text-danger">*</span></label>
                                <select name="desa_id" id="desa_id"
                                    class="form-select @error('desa_id') is-invalid @enderror" required>
                                    <option value="">Pilih Desa</option>
                                    @foreach ($desas as $desa)
                                        <option value="{{ $desa->id }}"
                                            {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                            {{ $desa->nama_desa }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('desa_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="kecamatan_id">Nama Kecamatan <span
                                        class="text-danger">*</span></label>
                                <select name="kecamatan_id" id="kecamatan_id"
                                    class="form-select @error('kecamatan_id') is-invalid @enderror" required>
                                    <option value="">Pilih Kecamatan</option>
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
                            <div class="col-md-12">
                                <label class="form-label" for="alamat">Alamat Lengkap <span
                                        class="text-danger">*</span></label>
                                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="2"
                                    required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Bagian 3: Data Anggota Keluarga (Kepala Keluarga Details) --}}
                    <div class="card bg-light p-3 mb-4">
                        <h6 class="text-primary mb-3">III. Data Anggota (Kepala Keluarga)</h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label" for="nik">NIK <span class="text-danger">*</span></label>
                                <input type="number" name="nik" id="nik"
                                    class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"
                                    placeholder="16 Digit NIK" required>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="no_akta_kelahiran">Nomor Akte Kelahiran</label>
                                <input type="text" name="no_akta_kelahiran" id="no_akta_kelahiran"
                                    class="form-control" value="{{ old('no_akta_kelahiran') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="tanggal_pencatatan">Tanggal Pencatatan</label>
                                <input type="date" name="tanggal_pencatatan" id="tanggal_pencatatan"
                                    value="{{ old('tanggal_pencatatan', date('Y-m-d')) }}" class="form-control">
                            </div>

                            {{-- Row 2 --}}
                            <div class="col-md-6">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin <span
                                        class="text-danger">*</span></label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="hubungan_keluarga_id">Hubungan Dalam Keluarga <span
                                        class="text-danger">*</span></label>

                                <select name="hubungan_keluarga_id" id="hubungan_keluarga_id"
                                    class="form-select @error('hubungan_keluarga_id') is-invalid @enderror"
                                    style="pointer-events: none; background-color: #e9ecef;" tabindex="-1"
                                    aria-disabled="true" required>

                                    @if (isset($kepalaKeluarga))
                                        {{-- Pastikan value ini ter-selected --}}
                                        <option value="{{ $kepalaKeluarga->id }}" selected>
                                            {{ $kepalaKeluarga->nama }}
                                        </option>
                                    @else
                                        <option value="" disabled selected>-- Data Master Tidak Ditemukan --</option>
                                    @endif
                                </select>

                                @error('hubungan_keluarga_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Row 3 --}}
                            <div class="col-md-6">
                                <label class="form-label" for="tempat_lahir">Tempat Lahir<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir"
                                    value="{{ old('tempat_lahir') }}" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tanggal_lahir">Tanggal Lahir<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}" class="form-control" required>
                            </div>

                            {{-- Row 4 --}}
                            <div class="col-md-6">
                                <label class="form-label" for="status_perkawinan">Status Perkawinan <span
                                        class="text-danger">*</span></label>
                                <select name="status_perkawinan" id="status_perkawinan" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Status --</option>
                                    <option value="Belum Menikah" @if (old('status_perkawinan') == 'Belum Menikah') selected @endif>Belum
                                        Menikah</option>
                                    <option value="Menikah" @if (old('status_perkawinan') == 'Menikah') selected @endif>Menikah
                                    </option>
                                    <option value="Cerai" @if (old('status_perkawinan') == 'Cerai') selected @endif>Cerai
                                    </option>
                                    <option value="Cerai Mati" @if (old('status_perkawinan') == 'Cerai Mati') selected @endif>Cerai
                                        Mati</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="agama_id">Agama<span class="text-danger">*</span></label>
                                <select name="agama_id" id="agama_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Agama --</option>
                                    @foreach ($agama as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('agama_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->agama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Row 5 --}}
                            <div class="col-md-6">
                                <label class="form-label" for="golongan_darah_id">Golongan Darah<span
                                        class="text-danger">*</span></label>
                                <select name="golongan_darah_id" id="golongan_darah_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Golongan Darah --</option>
                                    @foreach ($golonganDarah as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('golongan_darah_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->golongan_darah }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="kewarganegaraan_id">Kewarganegaraan<span
                                        class="text-danger">*</span></label>
                                <select name="kewarganegaraan_id" id="kewarganegaraan_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Kewarganegaraan --</option>
                                    @foreach ($kewarganegaraan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kewarganegaraan_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->kewarganegaraan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Row 6 --}}
                            <div class="col-md-6">
                                <label class="form-label" for="etnis">Etnis/Suku</label>
                                <input type="text" name="etnis" id="etnis" class="form-control"
                                    value="{{ old('etnis') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="pendidikan_id">Pendidikan Terakhir<span
                                        class="text-danger">*</span></label>
                                <select name="pendidikan_id" id="pendidikan_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Pendidikan --</option>
                                    @foreach ($pendidikan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('pendidikan_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->pendidikan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Row 7 --}}
                            <div class="col-md-6">
                                <label class="form-label" for="mata_pencaharian_id">Mata Pencaharian Pokok <span
                                        class="text-danger">*</span></label>
                                <select name="mata_pencaharian_id" id="mata_pencaharian_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                                    @foreach ($mataPencaharians as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('mata_pencaharian_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->mata_pencaharian }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="nama_orang_tua">Nama Orang Tua<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="form-control"
                                    value="{{ old('nama_orang_tua') }}" required>
                            </div>

                            {{-- Row 8 --}}
                            <div class="col-md-6">
                                <label class="form-label" for="kb_id">Akseptor KB</label>
                                <select name="kb_id" id="kb_id" class="form-select">
                                    <option value="" disabled selected>-- Pilih --</option>
                                    @foreach ($kb as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kb_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->kb }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="kedudukan_pajak_id">Kedudukan sebagai Wajib Pajak</label>
                                <select name="kedudukan_pajak_id" id="kedudukan_pajak_id" class="form-select">
                                    <option value="" disabled selected>-- Pilih Kedudukan --</option>
                                    @foreach ($kedudukanPajak as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kedudukan_pajak_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->kedudukan_pajak }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Row 9 (Cacat) --}}
                            <div class="col-md-6">
                                <label class="form-label" for="cacat-select">Cacat</label>
                                <select name="cacat_id" id="cacat-select" class="form-select">
                                    <option value="" disabled selected>-- Pilih --</option>
                                    @foreach ($cacat as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('cacat_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->tipe }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" id="nama-cacat-container">
                                <label class="form-label" for="nama_cacat">Jika Cacat, Sebutkan</label>
                                <input type="text" name="nama_cacat" id="nama_cacat" class="form-control"
                                    value="{{ old('nama_cacat') }}">
                            </div>

                            {{-- Row 10 (Lembaga) --}}
                            <div class="col-md-6">
                                <label class="form-label" for="lembaga-select">Lembaga yang Diikuti</label>
                                <select name="lembaga_id" id="lembaga-select" class="form-select">
                                    <option value="" disabled selected>-- Pilih Lembaga --</option>
                                    @foreach ($lembaga as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('lembaga_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->jenis_lembaga }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" id="nama-lembaga-container">
                                <label class="form-label" for="nama_lembaga">Jika Lembaga, Sebutkan</label>
                                <input type="text" name="nama_lembaga" id="nama_lembaga" class="form-control"
                                    value="{{ old('nama_lembaga') }}">
                            </div>
                        </div>
                    </div>

                    {{-- Bagian 4: Data Pengisi --}}
                    <div class="card bg-light p-3 mb-4">
                        <h6 class="text-primary mb-3">IV. Data Pengisi</h6>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label" for="nama_pengisi_id">Nama Pengisi <span
                                        class="text-danger">*</span></label>
                                <select name="nama_pengisi_id" id="nama_pengisi_id"
                                    class="form-control @error('nama_pengisi_id') is-invalid @enderror" required>
                                    <option value="">Pilih Pengisi</option>
                                    @foreach ($perangkatDesas as $perangkat)
                                        <option value="{{ $perangkat->id }}"
                                            {{ old('nama_pengisi_id') == $perangkat->id ? 'selected' : '' }}>
                                            {{ $perangkat->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nama_pengisi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('data_keluarga.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Logic for Cacat (Disability) Field ---
            const cacatSelect = document.getElementById('cacat-select');
            const namaCacatContainer = document.getElementById('nama-cacat-container');

            // Show/hide based on initial state (for old() value)
            if (cacatSelect && namaCacatContainer) {
                const toggleCacatField = () => {
                    // Assuming ID 1 is "Tidak Cacat" or a similar default.
                    // If it's *not* the default/no-cacat option, show the field.
                    // Replace 1 with the ID of "Tidak Cacat" or similar default if it exists.
                    if (cacatSelect.value && cacatSelect.value != '1') {
                        namaCacatContainer.style.display = 'block';
                    } else {
                        namaCacatContainer.style.display = 'none';
                    }
                };

                // Run once on load
                toggleCacatField();

                // Run on change
                cacatSelect.addEventListener('change', toggleCacatField);
            }

            // --- Logic for Lembaga (Institution) Field ---
            const lembagaSelect = document.getElementById('lembaga-select');
            const namaLembagaContainer = document.getElementById('nama-lembaga-container');

            if (lembagaSelect && namaLembagaContainer) {
                const toggleLembagaField = () => {
                    // Assuming ID 1 is "Tidak Ikut" or similar default.
                    // If it's *not* the default/no-lembaga option, show the field.
                    if (lembagaSelect.value && lembagaSelect.value != '1') {
                        namaLembagaContainer.style.display = 'block';
                    } else {
                        namaLembagaContainer.style.display = 'none';
                    }
                };

                // Run once on load
                toggleLembagaField();

                // Run on change
                lembagaSelect.addEventListener('change', toggleLembagaField);
            }
        });
    </script>
@endpush

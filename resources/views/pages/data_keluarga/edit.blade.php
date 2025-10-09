@extends('layouts.master')

@section('title', 'Edit Data Keluarga dan Kepala Keluarga')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Formulir Edit Data Keluarga (KK)</h5>
        </div>
        <form action="{{ route('data_keluarga.update', $dataKeluarga->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

                {{-- Bagian 1: Data KK (Kartu Keluarga) --}}
                <div class="card bg-light p-3 mb-4">
                    <h6 class="text-primary mb-3">I. Data Kartu Keluarga</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="no_kk">Nomor KK <span class="text-danger">*</span></label>
                            <input type="number" name="no_kk" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" value="{{ old('no_kk', $dataKeluarga->no_kk) }}" required>
                            @error('no_kk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="kepala_keluarga">Nama Kepala Keluarga <span class="text-danger">*</span></label>
                            <input type="text" name="kepala_keluarga" id="kepala_keluarga" class="form-control @error('kepala_keluarga') is-invalid @enderror" value="{{ old('kepala_keluarga', $dataKeluarga->kepala_keluarga) }}" required>
                            @error('kepala_keluarga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Bagian 2: Data Alamat (Using Dropdowns for flexibility) --}}
                <div class="card bg-light p-3 mb-4">
                    <h6 class="text-primary mb-3">II. Data Alamat</h6>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label" for="rt">RT <span class="text-danger">*</span></label>
                            <input type="number" name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror" value="{{ old('rt', $dataKeluarga->rt) }}" required>
                            @error('rt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="rw">RW <span class="text-danger">*</span></label>
                            <input type="number" name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror" value="{{ old('rw', $dataKeluarga->rw) }}" required>
                            @error('rw')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="desa_id">Nama Desa <span class="text-danger">*</span></label>
                            <select name="desa_id" id="desa_id" class="form-select @error('desa_id') is-invalid @enderror" required>
                                <option value="">Pilih Desa</option>
                                @foreach ($desas as $desa)
                                <option value="{{ $desa->id }}" {{ old('desa_id', $dataKeluarga->desa_id) == $desa->id ? 'selected' : '' }}>
                                    {{ $desa->nama_desa }}
                                </option>
                                @endforeach
                            </select>
                            @error('desa_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="kecamatan_id">Nama Kecamatan <span class="text-danger">*</span></label>
                            <select name="kecamatan_id" id="kecamatan_id" class="form-select @error('kecamatan_id') is-invalid @enderror" required>
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}" {{ old('kecamatan_id', $dataKeluarga->kecamatan_id) == $kecamatan->id ? 'selected' : '' }}>
                                    {{ $kecamatan->nama_kecamatan }}
                                </option>
                                @endforeach
                            </select>
                            @error('kecamatan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="alamat">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="2" required>{{ old('alamat', $dataKeluarga->alamat) }}</textarea>
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
                        {{-- Row 1 --}}
                        <div class="col-md-4">
                            <label class="form-label" for="nik">NIK <span class="text-danger">*</span></label>
                            <input type="number" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $kepalaKeluarga->nik) }}" placeholder="16 Digit NIK" required>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="no_akta_kelahiran">Nomor Akte Kelahiran</label>
                            <input type="text" name="no_akta_kelahiran" id="no_akta_kelahiran" class="form-control" value="{{ old('no_akta_kelahiran', $kepalaKeluarga->no_akta_kelahiran) }}">
                        </div>
                         <div class="col-md-4">
                            <label class="form-label" for="tanggal_pencatatan">Tanggal Pencatatan</label>
                            <input type="date" name="tanggal_pencatatan" id="tanggal_pencatatan" value="{{ old('tanggal_pencatatan', optional($kepalaKeluarga->tanggal_pencatatan)->format('Y-m-d') ) }}" class="form-control">
                        </div>

                        {{-- Row 2 --}}
                        <div class="col-md-6">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $kepalaKeluarga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $kepalaKeluarga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="hubungan_keluarga_id">Hubungan Dalam Keluarga <span class="text-danger">*</span></label>
                            <select name="hubungan_keluarga_id" id="hubungan_keluarga_id" class="form-select @error('hubungan_keluarga_id') is-invalid @enderror" required>
                                <option value="" disabled selected>-- Pilih Hubungan --</option>
                                @foreach ($hubunganKeluarga as $hubungan)
                                <option value="{{ $hubungan->id }}" {{ old('hubungan_keluarga_id', $kepalaKeluarga->hubungan_keluarga_id) == $hubungan->id ? 'selected' : '' }}>
                                    {{ $hubungan->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('hubungan_keluarga_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Row 3 --}}
                        <div class="col-md-6">
                            <label class="form-label" for="tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $kepalaKeluarga->tempat_lahir) }}" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', optional($kepalaKeluarga->tanggal_lahir)->format('Y-m-d')) }}" class="form-control" required>
                        </div>
                        
                        {{-- Row 4 --}}
                        <div class="col-md-6">
                            <label class="form-label" for="status_perkawinan">Status Perkawinan <span class="text-danger">*</span></label>
                            <select name="status_perkawinan" id="status_perkawinan" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Status --</option>
                                <option value="Belum Menikah" @if (old('status_perkawinan', $kepalaKeluarga->status_perkawinan)=='Belum Menikah' ) selected @endif>Belum Menikah</option>
                                <option value="Menikah" @if (old('status_perkawinan', $kepalaKeluarga->status_perkawinan)=='Menikah' ) selected @endif>Menikah</option>
                                <option value="Cerai" @if (old('status_perkawinan', $kepalaKeluarga->status_perkawinan)=='Cerai' ) selected @endif>Cerai</option>
                                <option value="Cerai Mati" @if (old('status_perkawinan', $kepalaKeluarga->status_perkawinan)=='Cerai Mati' ) selected @endif>Cerai Mati</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="agama_id">Agama<span class="text-danger">*</span></label>
                            <select name="agama_id" id="agama_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Agama --</option>
                                @foreach ($agama as $item)
                                <option value="{{ $item->id }}" {{ old('agama_id', $kepalaKeluarga->agama_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->agama }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Row 5 --}}
                        <div class="col-md-6">
                            <label class="form-label" for="golongan_darah_id">Golongan Darah<span class="text-danger">*</span></label>
                            <select name="golongan_darah_id" id="golongan_darah_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Golongan Darah --</option>
                                @foreach ($golonganDarah as $item)
                                <option value="{{ $item->id }}" {{ old('golongan_darah_id', $kepalaKeluarga->golongan_darah_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->golongan_darah }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="kewarganegaraan_id">Kewarganegaraan<span class="text-danger">*</span></label>
                            <select name="kewarganegaraan_id" id="kewarganegaraan_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Kewarganegaraan --</option>
                                @foreach ($kewarganegaraan as $item)
                                <option value="{{ $item->id }}" {{ old('kewarganegaraan_id', $kepalaKeluarga->kewarganegaraan_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->kewarganegaraan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- Row 6 --}}
                        <div class="col-md-6">
                            <label class="form-label" for="etnis">Etnis/Suku</label>
                            <input type="text" name="etnis" id="etnis" class="form-control" value="{{ old('etnis', $kepalaKeluarga->etnis) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="pendidikan_id">Pendidikan Terakhir<span class="text-danger">*</span></label>
                            <select name="pendidikan_id" id="pendidikan_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Pendidikan --</option>
                                @foreach ($pendidikan as $item)
                                <option value="{{ $item->id }}" {{ old('pendidikan_id', $kepalaKeluarga->pendidikan_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->pendidikan }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Row 7 --}}
                        <div class="col-md-6">
                            <label class="form-label" for="mata_pencaharian_id">Mata Pencaharian Pokok <span class="text-danger">*</span></label>
                            <select name="mata_pencaharian_id" id="mata_pencaharian_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                                @foreach ($mataPencaharians as $item)
                                <option value="{{ $item->id }}" {{ old('mata_pencaharian_id', $kepalaKeluarga->mata_pencaharian_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->mata_pencaharian }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="nama_orang_tua">Nama Orang Tua<span class="text-danger">*</span></label>
                            <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="form-control" value="{{ old('nama_orang_tua', $kepalaKeluarga->nama_orang_tua) }}" required>
                        </div>

                        {{-- Row 8 --}}
                        <div class="col-md-6">
                            <label class="form-label" for="kb_id">Akseptor KB</label>
                            <select name="kb_id" id="kb_id" class="form-select">
                                <option value="" disabled selected>-- Pilih --</option>
                                @foreach ($kb as $item)
                                <option value="{{ $item->id }}" {{ old('kb_id', $kepalaKeluarga->kb_id) == $item->id ? 'selected' : '' }}>
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
                                <option value="{{ $item->id }}" {{ old('kedudukan_pajak_id', $kepalaKeluarga->kedudukan_pajak_id) == $item->id ? 'selected' : '' }}>
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
                                <option value="{{ $item->id }}" {{ old('cacat_id', $kepalaKeluarga->cacat_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->tipe }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6" id="nama-cacat-container">
                            <label class="form-label" for="nama_cacat">Jika Cacat, Sebutkan</label>
                            <input type="text" name="nama_cacat" id="nama_cacat" class="form-control" value="{{ old('nama_cacat', $kepalaKeluarga->nama_cacat) }}">
                        </div>

                        {{-- Row 10 (Lembaga) --}}
                        <div class="col-md-6">
                            <label class="form-label" for="lembaga-select">Lembaga yang Diikuti</label>
                            <select name="lembaga_id" id="lembaga-select" class="form-select">
                                <option value="" disabled selected>-- Pilih Lembaga --</option>
                                @foreach ($lembaga as $item)
                                <option value="{{ $item->id }}" {{ old('lembaga_id', $kepalaKeluarga->lembaga_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->jenis_lembaga }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6" id="nama-lembaga-container" >
                            <label class="form-label" for="nama_lembaga">Jika Lembaga, Sebutkan</label>
                            <input type="text" name="nama_lembaga" id="nama_lembaga" class="form-control" value="{{ old('nama_lembaga', $kepalaKeluarga->nama_lembaga) }}">
                        </div>
                    </div>
                </div>

                {{-- Bagian 4: Data Pengisi --}}
                <div class="card bg-light p-3 mb-4">
                    <h6 class="text-primary mb-3">IV. Data Pengisi</h6>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label" for="nama_pengisi_id">Nama Pengisi <span class="text-danger">*</span></label>
                            <select name="nama_pengisi_id" id="nama_pengisi_id" class="form-control @error('nama_pengisi_id') is-invalid @enderror" required>
                                <option value="">Pilih Pengisi</option>
                                @foreach ($perangkatDesas as $perangkat)
                                <option value="{{ $perangkat->id }}" {{ old('nama_pengisi_id', $dataKeluarga->nama_pengisi_id) == $perangkat->id ? 'selected' : '' }}>
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
            </div> {{-- End card-body --}}

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('data_keluarga.index') }}" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // --- Cacat (Disability) Field Logic ---
        const cacatSelect = document.getElementById('cacat-select');
        const namaCacatContainer = document.getElementById('nama-cacat-container');
        
        const toggleCacatField = () => {
            // Assuming ID 1 is "Tidak Cacat" or a similar default.
            // Show if a value is selected AND that value is NOT 1 (or your "No Cacat" ID).
            if (cacatSelect.value && cacatSelect.value != '1') { 
                namaCacatContainer.style.display = 'block';
            } else {
                namaCacatContainer.style.display = 'none';
            }
        };

        if (cacatSelect && namaCacatContainer) {
            toggleCacatField();
            cacatSelect.addEventListener('change', toggleCacatField);
        }
        
        // --- Lembaga (Institution) Field Logic ---
        const lembagaSelect = document.getElementById('lembaga-select');
        const namaLembagaContainer = document.getElementById('nama-lembaga-container');
        
        const toggleLembagaField = () => {
            // Assuming ID 1 is "Tidak Ikut" or similar default.
            if (lembagaSelect.value && lembagaSelect.value != '1') { 
                namaLembagaContainer.style.display = 'block';
            } else {
                namaLembagaContainer.style.display = 'none';
            }
        };
        
        if (lembagaSelect && namaLembagaContainer) {
            toggleLembagaField();
            lembagaSelect.addEventListener('change', toggleLembagaField);
        }

         
    });
</script>
@endpush
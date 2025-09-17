@extends('layouts.master')

@section('title', 'Tambah Anggota Keluarga Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Anggota Keluarga</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('anggota_keluarga.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                {{-- Baris Pilihan KK --}}
                <div class="col-12">
                    <label for="kartu_keluarga_id" class="form-label">Pilih Kartu Keluarga (KK) <span class="text-danger">*</span></label>
                    <select name="kartu_keluarga_id" id="kartu_keluarga_id" class="form-select @error('kartu_keluarga_id') is-invalid @enderror" required>
                        <option value="" disabled selected>-- Pilih No. KK & Kepala Keluarga --</option>
                        {{-- Data $kartuKeluargas akan dikirim dari Controller --}}
                        @foreach ($kartuKeluargas as $kk)
                            <option value="{{ $kk->id }}" {{ old('kartu_keluarga_id') == $kk->id ? 'selected' : '' }}>
                                {{ $kk->no_kk }} - a/n {{ $kk->kepala_keluarga }}
                            </option>
                        @endforeach
                    </select>
                    @error('kartu_keluarga_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12"><hr class="my-2"></div>

                {{-- Data Diri Anggota --}}
                <div class="col-md-6">
                    <label class="form-label">No Urut dalam KK</label>
                    <input type="number" name="no_urut" class="form-control" value="{{ old('no_urut') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" placeholder="16 Digit NIK" required>
                    @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" placeholder="Sesuai KTP/Akta" required>
                    @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                 <div class="col-md-6">
                    <label class="form-label">Nomor Akte Kelahiran</label>
                    <input type="text" name="no_akte" class="form-control" value="{{ old('no_akte') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                        <option value="" disabled selected>-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                     @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hubungan Dalam Keluarga <span class="text-danger">*</span></label>
                    <select name="hubungan_keluarga" class="form-select @error('hubungan_keluarga') is-invalid @enderror" required>
                        <option value="" disabled selected>-- Pilih Hubungan --</option>
                        <option @if(old('hubungan_keluarga') == 'Kepala Keluarga') selected @endif>Kepala Keluarga</option>
                        <option @if(old('hubungan_keluarga') == 'Istri') selected @endif>Istri</option>
                        <option @if(old('hubungan_keluarga') == 'Anak') selected @endif>Anak</option>
                        <option @if(old('hubungan_keluarga') == 'Menantu') selected @endif>Menantu</option>
                        <option @if(old('hubungan_keluarga') == 'Cucu') selected @endif>Cucu</option>
                        <option @if(old('hubungan_keluarga') == 'Orang Tua') selected @endif>Orang Tua</option>
                        <option @if(old('hubungan_keluarga') == 'Mertua') selected @endif>Mertua</option>
                        <option @if(old('hubungan_keluarga') == 'Famili Lain') selected @endif>Famili Lain</option>
                        <option @if(old('hubungan_keluarga') == 'Lainnya') selected @endif>Lainnya</option>
                    </select>
                    @error('hubungan_keluarga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control">
                </div>

                 <div class="col-md-6">
                    <label class="form-label">Tanggal Pencatatan</label>
                    <input type="date" name="tanggal_pencatatan" value="{{ old('tanggal_pencatatan', date('Y-m-d')) }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status Perkawinan</label>
                    <select name="status_perkawinan" class="form-select">
                        <option value="" disabled selected>-- Pilih Status --</option>
                        <option @if(old('status_perkawinan') == 'Belum Kawin') selected @endif>Belum Kawin</option>
                        <option @if(old('status_perkawinan') == 'Kawin') selected @endif>Kawin</option>
                        <option @if(old('status_perkawinan') == 'Cerai Hidup') selected @endif>Cerai Hidup</option>
                        <option @if(old('status_perkawinan') == 'Cerai Mati') selected @endif>Cerai Mati</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Agama</label>
                    <select name="agama" class="form-select">
                        <option value="" disabled selected>-- Pilih Agama --</option>
                        <option @if(old('agama') == 'Islam') selected @endif>Islam</option>
                        <option @if(old('agama') == 'Kristen') selected @endif>Kristen</option>
                        <option @if(old('agama') == 'Katolik') selected @endif>Katolik</option>
                        <option @if(old('agama') == 'Hindu') selected @endif>Hindu</option>
                        <option @if(old('agama') == 'Budha') selected @endif>Budha</option>
                        <option @if(old('agama') == 'Khonghucu') selected @endif>Khonghucu</option>
                        <option @if(old('agama') == 'Lainnya') selected @endif>Lainnya</option>
                    </select>
                </div>
                 <div class="col-md-6">
                    <label class="form-label">Golongan Darah</label>
                     <select name="golongan_darah" class="form-select">
                        <option value="" disabled selected>-- Pilih Golongan Darah --</option>
                        <option @if(old('golongan_darah') == 'A') selected @endif>A</option>
                        <option @if(old('golongan_darah') == 'B') selected @endif>B</option>
                        <option @if(old('golongan_darah') == 'AB') selected @endif>AB</option>
                        <option @if(old('golongan_darah') == 'O') selected @endif>O</option>
                        <option @if(old('golongan_darah') == 'Tidak Tahu') selected @endif>Tidak Tahu</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kewarganegaraan</label>
                     <select name="kewarganegaraan" class="form-select">
                        <option value="WNI" @if(old('kewarganegaraan') == 'WNI') selected @endif>Warga Negara Indonesia (WNI)</option>
                        <option value="WNA" @if(old('kewarganegaraan') == 'WNA') selected @endif>Warga Negara Asing (WNA)</option>
                     </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Etnis/Suku</label>
                    <input type="text" name="etnis" class="form-control" value="{{ old('etnis') }}">
                </div>

                <div class="col-12">
                    <label class="form-label">Pendidikan Terakhir</label>
                    <select name="pendidikan" class="form-select">
                         <option value="" disabled selected>-- Pilih Pendidikan --</option>
                         <option @if(old('pendidikan') == 'Tidak/Belum Sekolah') selected @endif>Tidak/Belum Sekolah</option>
                         <option @if(old('pendidikan') == 'Tamat SD/Sederajat') selected @endif>Tamat SD/Sederajat</option>
                         <option @if(old('pendidikan') == 'SLTP/Sederajat') selected @endif>SLTP/Sederajat</option>
                         <option @if(old('pendidikan') == 'SLTA/Sederajat') selected @endif>SLTA/Sederajat</option>
                         <option @if(old('pendidikan') == 'Diploma I/II') selected @endif>Diploma I/II</option>
                         <option @if(old('pendidikan') == 'Akademi/Diploma III/S. Muda') selected @endif>Akademi/Diploma III/S. Muda</option>
                         <option @if(old('pendidikan') == 'Diploma IV/Strata I') selected @endif>Diploma IV/Strata I</option>
                         <option @if(old('pendidikan') == 'Strata II') selected @endif>Strata II</option>
                         <option @if(old('pendidikan') == 'Strata III') selected @endif>Strata III</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mata Pencaharian Pokok</label>
                    <select name="mata_pencaharian" class="form-select">
                        <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                        <option @if(old('mata_pencaharian') == 'Belum/Tidak Bekerja') selected @endif>Belum/Tidak Bekerja</option>
                        <option @if(old('mata_pencaharian') == 'Mengurus Rumah Tangga') selected @endif>Mengurus Rumah Tangga</option>
                        <option @if(old('mata_pencaharian') == 'Pelajar/Mahasiswa') selected @endif>Pelajar/Mahasiswa</option>
                        <option @if(old('mata_pencaharian') == 'Pensiunan') selected @endif>Pensiunan</option>
                        <option @if(old('mata_pencaharian') == 'Pegawai Negeri Sipil') selected @endif>Pegawai Negeri Sipil</option>
                        <option @if(old('mata_pencaharian') == 'TNI/POLRI') selected @endif>TNI/POLRI</option>
                        <option @if(old('mata_pencaharian') == 'Karyawan Swasta') selected @endif>Karyawan Swasta</option>
                        <option @if(old('mata_pencaharian') == 'Wiraswasta') selected @endif>Wiraswasta</option>
                        <option @if(old('mata_pencaharian') == 'Petani/Pekebun') selected @endif>Petani/Pekebun</option>
                        <option @if(old('mata_pencaharian') == 'Buruh Harian Lepas') selected @endif>Buruh Harian Lepas</option>
                        <option @if(old('mata_pencaharian') == 'Guru') selected @endif>Guru</option>
                        <option @if(old('mata_pencaharian') == 'Dokter') selected @endif>Dokter</option>
                        <option @if(old('mata_pencaharian') == 'Pedagang') selected @endif>Pedagang</option>
                        <option @if(old('mata_pencaharian') == 'Nelayan') selected @endif>Nelayan</option>
                        <option @if(old('mata_pencaharian') == 'Perangkat Desa') selected @endif>Perangkat Desa</option>
                        <option @if(old('mata_pencaharian') == 'Lainnya') selected @endif>Lainnya</option>
                    </select>
                </div>
                               <div class="col-md-6">
                    <label class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" value="{{ old('nama_ayah') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu') }}">
                </div>

                {{-- Bagian Tambahan --}}
                <div class="col-12"><hr class="my-2"></div>

                <div class="col-md-4">
                    <label class="form-label">Akseptor KB</label>
                    <select name="akseptor_kb" class="form-select">
                        <option value="" disabled selected>-- Pilih --</option>
                        <option value="Ya" @if(old('akseptor_kb') == 'Ya') selected @endif>Ya</option>
                        <option value="Tidak" @if(old('akseptor_kb') == 'Tidak') selected @endif>Tidak</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label d-block">Cacat Fisik</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cacat_fisik[]" value="Tuna Rungu" id="cf1">
                        <label class="form-check-label" for="cf1">Tuna Rungu</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cacat_fisik[]" value="Tuna Wicara" id="cf2">
                        <label class="form-check-label" for="cf2">Tuna Wicara</label>
                    </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cacat_fisik[]" value="Tuna Netra" id="cf3">
                        <label class="form-check-label" for="cf3">Tuna Netra</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label d-block">Cacat Mental</label>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cacat_mental[]" value="Tuna Grahita" id="cm1">
                        <label class="form-check-label" for="cm1">Tuna Grahita</label>
                    </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cacat_mental[]" value="Tuna Daksa" id="cm2">
                        <label class="form-check-label" for="cm2">Tuna Daksa</label>
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Kedudukan sebagai Wajib Pajak</label>
                    <select name="wajib_pajak" class="form-select">
                        <option value="" disabled selected>-- Pilih Kedudukan --</option>
                        <option @if(old('wajib_pajak') == 'Wajib Pajak') selected @endif>Wajib Pajak</option>
                        <option @if(old('wajib_pajak') == 'Bukan Wajib Pajak') selected @endif>Bukan Wajib Pajak</option>
                        <option @if(old('wajib_pajak') == 'Wajib Pajak Badan') selected @endif>Wajib Pajak Badan</option>
                    </select>
                </div>

                {{-- INPUTAN BARU DITAMBAHKAN DI SINI --}}
                <div class="col-md-6">
                    <label class="form-label d-block">Lembaga Pemerintahan yang Diikuti</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lembaga_pemerintahan[]" value="Anggota BPD" id="lp1">
                        <label class="form-check-label" for="lp1">Anggota BPD</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lembaga_pemerintahan[]" value="Pejabat Daerah" id="lp2">
                        <label class="form-check-label" for="lp2">Pejabat Daerah</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label d-block">Lembaga Kemasyarakatan yang Diikuti</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lembaga_kemasyarakatan[]" value="Anggota Karang Taruna" id="lm1">
                        <label class="form-check-label" for="lm1">Anggota Karang Taruna</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lembaga_kemasyarakatan[]" value="Anggota PKK" id="lm2">
                        <label class="form-check-label" for="lm2">Anggota PKK</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lembaga_kemasyarakatan[]" value="Pengurus RT" id="lm3">
                        <label class="form-check-label" for="lm3">Pengurus RT</label>
                    </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lembaga_kemasyarakatan[]" value="Pengurus RW" id="lm4">
                        <label class="form-check-label" for="lm4">Pengurus RW</label>
                    </div>
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan Anggota</button>
                <a href="{{ route('anggota_keluarga.index') }}" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

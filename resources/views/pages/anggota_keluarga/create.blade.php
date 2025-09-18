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

                     <div class="card bg-card-inside-form p-2">

                         <div class="col-12">
                             <label for="">Nama Kepala Keluarga</label>
                             <input type="text" name="kepala_keluarga" value="{{ $dataKeluarga->kepala_keluarga ?? '' }}"
                                 class="form-control" readonly>
                         </div>
                         <div class="col-12">
                             <label for="">No. KK</label>
                             <input type="number" name="no_kk" value="{{ $dataKeluarga->no_kk ?? '' }}"
                                 class="form-control" readonly>
                             <input type="hidden" name="data_keluarga_id" value="{{ $dataKeluarga->id ?? '' }}">
                         </div>
                     </div>

                     {{-- Data Diri Anggota --}}
                     <div class=" card bg-card-inside-form p-2">
                         <div class="row">
                             <div class="col-md-4">
                                 <label class="form-label">No Urut dalam KK</label>
                                 <input type="number" name="no_urut" class="form-control" value="{{ old('no_urut') }}">
                             </div>
                             <div class="col-md-8">
                                 <label class="form-label">NIK <span class="text-danger">*</span></label>
                                 <input type="number" name="nik"
                                     class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"
                                     placeholder="16 Digit NIK" required>
                                 @error('nik')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                             <div class="col-md-12">
                                 <label class="form-label">Nomor Akte Kelahiran</label>
                                 <input type="number" name="no_akta_kelahiran" class="form-control"
                                     value="{{ old('no_akta_kelahiran') }}">
                             </div>
                         </div>

                         <div class="col-md-12">
                             <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                             <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                 value="{{ old('nama') }}" placeholder="Sesuai KTP/Akta" required>
                             @error('nama')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>



                     <div class="card bg-card-inside-form p-2">
                         <div class="row">
                             <div class="col-md-6">
                                 <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                 <select name="jenis_kelamin"
                                     class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                     <option value="" disabled selected>-- Pilih --</option>
                                     <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki
                                     </option>
                                     <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan
                                     </option>
                                 </select>
                                 @error('jenis_kelamin')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                             <div class="col-md-6">
                                 <label class="form-label">Hubungan Dalam Keluarga <span
                                         class="text-danger">*</span></label>
                                 <select name="hubungan_keluarga_id"
                                     class="form-select @error('hubungan_keluarga_id') is-invalid @enderror" required>
                                     <option value="" disabled selected>-- Pilih Hubungan --</option>
                                     @foreach ($hubunganKeluargas as $hubungan)
                                         <option value="{{ $hubungan->id }}"
                                             {{ old('hubungan_keluarga_id') == $hubungan->id ? 'selected' : '' }}>
                                             {{ $hubungan->nama }}
                                         </option>
                                     @endforeach
                                 </select>
                                 @error('hubungan_keluarga_id')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>

                             <div class="col-md-6">
                                 <label class="form-label">Tempat Lahir</label>
                                 <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                     class="form-control">
                             </div>
                             <div class="col-md-6">
                                 <label class="form-label">Tanggal Lahir</label>
                                 <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                     class="form-control">
                             </div>


                             <div class="col-md-6">
                                 <label class="form-label">Status Perkawinan</label>
                                 <select name="status_perkawinan" class="form-select">
                                     <option value="" disabled selected>-- Pilih Status --</option>
                                     <option @if (old('status_perkawinan') == 'Belum Kawin') selected @endif>Belum Kawin</option>
                                     <option @if (old('status_perkawinan') == 'Kawin') selected @endif>Kawin</option>
                                     <option @if (old('status_perkawinan') == 'Cerai Hidup') selected @endif>Cerai Hidup</option>
                                     <option @if (old('status_perkawinan') == 'Cerai Mati') selected @endif>Cerai Mati</option>
                                 </select>
                             </div>

                             <div class="col-md-6">
                                 <label class="form-label">Agama</label>
                                 <select name="agama_id" class="form-select">
                                     <option value="" disabled selected>-- Pilih Agama --</option>
                                     @foreach ($agama as $item)
                                         <option value="{{ $item->id }}"
                                             {{ old('agama_id') == $item->id ? 'selected' : '' }}>
                                             {{ $item->nama }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="col-md-6">
                                 <label class="form-label">Golongan Darah</label>
                                 <select name="golongan_darah_id" class="form-select">
                                     <option value="" disabled selected>-- Pilih Golongan Darah --</option>
                                     @foreach ($golonganDarah as $item)
                                         <option value="{{ $item->id }}"
                                             {{ old('golongan_darah_id') == $item->id ? 'selected' : '' }}>
                                             {{ $item->nama }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>

                             <div class="col-md-6">
                                 <label class="form-label">Kewarganegaraan</label>
                                 <select name="kewarganegaraan_id" class="form-select">
                                     <option value="" disabled selected>-- Pilih Kewarganegaraan --</option>
                                     @foreach ($kewarganegaraan as $item)
                                         <option value="{{ $item->id }}"
                                             {{ old('kewarganegaraan_id') == $item->id ? 'selected' : '' }}>
                                             {{ $item->nama }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="col-md-6">
                                 <label class="form-label">Etnis/Suku</label>
                                 <input type="text" name="etnis" class="form-control" value="{{ old('etnis') }}">
                             </div>


                             <div class="col-md-6">
                                 <label class="form-label">Mata Pencaharian Pokok</label>
                                 <select name="mata_pencaharian_id" class="form-select">
                                     <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                                     @foreach ($mataPencaharian as $item)
                                         <option value="{{ $item->id }}"
                                             {{ old('mata_pencaharian_id') == $item->id ? 'selected' : '' }}>
                                             {{ $item->nama }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>

                             <div class="col-md-6">
                                 <label class="form-label">Nama Orang Tua</label>
                                 <input type="text" name="nama_orang_tua" class="form-control"
                                     value="{{ old('nama_orang_tua') }}">
                             </div>

                             <div class="col-md-6">
                                 <label class="form-label">Akseptor KB</label>
                                 <select name="kb_id" class="form-select">
                                     <option value="" disabled selected>-- Pilih --</option>
                                     @foreach ($kb as $item)
                                         <option value="{{ $item->id }}"
                                             {{ old('kb_id') == $item->id ? 'selected' : '' }}>
                                             {{ $item->nama }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>

                             <div class="col-md-6">
                                 <label class="form-label">Cacat</label>
                                 <select name="cacat_id" class="form-select">
                                     <option value="" disabled selected>-- Pilih --</option>
                                     @foreach ($cacat as $item)
                                         <option value="{{ $item->id }}"
                                             {{ old('cacat_id') == $item->id ? 'selected' : '' }}>
                                             {{ $item->nama }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-12">
                             <label class="form-label">Pendidikan Terakhir</label>
                             <select name="pendidikan_id" class="form-select">
                                 <option value="" disabled selected>-- Pilih Pendidikan --</option>
                                 @foreach ($pendidikan as $item)
                                     <option value="{{ $item->id }}"
                                         {{ old('pendidikan_id') == $item->id ? 'selected' : '' }}>
                                         {{ $item->nama }}
                                     </option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-12">
                             <label class="form-label">Kedudukan sebagai Wajib Pajak</label>
                             <select name="kedudukan_pajak_id" class="form-select">
                                 <option value="" disabled selected>-- Pilih Kedudukan --</option>
                                 @foreach ($kedudukanPajak as $item)
                                     <option value="{{ $item->id }}"
                                         {{ old('kedudukan_pajak_id') == $item->id ? 'selected' : '' }}>
                                         {{ $item->nama }}
                                     </option>
                                 @endforeach
                             </select>
                         </div>

                         <div class="col-12">
                             <label class="form-label">Lembaga yang Diikuti</label>
                             <select name="lembaga_id" class="form-select">
                                 <option value="" disabled selected>-- Pilih Lembaga --</option>
                                 @foreach ($lembaga as $item)
                                     <option value="{{ $item->id }}"
                                         {{ old('lembaga_id') == $item->id ? 'selected' : '' }}>
                                         {{ $item->nama }}
                                     </option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="card bg-card-inside-form p-2 ">
                             <div class="col-md-12">
                                 <label class="form-label">Tanggal Pencatatan</label>
                                 <input type="date" name="tanggal_pencatatan"
                                     value="{{ old('tanggal_pencatatan', date('Y-m-d')) }}" class="form-control">
                             </div>
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

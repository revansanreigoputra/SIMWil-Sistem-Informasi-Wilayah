@extends('layouts.master')

@section('title', 'Edit Anggota Keluarga')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Edit Anggota Keluarga</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('anggota_keluarga.update', $anggota->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">

                    {{-- Pilihan KK --}}
                    <div class="col-12">
                        <label for="kartu_keluarga_id" class="form-label">Pilih Kartu Keluarga (KK) <span
                                class="text-danger">*</span></label>
                        <select name="kartu_keluarga_id" id="kartu_keluarga_id" class="form-select" required>
                            <option value="" disabled>-- Pilih No. KK & Kepala Keluarga --</option>
                            @foreach ($kartuKeluargas as $kk)
                                <option value="{{ $kk->id }}"
                                    {{ old('kartu_keluarga_id', $anggota->kartu_keluarga_id) == $kk->id ? 'selected' : '' }}>
                                    {{ $kk->no_kk }} - a/n {{ $kk->kepala_keluarga }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-12">
                        <hr class="my-2">
                    </div>

                    {{-- No Urut --}}
                    <div class="col-md-6">
                        <label class="form-label">No Urut dalam KK</label>
                        <input type="number" name="no_urut" class="form-control"
                            value="{{ old('no_urut', $anggota->no_urut) }}">
                    </div>

                    {{-- NIK --}}
                    <div class="col-md-6">
                        <label class="form-label">NIK <span class="text-danger">*</span></label>
                        <input type="text" name="nik" class="form-control" value="{{ old('nik', $anggota->nik) }}"
                            required>
                    </div>

                    {{-- Nama Lengkap --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_lengkap" class="form-control"
                            value="{{ old('nama_lengkap', $anggota->nama_lengkap) }}" required>
                    </div>

                    {{-- Nomor Akte --}}
                    <div class="col-md-6">
                        <label class="form-label">Nomor Akte Kelahiran</label>
                        <input type="text" name="no_akte" class="form-control"
                            value="{{ old('no_akte', $anggota->no_akte) }}">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="L"
                                {{ old('jenis_kelamin', $anggota->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P"
                                {{ old('jenis_kelamin', $anggota->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    {{-- Hubungan Keluarga --}}
                    <div class="col-md-6">
                        <label class="form-label">Hubungan Dalam Keluarga</label>
                        <select name="hubungan_keluarga" class="form-select" required>
                            <option @if (old('hubungan_keluarga', $anggota->hubungan_keluarga) == 'Kepala Keluarga') selected @endif>Kepala Keluarga</option>
                            <option @if (old('hubungan_keluarga', $anggota->hubungan_keluarga) == 'Istri') selected @endif>Istri</option>
                            <option @if (old('hubungan_keluarga', $anggota->hubungan_keluarga) == 'Anak') selected @endif>Anak</option>
                            <option @if (old('hubungan_keluarga', $anggota->hubungan_keluarga) == 'Menantu') selected @endif>Menantu</option>
                            <option @if (old('hubungan_keluarga', $anggota->hubungan_keluarga) == 'Cucu') selected @endif>Cucu</option>
                            <option @if (old('hubungan_keluarga', $anggota->hubungan_keluarga) == 'Orang Tua') selected @endif>Orang Tua</option>
                            <option @if (old('hubungan_keluarga', $anggota->hubungan_keluarga) == 'Mertua') selected @endif>Mertua</option>
                            <option @if (old('hubungan_keluarga', $anggota->hubungan_keluarga) == 'Famili Lain') selected @endif>Famili Lain</option>
                            <option @if (old('hubungan_keluarga', $anggota->hubungan_keluarga) == 'Lainnya') selected @endif>Lainnya</option>
                        </select>
                    </div>

                    {{-- Tempat Lahir --}}
                    <div class="col-md-6">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $anggota->tempat_lahir) }}"
                            class="form-control">
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $anggota->tanggal_lahir) }}" class="form-control">
                    </div>

                    {{-- Agama --}}
                    <div class="col-md-6">
                        <label class="form-label">Agama</label>
                        <input type="text" name="agama" value="{{ old('agama', $anggota->agama) }}"
                            class="form-control">
                    </div>

                    {{-- Pendidikan --}}
                    <div class="col-md-6">
                        <label class="form-label">Pendidikan</label>
                        <input type="text" name="pendidikan" value="{{ old('pendidikan', $anggota->pendidikan) }}"
                            class="form-control">
                    </div>

                    {{-- Pekerjaan --}}
                    <div class="col-md-6">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $anggota->pekerjaan) }}"
                            class="form-control">
                    </div>

                    {{-- Status Perkawinan --}}
                    <div class="col-md-6">
                        <label class="form-label">Status Perkawinan</label>
                        <select name="status_perkawinan" class="form-select">
                            <option @if (old('status_perkawinan', $anggota->status_perkawinan) == 'Belum Kawin') selected @endif>Belum Kawin</option>
                            <option @if (old('status_perkawinan', $anggota->status_perkawinan) == 'Kawin') selected @endif>Kawin</option>
                            <option @if (old('status_perkawinan', $anggota->status_perkawinan) == 'Cerai Hidup') selected @endif>Cerai Hidup</option>
                            <option @if (old('status_perkawinan', $anggota->status_perkawinan) == 'Cerai Mati') selected @endif>Cerai Mati</option>
                        </select>
                    </div>

                    {{-- Status Hubungan --}}
                    <div class="col-md-6">
                        <label class="form-label">Status Hubungan</label>
                        <input type="text" name="status_hubungan"
                            value="{{ old('status_hubungan', $anggota->status_hubungan) }}" class="form-control">
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Update Anggota</button>
                    <a href="{{ route('anggota_keluarga.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection

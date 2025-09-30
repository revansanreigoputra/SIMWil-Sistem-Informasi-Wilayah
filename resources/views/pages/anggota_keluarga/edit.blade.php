@extends('layouts.master')

@section('title', 'Edit Anggota Keluarga: ' . $anggota_keluarga->nama)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Anggota Keluarga</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('anggota_keluarga.update', $anggota_keluarga->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                {{-- Data KK Section --}}
                <div class="card bg-card-inside-form p-2">
                    <div class="col-12">
                        <label for="">Nama Kepala Keluarga</label>
                        <input type="text" name="kepala_keluarga" value="{{ $anggota_keluarga->datakeluarga->kepala_keluarga ?? '' }}" class="form-control" readonly>
                    </div>
                    <div class="col-12">
                        <label for="">No. KK</label>
                        <input type="number" name="no_kk" value="{{ $anggota_keluarga->datakeluarga->no_kk ?? '' }}" class="form-control" readonly>
                        <input type="hidden" name="data_keluarga_id" value="{{ $anggota_keluarga->data_keluarga_id }}">
                    </div>
                </div>

                {{-- Data Diri Anggota --}}
                <div class="card bg-card-inside-form p-2">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">No Urut dalam KK</label>
                            <input type="number" name="no_urut" class="form-control" value="{{ old('no_urut', $anggota_keluarga->no_urut) }}">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">NIK <span class="text-danger">*</span></label>
                            <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $anggota_keluarga->nik) }}" placeholder="16 Digit NIK" required>
                            @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Nomor Akte Kelahiran</label>
                            <input type="number" name="no_akta_kelahiran" class="form-control" value="{{ old('no_akta_kelahiran', $anggota_keluarga->no_akta_kelahiran) }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $anggota_keluarga->nama) }}" placeholder="Sesuai KTP/Akta" required>
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card bg-card-inside-form p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="" disabled>-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $anggota_keluarga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $anggota_keluarga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Hubungan Dalam Keluarga <span class="text-danger">*</span></label>
                            <select name="hubungan_keluarga_id" class="form-select @error('hubungan_keluarga_id') is-invalid @enderror" required>
                                <option value="" disabled>-- Pilih Hubungan --</option>
                                @foreach ($hubunganKeluarga as $hubungan)
                                <option value="{{ $hubungan->id }}" {{ old('hubungan_keluarga_id', $anggota_keluarga->hubungan_keluarga_id) == $hubungan->id ? 'selected' : '' }}>
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
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $anggota_keluarga->tempat_lahir) }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $anggota_keluarga->tanggal_lahir) }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status Perkawinan</label>
                            <select name="status_perkawinan" class="form-select">
                                <option value="" disabled>-- Pilih Status --</option>
                                <option value="Belum Menikah" @if (old('status_perkawinan', $anggota_keluarga->status_perkawinan)=='Belum Menikah' ) selected @endif>Belum Menikah</option>
                                <option value="Menikah" @if (old('status_perkawinan', $anggota_keluarga->status_perkawinan)=='Menikah' ) selected @endif>Menikah</option>
                                <option value="Cerai" @if (old('status_perkawinan', $anggota_keluarga->status_perkawinan)=='Cerai' ) selected @endif>Cerai</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Agama</label>
                            <select name="agama_id" class="form-select">
                                <option value="" disabled>-- Pilih Agama --</option>
                                @foreach ($agama as $item)
                                <option value="{{ $item->id }}" {{ old('agama_id', $anggota_keluarga->agama_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->agama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Golongan Darah</label>
                            <select name="golongan_darah_id" class="form-select">
                                <option value="" disabled>-- Pilih Golongan Darah --</option>
                                @foreach ($golonganDarah as $item)
                                <option value="{{ $item->id }}" {{ old('golongan_darah_id', $anggota_keluarga->golongan_darah_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->golongan_darah }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kewarganegaraan</label>
                            <select name="kewarganegaraan_id" class="form-select">
                                <option value="" disabled>-- Pilih Kewarganegaraan --</option>
                                @foreach ($kewarganegaraan as $item)
                                <option value="{{ $item->id }}" {{ old('kewarganegaraan_id', $anggota_keluarga->kewarganegaraan_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->kewarganegaraan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Etnis/Suku</label>
                            <input type="text" name="etnis" class="form-control" value="{{ old('etnis', $anggota_keluarga->etnis) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mata Pencaharian Pokok</label>
                            <select name="mata_pencaharian_id" class="form-select">
                                <option value="" disabled>-- Pilih Pekerjaan --</option>
                                @foreach ($mataPencaharians as $item)
                                <option value="{{ $item->id }}" {{ old('mata_pencaharian_id', $anggota_keluarga->mata_pencaharian_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->mata_pencaharian }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama Orang Tua</label>
                            <input type="text" name="nama_orang_tua" class="form-control" value="{{ old('nama_orang_tua', $anggota_keluarga->nama_orang_tua) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Akseptor KB</label>
                            <select name="kb_id" class="form-select">
                                <option value="" disabled>-- Pilih --</option>
                                @foreach ($kb as $item)
                                <option value="{{ $item->id }}" {{ old('kb_id', $anggota_keluarga->kb_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->kb }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Updated Cacat Fields --}}
                        <div class="col-md-6">
                            <label class="form-label">Cacat</label>
                            <select name="cacat_id" class="form-select" id="cacat-select">
                                <option value="" disabled>-- Pilih --</option>
                                @foreach ($cacat as $item)
                                <option value="{{ $item->id }}" {{ old('cacat_id', $anggota_keluarga->cacat_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->tipe }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6" id="nama-cacat-container" style="{{ ($anggota_keluarga->cacat && $anggota_keluarga->cacat->nama_cacat) ? 'display: block;' : 'display: none;' }}">
                            <label class="form-label">Jika Cacat, Sebutkan</label>
                            <input type="text" name="nama_cacat" class="form-control" value="{{ old('nama_cacat', $anggota_keluarga->cacat->nama_cacat ?? '') }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Pendidikan Terakhir</label>
                            <select name="pendidikan_id" class="form-select">
                                <option value="" disabled>-- Pilih Pendidikan --</option>
                                @foreach ($pendidikan as $item)
                                <option value="{{ $item->id }}" {{ old('pendidikan_id', $anggota_keluarga->pendidikan_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->pendidikan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Kedudukan sebagai Wajib Pajak</label>
                            <select name="kedudukan_pajak_id" class="form-select">
                                <option value="" disabled>-- Pilih Kedudukan --</option>
                                @foreach ($kedudukanPajak as $item)
                                <option value="{{ $item->id }}" {{ old('kedudukan_pajak_id', $anggota_keluarga->kedudukan_pajak_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->kedudukan_pajak }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Lembaga yang Diikuti</label>
                            <select name="lembaga_id" class="form-select" id="lembaga-select">
                                <option value="" disabled>-- Pilih Lembaga --</option>
                                @foreach ($lembaga as $item)
                                <option value="{{ $item->id }}" {{ old('lembaga_id', $anggota_keluarga->lembaga_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->jenis_lembaga }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6" id="nama-lembaga-container" style="{{ ($anggota_keluarga->lembaga && $anggota_keluarga->lembaga->nama_lembaga) ? 'display: block;' : 'display: none;' }}">
                            <label class="form-label">Jika Lembaga, Sebutkan</label>
                            <input type="text" name="nama_lembaga" class="form-control" value="{{ old('nama_lembaga', $anggota_keluarga->lembaga->nama_lembaga ?? '') }}">
                        </div>
                    </div>
                    <div class="card bg-card-inside-form p-2 ">
                        <div class="col-md-12">
                            <label class="form-label">Tanggal Pencatatan</label>
                            <input type="date" name="tanggal_pencatatan" value="{{ old('tanggal_pencatatan', $anggota_keluarga->tanggal_pencatatan) }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('anggota_keluarga.index') }}" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cacat logic
        const cacatSelect = document.getElementById('cacat-select');
        const namaCacatContainer = document.getElementById('nama-cacat-container');
        
        // Initial state
        if (cacatSelect.value) {
            namaCacatContainer.style.display = 'block';
        }

        cacatSelect.addEventListener('change', function() {
            if (this.value) {
                namaCacatContainer.style.display = 'block';
            } else {
                namaCacatContainer.style.display = 'none';
            }
        });

        // Lembaga logic
        const lembagaSelect = document.getElementById('lembaga-select');
        const namaLembagaContainer = document.getElementById('nama-lembaga-container');
        
        // Initial state
        if (lembagaSelect.value) {
            namaLembagaContainer.style.display = 'block';
        }

        lembagaSelect.addEventListener('change', function() {
            if (this.value) {
                namaLembagaContainer.style.display = 'block';
            } else {
                namaLembagaContainer.style.display = 'none';
            }
        });
    });
</script>
@endpush
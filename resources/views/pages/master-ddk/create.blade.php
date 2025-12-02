@extends('layouts.master')

@section('title', 'Tambah ' . Str::headline($activeTable))

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tambah Data {{ Str::headline($activeTable) }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('master.ddk.store', ['table' => $activeTable]) }}" method="POST">
                @csrf

                {{-- Form dinamis --}}
                @if ($activeTable == 'lembaga')
                    <div class="mb-3">
                        <label class="form-label">Jenis Lembaga</label>
                        <select class="form-control" name="jenis_lembaga" required>
                            <option value="pemerintahan">Pemerintahan</option>
                            <option value="kemasyarakatan">Kemasyarakatan</option>
                            <option value="ekonomi">Ekonomi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lembaga</label>
                        <input type="text" class="form-control" name="nama_lembaga" required>
                    </div>
                @elseif ($activeTable == 'cacat')
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_cacat" class="form-label">Nama Cacat</label>
                        <input type="text" class="form-control" id="nama_cacat" name="nama_cacat" required>
                    </div>
                @elseif ($activeTable == 'agama')
                    <div class="mb-3">
                        <label for="agama" class="form-label">Nama Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" required>
                    </div>
                @elseif ($activeTable == 'pendidikan')
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label">Nama Pendidikan</label>
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
                    </div>
                @elseif ($activeTable == 'kb')
                    <div class="mb-3">
                        <label for="kb" class="form-label">KB</label>
                        <input type="text" class="form-control" id="kb" name="kb" required>
                    </div>
                @elseif ($activeTable == 'hubungankeluarga')
                    <div class="mb-3">
                        <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                        <input type="text" class="form-control" id="hubungan_keluarga" name="hubungan_keluarga" required>
                    </div>
                @elseif ($activeTable == 'golongandarah')
                    <div class="mb-3">
                        <label for="golongan_darah" class="form-label">Golongan Darah</label>
                        <input type="text" class="form-control" id="golongan_darah" name="golongan_darah" required>
                    </div>
                @elseif ($activeTable == 'kedudukanpajak')
                    <div class="mb-3">
                        <label class="form-label">Kedudukan Pajak</label>
                        <input type="text" class="form-control" name="kedudukan_pajak" required>
                    </div>
                @elseif ($activeTable == 'kewarganegaraan')
                    <div class="mb-3">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                    </div>
                @elseif ($activeTable == 'matapencaharian')
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Pencaharian</label>
                        <input type="text" class="form-control" name="mata_pencaharian" required>
                    </div>
                @else
                    {{-- Default untuk tabel yang kolomnya "nama" --}}
                    <div class="mb-3">
                        <label class="form-label">Nama {{ Str::headline($activeTable) }}</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('master.ddk.index', ['table' => $activeTable]) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

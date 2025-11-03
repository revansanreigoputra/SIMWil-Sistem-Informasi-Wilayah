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

                {{-- Form dinamis berdasarkan tabel aktif --}}
                @if ($activeTable == 'lembaga')
                    <div class="mb-3">
                        <label for="jenis_lembaga" class="form-label">Jenis Lembaga</label>
                        <input type="text" class="form-control" id="jenis_lembaga" name="jenis_lembaga" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
                        <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" required>
                    </div>
                @elseif ($activeTable == 'cacat')
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" required
                            placeholder="Contoh: Cacat Fisik">
                    </div>
                    <div class="mb-3">
                        <label for="nama_cacat" class="form-label">Nama Cacat</label>
                        <input type="text" class="form-control" id="nama_cacat" name="nama_cacat" required
                            placeholder="Contoh: Tuna Rungu">
                    </div>
                @elseif ($activeTable == 'tenagakerja')
                    <div class="mb-3">
                        <label for="tenaga_kerja" class="form-label">Nama Tenaga Kerja</label>
                        <input type="text" class="form-control" id="tenaga_kerja" name="tenaga_kerja" required>
                    </div>
                @elseif ($activeTable == 'agama' || $activeTable == 'pendidikan')
                    <div class="mb-3">
                        <label for="{{ $activeTable }}" class="form-label">Nama {{ Str::headline($activeTable) }}</label>
                        <input type="text" class="form-control" id="{{ $activeTable }}" name="{{ $activeTable }}"
                            required>
                    </div>
                @else
                    {{-- Default form untuk tabel lain dengan kolom 'nama' --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama {{ Str::headline($activeTable) }}</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('master.ddk.index', ['table' => $activeTable]) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

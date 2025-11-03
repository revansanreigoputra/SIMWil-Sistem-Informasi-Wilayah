@extends('layouts.master')

@section('title', 'Edit ' . Str::headline($activeTable))

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Data {{ Str::headline($activeTable) }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('master.ddk.update', ['table' => $activeTable, 'id' => $item->id]) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Form dinamis berdasarkan tabel aktif --}}
                @if ($activeTable == 'lembaga')
                    <div class="mb-3">
                        <label for="jenis_lembaga" class="form-label">Jenis Lembaga</label>
                        <input type="text" class="form-control" id="jenis_lembaga" name="jenis_lembaga"
                            value="{{ $item->jenis_lembaga }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
                        <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga"
                            value="{{ $item->nama_lembaga }}" required>
                    </div>
                @elseif ($activeTable == 'agama')
                    <div class="mb-3">
                        <label for="agama" class="form-label">Nama Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" value="{{ $item->agama }}"
                            required>
                    </div>
                @elseif ($activeTable == 'pendidikan')
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label">Nama Pendidikan</label>
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                            value="{{ $item->pendidikan }}" required>
                    </div>
                @elseif ($activeTable == 'cacat')
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" required
                            value="{{ $item->tipe }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_cacat" class="form-label">Nama Cacat</label>
                        <input type="text" class="form-control" id="nama_cacat" name="nama_cacat" required
                            value="{{ $item->nama_cacat }}" required>
                    </div>
                @elseif ($activeTable == 'tenagakerja')
                    <div class="mb-3">
                        <label for="tenaga_kerja" class="form-label">Nama Tenaga Kerja</label>
                        <input type="text" class="form-control" id="tenaga_kerja" name="tenaga_kerja"
                            value="{{ $item->tenaga_kerja }}" required>
                    </div>
                @elseif ($activeTable == 'kualitasangkatankerja')
                    <div class="mb-3">
                        <label for="kualitas_angkatan_kerja" class="form-label">Kualitas Angkatan Kerja</label>
                        <input type="text" class="form-control" id="kualitas_angkatan_kerja" name="kualitas_angkatan_kerja"
                            value="{{ $item->kualitas_angkatan_kerja }}" required>
                    </div>
                @else
                    {{-- Default form untuk tabel lain dengan kolom 'nama' --}}
                    @php
                        // Dapatkan nama kolom dinamis
                        $columnName = array_keys((array) $item)[1]; // Asumsi kolom kedua setelah 'id'
                    @endphp
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama {{ Str::headline($activeTable) }}</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $item->{$columnName} }}" required>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('master.ddk.index', ['table' => $activeTable]) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

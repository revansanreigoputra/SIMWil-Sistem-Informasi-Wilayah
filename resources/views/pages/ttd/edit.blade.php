@extends('layouts.master')

@section('title', 'Edit Penanda Tangan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('ttd.update', $ttd->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="perangkat_desa_id" class="form-label">Perangkat Desa</label>
                            <select name="perangkat_desa_id" id="perangkat_desa_id" class="form-select">
                                <option value="">-- Pilih Perangkat Desa --</option>
                                @foreach ($perangkatDesas as $perangkat)
                                    <option value="{{ $perangkat->id }}" {{ old('perangkat_desa_id', $ttd->perangkat_desa_id) == $perangkat->id ? 'selected' : '' }}>
                                        {{ $perangkat->nama }} ({{ $perangkat->nama_desa }}) - {{ $perangkat->jabatan ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('perangkat_desa_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip', $ttd->nip) }}">
                            @error('nip')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $ttd->nama) }}" required>
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ old('jabatan', $ttd->jabatan) }}" required>
                            @error('jabatan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="status_aktif" id="status_aktif" class="form-check-input" value="1" {{ old('status_aktif', $ttd->status_aktif) ? 'checked' : '' }}>
                            <label for="status_aktif" class="form-check-label">Status Aktif</label>
                            @error('status_aktif')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $ttd->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('ttd.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

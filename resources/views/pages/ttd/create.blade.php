@extends('layouts.master')

@section('title', 'Tambah Penanda Tangan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('ttd.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="perangkat_desa_id" class="form-label">Perangkat Desa</label>
                            <select name="perangkat_desa_id" id="perangkat_desa_id" class="form-select">
                                <option value="">-- Pilih Perangkat Desa --</option>
                                @foreach ($perangkatDesas as $perangkat)
                                    <option value="{{ $perangkat->id }}" {{ old('perangkat_desa_id') == $perangkat->id ? 'selected' : '' }}>
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
                            <input type="number" name="nip" id="nip" class="form-control" value="{{ old('nip') }}">
                            @error('nip')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ old('jabatan') }}" required>
                            @error('jabatan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="status_aktif" id="status_aktif" class="form-check-input" value="1" {{ old('status_aktif', true) ? 'checked' : '' }}>
                            <label for="status_aktif" class="form-check-label">Status Aktif</label>
                            @error('status_aktif')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('ttd.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('addon-script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const perangkatDesas = @json($perangkatDesas);
            const selectPerangkat = document.getElementById('perangkat_desa_id');
            const inputNama = document.getElementById('nama');
            const inputJabatan = document.getElementById('jabatan');

            selectPerangkat.addEventListener('change', function () {
                const selectedId = this.value;
                if (selectedId) {
                    const selectedPerangkat = perangkatDesas.find(p => p.id == selectedId);
                    if (selectedPerangkat) {
                        inputNama.value = selectedPerangkat.nama || '';
                        inputJabatan.value = selectedPerangkat.jabatan || '';
                    } else {
                        inputNama.value = '';
                        inputJabatan.value = '';
                    }
                } else {
                    inputNama.value = '';
                    inputJabatan.value = '';
                }
            });
        });
    </script>
    @endpush
@endsection

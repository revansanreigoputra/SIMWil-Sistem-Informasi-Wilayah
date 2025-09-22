@extends('layouts.master')

@section('title', 'Tambah Kepala Keluarga')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Formulir Tambah KK</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('data_keluarga.store') }}" method="POST">
                @csrf

                {{-- Bagian Data KK --}}
                <div class="row g-2">
                    <div class="card bg-card-inside-form p-2">
                        <div class="text-primary">Data Kepala Keluarga</div>
                        <div class="p-1">
                            <label class="form-label">Nomor KK *</label>
                            <input type="number" name="no_kk" class="form-control" value="{{ old('no_kk') }}" required>
                            @error('no_kk')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-1">
                            <label class="form-label">Nama Kepala Keluarga *</label>
                            <input type="text" name="kepala_keluarga" class="form-control"
                                value="{{ old('kepala_keluarga') }}" required>
                            @error('kepala_keluarga')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian Data Alamat --}}
                    <div class="card bg-card-inside-form p-2">
                        <div class="text-primary">Data Alamat</div>
                        <div class="row">
                            <div class="col-md-6 p-1">
                                <label class="form-label">RT *</label>
                                <input type="number" name="rt" class="form-control" value="{{ old('rt') }}"
                                    required>
                                @error('rt')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">RW *</label>
                                <input type="number" name="rw" class="form-control" value="{{ old('rw') }}"
                                    required>
                                @error('rw')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="p-1">
                            <label class="form-label">Alamat *</label>
                            <textarea name="alamat" class="form-control" rows="4" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> 

                        {{-- Menggunakan dropdown untuk Desa --}}
                        <div class="p-1">
                            <label class="form-label">Nama Desa *</label>
                            <select name="desa_id" class="form-control" required>
                                <option value="">Pilih Desa</option>
                                @foreach ($desas as $desa)
                                    <option value="{{ $desa->id }}"
                                        {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                        {{ $desa->nama_desa }}
                                    </option>
                                @endforeach
                            </select>
                            @error('desa_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Menggunakan dropdown untuk Kecamatan --}}
                        <div class="p-1">
                            <label class="form-label">Nama Kecamatan *</label>
                            <select name="kecamatan_id" class="form-control" required>
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}"
                                        {{ old('kecamatan_id') == $kecamatan->id ? 'selected' : '' }}>
                                        {{ $kecamatan->nama_kecamatan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kecamatan_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian Data Pengisi --}}
                    <div class="card bd-card-inside-form p-2">
                        <div class="text-primary mb-2">Data Pengisi</div>
                        <div class="p-1">
                            <label class="form-label">Nama Pengisi *</label>
                            <select name="nama_pengisi_id" class="form-control" required>
                                <option value="">Pilih Pengisi</option>
                                @foreach ($perangkatDesas as $perangkat)
                                    <option value="{{ $perangkat->id }}"
                                        {{ old('nama_pengisi_id') == $perangkat->id ? 'selected' : '' }}>
                                        {{ $perangkat->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nama_pengisi_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-between p-2">
                        <a href="{{ route('data_keluarga.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        // let rowIndex = 1;
        // document.getElementById('add-row').addEventListener('click', function () {
        //     let tableBody = document.querySelector('#anggota-table tbody');
        //     let newRow = `
    //     <tr>
    //         <td><input type="text" name="anggota[${rowIndex}][nik]" class="form-control" required></td>
    //         <td><input type="text" name="anggota[${rowIndex}][nama_lengkap]" class="form-control" required></td>
    //         <td>
    //             <select name="anggota[${rowIndex}][jenis_kelamin]" class="form-select" required>
    //                 <option value="">--Pilih--</option>
    //                 <option value="L">Laki-laki</option>
    //                 <option value="P">Perempuan</option>
    //             </select>
    //         </td>
    //         <td><input type="text" name="anggota[${rowIndex}][hubungan_keluarga]" class="form-control" required></td>
    //         <td><input type="text" name="anggota[${rowIndex}][tempat_lahir]" class="form-control"></td>
    //         <td><input type="date" name="anggota[${rowIndex}][tanggal_lahir]" class="form-control"></td>
    //         <td><input type="text" name="anggota[${rowIndex}][agama]" class="form-control"></td>
    //         <td><input type="text" name="anggota[${rowIndex}][pendidikan]" class="form-control"></td>
    //         <td><input type="text" name="anggota[${rowIndex}][pekerjaan]" class="form-control"></td>
    //         <td class="text-center">
    //             <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
    //         </td>
    //     </tr>`;
        //     tableBody.insertAdjacentHTML('beforeend', newRow);
        //     rowIndex++;
        // });

        // document.addEventListener('click', function (e) {
        //     if (e.target.classList.contains('remove-row')) {
        //         e.target.closest('tr').remove();
        //     }
        // });
    </script>
@endpush

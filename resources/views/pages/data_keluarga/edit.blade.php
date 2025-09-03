@extends('layouts.master')

@section('title', 'Edit Kartu Keluarga & Anggota Keluarga')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Edit Kartu Keluarga & Anggota Keluarga</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('data_keluarga.update', $dataKeluarga->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Bagian Data KK --}}
                <h6 class="mb-3">Data Kartu Keluarga</h6>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Nomor KK *</label>
                        <input type="text" name="no_kk" class="form-control"
                            value="{{ old('no_kk', $dataKeluarga->no_kk) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nama Kepala Keluarga *</label>
                        <input type="text" name="kepala_keluarga" class="form-control"
                            value="{{ old('kepala_keluarga', $dataKeluarga->kepala_keluarga) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Alamat *</label>
                        <textarea name="alamat" class="form-control" rows="1" required>{{ old('alamat', $dataKeluarga->alamat) }}</textarea>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">RT *</label>
                        <input type="text" name="rt" class="form-control" value="{{ old('rt', $dataKeluarga->rt) }}"
                            required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">RW *</label>
                        <input type="text" name="rw" class="form-control" value="{{ old('rw', $dataKeluarga->rw) }}"
                            required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Nama Dusun</label>
                        <input type="text" name="dusun" class="form-control"
                            value="{{ old('dusun', $dataKeluarga->dusun) }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Bulan *</label>
                        <input type="text" name="bulan" class="form-control"
                            value="{{ old('bulan', $dataKeluarga->bulan) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tahun *</label>
                        <input type="text" name="tahun" class="form-control"
                            value="{{ old('tahun', $dataKeluarga->tahun) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nama Pengisi</label>
                        <input type="text" name="nama_pengisi" class="form-control"
                            value="{{ old('nama_pengisi', $dataKeluarga->nama_pengisi) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control"
                            value="{{ old('pekerjaan', $dataKeluarga->pekerjaan) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control"
                            value="{{ old('jabatan', $dataKeluarga->jabatan) }}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Sumber Data</label>
                        <textarea name="sumber_data" class="form-control" rows="1">{{ old('sumber_data', $dataKeluarga->sumber_data) }}</textarea>
                    </div>
                </div>

                <hr class="my-4">

                {{-- Bagian Anggota Keluarga --}}
                <h6 class="mb-3">Anggota Keluarga</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" id="anggota-table">
                        <thead class="table-light">
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Hubungan</th>
                                <th>Tempat Lahir</th>
                                <th>Tgl Lahir</th>
                                <th>Agama</th>
                                <th>Pendidikan</th>
                                <th>Pekerjaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKeluarga->anggotaKeluarga as $i => $anggota)
                                <tr>
                                    <td><input type="text" name="anggota[{{ $i }}][nik]" class="form-control"
                                            value="{{ old("anggota.$i.nik", $anggota->nik) }}" required></td>
                                    <td><input type="text" name="anggota[{{ $i }}][nama_lengkap]"
                                            class="form-control"
                                            value="{{ old("anggota.$i.nama_lengkap", $anggota->nama_lengkap) }}" required>
                                    </td>
                                    <td>
                                        <select name="anggota[{{ $i }}][jenis_kelamin]" class="form-select"
                                            required>
                                            <option value="">--Pilih--</option>
                                            <option value="L"
                                                {{ old("anggota.$i.jenis_kelamin", $anggota->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P"
                                                {{ old("anggota.$i.jenis_kelamin", $anggota->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="anggota[{{ $i }}][hubungan_keluarga]"
                                            class="form-control"
                                            value="{{ old("anggota.$i.hubungan_keluarga", $anggota->hubungan_keluarga) }}"
                                            required></td>
                                    <td><input type="text" name="anggota[{{ $i }}][tempat_lahir]"
                                            class="form-control"
                                            value="{{ old("anggota.$i.tempat_lahir", $anggota->tempat_lahir) }}"></td>
                                    <td><input type="date" name="anggota[{{ $i }}][tanggal_lahir]"
                                            class="form-control"
                                            value="{{ old("anggota.$i.tanggal_lahir", $anggota->tanggal_lahir) }}"></td>
                                    <td><input type="text" name="anggota[{{ $i }}][agama]"
                                            class="form-control" value="{{ old("anggota.$i.agama", $anggota->agama) }}">
                                    </td>
                                    <td><input type="text" name="anggota[{{ $i }}][pendidikan]"
                                            class="form-control"
                                            value="{{ old("anggota.$i.pendidikan", $anggota->pendidikan) }}"></td>
                                    <td><input type="text" name="anggota[{{ $i }}][pekerjaan]"
                                            class="form-control"
                                            value="{{ old("anggota.$i.pekerjaan", $anggota->pekerjaan) }}"></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" id="add-row" class="btn btn-secondary btn-sm">+ Tambah Anggota</button>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('data_keluarga.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        let rowIndex = {{ count($dataKeluarga->anggotaKeluarga) }};
        document.getElementById('add-row').addEventListener('click', function() {
            let tableBody = document.querySelector('#anggota-table tbody');
            let newRow = `
        <tr>
            <td><input type="text" name="anggota[${rowIndex}][nik]" class="form-control" required></td>
            <td><input type="text" name="anggota[${rowIndex}][nama_lengkap]" class="form-control" required></td>
            <td>
                <select name="anggota[${rowIndex}][jenis_kelamin]" class="form-select" required>
                    <option value="">--Pilih--</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </td>
            <td><input type="text" name="anggota[${rowIndex}][hubungan_keluarga]" class="form-control" required></td>
            <td><input type="text" name="anggota[${rowIndex}][tempat_lahir]" class="form-control"></td>
            <td><input type="date" name="anggota[${rowIndex}][tanggal_lahir]" class="form-control"></td>
            <td><input type="text" name="anggota[${rowIndex}][agama]" class="form-control"></td>
            <td><input type="text" name="anggota[${rowIndex}][pendidikan]" class="form-control"></td>
            <td><input type="text" name="anggota[${rowIndex}][pekerjaan]" class="form-control"></td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
            </td>
        </tr>`;
            tableBody.insertAdjacentHTML('beforeend', newRow);
            rowIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
            }
        });
    </script>
@endpush

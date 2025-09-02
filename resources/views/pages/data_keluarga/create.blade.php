@extends('layouts.master')

@section('title', 'Tambah Kartu Keluarga & Anggota Keluarga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Kartu Keluarga & Anggota Keluarga</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('data_keluarga.store') }}" method="POST">
            @csrf

            {{-- Bagian Data KK --}}
            <h6 class="mb-3">Data Kartu Keluarga</h6>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Nomor KK *</label>
                    <input type="text" name="no_kk" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nama Kepala Keluarga *</label>
                    <input type="text" name="kepala_keluarga" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Alamat *</label>
                    <textarea name="alamat" class="form-control" rows="1" required></textarea>
                </div>
                <div class="col-md-2">
                    <label class="form-label">RT *</label>
                    <input type="text" name="rt" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">RW *</label>
                    <input type="text" name="rw" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Nama Dusun</label>
                    <input type="text" name="dusun" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Bulan *</label>
                    <input type="text" name="bulan" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tahun *</label>
                    <input type="text" name="tahun" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nama Pengisi</label>
                    <input type="text" name="nama_pengisi" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Sumber Data</label>
                    <textarea name="sumber_data" class="form-control" rows="1"></textarea>
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
                        <tr>
                            <td><input type="text" name="anggota[0][nik]" class="form-control" required></td>
                            <td><input type="text" name="anggota[0][nama_lengkap]" class="form-control" required></td>
                            <td>
                                <select name="anggota[0][jenis_kelamin]" class="form-select" required>
                                    <option value="">--Pilih--</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </td>
                            <td><input type="text" name="anggota[0][hubungan_keluarga]" class="form-control" required></td>
                            <td><input type="text" name="anggota[0][tempat_lahir]" class="form-control"></td>
                            <td><input type="date" name="anggota[0][tanggal_lahir]" class="form-control"></td>
                            <td><input type="text" name="anggota[0][agama]" class="form-control"></td>
                            <td><input type="text" name="anggota[0][pendidikan]" class="form-control"></td>
                            <td><input type="text" name="anggota[0][pekerjaan]" class="form-control"></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" id="add-row" class="btn btn-secondary btn-sm">+ Tambah Anggota</button>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('data_keluarga.index') }}" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    let rowIndex = 1;
    document.getElementById('add-row').addEventListener('click', function () {
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

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endpush

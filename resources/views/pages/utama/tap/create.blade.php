@extends('layouts.master')

@section('title', 'Tambah TA Pendamping')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Tambah Data TA Pendamping Baru</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('utama.tap.store') }}">
                @csrf

                {{-- ==================== BARIS 1: DATA DIRI & KONTAK ==================== --}}
                <h5>Data Diri & Kontak</h5>
                <hr>
                <div class="row mb-3">
                    {{-- Kolom 1.1 --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama *</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="jns_kelamin" class="form-label">Jenis Kelamin *</label>
                            <select id="jns_kelamin" name="jns_kelamin" class="form-select" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    {{-- Kolom 1.2 --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kontak" class="form-label">No. HP *</label>
                            <input type="text" id="kontak" name="kontak" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="tlp" class="form-label">Telepon Kantor</label>
                            <input type="text" id="tlp" name="tlp" class="form-control">
                        </div>
                    </div>
                </div>

                {{-- ==================== BARIS 2: DETAIL PENUGASAN ==================== --}}
                <h5 class="mt-4">Detail Penugasan</h5>
                <hr>
                <div class="row">
                    {{-- Kolom 2.1 --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tgl_tap" class="form-label">Tanggal Penugasan *</label>
                            <input type="date" id="tgl_tap" name="tgl_tap" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun Penugasan *</label>
                            <input type="number" id="tahun" name="tahun" class="form-control" placeholder="{{ date('Y') }}" required>
                        </div>
                         <div class="mb-3">
                            <label for="id_wk" class="form-label">Wilayah Kerja *</label>
                            <select id="id_wk" name="id_wk" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Wilayah --</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_ktk" class="form-label">Kategori Keahlian *</label>
                            <select id="id_ktk" name="id_ktk" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                            </select>
                        </div>
                    </div>
                    {{-- Kolom 2.2 --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_prov" class="form-label">Provinsi *</label>
                            <select id="id_prov" name="id_prov" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Provinsi --</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_kabkot1" class="form-label">Kabupaten/Kota #1 *</label>
                            <select id="id_kabkot1" name="id_kabkot1" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Kabupaten/Kota --</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_kabkot2" class="form-label">Kabupaten/Kota #2</label>
                            <select id="id_kabkot2" name="id_kabkot2" class="form-select">
                                <option value="" disabled selected>-- Pilih Kabupaten/Kota (Opsional) --</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('utama.tap.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

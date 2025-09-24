@extends('layouts.master')

@section('title', 'Edit TA Pendamping')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Edit TA Pendamping: {{ $tap['nama'] }}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('utama.tap.update', $tap['id']) }}">
                @csrf
                @method('PUT')

                {{-- ==================== BARIS 1: DATA DIRI & KONTAK ==================== --}}
                <h5>Data Diri & Kontak</h5>
                <hr>
                <div class="row mb-3">
                    {{-- Kolom 1.1 --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama *</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="{{ $tap['nama'] }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jns_kelamin" class="form-label">Jenis Kelamin *</label>
                            <select id="jns_kelamin" name="jns_kelamin" class="form-select" required>
                                <option value="Laki-Laki" {{ $tap['jns_kelamin'] == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ $tap['jns_kelamin'] == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control" rows="3">{{ $tap['alamat'] }}</textarea>
                        </div>
                    </div>
                    {{-- Kolom 1.2 --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kontak" class="form-label">No. HP *</label>
                            <input type="text" id="kontak" name="kontak" class="form-control" value="{{ $tap['kontak'] }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $tap['email'] }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tlp" class="form-label">Telepon Kantor</label>
                            <input type="text" id="tlp" name="tlp" class="form-control" value="{{ $tap['tlp'] }}">
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
                            <input type="date" id="tgl_tap" name="tgl_tap" class="form-control" value="{{ $tap['tgl_tap'] }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun Penugasan *</label>
                            <input type="number" id="tahun" name="tahun" class="form-control" value="{{ $tap['tahun'] }}" required>
                        </div>
                         <div class="mb-3">
                            <label for="id_wk" class="form-label">Wilayah Kerja *</label>
                            <select id="id_wk" name="id_wk" class="form-select" required>
                                {{-- Contoh data Dummy terpilih --}}
                                <option value="1" selected>{{ $tap['wilayah_kerja'] }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_ktk" class="form-label">Kategori Keahlian *</label>
                            <select id="id_ktk" name="id_ktk" class="form-select" required>
                                {{-- Contoh data Dummy terpilih --}}
                                <option value="1" selected>{{ $tap['kategori_keahlian'] }}</option>
                            </select>
                        </div>
                    </div>
                    {{-- Kolom 2.2 --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_prov" class="form-label">Provinsi *</label>
                            <select id="id_prov" name="id_prov" class="form-select" required>
                                 {{-- Contoh data Dummy terpilih --}}
                                <option value="1" selected>{{ $tap['provinsi'] }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_kabkot1" class="form-label">Kabupaten/Kota #1 *</label>
                            <select id="id_kabkot1" name="id_kabkot1" class="form-select" required>
                                 {{-- Contoh data Dummy terpilih --}}
                                <option value="1" selected>{{ $tap['kabupaten1'] }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_kabkot2" class="form-label">Kabupaten/Kota #2</label>
                            <select id="id_kabkot2" name="id_kabkot2" class="form-select">
                                 {{-- Contoh data Dummy terpilih --}}
                                <option value="1" selected>{{ $tap['kabupaten2'] }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('utama.tap.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

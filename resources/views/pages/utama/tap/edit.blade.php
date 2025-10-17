@extends('layouts.master')

@section('title', 'Edit TA Pendamping')

@section('content')
    <form method="POST" action="{{ route('utama.tap.update', $tap->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                {{-- CARD UNTUK DATA DIRI & KONTAK --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Data Diri & Kontak: {{ $tap->nama }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label"><i class="bi bi-person-fill me-2"></i>Nama *</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $tap->nama) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jns_kelamin" class="form-label"><i class="bi bi-gender-ambiguous me-2"></i>Jenis Kelamin *</label>
                                    <select id="jns_kelamin" name="jns_kelamin" class="form-select" required>
                                        <option value="Laki-Laki" {{ old('jns_kelamin', $tap->jns_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ old('jns_kelamin', $tap->jns_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label"><i class="bi bi-geo-alt-fill me-2"></i>Alamat</label>
                                    <textarea id="alamat" name="alamat" class="form-control" rows="3">{{ old('alamat', $tap->alamat) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kontak" class="form-label"><i class="bi bi-phone-fill me-2"></i>No. HP *</label>
                                    <input type="text" id="kontak" name="kontak" class="form-control" value="{{ old('kontak', $tap->kontak) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label"><i class="bi bi-envelope-fill me-2"></i>Email *</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $tap->email) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tlp" class="form-label"><i class="bi bi-telephone-fill me-2"></i>Telepon Kantor</label>
                                    <input type="text" id="tlp" name="tlp" class="form-control" value="{{ old('tlp', $tap->tlp) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CARD UNTUK DETAIL PENUGASAN --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Detail Penugasan</h5>
                    </div>
                    <div class="card-body">
                         <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tgl_tap" class="form-label"><i class="bi bi-calendar-event-fill me-2"></i>Tanggal Penugasan *</label>
                                    <input type="date" id="tgl_tap" name="tgl_tap" class="form-control" value="{{ old('tgl_tap', $tap->tgl_tap) }}" required>
                                </div>
                                 <div class="mb-3">
                                    <label for="tahun" class="form-label"><i class="bi bi-calendar-fill me-2"></i>Tahun Penugasan *</label>
                                    <input type="number" id="tahun" name="tahun" class="form-control" value="{{ old('tahun', $tap->tahun) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="id_wk" class="form-label"><i class="bi bi-pin-map-fill me-2"></i>Wilayah Kerja *</label>
                                    <select id="id_wk" name="id_wk" class="form-select" required>
                                        @foreach ($wilayah_kerjas as $item)
                                            <option value="{{ $item['id'] }}" {{ old('id_wk', $tap->id_wk) == $item['id'] ? 'selected' : '' }}>{{ $item['nama'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_ktk" class="form-label"><i class="bi bi-tags-fill me-2"></i>Kategori Keahlian *</label>
                                    <select id="id_ktk" name="id_ktk" class="form-select" required>
                                        @foreach ($kategori_keahlians as $item)
                                            <option value="{{ $item['id'] }}" {{ old('id_ktk', $tap->id_ktk) == $item['id'] ? 'selected' : '' }}>{{ $item['nama'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_prov" class="form-label"><i class="bi bi-map-fill me-2"></i>Provinsi *</label>
                                    <select id="id_prov" name="id_prov" class="form-select" required>
                                        @foreach ($provinsis as $item)
                                            <option value="{{ $item['id'] }}" {{ old('id_prov', $tap->id_prov) == $item['id'] ? 'selected' : '' }}>{{ $item['nama'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_kabkot1" class="form-label"><i class="bi bi-building-fill me-2"></i>Kabupaten/Kota #1 *</label>
                                    <select id="id_kabkot1" name="id_kabkot1" class="form-select" required>
                                        @foreach ($kabupatens as $item)
                                            <option value="{{ $item['id'] }}" {{ old('id_kabkot1', $tap->id_kabkot1) == $item['id'] ? 'selected' : '' }}>{{ $item['nama'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_kabkot2" class="form-label"><i class="bi bi-building me-2"></i>Kabupaten/Kota #2</label>
                                    <select id="id_kabkot2" name="id_kabkot2" class="form-select">
                                        <option value="">-- Pilih Kabupaten/Kota (Opsional) --</option>
                                        @foreach ($kabupatens as $item)
                                            <option value="{{ $item['id'] }}" {{ old('id_kabkot2', $tap->id_kabkot2) == $item['id'] ? 'selected' : '' }}>{{ $item['nama'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TOMBOL AKSI --}}
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('utama.tap.index') }}" class="btn btn-secondary">
                         <i></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i></i>Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

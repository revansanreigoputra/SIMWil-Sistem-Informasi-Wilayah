@extends('layouts.master')

@section('title', 'Tambah Data Usaha Jasa Pengangkutan')

@section('content')
    <div class="card">
        <div class="card-header">
           
        </div>
        <div class="card-body">
            <form action="{{ route('potensi.kelembagaan.pengangkutan.store') }}" method="POST">
                @csrf

                {{-- Data Umum --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6 class="fw-bold mb-3">Data Umum</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="tanggal" class="form-label">Tanggal *</label>
                            <input type="date" name="tanggal" id="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', date('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="kategori" class="form-label">Kategori *</label>
                            <select name="kategori" id="kategori"
                                class="form-select @error('kategori') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Angkutan Darat" {{ old('kategori') == 'Angkutan Darat' ? 'selected' : '' }}>Angkutan Darat</option>
                                <option value="Angkutan Laut" {{ old('kategori') == 'Angkutan Laut' ? 'selected' : '' }}>Angkutan Laut</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="jenis_angkutan" class="form-label">Jenis Angkutan *</label>
                            <select name="jenis_angkutan" id="jenis_angkutan"
                                class="form-select @error('jenis_angkutan') is-invalid @enderror" required>
                                <option value="">-- Pilih Jenis Angkutan --</option>
                                {{-- Akan diisi otomatis lewat JS --}}
                            </select>
                            @error('jenis_angkutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Data Kegiatan --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6 class="fw-bold mb-3">Data Kegiatan</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="jumlah_unit" class="form-label">Jumlah Unit *</label>
                            <input type="number" name="jumlah_unit" id="jumlah_unit"
                                class="form-control @error('jumlah_unit') is-invalid @enderror"
                                value="{{ old('jumlah_unit', 0) }}" required>
                            @error('jumlah_unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="jumlah_pemilik" class="form-label">Jumlah Pemilik (Orang) *</label>
                            <input type="number" name="jumlah_pemilik" id="jumlah_pemilik"
                                class="form-control @error('jumlah_pemilik') is-invalid @enderror"
                                value="{{ old('jumlah_pemilik', 0) }}" required>
                            @error('jumlah_pemilik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="kapasitas" class="form-label">Kapasitas (Orang/Unit) *</label>
                            <input type="number" name="kapasitas" id="kapasitas"
                                class="form-control @error('kapasitas') is-invalid @enderror"
                                value="{{ old('kapasitas', 0) }}" required>
                            @error('kapasitas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="tenaga_kerja" class="form-label">Tenaga Kerja (Orang) *</label>
                            <input type="number" name="tenaga_kerja" id="tenaga_kerja"
                                class="form-control @error('tenaga_kerja') is-invalid @enderror"
                                value="{{ old('tenaga_kerja', 0) }}" required>
                            @error('tenaga_kerja')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                    <a href="{{ route('potensi.kelembagaan.pengangkutan.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Script untuk Dropdown Dinamis --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const kategoriSelect = document.getElementById('kategori');
            const jenisSelect = document.getElementById('jenis_angkutan');

            const jenisOptions = {
                'Angkutan Darat': ['Bus Umum', 'Angkot'],
                'Angkutan Laut': ['Kapal Ferry', 'Kapal Tongkang']
            };

            // Fungsi untuk update opsi jenis angkutan
            function updateJenisOptions(selectedKategori) {
                jenisSelect.innerHTML = '<option value="">-- Pilih Jenis Angkutan --</option>';

                if (selectedKategori && jenisOptions[selectedKategori]) {
                    jenisOptions[selectedKategori].forEach(jenis => {
                        const option = document.createElement('option');
                        option.value = jenis;
                        option.textContent = jenis;

                        // Supaya tetap memilih data lama kalau form gagal submit
                        if ("{{ old('jenis_angkutan') }}" === jenis) {
                            option.selected = true;
                        }

                        jenisSelect.appendChild(option);
                    });
                }
            }

            // Jalankan saat kategori berubah
            kategoriSelect.addEventListener('change', function () {
                updateJenisOptions(this.value);
            });

            // Jalankan saat halaman pertama kali dibuka (untuk old value)
            if ("{{ old('kategori') }}") {
                updateJenisOptions("{{ old('kategori') }}");
            }
        });
    </script>
@endsection

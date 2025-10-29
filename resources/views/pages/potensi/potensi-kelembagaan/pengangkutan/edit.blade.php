@extends('layouts.master')

@section('title', 'Edit Data Usaha Jasa Pengangkutan')

@section('content')
    {{-- Memeriksa apakah pengguna memiliki izin 'edit-pengangkutan' --}}
    @can('edit-pengangkutan', $data)
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i>Formulir Edit Data Usaha Jasa Pengangkutan
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('potensi.potensi-kelembagaan.pengangkutan.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- SECTION 1: Data Umum --}}
                    <div class="mb-2 border rounded-3 p-4 bg-light">
                        <h6 class="fw-bold mb-3 text-primary">
                            <i class="bi bi-info-circle me-1"></i> Data Umum
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="tanggal" class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal" id="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal', $data->tanggal) }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="kategori" class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                                <select name="kategori" id="kategori"
                                    class="form-select @error('kategori') is-invalid @enderror" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Angkutan Darat" {{ old('kategori', $data->kategori) == 'Angkutan Darat' ? 'selected' : '' }}>Angkutan Darat</option>
                                    <option value="Angkutan Laut" {{ old('kategori', $data->kategori) == 'Angkutan Laut' ? 'selected' : '' }}>Angkutan Laut</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="jenis_angkutan" class="form-label fw-semibold">Jenis Angkutan <span class="text-danger">*</span></label>
                                <select name="jenis_angkutan" id="jenis_angkutan"
                                    class="form-select @error('jenis_angkutan') is-invalid @enderror" required>
                                    <option value="">-- Pilih Jenis Angkutan --</option>
                                </select>
                                @error('jenis_angkutan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 2: Data Kegiatan --}}
                    <div class="mb-2 border rounded-3 p-4 bg-light">
                        <h6 class="fw-bold mb-3 text-primary">
                            <i class="bi bi-clipboard-data me-1"></i> Data Kegiatan
                        </h6>
                        <div class="row g-3">
                             {{-- Diubah menjadi col-md-3 agar sejajar dalam satu baris --}}
                            <div class="col-md-3">
                                <label for="jumlah_unit" class="form-label fw-semibold">Jumlah Unit <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="jumlah_unit" id="jumlah_unit"
                                        class="form-control @error('jumlah_unit') is-invalid @enderror"
                                        value="{{ old('jumlah_unit', $data->jumlah_unit) }}" required min="0">
                                    <span class="input-group-text">Unit</span>
                                </div>
                                @error('jumlah_unit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="jumlah_pemilik" class="form-label fw-semibold">Jumlah Pemilik <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="jumlah_pemilik" id="jumlah_pemilik"
                                        class="form-control @error('jumlah_pemilik') is-invalid @enderror"
                                        value="{{ old('jumlah_pemilik', $data->jumlah_pemilik) }}" required min="0">
                                    <span class="input-group-text">Orang</span>
                                </div>
                                @error('jumlah_pemilik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="kapasitas" class="form-label fw-semibold">Kapasitas <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="kapasitas" id="kapasitas"
                                        class="form-control @error('kapasitas') is-invalid @enderror"
                                        value="{{ old('kapasitas', $data->kapasitas) }}" required min="0">
                                    <span class="input-group-text">Orang/Unit</span>
                                </div>
                                @error('kapasitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="tenaga_kerja" class="form-label fw-semibold">Tenaga Kerja <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="tenaga_kerja" id="tenaga_kerja"
                                        class="form-control @error('tenaga_kerja') is-invalid @enderror"
                                        value="{{ old('tenaga_kerja', $data->tenaga_kerja) }}" required min="0">
                                    <span class="input-group-text">Orang</span>
                                </div>
                                @error('tenaga_kerja')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Perbarui Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else
        {{-- Jika pengguna tidak punya izin, tampilkan pesan ini --}}
        <div class="alert alert-danger mt-3">
            <i class="bi bi-exclamation-triangle me-2"></i>
            Maaf, Anda tidak memiliki izin untuk mengubah data ini.
        </div>
    @endcan

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const kategoriSelect = document.getElementById('kategori');
            const jenisSelect = document.getElementById('jenis_angkutan');

            const jenisOptions = {
                'Angkutan Darat': ['Bus Umum', 'Angkot', 'Taksi', 'Ojek', 'Travel'],
                'Angkutan Laut': ['Kapal Ferry', 'Kapal Tongkang', 'Kapal Penumpang', 'Perahu Motor']
            };

            function updateJenisOptions(selectedKategori, selectedJenis) {
                jenisSelect.innerHTML = '<option value="">-- Pilih Jenis Angkutan --</option>';
                if (selectedKategori && jenisOptions[selectedKategori]) {
                    jenisOptions[selectedKategori].forEach(jenis => {
                        const option = document.createElement('option');
                        option.value = jenis;
                        option.textContent = jenis;
                        if (jenis === selectedJenis) {
                            option.selected = true;
                        }
                        jenisSelect.appendChild(option);
                    });
                }
            }

            kategoriSelect.addEventListener('change', function () {
                // Saat kategori diubah, reset pilihan jenis angkutan
                updateJenisOptions(this.value, '');
            });

            // Ambil nilai awal dari database atau dari input lama jika ada error validasi
            const initialKategori = "{{ old('kategori', $data->kategori) }}";
            const initialJenis = "{{ old('jenis_angkutan', $data->jenis_angkutan) }}";

            // Panggil fungsi saat halaman pertama kali dimuat untuk mengisi dropdown 'jenis_angkutan'
            if (initialKategori) {
                updateJenisOptions(initialKategori, initialJenis);
            }
        });
    </script>
    @endpush
@endsection
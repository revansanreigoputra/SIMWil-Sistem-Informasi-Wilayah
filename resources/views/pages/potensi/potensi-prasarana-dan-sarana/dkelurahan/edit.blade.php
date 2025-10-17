@extends('layouts.master')

@section('title', 'Ubah Data Desa/Kelurahan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-edit me-2"></i>
                            <h4 class="card-title mb-0">Ubah Data Desa/Kelurahan</h4>
                        </div>
                    </div>
                </div>

                <form
                    action="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-dkelurahan.update', $desaKelurahan->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Dasar -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Informasi Dasar
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="desa_id" class="form-label fw-semibold">
                                            <i class="fas fa-map-marker-alt text-muted me-1"></i>
                                            Desa <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select @error('desa_id') is-invalid @enderror" id="desa_id" name="desa_id" required>
                                            <option value="">-- Pilih Desa --</option>
                                            @foreach($desas as $desa)
                                                <option value="{{ $desa->id }}" {{ old('desa_id', $desaKelurahan->desa_id) == $desa->id ? 'selected' : '' }}>{{ $desa->nama_desa }}</option>
                                            @endforeach
                                        </select>
                                        @error('desa_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tanggal" class="form-label fw-semibold">
                                            <i class="fas fa-calendar text-muted me-1"></i>
                                            Tanggal <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal"
                                            value="{{ old('tanggal', $desaKelurahan->tanggal) }}" required>
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gedung Kantor -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-building text-primary me-2"></i>
                                Gedung Kantor
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="gedung_kantor" class="form-label fw-semibold">
                                            Status Gedung Kantor
                                        </label>
                                        <select class="form-select @error('gedung_kantor') is-invalid @enderror"
                                            id="gedung_kantor" name="gedung_kantor">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada"
                                                {{ old('gedung_kantor', $desaKelurahan->gedung_kantor) == 'ada' ? 'selected' : '' }}>
                                                Ada
                                            </option>
                                            <option value="tidak ada"
                                                {{ old('gedung_kantor', $desaKelurahan->gedung_kantor) == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('gedung_kantor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="ruang_kerja" class="form-label fw-semibold">
                                            Jumlah Ruang Kerja
                                        </label>
                                        <input type="number"
                                            class="form-control @error('ruang_kerja') is-invalid @enderror" id="ruang_kerja"
                                            name="ruang_kerja" value="{{ old('ruang_kerja', $desaKelurahan->ruang_kerja) }}"
                                            min="0" placeholder="Masukkan jumlah">
                                        @error('ruang_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">
                            <h6 class="fw-semibold mb-3 text-muted">Fasilitas Pendukung</h6>

                            <div class="row">
                                @php
                                    $facilities = [
                                        'balai_desa' => 'Balai Desa',
                                        'listrik' => 'Listrik',
                                        'air_bersih' => 'Air Bersih',
                                        'telepon' => 'Telepon',
                                        'rumah_dinas_kepala_desa' => 'Rumah Dinas Kepala Desa',
                                        'rumah_dinas_perangkat' => 'Rumah Dinas Perangkat',
                                    ];
                                @endphp

                                @foreach ($facilities as $field => $label)
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="{{ $field }}" class="form-label fw-semibold">
                                                {{ $label }}
                                            </label>
                                            <select class="form-select @error($field) is-invalid @enderror"
                                                id="{{ $field }}" name="{{ $field }}">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="ada"
                                                    {{ old($field, $desaKelurahan->$field) == 'ada' ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old($field, $desaKelurahan->$field) == 'tidak ada' ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error($field)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Kondisi dan Keterangan -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-clipboard-list text-primary me-2"></i>
                                Kondisi dan Keterangan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="kondisi" class="form-label fw-semibold">
                                            Kondisi Umum
                                        </label>
                                        <select class="form-select @error('kondisi') is-invalid @enderror" id="kondisi"
                                            name="kondisi">
                                            <option value="">-- Pilih Kondisi --</option>
                                            <option value="baik"
                                                {{ old('kondisi', $desaKelurahan->kondisi) == 'baik' ? 'selected' : '' }}>
                                                Baik</option>
                                            <option value="buruk"
                                                {{ old('kondisi', $desaKelurahan->kondisi) == 'buruk' ? 'selected' : '' }}>
                                                Buruk</option>
                                            <option value="rusak_ringan"
                                                {{ old('kondisi', $desaKelurahan->kondisi) == 'rusak_ringan' ? 'selected' : '' }}>
                                                Rusak Ringan</option>
                                            <option value="rusak_berat"
                                                {{ old('kondisi', $desaKelurahan->kondisi) == 'rusak_berat' ? 'selected' : '' }}>
                                                Rusak Berat</option>
                                        </select>
                                        @error('kondisi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tahun_pembangunan" class="form-label fw-semibold">
                                            Tahun Pembangunan
                                        </label>
                                        <input type="number"
                                            class="form-control @error('tahun_pembangunan') is-invalid @enderror"
                                            id="tahun_pembangunan" name="tahun_pembangunan"
                                            value="{{ old('tahun_pembangunan', $desaKelurahan->tahun_pembangunan) }}"
                                            min="1900" max="{{ date('Y') }}"
                                            placeholder="Contoh: {{ date('Y') }}">
                                        @error('tahun_pembangunan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="keterangan" class="form-label fw-semibold">
                                    Keterangan Tambahan
                                </label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                                    rows="4" placeholder="Masukkan keterangan tambahan jika ada...">{{ old('keterangan', $desaKelurahan->keterangan) }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Inventaris Kantor -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-boxes text-primary me-2"></i>
                                Inventaris Kantor
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @php
                                    $inventaris = [
                                        'mesin_tik' => 'Mesin Tik',
                                        'meja' => 'Meja',
                                        'kursi' => 'Kursi',
                                        'lemari_arsip' => 'Lemari Arsip',
                                        'komputer' => 'Komputer',
                                        'mesin_fax' => 'Mesin Fax',
                                        'kendaraan_dinas' => 'Kendaraan Dinas',
                                    ];
                                @endphp

                                @foreach ($inventaris as $field => $label)
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="{{ $field }}" class="form-label fw-semibold">
                                                {{ $label }}
                                            </label>
                                            <input type="number" class="form-control @error($field) is-invalid @enderror"
                                                id="{{ $field }}" name="{{ $field }}"
                                                value="{{ old($field, $desaKelurahan->$field) }}" min="0"
                                                placeholder="Jumlah">
                                            @error($field)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Administrasi Pemerintahan -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-file-alt text-primary me-2"></i>
                                Administrasi Pemerintahan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @php
                                    $administrasi = [
                                        'buku_data_peraturan_desa' => 'Buku Data Peraturan Desa',
                                        'buku_keputusan_kepala_desa' => 'Buku Keputusan Kepala Desa',
                                        'buku_administrasi_kependudukan' => 'Buku Administrasi Kependudukan',
                                        'buku_data_inventaris' => 'Buku Data Inventaris',
                                        'buku_data_aparat' => 'Buku Data Aparat',
                                        'buku_data_tanah_kas_desa' => 'Buku Data Tanah Kas Desa',
                                        'buku_administrasi_pajak' => 'Buku Administrasi Pajak',
                                        'buku_data_tanah' => 'Buku Data Tanah',
                                        'buku_laporan_pengaduan' => 'Buku Laporan Pengaduan',
                                        'buku_agenda_ekspedisi' => 'Buku Agenda Ekspedisi',
                                        'buku_profil_desa' => 'Buku Profil Desa',
                                        'buku_data_induk_penduduk' => 'Buku Data Induk Penduduk',
                                        'buku_data_mutasi_penduduk' => 'Buku Data Mutasi Penduduk',
                                        'buku_rekapitulasi_penduduk' => 'Buku Rekapitulasi Penduduk',
                                        'buku_registrasi_pelayanan' => 'Buku Registrasi Pelayanan',
                                        'buku_data_penduduk_sementara' => 'Buku Data Penduduk Sementara',
                                        'buku_anggaran_penerimaan' => 'Buku Anggaran Penerimaan',
                                        'buku_agenda_pengeluaran' => 'Buku Agenda Pengeluaran',
                                        'buku_kas_umum' => 'Buku Kas Umum',
                                        'buku_kas_pembantu_penerimaan' => 'Buku Kas Pembantu Penerimaan',
                                        'buku_kas_pembantu_pengeluaran' => 'Buku Kas Pembantu Pengeluaran',
                                        'buku_lembaga_kemasyarakatan' => 'Buku Lembaga Kemasyarakatan',
                                    ];
                                @endphp

                                @foreach ($administrasi as $field => $label)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="{{ $field }}" class="form-label fw-semibold">
                                                {{ $label }}
                                            </label>
                                            <select class="form-select @error($field) is-invalid @enderror"
                                                id="{{ $field }}" name="{{ $field }}">
                                                <option value="">-- Pilih --</option>
                                                <option value="ada_dan_terisi"
                                                    {{ old($field, $desaKelurahan->$field) == 'ada_dan_terisi' ? 'selected' : '' }}>
                                                    Ada dan Terisi</option>
                                                <option value="ada_dan_tidak_terisi"
                                                    {{ old($field, $desaKelurahan->$field) == 'ada_dan_tidak_terisi' ? 'selected' : '' }}>
                                                    Ada dan Tidak Terisi</option>
                                                <option value="tidak_ada"
                                                    {{ old($field, $desaKelurahan->$field) == 'tidak_ada' ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error($field)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Fasilitas Tambahan -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-plus-circle text-primary me-2"></i>
                                Fasilitas Tambahan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="pos_kamling" class="form-label fw-semibold">
                                            Status Pos Kamling
                                        </label>
                                        <select class="form-select @error('pos_kamling') is-invalid @enderror"
                                            id="pos_kamling" name="pos_kamling">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="ada"
                                                {{ old('pos_kamling', $desaKelurahan->pos_kamling) == 'ada' ? 'selected' : '' }}>
                                                Ada</option>
                                            <option value="tidak ada"
                                                {{ old('pos_kamling', $desaKelurahan->pos_kamling) == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('pos_kamling')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jumlah_pos_kamling" class="form-label fw-semibold">
                                            Jumlah Pos Kamling
                                        </label>
                                        <input type="number"
                                            class="form-control @error('jumlah_pos_kamling') is-invalid @enderror"
                                            id="jumlah_pos_kamling" name="jumlah_pos_kamling"
                                            value="{{ old('jumlah_pos_kamling', $desaKelurahan->jumlah_pos_kamling) }}"
                                            min="0" placeholder="Jumlah pos">
                                        @error('jumlah_pos_kamling')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @php
                                    $additionalFacilities = [
                                        'lapangan_olahraga' => 'Lapangan Olahraga',
                                        'tempat_parkir' => 'Tempat Parkir',
                                    ];
                                @endphp

                                @foreach ($additionalFacilities as $field => $label)
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="{{ $field }}" class="form-label fw-semibold">
                                                {{ $label }}
                                            </label>
                                            <select class="form-select @error($field) is-invalid @enderror"
                                                id="{{ $field }}" name="{{ $field }}">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="ada"
                                                    {{ old($field, $desaKelurahan->$field) == 'ada' ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old($field, $desaKelurahan->$field) == 'tidak ada' ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error($field)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <hr class="my-4">

                            {{-- <div class="form-group mb-0">
                                <label for="fasilitas_lainnya" class="form-label fw-semibold">
                                    Fasilitas Lainnya
                                </label>
                                <textarea class="form-control @error('fasilitas_lainnya') is-invalid @enderror" id="fasilitas_lainnya"
                                    name="fasilitas_lainnya" rows="4" placeholder="Sebutkan fasilitas lainnya yang belum tercantum di atas...">{{ old('fasilitas_lainnya', $desaKelurahan->fasilitas_lainnya) }}</textarea>
                                @error('fasilitas_lainnya')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="card shadow-sm">
                        <div class="card-footer bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">
                                    <small>
                                        <i class="fas fa-info-circle me-1"></i>
                                        Field dengan tanda <span class="text-danger fw-bold">*</span> wajib diisi
                                    </small>
                                </div>

                                <div class="btn-group gap-2">
                                    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-dkelurahan.index') }}"
                                        class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-1"></i> Kembali
                                    </a>
                                    <button type="reset" class="btn btn-outline-warning">
                                        <i class="fas fa-undo me-1"></i> Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Simpan Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('addon-style')
    <style>
        .form-label {
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .card {
            border: none;
            border-radius: 0.5rem;
        }

        .card-header {
            border-radius: 0.5rem 0.5rem 0 0 !important;
            border-bottom: 1px solid #dee2e6;
        }

        .btn-group .btn+.btn {
            margin-left: 0.5rem;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        hr {
            border-top: 1px solid #dee2e6;
            opacity: 1;
        }

        .form-group {
            position: relative;
        }

        @media (max-width: 768px) {
            .btn-group {
                flex-direction: column;
                width: 100%;
            }

            .btn-group .btn {
                margin-left: 0;
                margin-bottom: 0.5rem;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
@endpush

@push('addon-script')
    <script>
        $(document).ready(function() {
            // Auto enable/disable jumlah pos kamling
            $('#pos_kamling').on('change', function() {
                const jumlahPos = $('#jumlah_pos_kamling');
                if ($(this).val() === 'ada') {
                    jumlahPos.prop('disabled', false).attr('min', 1);
                    if (jumlahPos.val() == 0) jumlahPos.val(1);
                } else {
                    jumlahPos.prop('disabled', true).val(0).attr('min', 0);
                }
            }).trigger('change');

            // Auto enable/disable ruang kerja
            $('#gedung_kantor').on('change', function() {
                const ruangKerja = $('#ruang_kerja');
                if ($(this).val() === 'ada') {
                    ruangKerja.prop('disabled', false);
                    if (ruangKerja.val() == 0) ruangKerja.val(1);
                } else {
                    ruangKerja.prop('disabled', true).val(0);
                }
            }).trigger('change');

            // Form validation enhancement
            $('form').on('submit', function(e) {
                let hasError = false;

                // Check required fields
                $('input[required], select[required]').each(function() {
                    if (!$(this).val()) {
                        $(this).addClass('is-invalid');
                        hasError = true;
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (hasError) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: $('.is-invalid').first().offset().top - 100
                    }, 500);

                    // Show alert
                    alert('Mohon lengkapi semua field yang wajib diisi!');
                }
            });

            // Remove invalid class on input
            $('.form-control, .form-select').on('input change', function() {
                if ($(this).val()) {
                    $(this).removeClass('is-invalid');
                }
            });

            // Smooth scroll to top after form reset
            $('button[type="reset"]').on('click', function() {
                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 500);
                }, 100);
            });
        });
    </script>
@endpush

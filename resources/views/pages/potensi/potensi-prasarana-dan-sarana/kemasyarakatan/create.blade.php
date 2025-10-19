    @extends('layouts.master')

    @section('title', 'Tambah Data Kemasyarakatan')

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Header Card -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-plus-circle me-2"></i>
                                <h4 class="card-title mb-0">Tambah Data Kemasyarakatan</h4>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('potensi.potensi-prasarana-dan-sarana.kemasyarakatan.store') }}" method="POST">
                        @csrf

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
                                            <select class="form-select @error('desa_id') is-invalid @enderror"
                                                id="desa_id" name="desa_id" required>
                                                <option value="">-- Pilih Desa --</option>
                                                @foreach ($desas as $desa)
                                                    <option value="{{ $desa->id }}"
                                                        {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                                        {{ $desa->nama_desa }}</option>
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
                                            <input type="date"
                                                class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                                name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}" required>
                                            @error('tanggal')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- GEDUNG KANTOR LKD/LKK -->
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-building text-primary me-2"></i>
                                    Gedung Kantor LKD/LKK
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="gedung_lembaga_kemasyarakatan" class="form-label fw-semibold">
                                                Gedung Lembaga Kemasyarakatan
                                            </label>
                                            <select
                                                class="form-select @error('gedung_lembaga_kemasyarakatan') is-invalid @enderror"
                                                id="gedung_lembaga_kemasyarakatan" name="gedung_lembaga_kemasyarakatan"
                                                required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Ada"
                                                    {{ old('gedung_lembaga_kemasyarakatan') == 'Ada' ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="Tidak Ada"
                                                    {{ old('gedung_lembaga_kemasyarakatan') == 'Tidak Ada' ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('gedung_lembaga_kemasyarakatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="peralatan_kantor_lkd" class="form-label fw-semibold">
                                                Peralatan Kantor
                                            </label>
                                            <select class="form-select @error('peralatan_kantor_lkd') is-invalid @enderror"
                                                id="peralatan_kantor_lkd" name="peralatan_kantor_lkd" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Ada"
                                                    {{ old('peralatan_kantor_lkd') == 'Ada' ? 'selected' : '' }}>Ada
                                                </option>
                                                <option value="Tidak Ada"
                                                    {{ old('peralatan_kantor_lkd') == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                                    Ada</option>
                                            </select>
                                            @error('peralatan_kantor_lkd')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="mesin_tik_lkd" class="form-label fw-semibold">
                                                Mesin Tik
                                            </label>
                                            <select class="form-select @error('mesin_tik_lkd') is-invalid @enderror"
                                                id="mesin_tik_lkd" name="mesin_tik_lkd" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Ada"
                                                    {{ old('mesin_tik_lkd') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                                <option value="Tidak Ada"
                                                    {{ old('mesin_tik_lkd') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                                </option>
                                            </select>
                                            @error('mesin_tik_lkd')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="kardek_lkd" class="form-label fw-semibold">
                                                Kardek
                                            </label>
                                            <select class="form-select @error('kardek_lkd') is-invalid @enderror"
                                                id="kardek_lkd" name="kardek_lkd" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Ada" {{ old('kardek_lkd') == 'Ada' ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="Tidak Ada"
                                                    {{ old('kardek_lkd') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                                </option>
                                            </select>
                                            @error('kardek_lkd')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="lainnya_lkd" class="form-label fw-semibold">
                                                Lainnya
                                            </label>
                                            <select class="form-select @error('lainnya_lkd') is-invalid @enderror"
                                                id="lainnya_lkd" name="lainnya_lkd" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Ada" {{ old('lainnya_lkd') == 'Ada' ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="Tidak Ada"
                                                    {{ old('lainnya_lkd') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                                </option>
                                            </select>
                                            @error('lainnya_lkd')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="buku_administrasi_lembaga_lkd" class="form-label fw-semibold">
                                                Buku Administrasi Lembaga
                                            </label>
                                            <input type="text"
                                                class="form-control @error('buku_administrasi_lembaga_lkd') is-invalid @enderror"
                                                id="buku_administrasi_lembaga_lkd" name="buku_administrasi_lembaga_lkd"
                                                value="{{ old('buku_administrasi_lembaga_lkd') }}"
                                                placeholder="Masukkan jumlah">
                                            @error('buku_administrasi_lembaga_lkd')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="jumlah_meja_kursi_lkd" class="form-label fw-semibold">
                                                Jumlah Meja Kursi
                                            </label>
                                            <input type="text"
                                                class="form-control @error('jumlah_meja_kursi_lkd') is-invalid @enderror"
                                                id="jumlah_meja_kursi_lkd" name="jumlah_meja_kursi_lkd"
                                                value="{{ old('jumlah_meja_kursi_lkd') }}" placeholder="Masukkan jumlah">
                                            @error('jumlah_meja_kursi_lkd')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- LKMD / LPM -->
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-users text-primary me-2"></i>
                                    LKMD / LPM
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="memiliki_kantor_sendiri" class="form-label fw-semibold">
                                                Memiliki Kantor Sendiri
                                            </label>
                                            <select
                                                class="form-select @error('memiliki_kantor_sendiri') is-invalid @enderror"
                                                id="memiliki_kantor_sendiri" name="memiliki_kantor_sendiri">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Ada"
                                                    {{ old('memiliki_kantor_sendiri') == 'Ada' ? 'selected' : '' }}>Ada
                                                </option>
                                                <option value="Tidak Ada"
                                                    {{ old('memiliki_kantor_sendiri') == 'Tidak Ada' ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('memiliki_kantor_sendiri')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="peralatan_kantor_lpm" class="form-label fw-semibold">
                                                Peralatan Kantor
                                            </label>
                                            <select class="form-select @error('peralatan_kantor_lpm') is-invalid @enderror"
                                                id="peralatan_kantor_lpm" name="peralatan_kantor_lpm">
                                                <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                                    {{ old('peralatan_kantor_lpm') == 'Ada' ? 'selected' : '' }}>Ada
                                                </option>
                                                <option value="Tidak Ada"
                                                    {{ old('peralatan_kantor_lpm') == 'Tidak Ada' ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('peralatan_kantor_lpm')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="mesin_tik_lpm" class="form-label fw-semibold">
                                                Mesin Tik
                                            </label>
                                            <select class="form-select @error('mesin_tik_lpm') is-invalid @enderror"
                                                id="mesin_tik_lpm" name="mesin_tik_lpm">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Ada"
                                                    {{ old('mesin_tik_lpm') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                                <option value="Tidak Ada"
                                                    {{ old('mesin_tik_lpm') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                                </option>
                                            </select>
                                            @error('mesin_tik_lpm')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="kardek_lpm" class="form-label fw-semibold">
                                                Kardek
                                            </label>
                                            <select class="form-select @error('kardek_lpm') is-invalid @enderror"
                                                id="kardek_lpm" name="kardek_lpm">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Ada" {{ old('kardek_lpm') == 'Ada' ? 'selected' : '' }}>Ada
                                                </option>
                                                <option value="Tidak Ada"
                                                    {{ old('kardek_lpm') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                            </select>
                                            @error('kardek_lpm')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="lainnya_lpm" class="form-label fw-semibold">
                                                Lainnya
                                            </label>
                                            <select class="form-select @error('lainnya_lpm') is-invalid @enderror"
                                                id="lainnya_lpm" name="lainnya_lpm">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Ada" {{ old('lainnya_lpm') == 'Ada' ? 'selected' : '' }}>Ada
                                                </option>
                                                <option value="Tidak Ada"
                                                    {{ old('lainnya_lpm') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                                </option>
                                            </select>
                                            @error('lainnya_lpm')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="buku_administrasi_lembaga_lpm" class="form-label fw-semibold">
                                            Buku Administrasi Lembaga
                                        </label>
                                        <input type="text"
                                            class="form-control @error('buku_administrasi_lembaga_lpm') is-invalid @enderror"
                                            id="buku_administrasi_lembaga_lpm" name="buku_administrasi_lembaga_lpm"
                                            value="{{ old('buku_administrasi_lembaga_lpm') }}"
                                            placeholder="Masukkan jumlah">
                                        @error('buku_administrasi_lembaga_lpm')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="jumlah_meja_kursi_lpm" class="form-label fw-semibold">
                                            Jumlah Meja Kursi
                                        </label>
                                        <input type="text"
                                            class="form-control @error('jumlah_meja_kursi_lpm') is-invalid @enderror"
                                            id="jumlah_meja_kursi_lpm" name="jumlah_meja_kursi_lpm"
                                            value="{{ old('jumlah_meja_kursi_lpm') }}" placeholder="Masukkan jumlah">
                                        @error('jumlah_meja_kursi_lpm')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="buku_administrasi_lpm" class="form-label fw-semibold">
                                            Buku Administrasi
                                        </label>
                                        <input type="text"
                                            class="form-control @error('buku_administrasi_lpm') is-invalid @enderror"
                                            id="buku_administrasi_lpm" name="buku_administrasi_lpm"
                                            value="{{ old('buku_administrasi_lpm') }}" placeholder="Masukkan jumlah">
                                        @error('buku_administrasi_lpm')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jumlah_kegiatan_lpm" class="form-label fw-semibold">
                                            Jumlah Kegiatan
                                        </label>
                                        <input type="text"
                                            class="form-control @error('jumlah_kegiatan_lpm') is-invalid @enderror"
                                            id="jumlah_kegiatan_lpm" name="jumlah_kegiatan_lpm"
                                            value="{{ old('jumlah_kegiatan_lpm') }}" placeholder="Masukkan jumlah">
                                        @error('jumlah_kegiatan_lpm')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- PKK -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-female text-primary me-2"></i>
                            PKK
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="pkk" class="form-label fw-semibold">
                                        PKK
                                    </label>
                                    <select class="form-select @error('pkk') is-invalid @enderror" id="pkk"
                                        name="pkk">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('pkk') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada" {{ old('pkk') == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                            Ada</option>
                                    </select>
                                    @error('pkk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gedung_kantor_pkk" class="form-label fw-semibold">
                                        Gedung Kantor
                                    </label>
                                    <select class="form-select @error('gedung_kantor_pkk') is-invalid @enderror"
                                        id="gedung_kantor_pkk" name="gedung_kantor_pkk">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('gedung_kantor_pkk') == 'Ada' ? 'selected' : '' }}>
                                            Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('gedung_kantor_pkk') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('gedung_kantor_pkk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="peralatan_kantor_pkk" class="form-label fw-semibold">
                                        Peralatan Kantor
                                    </label>
                                    <select class="form-select @error('peralatan_kantor_pkk') is-invalid @enderror"
                                        id="peralatan_kantor_pkk" name="peralatan_kantor_pkk">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('peralatan_kantor_pkk') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('peralatan_kantor_pkk') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('peralatan_kantor_pkk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="kepengurusan_pkk" class="form-label fw-semibold">
                                        Kepengurusan
                                    </label>
                                    <select class="form-select @error('kepengurusan_pkk') is-invalid @enderror"
                                        id="kepengurusan_pkk" name="kepengurusan_pkk">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('kepengurusan_pkk') == 'Ada' ? 'selected' : '' }}>
                                            Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('kepengurusan_pkk') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('kepengurusan_pkk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="kegiatan_pkk" class="form-label fw-semibold">
                                        Kegiatan
                                    </label>
                                    <select class="form-select @error('kegiatan_pkk') is-invalid @enderror"
                                        id="kegiatan_pkk" name="kegiatan_pkk">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('kegiatan_pkk') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            {{ old('kegiatan_pkk') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
                                    @error('kegiatan_pkk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="buku_administrasi_pkk" class="form-label fw-semibold">
                                        Buku Administrasi
                                    </label>
                                    <input type="text"
                                        class="form-control @error('buku_administrasi_pkk') is-invalid @enderror"
                                        id="buku_administrasi_pkk" name="buku_administrasi_pkk"
                                        value="{{ old('buku_administrasi_pkk') }}" placeholder="Masukkan jumlah">
                                    @error('buku_administrasi_pkk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jumlah_kegiatan_pkk" class="form-label fw-semibold">
                                        Jumlah Kegiatan
                                    </label>
                                    <input type="text"
                                        class="form-control @error('jumlah_kegiatan_pkk') is-invalid @enderror"
                                        id="jumlah_kegiatan_pkk" name="jumlah_kegiatan_pkk"
                                        value="{{ old('jumlah_kegiatan_pkk') }}" placeholder="Masukkan jumlah">
                                    @error('jumlah_kegiatan_pkk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="kelengkapan_darmawisata_pkk" class="form-label fw-semibold">
                                        Kelengkapan Darmawisata
                                    </label>
                                    <select class="form-select @error('kelengkapan_darmawisata_pkk') is-invalid @enderror"
                                        id="kelengkapan_darmawisata_pkk" name="kelengkapan_darmawisata_pkk">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('kelengkapan_darmawisata_pkk') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            {{ old('kelengkapan_darmawisata_pkk') == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                            Ada</option>
                                    </select>
                                    @error('kelengkapan_darmawisata_pkk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kelengkapan_pokja_pkk" class="form-label fw-semibold">
                                        Kelengkapan Pokja
                                    </label>
                                    <select class="form-select @error('kelengkapan_pokja_pkk') is-invalid @enderror"
                                        id="kelengkapan_pokja_pkk" name="kelengkapan_pokja_pkk">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('kelengkapan_pokja_pkk') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('kelengkapan_pokja_pkk') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('kelengkapan_pokja_pkk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Karang Taruna -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-users text-primary me-2"></i>
                            Karang Taruna
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="karang_taruna" class="form-label fw-semibold">
                                        Karang Taruna
                                    </label>
                                    <select class="form-select @error('karang_taruna') is-invalid @enderror"
                                        id="karang_taruna" name="karang_taruna">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('karang_taruna') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            {{ old('karang_taruna') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
                                    @error('karang_taruna')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kepengurusan_karang" class="form-label fw-semibold">
                                        Kepengurusan
                                    </label>
                                    <select class="form-select @error('kepengurusan_karang') is-invalid @enderror"
                                        id="kepengurusan_karang" name="kepengurusan_karang">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('kepengurusan_karang') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('kepengurusan_karang') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('kepengurusan_karang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="buku_administrasi_karang" class="form-label fw-semibold">
                                        Buku Administrasi
                                    </label>
                                    <input type="text"
                                        class="form-control @error('buku_administrasi_karang') is-invalid @enderror"
                                        id="buku_administrasi_karang" name="buku_administrasi_karang"
                                        value="{{ old('buku_administrasi_karang') }}" placeholder="Masukkan jumlah">
                                    @error('buku_administrasi_karang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jumlah_kegiatan_karang" class="form-label fw-semibold">
                                        Jumlah Kegiatan
                                    </label>
                                    <input type="text"
                                        class="form-control @error('jumlah_kegiatan_karang') is-invalid @enderror"
                                        id="jumlah_kegiatan_karang" name="jumlah_kegiatan_karang"
                                        value="{{ old('jumlah_kegiatan_karang') }}" placeholder="Masukkan jumlah">
                                    @error('jumlah_kegiatan_karang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="lainnya_karang" class="form-label fw-semibold">
                                        Lainnya
                                    </label>
                                    <select class="form-select @error('lainnya_karang') is-invalid @enderror"
                                        id="lainnya_karang" name="lainnya_karang">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('lainnya_karang') == 'Ada' ? 'selected' : '' }}>Ada
                        </div>
                    </div>
                </div>

                <!-- Rukun Tangga -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-home text-primary me-2"></i>
                            Rukun Tangga
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="rukun_tangga" class="form-label fw-semibold">
                                        Rukun Tangga
                                    </label>
                                    <select class="form-select @error('rukun_tangga') is-invalid @enderror"
                                        id="rukun_tangga" name="rukun_tangga">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('rukun_tangga') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            {{ old('rukun_tangga') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
                                    @error('rukun_tangga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kepengurusan_rt" class="form-label fw-semibold">
                                        Kepengurusan
                                    </label>
                                    <select class="form-select @error('kepengurusan_rt') is-invalid @enderror"
                                        id="kepengurusan_rt" name="kepengurusan_rt">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('kepengurusan_rt') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            {{ old('kepengurusan_rt') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('kepengurusan_rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="buku_administrasi_rt" class="form-label fw-semibold">
                                        Buku Administrasi
                                    </label>
                                    <input type="text"
                                        class="form-control @error('buku_administrasi_rt') is-invalid @enderror"
                                        id="buku_administrasi_rt" name="buku_administrasi_rt"
                                        value="{{ old('buku_administrasi_rt') }}" placeholder="Masukkan jumlah">
                                    @error('buku_administrasi_rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="jumlah_kegiatan_rt" class="form-label fw-semibold">
                                        Jumlah Kegiatan
                                    </label>
                                    <input type="text"
                                        class="form-control @error('jumlah_kegiatan_rt') is-invalid @enderror"
                                        id="jumlah_kegiatan_rt" name="jumlah_kegiatan_rt"
                                        value="{{ old('jumlah_kegiatan_rt') }}" placeholder="Masukkan jumlah">
                                    @error('jumlah_kegiatan_rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rukun Warga -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-building text-primary me-2"></i>
                            Rukun Warga
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="rukun_warga" class="form-label fw-semibold">
                                        Rukun Warga
                                    </label>
                                    <select class="form-select @error('rukun_warga') is-invalid @enderror"
                                        id="rukun_warga" name="rukun_warga">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('rukun_warga') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            {{ old('rukun_warga') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
                                    @error('rukun_warga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="kepengurusan_rw" class="form-label fw-semibold">
                                        Kepengurusan
                                    </label>
                                    <select class="form-select @error('kepengurusan_rw') is-invalid @enderror"
                                        id="kepengurusan_rw" name="kepengurusan_rw">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('kepengurusan_rw') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            {{ old('kepengurusan_rw') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('kepengurusan_rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="buku_administrasi_rw" class="form-label fw-semibold">
                                        Buku Administrasi
                                    </label>
                                    <input type="text"
                                        class="form-control @error('buku_administrasi_rw') is-invalid @enderror"
                                        id="buku_administrasi_rw" name="buku_administrasi_rw"
                                        value="{{ old('buku_administrasi_rw') }}" placeholder="Masukkan jumlah">
                                    @error('buku_administrasi_rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jumlah_kegiatan_rw" class="form-label fw-semibold">
                                        Jumlah Kegiatan
                                    </label>
                                    <input type="text"
                                        class="form-control @error('jumlah_kegiatan_rw') is-invalid @enderror"
                                        id="jumlah_kegiatan_rw" name="jumlah_kegiatan_rw"
                                        value="{{ old('jumlah_kegiatan_rw') }}" placeholder="Masukkan jumlah">
                                    @error('jumlah_kegiatan_rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lainnya_rw" class="form-label fw-semibold">
                                        Lainnya
                                    </label>
                                    <select class="form-select @error('lainnya_rw') is-invalid @enderror" id="lainnya_rw"
                                        name="lainnya_rw">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('lainnya_rw') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            {{ old('lainnya_rw') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
                                    @error('lainnya_rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lembaga Adat -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-gavel text-primary me-2"></i>
                            Lembaga Adat
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lembaga_adat" class="form-label fw-semibold">
                                        Lembaga Adat
                                    </label>
                                    <select class="form-select @error('lembaga_adat') is-invalid @enderror"
                                        id="lembaga_adat" name="lembaga_adat">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('lembaga_adat') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            {{ old('lembaga_adat') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
                                    @error('lembaga_adat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gedung_kantor_adat" class="form-label fw-semibold">
                                        Gedung Kantor
                                    </label>
                                    <select class="form-select @error('gedung_kantor_adat') is-invalid @enderror"
                                        id="gedung_kantor_adat" name="gedung_kantor_adat">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('gedung_kantor_adat') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('gedung_kantor_adat') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('gedung_kantor_adat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="kepengurusan_adat" class="form-label fw-semibold">
                                        Kepengurusan
                                    </label>
                                    <select class="form-select @error('kepengurusan_adat') is-invalid @enderror"
                                        id="kepengurusan_adat" name="kepengurusan_adat">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('kepengurusan_adat') == 'Ada' ? 'selected' : '' }}>
                                            Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('kepengurusan_adat') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('kepengurusan_adat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="buku_administrasi_adat" class="form-label fw-semibold">
                                        Buku Administrasi
                                    </label>
                                    <input type="text"
                                        class="form-control @error('buku_administrasi_adat') is-invalid @enderror"
                                        id="buku_administrasi_adat" name="buku_administrasi_adat"
                                        value="{{ old('buku_administrasi_adat') }}" placeholder="Masukkan jumlah">
                                    @error('buku_administrasi_adat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jumlah_kegiatan_adat" class="form-label fw-semibold">
                                        Jumlah Kegiatan
                                    </label>
                                    <input type="text"
                                        class="form-control @error('jumlah_kegiatan_adat') is-invalid @enderror"
                                        id="jumlah_kegiatan_adat" name="jumlah_kegiatan_adat"
                                        value="{{ old('jumlah_kegiatan_adat') }}" placeholder="Masukkan jumlah">
                                    @error('jumlah_kegiatan_adat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUMDes -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-store text-primary me-2"></i>
                            BUMDes
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="bumdes" class="form-label fw-semibold">
                                        BUMDes
                                    </label>
                                    <select class="form-select @error('bumdes') is-invalid @enderror" id="bumdes"
                                        name="bumdes">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada" {{ old('bumdes') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada" {{ old('bumdes') == 'Tidak Ada' ? 'selected' : '' }}>
                                    @error('bumdes')
                                    </select>
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gedung_kantor_bumdes" class="form-label fw-semibold">
                                        Gedung Kantor
                                    </label>
                                    <select class="form-select @error('gedung_kantor_bumdes') is-invalid @enderror"
                                        id="gedung_kantor_bumdes" name="gedung_kantor_bumdes">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('gedung_kantor_bumdes') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('gedung_kantor_bumdes') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('gedung_kantor_bumdes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="kepengurusan_bumdes" class="form-label fw-semibold">
                                        Kepengurusan
                                    </label>
                                    <select class="form-select @error('kepengurusan_bumdes') is-invalid @enderror"
                                        id="kepengurusan_bumdes" name="kepengurusan_bumdes">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('kepengurusan_bumdes') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('kepengurusan_bumdes') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('kepengurusan_bumdes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="buku_administrasi_bumdes" class="form-label fw-semibold">
                                        Buku Administrasi
                                    </label>
                                    <input type="text"
                                        class="form-control @error('buku_administrasi_bumdes') is-invalid @enderror"
                                        id="buku_administrasi_bumdes" name="buku_administrasi_bumdes"
                                        value="{{ old('buku_administrasi_bumdes') }}" placeholder="Masukkan jumlah">
                                    @error('buku_administrasi_bumdes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jumlah_kegiatan_bumdes" class="form-label fw-semibold">
                                        Jumlah Kegiatan
                                    </label>
                                    <input type="text"
                                        class="form-control @error('jumlah_kegiatan_bumdes') is-invalid @enderror"
                                        id="jumlah_kegiatan_bumdes" name="jumlah_kegiatan_bumdes"
                                        value="{{ old('jumlah_kegiatan_bumdes') }}" placeholder="Masukkan jumlah">
                                    @error('jumlah_kegiatan_bumdes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Forum Komunikasi Kader Pemberdayaan Masyarakat -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-users-cog text-primary me-2"></i>
                            Forum Komunikasi Kader Pemberdayaan Masyarakat
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="forum_komunikasi_kader" class="form-label fw-semibold">
                                        Forum Komunikasi Kader
                                    </label>
                                    <select class="form-select @error('forum_komunikasi_kader') is-invalid @enderror"
                                        id="forum_komunikasi_kader" name="forum_komunikasi_kader">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('forum_komunikasi_kader') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('forum_komunikasi_kader') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('forum_komunikasi_kader')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gedung_kantor_forum" class="form-label fw-semibold">
                                        Gedung Kantor
                                    </label>
                                    <select class="form-select @error('gedung_kantor_forum') is-invalid @enderror"
                                        id="gedung_kantor_forum" name="gedung_kantor_forum">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('gedung_kantor_forum') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('gedung_kantor_forum') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('gedung_kantor_forum')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="kepengurusan_forum" class="form-label fw-semibold">
                                        Kepengurusan
                                    </label>
                                    <select class="form-select @error('kepengurusan_forum') is-invalid @enderror"
                                        id="kepengurusan_forum" name="kepengurusan_forum">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('kepengurusan_forum') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('kepengurusan_forum') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('kepengurusan_forum')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="buku_administrasi_forum" class="form-label fw-semibold">
                                        Buku Administrasi
                                    </label>
                                    <input type="text"
                                        class="form-control @error('buku_administrasi_forum') is-invalid @enderror"
                                        id="buku_administrasi_forum" name="buku_administrasi_forum"
                                        value="{{ old('buku_administrasi_forum') }}" placeholder="Masukkan jumlah">
                                    @error('buku_administrasi_forum')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jumlah_kegiatan_forum" class="form-label fw-semibold">
                                        Jumlah Kegiatan
                                    </label>
                                    <input type="text"
                                        class="form-control @error('jumlah_kegiatan_forum') is-invalid @enderror"
                                        id="jumlah_kegiatan_forum" name="jumlah_kegiatan_forum"
                                        value="{{ old('jumlah_kegiatan_forum') }}" placeholder="Masukkan jumlah">
                                    @error('jumlah_kegiatan_forum')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lainnya_forum" class="form-label fw-semibold">
                                        Lainnya
                                    </label>
                                    <select class="form-select @error('lainnya_forum') is-invalid @enderror"
                                        id="lainnya_forum" name="lainnya_forum">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('lainnya_forum') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('lainnya_forum') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada
                                        </option>
                                    </select>
                                    @error('lainnya_forum')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lain-lain -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-plus text-primary me-2"></i>
                            Lain-lain
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gedung_kantor_sosial_lain" class="form-label fw-semibold">
                                        Gedung Kantor Sosial Lain
                                    </label>
                                    <select class="form-select @error('gedung_kantor_sosial_lain') is-invalid @enderror"
                                        id="gedung_kantor_sosial_lain" name="gedung_kantor_sosial_lain">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('gedung_kantor_sosial_lain') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada"
                                            {{ old('gedung_kantor_sosial_lain') == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                            Ada</option>
                                    </select>
                                    @error('gedung_kantor_sosial_lain')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gedung_kantor_profesi_lain" class="form-label fw-semibold">
                                        Gedung Kantor Profesi Lain
                                    </label>
                                    <select class="form-select @error('gedung_kantor_profesi_lain') is-invalid @enderror"
                                        id="gedung_kantor_profesi_lain" name="gedung_kantor_profesi_lain">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Ada"
                                            {{ old('gedung_kantor_profesi_lain') == 'Ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            {{ old('gedung_kantor_profesi_lain') == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                            Ada</option>
                                    </select>
                                    @error('gedung_kantor_profesi_lain')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                                <a href="{{ route('potensi.potensi-prasarana-dan-sarana.kemasyarakatan.index') }}"
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

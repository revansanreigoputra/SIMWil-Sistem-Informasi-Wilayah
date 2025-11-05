@extends('layouts.master')

@section('title', 'Tambah Data Partisipasi Politik')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Partisipasi Politik
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.kedaulatanmasyarakat.politik.store') }}" method="POST">
            @csrf

            {{-- Bagian Umum --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- 1. Partai Politik dan Pemilihan Umum --}}
            <hr class="my-4">
            <h5 class="text-primary mb-3">1. Partai Politik dan Pemilihan Umum</h5>
            <div class="row">
                @php
                    $fields = [
                        'jumlah_penduduk_memiliki_hak_pilih' => 'Jumlah Penduduk Memiliki Hak Pilih',
                        'jumlah_pengguna_hak_pilih_pemilu_legislatif' => 'Jumlah Pengguna Hak Pilih (Pemilu Legislatif)',
                        'jumlah_perempuan_aktif_partai_politik' => 'Jumlah Perempuan Aktif di Partai Politik',
                        'jumlah_partai_politik_memiliki_pengurus' => 'Jumlah Partai Politik yang Memiliki Pengurus',
                        'jumlah_partai_politik_memiliki_kantor' => 'Jumlah Partai Politik yang Memiliki Kantor',
                        'jumlah_penduduk_pengurus_partai' => 'Jumlah Penduduk Pengurus Partai',
                        'jumlah_penduduk_dipilih_legislatif' => 'Jumlah Penduduk yang Terpilih Legislatif',
                        'jumlah_pengguna_hak_pilih_presiden' => 'Jumlah Pengguna Hak Pilih Presiden'
                    ];
                @endphp
                @foreach ($fields as $name => $label)
                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ $label }} <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="{{ $name }}" name="{{ $name }}" placeholder="Masukkan {{ strtolower($label) }}"required>
                    </div>
                @endforeach
            </div>

            {{-- 2. Pilkada --}}
            <hr class="my-4">
            <h5 class="text-primary mb-3">2. Pemilihan Kepala Daerah (Pilkada)</h5>
            <div class="row">
                @php
                    $pilkada = [
                        'jumlah_penduduk_memiliki_hak_pilih_pilkada' => 'Jumlah Penduduk Memiliki Hak Pilih Pilkada',
                        'jumlah_pengguna_hak_pilih_bupati' => 'Jumlah Pengguna Hak Pilih Bupati',
                        'jumlah_pengguna_hak_pilih_gubernur' => 'Jumlah Pengguna Hak Pilih Gubernur'
                    ];
                @endphp
                @foreach ($pilkada as $name => $label)
                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ $label }} <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="{{ $name }}" placeholder="Masukkan {{ strtolower($label) }}"required>
                    </div>
                @endforeach
            </div>

            {{-- 3. Penentuan Kepala Desa, Sekdes, Lurah --}}
            <hr class="my-4">
                <h5 class="text-primary mb-3">3. Penentuan Kepala Desa / Sekdes / Perangkat / Lurah</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label for="penentuan_kepala_desa_id" class="form-label">Penentuan Jabatan Kepala Desa <span class="text-danger">*</span></label>
                                <select name="penentuan_kepala_desa_id" id="penentuan_kepala_desa_id" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($penentuankepaladesa as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label for="penentuan_sekretaris_desa_id" class="form-label">Penentuan Sekretaris Desa <span class="text-danger">*</span></label>
                                <select name="penentuan_sekretaris_desa_id" id="penentuan_sekretaris_desa_id" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($penentuansekretarisdesa as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label for="penentuan_perangkat_desa_id" class="form-label">Penentuan Perangkat Desa <span class="text-danger">*</span></label>
                                <select name="penentuan_perangkat_desa_id" id="penentuan_perangkat_desa_id" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($penentuanperangkatdesa as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label for="penentuan_lurah_id" class="form-label">Penentuan Lurah <span class="text-danger">*</span></label>
                                <select name="penentuan_lurah_id" id="penentuan_lurah_id" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($penentuanlurah as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Masa Jabatan Kepala Desa (Tahun) <span class="text-danger">*</span></label>
                        <input type="number" name="masa_jabatan_kepala_desa" class="form-control" placeholder="Masukkan masa jabatan"required>
                    </div>
                </div>

            {{-- 4. BPD --}}
            <hr class="my-4">
            <h5 class="text-primary mb-3">4. Badan Permusyawaratan Desa (BPD)</h5>
            <div class="row g-3">
                {{-- Baris 1: Jumlah Anggota + Jumlah Peraturan Desa --}}
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jumlah Anggota BPD <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="jumlah_anggota_bpd" placeholder="Masukkan jumlah anggota BPD"required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jumlah Peraturan Desa <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="peraturan_desa" placeholder="Masukkan jumlah peraturan desa"required>
                </div>

                {{-- Baris 2: Penentuan Anggota + Pimpinan BPD --}}
                <div class="col-md-6">
                    <label for="penentuan_anggota_bpd_id" class="form-label">Penentuan Anggota BPD <span class="text-danger">*</span></label>
                    <select name="penentuan_anggota_bpd_id" id="penentuan_anggota_bpd_id" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        @foreach ($penentuananggotabpd as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="penentuan_ketua_bpd_id" class="form-label">Penentuan Ketua BPD <span class="text-danger">*</span></label>
                    <select name="penentuan_ketua_bpd_id" id="penentuan_ketua_bpd_id" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        @foreach ($penentuanketuabpd as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Baris 3: Kantor + Anggaran BPD --}}
                <div class="col-md-6">
                    <label class="form-label fw-bold">Kantor BPD <span class="text-danger">*</span></label>
                    @foreach (['Ada','Tidak Ada'] as $option)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="kantor_bpd" value="{{ $option }}"required>
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Anggaran BPD <span class="text-danger">*</span></label>
                    @foreach (['Ada','Tidak Ada'] as $option)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="anggaran_bpd" value="{{ $option }}"required>
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>

                {{-- Baris 4 dst: Input angka untuk BPD --}}
                @php
                    $bpd = [
                        'permintaan_keterangan_kepala_desa' => 'Permintaan Keterangan Kepala Desa',
                        'rancangan_perdes' => 'Rancangan Perdes',
                        'menyalurkan_aspirasi' => 'Menyalurkan Aspirasi',
                        'menyatakan_pendapat' => 'Menyatakan Pendapat',
                        'menyampaikan_usul' => 'Menyampaikan Usul',
                        'mengevaluasi_apb_desa' => 'Mengevaluasi APB Desa'
                    ];
                @endphp
                @foreach ($bpd as $name => $label)
                    <div class="col-md-6">
                        <label class="form-label">{{ $label }} <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="{{ $name }}" placeholder="Masukkan {{ strtolower($label) }}"required>
                    </div>
                @endforeach
            </div>

        {{-- 5. LKD/LKK --}}
            <hr class="my-4">
            <h5 class="text-primary mb-3">5. Lembaga Kemasyarakatan Desa / Lurah (LKD/LKK)</h5>
            <div class="row g-3">
                {{-- Baris 1 --}}
                <div class="col-md-6">
                    <label class="form-label fw-bold">Keberadaan Organisasi LKD <span class="text-danger">*</span></label>
                    @foreach (['Ada','Tidak Ada'] as $option)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="keberadaan_organisasi_lkd" value="{{ $option }}"required>
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Status LKD <span class="text-danger">*</span></label>
                    @foreach (['Aktif','Pasif'] as $option)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="status_lkd" value="{{ $option }}"required>
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>

                {{-- Baris 2 --}}
                <div class="col-md-6">
                    <label class="form-label fw-bold">Dasar Hukum Organisasi LKD <span class="text-danger">*</span></label>
                    @foreach (['peraturan_desa','keputusan_kepala_desa','keputusan_camat','belum_diatur'] as $option)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="dasar_hukum_organisasi_lkd" value="{{ $option }}"required>
                            <label class="form-check-label">{{ ucwords(str_replace('_',' ', $option)) }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Dasar Hukum Pembentukan LKK Kelurahan <span class="text-danger">*</span></label>
                    @foreach (['keputusan_lurah','keputusan_camat','belum_diatur'] as $option)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="dasar_hukum_pembentukan_lkd_kelurahan" value="{{ $option }}"required>
                            <label class="form-check-label">{{ ucwords(str_replace('_',' ', $option)) }}</label>
                        </div>
                    @endforeach
                </div>
                

                {{-- Baris 3 --}}
                <div class="col-md-6">
                    <label for="pengurus_lkd_id" class="form-label">Pengurus LKD <span class="text-danger">*</span></label>
                    <select name="pengurus_lkd_id" id="pengurus_lkd_id" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        @foreach ($penguruslkd as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pengurus_lkk_id" class="form-label">Pengurus LKK <span class="text-danger">*</span></label>
                    <select name="pengurus_lkk_id" id="pengurus_lkk_id" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        @foreach ($penguruslkk as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Baris 4 dst: Sisa Radio LKD --}}
                @php
                    $lkdRadios = [
                        'fungsi_tugas_lkd' => ['Aktif','Pasif'],
                        'alokasi_anggaran_lkd' => ['Ada','Tidak Ada'],
                        'alokasi_anggaran_organisasi' => ['Ada','Tidak Ada'],
                        'kantor_lkd' => ['Ada','Tidak Ada'],
                        'dukungan_pembiayaan' => ['Memadai','Kurang Memadai'],
                        'keberadaan_alat_kelengkapan' => ['Ada','Tidak Ada'],
                        'kegiatan_administrasi' => ['Berfungsi','Tidak Berfungsi'],
                    ];
                @endphp

                @foreach ($lkdRadios as $name => $options)
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-capitalize">{{ str_replace('_',' ', $name) }}<span class="text-danger">*</span></label>
                        @foreach ($options as $option)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="{{ $name }}" value="{{ $option }}"required>
                                <label class="form-check-label">{{ ucwords(str_replace('_',' ', $option)) }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                {{-- Input Angka Tambahan --}}
                @php
                    $lkdInputs = [
                        'jumlah_organisasi_lkd_desa' => 'Jumlah Organisasi LKD di Desa',
                        'jumlah_organisasi_lkd_kelurahan' => 'Jumlah Organisasi LKD di Kelurahan',
                        'jumlah_kegiatan_lkd' => 'Jumlah Kegiatan LKD',
                        'jumlah_kegiatan_organisasi_lkd' => 'Jumlah Kegiatan Organisasi LKD',
                        'realisasi_program_kerja' => 'Realisasi Program Kerja'
                    ];
                @endphp
                @foreach ($lkdInputs as $name => $label)
                    <div class="col-md-6">
                        <label class="form-label">{{ $label }} <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="{{ $name }}" placeholder="Masukkan {{ strtolower($label) }}"required>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.politik.index') }}"
                        class="btn btn-outline-secondary rounded">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Edit Data Partisipasi Politik')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Partisipasi Politik
        </h5>
    </div>

    <div class="card-body">
        <form id="form-politik" action="{{ route('perkembangan.kedaulatanmasyarakat.politik.update', $politik->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Bagian Umum --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                        id="tanggal" name="tanggal"
                        value="{{ old('tanggal', $politik->tanggal ? \Carbon\Carbon::parse($politik->tanggal)->format('Y-m-d') : '') }}"
                        required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                        <label class="form-label">{{ $label }}</label>
                        <input type="number" class="form-control" name="{{ $name }}"
                               value="{{ old($name, $politik->$name) }}"
                               placeholder="Masukkan {{ strtolower($label) }}">
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
                        <label class="form-label">{{ $label }}</label>
                        <input type="number" class="form-control" name="{{ $name }}"
                               value="{{ old($name, $politik->$name) }}"
                               placeholder="Masukkan {{ strtolower($label) }}">
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
                                <label for="penentuan_kepala_desa_id" class="form-label">
                                    Penentuan Jabatan Kepala Desa <span class="text-danger">*</span>
                                </label>
                                <select name="penentuan_kepala_desa_id" id="penentuan_kepala_desa_id" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($penentuankepaladesa as $item)
                                        <option value="{{ $item->id }}" {{ old('penentuan_kepala_desa_id', $politik->penentuan_kepala_desa_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label for="penentuan_sekretaris_desa_id" class="form-label">
                                    Penentuan Sekretaris Desa <span class="text-danger">*</span>
                                </label>
                                <select name="penentuan_sekretaris_desa_id" id="penentuan_sekretaris_desa_id" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($penentuansekretarisdesa as $item)
                                        <option value="{{ $item->id }}" {{ old('penentuan_sekretaris_desa_id', $politik->penentuan_sekretaris_desa_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label for="penentuan_perangkat_desa_id" class="form-label">
                                    Penentuan Perangkat Desa <span class="text-danger">*</span>
                                </label>
                                <select name="penentuan_perangkat_desa_id" id="penentuan_perangkat_desa_id" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($penentuanperangkatdesa as $item)
                                        <option value="{{ $item->id }}" {{ old('penentuan_perangkat_desa_id', $politik->penentuan_perangkat_desa_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label for="penentuan_lurah_id" class="form-label">
                                    Penentuan Lurah <span class="text-danger">*</span>
                                </label>
                                <select name="penentuan_lurah_id" id="penentuan_lurah_id" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($penentuanlurah as $item)
                                        <option value="{{ $item->id }}" {{ old('penentuan_lurah_id', $politik->penentuan_lurah_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <label class="form-label fw-bold">Masa Jabatan Kepala Desa (Tahun)</label>
                    <input type="number" name="masa_jabatan_kepala_desa"
                           class="form-control" value="{{ old('masa_jabatan_kepala_desa', $politik->masa_jabatan_kepala_desa) }}"
                           placeholder="Masukkan masa jabatan">
                </div>
            </div>

            {{-- 4. BPD --}}
            <hr class="my-4">
            <h5 class="text-primary mb-3">4. Badan Permusyawaratan Desa (BPD)</h5>
            <div class="row g-3">
                {{-- Jumlah Anggota + Peraturan Desa --}}
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jumlah Anggota BPD</label>
                    <input type="number" class="form-control" name="jumlah_anggota_bpd"
                           value="{{ old('jumlah_anggota_bpd', $politik->jumlah_anggota_bpd) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jumlah Peraturan Desa</label>
                    <input type="number" class="form-control" name="peraturan_desa"
                           value="{{ old('peraturan_desa', $politik->peraturan_desa) }}">
                </div>

                {{-- Radio BPD --}}
                <div class="row g-3">
                {{-- Penentuan Anggota BPD --}}
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <label for="penentuan_anggota_bpd_id" class="form-label">Penentuan Anggota BPD <span class="text-danger">*</span></label>
                            <select name="penentuan_anggota_bpd_id" id="penentuan_anggota_bpd_id" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($penentuananggotabpd as $item)
                                    <option value="{{ $item->id }}" {{ old('penentuan_anggota_bpd_id', $politik->penentuan_anggota_bpd_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                    {{-- Penentuan Ketua BPD --}}
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label for="penentuan_ketua_bpd_id" class="form-label">Penentuan Ketua BPD <span class="text-danger">*</span></label>
                                <select name="penentuan_ketua_bpd_id" id="penentuan_ketua_bpd_id" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($penentuanketuabpd as $item)
                                        <option value="{{ $item->id }}" {{ old('penentuan_ketua_bpd_id', $politik->penentuan_ketua_bpd_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Kantor BPD --}}
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label class="form-label fw-bold">Kantor BPD <span class="text-danger">*</span></label>
                                @foreach (['Ada','Tidak Ada'] as $option)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="kantor_bpd" value="{{ $option }}"
                                            {{ old('kantor_bpd', $politik->kantor_bpd) == $option ? 'checked' : '' }} required>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Anggaran BPD --}}
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label class="form-label fw-bold">Anggaran BPD <span class="text-danger">*</span></label>
                                @foreach (['Ada','Tidak Ada'] as $option)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="anggaran_bpd" value="{{ $option }}"
                                            {{ old('anggaran_bpd', $politik->anggaran_bpd) == $option ? 'checked' : '' }} required>
                                        <label class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Input Angka Lainnya --}}
                @php
                    $bpdInputs = [
                        'permintaan_keterangan_kepala_desa','rancangan_perdes',
                        'menyalurkan_aspirasi','menyatakan_pendapat',
                        'menyampaikan_usul','mengevaluasi_apb_desa'
                    ];
                @endphp
                @foreach ($bpdInputs as $name)
                    <div class="col-md-6">
                        <label class="form-label text-capitalize">{{ str_replace('_',' ', $name) }}</label>
                        <input type="number" class="form-control" name="{{ $name }}"
                               value="{{ old($name, $politik->$name) }}">
                    </div>
                @endforeach
            </div>

            {{-- 5. LKD/LKK --}}
            <hr class="my-4">
            <h5 class="text-primary mb-3">5. Lembaga Kemasyarakatan Desa / Lurah (LKD/LKK)</h5>
            <div class="row g-3">
                {{-- Dropdown Pengurus LKD --}}
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <label for="pengurus_lkd_id" class="form-label">Pengurus LKD <span class="text-danger">*</span></label>
                            <select name="pengurus_lkd_id" id="pengurus_lkd_id" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($penguruslkd as $item)
                                    <option value="{{ $item->id }}" {{ old('pengurus_lkd_id', $politik->pengurus_lkd_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Dropdown Pengurus LKK --}}
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <label for="pengurus_lkk_id" class="form-label">Pengurus LKK <span class="text-danger">*</span></label>
                            <select name="pengurus_lkk_id" id="pengurus_lkk_id" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($penguruslkk as $item)
                                    <option value="{{ $item->id }}" {{ old('pengurus_lkk_id', $politik->pengurus_lkk_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{-- Dropdown Hukum LKD --}}
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <label for="hukum_lkds_id" class="form-label">Dasar Hukum LKD <span class="text-danger">*</span></label>
                            <select name="hukum_lkds_id" id="hukum_lkds_id" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($hukumlkd as $item)
                                    <option value="{{ $item->id }}" {{ old('hukum_lkds_id', $politik->hukum_lkds_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{-- Dropdown Hukum LKK --}}
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <label for="hukum_lkks_id" class="form-label">Dasar Hukum LKK <span class="text-danger">*</span></label>
                            <select name="hukum_lkks_id" id="hukum_lkks_id" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($hukumlkk as $item)
                                    <option value="{{ $item->id }}" {{ old('hukum_lkks_id', $politik->hukum_lkks_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Sisa Radio LKD --}}
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
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label class="form-label fw-bold text-capitalize">{{ str_replace('_',' ', $name) }} <span class="text-danger">*</span></label>
                                @foreach ($options as $option)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="{{ $name }}" value="{{ $option }}"
                                            {{ old($name, $politik->$name) == $option ? 'checked' : '' }} required>
                                        <label class="form-check-label">{{ ucwords(str_replace('_',' ', $option)) }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Input Angka --}}
            <div class="row">
                @php
                    $lkdInputs = [
                        'jumlah_organisasi_lkd_desa' => 'Jumlah Organisasi LKD di Desa',
                        'jumlah_organisasi_lkd_kelurahan' => 'Jumlah Organisasi LKD di Kelurahan',
                        'jumlah_kegiatan_lkd' => 'Jumlah Kegiatan LKD',
                        'jumlah_kegiatan_organisasi_lkd' => 'Jumlah Kegiatan Organisasi LKD',
                        'realisasi_program_kerja' => 'Realisasi Program Kerja',
                    ];
                @endphp

                @foreach ($lkdInputs as $name => $label)
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">{{ $label }} <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="{{ $name }}"
                            value="{{ old($name, $politik->$name) }}"
                            placeholder="Masukkan {{ strtolower($label) }}" required>
                    </div>
                @endforeach
            </div>


            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Perbarui Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- VALIDASI JAVASCRIPT --}}
<script>
document.getElementById('form-politik').addEventListener('submit', function(e) {
    const hakPilih = parseInt(document.getElementById('jumlah_penduduk_memiliki_hak_pilih')?.value || 0);
    const penggunaLegis = parseInt(document.getElementById('jumlah_pengguna_hak_pilih_pemilu_legislatif')?.value || 0);
    const penggunaPresiden = parseInt(document.getElementById('jumlah_pengguna_hak_pilih_presiden')?.value || 0);
    const hakPilihPilkada = parseInt(document.getElementById('jumlah_penduduk_memiliki_hak_pilih_pilkada')?.value || 0);
    const penggunaBupati = parseInt(document.getElementById('jumlah_pengguna_hak_pilih_bupati')?.value || 0);
    const penggunaGubernur = parseInt(document.getElementById('jumlah_pengguna_hak_pilih_gubernur')?.value || 0);

    // Validasi untuk Pemilu Legislatif & Presiden
    if (penggunaLegis > hakPilih) {
        alert('Jumlah pengguna hak pilih (Pemilu Legislatif) tidak boleh lebih dari jumlah penduduk memiliki hak pilih!');
        e.preventDefault();
        return false;
    }
    if (penggunaPresiden > hakPilih) {
        alert('Jumlah pengguna hak pilih Presiden tidak boleh lebih dari jumlah penduduk memiliki hak pilih!');
        e.preventDefault();
        return false;
    }

    // Validasi untuk Pilkada
    if (penggunaBupati > hakPilihPilkada) {
        alert('Jumlah pengguna hak pilih Bupati tidak boleh lebih dari jumlah penduduk memiliki hak pilih Pilkada!');
        e.preventDefault();
        return false;
    }
    if (penggunaGubernur > hakPilihPilkada) {
        alert('Jumlah pengguna hak pilih Gubernur tidak boleh lebih dari jumlah penduduk memiliki hak pilih Pilkada!');
        e.preventDefault();
        return false;
    }
});
</script>
@endsection

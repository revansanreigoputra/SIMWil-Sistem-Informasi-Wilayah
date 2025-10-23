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
                           id="tanggal" name="tanggal" value="{{ old('tanggal', $politik->tanggal) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="id_desa" class="form-label fw-semibold">
                        <i class="fas fa-map-marker-alt me-1"></i> Desa <span class="text-danger">*</span>
                    </label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('id_desa', $politik->id_desa) == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
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
                @php
                    $radioGroups = [
                        'penentuan_jabatan_kepala_desa' => ['dipilih_rakyat_langsung','ditunjuk_bupati_walikota','turun_temurun'],
                        'penentuan_sekretaris_desa' => ['diangkat_kepala_desa','diangkat_bupati_walikota','diangkat_kepala_desa_disahkan_bupati'],
                        'penentuan_perangkat_desa' => ['diangkat_kepala_desa_ditetapkan_camat','diangkat_dan_ditetapkan_kepala_desa'],
                        'penentuan_jabatan_lurah' => ['diangkat_bupati_walikota','dipilih_rakyat_langsung']
                    ];
                @endphp

                @foreach ($radioGroups as $name => $options)
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <label class="form-label fw-bold text-capitalize">{{ str_replace('_', ' ', $name) }}</label>
                                @foreach ($options as $option)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio"
                                               name="{{ $name }}" value="{{ $option }}"
                                               {{ old($name, $politik->$name) == $option ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ ucwords(str_replace('_',' ', $option)) }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

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
                @php
                    $bpdRadios = [
                        'penentuan_anggota_bpd' => ['dipilih_rakyat_langsung','dipilih_musyawarah_masyarakat','diangkat_kepala_desa','diangkat_camat'],
                        'pimpinan_bpd' => ['dipilih_anggota_bpd','ditunjuk_kepala_desa','ditunjuk_camat','dipilih_rakyat_langsung'],
                        'kantor_bpd' => ['Ada','Tidak Ada'],
                        'anggaran_bpd' => ['Ada','Tidak Ada']
                    ];
                @endphp
                @foreach ($bpdRadios as $name => $options)
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-capitalize">{{ str_replace('_',' ', $name) }}</label>
                        @foreach ($options as $option)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="{{ $name }}" value="{{ $option }}"
                                       {{ old($name, $politik->$name) == $option ? 'checked' : '' }}>
                                <label class="form-check-label">{{ ucwords(str_replace('_',' ', $option)) }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach

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
                @php
                    $lkdRadios = [
                        'keberadaan_organisasi_lkd' => ['Ada','Tidak Ada'],
                        'status_lkd' => ['Aktif','Pasif'],
                        'dasar_hukum_organisasi_lkd' => ['peraturan_desa','keputusan_kepala_desa','keputusan_camat','belum_diatur'],
                        'pemilihan_pengurus_organisasi_lkd' => ['dipilih_rakyat_langsung','diangkat_ketua_lkd_lkk','diangkat_kepala_desa','diangkat_camat'],
                        'dasar_hukum_pembentukan_lkd_kelurahan' => ['keputusan_lurah','keputusan_camat','belum_diatur'],
                        'pemilihan_pengurus_lkd' => ['dipilih_rakyat_langsung','diangkat_kepala_desa','diangkat_camat'],
                        'fungsi_tugas_lkd' => ['Aktif','Pasif'],
                        'alokasi_anggaran_lkd' => ['Ada','Tidak Ada'],
                        'alokasi_anggaran_organisasi' => ['Ada','Tidak Ada'],
                        'kantor_lkd' => ['Ada','Tidak Ada'],
                        'dukungan_pembiayaan' => ['Memadai','Kurang Memadai'],
                        'keberadaan_alat_kelengkapan' => ['Ada','Tidak Ada'],
                        'kegiatan_administrasi' => ['Berfungsi','Tidak Berfungsi']
                    ];
                @endphp
                @foreach ($lkdRadios as $name => $options)
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-capitalize">{{ str_replace('_',' ', $name) }}</label>
                        @foreach ($options as $option)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="{{ $name }}" value="{{ $option }}"
                                       {{ old($name, $politik->$name) == $option ? 'checked' : '' }}>
                                <label class="form-check-label">{{ ucwords(str_replace('_',' ', $option)) }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach

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
                        <label class="form-label">{{ $label }}</label>
                        <input type="number" class="form-control" name="{{ $name }}"
                               value="{{ old($name, $politik->$name) }}"
                               placeholder="Masukkan {{ strtolower($label) }}">
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

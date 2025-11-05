@extends('layouts.master')

@section('title', 'Detail Data Partisipasi Politik')

@section('action')
    <a href="{{ route('perkembangan.kedaulatanmasyarakat.politik.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="container">

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Informasi Umum -->
            <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
            <table class="table table-borderless align-middle mb-4">
                <colgroup>
                    <col style="width: 35%;">
                    <col style="width: 5%;">
                    <col style="width: 60%;">
                </colgroup>
                <tr>
                    <td><strong>Tanggal</strong></td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($politik->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Desa</strong></td>
                    <td>:</td>
                    <td>{{ $politik->desa->nama_desa ?? '-' }}</td>
                </tr>

            </table>

            <!-- Partai Politik dan Pemilihan Umum -->
            <h5 class="fw-bold text-primary mt-4 mb-2">Partai Politik dan Pemilihan Umum</h5>
            <table class="table table-borderless align-middle mb-4">
                <colgroup>
                    <col style="width: 35%;">
                    <col style="width: 5%;">
                    <col style="width: 60%;">
                </colgroup>
                <tr><td>Jumlah Penduduk Memiliki Hak Pilih</td><td>:</td><td>{{ $politik->jumlah_penduduk_memiliki_hak_pilih ?? '-' }}</td></tr>
                <tr><td>Jumlah Pengguna Hak Pilih Pemilu Legislatif</td><td>:</td><td>{{ $politik->jumlah_pengguna_hak_pilih_pemilu_legislatif ?? '-' }}</td></tr>
                <tr><td>Jumlah Perempuan Aktif Partai Politik</td><td>:</td><td>{{ $politik->jumlah_perempuan_aktif_partai_politik ?? '-' }}</td></tr>
                <tr><td>Jumlah Partai Politik Memiliki Pengurus</td><td>:</td><td>{{ $politik->jumlah_partai_politik_memiliki_pengurus ?? '-' }}</td></tr>
                <tr><td>Jumlah Partai Politik Memiliki Kantor</td><td>:</td><td>{{ $politik->jumlah_partai_politik_memiliki_kantor ?? '-' }}</td></tr>
                <tr><td>Jumlah Penduduk Pengurus Partai</td><td>:</td><td>{{ $politik->jumlah_penduduk_pengurus_partai ?? '-' }}</td></tr>
                <tr><td>Jumlah Penduduk Dipilih Legislatif</td><td>:</td><td>{{ $politik->jumlah_penduduk_dipilih_legislatif ?? '-' }}</td></tr>
                <tr><td>Jumlah Pengguna Hak Pilih Presiden</td><td>:</td><td>{{ $politik->jumlah_pengguna_hak_pilih_presiden ?? '-' }}</td></tr>
            </table>

            <!-- Pemilihan Kepala Daerah -->
            <h5 class="fw-bold text-primary mt-4 mb-2">Pemilihan Kepala Daerah</h5>
            <table class="table table-borderless align-middle mb-4">
                <colgroup>
                    <col style="width: 35%;">
                    <col style="width: 5%;">
                    <col style="width: 60%;">
                </colgroup>
                <tr><td>Jumlah Penduduk Memiliki Hak Pilih Pilkada</td><td>:</td><td>{{ $politik->jumlah_penduduk_memiliki_hak_pilih_pilkada ?? '-' }}</td></tr>
                <tr><td>Jumlah Pengguna Hak Pilih Bupati</td><td>:</td><td>{{ $politik->jumlah_pengguna_hak_pilih_bupati ?? '-' }}</td></tr>
                <tr><td>Jumlah Pengguna Hak Pilih Gubernur</td><td>:</td><td>{{ $politik->jumlah_pengguna_hak_pilih_gubernur ?? '-' }}</td></tr>
            </table>

            <!-- Penentuan Kepala Desa dan Perangkat -->
            <h5 class="fw-bold text-primary mt-4 mb-2">Penentuan Kepala Desa/Lurah dan Perangkat</h5>
            <table class="table table-borderless align-middle mb-4">
                <colgroup>
                    <col style="width: 35%;">
                    <col style="width: 5%;">
                    <col style="width: 60%;">
                </colgroup>
                <tr><td>Penentuan Jabatan Kepala Desa</td><td>:</td><td>{{ $politik->PenentuanKepalaDesa?->nama ?? '-' }}</td>
                <tr><td>Penentuan Sekretaris Desa</td><td>:</td><td>{{ $politik->PenentuanSekretarisDesa?->nama?? '-' }}</td></tr>
                <tr><td>Penentuan Perangkat Desa</td><td>:</td><td>{{ $politik->PenentuanPerangkatDesa?->nama ?? '-' }}</td></tr>
                <tr><td>Masa Jabatan Kepala Desa (Tahun)</td><td>:</td><td>{{ $politik->masa_jabatan_kepala_desa ?? '-' }}</td></tr>
                <tr><td>Penentuan Jabatan Lurah</td><td>:</td><td>{{ $politik->PenentuanLurah?->nama ?? '-' }}</td></tr>
            </table>

            <!-- BPD -->
            <h5 class="fw-bold text-primary mt-4 mb-2">Badan Permusyawaratan Desa (BPD)</h5>
            <table class="table table-borderless align-middle mb-4">
                <colgroup>
                    <col style="width: 35%;">
                    <col style="width: 5%;">
                    <col style="width: 60%;">
                </colgroup>
                <tr><td>Penentuan Anggota BPD</td><td>:</td><td>{{ $politik->PenentuanAnggotaBpd?->nama ?? '-' }}</td>
                <tr><td>Penentuan Ketua BPD</td><td>:</td><td>{{ $politik->PenentuanKetuaBpd?->nama ?? '-' }}</td>
                @foreach ([
                    'jumlah_anggota_bpd' => 'Jumlah Anggota BPD',
                    'kantor_bpd' => 'Kantor BPD',
                    'anggaran_bpd' => 'Anggaran BPD',
                    'peraturan_desa' => 'Peraturan Desa',
                    'permintaan_keterangan_kepala_desa' => 'Permintaan Keterangan Kepala Desa',
                    'rancangan_perdes' => 'Rancangan Perdes',
                    'menyalurkan_aspirasi' => 'Menyalurkan Aspirasi',
                    'menyatakan_pendapat' => 'Menyatakan Pendapat',
                    'menyampaikan_usul' => 'Menyampaikan Usul',
                    'mengevaluasi_apb_desa' => 'Mengevaluasi APB Desa'
                ] as $field => $label)
                    <tr>
                        <td>{{ $label }}</td><td>:</td>
                        <td>{{ ucfirst(str_replace('_',' ',$politik->$field)) ?? '-' }}</td>
                    </tr>
                @endforeach
            </table>

            <!-- LKD / LKK -->
            <h5 class="fw-bold text-primary mt-4 mb-2">Lembaga Kemasyarakatan Desa/Kelurahan (LKD/LKK)</h5>
            <table class="table table-borderless align-middle mb-4">
                <colgroup>
                    <col style="width: 35%;">
                    <col style="width: 5%;">
                    <col style="width: 60%;">
                </colgroup>
                <tr><td>Pemilihan Pengurus LKD</td><td>:</td><td>{{ $politik->PengurusLkd?->nama ?? '-' }}</td>
                <tr><td>Pemilihan Pengurus LKK</td><td>:</td><td>{{ $politik->PengurusLkk?->nama ?? '-' }}</td>
                @foreach ([
                    'keberadaan_organisasi_lkd' => 'Keberadaan Organisasi LKD',
                    'dasar_hukum_organisasi_lkd' => 'Dasar Hukum Organisasi LKD',
                    'jumlah_organisasi_lkd_desa' => 'Jumlah Organisasi LKD Desa',
                    'dasar_hukum_pembentukan_lkd_kelurahan' => 'Dasar Hukum Pembentukan LKD Kelurahan',
                    'jumlah_organisasi_lkd_kelurahan' => 'Jumlah Organisasi LKD Kelurahan',
                    'status_lkd' => 'Status LKD',
                    'jumlah_kegiatan_lkd' => 'Jumlah Kegiatan LKD',
                    'fungsi_tugas_lkd' => 'Fungsi dan Tugas LKD',
                    'jumlah_kegiatan_organisasi_lkd' => 'Jumlah Kegiatan Organisasi LKD',
                    'alokasi_anggaran_lkd' => 'Alokasi Anggaran LKD',
                    'alokasi_anggaran_organisasi' => 'Alokasi Anggaran Organisasi',
                    'kantor_lkd' => 'Kantor LKD',
                    'dukungan_pembiayaan' => 'Dukungan Pembiayaan',
                    'realisasi_program_kerja' => 'Realisasi Program Kerja',
                    'keberadaan_alat_kelengkapan' => 'Keberadaan Alat Kelengkapan',
                    'kegiatan_administrasi' => 'Kegiatan Administrasi'
                ] as $field => $label)
                    <tr>
                        <td>{{ $label }}</td><td>:</td>
                        <td>{{ $politik->$field ?? '-' }}</td>
                    </tr>
                @endforeach
            </table>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('perkembangan.kedaulatanmasyarakat.politik.edit', $politik->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('perkembangan.kedaulatanmasyarakat.politik.destroy', $politik->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Hapus
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

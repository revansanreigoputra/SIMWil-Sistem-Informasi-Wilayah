@extends('layouts.master')

@section('title', 'Data Partisipasi Politik')

@section('action')
    <a href="{{ route('perkembangan.kedaulatanmasyarakat.politik.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus me-1"></i> Tambah Data
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table id="politik-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Desa</th>

                        {{-- Partai Politik & Pemilu --}}
                        <th>Jumlah Penduduk Hak Pilih</th>
                        <th>Pengguna Hak Pilih Pemilu Legislatif</th>
                        <th>Perempuan Aktif Partai Politik</th>
                        <th>Partai Politik Memiliki Pengurus</th>
                        <th>Partai Politik Memiliki Kantor</th>
                        <th>Penduduk Pengurus Partai</th>
                        <th>Penduduk Dipilih Legislatif</th>
                        <th>Pengguna Hak Pilih Presiden</th>

                        {{-- Pilkada --}}
                        <th>Hak Pilih Pilkada</th>
                        <th>Pengguna Hak Pilih Bupati</th>
                        <th>Pengguna Hak Pilih Gubernur</th>

                        {{-- Penentuan Kepala Desa/Lurah --}}
                        <th>Penentuan Jabatan Kepala Desa</th>
                        <th>Penentuan Sekretaris Desa</th>
                        <th>Penentuan Perangkat Desa</th>
                        <th>Masa Jabatan Kepala Desa</th>
                        <th>Penentuan Jabatan Lurah</th>

                        {{-- BPD --}}
                        <th>Jumlah Anggota BPD</th>
                        <th>Penentuan Anggota BPD</th>
                        <th>Pimpinan BPD</th>
                        <th>Kantor BPD</th>
                        <th>Anggaran BPD</th>
                        <th>Peraturan Desa</th>
                        <th>Permintaan Keterangan Kades</th>
                        <th>Rancangan Perdes</th>
                        <th>Menyalurkan Aspirasi</th>
                        <th>Menyatakan Pendapat</th>
                        <th>Menyampaikan Usul</th>
                        <th>Mengevaluasi APB Desa</th>

                        {{-- LKD / LKK --}}
                        <th>Keberadaan Organisasi LKD</th>
                        <th>Dasar Hukum Organisasi LKD</th>
                        <th>Jumlah Organisasi LKD Desa</th>
                        <th>Dasar Hukum Pembentukan LKD Kelurahan</th>
                        <th>Jumlah Organisasi LKD Kelurahan</th>
                        <th>Pemilihan Pengurus LKD</th>
                        <th>Pemilihan Pengurus Organisasi LKD</th>
                        <th>Status LKD</th>
                        <th>Jumlah Kegiatan LKD</th>
                        <th>Fungsi Tugas LKD</th>
                        <th>Jumlah Kegiatan Organisasi LKD</th>
                        <th>Alokasi Anggaran LKD</th>
                        <th>Alokasi Anggaran Organisasi</th>
                        <th>Kantor LKD</th>
                        <th>Dukungan Pembiayaan</th>
                        <th>Realisasi Program Kerja</th>
                        <th>Keberadaan Alat Kelengkapan</th>
                        <th>Kegiatan Administrasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $item->desa->nama_desa ?? '-' }}</td>

                            {{-- Partai Politik & Pemilu --}}
                            <td>{{ $item->jumlah_penduduk_memiliki_hak_pilih ?? '-' }}</td>
                            <td>{{ $item->jumlah_pengguna_hak_pilih_pemilu_legislatif ?? '-' }}</td>
                            <td>{{ $item->jumlah_perempuan_aktif_partai_politik ?? '-' }}</td>
                            <td>{{ $item->jumlah_partai_politik_memiliki_pengurus ?? '-' }}</td>
                            <td>{{ $item->jumlah_partai_politik_memiliki_kantor ?? '-' }}</td>
                            <td>{{ $item->jumlah_penduduk_pengurus_partai ?? '-' }}</td>
                            <td>{{ $item->jumlah_penduduk_dipilih_legislatif ?? '-' }}</td>
                            <td>{{ $item->jumlah_pengguna_hak_pilih_presiden ?? '-' }}</td>

                            {{-- Pilkada --}}
                            <td>{{ $item->jumlah_penduduk_memiliki_hak_pilih_pilkada ?? '-' }}</td>
                            <td>{{ $item->jumlah_pengguna_hak_pilih_bupati ?? '-' }}</td>
                            <td>{{ $item->jumlah_pengguna_hak_pilih_gubernur ?? '-' }}</td>

                            {{-- Kepala Desa/Lurah --}}
                            <td>{{ ucfirst(str_replace('_', ' ', $item->penentuan_jabatan_kepala_desa ?? '-')) }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $item->penentuan_sekretaris_desa ?? '-')) }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $item->penentuan_perangkat_desa ?? '-')) }}</td>
                            <td>{{ $item->masa_jabatan_kepala_desa ?? '-' }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $item->penentuan_jabatan_lurah ?? '-')) }}</td>

                            {{-- BPD --}}
                            <td>{{ $item->jumlah_anggota_bpd ?? '-' }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $item->penentuan_anggota_bpd ?? '-')) }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $item->pimpinan_bpd ?? '-')) }}</td>
                            <td>{{ $item->kantor_bpd ?? '-' }}</td>
                            <td>{{ $item->anggaran_bpd ?? '-' }}</td>
                            <td>{{ $item->peraturan_desa ?? '-' }}</td>
                            <td>{{ $item->permintaan_keterangan_kepala_desa ?? '-' }}</td>
                            <td>{{ $item->rancangan_perdes ?? '-' }}</td>
                            <td>{{ $item->menyalurkan_aspirasi ?? '-' }}</td>
                            <td>{{ $item->menyatakan_pendapat ?? '-' }}</td>
                            <td>{{ $item->menyampaikan_usul ?? '-' }}</td>
                            <td>{{ $item->mengevaluasi_apb_desa ?? '-' }}</td>

                            {{-- LKD / LKK --}}
                            <td>{{ $item->keberadaan_organisasi_lkd ?? '-' }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $item->dasar_hukum_organisasi_lkd ?? '-')) }}</td>
                            <td>{{ $item->jumlah_organisasi_lkd_desa ?? '-' }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $item->dasar_hukum_pembentukan_lkd_kelurahan ?? '-')) }}</td>
                            <td>{{ $item->jumlah_organisasi_lkd_kelurahan ?? '-' }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $item->pemilihan_pengurus_lkd ?? '-')) }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $item->pemilihan_pengurus_organisasi_lkd ?? '-')) }}</td>
                            <td>{{ $item->status_lkd ?? '-' }}</td>
                            <td>{{ $item->jumlah_kegiatan_lkd ?? '-' }}</td>
                            <td>{{ $item->fungsi_tugas_lkd ?? '-' }}</td>
                            <td>{{ $item->jumlah_kegiatan_organisasi_lkd ?? '-' }}</td>
                            <td>{{ $item->alokasi_anggaran_lkd ?? '-' }}</td>
                            <td>{{ $item->alokasi_anggaran_organisasi ?? '-' }}</td>
                            <td>{{ $item->kantor_lkd ?? '-' }}</td>
                            <td>{{ $item->dukungan_pembiayaan ?? '-' }}</td>
                            <td>{{ $item->realisasi_program_kerja ?? '-' }}</td>
                            <td>{{ $item->keberadaan_alat_kelengkapan ?? '-' }}</td>
                            <td>{{ $item->kegiatan_administrasi ?? '-' }}</td>

                            {{-- Aksi --}}
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.politik.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.politik.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-politik-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-politik-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data partisipasi politik tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.kedaulatanmasyarakat.politik.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#politik-table').DataTable({
                scrollX: true
            });
        });
    </script>
@endpush

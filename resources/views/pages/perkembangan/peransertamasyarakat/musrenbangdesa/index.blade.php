@extends('layouts.master')

@section('title', 'Data Musrenbang Desa')

@section('action')
    <a href="{{ route('perkembangan.peransertamasyarakat.musrenbangdesa.create') }}" class="btn btn-primary mb-3">
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
            <table id="musrenbangdesa-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Penggunaan Profil Desa</th>
                        <th>Penggunaan Data BPS</th>
                        <th>Pelibatan Masyarakat</th>
                        <th>Dokumen RKPDes</th>
                        <th>Dokumen RPJMDes</th>
                        <th>Dokumen Hasil Musrenbang</th>
                        <th>Jumlah Musrenbang Desa/Kelurahan</th>
                        <th>Jumlah Kehadiran Masyarakat</th>
                        <th>Peserta Laki-laki</th>
                        <th>Peserta Perempuan</th>
                        <th>Musrenbang Antar Desa</th>
                        <th>Usulan Masyarakat Disetujui</th>
                        <th>Usulan Pemdes Disetujui</th>
                        <th>Usulan Rencana Kerja Pemkab</th>
                        <th>Usulan Rencana Kerja Ditolak</th>
                        <th>Kegiatan Terdanai</th>
                        <th>Kegiatan Tidak Sesuai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>

                            {{-- Badge Hijau jika "Ada", Abu-abu jika "Tidak Ada"/null --}}
                            <td><span class="badge bg-{{ $item->penggunaan_profil_desa === 'Ada' ? 'success' : 'secondary' }}">{{ $item->penggunaan_profil_desa ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->penggunaan_data_bps === 'Ada' ? 'success' : 'secondary' }}">{{ $item->penggunaan_data_bps ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pelibatan_masyarakat === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pelibatan_masyarakat ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->dokumen_rkpdes === 'Ada' ? 'success' : 'secondary' }}">{{ $item->dokumen_rkpdes ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->dokumen_rpjmdes === 'Ada' ? 'success' : 'secondary' }}">{{ $item->dokumen_rpjmdes ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->dokumen_hasil_musrenbang === 'Ada' ? 'success' : 'secondary' }}">{{ $item->dokumen_hasil_musrenbang ?? '-' }}</span></td>

                            {{-- Kolom numeric --}}
                            <td class="text-center">{{ $item->jumlah_musrenbang_desa_kelurahan ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_kehadiran_masyarakat ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_peserta_laki ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_peserta_perempuan ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_musrenbang_antar_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->usulan_masyarakat_disetujui ?? '-' }}</td>
                            <td class="text-center">{{ $item->usulan_pemerintah_desa_disetujui ?? '-' }}</td>
                            <td class="text-center">{{ $item->usulan_rencana_kerja_pemkab ?? '-' }}</td>
                            <td class="text-center">{{ $item->usulan_rencana_kerja_ditolak ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_kegiatan_terdanai ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_kegiatan_tidak_sesuai ?? '-' }}</td>

                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('perkembangan.peransertamasyarakat.musrenbangdesa.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus dengan Modal -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-musrenbangdesa-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="delete-musrenbangdesa-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data pada tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.peransertamasyarakat.musrenbangdesa.destroy', $item->id) }}"
                                                          method="POST">
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
            $('#musrenbangdesa-table').DataTable();
        });
    </script>
@endpush

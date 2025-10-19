@extends('layouts.master')

@section('title', 'Data Berbangsa')

@section('action')
    <a href="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.create') }}" class="btn btn-primary mb-3">
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
            <table id="berbangsa-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Kegiatan Pemantapan Pancasila</th>
                        <th class="text-center">Jumlah Kegiatan Pemantapan Pancasila</th>
                        <th class="text-center">Jenis Kegiatan Bhineka Tunggal Ika</th>
                        <th class="text-center">Jumlah Kegiatan Bhineka Tunggal Ika</th>
                        <th class="text-center">Jenis Kegiatan Pemantapan Kesatuan Bangsa</th>
                        <th class="text-center">Kasus Desa Minta Suaka</th>
                        <th class="text-center">Warga Melintas Resmi</th>
                        <th class="text-center">Warga Melintas Tidak Resmi</th>
                        <th class="text-center">Pertempuran Antar Kelompok</th>
                        <th class="text-center">Serangan Terhadap Fasilitas</th>
                        <th class="text-center">Kasus Merongrong NKRI</th>
                        <th class="text-center">Korban Manusia</th>
                        <th class="text-center">Masalah Ketenagakerjaan</th>
                        <th class="text-center">Kejahatan Perbatasan</th>
                        <th class="text-center">Sengketa Perbatasan Desa</th>
                        <th class="text-center">Sengketa Antar Daerah</th>
                        <th class="text-center">Kasus Diplomatik</th>
                        <th class="text-center">Kasus Disintegrasi</th>
                        <th class="text-center">Kasus Penangkapan</th>
                        <th class="text-center">Kasus Nelayan/Petani</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->kegiatan_pemantapan_pancasila ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_kegiatan_pemantapan_pancasila ?? '-' }}</td>
                            <td class="text-center">{{ $item->jenis_kegiatan_bhineka_tunggal_ika ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_kegiatan_bhineka_tunggal_ika ?? '-' }}</td>
                            <td class="text-center">{{ $item->jenis_kegiatan_pemantapan_kesatuan_bangsa ?? '-' }}</td>
                            <td class="text-center">{{ $item->kasus_desa_minta_suaka ?? '-' }}</td>
                            <td class="text-center">{{ $item->warga_melintas_resmi ?? '-' }}</td>
                            <td class="text-center">{{ $item->warga_melintas_tidak_resmi ?? '-' }}</td>
                            <td class="text-center">{{ $item->kasus_pertempuran_antar_kelompok ?? '-' }}</td>
                            <td class="text-center">{{ $item->serangan_terhadap_fasilitas ?? '-' }}</td>
                            <td class="text-center">{{ $item->kasus_merongrong_nkri ?? '-' }}</td>
                            <td class="text-center">{{ $item->korban_manusia ?? '-' }}</td>
                            <td class="text-center">{{ $item->masalah_ketenagakerjaan ?? '-' }}</td>
                            <td class="text-center">{{ $item->kasus_kejahatan_perbatasan ?? '-' }}</td>
                            <td class="text-center">{{ $item->sengketa_perbatasan_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->sengketa_perbatasan_antar_daerah ?? '-' }}</td>
                            <td class="text-center">{{ $item->kasus_diplomatik ?? '-' }}</td>
                            <td class="text-center">{{ $item->kasus_disintegrasi ?? '-' }}</td>
                            <td class="text-center">{{ $item->kasus_penangkapan ?? '-' }}</td>
                            <td class="text-center">{{ $item->kasus_nelayan_petani ?? '-' }}</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-berbangsa-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="delete-berbangsa-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data berbangsa pada tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.destroy', $item->id) }}" method="POST">
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
            $('#berbangsa-table').DataTable();
        });
    </script>
@endpush

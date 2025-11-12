@extends('layouts.master')

@section('title', 'Data Sistem Keamanan')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.create') }}" class="btn btn-primary mb-3">
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
            <table id="sistemkeamanan-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Organisasi Siskamling</th>
                        <th class="text-center">Organisasi Pertahanan Sipil</th>
                        <th class="text-center">Jumlah RT/Pos Ronda</th>
                        <th class="text-center">Jumlah Anggota Hansip & Linmas</th>
                        <th class="text-center">Jadwal Kegiatan Siskamling</th>
                        <th class="text-center">Buku Anggota Hansip & Linmas</th>
                        <th class="text-center">Jumlah Kelompok Satpam Swasta</th>
                        <th class="text-center">Jumlah Pembinaan Siskamling</th>
                        <th class="text-center">Jumlah Pos Jaga Induk</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->organisasi_siskamling ?? '-' }}</td>
                            <td class="text-center">{{ $item->organisasi_pertahanan_sipil ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_rt_atau_pos_ronda ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_anggota_hansip_dan_linmas ?? 0 }}</td>
                            <td class="text-center">{{ $item->jadwal_kegiatan_siskamling ?? '-' }}</td>
                            <td class="text-center">{{ $item->buku_anggota_hansip_linmas ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_kelompok_satpam_swasta ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_pembinaan_siskamling ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_pos_jaga_induk_desa ?? 0 }}</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-sistemkeamanan-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="delete-sistemkeamanan-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data Sistem Keamanan pada tanggal 
                                                        <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> 
                                                        akan dihapus permanen.
                                                    </p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.destroy', $item->id) }}" method="POST">
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
        $('#sistemkeamanan-table').DataTable();
    });
</script>
@endpush

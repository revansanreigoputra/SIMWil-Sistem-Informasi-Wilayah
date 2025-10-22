@extends('layouts.master')

@section('title', 'Data Miras dan Narkoba')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.miras.create') }}" class="btn btn-primary mb-3">
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
            <table id="miras-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Warung Miras</th>
                        <th class="text-center">Penduduk Miras</th>
                        <th class="text-center">Kasus Mabuk Miras</th>
                        <th class="text-center">Pengedar Narkoba</th>
                        <th class="text-center">Penduduk Narkoba</th>
                        <th class="text-center">Kasus Teler Narkoba</th>
                        <th class="text-center">Kasus Kematian Narkoba</th>
                        <th class="text-center">Pelaku Miras Diadili</th>
                        <th class="text-center">Pelaku Narkoba Diadili</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_warung_miras ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_penduduk_miras ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_kasus_mabuk_miras ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_pengedar_narkoba ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_penduduk_narkoba ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_kasus_teler_narkoba ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_kasus_kematian_narkoba ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_pelaku_miras_diadili ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_pelaku_narkoba_diadili ?? 0 }}</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('perkembangan.keamanandanketertiban.miras.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('perkembangan.keamanandanketertiban.miras.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-miras-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="delete-miras-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data Miras & Narkoba pada tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.keamanandanketertiban.miras.destroy', $item->id) }}" method="POST">
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
        $('#miras-table').DataTable();
    });
</script>
@endpush

@extends('layouts.master')

@section('title', 'Data Sosial')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.sosial.create') }}" class="btn btn-primary mb-3">
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
            <table id="sosial-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Anak Remaja Preman Pengangguran</th>
                        <th class="text-center">Gelandangan</th>
                        <th class="text-center">Pengemis Jalanan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_anak_remaja_preman_pengangguran ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_gelandangan ?? 0 }}</td>
                            <td class="text-center">{{ $item->jumlah_pengemis_jalanan ?? 0 }}</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('perkembangan.keamanandanketertiban.sosial.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('perkembangan.keamanandanketertiban.sosial.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-sosial-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="delete-sosial-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data sosial tanggal 
                                                        <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> 
                                                        akan dihapus permanen.
                                                    </p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.keamanandanketertiban.sosial.destroy', $item->id) }}" method="POST">
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
        $('#sosial-table').DataTable({
            pageLength: 10,
            ordering: true,
            autoWidth: false,
        });
    });
</script>
@endpush

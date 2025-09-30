@extends('layouts.master')

@section('title', 'Data Kesejahteraan Keluarga')

@section('action')
    @can('kesejahteraan.create')
        <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.create') }}" class="btn btn-primary">
            Tambah Data Kesejahteraan
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="kesejahteraan-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Prasejahtera</th>
                        <th class="text-center">Sejahtera 1</th>
                        <th class="text-center">Sejahtera 2</th>
                        <th class="text-center">Sejahtera 3</th>
                        <th class="text-center">Sejahtera Plus</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $item)
                        <tr>
                            <td class="text-center">{{ $data->firstItem() + $index }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                            <td class="text-center"><span class="badge bg-primary">{{ $item->prasejahtera }}</span></td>
                            <td class="text-center"><span class="badge bg-success">{{ $item->sejahtera1 }}</span></td>
                            <td class="text-center"><span class="badge bg-info">{{ $item->sejahtera2 }}</span></td>
                            <td class="text-center"><span class="badge bg-warning text-dark">{{ $item->sejahtera3 }}</span></td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $item->sejahteraplus }}</span></td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <!-- Modal Hapus -->
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-keluarga-{{ $item->id }}">Hapus</button>
                                    <div class="modal fade" id="delete-keluarga-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data Kesejahteraan?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data tanggal <strong>{{ $item->tanggal }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.destroy', $item->id) }}" method="POST">
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
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Data kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
$(document).ready(function() {
    $('#kesejahteraan-table').DataTable();
});
</script>
@endpush


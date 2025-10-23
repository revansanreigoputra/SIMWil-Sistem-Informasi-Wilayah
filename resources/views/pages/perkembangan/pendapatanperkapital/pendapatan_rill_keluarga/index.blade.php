@extends('layouts.master')

@section('title', 'Data Pendapatan Riil Keluarga')

@section('action')
    @can('pendapatan_rill_keluarga.create')
        <a href="{{ route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.create') }}" class="btn btn-primary">
            Tambah Data Pendapatan Riil Keluarga
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="pendapatan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">KK</th>
                        <th class="text-center">AK</th>
                        <th class="text-center">Pendapatan KK</th>
                        <th class="text-center">Pendapatan AK</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Per Anggota</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td class="text-center">{{ $data->firstItem() + $index }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                            <td class="text-center"><span class="badge bg-primary">{{ $item->kk }}</span></td>
                            <td class="text-center"><span class="badge bg-info">{{ $item->ak }}</span></td>
                            <td class="text-center"><span class="badge bg-warning text-dark">Rp {{ number_format($item->pendapatan_kk, 0, ',', '.') }}</span></td>
                            <td class="text-center"><span class="badge bg-secondary">Rp {{ number_format($item->pendapatan_ak, 0, ',', '.') }}</span></td>
                            <td class="text-center"><span class="badge bg-success">Rp {{ number_format($item->total1, 0, ',', '.') }}</span></td>
                            <td class="text-center"><span class="badge bg-dark">Rp {{ number_format($item->total2, 2, ',', '.') }}</span></td>
                            <td>
                                @canany(['pendapatan_rill_keluarga.view','pendapatan_rill_keluarga.update','pendapatan_rill_keluarga.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('pendapatan_rill_keluarga.view')
                                            <a href="{{ route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.show', $item->id) }}" 
                                               class="btn btn-sm btn-info">
                                                Detail
                                            </a>
                                        @endcan
                                        @can('pendapatan_rill_keluarga.update')
                                            <a href="{{ route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.edit', $item->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('pendapatan_rill_keluarga.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-pendapatan-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-pendapatan-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data tanggal <strong>{{ $item->tanggal }}</strong> dari desa <strong>{{ $item->desa->nama_desa ?? '-' }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted">Tidak ada aksi</span>
                                @endcanany
                            </td>
                        </tr>
                    @endforeach
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
        $('#pendapatan-table').DataTable();
    });
</script>
@endpush

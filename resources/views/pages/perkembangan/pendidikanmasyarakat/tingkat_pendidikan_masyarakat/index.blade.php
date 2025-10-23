@extends('layouts.master')

@section('title', 'Tingkat Pendidikan Masyarakat')

@section('action')
    @can('tingkat_pendidikan_masyarakat.create')
        <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.create') }}" class="btn btn-primary">
            Tambah Data Tingkat Pendidikan Masyarakat
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="pendidikan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Tidak Tamat SD</th>
                        <th class="text-center">SD</th>
                        <th class="text-center">SLTP</th>
                        <th class="text-center">SLTA</th>
                        <th class="text-center">Diploma</th>
                        <th class="text-center">Sarjana</th>
                        <th class="text-center">% Buta</th>
                        <th class="text-center">% Tamat</th>
                        <th class="text-center">% Cacat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                        <tr>
                            <td class="text-center">{{ $items->firstItem() + $index }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>

                            <td class="text-center"><span class="badge bg-primary">{{ $item->tidak_tamat_sd ?? 0 }}</span></td>
                            <td class="text-center"><span class="badge bg-info">{{ $item->sd ?? 0 }}</span></td>
                            <td class="text-center"><span class="badge bg-success">{{ $item->sltp ?? 0 }}</span></td>
                            <td class="text-center"><span class="badge bg-warning text-dark">{{ $item->slta ?? 0 }}</span></td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $item->diploma ?? 0 }}</span></td>
                            <td class="text-center"><span class="badge bg-dark">{{ $item->sarjana ?? 0 }}</span></td>

                            <td class="text-center">{{ $item->p_buta ?? '-' }}</td>
                            <td class="text-center">{{ $item->p_tamat ?? '-' }}</td>
                            <td class="text-center">{{ $item->p_cacat ?? '-' }}</td>

                            <td>
                                @canany(['tingkat_pendidikan_masyarakat.view','tingkat_pendidikan_masyarakat.update','tingkat_pendidikan_masyarakat.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('tingkat_pendidikan_masyarakat.view')
                                            <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.show', $item->id) }}" 
                                               class="btn btn-sm btn-info">
                                                Detail
                                            </a>
                                        @endcan

                                        @can('tingkat_pendidikan_masyarakat.update')
                                            <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.edit', $item->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('tingkat_pendidikan_masyarakat.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-pendidikan-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-pendidikan-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</strong> dari desa <strong>{{ $item->desa->nama_desa ?? '-' }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.destroy', $item->id) }}" method="POST">
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
            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#pendidikan-table').DataTable();
    });
</script>
@endpush

@extends('layouts.master')

@section('title', 'Data Rasio Guru & Murid')

@section('action')
    @can('rasio_guru_dan_murid.create')
        <a href="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.create') }}" class="btn btn-primary">
            Tambah Data Rasio Guru & Murid 
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="rasio-table" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Guru TK</th>
                        <th class="text-center">Siswa TK</th>
                        <th class="text-center">Guru SD</th>
                        <th class="text-center">Siswa SD</th>
                        <th class="text-center">Guru SLTP</th>
                        <th class="text-center">Siswa SLTP</th>
                        <th class="text-center">Guru SLTA</th>
                        <th class="text-center">Siswa SLTA</th>
                        <th class="text-center">Guru SLB</th>
                        <th class="text-center">Siswa SLB</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                        <tr>
                            <td class="text-center">{{ $items->firstItem() + $index }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>

                            <td class="text-center"><span class="badge bg-primary">{{ $item->guru_tk }}</span></td>
                            <td class="text-center"><span class="badge bg-info text-dark">{{ $item->siswa_tk }}</span></td>
                            <td class="text-center"><span class="badge bg-warning text-dark">{{ $item->guru_sd }}</span></td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $item->siswa_sd }}</span></td>
                            <td class="text-center"><span class="badge bg-success">{{ $item->guru_sltp }}</span></td>
                            <td class="text-center"><span class="badge bg-dark">{{ $item->siswa_sltp }}</span></td>
                            <td class="text-center"><span class="badge bg-primary">{{ $item->guru_slta }}</span></td>
                            <td class="text-center"><span class="badge bg-info text-dark">{{ $item->siswa_slta }}</span></td>
                            <td class="text-center"><span class="badge bg-warning text-dark">{{ $item->guru_slb }}</span></td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $item->siswa_slb }}</span></td>

                            <td>
                                @canany(['rasio_guru_dan_murid.view','rasio_guru_dan_murid.update','rasio_guru_dan_murid.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('rasio_guru_dan_murid.view')
                                            <a href="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.show', $item->id) }}" 
                                               class="btn btn-sm btn-info">
                                                Detail
                                            </a>
                                        @endcan
                                        @can('rasio_guru_dan_murid.update')
                                            <a href="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.edit', $item->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('rasio_guru_dan_murid.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-rasio-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-rasio-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</strong> dari desa 
                                                        <strong>{{ $item->desa->nama_desa ?? '-' }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.destroy', $item->id) }}" method="POST">
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
        $('#rasio-table').DataTable();
    });
</script>
@endpush

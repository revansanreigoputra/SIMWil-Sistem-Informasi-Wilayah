@extends('layouts.master')

@section('title', 'Data Sarana Transportasi Umum')

@section('action')
    @can('sarana_transportasi_umum.create')
        <a href="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.create') }}" class="btn btn-primary">
            Tambah Data Sarana Transportasi Umum
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="transportasi-table" class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Jenis Aset</th>
                        <th>Jumlah Pemilik</th>
                        <th>Jumlah Aset</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr class="text-center">
                            <td>{{ $data->firstItem() + $index }}</td>
                            <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>

                            {{-- FIX: Jenis Aset dari master --}}
                            <td>{{ $item->asetSarana->nama ?? '-' }}</td>

                            <td>
                                <span class="badge bg-success">{{ $item->jumlah_pemilik ?? 0 }}</span>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $item->jumlah_aset ?? 0 }}</span>
                            </td>
                            <td>
                                @canany(['sarana_transportasi_umum.view','sarana_transportasi_umum.update','sarana_transportasi_umum.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('sarana_transportasi_umum.view')
                                            <a href="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.show', $item->id) }}" 
                                               class="btn btn-sm btn-info">
                                                Detail
                                            </a>
                                        @endcan
                                        @can('sarana_transportasi_umum.update')
                                            <a href="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.edit', $item->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('sarana_transportasi_umum.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-transportasi-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-transportasi-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data aset <strong>{{ $item->asetSarana->nama ?? '-' }}</strong> dari desa 
                                                       <strong>{{ $item->desa->nama_desa ?? '-' }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.destroy', $item->id) }}" method="POST">
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
        $('#transportasi-table').DataTable({
            paging: false,
            info: false,
            searching: true,
            ordering: true,
            columnDefs: [
                { orderable: false, targets: 6 }
            ]
        });
    });
</script>
@endpush

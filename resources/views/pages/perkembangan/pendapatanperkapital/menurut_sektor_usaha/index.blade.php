@extends('layouts.master')

@section('title', 'Data Menurut Sektor Usaha')

@section('action')
    @can('menurut_sektor_usaha.create')
        <a href="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.create') }}" class="btn btn-primary">
            Tambah Data Menurut Sektor Usaha
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sektor-table" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">KK</th>
                        <th class="text-center">Anggota</th>
                        <th class="text-center">Buruh</th>
                        <th class="text-center">Anggota Buruh</th>
                        <th class="text-center">Pendapatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td class="text-center">{{ $data->firstItem() + $index }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                            <td class="text-center"><span class="badge bg-primary">{{ $item->kk }}</span></td>
                            <td class="text-center"><span class="badge bg-info">{{ $item->anggota }}</span></td>
                            <td class="text-center"><span class="badge bg-warning">{{ $item->buruh }}</span></td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $item->anggota_buruh }}</span></td>
                            <td class="text-center"><span class="badge bg-success">Rp {{ number_format($item->pendapatan, 0, ',', '.') }}</span></td>
                            <td>
                                @canany(['menurut_sektor_usaha.view','menurut_sektor_usaha.update','menurut_sektor_usaha.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('menurut_sektor_usaha.view')
                                            <a href="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.show', $item->id) }}" 
                                               class="btn btn-sm btn-info">
                                                Detail
                                            </a>
                                        @endcan
                                        @can('menurut_sektor_usaha.update')
                                            <a href="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.edit', $item->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('menurut_sektor_usaha.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-sektor-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-sektor-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data tanggal <strong>{{ $item->tanggal }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.destroy', $item->id) }}" method="POST">
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
        $('#sektor-table').DataTable();
    });
</script>
@endpush

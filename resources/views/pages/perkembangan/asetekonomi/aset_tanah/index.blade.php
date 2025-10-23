@extends('layouts.master')

@section('title', 'Data Penguasaan Aset Tanah')

@section('action')
    @can('aset_tanah.create')
        <a href="{{ route('perkembangan.asetekonomi.aset_tanah.create') }}" class="btn btn-primary">
            Tambah Data Penguasaan Aset Tanah
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="asetTanahTable" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Tidak Memiliki</th>
                        <th class="text-center">Kurang dari 0,1 Ha</th>
                        <th class="text-center">0,1 – 0,2 Ha</th>
                        <th class="text-center">0,21 – 0,5 Ha</th>
                        <th class="text-center">0,51 – 1 Ha</th>
                        <th class="text-center">1,1 – 2 Ha</th>
                        <th class="text-center">2,1 – 3 Ha</th>
                        <th class="text-center">3,1 – 4 Ha</th>
                        <th class="text-center">4,1 – 5 Ha</th>
                        <th class="text-center">5,1 – 7 Ha</th>
                        <th class="text-center">7,1 – 10 Ha</th>
                        <th class="text-center">10,1 Ha</th>
                        <th class="text-center">Lebih dari 10 Ha</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asetTanahs as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $item->tidak_memiliki }}</span></td>
                            <td class="text-center"><span class="badge bg-primary">{{ $item->tanah1 }}</span></td>
                            <td class="text-center"><span class="badge bg-info text-dark">{{ $item->tanah2 }}</span></td>
                            <td class="text-center"><span class="badge bg-warning text-dark">{{ $item->tanah3 }}</span></td>
                            <td class="text-center"><span class="badge bg-success">{{ $item->tanah4 }}</span></td>
                            <td class="text-center"><span class="badge bg-dark">{{ $item->tanah5 }}</span></td>
                            <td class="text-center"><span class="badge bg-primary">{{ $item->tanah6 }}</span></td>
                            <td class="text-center"><span class="badge bg-info text-dark">{{ $item->tanah7 }}</span></td>
                            <td class="text-center"><span class="badge bg-warning text-dark">{{ $item->tanah8 }}</span></td>
                            <td class="text-center"><span class="badge bg-success">{{ $item->tanah9 }}</span></td>
                            <td class="text-center"><span class="badge bg-dark">{{ $item->tanah10 }}</span></td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $item->tanah11 }}</span></td>
                            <td class="text-center"><span class="badge bg-primary">{{ $item->memiliki_lebih }}</span></td>
                            <td class="text-center"><span class="badge bg-success">{{ $item->jumlah }}</span></td>
                            <td>
                                @canany(['aset_tanah.view','aset_tanah.update','aset_tanah.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('aset_tanah.view')
                                            <a href="{{ route('perkembangan.asetekonomi.aset_tanah.show', $item->id) }}" 
                                               class="btn btn-sm btn-info">
                                                Detail
                                            </a>
                                        @endcan
                                        @can('aset_tanah.update')
                                            <a href="{{ route('perkembangan.asetekonomi.aset_tanah.edit', $item->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('aset_tanah.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-asetTanah-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-asetTanah-{{ $item->id }}" tabindex="-1"
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
                                                    <form action="{{ route('perkembangan.asetekonomi.aset_tanah.destroy', $item->id) }}" method="POST">
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
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#asetTanahTable').DataTable();
    });
</script>
@endpush

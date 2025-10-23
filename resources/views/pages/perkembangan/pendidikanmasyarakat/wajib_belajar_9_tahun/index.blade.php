@extends('layouts.master')

@section('title', 'Data Wajib Belajar 9 Tahun')

@section('action')
    @can('wajib_belajar_9_tahun.create')
        <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.create') }}" class="btn btn-primary">
            Tambah Data Wajib Belajar 9 Tahun
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="wajibbelajar-table" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Penduduk (7–15 th)</th>
                        <th class="text-center">Masih Sekolah</th>
                        <th class="text-center">Tidak Sekolah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                        <tr>
                            <td class="text-center">{{ $items->firstItem() + $index }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                            <td class="text-center"><span class="badge bg-primary">{{ $item->penduduk }}</span></td>
                            <td class="text-center"><span class="badge bg-success">{{ $item->masih_sekolah }}</span></td>
                            <td class="text-center"><span class="badge bg-danger">{{ $item->tidak_sekolah }}</span></td>
                            <td>
                                @canany(['wajib_belajar_9_tahun.view','wajib_belajar_9_tahun.update','wajib_belajar_9_tahun.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('wajib_belajar_9_tahun.view')
                                            <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.show', $item->id) }}" 
                                               class="btn btn-sm btn-info">
                                                Detail
                                            </a>
                                        @endcan
                                        @can('wajib_belajar_9_tahun.update')
                                            <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.edit', $item->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('wajib_belajar_9_tahun.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-wajibbelajar-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-wajibbelajar-{{ $item->id }}" tabindex="-1"
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
                                                    <form action="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.destroy', $item->id) }}" method="POST">
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
        $('#wajibbelajar-table').DataTable();
    });
</script>
@endpush

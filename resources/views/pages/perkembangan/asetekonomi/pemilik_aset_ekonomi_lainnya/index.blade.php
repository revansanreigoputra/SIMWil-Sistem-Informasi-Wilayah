@extends('layouts.master')

@section('title', 'Data Pemilik Aset Ekonomi Lainnya')

@section('action')
    @can('pemilik_aset_ekonomi_lainnya.create')
        <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.create') }}" class="btn btn-primary">
            Tambah Data Pemilik Aset Ekonomi Lainnya
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="aset-lainnya-table" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Jenis Aset</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jumlah Pemilik</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                        <tr>
                            <td class="text-center">{{ $items->firstItem() + $index }}</td>

                            <td class="text-center">
                                {{ $item->desa->nama_desa ?? '-' }}
                            </td>

                            <td class="text-center">
                                <span class="badge bg-info">
                                    {{ $item->asetLainnya->nama ?? '-' }}
                                </span>
                            </td>

                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}
                            </td>

                            <td class="text-center">
                                <span class="badge bg-primary">{{ $item->jumlah }}</span>
                            </td>

                            <td class="text-center">
                                @canany(['pemilik_aset_ekonomi_lainnya.view','pemilik_aset_ekonomi_lainnya.update','pemilik_aset_ekonomi_lainnya.delete'])
                                    <div class="d-flex gap-1 justify-content-center">

                                        @can('pemilik_aset_ekonomi_lainnya.view')
                                            <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.show', $item->id) }}" 
                                               class="btn btn-sm btn-info">
                                                Detail
                                            </a>
                                        @endcan

                                        @can('pemilik_aset_ekonomi_lainnya.update')
                                            <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.edit', $item->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('pemilik_aset_ekonomi_lainnya.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-aset-lainnya-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    {{-- Modal Hapus --}}
                                    <div class="modal fade" id="delete-aset-lainnya-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data tanggal <strong>{{ $item->tanggal }}</strong> dari desa 
                                                       <strong>{{ $item->desa->nama_desa ?? '-' }}</strong> akan dihapus.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>

                                                    <form action="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.destroy', $item->id) }}" method="POST">
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

                    @if ($items->isEmpty())
                        <tr style="display:none;"><td colspan="6"></td></tr>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Data masih kosong</td>
                        </tr>
                    @endif
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
        $('#aset-lainnya-table').DataTable();
    });
</script>
@endpush

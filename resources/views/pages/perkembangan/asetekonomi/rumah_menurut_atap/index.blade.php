@extends('layouts.master')

@section('title', 'Data Rumah Menurut Atap')

@section('action')
    @can('rumah_menurut_atap.create')
        <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.create') }}" class="btn btn-primary">
            Tambah Data Rumah Menurut Atap
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="rumah-atap-table" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Jenis Atap</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($items as $index => $item)
                        <tr>
                            <td class="text-center">{{ $items->firstItem() + $index }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>

                            <td class="text-center">
                                <span class="badge bg-info">
                                    {{ $item->asetAtap->nama ?? '-' }}
                                </span>
                            </td>

                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}
                            </td>

                            <td class="text-center">
                                <span class="badge bg-primary">{{ $item->jumlah }}</span>
                            </td>

                            <td class="text-center">
                                @canany(['rumah_menurut_atap.view','rumah_menurut_atap.update','rumah_menurut_atap.delete'])
                                    <div class="d-flex gap-1 justify-content-center">

                                        @can('rumah_menurut_atap.view')
                                            <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.show', $item->id) }}" 
                                               class="btn btn-sm btn-info">
                                                Detail
                                            </a>
                                        @endcan

                                        @can('rumah_menurut_atap.update')
                                            <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.edit', $item->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('rumah_menurut_atap.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-atap-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="delete-atap-{{ $item->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <p>Data tanggal <strong>{{ $item->tanggal }}</strong> dari desa 
                                                       <strong>{{ $item->desa->nama_desa ?? '-' }}</strong> 
                                                       akan dihapus dan tidak dapat dikembalikan.</p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                                                    <form action="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.destroy', $item->id) }}" method="POST">
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
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Data masih kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection

{{-- HAPUS DATATABLES --}}
@push('addon-script')
<script>
    // DataTables DIHAPUS karena menyebabkan error jika data kosong
    // dan bentrok dengan pagination Laravel
</script>
@endpush

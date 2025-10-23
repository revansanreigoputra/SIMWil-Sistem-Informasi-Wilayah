@extends('layouts.master')

@section('title', 'Daftar - SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN')

@section('action')
    @can('sektor-perdagangan.create')
    <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sektor-perdagangan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Perdagangan Besar (Jenis)</th>
                        <th>Perdagangan Kecil (Jenis)</th>
                        <th>Hotel (Pendapatan)</th>
                        <th>Restoran (Pendapatan)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $item->tanggal }}</td>
                        <td class="text-center">{{ $item->jumlah_jenis_perdagangan_besar ?? '-' }}</td>
                        <td class="text-center">{{ $item->jumlah_jenis_perdagangan_kecil ?? '-' }}</td>
                        <td class="text-center">{{ number_format($item->total_pendapatan_hotel, 0, ',', '.') ?? '-' }}</td>
                        {{-- PERBAIKAN: Mengganti 'pendapatan_diperoleh_resto' menjadi 'pendapatan_diperoleh_restoran' --}}
                        <td class="text-center">{{ number_format($item->pendapatan_diperoleh_restoran, 0, ',', '.') ?? '-' }}</td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                {{-- Detail --}}
                                 @can('sektor-perdagangan.show')
                                 <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan.show', $item->id) }}" 
                                    class="btn btn-sm btn-info">Detail</a>
                                 @endcan

                                {{-- Edit --}}
                                @can('sektor-perdagangan.update')
                                <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan.edit', $item->id) }}" 
                                    class="btn btn-sm btn-warning">Edit</a>
                                @endcan

                                {{-- Hapus --}}
                                @can('sektor-perdagangan.delete')
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete-sektor-perdagangan-{{ $item->id }}">
                                    Hapus
                                </button>
                                @endcan
                            </div>

                            {{-- Modal Delete --}}
                            @can('sektor-perdagangan.delete')
                            <div class="modal fade" id="delete-sektor-perdagangan-{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Data?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus data tanggal <strong>{{ $item->tanggal }}</strong>?<br>
                                            <small>Data yang dihapus tidak bisa dikembalikan.</small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('perkembangan.produk-domestik.sektor-perdagangan.destroy', $item->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan
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
        $('#sektor-perdagangan-table').DataTable();
    });
</script>
@endpush
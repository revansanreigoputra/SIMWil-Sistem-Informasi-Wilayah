@extends('layouts.master')

@section('title', 'Daftar - SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN')

@section('action')
    @can('sektor-perdagangan-hotel-restoran.create')
    <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.create') }}" class="btn btn-primary mb-3">+ Data Baru</a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="perdagangan-hotel-restoran-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Perdagangan Besar (Jenis)</th>
                        <th>Perdagangan Kecil (Jenis)</th>
                        <th>Hotel (Unit)</th>
                        <th>Restoran (Unit)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $row->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $row->tanggal }}</td>
                        <td class="text-center">{{ $row->total_jenis_perdagangan_besar ?? 0 }}</td>
                        <td class="text-center">{{ $row->total_jenis_perdagangan_kecil ?? 0 }}</td>
                        <td class="text-center">{{ $row->total_penginapan ?? 0 }}</td>
                        <td class="text-center">{{ $row->total_tempat_konsumsi ?? 0 }}</td>
                        <td>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol untuk buka modal hapus -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-perdagangan-hotel-restoran-{{ $row->id }}">
                                Hapus
                            </button>

                            <!-- MODAL HAPUS -->
                            <div class="modal fade" id="delete-perdagangan-hotel-restoran-{{ $row->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Data sektor perdagangan, hotel, dan restoran tanggal 
                                                <strong>{{ $row->tanggal }}</strong> 
                                                akan dihapus dan tidak bisa dikembalikan.</p>
                                            <p>Yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END MODAL -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#perdagangan-hotel-restoran-table').DataTable();
    });
</script>
@endpush

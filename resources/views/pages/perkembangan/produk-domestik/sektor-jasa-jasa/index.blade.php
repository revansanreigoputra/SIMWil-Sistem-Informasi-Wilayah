@extends('layouts.master')

@section('title', 'Daftar - SEKTOR JASA-JASA')

@section('action')
    @can('sektor-jasa-jasa.create')
        <a href="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.create') }}" class="btn btn-primary mb-3">+ Data Baru</a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="jasa-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Jumlah Pelayanan Pemerintah</th>
                        <th>Jumlah Usaha Swasta</th>
                        <th>Jumlah Usaha Hiburan</th>
                        <th>Jumlah Jasa Perorangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $row->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $row->tanggal }}</td>
                        <td class="text-center">{{ $row->jumlah_pelayanan_pemerintah ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_usaha_swasta ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_usaha_hiburan ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_jasa_perorangan ?? 0 }}</td>
                        <td class="text-center">
                            <a href="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Hapus -->
                            <button type="button" class="btn btn-danger btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#delete-sektor-jasa-jasa-{{ $row->id }}">
                                Hapus
                            </button>

                            <!-- MODAL HAPUS -->
                            <div class="modal fade" id="delete-sektor-jasa-jasa-{{ $row->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Data sektor jasa-jasa tanggal 
                                                <strong>{{ $row->tanggal }}</strong> 
                                                akan dihapus dan tidak bisa dikembalikan.</p>
                                            <p>Yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        $('#jasa-table').DataTable();
    });
</script>
@endpush

@extends('layouts.master')

@section('title', 'Daftar - SEKTOR KEUANGAN JASA PERUSAHAAN')

@section('action')
    @can('sektor-keuangan-jasa-perusahaan.create')
        <a href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.create') }}" class="btn btn-primary mb-3">+ Data Baru</a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="jasa-keuangan-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Jumlah Transaksi <rb> Perbankan</th>
                        <th>Jumlah Lembaga <br> Bukan Bank</th>
                        <th>Jumlah Usaha Sewa</th>
                        <th>Jumlah Perusahaan Jasa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $row->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $row->tanggal }}</td>
                        <td class="text-center">{{ $row->jumlah_transaksi_perbankan ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_lembaga_bukan_bank ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_usaha_sewa ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_perusahaan_jasa ?? 0 }}</td>
                        <td class="text-center">
                            <a href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Hapus (Trigger Modal) -->
                            <button type="button" class="btn btn-danger btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#delete-sektor-keuangan-jasa-perusahaan-{{ $row->id }}">
                                Hapus
                            </button>

                            <!-- MODAL HAPUS -->
                            <div class="modal fade" id="delete-sektor-keuangan-jasa-perusahaan-{{ $row->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Data sektor keuangan dan jasa perusahaan tanggal 
                                                <strong>{{ $row->tanggal }}</strong> 
                                                akan dihapus dan tidak bisa dikembalikan.</p>
                                            <p>Yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.destroy', $row->id) }}" method="POST">
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
        $('#jasa-keuangan-table').DataTable();
    });
</script>
@endpush

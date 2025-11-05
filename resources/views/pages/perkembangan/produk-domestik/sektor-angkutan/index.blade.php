@extends('layouts.master')

@section('title', 'Daftar - SEKTOR ANGKUTAN & KOMUNIKASI')

@section('action')
    @can('sektor-angkutan.create')
        <a href="{{ route('perkembangan.produk-domestik.sektor-angkutan.create') }}" class="btn btn-primary mb-3">+ Data Baru</a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="angkutan-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Jumlah Kegiatan <br>Pengangkutan</th>
                        <th>Total Kendaraan <br>Angkutan</th>
                        <th>Nilai Transaksi <br>Pengangkutan (Rp)</th>
                        <th>Jumlah Kegiatan Komunikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $row->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                        <td class="text-center">{{ $row->jml_kegiatan_pengangkutan ?? 0 }}</td>
                        <td class="text-center">{{ $row->jml_total_kendaraan_angkutan ?? 0 }}</td>
                        <td class="text-center">{{ number_format($row->nilai_total_transaksi_pengangkutan ?? 0, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $row->jml_kegiatan_informasi_telekomunikasi ?? 0 }}</td>
                        <td class="text-center">
                            <a href="{{ route('perkembangan.produk-domestik.sektor-angkutan.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-angkutan.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol buka modal hapus -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-sektor-angkutan-{{ $row->id }}">
                                Hapus
                            </button>

                            <!-- MODAL HAPUS -->
                            <div class="modal fade" id="delete-sektor-angkutan-{{ $row->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Data sektor angkutan dan komunikasi tanggal 
                                                <strong>{{ $row->tanggal }}</strong> 
                                                akan dihapus dan tidak bisa dikembalikan.</p>
                                            <p>Yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('perkembangan.produk-domestik.sektor-angkutan.destroy', $row->id) }}" method="POST">
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
        $('#angkutan-table').DataTable();
    });
</script>
@endpush

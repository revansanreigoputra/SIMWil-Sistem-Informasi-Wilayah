@extends('layouts.master')

@section('title', 'Daftar - SEKTOR LISTRIK, GAS DAN AIR MINUM')

@section('action')
    <a href="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="listrik-gas-air-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Jumlah Kegiatan Listrik</th>
                        <th>Nilai Produksi Listrik</th>
                        <th>Jumlah Kegiatan Gas</th>
                        <th>Nilai Produksi Air</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $row->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $row->tanggal }}</td>
                        <td class="text-center">{{ $row->jumlah_kegiatan_listrik ?? 0 }}</td>
                        <td class="text-center">{{ $row->nilai_produksi_listrik ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_kegiatan_gas ?? 0 }}</td>
                        <td class="text-center">{{ $row->nilai_produksi_air ?? 0 }}</td>
                        <td class="text-center">
                            <a href="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol untuk buka modal hapus -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-sektor-listrik-gas-air-{{ $row->id }}">
                                Hapus
                            </button>

                            <!-- MODAL HAPUS -->
                            <div class="modal fade" id="delete-sektor-listrik-gas-air-{{ $row->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Data sektor listrik, gas, dan air minum tanggal 
                                                <strong>{{ $row->tanggal }}</strong> 
                                                akan dihapus dan tidak bisa dikembalikan.</p>
                                            <p>Yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.destroy', $row->id) }}" method="POST">
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

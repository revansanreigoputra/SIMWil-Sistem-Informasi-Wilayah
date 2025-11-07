@extends('layouts.master')

@section('title', 'Daftar - PERKEMBANGAN PASANGAN USIA SUBUR DAN KB')

@section('action')
    @can('pasangan-usia-subur.create')
        <a href="{{ route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.create') }}" class="btn btn-primary mb-3">
            + Data Baru
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="pasangan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Remaja Putri 12–17</th>
                        <th>Perempuan 15–49</th>
                        <th>Pasangan Usia Subur</th>
                        <th>Pengguna Suntik</th>
                        <th>Pengguna Pil</th>
                        <th>Pengguna Spiral</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->tanggal }}</td>
                            <td class="text-center">{{ $item->remaja_putri_12_17 }}</td>
                            <td class="text-center">{{ $item->perempuan_usia_subur_15_49 }}</td>
                            <td class="text-center">{{ $item->pasangan_usia_subur }}</td>
                            <td class="text-center">{{ $item->pengguna_kontrasepsi_suntik }}</td>
                            <td class="text-center">{{ $item->pengguna_kontrasepsi_pil }}</td>
                            <td class="text-center">{{ $item->pengguna_kontrasepsi_spiral }}</td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>

                                    @can('pasangan-usia-subur.update')
                                        <a href="{{ route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @endcan

                                    @can('pasangan-usia-subur.delete')
                                        <!-- Tombol buka modal -->
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $item->id }}">
                                            Hapus
                                        </button>
                                    @endcan
                                </div>

                                <!-- Modal Delete -->
                                @can('pasangan-usia-subur.delete')
                                    <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $item->id }}">Konfirmasi Hapus Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin ingin menghapus data tanggal <strong>{{ $item->tanggal }}</strong>?</p>
                                                    <p class="text-danger mb-0"><small>Data yang dihapus tidak bisa dikembalikan.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                   <form action="{{ route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
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
        $('#pasangan-table').DataTable();
    });
</script>
@endpush

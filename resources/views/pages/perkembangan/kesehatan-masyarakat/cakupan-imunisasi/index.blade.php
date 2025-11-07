@extends('layouts.master')

@section('title', 'Daftar - CAKUPAN IMUNISASI')

@section('action')
    @can('cakupan-imunisasi.create')
        <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.create') }}" class="btn btn-primary mb-3">
            + Data Baru
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="cakupan-imunisasi-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Bayi 2 Bln</th>
                        <th>DPT1+BCG+Polio1</th>
                        <th>Bayi 3 Bln</th>
                        <th>DPT2+Polio2</th>
                        <th>Bayi 4 Bln</th>
                        <th>DPT3+Polio3</th>
                        <th>Bayi 9 Bln</th>
                        <th>Campak</th>
                        <th>Cacar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cakupan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->tanggal }}</td>
                            <td class="text-center">{{ $item->bayi_usia_2_bulan }}</td>
                            <td class="text-center">{{ $item->bayi_2_bulan_dpt1_bcg_polio1 }}</td>
                            <td class="text-center">{{ $item->bayi_usia_3_bulan }}</td>
                            <td class="text-center">{{ $item->bayi_3_bulan_dpt2_polio2 }}</td>
                            <td class="text-center">{{ $item->bayi_usia_4_bulan }}</td>
                            <td class="text-center">{{ $item->bayi_4_bulan_dpt3_polio3 }}</td>
                            <td class="text-center">{{ $item->bayi_usia_9_bulan }}</td>
                            <td class="text-center">{{ $item->bayi_9_bulan_campak }}</td>
                            <td class="text-center">{{ $item->bayi_imunisasi_cacar }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    @can('cakupan-imunisasi.update')
                                    <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @endcan
                                    @can('cakupan-imunisasi.delete')
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-cakupan-imunisasi-{{ $item->id }}">Hapus</button>
                                    @endcan
                                </div>
                            </td>
                        </tr>

                        <!-- MODAL HAPUS -->
                        <div class="modal fade" id="delete-cakupan-imunisasi-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Data cakupan imunisasi tanggal 
                                            <strong>{{ $item->tanggal }}</strong> 
                                            akan dihapus dan tidak bisa dikembalikan.</p>
                                        <p>Yakin ingin menghapus data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $('#cakupan-imunisasi-table').DataTable();
    });
</script>
@endpush

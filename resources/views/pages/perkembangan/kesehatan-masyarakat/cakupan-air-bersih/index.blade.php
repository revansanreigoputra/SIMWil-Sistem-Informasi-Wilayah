@extends('layouts.master')

@section('title', 'Daftar - CAKUPAN PEMENUHAN KEBUTUHAN AIR BERSIH')

@section('action')
    @can('cakupan-air-bersih.create')
    <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="cakupan-air-bersih-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Sumur Gali</th>
                        <th>Pelanggan PAM</th>
                        <th>Air Kran / Perpipaan</th>
                        <th>Tidak Akses Air Laut</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cakupan as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $item->tanggal }}</td>
                        <td class="text-center">{{ $item->sumur_gali }}</td>
                        <td class="text-center">{{ $item->pelanggan_pam }}</td>
                        <td class="text-center">{{ $item->perpipaan_air_kran }}</td>
                        <td class="text-center">{{ $item->tidak_akses_air_laut }}</td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                {{-- Tombol Detail --}}
                                @can('cakupan-air-bersih.show')
                                <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.show', $item->id) }}" 
                                   class="btn btn-sm btn-info">
                                    Detail
                                </a>
                                @endcan

                                {{-- Tombol Edit --}}
                                @can('cakupan-air-bersih.update')
                                <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.edit', $item->id) }}" 
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                @endcan

                                {{-- Tombol Hapus --}}
                                @can('cakupan-air-bersih.delete')
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#delete-cakupan-air-bersih-{{ $item->id }}">
                                    Hapus
                                </button>
                                @endcan
                            </div>

                            {{-- MODAL DELETE --}}
                            @can('cakupan-air-bersih.delete')
                            <div class="modal fade" id="delete-cakupan-air-bersih-{{ $item->id }}" tabindex="-1" 
                                 aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $item->id }}">Hapus Data?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus data tanggal 
                                            <strong>{{ $item->tanggal }}</strong>?<br>
                                            <p>Data yang dihapus tidak bisa dikembalikan.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.destroy', $item->id) }}" method="POST">
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

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $cakupan->links() }}
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#cakupan-air-bersih-table').DataTable();
    });
</script>
@endpush

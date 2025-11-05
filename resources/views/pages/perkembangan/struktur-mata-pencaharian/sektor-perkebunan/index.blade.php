@extends('layouts.master')

@section('title', 'Daftar - MATA PENCAHARIAN SEKTOR PERKEBUNAN')

@section('action')
    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sektor-perkebunan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Karyawan Perusahaan Perkebunan</th>
                        <th>Pemilik Usaha Perkebunan</th>
                        <th>Buruh Perkebunan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->tanggal }}</td>
                            <td class="text-center">{{ $item->karyawan_perusahaan_perkebunan }}</td>
                            <td class="text-center">{{ $item->pemilik_usaha_perkebunan }}</td>
                            <td class="text-center">{{ $item->buruh_perkebunan }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-sektor-perkebunan-{{ $item->id }}">Hapus</button>
                                </div>
                            </td>
                        </tr>

                        <!-- MODAL HAPUS -->
                        <div class="modal fade" id="delete-sektor-perkebunan-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Data sektor perkebunan tanggal 
                                            <strong>{{ $item->tanggal }}</strong> 
                                            akan dihapus dan tidak bisa dikembalikan.</p>
                                        <p>Yakin ingin menghapus data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.destroy', $item->id) }}" method="POST">
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
        $('#sektor-perkebunan-table').DataTable();
    });
</script>
@endpush

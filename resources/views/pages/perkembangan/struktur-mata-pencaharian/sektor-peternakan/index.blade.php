@extends('layouts.master')

@section('title', 'Daftar - MATA PENCAHARIAN SEKTOR PETERNAKAN')

@section('action')
<a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.create') }}" class="btn btn-primary mb-3">
    + Data Baru
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sektor-peternakan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Peternakan Perorangan</th>
                        <th>Pemilik Usaha Peternakan</th>
                        <th>Buruh Peternakan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peternakan as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $item->tanggal }}</td>
                        <td class="text-center">{{ $item->peternakan_perorangan }}</td>
                        <td class="text-center">{{ $item->pemilik_usaha_peternakan }}</td>
                        <td class="text-center">{{ $item->buruh_peternakan }}</td>
                        <td class="text-center">{{ $item->jumlah }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-peternakan-{{ $item->id }}">
                                    Hapus
                                </button>
                            </div>

                            {{-- Modal Delete --}}
                            <div class="modal fade" id="delete-peternakan-{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Data?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus data tanggal <strong>{{ $item->tanggal }}</strong>?
                                            <p>Data yang dihapus tidak dapat dikembalikan.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.destroy', $item->id) }}" method="POST">
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
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#sektor-peternakan-table').DataTable();
    });
</script>
@endpush

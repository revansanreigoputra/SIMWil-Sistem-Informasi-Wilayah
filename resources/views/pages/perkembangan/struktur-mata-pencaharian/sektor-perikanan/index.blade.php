@extends('layouts.master')

@section('title', 'Daftar - MATA PENCAHARIAN SEKTOR PERIKANAN')

@section('action')
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
    + Data Baru
</button>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sektor-perikanan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Nelayan</th>
                        <th>Pemilik Usaha</th>
                        <th>Buruh</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perikanan as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $item->tanggal }}</td>
                        <td class="text-center">{{ $item->nelayan }}</td>
                        <td class="text-center">{{ $item->pemilik_usaha_perikanan }}</td>
                        <td class="text-center">{{ $item->buruh_perikanan }}</td>
                        <td class="text-center">{{ $item->jumlah }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perikanan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->id }}">Edit</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $item->id }}">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Create --}}
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perikanan.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nelayan (Orang)</label>
                    <input type="number" name="nelayan" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Pemilik Usaha Perikanan (Orang)</label>
                    <input type="number" name="pemilik_usaha_perikanan" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Buruh Perikanan (Orang)</label>
                    <input type="number" name="buruh_perikanan" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit & Delete (dipindahkan ke luar tabel) --}}
@foreach ($perikanan as $item)
<div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perikanan.update', $item->id) }}" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Perikanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
                </div>
                <div class="mb-3">
                    <label>Nelayan (Orang)</label>
                    <input type="number" name="nelayan" class="form-control" value="{{ $item->nelayan }}">
                </div>
                <div class="mb-3">
                    <label>Pemilik Usaha Perikanan (Orang)</label>
                    <input type="number" name="pemilik_usaha_perikanan" class="form-control" value="{{ $item->pemilik_usaha_perikanan }}">
                </div>
                <div class="mb-3">
                    <label>Buruh Perikanan (Orang)</label>
                    <input type="number" name="buruh_perikanan" class="form-control" value="{{ $item->buruh_perikanan }}">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perikanan.destroy', $item->id) }}" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data tanggal <strong>{{ $item->tanggal }}</strong>?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#sektor-perikanan-table').DataTable();
    });
</script>
@endpush

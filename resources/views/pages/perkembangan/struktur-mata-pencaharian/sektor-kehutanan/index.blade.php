@extends('layouts.master')

@section('title', 'Daftar - MATA PENCAHARIAN SEKTOR KEHUTANAN')

@section('action')
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
    + Data Baru
</button>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sektor-kehutanan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Pengumpul Hasil Hutan</th>
                        <th>Pemilik Usaha</th>
                        <th>Buruh Usaha</th>
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
                        <td class="text-center">{{ $item->pengumpul_hasil_hutan }}</td>
                        <td class="text-center">{{ $item->pemilik_usaha_hasil_hutan }}</td>
                        <td class="text-center">{{ $item->buruh_usaha_hasil_hutan }}</td>
                        <td class="text-center">{{ $item->jumlah }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-kehutanan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
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
        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-kehutanan.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Sektor Kehutanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Pengumpul Hasil Hutan (Orang)</label>
                    <input type="number" name="pengumpul_hasil_hutan" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Pemilik Usaha Hasil Hutan (Orang)</label>
                    <input type="number" name="pemilik_usaha_hasil_hutan" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Buruh Usaha Hasil Hutan (Orang)</label>
                    <input type="number" name="buruh_usaha_hasil_hutan" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Jumlah Total (Orang)</label>
                    <input type="number" name="jumlah" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit & Delete --}}
@foreach ($data as $item)
<div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-kehutanan.update', $item->id) }}" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Kehutanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
                </div>
                <div class="mb-3">
                    <label>Pengumpul Hasil Hutan (Orang)</label>
                    <input type="number" name="pengumpul_hasil_hutan" class="form-control" value="{{ $item->pengumpul_hasil_hutan }}">
                </div>
                <div class="mb-3">
                    <label>Pemilik Usaha Hasil Hutan (Orang)</label>
                    <input type="number" name="pemilik_usaha_hasil_hutan" class="form-control" value="{{ $item->pemilik_usaha_hasil_hutan }}">
                </div>
                <div class="mb-3">
                    <label>Buruh Usaha Hasil Hutan (Orang)</label>
                    <input type="number" name="buruh_usaha_hasil_hutan" class="form-control" value="{{ $item->buruh_usaha_hasil_hutan }}">
                </div>
                <div class="mb-3">
                    <label>Jumlah Total (Orang)</label>
                    <input type="number" name="jumlah" class="form-control" value="{{ $item->jumlah }}">
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
        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-kehutanan.destroy', $item->id) }}" method="POST" class="modal-content">
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
        $('#sektor-kehutanan-table').DataTable();
    });
</script>
@endpush

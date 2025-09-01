@extends('layouts.master')

@section('title', 'Detail Kecamatan')

@section('action')
@can('kecamatan.update')
<a href="{{ route('kecamatan.edit', $kecamatan->id) }}" class="btn btn-warning">Edit</a>
@endcan
@can('kecamatan.delete')
<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-kecamatan-{{ $kecamatan->id }}">
    Hapus
</button>
@endcan
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Informasi Kecamatan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Nama Kecamatan</label>
                            <p class="fw-semibold">{{ $kecamatan->nama_kecamatan }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Jumlah Desa</label>
                            <p class="fw-semibold">{{ $kecamatan->desas->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Jumlah Jabatan</label>
                            <p class="fw-semibold">{{ $kecamatan->jabatans->count() }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Dibuat Pada</label>
                            <p class="fw-semibold">{{ $kecamatan->created_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($kecamatan->desas->count() > 0)
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Daftar Desa</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Desa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecamatan->desas as $desa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $desa->nama_desa }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if($kecamatan->jabatans->count() > 0)
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Daftar Jabatan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecamatan->jabatans as $jabatan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jabatan->nama_jabatan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Delete Modal -->
@can('kecamatan.delete')
<div class="modal fade" id="delete-kecamatan-{{ $kecamatan->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Kecamatan?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Data kecamatan <strong>{{ $kecamatan->nama_kecamatan }}</strong> yang dihapus tidak bisa dikembalikan.</p>
                <p>Yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection

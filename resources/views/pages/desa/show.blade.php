@extends('layouts.master')

@section('title', 'Detail Desa')

@section('action')
@can('desa.update')
<a href="{{ route('desa.edit', $desa->id) }}" class="btn btn-warning">Edit</a>
@endcan
@can('desa.delete')
<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-desa-{{ $desa->id }}">
    Hapus
</button>
@endcan
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Informasi Desa</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Kode PUM</label>
                            <p class="fw-semibold">{{ $desa->kode_pum }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Nama Desa</label>
                            <p class="fw-semibold">{{ $desa->nama_desa }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Kecamatan</label>
                            <p class="fw-semibold">{{ $desa->kecamatan->nama_kecamatan ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status</label>
                            <p class="fw-semibold">{{ $desa->status }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Tipologi</label>
                            <p class="fw-semibold">{{ $desa->tipologi }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Kelurahan Terluar</label>
                            <p class="fw-semibold">{{ $desa->kelurahan_terluar ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Luas</label>
                            <p class="fw-semibold">{{ $desa->luas ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Bujur</label>
                            <p class="fw-semibold">{{ $desa->bujur ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Lintang</label>
                            <p class="fw-semibold">{{ $desa->lintang ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Ketinggian</label>
                            <p class="fw-semibold">{{ $desa->ketinggian ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Dibuat Pada</label>
                            <p class="fw-semibold">{{ $desa->created_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($desa->jabatans->count() > 0)
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
                            @foreach ($desa->jabatans as $jabatan)
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

@if($desa->perangkatDesas->count() > 0)
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Daftar Perangkat Desa</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($desa->perangkatDesas as $perangkat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $perangkat->nama }}</td>
                                    <td>{{ $perangkat->jabatan->nama_jabatan ?? '-' }}</td>
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
@can('desa.delete')
<div class="modal fade" id="delete-desa-{{ $desa->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Desa?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Data desa <strong>{{ $desa->nama_desa }}</strong> yang dihapus tidak bisa dikembalikan.</p>
                <p>Yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('desa.destroy', $desa->id) }}" method="POST">
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
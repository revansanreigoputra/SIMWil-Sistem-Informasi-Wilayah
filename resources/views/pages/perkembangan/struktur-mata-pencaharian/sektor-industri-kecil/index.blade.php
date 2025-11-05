@extends('layouts.master')

@section('title', 'Daftar - SEKTOR INDUSTRI KECIL / KERAJINAN RUMAH TANGGA')

@section('action')
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal">
        + Data Baru
    </button>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table-industri" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Mata Pencaharian</th>
                        <th>Jumlah (Orang)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class>{{ $loop->iteration }}</td>
                            <td class>{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class>{{ $item->tanggal }}</td>
                            <td class>{{ $item->mataPencaharian->mata_pencaharian ?? '-' }}</td>
                            <td class>{{ $item->jumlah }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    <button type="button"
                                        class="btn btn-sm btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#formModal"
                                        data-id="{{ $item->id }}"
                                        data-tanggal="{{ $item->tanggal }}"
                                        data-mata_pencaharian="{{ $item->mata_pencaharian }}"
                                        data-jumlah="{{ $item->jumlah }}">
                                        Edit
                                    </button>
                                    <button type="button"
                                        class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $item->id }}">
                                        Hapus
                                    </button>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Yakin ingin menghapus data tanggal <strong>{{ $item->tanggal }}</strong>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
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

<!-- Modal Create/Edit -->
<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="dataForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Tambah Data Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" id="methodField" value="POST">

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                <label for="mata_pencaharian_id">Mata Pencaharian *</label>
                <select name="mata_pencaharian_id" id="mata_pencaharian_id" class="form-control" required>
                    <option value="">Pilih Mata Pencaharian</option>
                    @foreach ($mataPencaharians as $mp)
                        <option value="{{ $mp->id }}">{{ $mp->mata_pencaharian }}</option>
                    @endforeach
                </select>
            </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah (Orang)</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#sektor-industri-kecil-table').DataTable();
    });
</script>
@endpush
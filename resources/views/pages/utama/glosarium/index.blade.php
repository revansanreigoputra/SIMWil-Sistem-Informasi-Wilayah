@extends('layouts.master')

@section('title', 'Glosarium')

@section('action')
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#create-glosarium">
        Tambah Glosari
    </button>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="glosarium-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Istilah</th>
                            <th>Deskripsi</th>
                            <th>Diupload / Diupdate</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($glosarium as $g)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $g['istilah'] }}</td>
                                <td>{{ $g['deskripsi'] }}</td>
                                <td>{{ $g['diupload'] }} ({{ $g['tanggal'] }})</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Edit --}}
                                        <button class="btn btn-sm btn-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#edit-glosarium-{{ $g['id'] }}">
                                            Edit
                                        </button>
                                        {{-- Hapus --}}
                                        <button class="btn btn-sm btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#delete-glosarium-{{ $g['id'] }}">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal Edit --}}
                            <div class="modal fade" id="edit-glosarium-{{ $g['id'] }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Glosari</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="#">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="id" value="{{ $g['id'] }}">

                                                <div class="mb-3">
                                                    <label class="form-label">Istilah</label>
                                                    <input type="text" name="istilah" class="form-control"
                                                        value="{{ $g['istilah'] }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" rows="3" required>{{ $g['deskripsi'] }}</textarea>
                                                </div>

                                                <div class="d-flex gap-2">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Hapus --}}
                            <div class="modal fade" id="delete-glosarium-{{ $g['id'] }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Glosari</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <b>{{ $g['istilah'] }}</b> ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="#">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data glosarium.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="create-glosarium" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Glosari</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Istilah</label>
                            <input type="text" name="istilah" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#glosarium-table').DataTable();
        });
    </script>
@endpush

@extends('layouts.master')

@section('title', 'Data Kartu Keluarga')

@section('action')
    <a href="{{ route('data_keluarga.create') }}" class="btn btn-primary mb-3">+ Kartu Keluarga</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
           

            <div class="table-responsive">
                <table id="kk-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataKeluarga as $kk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kk->no_kk }}</td>
                                <td>{{ $kk->kepala_keluarga }}</td>
                                <td>{{ $kk->alamat }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Detail --}}
                                        <a href="#" class="btn btn-sm btn-info">Detail</a>

                                        {{-- Edit --}}
                                        <a href="{{ route('data_keluarga.edit', $kk->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        {{-- Hapus dengan modal --}}
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-kk-{{ $kk->id }}">
                                            Hapus
                                        </button>
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-kk-{{ $kk->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data Kartu Keluarga?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Nomor KK <strong>{{ $kk->no_kk }}</strong> akan dihapus
                                                        dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('data_keluarga.destroy', $kk->id) }}"
                                                        method="POST">
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
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Kartu Keluarga masih kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#kk-table').DataTable();
        });
    </script>
@endpush

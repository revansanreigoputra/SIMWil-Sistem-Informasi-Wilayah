@extends('layouts.master')

@section('title', 'Data Anggota Keluarga')

@section('action')
    <a href="{{ route('anggota_keluarga.create') }}" class="btn btn-primary mb-3">+ Anggota Keluarga</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table id="anggota-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Hubungan</th>
                            <th>No. KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggotaKeluargas as $anggota)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $anggota->nik }}</td>
                                <td>{{ $anggota->nama_lengkap }}</td>
                                <td>{{ $anggota->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $anggota->hubungan_keluarga }}</td>
                                <td>{{ $anggota->kartuKeluarga->no_kk ?? 'N/A' }}</td>
                                <td>{{ $anggota->kartuKeluarga->kepala_keluarga ?? 'N/A' }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Detail --}}
                                        <a href="#" class="btn btn-sm btn-info">Detail</a>


                                        <a href="{{ route('anggota_keluarga.edit', $anggota->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        {{-- Hapus dengan modal --}}
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-anggota-{{ $anggota->id }}">
                                            Hapus
                                        </button>
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-anggota-{{ $anggota->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data Anggota?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data anggota <strong>{{ $anggota->nama_lengkap }}</strong> akan
                                                        dihapus dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    {{-- Hapus --}}
                                                    <form action="{{ route('anggota_keluarga.destroy', $anggota->id) }}"
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
                                <td colspan="8" class="text-center">Data anggota keluarga masih kosong.</td>
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
            $('#anggota-table').DataTable();
        });
    </script>
@endpush

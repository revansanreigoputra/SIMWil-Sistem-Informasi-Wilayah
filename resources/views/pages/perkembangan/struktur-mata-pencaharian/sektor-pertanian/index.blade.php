@extends('layouts.master')

@section('title', 'Daftar - MATA PENCAHARIAN SEKTOR PERTANIAN')

@section('action')
    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sektor-pertanian-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Petani (Orang)</th>
                        <th>Pemilik Usaha Tani (Orang)</th>
                        <th>Buruh Tani (Orang)</th>
                        <th>Jumlah (Orang)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->tanggal }}</td>
                            <td class="text-center">{{ $item->petani }}</td>
                            <td class="text-center">{{ $item->pemilik_usaha_tani }}</td>
                            <td class="text-center">{{ $item->buruh_tani }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.show', $item->id) }}" class="btn btn-sm btn-info">
                                        Detail
                                    </a>
                                    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <!-- Tombol Hapus (Trigger Modal) -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-pertanian-{{ $item->id }}">
                                        Hapus
                                    </button>
                                </div>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="delete-pertanian-{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Hapus Data Sektor Pertanian?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Data sektor pertanian pada
                                                    <strong>{{ $item->tanggal }}</strong> yang dihapus tidak bisa dikembalikan.
                                                </p>
                                                <p>Yakin ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.destroy', $item->id) }}"
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
        $('#sektor-pertanian-table').DataTable();
    });
</script>
@endpush

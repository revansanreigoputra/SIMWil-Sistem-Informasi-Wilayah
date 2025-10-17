@extends('layouts.master')

@section('title', 'Daftar - PERKEMBANGAN SARANA DAN PRASARANA KESEHATAN MASYARAKAT')

@section('action')
    @can('sarana-prasarana.create')
    <a href="{{ route('perkembangan.kesehatan-masyarakat.sarana-prasarana.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sarana-prasarana-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Fasilitas Umum</th>
                        <th>Tenaga Kesehatan Aktif</th>
                        <th>Kader Keluarga & Lapangan</th>
                        <th>Dokumentasi Posyandu</th>
                        <th>Kegiatan Kesehatan</th>
                        <th>Kegiatan Lingkungan</th>
                        <th>Kegiatan Lainnya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $item->tanggal }}</td>
                        <td class="text-center">{{ $item->fasilitas_umum }}</td>
                        <td class="text-center">{{ $item->tenaga_kesehatan_aktif }}</td>
                        <td class="text-center">{{ $item->kader_keluarga_lapangan }}</td>
                        <td class="text-center">{{ $item->dokumentasi_posyandu }}</td>
                        <td class="text-center">{{ $item->kegiatan_kesehatan }}</td>
                        <td class="text-center">{{ $item->kegiatan_lingkungan }}</td>
                        <td class="text-center">{{ $item->kegiatan_lainnya }}</td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                {{-- Tombol Detail --}}
                                <a href="{{ route('perkembangan.kesehatan-masyarakat.sarana-prasarana.show', $item->id) }}" 
                                   class="btn btn-sm btn-info">
                                    Detail
                                </a>

                                {{-- Tombol Edit --}}
                                @can('sarana-prasarana.update')
                                <a href="{{ route('perkembangan.kesehatan-masyarakat.sarana-prasarana.edit', $item->id) }}" 
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                @endcan

                                {{-- Tombol Hapus --}}
                                @can('sarana-prasarana.delete')
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#delete-sarana-prasarana-{{ $item->id }}">
                                    Hapus
                                </button>
                                @endcan
                            </div>

                            {{-- MODAL DELETE --}}
                            @can('sarana-prasarana.delete')
                            <div class="modal fade" id="delete-sarana-prasarana-{{ $item->id }}" tabindex="-1" 
                                 aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $item->id }}">Hapus Data?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus data tanggal 
                                            <strong>{{ $item->tanggal }}</strong>?<br>
                                            <p>Data yang dihapus tidak bisa dikembalikan.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('perkembangan.kesehatan-masyarakat.sarana-prasarana.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan
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
        $('#sarana-prasarana-table').DataTable();
    });
</script>
@endpush

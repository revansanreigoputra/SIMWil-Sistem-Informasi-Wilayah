@extends('layouts.master')

@section('title', 'Daftar - PERILAKU HIDUP BERSIH DAN SEHAT')

@section('action')
    @can('perilaku-hidup-bersih-dan-sehat.create')
    <a href="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="phbs-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Keluarga WC Sehat</th>
                        <th>Keluarga WC Tidak Standar</th>
                        <th>Buang Air di Sungai</th>
                        <th>Fasilitas MCK Umum</th>
                        <th>Dukun Terlatih</th>
                        <th>Tenaga Kesehatan</th>
                        <th>Obat Tradisional</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $item->tanggal }}</td>
                        <td class="text-center">{{ $item->keluarga_wc_sehat }}</td>
                        <td class="text-center">{{ $item->keluarga_wc_tidak_standar }}</td>
                        <td class="text-center">{{ $item->keluarga_buang_air_sungai }}</td>
                        <td class="text-center">{{ $item->keluarga_mck_umum }}</td>
                        <td class="text-center">{{ $item->dukun_terlatih }}</td>
                        <td class="text-center">{{ $item->tenaga_kesehatan }}</td>
                        <td class="text-center">{{ $item->obat_tradisional_dukun }}</td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                @can('perilaku-hidup-bersih-dan-sehat.show')
                                <a href="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                @endcan
                                @can('perilaku-hidup-bersih-dan-sehat.update')
                                <a href="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan
                                @can('perilaku-hidup-bersih-dan-sehat.delete')
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete-phbs-{{ $item->id }}">Hapus</button>
                                @endcan
                            </div>

                            @can('perilaku-hidup-bersih-dan-sehat.delete')
                            <div class="modal fade" id="delete-phbs-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Data?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus data tanggal <strong>{{ $item->tanggal }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.destroy', $item->id) }}" method="POST">
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

        <div class="d-flex justify-content-center mt-3">
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#phbs-table').DataTable();
    });
</script>
@endpush

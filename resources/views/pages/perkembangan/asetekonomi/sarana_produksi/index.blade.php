@extends('layouts.master')

@section('title', 'Data Sarana Produksi')

@section('action')
    @can('sarana_produksi.create')
        <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.create') }}" class="btn btn-primary">
            Tambah Data Sarana Produksi
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sarana-table" class="table table-striped table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Penggilingan Padi</th>
                        <th>Traktor</th>
                        <th>Kapal Penangkap Ikan</th>
                        <th>Pengolahan Hasil Perikanan</th>
                        <th>Pengolahan Hasil Peternakan</th>
                        <th>Pengolahan Hasil Perkebunan</th>
                        <th>Pengolahan Hasil Hutan</th>
                        <th>Pertambangan</th>
                        <th>Pariwisata</th>
                        <th>Industri Jasa Perdagangan</th>
                        <th>Industri Kerajinan</th>
                        <th>Industri Migas</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $item)
                        <tr class="text-center">
                            <td>{{ $data->firstItem() + $index }}</td>
                            <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                            @for($i = 1; $i <= 12; $i++)
                                <td><span class="badge bg-info">{{ $item->{'produksi'.$i} ?? 0 }}</span></td>
                            @endfor
                            <td><span class="badge bg-primary">{{ $item->produksi13 ?? $item->jumlah }}</span></td>
                            <td>
                                @canany(['sarana_produksi.view','sarana_produksi.update','sarana_produksi.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('sarana_produksi.view')
                                            <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.show', $item->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                                        @endcan
                                        @can('sarana_produksi.update')
                                            <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @endcan
                                        @can('sarana_produksi.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-sarana-{{ $item->id }}">Hapus</button>
                                        @endcan
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-sarana-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <p>Data tanggal <strong>{{ $item->tanggal }}</strong> dari desa <strong>{{ $item->desa->nama_desa ?? '-' }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.asetekonomi.sarana_produksi.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted">Tidak ada aksi</span>
                                @endcanany
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="17" class="text-center">Data masih kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if (method_exists($data, 'links'))
            <div class="d-flex justify-content-center mt-3">
                {{ $data->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#sarana-table').DataTable();
    });
</script>
@endpush

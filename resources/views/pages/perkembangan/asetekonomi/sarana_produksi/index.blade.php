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
                    @foreach ($data as $index => $item)
                        <tr class="text-center">
                            {{-- nomor: cek apakah $data adalah paginated atau collection biasa --}}
                            <td>
                                {{ method_exists($data, 'firstItem') ? $data->firstItem() + $index : $loop->iteration }}
                            </td>

                            <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>

                            <td><span class="badge bg-primary">{{ $item->produksi1 }}</span></td>
                            <td><span class="badge bg-info">{{ $item->produksi2 }}</span></td>
                            <td><span class="badge bg-warning text-dark">{{ $item->produksi3 }}</span></td>
                            <td><span class="badge bg-secondary">{{ $item->produksi4 }}</span></td>
                            <td><span class="badge bg-success">{{ $item->produksi5 }}</span></td>
                            <td><span class="badge bg-dark">{{ $item->produksi6 }}</span></td>
                            <td><span class="badge bg-primary">{{ $item->produksi7 }}</span></td>
                            <td><span class="badge bg-info">{{ $item->produksi8 }}</span></td>
                            <td><span class="badge bg-warning text-dark">{{ $item->produksi9 }}</span></td>
                            <td><span class="badge bg-secondary">{{ $item->produksi10 }}</span></td>
                            <td><span class="badge bg-success">{{ $item->produksi11 }}</span></td>
                            <td><span class="badge bg-dark">{{ $item->produksi12 }}</span></td>
                            <td><span class="badge bg-primary">{{ $item->produksi13 ?? $item->jumlah }}</span></td>

                            <td>
                                @canany(['sarana_produksi.view','sarana_produksi.update','sarana_produksi.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('sarana_produksi.view')
                                            <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.show', $item->id) }}" 
                                               class="btn btn-sm btn-info text-white">
                                                Detail
                                            </a>
                                        @endcan
                                        @can('sarana_produksi.update')
                                            <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.edit', $item->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('sarana_produksi.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-sarana-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-sarana-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <p>Data tanggal <strong>{{ $item->tanggal }}</strong> dari desa <strong>{{ $item->desa->nama_desa ?? '-' }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
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
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- pagination hanya tampil kalau $data dipagination --}}
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
        $('#sarana-table').DataTable({
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Tidak ada data ditemukan",
                "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak ada data tersedia",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
@endpush

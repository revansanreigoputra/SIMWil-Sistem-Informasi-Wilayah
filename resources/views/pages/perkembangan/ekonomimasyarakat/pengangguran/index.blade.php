@extends('layouts.master')

@section('title', 'Data Pengangguran')

@section('action')
    @can('pengangguran.create')
        <a href="{{ route('perkembangan.ekonomimasyarakat.pengangguran.create') }}" class="btn btn-primary">
            Tambah Data Pengangguran
        </a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="pengangguran-table" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Kecamatan</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Angkatan Kerja</th>
                        <th class="text-center">Bekerja</th>
                        <th class="text-center">Tidak Bekerja</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penganggurans as $index => $pengangguran)
                        <tr>
                            <td class="text-center">{{ $penganggurans->firstItem() + $index }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($pengangguran->tanggal)->format('d/m/Y') }}</td>
                            <td class="text-center">{{ $pengangguran->kecamatan->nama_kecamatan ?? '-' }}</td>
                            <td class="text-center">{{ $pengangguran->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center"><span class="badge bg-primary">{{ $pengangguran->angkatan_kerja }}</span></td>
                            <td class="text-center"><span class="badge bg-success">{{ $pengangguran->bekerja }}</span></td>
                            <td class="text-center"><span class="badge bg-danger">{{ $pengangguran->tidak_bekerja }}</span></td>
                            <td>
                                @canany(['pengangguran.view','pengangguran.update','pengangguran.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('pengangguran.view')
                                            <a href="{{ route('perkembangan.ekonomimasyarakat.pengangguran.show', $pengangguran->id) }}" 
                                               class="btn btn-sm btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                    <circle cx="12" cy="12" r="3"/>
                                                </svg>
                                                Detail
                                            </a>
                                        @endcan
                                        @can('pengangguran.update')
                                            <a href="{{ route('perkembangan.ekonomimasyarakat.pengangguran.edit', $pengangguran->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/>
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/>
                                                    <path d="M16 5l3 3"/>
                                                </svg>
                                                Edit
                                            </a>
                                        @endcan
                                        @can('pengangguran.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-pengangguran-{{ $pengangguran->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M4 7l16 0"/>
                                                    <path d="M10 11l0 6"/>
                                                    <path d="M14 11l0 6"/>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-pengangguran-{{ $pengangguran->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data Pengangguran?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data tanggal <strong>{{ $pengangguran->tanggal }}</strong> akan dihapus
                                                        dan tidak bisa dikembalikan.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.ekonomimasyarakat.pengangguran.destroy', $pengangguran->id) }}" method="POST">
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
                            <td colspan="8" class="text-center">Tidak ada data pengangguran</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $penganggurans->links() }}
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#pengangguran-table').DataTable();
    });
</script>
@endpush

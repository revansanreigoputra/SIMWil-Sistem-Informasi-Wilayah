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
                        <th class="text-center">Desa</th>
                        <th class="text-center">Angkatan Kerja</th>
                        <th class="text-center">Bekerja</th>
                        <th class="text-center">Tidak Bekerja</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penganggurans as $index => $pengangguran)
                        <tr>
                            <td class="text-center">{{ $penganggurans->firstItem() + $index }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($pengangguran->tanggal)->format('d/m/Y') }}</td>
                            <td class="text-center">{{ $pengangguran->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center"><span class="badge bg-primary">{{ $pengangguran->angkatan_kerja }}</span></td>
                            <td class="text-center"><span class="badge bg-success">{{ $pengangguran->bekerja }}</span></td>
                            <td class="text-center"><span class="badge bg-danger">{{ $pengangguran->tidak_bekerja }}</span></td>
                            <td>
                                @canany(['pengangguran.view','pengangguran.update','pengangguran.delete'])
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('pengangguran.view')
                                            <a href="{{ route('perkembangan.ekonomimasyarakat.pengangguran.show', $pengangguran->id) }}" class="btn btn-sm btn-info">Detail</a>
                                        @endcan
                                        @can('pengangguran.update')
                                            <a href="{{ route('perkembangan.ekonomimasyarakat.pengangguran.edit', $pengangguran->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @endcan
                                        @can('pengangguran.delete')
                                            <form action="{{ route('perkembangan.ekonomimasyarakat.pengangguran.destroy', $pengangguran->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        @endcan
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

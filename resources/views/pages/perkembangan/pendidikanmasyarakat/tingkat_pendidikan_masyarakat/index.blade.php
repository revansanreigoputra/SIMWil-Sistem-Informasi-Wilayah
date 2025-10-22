@extends('layouts.master')

@section('title', 'Tingkat Pendidikan Masyarakat')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">Tingkat Pendidikan Masyarakat</h4>
        <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.create') }}" class="btn btn-primary">
            + Tambah Data
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr class="text-center">
                    <th>No</th>
                    <th>Desa</th>
                    <th>Tahun</th>
                    <th>Tidak Tamat SD</th>
                    <th>SD</th>
                    <th>SLTP</th>
                    <th>SLTA</th>
                    <th>Diploma</th>
                    <th>Sarjana</th>
                    <th>% Buta</th>
                    <th>% Tamat</th>
                    <th>% Cacat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + $items->firstItem() }}</td>
                        <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->tidak_tamat_sd ?? '-' }}</td>
                        <td>{{ $item->sd ?? '-' }}</td>
                        <td>{{ $item->sltp ?? '-' }}</td>
                        <td>{{ $item->slta ?? '-' }}</td>
                        <td>{{ $item->diploma ?? '-' }}</td>
                        <td>{{ $item->sarjana ?? '-' }}</td>
                        <td>{{ $item->p_buta ?? '-' }}</td>
                        <td>{{ $item->p_tamat ?? '-' }}</td>
                        <td>{{ $item->p_cacat ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.show', $item->id) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="text-center">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $items->links() }}
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Data Wajib Belajar 9 Tahun')

@section('action')
    <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.create') }}" class="btn btn-primary">
        Tambah Data
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Desa</th>
                    <th>Tanggal</th>
                    <th>Penduduk (7–15 th)</th>
                    <th>Masih Sekolah</th>
                    <th>Tidak Sekolah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->penduduk }}</td>
                        <td>{{ $item->masih_sekolah }}</td>
                        <td>{{ $item->tidak_sekolah }}</td>
                        <td>
                            <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.edit', $item->id) }}" 
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.destroy', $item->id) }}" 
                                  method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $items->links() }}
    </div>
</div>
@endsection

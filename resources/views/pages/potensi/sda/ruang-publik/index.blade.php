@extends('layouts.master')

@section('title', 'Data Ruang Publik')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="card-title mb-0">Data Ruang Publik</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('ruang_publik.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Tambah
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Keberadaan</th>
                        <th>Luas (m2)</th>
                        <th>Tingkat Pemanfaatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->tanggal->format('d F Y') }}</td>
                            <td>{{ $item->ruangPublik->nama ?? '-' }}</td>
                            <td>{{ ucfirst($item->keberadaan) }}</td>
                            <td>{{ number_format($item->luas_m2, 2, ',', '.') }}</td>
                            <td>{{ ucfirst($item->tingkat_pemanfaatan) }}</td>
                            <td>
                                <a href="{{ route('ruang_publik.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('ruang_publik.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('ruang_publik.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

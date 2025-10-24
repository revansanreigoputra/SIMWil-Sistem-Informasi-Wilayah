@extends('layouts.master')

@section('title', 'Data Lembaga Pendidikan Formal')

@section('action')
    <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="pendidikan-table" class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Jenis Sekolah</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->kategori->nama ?? '-' }}</td>
                                <td>{{ $item->jenisSekolah->nama ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.show', $item->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.edit', $item->id) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <button class="btn btn-sm btn-success"
                                            onclick="downloadAndOpen({{ $item->id }})">
                                            <i class="bi bi-printer"></i> Print
                                        </button>
                                        <form action="{{ route('potensi.potensi-kelembagaan.pendidikan.destroy', $item->id) }}" 
                                              method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted">Belum ada data lembaga pendidikan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#pendidikan-table').DataTable();
        });
        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/pendidikan/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/pendidikan/${id}/print`;

            const a = document.createElement('a');
            a.href = downloadUrl;
            a.download = '';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);

            setTimeout(() => {
                window.open(previewUrl, '_blank');
            }, 1500);
        }
    </script>
@endpush

@extends('layouts.master')

@section('title', 'Data Usaha Jasa, Hiburan, dll')

@section('action')
    <a href="{{ route('potensi.potensi-kelembagaan.hiburan.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="hiburan-table" class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Jenis Usaha</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hiburan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->kategori->nama ?? '-' }}</td>
                                <td>{{ $item->jenisUsaha->nama ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('potensi.potensi-kelembagaan.hiburan.show', $item->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>

                                        <a href="{{ route('potensi.potensi-kelembagaan.hiburan.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <button class="btn btn-sm btn-success"
                                            onclick="downloadAndOpen({{ $item->id }})">
                                            <i class="bi bi-printer"></i> Print
                                        </button>

                                        <form
                                            action="{{ route('potensi.potensi-kelembagaan.hiburan.destroy', $item->id) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                                <td colspan="8" class="text-center text-muted">Belum ada data usaha hiburan</td>
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
            $('#hiburan-table').DataTable();
        });

        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/hiburan/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/hiburan/${id}/print`;

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

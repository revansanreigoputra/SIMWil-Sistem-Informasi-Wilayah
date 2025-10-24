@extends('layouts.master')

@section('title', 'Data Lembaga Ekonomi')

@section('action')
    <a href="{{ route('potensi.potensi-kelembagaan.ekonomi.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            <div class="table-responsive">
                <table id="ekonomi-table" class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori Lembaga</th>
                            <th>Jenis Lembaga</th>
                            <th>Jumlah</th>
                            <th>Jumlah Kegiatan</th>
                            <th>Jumlah Pengurus</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->kategori->nama ?? '-' }}</td>
                                <td>{{ $item->jenis->nama ?? '-' }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->jumlah_kegiatan }}</td>
                                <td>{{ $item->jumlah_pengurus }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('potensi.potensi-kelembagaan.ekonomi.show', $item->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('potensi.potensi-kelembagaan.ekonomi.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                       <button class="btn btn-sm btn-success"
                                            onclick="downloadAndOpen({{ $item->id }})">
                                            <i class="bi bi-printer"></i> Print
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $item->id }}">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </div>

                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data dengan tanggal
                                                        <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong>
                                                        akan dihapus permanen.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('potensi.potensi-kelembagaan.ekonomi.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada data lembaga ekonomi.</td>
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
            $('#ekonomi-table').DataTable();
        });
        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/ekonomi/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/ekonomi/${id}/print`;

            // Download PDF
            const a = document.createElement('a');
            a.href = downloadUrl;
            a.download = '';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);

            // Preview PDF
            setTimeout(() => {
                window.open(previewUrl, '_blank');
            }, 1500);
        }
    </script>
@endpush

@extends('layouts.master')

@section('title', 'Data Lembaga Keamanan')

@section('action')
    <a href="{{ route('potensi.potensi-kelembagaan.keamanan.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 fw-bold">Data Lembaga Keamanan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="keamanan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Keberadaan Hansip & Linmas</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->keberadaan_hansip_linmas }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('potensi.potensi-kelembagaan.keamanan.show', $item->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('potensi.potensi-kelembagaan.keamanan.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <button class="btn btn-sm btn-success"
                                            onclick="downloadAndOpen({{ $item->id }})">
                                            <i class="bi bi-printer"></i> Print
                                        </button>
                                        <form
                                            action="{{ route('potensi.potensi-kelembagaan.keamanan.destroy', $item->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#keamanan-table').DataTable();
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 2000);
        });

        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/keamanan/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/keamanan/${id}/print`;

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

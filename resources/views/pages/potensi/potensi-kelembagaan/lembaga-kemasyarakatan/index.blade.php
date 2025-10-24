@extends('layouts.master')

@section('title', 'Data Lembaga Kemasyarakatan')

@section('action')
    @can('lembaga-kemasyarakatan.create')
        <a href="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table id="kemasyarakatan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis Lembaga</th>
                            <th>Dasar Hukum Pembentukan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->jenisLembaga->nama ?? '-' }}</td>
                                <td>{{ $item->dasarHukum->nama ?? '-' }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">

                                        @can('lembaga-kemasyarakatan.show')
                                            <a href="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.show', $item->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                        @endcan

                                        @can('lembaga-kemasyarakatan.edit')
                                            <a href="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        @endcan

                                        @can('lembaga-kemasyarakatan.print')
                                           <button class="btn btn-sm btn-success"
                                            onclick="downloadAndOpen({{ $item->id }})">
                                            <i class="bi bi-printer"></i> Print
                                        </button>
                                        @endcan

                                        @can('lembaga-kemasyarakatan.destroy')
                                            <form
                                                action="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.destroy', $item->id) }}"
                                                method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data lembaga kemasyarakatan</td>
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
            $('#kemasyarakatan-table').DataTable();
        });
        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/lembaga-kemasyarakatan/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/lembaga-kemasyarakatan/${id}/print`;

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

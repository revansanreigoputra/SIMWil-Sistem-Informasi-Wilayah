@extends('layouts.master')

@section('title', 'Data Usaha Jasa Pengangkutan')

@section('action')
    <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table id="pengangkutan-table" class="table table-striped align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Jenis Angkutan</th>
                            <th>Jumlah Unit</th>
                            <th>Jumlah Pemilik</th>
                            <th>Kapasitas</th>
                            <th>Tenaga Kerja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->jenis_angkutan }}</td>
                                <td>{{ $item->jumlah_unit }}</td>
                                <td>{{ $item->jumlah_pemilik }}</td>
                                <td>{{ $item->kapasitas }}</td>
                                <td>{{ $item->tenaga_kerja }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.show', $item->id) }}"
                                            class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Detail</a>
                                        <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>

                                        <button class="btn btn-sm btn-success"
                                            onclick="downloadAndOpen({{ $item->id }})">
                                            <i class="bi bi-printer"></i> Print
                                        </button>
                                        <form action="{{ route('potensi.potensi-kelembagaan.pengangkutan.destroy', $item->id) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Belum ada data pengangkutan</td>
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
            $('#pengangkutan-table').DataTable();
            setTimeout(() => $('.alert-success').fadeOut('slow'), 2000);
        });
        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/pengangkutan/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/pengangkutan/${id}/print`;

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

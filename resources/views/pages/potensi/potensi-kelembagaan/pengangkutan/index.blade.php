@extends('layouts.master')

@section('title', 'Data Usaha Jasa Pengangkutan')

@section('action')
    {{-- Tombol "Tambah Data" hanya muncul jika pengguna punya izin 'create-pengangkutan' --}}
    @can('create-pengangkutan')
        <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
    @endcan
@endsection

@section('content')
    {{-- Memeriksa izin untuk melihat seluruh halaman/tabel --}}
    @can('view-pengangkutan')
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
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->jenis_angkutan }}</td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            {{-- Tombol Detail (izinnya sama dengan view) --}}
                                            <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.show', $item->id) }}"
                                                class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Detail</a>

                                            {{-- Tombol Edit hanya muncul jika punya izin 'edit-pengangkutan' --}}
                                            @can('edit-pengangkutan', $item)
                                                <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                            @endcan

                                            {{-- Tombol Print hanya muncul jika punya izin 'print-pengangkutan' --}}
                                            @can('print-pengangkutan', $item)
                                                <button class="btn btn-sm btn-success"
                                                    onclick="downloadAndOpen({{ $item->id }})">
                                                    <i class="bi bi-printer"></i> Print
                                                </button>
                                            @endcan

                                            {{-- Tombol Hapus hanya muncul jika punya izin 'delete-pengangkutan' --}}
                                            @can('delete-pengangkutan', $item)
                                                <form action="{{ route('potensi.potensi-kelembagaan.pengangkutan.destroy', $item->id) }}"
                                                    method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            @endcan
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
    @else
        {{-- Pesan jika pengguna tidak punya izin sama sekali untuk melihat data --}}
        <div class="alert alert-danger text-center">
            <h4 class="alert-heading">Akses Ditolak!</h4>
            <p>Maaf, Anda tidak memiliki izin untuk melihat data ini. Silakan hubungi Administrator.</p>
        </div>
    @endcan
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
            a.download = `data-pengangkutan-${id}.pdf`; // Memberi nama file
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);

            // Buka tab baru untuk preview/print setelah jeda singkat
            setTimeout(() => {
                window.open(previewUrl, '_blank');
            }, 1000); // Mengurangi delay agar lebih responsif
        }
    </script>
@endpush
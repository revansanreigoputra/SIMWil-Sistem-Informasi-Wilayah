@extends('layouts.master')

@section('title', 'Data Partisipasi Politik')

@section('action')
    @can('lembaga-politik.create')
        <a href="{{ route('potensi.potensi-kelembagaan.politik.create') }}" class="btn btn-primary mb-3">
           <i class="bi bi-plus-circle"></i>Tambah Data
        </a>
    @endcan
@endsection

@section('content')
@can('lembaga-politik.view')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="politik-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Partisipasi Politik</th>
                            <th>Jumlah Wanita Hak Pilih</th>
                            <th>Jumlah Pria Hak Pilih</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->partisipasiPolitik->nama ?? '-' }}</td>
                                <td>{{ $item->jumlah_wanita_hak_pilih }}</td>
                                <td>{{ $item->jumlah_pria_hak_pilih }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">

                                        {{-- Detail --}}
                                        @can('lembaga-politik.view')
                                            <a href="{{ route('potensi.potensi-kelembagaan.politik.show', $item->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                        @endcan

                                        {{-- Edit --}}
                                        @can('lembaga-politik.edit')
                                            <a href="{{ route('potensi.potensi-kelembagaan.politik.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        @endcan

                                        {{-- Print --}}
                                        @can('lembaga-politik.print')
                                            <button class="btn btn-sm btn-success"
                                                onclick="downloadAndOpen({{ $item->id }})">
                                                <i class="bi bi-printer"></i> Print
                                            </button>
                                        @endcan

                                        {{-- Hapus --}}
                                        @can('lembaga-politik.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $item->id }}">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form
                                                        action="{{ route('potensi.potensi-kelembagaan.politik.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteModalLabel{{ $item->id }}">Hapus Data</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus data tanggal
                                                                <strong>{{ $item->tanggal }}</strong> ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted">Belum ada data partisipasi politik.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-danger mt-3">
        <i class="bi bi-shield-lock-fill me-2"></i>
        Anda tidak memiliki izin untuk melihat data partisipasi politik.
    </div>
@endcan
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#politik-table').DataTable({
                responsive: true,
                pageLength: 10,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data tersedia",
                    zeroRecords: "Data tidak ditemukan"
                }
            });
        });

        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/politik/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/politik/${id}/print`;

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

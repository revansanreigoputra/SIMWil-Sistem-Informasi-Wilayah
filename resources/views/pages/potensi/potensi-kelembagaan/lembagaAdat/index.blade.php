@extends('layouts.master')

@section('title', 'Data Lembaga Adat')

@section('action')
    <a href="{{ route('potensi.potensi-kelembagaan.lembagaAdat.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle me-2"></i>
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="lembaga-adat-table" class="table table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Tanggal</th>
                                        <th>Pemangku Adat</th>
                                        <th>Kepengurusan Adat</th>
                                        <th>Rumah Adat</th>
                                        <th>Barang Pusaka</th>
                                        <th>Naskah Naskah</th>
                                        {{-- <th>Lainnya</th>
                                        <th>Musyawarah Adat</th>
                                        <th>Sanksi Adat</th>
                                        <th>Upacara Adat Perkawinan</th>
                                        <th>Upacara Adat Kematian</th>
                                        <th>Upacara Adat Kelahiran</th>
                                        <th>Upacara Adat Bercocok Tanam</th>
                                        <th>Upacara Adat Perikanan Laut</th>
                                        <th>Upacara Adat Bidang Kehutanan</th>
                                        <th>Upacara Adat Pengelolaan SDA</th>
                                        <th>Upacara Adat Pembangunan Rumah</th>
                                        <th>Upacara Adat Penyelesaian Masalah</th> --}}
                                        <th width="200" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lembagaAdats as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->tanggal->format('d-m-Y') }}</td>
                                            <td class="text-center">{{ $item->pemangku_adat ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->kepengurusan_adat ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->rumah_adat ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->barang_pusaka ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->naskah_naskah ? 'Ya' : 'Tidak' }}</td>
                                            {{-- <td class="text-center">{{ $item->lainnya ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->musyawarah_adat ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->sanksi_adat ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->upacara_adat_perkawinan ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->upacara_adat_kematian ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->upacara_adat_kelahiran ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->upacara_adat_bercocok_tanam ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->upacara_adat_perikanan_laut ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->upacara_adat_bidang_kehutanan ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->upacara_adat_pengelolaan_sda ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->upacara_adat_pembangunan_rumah ? 'Ya' : 'Tidak' }}</td>
                                            <td class="text-center">{{ $item->upacara_adat_penyelesaian_masalah ? 'Ya' : 'Tidak' }}</td> --}}
                                            <td class="text-center">
                                                @canany(['adat.view', 'adat.update', 'adat.delete'])
                                                    <div class="d-flex gap-2 justify-content-center">
                                                        @can('adat.view')
                                                            <a href="{{ route('potensi.potensi-kelembagaan.lembagaAdat.show', $item->id) }}"
                                                                class="btn btn-sm btn-info" title="Detail">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                                    <circle cx="12" cy="12" r="3" />
                                                                </svg>
                                                                Detail
                                                            </a>
                                                        @endcan

                                                        @can('adat.update')
                                                            <a href="{{ route('potensi.potensi-kelembagaan.lembagaAdat.edit', $item->id) }}"
                                                                class="btn btn-sm btn-warning" title="Edit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path
                                                                        d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                                    <path
                                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                                    <path d="M16 5l3 3" />
                                                                </svg>
                                                                Edit
                                                            </a>
                                                        @endcan
                                                        <button class="btn btn-sm btn-success"
                                                            onclick="downloadAndOpen({{ $item->id }})">
                                                            <i class="bi bi-printer"></i> Print
                                                        </button>
                                                        @can('adat.delete')
                                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                                data-bs-target="#delete-lembaga-adat-{{ $item->id }}"
                                                                title="Hapus">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path d="M4 7l16 0" />
                                                                    <path d="M10 11l0 6" />
                                                                    <path d="M14 11l0 6" />
                                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                </svg>
                                                                Hapus
                                                            </button>
                                                        @endcan
                                                    </div>

                                                    <!-- Modal Delete -->
                                                    <div class="modal fade" id="delete-lembaga-adat-{{ $item->id }}"
                                                        tabindex="-1" aria-labelledby="deleteModalLabel-{{ $item->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteModalLabel-{{ $item->id }}">
                                                                        <i
                                                                            class="fas fa-exclamation-triangle text-danger me-2"></i>
                                                                        Konfirmasi Hapus Data
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Data lembaga adat tanggal
                                                                        <strong>{{ $item->tanggal->format('d-m-Y') }}</strong>
                                                                        akan dihapus secara permanen.</p>
                                                                    <p class="text-danger mb-0">
                                                                        <i class="fas fa-info-circle me-1"></i>
                                                                        Tindakan ini tidak dapat dibatalkan.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="fas fa-times me-1"></i> Batal
                                                                    </button>
                                                                    <form
                                                                        action="{{ route('potensi.potensi-kelembagaan.lembagaAdat.destroy', $item->id) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">
                                                                            <i class="fas fa-trash me-1"></i> Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span class="text-muted">Tidak ada aksi</span>
                                                @endcanany
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if ($lembagaAdats->hasPages())
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="text-muted">
                                    Menampilkan {{ $lembagaAdats->firstItem() }} hingga {{ $lembagaAdats->lastItem() }}
                                    dari {{ $lembagaAdats->total() }} entri
                                </div>
                                <nav>
                                    {{ $lembagaAdats->links() }}
                                </nav>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#lembaga-adat-table').DataTable();
        });
        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/lembagaAdat/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/lembagaAdat/${id}/print`;

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

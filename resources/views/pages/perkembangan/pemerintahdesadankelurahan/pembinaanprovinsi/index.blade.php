@extends('layouts.master')

@section('title', 'Data Pembinaan Pemerintah Provinsi')

@section('action')
    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus me-1"></i> Tambah Data
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table id="pembinaan-provinsi-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pedoman Pelaksanaan</th>
                        <th>Pedoman Bantuan Keuangan</th>
                        <th>Fasilitasi Keberadaan</th>
                        <th>Fasilitasi Pelaksanaan</th>
                        <th>Jumlah Kegiatan Pendidikan</th>
                        <th>Penanggulangan Kemiskinan</th>
                        <th>Penanganan Bencana</th>
                        <th>Peningkatan Pendapatan</th>
                        <th>Penyediaan Sarana</th>
                        <th>Pemanfaatan SDA</th>
                        <th>Pengembangan Sosial</th>
                        <th>Pedoman Pendataan</th>
                        <th>Pemberian Sanksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>

                            {{-- Badge Hijau jika "Ada", Abu-abu jika "Tidak Ada" --}}
                            <td><span class="badge bg-{{ $item->pedoman_pelaksanaan_tugas === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_pelaksanaan_tugas ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pedoman_bantuan_keuangan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_bantuan_keuangan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->kegiatan_fasilitasi_keberadaan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->kegiatan_fasilitasi_keberadaan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->fasilitasi_pelaksanaan_pedoman === 'Ada' ? 'success' : 'secondary' }}">{{ $item->fasilitasi_pelaksanaan_pedoman ?? '-' }}</span></td>

                            {{-- Angka atau "-" --}}
                            <td class="text-center">{{ $item->jumlah_kegiatan_pendidikan ?? '-' }}</td>
                            <td class="text-center">{{ $item->kegiatan_penanggulangan_kemiskinan ?? '-' }}</td>
                            <td class="text-center">{{ $item->kegiatan_penanganan_bencana ?? '-' }}</td>
                            <td class="text-center">{{ $item->kegiatan_peningkatan_pendapatan ?? '-' }}</td>
                            <td class="text-center">{{ $item->kegiatan_penyediaan_sarana ?? '-' }}</td>
                            <td class="text-center">{{ $item->kegiatan_pemanfaatan_sda ?? '-' }}</td>
                            <td class="text-center">{{ $item->kegiatan_pengembangan_sosial ?? '-' }}</td>
                            <td class="text-center">{{ $item->pedoman_pendataan ?? '-' }}</td>
                            <td class="text-center">{{ $item->pemberian_sanksi ?? '-' }}</td>

                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <!-- Tombol Detail -->
                                            <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.show', $item->id) }}" class="btn btn-sm btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                                Detail
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                            Edit
                                        </a>

                                    <!-- Tombol Hapus dengan Modal -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-pembinaanprovinsi-{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                            Hapus
                                    </button>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="delete-pembinaanprovinsi-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data pada tanggal <strong>{{ $item->tanggal->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.destroy', $item->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
            $('#pembinaan-provinsi-table').DataTable();
        });
    </script>
@endpush

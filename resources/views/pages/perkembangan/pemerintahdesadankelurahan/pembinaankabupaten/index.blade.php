@extends('layouts.master')

@section('title', 'Data Pembinaan Kabupaten')

@section('action')
    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.create') }}" class="btn btn-primary mb-3">
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
            <table id="pembinaan-kabupaten-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Pelimpahan Tugas</th>
                        <th class="text-center">Pengaturan Kewenangan</th>
                        <th class="text-center">Pedoman Pelaksanaan Tugas</th>
                        <th class="text-center">Pedoman Penyusunan Peraturan</th>
                        <th class="text-center">Pedoman Penyusunan Perencanaan</th>
                        <th class="text-center">Kegiatan Fasilitasi Keberadaan</th>
                        <th class="text-center">Penetapan Pembiayaan</th>
                        <th class="text-center">Fasilitasi Pelaksanaan Pedoman</th>
                        <th class="text-center">Jumlah Kegiatan Pendidikan</th>
                        <th class="text-center">Kegiatan Penanggulangan Kemiskinan</th>
                        <th class="text-center">Kegiatan Penanganan Bencana</th>
                        <th class="text-center">Kegiatan Peningkatan Pendapatan</th>
                        <th class="text-center">Fasilitasi Penetapan Pedoman</th>
                        <th class="text-center">Kegiatan Fasilitasi Lanjutan</th>
                        <th class="text-center">Pedoman Pendataan</th>
                        <th class="text-center">Program Pemeliharaan Motivasi</th>
                        <th class="text-center">Pemberian Penghargaan</th>
                        <th class="text-center">Pemberian Sanksi</th>
                        <th class="text-center">Pengawasan Keuangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td clas="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>

                            {{-- Badge Hijau jika "Ada", Abu-abu jika "Tidak Ada"/null --}}
                            <td><span class="badge bg-{{ $item->pelimpahan_tugas === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pelimpahan_tugas ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pengaturan_kewenangan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pengaturan_kewenangan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pedoman_pelaksanaan_tugas === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_pelaksanaan_tugas ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pedoman_penyusunan_peraturan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_penyusunan_peraturan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pedoman_penyusunan_perencanaan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_penyusunan_perencanaan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->kegiatan_fasilitasi_keberadaan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->kegiatan_fasilitasi_keberadaan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->penetapan_pembiayaan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->penetapan_pembiayaan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->fasilitasi_pelaksanaan_pedoman === 'Ada' ? 'success' : 'secondary' }}">{{ $item->fasilitasi_pelaksanaan_pedoman ?? '-' }}</span></td>

                            {{-- Kolom numeric --}}
                            <td class="text-center">{{ $item->jumlah_kegiatan_pendidikan ?? '-' }}</td>
                            <td class="text-center">{{ $item->kegiatan_penanggulangan_kemiskinan ?? '-' }}</td>
                            <td class="text-center">{{ $item->kegiatan_penanganan_bencana ?? '-' }}</td>
                            <td class="text-center">{{ $item->kegiatan_peningkatan_pendapatan ?? '-' }}</td>

                            {{-- Lanjutan kolom status --}}
                            <td><span class="badge bg-{{ $item->fasilitasi_penetapan_pedoman === 'Ada' ? 'success' : 'secondary' }}">{{ $item->fasilitasi_penetapan_pedoman ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->kegiatan_fasilitasi_lanjutan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->kegiatan_fasilitasi_lanjutan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pedoman_pendataan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_pendataan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->program_pemeliharaan_motivasi === 'Ada' ? 'success' : 'secondary' }}">{{ $item->program_pemeliharaan_motivasi ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pemberian_penghargaan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pemberian_penghargaan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pemberian_sanksi === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pemberian_sanksi ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pengawasan_keuangan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pengawasan_keuangan ?? '-' }}</span></td>

                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <!-- Tombol Detail -->
                                            <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.show', $item->id) }}" class="btn btn-sm btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                                Detail
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.edit', $item->id) }}" class="btn btn-sm btn-warning">
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
                                        data-bs-target="#delete-pembinaankabupaten-{{ $item->id }}">
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
                                    <div class="modal fade" id="delete-pembinaankabupaten-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data pada tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.destroy', $item->id) }}"
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
            $('#pembinaan-kabupaten-table').DataTable();
        });
    </script>
@endpush

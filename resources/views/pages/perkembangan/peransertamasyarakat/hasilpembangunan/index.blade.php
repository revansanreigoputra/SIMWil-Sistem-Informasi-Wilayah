@extends('layouts.master')

@section('title', 'Data Hasil Pembangunan Desa dan Kelurahan')

@section('action')
    <a href="{{ route('perkembangan.peransertamasyarakat.hasilpembangunan.create') }}" class="btn btn-primary mb-3">
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
            <table id="hasilpembangunan-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Jumlah Masyarakat Terlibat</th>
                        <th class="text-center">Jumlah Penduduk Dilibatkan</th>
                        <th class="text-center">Jumlah Kegiatan Masyarakat</th>
                        <th class="text-center">Jumlah Kegiatan Pihak Ketiga</th>
                        <th class="text-center">Jumlah Kegiatan Luar Musrenbang</th>
                        <th class="text-center">Usulan Masyarakat Disetujui</th>
                        <th class="text-center">Usulan Pemerintah Disetujui</th>
                        <th class="text-center">Usulan Rencana Kerja</th>
                        <th class="text-center">Musyawarah</th>
                        <th class="text-center">Kegiatan Belum Selesai</th>
                        <th class="text-center">Kegiatan APB Desa</th>
                        <th class="text-center">Kegiatan APB Kab/Kota</th>
                        <th class="text-center">Kegiatan APBD Provinsi</th>
                        <th class="text-center">Kegiatan APBN</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>

                            {{-- Kolom angka --}}
                            <td class="text-center">{{ $item->jumlah_masyarakat_terlibat ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_penduduk_dilibatkan ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_kegiatan_masyarakat ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_kegiatan_pihak_ketiga ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_kegiatan_luar_musrenbang ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_masyarakat_disetujui_rk ?? '-' }}</td>
                            <td class="text-center">{{ $item->usulan_pemerintah_desa_kelurahan_disetujui_rk ?? '-' }}</td>
                            <td class="text-center">{{ $item->usulan_rencana_kerja_program ?? '-' }}</td>

                            {{-- Kolom status dengan badge --}}
                            <td>
                                <span class="badge bg-{{ $item->penyelenggaraan_musyawarah === 'Ada' ? 'success' : 'secondary' }}">
                                    {{ $item->penyelenggaraan_musyawarah ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $item->pelaksanaan_kegiatan_tersisa === 'Ada' ? 'success' : 'secondary' }}">
                                    {{ $item->pelaksanaan_kegiatan_tersisa ?? '-' }}
                                </span>
                            </td>

                            {{-- Kolom kegiatan didanai --}}
                            <td>{{ $item->jumlah_kegiatan_didanai_apb_desa ?? '-' }}</td>
                            <td>{{ $item->jumlah_kegiatan_didanai_apb_kabupaten ?? '-' }}</td>
                            <td>{{ $item->jumlah_kegiatan_didanai_apbd_provinsi ?? '-' }}</td>
                            <td>{{ $item->jumlah_kegiatan_didanai_apbn ?? '-' }}</td>

                            {{-- Aksi --}}
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('perkembangan.peransertamasyarakat.hasilpembangunan.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                    <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        Detail
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('perkembangan.peransertamasyarakat.hasilpembangunan.edit', $item->id) }}" class="btn btn-sm btn-warning">
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

                                    <!-- Tombol Hapus -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-hasilpembangunan-{{ $item->id }}">
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

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="delete-hasilpembangunan-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data hasil pembangunan tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.peransertamasyarakat.hasilpembangunan.destroy', $item->id) }}" method="POST">
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
            $('#hasilpembangunan-table').DataTable();
        });
    </script>
@endpush

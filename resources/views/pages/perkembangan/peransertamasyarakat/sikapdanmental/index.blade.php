@extends('layouts.master')

@section('title', 'Data Sikap dan Mental Desa dan Kelurahan')

@section('action')
    <a href="{{ route('perkembangan.peransertamasyarakat.sikapdanmental.create') }}" class="btn btn-primary mb-3">
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
            <table id="sikapdanmental-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Pungutan Gelandangan</th>
                        <th class="text-center">Pungutan Terminal</th>
                        <th class="text-center">Permintaan Sumbangan (Perorangan)</th>
                        <th class="text-center">Permintaan Sumbangan (Terorganisir)</th>
                        <th class="text-center">Praktik Jalan Pintas</th>
                        <th class="text-center">Pelayanan Gratis</th>
                        <th class="text-center">Keluhan Pelayanan</th>
                        <th class="text-center">Kegiatan Ekonomi</th>
                        <th class="text-center">Kebiasaan Masyarakat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>

                            {{-- Nilai numerik & enum ditampilkan dengan badge --}}
                            <td class="text-center">{{ $item->jumlah_pungutan_gelandangan ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_pungutan_terminal_pelabuhan_pasar ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $item->permintaan_sumbangan_perorangan === 'Ada' ? 'success' : 'secondary' }}">
                                    {{ $item->permintaan_sumbangan_perorangan ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $item->permintaan_sumbangan_terorganisir === 'Ada' ? 'success' : 'secondary' }}">
                                    {{ $item->permintaan_sumbangan_terorganisir ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $item->praktik_jalan_pintas === 'Ya' ? 'warning' : 'secondary' }}">
                                    {{ $item->praktik_jalan_pintas ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $item->pelayanan_gratis_aparat === 'Ya' ? 'success' : 'secondary' }}">
                                    {{ $item->pelayanan_gratis_aparat ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $item->keluhan_pelayanan === 'Ya' ? 'warning' : 'secondary' }}">
                                    {{ $item->keluhan_pelayanan ?? '-' }}
                                </span>
                            </td>

                            {{-- Kegiatan Ekonomi ringkas --}}
                            <td>
                                Petani: {{ $item->petani_gagal_panen ?? '-' }} <br>
                                Nelayan: {{ $item->nelayan_tidak_melayat ?? '-' }} <br>
                                Kerja Luar Desa: {{ $item->cari_pekerjaan_luar_desa ?? '-' }}
                            </td>

                            {{-- Kebiasaan ringkas --}}
                            <td>
                                Rayakan Pesta: {{ $item->rayakan_pesta ?? '-' }} <br>
                                Bermusyawarah: {{ $item->bermusyawarah ?? '-' }} <br>
                                Provokasi Isu: {{ $item->terprovokasi_isu ?? '-' }}
                            </td>

                            {{-- Tombol Aksi --}}
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('perkembangan.peransertamasyarakat.sikapdanmental.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('perkembangan.peransertamasyarakat.sikapdanmental.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-sikap-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-sikap-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data sikap dan mental tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.peransertamasyarakat.sikapdanmental.destroy', $item->id) }}" method="POST">
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
        $('#sikapdanmental-table').DataTable();
    });
</script>
@endpush

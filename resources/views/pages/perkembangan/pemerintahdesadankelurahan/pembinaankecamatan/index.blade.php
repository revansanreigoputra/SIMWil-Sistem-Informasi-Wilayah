@extends('layouts.master')

@section('title', 'Data Pembinaan Kecamatan')

@section('action')
    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.create') }}" class="btn btn-primary mb-3">
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
            <table id="pembinaan-kecamatan-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Fasilitasi Penyusunan Perdes</th>
                        <th>Fasilitasi Administrasi Tata Pemerintahan</th>
                        <th>Fasilitasi Pengelolaan Keuangan</th>
                        <th>Fasilitasi Urusan Otonomi</th>
                        <th>Fasilitasi Penerapan Peraturan</th>
                        <th>Fasilitasi Penyediaan Data</th>
                        <th>Fasilitasi Pelaksanaan Tugas</th>
                        <th>Fasilitasi Ketenteraman</th>
                        <th>Fasilitasi Penetapan Penguatan</th>
                        <th>Penanggulangan Kemiskinan (APBD)</th>
                        <th>Fasilitasi Partisipasi Masyarakat</th>
                        <th>Fasilitasi Kerjasama Desa</th>
                        <th>Fasilitasi Program Pemberdayaan</th>
                        <th>Fasilitasi Kerjasama Lembaga</th>
                        <th>Fasilitasi Bantuan Teknis</th>
                        <th>Fasilitasi Koordinasi Unit Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $item->fasilitasi_penyusunan_perdes ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_administrasi_tata_pemerintahan ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_pengelolaan_keuangan ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_urusan_otonomi ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_penerapan_peraturan ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_penyediaan_data ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_pelaksanaan_tugas ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_ketenteraman ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_penetapan_penguatan ?? '-' }}</td>
                            <td class="text-center">{{ $item->penanggulangan_kemiskinan_apbd ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_partisipasi_masyarakat ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_kerjasama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_program_pemberdayaan ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_kerjasama_lembaga ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_bantuan_teknis ?? '-' }}</td>
                            <td class="text-center">{{ $item->fasilitasi_koordinasi_unit_kerja ?? '-' }}</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-pembinaankecamatan-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-pembinaankecamatan-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Apakah Anda yakin ingin menghapus?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.destroy', $item->id) }}" method="POST">
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
        $('#pembinaan-kecamatan-table').DataTable();
    });
</script>
@endpush

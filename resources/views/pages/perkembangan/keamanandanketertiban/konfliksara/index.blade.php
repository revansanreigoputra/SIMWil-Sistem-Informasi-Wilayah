@extends('layouts.master')

@section('title', 'Data Konflik SARA')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.konfliksara.create') }}" class="btn btn-primary mb-3">
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
            <table id="konfliksara-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Kasus Konflik Tahun Ini</th>
                        <th class="text-center">Kasus Konflik SARA Tahun Ini</th>
                        <th class="text-center">Kasus Pertengkaran Tetangga</th>
                        <th class="text-center">Kasus Pertengkaran RT/RW</th>
                        <th class="text-center">Konflik Pendatang dan Asli</th>
                        <th class="text-center">Konflik Kelompok Desa/Kelurahan Lain</th>
                        <th class="text-center">Konflik dengan Pemerintah</th>
                        <th class="text-center">Kerugian Material dgn Pemerintah</th>
                        <th class="text-center">Korban Jiwa dgn Pemerintah</th>
                        <th class="text-center">Konflik dengan Perusahaan</th>
                        <th class="text-center">Korban Jiwa dgn Perusahaan</th>
                        <th class="text-center">Kerugian Material dgn Perusahaan</th>
                        <th class="text-center">Konflik dengan Lembaga Politik</th>
                        <th class="text-center">Korban Jiwa dgn Lembaga Politik</th>
                        <th class="text-center">Kerugian Material dgn Lembaga Politik</th>
                        <th class="text-center">Prasarana Rusak Konflik SARA</th>
                        <th class="text-center">Rumah Rusak Konflik SARA</th>
                        <th class="text-center">Korban Luka Konflik SARA</th>
                        <th class="text-center">Korban Meninggal Konflik SARA</th>
                        <th class="text-center">Anak Janda Konflik SARA</th>
                        <th class="text-center">Anak Yatim Konflik SARA</th>
                        <th class="text-center">Pelaku Diadili</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->kasus_konflik_tahun_ini ?? 0 }}</td>
                            <td class="text-center">{{ $item->kasus_konflik_sara_tahun_ini ?? 0 }}</td>
                            <td class="text-center">{{ $item->kasus_pertengkaran_tetangga ?? 0 }}</td>
                            <td class="text-center">{{ $item->kasus_pertengkaran_rt_rw ?? 0 }}</td>
                            <td class="text-center">{{ $item->konflik_pendatang_dan_asli ?? 0 }}</td>
                            <td class="text-center">{{ $item->konflik_kelompok_desa_kelurahan_lain ?? 0 }}</td>
                            <td class="text-center">{{ $item->konflik_dengan_pemerintah ?? 0 }}</td>
                            <td class="text-center">{{ $item->kerugian_material_dengan_pemerintah ?? 0 }}</td>
                            <td class="text-center">{{ $item->korban_jiwa_dengan_pemerintah ?? 0 }}</td>
                            <td class="text-center">{{ $item->konflik_dengan_perusahaan ?? 0 }}</td>
                            <td class="text-center">{{ $item->korban_jiwa_dengan_perusahaan ?? 0 }}</td>
                            <td class="text-center">{{ $item->kerugian_material_dengan_perusahaan ?? 0 }}</td>
                            <td class="text-center">{{ $item->konflik_dengan_lembaga_politik ?? 0 }}</td>
                            <td class="text-center">{{ $item->korban_jiwa_dengan_lembaga_politik ?? 0 }}</td>
                            <td class="text-center">{{ $item->kerugian_material_dengan_lembaga_politik ?? 0 }}</td>
                            <td class="text-center">{{ $item->prasarana_rusak_konflik_sara ?? 0 }}</td>
                            <td class="text-center">{{ $item->rumah_rusak_konflik_sara ?? 0 }}</td>
                            <td class="text-center">{{ $item->korban_luka_konflik_sara ?? 0 }}</td>
                            <td class="text-center">{{ $item->korban_meninggal_konflik_sara ?? 0 }}</td>
                            <td class="text-center">{{ $item->anak_janda_konflik_sara ?? 0 }}</td>
                            <td class="text-center">{{ $item->anak_yatim_konflik_sara ?? 0 }}</td>
                            <td class="text-center">{{ $item->pelaku_diadili ?? 0 }}</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('perkembangan.keamanandanketertiban.konfliksara.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('perkembangan.keamanandanketertiban.konfliksara.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-konfliksara-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="delete-konfliksara-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data konflik SARA pada tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.keamanandanketertiban.konfliksara.destroy', $item->id) }}" method="POST">
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
        $('#konfliksara-table').DataTable();
    });
</script>
@endpush

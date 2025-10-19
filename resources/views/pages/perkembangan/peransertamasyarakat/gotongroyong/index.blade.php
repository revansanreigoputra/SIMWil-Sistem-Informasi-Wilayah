@extends('layouts.master')

@section('title', 'Data Gotong Royong Desa dan Kelurahan')

@section('action')
    <a href="{{ route('perkembangan.peransertamasyarakat.gotongroyong.create') }}" class="btn btn-primary mb-3">
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
            <table id="gotongroyong-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Kelompok Arisan</th>
                        <th class="text-center">Orang Tua Asuh</th>
                        <th class="text-center">Dana Sehat</th>
                        <th class="text-center">Pembangunan Rumah</th>
                        <th class="text-center">Pengolahan Tanah</th>
                        <th class="text-center">Pembiayaan Pendidikan</th>
                        <th class="text-center">Pemeliharaan Fasilitas Umum</th>
                        <th class="text-center">Pemberian Modal Usaha</th>
                        <th class="text-center">Pengerjaan Sawah/Kebun</th>
                        <th class="text-center">Penangkapan Ikan/Usaha</th>
                        <th class="text-center">Menjaga Ketertiban</th>
                        <th class="text-center">Peristiwa Kematian</th>
                        <th class="text-center">Menjaga Kebersihan Desa</th>
                        <th class="text-center">Membangun Jalan/Irigasi</th>
                        <th class="text-center">Pemberantasan Sarang Nyamuk</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $item->jumlah_kelompok_arisan ?? '-' }}</td>
                        <td class="text-center">{{ $item->jumlah_penduduk_orang_tua_asuh ?? '-' }}</td>

                        {{-- Gunakan ternary untuk tampilkan keterangan --}}
                        <td><span class="badge bg-{{ $item->dana_sehat === 'Ada' ? 'success' : 'secondary'}}">{{ $item->dana_sehat ?? '-' }}</span></td>
                        <td><span class="badge bg-{{ $item->pembangunan_rumah === 'Ada' ? 'success' : 'secondary' }}">{{$item->pembangunan_rumah }}</span></td>
                        <td><span class="badge bg-{{ $item->pengolahan_tanah === 'Ada' ? 'success' : 'secondary' }}">{{$item->pengolahan_tanah }}</span></td>
                        <td><span class="badge bg-{{ $item->pembiayaan_pendidikan === 'Ada' ? 'success' : 'secondary' }}">{{$item->pembiayaan_pendidikan }}</span></td>
                        <td><span class="badge bg-{{ $item->pemeliharaan_fasilitas_umum === 'Ada' ? 'success' : 'secondary' }}">{{$item->pemeliharaan_fasilitas_umum }}</span></td>
                        <td><span class="badge bg-{{ $item->pemberian_modal_usaha === 'Ada' ? 'success' : 'secondary' }}">{{$item->pemberian_modal_usaha }}</span></td>
                        <td><span class="badge bg-{{ $item->pengerjaan_sawah_kebun === 'Ada' ? 'success' : 'secondary' }}">{{$item->pengerjaan_sawah_kebun }}</span></td>
                        <td><span class="badge bg-{{ $item->penangkapan_ikan_usaha === 'Ada' ? 'success' : 'secondary' }}">{{$item->penangkapan_ikan_usaha }}</span></td>
                        <td><span class="badge bg-{{ $item->menjaga_ketertiban === 'Ada' ? 'success' : 'secondary' }}">{{$item->menjaga_ketertiban }}</span></td>
                        <td><span class="badge bg-{{ $item->peristiwa_kematian === 'Ada' ? 'success' : 'secondary' }}">{{$item->peristiwa_kematian }}</span></td>
                        <td><span class="badge bg-{{ $item->menjaga_kebersihan_desa === 'Ada' ? 'success' : 'secondary' }}">{{$item->menjaga_kebersihan_desa }}</span></td>
                        <td><span class="badge bg-{{ $item->membangun_jalan_irigasi === 'Ada' ? 'success' : 'secondary' }}">{{$item->membangun_jalan_irigasi }}</span></td>
                        <td><span class="badge bg-{{ $item->pemberantasan_sarang_nyamuk === 'Ada' ? 'success' : 'secondary' }}">{{$item->pemberantasan_sarang_nyamuk }}</span></td>

                        <td>
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('perkembangan.peransertamasyarakat.gotongroyong.show', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('perkembangan.peransertamasyarakat.gotongroyong.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-gotongroyong-{{ $item->id }}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="delete-gotongroyong-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Data gotong royong tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                <p>Yakin ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('perkembangan.peransertamasyarakat.gotongroyong.destroy', $item->id) }}" method="POST">
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
            $('#gotongroyong-table').DataTable();
        });
    </script>
@endpush

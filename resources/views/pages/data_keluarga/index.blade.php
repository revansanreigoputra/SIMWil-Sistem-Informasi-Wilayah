@extends('layouts.master')

@section('title', 'Data Kepala Keluarga')

@section('action')
    @can('data_keluarga.create')
        <a href="{{ route('data_keluarga.create') }}" class="btn btn-primary mb-3">Tambah KK & Anggota</a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="keluarga-table" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>NO</th>
                            <th>Nomor KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>RT/RW</th>
                            <th>Dusun</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataKeluarga as $keluarga)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $keluarga->no_kk }}</td>
                                <td>{{ $keluarga->kepala_keluarga }}</td>
                                <td>{{ $keluarga->alamat }}</td>
                                <td>{{ $keluarga->rt }}/{{ $keluarga->rw }}</td>
                                <td>{{ $keluarga->dusun }}</td>
                                <td>{{ $keluarga->bulan }}</td>
                                <td>{{ $keluarga->tahun }}</td>
                                <td>
                                    <!-- Tombol Detail -->
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#detailModal{{ $keluarga->id }}">
                                        Detail
                                    </button>

                                    <!-- Tombol Edit -->
                                    @can('data_keluarga.edit')
                                        <a href="{{ route('data_keluarga.edit', $keluarga->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                    @endcan

                                    <!-- Tombol Hapus -->
                                    @can('data_keluarga.delete')
                                        <form action="{{ route('data_keluarga.destroy', $keluarga->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="detailModal{{ $keluarga->id }}" tabindex="-1">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Detail KK: {{ $keluarga->no_kk }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6> Data KK</h6>
                                            <table class="table table-sm table-bordered">
                                                <tr>
                                                    <th>Kepala Keluarga</th>
                                                    <td>{{ $keluarga->kepala_keluarga }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>{{ $keluarga->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <th>RT/RW</th>
                                                    <td>{{ $keluarga->rt }}/{{ $keluarga->rw }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Dusun</th>
                                                    <td>{{ $keluarga->dusun }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Pengisi</th>
                                                    <td>{{ $keluarga->nama_pengisi }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Pekerjaan</th>
                                                    <td>{{ $keluarga->pekerjaan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jabatan</th>
                                                    <td>{{ $keluarga->jabatan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Sumber Data</th>
                                                    <td>{{ $keluarga->sumber_data }}</td>
                                                </tr>
                                            </table>

                                            <h6 class="mt-4">Anggota Keluarga</h6>
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Hubungan</th>
                                                            <th>Tempat Lahir</th>
                                                            <th>Tgl Lahir</th>
                                                            <th>Agama</th>
                                                            <th>Pendidikan</th>
                                                            <th>Pekerjaan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($keluarga->anggota as $anggota)
                                                            <tr>
                                                                <td>{{ $anggota->nik }}</td>
                                                                <td>{{ $anggota->nama_lengkap }}</td>
                                                                <td>{{ $anggota->jenis_kelamin }}</td>
                                                                <td>{{ $anggota->hubungan_keluarga }}</td>
                                                                <td>{{ $anggota->tempat_lahir }}</td>
                                                                <td>{{ $anggota->tanggal_lahir }}</td>
                                                                <td>{{ $anggota->agama }}</td>
                                                                <td>{{ $anggota->pendidikan }}</td>
                                                                <td>{{ $anggota->pekerjaan }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->

                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Data belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#keluarga-table').DataTable({
                pageLength: 10,
                responsive: true,
                autoWidth: false
            });
        });
    </script>
@endpush

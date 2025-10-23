@extends('layouts.master')

@section('title', 'Data Kelembagaan Pendidikan Masyarakat')

@section('action')
    <a href="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.create') }}" class="btn btn-primary">
        Tambah Data Kelembagaan Pendidikan Masyarakat
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="kelembagaan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Perpustakaan Desa</th>
                        <th class="text-center">Taman Bacaan</th>
                        <th class="text-center">Perpustakaan Keliling</th>
                        <th class="text-center">Sanggar Belajar</th>
                        <th class="text-center">Kegiatan LPS</th>
                        <th class="text-center">Paket A</th>
                        <th class="text-center">Paket B</th>
                        <th class="text-center">Paket C</th>
                        <th class="text-center">Kursus Keterampilan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>

                            <td class="text-center"><span class="badge bg-primary">{{ $item->perpustakaan_desa }}</span></td>
                            <td class="text-center"><span class="badge bg-info text-dark">{{ $item->taman_bacaan }}</span></td>
                            <td class="text-center"><span class="badge bg-warning text-dark">{{ $item->perpustakaan_keliling }}</span></td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $item->sanggar_belajar }}</span></td>
                            <td class="text-center"><span class="badge bg-success">{{ $item->kegiatan_lps }}</span></td>
                            <td class="text-center"><span class="badge bg-primary">{{ $item->kelompok_a }} / {{ $item->peserta_a }}</span></td>
                            <td class="text-center"><span class="badge bg-info text-dark">{{ $item->kelompok_b }} / {{ $item->peserta_b }}</span></td>
                            <td class="text-center"><span class="badge bg-warning text-dark">{{ $item->kelompok_c }} / {{ $item->peserta_c }}</span></td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $item->kursus_unit }} / {{ $item->peserta_kursus }}</span></td>

                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.show', $item->id) }}" class="btn btn-sm btn-info">
                                        Detail
                                    </a>
                                    <a href="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-kelembagaan-{{ $item->id }}">
                                        Hapus
                                    </button>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="delete-kelembagaan-{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Data tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</strong> dari desa 
                                                    <strong>{{ $item->desa->nama_desa ?? '-' }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                <p>Yakin ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
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
        $('#kelembagaan-table').DataTable();
    });
</script>
@endpush

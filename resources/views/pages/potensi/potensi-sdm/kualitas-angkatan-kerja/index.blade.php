@extends('layouts.master')

@section('title', 'Data Potensi Kualitas Angkatan Kerja')

@section('action')
    @can('p_kualitas_angkatan_kerja.create')
        <a href="{{ route('potensi.potensi-sdm.kualitas-angkatan-kerja.create') }}" class="btn btn-primary mb-3">Tambah Potensi Kualitas Angkatan Kerja</a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="kualitas-angkatan-kerja-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Angkatan Kerja</th>
                            <th>Laki-laki</th>
                            <th>Perempuan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pKualitasAngkatanKerjas as $pKualitasAngkatanKerja)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pKualitasAngkatanKerja->tanggal }}</td>
                                <td>{{ $pKualitasAngkatanKerja->kualitasAngkatanKerja->kualitas_angkatan_kerja }}</td>
                                <td>{{ $pKualitasAngkatanKerja->jumlah_laki_laki }}</td>
                                <td>{{ $pKualitasAngkatanKerja->jumlah_perempuan }}</td>
                                <td>{{ $pKualitasAngkatanKerja->jumlah_total }}</td>
                                <td>
                                    @canany(['p_kualitas_angkatan_kerja.view', 'p_kualitas_angkatan_kerja.update', 'p_kualitas_angkatan_kerja.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('p_kualitas_angkatan_kerja.view')
                                                <a href="{{ route('potensi.potensi-sdm.kualitas-angkatan-kerja.show', $pKualitasAngkatanKerja->id) }}" class="btn btn-sm btn-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                    Detail
                                                </a>
                                            @endcan
                                            @can('p_kualitas_angkatan_kerja.update')
                                                <a href="{{ route('potensi.potensi-sdm.kualitas-angkatan-kerja.edit', $pKualitasAngkatanKerja->id) }}"
                                                    class="btn btn-sm btn-warning">
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
                                            @endcan
                                            @can('p_kualitas_angkatan_kerja.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-kualitas-angkatan-kerja-{{ $pKualitasAngkatanKerja->id }}">
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
                                            @endcan
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete-kualitas-angkatan-kerja-{{ $pKualitasAngkatanKerja->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Potensi Kualitas Angkatan Kerja?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data potensi kualitas angkatan kerja
                                                            <strong>{{ $pKualitasAngkatanKerja->kualitasAngkatanKerja->kualitas_angkatan_kerja }}</strong> yang dihapus
                                                            tidak bisa dikembalikan.
                                                        </p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('potensi.potensi-sdm.kualitas-angkatan-kerja.destroy', $pKualitasAngkatanKerja->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
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
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#kualitas-angkatan-kerja-table').DataTable();
        });
    </script>
@endpush

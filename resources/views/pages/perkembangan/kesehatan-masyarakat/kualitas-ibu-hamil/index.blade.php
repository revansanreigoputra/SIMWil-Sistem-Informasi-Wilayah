@extends('layouts.master')

@section('title', 'Daftar - KUALITAS IBU HAMIL')

@section('action')
    {{-- TOMBOL +DATA BARU --}}
    @can('kualitas-ibu-hamil.create')
    <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="kualitas-ibu-hamil-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Tanggal</th>
                            <th>Jumlah Ibu Hamil</th>
                            <th>Total Pemeriksaan</th>
                            <th>Jumlah Melahirkan</th>
                            <th>Kematian Ibu</th>
                            <th>Ibu Nifas Hidup</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kualitas as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                                <td class="text-center">{{ $item->tanggal }}</td>
                                <td class="text-center">{{ $item->jumlah_ibu_hamil }}</td>
                                <td class="text-center">{{ $item->total_pemeriksaan }}</td>
                                <td class="text-center">{{ $item->jumlah_melahirkan }}</td>
                                <td class="text-center">{{ $item->jumlah_kematian_ibu }}</td>
                                <td class="text-center">{{ $item->jumlah_ibu_nifas_hidup }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Tombol Detail --}}
                                        <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.show', $item->id) }}" class="btn btn-sm btn-info">
                                            Detail
                                        </a>

                                        {{-- Tombol Edit --}}
                                        @can('kualitas-ibu-hamil.update')
                                        <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        @endcan

                                        {{-- Tombol Delete --}}
                                        @can('kualitas-ibu-hamil.delete')
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-kualitas-ibu-hamil-{{ $item->id }}">
                                            Hapus
                                        </button>
                                        @endcan
                                    </div>

                                    {{-- MODAL DELETE --}}
                                    @can('kualitas-ibu-hamil.delete')
                                    <div class="modal fade" id="delete-kualitas-ibu-hamil-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $item->id }}">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus data tanggal
                                                    <strong>{{ $item->tanggal }}</strong>?
                                                    <p>Data yang dihapus tidak bisa dikembalikan.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
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
            $('#kualitas-ibu-hamil-table').DataTable();
        });
    </script>
@endpush

@extends('layouts.master')

@section('title', 'Daftar - KUALITAS PERSALINAN')

@section('action')
    {{-- TOMBOL +DATA BARU --}}
    @can('kualitas-persalinan.create')
    <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="kualitas-persalinan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Persalinan RS Umum</th>
                            <th>Persalinan Puskesmas</th>
                            <th>Persalinan Praktek Bidan</th>
                            <th>Total Persalinan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kualitas as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td class="text-center">{{ number_format($item->persalinan_rumah_sakit_umum ?? 0) }}</td>
                                <td class="text-center">{{ number_format($item->persalinan_puskesmas ?? 0) }}</td>
                                <td class="text-center">{{ number_format($item->persalinan_praktek_bidan ?? 0) }}</td>
                                <td class="text-center fw-bold text-primary">{{ number_format($item->total_persalinan ?? 0) }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Tombol Detail --}}
                                        <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.show', $item->id) }}" class="btn btn-sm btn-info">
                                            Detail
                                        </a>

                                        {{-- Tombol Edit --}}
                                        @can('kualitas-persalinan.update')
                                        <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        @endcan

                                        {{-- Tombol Delete --}}
                                        @can('kualitas-persalinan.delete')
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-kualitas-persalinan-{{ $item->id }}">
                                            Hapus
                                        </button>
                                        @endcan
                                    </div>

                                    {{-- MODAL DELETE --}}
                                    @can('kualitas-persalinan.delete')
                                    <div class="modal fade" id="delete-kualitas-persalinan-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $item->id }}">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus data tanggal
                                                    <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong>?
                                                    <p>Data yang dihapus tidak bisa dikembalikan.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.destroy', $item->id) }}" method="POST">
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
            $('#kualitas-persalinan-table').DataTable();
        });
    </script>
@endpush

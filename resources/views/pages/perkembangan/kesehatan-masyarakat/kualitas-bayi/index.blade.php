@extends('layouts.master')

@section('title', 'Daftar - KUALITAS BAYI')

@section('action')
    @can('kualitas-bayi.create')
        <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.create') }}" class="btn btn-primary mb-3">
            + Data Baru
        </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="kualitas-bayi-table" class="table table-striped">
                    <thead>
                       <tr>
                        <th class="text-center">No</th>
                        <th>Tanggal</th>
                        <th>Jml Keguguran</th>
                        <th>Jml Lahir</th>
                        <th>jml lahir bayi <br> mati</th>
                        <th>Jml Lahir bayi <br>Hidup</th>
                        <th>Mati (0-1 bln)</th>
                        <th>Mati (1-12 bln)</th>
                        <th>Berat < 2.5 kg</th>
                        <th>Disabilitas (0-5 thn)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($kualitas as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td class="text-center">{{ $item->jumlah_keguguran_kandungan }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_lahir }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_lahir_hidup }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_lahir_mati }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_mati_0_1_bulan }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_mati_1_12_bulan }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_lahir_berat_kurang_2_5_kg }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_0_5_tahun_hidup_disabilitas }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Tombol Detail --}}
                                        @can('kualitas-bayi.show')
                                            <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.show', $item->id) }}"
                                                class="btn btn-sm btn-info">Detail</a>
                                        @endcan

                                        {{-- Tombol Edit --}}
                                        @can('kualitas-bayi.update')
                                            <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                        @endcan

                                        {{-- Tombol Hapus --}}
                                        @can('kualitas-bayi.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-kualitas-bayi-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    {{-- Modal Delete --}}
                                    @can('kualitas-bayi.delete')
                                        <div class="modal fade" id="delete-kualitas-bayi-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $item->id }}">Hapus Data?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin ingin menghapus data tanggal
                                                        <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong>?
                                                        <p>Data yang dihapus tidak dapat dikembalikan.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form
                                                            action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.destroy', $item->id) }}"
                                                            method="POST">
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
            $('#kualitas-bayi-table').DataTable();
        });
    </script>
@endpush

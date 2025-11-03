@extends('layouts.master')

@section('title', 'Master DDK')
@section('styles')
    <style>
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            background-color: #fff;
        }

        .card-header {
            border-bottom: none;
            background-color: #fff;
            padding: 1rem;
        }

        .card-body {
            padding: 1rem;
        }

        .nav-pills .nav-link {
            padding: 8px 12px;
            background-color: #f0f2f5;
            border: none;
            border-radius: 6px;
            color: #6a7f8e;
            font-weight: 500;
            transition: all 0.2s ease;
            box-shadow: none;
            margin-right: 4px;
            margin-bottom: 8px;
            font-size: 0.85rem;
        }

        .nav-pills .nav-link.active {
            background-color: #4CAF50 !important;
            /* Green theme */
            color: white !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) !important;
            transform: translateY(-1px);
        }

        .nav-pills .nav-link:hover:not(.active) {
            background-color: #e0e2e5;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .nav-pills {
                flex-direction: column;
            }

            .nav-pills .nav-link {
                margin-right: 0;
                margin-bottom: 8px;
                text-align: center;
                width: 100%;
            }
        }

        /* Table Styling */
        .table {
            border-collapse: separate;
            border-spacing: 0 8px;
            margin-bottom: 0;
            font-size: 0.9rem;
        }

        .table th,
        .table td {
            padding: 0.8rem;
            vertical-align: middle;
            background-color: #ffffff;
            border: none;
        }

        .table thead th {
            background-color: #f7f9fc;
            color: #6a7f8e;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .table thead tr th:first-child {
            border-top-left-radius: 8px;
        }

        .table thead tr th:last-child {
            border-top-right-radius: 8px;
        }

        .table tbody tr {
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .table tbody tr:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
        }

        .table tbody tr td:first-child {
            border-bottom-left-radius: 8px;
            border-top-left-radius: 8px;
        }

        .table tbody tr td:last-child {
            border-bottom-right-radius: 8px;
            border-top-right-radius: 8px;
        }

        .text-muted {
            color: #a0a0a0 !important;
        }
    </style>
@endsection

@section('action')
    <a href="{{ route('master.ddk.create', ['table' => $activeTable]) }}" class="btn btn-primary">Tambah DDK</a>
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Data Master Dasar Data Kependudukan</h5>
        </div>
        <div class="card-body">
            @php
                $tables = [
                    'agama',
                    'cacat',
                    'golongandarah',
                    'hubungankeluarga',
                    'kb',
                    'kedudukanpajak',
                    'kewarganegaraan',
                    'lembaga',
                    'matapencaharian',
                    'pendidikan',
                    'tenagakerja',
                    'kualitasangkatankerja',
                ];
            @endphp
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($tables as $t)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $activeTable == $t ? 'active' : '' }}"
                            href="{{ route('master.ddk.index', ['table' => $t]) }}" role="tab"
                            aria-selected="{{ $activeTable == $t ? 'true' : 'false' }}">
                            {{ Str::headline($t) }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <hr>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- Dynamically determine column names --}}
                            @if ($activeTable == 'lembaga')
                                <th>Jenis Lembaga</th>
                                <th>Nama Lembaga</th>
                            @elseif ($activeTable == 'kedudukanpajak')
                                <th>Kedudukan Pajak</th>
                            @elseif ($activeTable == 'cacat')
                                <th>Tipe</th>
                                <th>Nama Cacat</th>
                            @elseif ($activeTable == 'tenagakerja')
                                <th>Tenaga Kerja</th>
                            @elseif ($activeTable == 'kualitasangkatankerja')
                                <th>Kualitas Angkatan Kerja</th>
                            @else
                                <th>Nama</th>
                            @endif
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if ($activeTable == 'agama')
                                    <td>{{ $item->agama }}</td>
                                @elseif ($activeTable == 'cacat')
                                    <td>{{ $item->tipe }}</td>
                                    <td>{{ $item->nama_cacat }}</td>
                                @elseif ($activeTable == 'golongandarah')
                                    <td>{{ $item->golongan_darah }}</td>
                                @elseif ($activeTable == 'hubungankeluarga')
                                    <td>{{ $item->nama }}</td>
                                @elseif ($activeTable == 'kb')
                                    <td>{{ $item->kb }}</td>
                                @elseif ($activeTable == 'kedudukanpajak')
                                    <td>{{ $item->kedudukan_pajak }}</td>
                                @elseif ($activeTable == 'kewarganegaraan')
                                    <td>{{ $item->kewarganegaraan }}</td>
                                @elseif ($activeTable == 'lembaga')
                                    <td>{{ $item->jenis_lembaga }}</td>
                                    <td>{{ $item->nama_lembaga }}</td>
                                @elseif ($activeTable == 'matapencaharian')
                                    <td>{{ $item->mata_pencaharian }}</td>
                                @elseif ($activeTable == 'pendidikan')
                                    <td>{{ $item->pendidikan }}</td>
                                @elseif ($activeTable == 'tenagakerja')
                                    <td>{{ $item->tenaga_kerja }}</td>
                                @elseif ($activeTable == 'kualitasangkatankerja')
                                    <td>{{ $item->kualitas_angkatan_kerja }}</td>
                                @else
                                    {{-- Kondisi cadangan jika ada tabel yang tidak masuk dalam daftar di atas --}}
                                    <td>{{ $item->nama }}</td>
                                @endif

                                <td>
                                    <a href="{{ route('master.ddk.edit', ['table' => $activeTable, 'id' => $item->id]) }}"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $item->id }}">
                                        Hapus
                                    </button>
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah kamu yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>

                                                    <form
                                                        action="{{ route('master.ddk.destroy', ['table' => $activeTable, 'id' => $item->id]) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">Data tidak ditemukan.</td>
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
        $(function() {
            $('#mutasi-data-table').DataTable();
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 2000);

        });
    </script>
@endpush

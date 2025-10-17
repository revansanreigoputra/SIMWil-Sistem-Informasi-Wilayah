@extends('layouts.master')

@section('title', 'Data Lembaga Pemerintahan')

@section('action')
    @can('potensi.kelembagaan.pemerintah.create')
        <a href="{{ route('potensi.kelembagaan.pemerintah.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table id="pemerintah-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            {{-- Reordered and Renamed Headers to match the image --}}
                            <th>Tanggal</th>
                            <th>Dasar Hukum Pembentukan</th>
                            <th>Dasar Hukum Pembentukan BPD</th>
                            <th>Jumlah Aparat Pemerintah</th>
                            <th>Jumlah Perangkat Desa</th>
                            <th>Kepala Desa</th>
                            <th>Sekertaris Desa</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Assuming the controller passes a variable named $records --}}
                        {{-- Define the required Jabatan IDs (Must match your DB!) --}}
                        @php
                            // !!! IMPORTANT: Replace these with the actual IDs from your 'jabatans' table !!!
                            $ID_KEPALA_DESA = 1;
                            $ID_SEKERTARIS_DESA = 2;
                        @endphp

                        @forelse ($records as $record)
                            <tr>


                                <td>{{ $loop->iteration }}</td>

                                {{-- Organizational Data --}}
                                <td>{{ \Carbon\Carbon::parse($record->tanggal_data)->format('Y-m-d') }}</td>
                                <td>{{ Str::limit($record->dasar_hukum_pembentukan, 30) }}</td>
                                <td>{{ Str::limit($record->dasar_hukum_pembentukan_bpd, 30) }}</td>
                                <td>{{ $record->jumlah_aparat_pemerintah }}</td>
                                <td>{{ $record->jumlah_perangkat_desa }}</td>

                                {{-- 6. Kepala Desa (Look up status from mapped data) --}}
                                <td>
                                    @php
                                        $kepalaDesa = $personnelMap->get($ID_KEPALA_DESA);
                                        $statusKd = optional($kepalaDesa)->status_jabatan;
                                    @endphp

                                    @if ($kepalaDesa && $statusKd && $statusKd !== 'Tidak Ada')
                                        Ada
                                    @else
                                        Tidak Ada
                                    @endif
                                </td>

                                {{-- 7. Sekretaris Desa (Look up status from mapped data) --}}
                                <td>
                                    @php
                                        $sekdes = $personnelMap->get($ID_SEKERTARIS_DESA);
                                        $statusSekdes = optional($sekdes)->status_jabatan;
                                    @endphp

                                    @if ($sekdes && $statusSekdes && $statusSekdes !== 'Tidak Ada')
                                        Ada
                                    @else
                                        Tidak Ada
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        @can('potensi.kelembagaan.pemerintah.edit')
                                            <a href="{{ route('potensi.kelembagaan.pemerintah.edit', $record->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('potensi.kelembagaan.pemerintah.view')
                                            <a href="{{ route('potensi.kelembagaan.pemerintah.show', $record->id) }}"
                                                class="btn btn-sm btn-info" title="Detail">
                                                Detail
                                            </a>
                                        @endcan
                                        @can('potensi.kelembagaan.pemerintah.destroy')
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-confirm-{{ $record->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>
                                </td>

                            </tr>
                            {{-- Modal Delete definition goes here --}}

                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Belum ada data lembaga pemerintahan yang tersimpan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@foreach ($records as $record)
    <x-modal.delete-confirm id="delete-confirm-{{ $record->id }}" title="Yakin hapus data ini?"
        description="Aksi ini tidak bisa dikembalikan."
        route="{{ route('potensi.kelembagaan.pemerintah.destroy', $record) }}" item="{{ $record->nama_lembaga }}" />
@endforeach

@push('addon-script')
    <script>
        $(document).ready(function() {
            // Note: DataTables usually requires all columns in <thead> to match <td> in <tbody>
            $('#pemerintah-table').DataTable();
        });
    </script>
@endpush

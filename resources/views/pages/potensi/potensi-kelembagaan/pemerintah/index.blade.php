@extends('layouts.master')

@section('title', 'Data Lembaga Pemerintahan')
@section('styles')
    <style>
        td .btn {
            min-width: 80px;
            /* biar rata lebar */
            /* font-size: 0.85rem; */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 3px;
        }

        /* ini bagian penting: bikin form tombol sejajar sama link */
        td .d-inline {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
        }

        #pemerintah-table td,
        #pemerintah-table th {
            font-size: 0.9rem !important;
        }
    </style>
@endsection

@section('action')
    <a href="{{ route('potensi.potensi-kelembagaan.pemerintah.create') }}" class="btn btn-primary mb-3">
     Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
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
                            {{-- <th>Jumlah Perangkat Desa</th>
                            <th>Kepala Desa</th>
                            <th>Sekertaris Desa</th> --}}
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
                                <td>{{ $record->jumlah_aparat_pemerintah }}
                                    {{-- <td>{{ $record->jumlah_perangkat_desa }}</td> --}}

                                    {{-- 6. Kepala Desa (Look up status from mapped data) --}}
                                    {{-- <td>
                                    @php
                                        $kepalaDesa = $personnelMap->get($ID_KEPALA_DESA);
                                        $statusKd = optional($kepalaDesa)->status_jabatan;
                                    @endphp

                                    @if ($kepalaDesa && $statusKd && $statusKd !== 'Tidak Ada')
                                        Ada
                                    @else
                                        Tidak Ada
                                    @endif
                                </td> --}}

                                    {{-- 7. Sekretaris Desa (Look up status from mapped data) --}}
                                    {{-- <td>
                                    @php
                                        $sekdes = $personnelMap->get($ID_SEKERTARIS_DESA);
                                        $statusSekdes = optional($sekdes)->status_jabatan;
                                    @endphp

                                    @if ($sekdes && $statusSekdes && $statusSekdes !== 'Tidak Ada')
                                        Ada
                                    @else
                                        Tidak Ada
                                    @endif
                                </td>  --}}
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                        {{-- @can('potensi.potensi-kelembagaan.pemerintah.view') --}}
                                        <a href="{{ route('potensi.potensi-kelembagaan.pemerintah.show', $record->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        {{-- @endcan --}}
                                        {{-- @can('potensi.potensi-kelembagaan.pemerintah.edit') --}}
                                        <a href="{{ route('potensi.potensi-kelembagaan.pemerintah.edit', $record->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        {{-- @endcan --}}
                                        <button class="btn btn-sm btn-success"
                                            onclick="downloadAndOpen({{ $record->id }})">
                                            <i class="bi bi-printer"></i> Print
                                        </button>
                                        {{-- @can('potensi.potensi-kelembagaan.pemerintah.destroy') --}}
                                        <form
                                            action="{{ route('potensi.potensi-kelembagaan.pemerintah.destroy', $record->id) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                            class="d-inline m-0 p-0 align-self-center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                        {{-- @endcan --}}

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

@push('addon-script')
    <script>
        $(document).ready(function() {
            // Note: DataTables usually requires all columns in <thead> to match <td> in <tbody>
            $('#pemerintah-table').DataTable();
        });

        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/pemerintah/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/pemerintah/${id}/print`;

            // Download PDF
            const a = document.createElement('a');
            a.href = downloadUrl;
            a.download = '';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);

            // Preview PDF
            setTimeout(() => {
                window.open(previewUrl, '_blank');
            }, 1500);
        }
    </script>
@endpush

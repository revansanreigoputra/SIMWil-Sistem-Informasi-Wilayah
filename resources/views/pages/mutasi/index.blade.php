@extends('layouts.master')

@section('title', 'Histori Mutasi Data Penduduk')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Daftar Histori Mutasi Penduduk</h1>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- DROPNDOWN FILTER BARU --}}
            <div class="row mb-3 align-items-center">
                <div class="col-md-4">
                    <label for="filterStatus" class="form-label fw-semibold">Filter Berdasarkan Mutasi</label>
                    <select id="filterStatus" class="form-select">
                        <option value="all" selected>Semua Mutasi ({{ $mutasiRecords->count() }})</option>
                        <option value="meninggal">Mutasi Kematian
                            ({{ $mutasiRecords->where('status_kehidupan', 'meninggal')->count() }})</option>
                        <option value="pindah">Mutasi Pindah Keluar
                            ({{ $mutasiRecords->whereIn('status_kehidupan', ['pindah', 'pindah_keluar'])->count() }})
                        </option>
                        <option value="mutasi_masuk_kk">Mutasi Masuk/Kelahiran (Lihat Catatan)</option>
                    </select>
                </div>
            </div>

            {{-- KONTEN TABEL --}}
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle" id="mutasi-table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Penduduk</th>
                            <th>NIK / No. KK</th>
                            <th>Status Mutasi</th> 
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mutasiRecords as $record)
                            @php
                                $filterStatus = $record->status_kehidupan === 'meninggal' ? 'meninggal' : 'pindah';
                                $badge = $record->status_kehidupan === 'meninggal' ? 'danger' : 'warning';
                            @endphp
                            {{-- Atribut data-status untuk JS filtering --}}
                            <tr data-status="{{ $filterStatus }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $record->nama }}</td>
                                <td>
                                    NIK: {{ $record->nik ?? 'N/A' }} <br>
                                    KK: {{ optional($record->dataKeluarga)->no_kk ?? 'N/A' }}
                                </td>
                                <td>
                                    <span class="badge bg-{{ $badge }}">
                                        {{ Str::title(str_replace('_', ' ', $record->status_kehidupan)) }}
                                    </span>
                                </td>
                                 
                                <td>{{ Str::limit($record->catatan_mutasi, 50) }}</td>
                                <td>
                                    <a href="{{ route('mutasi.show', $record->id) }}"
                                        class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr data-status="empty">
                                <td colspan="7" class="text-center">Tidak ada data mutasi historis yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Catatan untuk Mutasi Masuk: Data ini harusnya selalu di luar tabel --}}
            <div class="alert alert-info mt-3" id="mutasi-masuk-info" style="display: none;">
                Data Mutasi Masuk/Kelahiran (Penduduk Baru) berada di **Daftar Penduduk Aktif** karena mereka berstatus
                'hidup'.
            </div>

        </div>
    </div>
@endsection
@push('addon-script')
    <script>
        $(document).ready(function() {

            // Asumsi: Inisialisasi DataTables yang salah (#anggota-table) sudah dihapus

            const mutasiTable = $('#mutasi-table');
            const filterSelect = $('#filterStatus'); // Element dropdown baru
            const mutasiMasukInfo = $('#mutasi-masuk-info');

            // Fungsi utama untuk memfilter tabel
            function filterTableByStatus(status) {

                // Sembunyikan pesan kosong dan info Mutasi Masuk sebelum filtering
                $('[data-status="empty"]').hide();
                mutasiMasukInfo.hide();

                if (status === 'mutasi_masuk_kk') {
                    // Tampilkan hanya pesan info untuk Mutasi Masuk
                    mutasiTable.find('tbody tr').hide();
                    mutasiMasukInfo.show();
                    return;
                }

                // --- Logika Filter Histori (meninggal, pindah, all) ---

                // Sembunyikan semua baris data
                mutasiTable.find('tbody tr').hide();

                if (status === 'all') {
                    // Tampilkan semua baris data historis
                    mutasiTable.find('tbody tr').not('[data-status="empty"]').show();
                } else {
                    // Tampilkan baris yang cocok dengan status (meninggal atau pindah)
                    // Ini seharusnya mengatasi masalah filter spesifik
                    mutasiTable.find('tbody tr[data-status="' + status + '"]').show();
                }

                // --- Logika Penanganan Pesan Kosong ---
                const visibleRows = mutasiTable.find('tbody tr:visible').not('[data-status="empty"]').length;

                if (visibleRows === 0) {
                    // Jika tidak ada baris yang cocok (misal: tidak ada data meninggal), tampilkan pesan 'empty'
                    $('[data-status="empty"]').show();
                }
            }

            // Event listener saat dropdown berubah
            filterSelect.on('change', function() {
                const filterValue = $(this).val();
                filterTableByStatus(filterValue);
            });

            // Terapkan filter 'all' saat halaman dimuat pertama kali
            filterTableByStatus('all');
        });
    </script>
@endpush

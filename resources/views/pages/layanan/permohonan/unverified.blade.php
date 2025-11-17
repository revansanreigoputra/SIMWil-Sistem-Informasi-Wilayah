@extends('layouts.master')
@section('title', 'Daftar Surat Yang Belum Diverifikasi')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            {{-- TAB NAVIGATION (JENIS KOP) - Tetap --}}
            <ul class="nav nav-pills mb-3 nav-primary-pills " id="kopTemplateTab" role="tablist">
                @foreach ($groupedKopTemplates as $indexKop => $kopTemplate)
                    @php $kopId = 'kop-' . $kopTemplate->id; @endphp
                    <li class="nav-item" role="presentation" class="">
                        <a class="uppercase-input nav-link @if ($indexKop === 0) active @endif"
                            id="{{ $kopId }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $kopId }}"
                            type="button" role="tab" aria-controls="{{ $kopId }}"
                            aria-selected="{{ $indexKop === 0 ? 'true' : 'false' }}">
                            {{ $kopTemplate->jenis_kop }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-body">

            {{-- TAB CONTENT (JENIS KOP) - Tetap --}}
            <div class="tab-content mt-3" id="kopTemplateTabContent">

                @foreach ($groupedKopTemplates as $indexKop => $kopTemplate)
                    @php $kopId = 'kop-' . $kopTemplate->id; @endphp

                    <div class="tab-pane fade @if ($indexKop === 0) show active @endif" id="{{ $kopId }}"
                        role="tabpanel" aria-labelledby="{{ $kopId }}-tab" tabindex="0">

                        {{-- START: DROPDOWN FILTER STATUS & JENIS SURAT --}}
                        <div class="row mb-3">
                            <div class="col-md-4">
                                {{-- Filter Jenis Surat (Dropdown) --}}
                                <label for="jenisSuratFilter-{{ $kopId }}">Pilih Jenis Surat:</label>
                                <select class="form-select jenis-surat-filter filter-control" id="jenisSuratFilter-{{ $kopId }}"
                                    data-kop-id="{{ $kopId }}">
                                    <option value="">Semua Jenis Surat</option>
                                    @foreach ($kopTemplate->jenisSurats as $jenisSurat)
                                        <option value="{{ $jenisSurat->id }}">{{ $jenisSurat->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                {{-- Filter Status Surat (Dropdown) --}}
                                <label for="statusFilter-{{ $kopId }}">Pilih Status Surat:</label>
                                <select class="form-select status-filter filter-control" id="statusFilter-{{ $kopId }}"
                                    data-kop-id="{{ $kopId }}">
                                    <option value="">Semua Status</option>
                                    <option value="belum_diverifikasi">Belum Diverifikasi</option>
                                    <option value="diverifikasi">Diverifikasi</option>
                                    <option value="ditolak">Ditolak</option>
                                    <option value="sudah_diambil">Sudah Diambil</option>
                                </select>
                            </div>
                        </div>
                        {{-- END: DROPDOWN FILTER STATUS & JENIS SURAT --}}

                        {{-- START: TABLE DATA --}}
                        <div class="table-responsive mt-4">
                            <table class="table table-bordered table-striped data-table" id="table-{{ $kopId }}">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Jenis Surat</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Nama Pemohon</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Mengambil semua permohonan yang terkait dengan JENIS KOP ini --}}
                                    @forelse ($permohonans->whereIn('id_format_nomor_surats', $kopTemplate->jenisSurats->pluck('id')) as $permohonan)
                                        <tr class="data-row" data-jenis-id="{{ $permohonan->id_format_nomor_surats }}"
                                            data-status="{{ $permohonan->status }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $permohonan->jenisSurat->nama ?? 'N/A' }}</td>
                                            <td>{{ $permohonan->nomor_surat }}</td>
                                            <td>{{ $permohonan->created_at->format('d-m-Y') }}</td>
                                            <td>{{$permohonan->anggotaKeluarga->nama}}</td>
                                            <td>
                                                @php
                                                    $statusClass = '';
                                                    switch ($permohonan->status) {
                                                        case 'belum_diverifikasi':
                                                            $statusClass = 'badge bg-secondary';
                                                            break;
                                                        case 'diverifikasi':
                                                            $statusClass = 'badge bg-primary';
                                                            break;
                                                        case 'ditolak':
                                                            $statusClass = 'badge bg-danger';
                                                            break;
                                                        case 'sudah_diambil':
                                                            $statusClass = 'badge bg-success';
                                                            break;
                                                        default:
                                                            $statusClass = 'badge bg-secondary';
                                                    }
                                                @endphp
                                                <span
                                                    class="{{ $statusClass }} py-2">{{ ucfirst(str_replace('_', ' ', $permohonan->status)) }}</span>
                                            </td>
                                            <td>
                                                {{-- ACTION BUTTONS --}}
                                                @can('permohonan.edit')
                                                    <a href="{{ route('permohonan.edit', $permohonan->id) }}"
                                                        class="btn btn-sm btn-warning ">
                                                         <i class="bi bi-pencil me-2 py-1"></i>Edit</a>
                                                @endcan
                                                @can('permohonan.delete')
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#delete-confirm-{{ $permohonan->id }}">
                                                        <i class="bi bi-trash me-2 py-1"></i>
                                                        Hapus
                                                    </button>
                                                @endcan
                                                @if ($permohonan->status !== 'belum_diverifikasi')
                                                    <a href="{{ route('permohonan.cetak', $permohonan->id) }}"
                                                        class="btn btn-sm btn-success" target="_blank">
                                                        <i class="bi bi-printer me-2 py-1"></i>
                                                        Cetak</a>
                                                @else
                                                    <a href="{{ route('permohonan.edit', $permohonan->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="bi bi-search me-2 py-1"></i>
                                                        Review/Verifikasi</a>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="initial-empty-row">
                                            <td colspan="6" class="text-center">Belum ada data permohonan untuk KOP ini.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- END: TABLE DATA --}}

                        {{-- START: PAGINATION CONTAINER --}}
                        <div class="pagination-container mt-3 d-flex justify-content-center" id="pagination-{{ $kopId }}">
                            {{-- Pagination akan dirender di sini oleh JavaScript --}}
                        </div>
                        {{-- END: PAGINATION CONTAINER --}}

                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
@push('addon-script')  
    <script>
        // Objek untuk melacak halaman saat ini per tab
        const currentPage = {};
        const rowsPerPage = 10; // Tentukan jumlah baris per halaman

        $(document).ready(function() {

            // Fungsi utama untuk memfilter, menampilkan, dan mengatur pagination
            function renderTable(kopId, page = 1) {
                const statusFilter = $(`#statusFilter-${kopId}`).val();
                const jenisFilter = $(`#jenisSuratFilter-${kopId}`).val();
                const tableBody = $(`#table-${kopId} tbody`);

                // 1. Ambil semua baris DATA (.data-row)
                const allRows = tableBody.find('.data-row');

                // 2. Filter baris
                const filteredRows = allRows.filter(function() {
                    const row = $(this);
                    const rowStatus = row.data('status');
                    const rowJenisId = String(row.data('jenis-id'));

                    const isStatusMatch = !statusFilter || rowStatus === statusFilter;
                    const isJenisMatch = !jenisFilter || rowJenisId === jenisFilter;

                    return isStatusMatch && isJenisMatch;
                });

                const totalRows = filteredRows.length;
                const totalPages = Math.ceil(totalRows / rowsPerPage);

                // Pastikan halaman yang diminta valid
                page = Math.min(page, totalPages > 0 ? totalPages : 1);
                currentPage[kopId] = page;

                // 3. Menghitung indeks baris untuk pagination
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;

                // 4. Sembunyikan semua baris dan hanya tampilkan yang sesuai halaman
                allRows.hide();
                filteredRows.slice(start, end).show();

                // 5. Menangani Baris Kosong (Placeholder)
                tableBody.find('.initial-empty-row').hide();
                tableBody.find('.no-data-row').remove(); // Hapus pesan filter kosong sebelumnya

                if (totalRows === 0) {
                    if (allRows.length === 0) {
                         
                        tableBody.find('.initial-empty-row').show();
                    } else {
                        // Jika semua data terfilter habis
                        tableBody.append(
                            '<tr class="no-data-row"><td colspan="6" class="text-center">Tidak ada data yang cocok dengan filter.</td></tr>'
                        );
                    }
                }

                // 6. Merender Pagination
                setupPagination(kopId, totalPages);
            }

            // Fungsi untuk merender tombol pagination
            function setupPagination(kopId, totalPages) {
                const container = $(`#pagination-${kopId}`);
                container.empty();
                const current = currentPage[kopId];

                if (totalPages <= 1) return;

                const ul = $('<ul>').addClass('pagination');

                // Tombol Sebelumnya (Previous)
                ul.append(
                    $('<li>').addClass(`page-item ${current === 1 ? 'disabled' : ''}`).append(
                        $('<a>').addClass('page-link').attr('href', '#').html('&laquo;').on('click', function(
                            e) {
                            e.preventDefault();
                            if (current > 1) {
                                renderTable(kopId, current - 1);
                            }
                        })
                    )
                );

                // Tombol Halaman (Pages)
                for (let i = 1; i <= totalPages; i++) {
                    ul.append(
                        $('<li>').addClass(`page-item ${current === i ? 'active' : ''}`).append(
                            $('<a>').addClass('page-link').attr('href', '#').text(i).on('click', function(e) {
                                e.preventDefault();
                                renderTable(kopId, i);
                            })
                        )
                    );
                }

                // Tombol Selanjutnya (Next)
                ul.append(
                    $('<li>').addClass(`page-item ${current === totalPages ? 'disabled' : ''}`).append(
                        $('<a>').addClass('page-link').attr('href', '#').html('&raquo;').on('click', function(
                            e) {
                            e.preventDefault();
                            if (current < totalPages) {
                                renderTable(kopId, current + 1);
                            }
                        })
                    )
                );

                container.append(ul);
            }

            // Event Listener untuk Filter (Jenis Surat & Status)
            $('.filter-control').on('change', function() {
                const kopId = $(this).data('kop-id');
                // Reset ke halaman 1 saat filter berubah
                renderTable(kopId, 1);
            });

            // Inisialisasi: Render tabel dan pagination untuk tab yang aktif saat halaman dimuat
            $('.tab-pane.active').each(function() {
                const kopId = $(this).attr('id');
                renderTable(kopId, 1);
            });

            // Event Listener saat mengganti tab
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                const target = $(e.target).attr("data-bs-target"); // #kop-X
                const kopId = target.substring(1); // kop-X
                // Render tabel untuk tab baru (jika belum ada di currentPage, akan dimulai dari 1)
                renderTable(kopId, currentPage[kopId] || 1);
            });
        });
    </script>
@endpush
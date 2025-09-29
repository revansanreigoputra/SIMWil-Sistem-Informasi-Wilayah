@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Laporan Surat</h4>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            {{-- Filter --}}
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="filter-tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar"></i> Tanggal
                    </label>
                    <input type="date" id="filter-tanggal" class="form-control" value="{{ request('tanggal') }}">
                </div>
                <div class="col-md-3">
                    <label for="jenis" class="form-label fw-semibold">
                        <i class="fas fa-list-ul"></i> Jenis Surat
                    </label>
                    <select id="jenis" class="form-select">
                        <option value="">-- Semua --</option>
                        <option value="domisili">Surat Keterangan Domisili</option>
                        <option value="usaha">Surat Keterangan Usaha</option>
                        <option value="keramaian">Surat Izin Keramaian</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="ttd" class="form-label fw-semibold">
                        <i class="fas fa-user-tie"></i> Tanda Tangan
                    </label>
                    <select id="ttd" class="form-select">
                        <option value="">-- Semua --</option>
                        <option value="kades">Kepala Desa</option>
                        <option value="sekdes">Sekretaris Desa</option>
                        <option value="staff">Staff Desa</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end gap-2">
                    <button id="btn-filter" type="button" class="btn btn-primary d-flex align-items-center gap-1">
                        <i class="fas fa-search"></i> Filter
                    </button>
                    <button id="btn-print" class="btn btn-success" style="display:none;">
                        <i class="fas fa-print"></i> Cetak
                    </button>
                </div>
            </div>

            {{-- Tabel, awalnya disembunyikan --}}
            <div id="tabel-wrapper" class="table-responsive" style="display:none;">
                <table id="surat-data-table" class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Nama Pemohon</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Jenis Surat</th>
                            <th>Ditandatangani Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporan as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->agama }}</td>
                                <td>{{ $item->jenis ?? '-' }}</td>
                                <td>{{ ucfirst($item->ttd ?? '-') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(function() {
        var table = $('#surat-data-table').DataTable({
            searching: false,
            paging: true
        });

        // Klik tombol filter
        $('#btn-filter').on('click', function() {
            var tanggal = $('#filter-tanggal').val();
            var jenis = $('#jenis').val();
            var ttd = $('#ttd').val();

            if (!tanggal && !jenis && !ttd) {
                alert('Pilih filter dulu!');
                return;
            }

            $('#tabel-wrapper').show();
            $('#btn-print').show();

            // reset filter
            table.search('').columns().search('');

            if (tanggal) {
                table.column(1).search(tanggal);
            }
            if (jenis) {
                table.column(5).search(jenis, true, false);
            }
            if (ttd) {
                table.column(6).search(ttd, true, false);
            }

            table.draw();
        });

        // tombol cetak
        $('#btn-print').on('click', function() {
            window.print();
        });
    });
</script>
@endpush

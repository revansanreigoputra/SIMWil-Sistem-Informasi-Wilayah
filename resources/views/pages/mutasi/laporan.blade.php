@extends('layouts.master')

@section('title', 'Laporan Mutasi')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                {{-- Filter --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jenis" class="form-label required">
                                <i class="fas fa-list-ul"></i> Jenis Mutasi
                            </label>
                            <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror"
                                required>
                                <option value="">-- Pilih Jenis Mutasi --</option>
                                @foreach (['pendatang', 'pindah', 'meninggal'] as $item)
                                    <option value="{{ $item }}" {{ old('jenis') == $item ? 'selected' : '' }}>
                                        {{ ucfirst($item) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="filter-tanggal" class="form-label">Filter Tanggal</label>
                        <input type="date" id="filter-tanggal" class="form-control">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                            <button id="btn-filter" type="button" class="btn btn-primary d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon">
                                    <path d="M3 4h18l-7 8v6l-4 2v-8z"></path>
                                </svg>
                                Filter
                            </button>
                        <button id="btn-print" class="btn btn-success ms-auto" style="display:none;">
                            <i class="fas fa-print"></i> Cetak Laporan
                        </button>
                    </div>

                </div>

                {{-- Tabel awalnya disembunyikan --}}
                <div id="tabel-wrapper" class="table-responsive" style="display: none;">
                    <table id="mutasi-data-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Jenis</th>
                                <th>Penyebab</th>
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Data laporan ditampilkan setelah filter --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @push('addon-script')
        <script>
            $(function() {
                var table = $('#mutasi-data-table').DataTable({
                    searching: false
                });


                // Klik tombol filter
                $('#btn-filter').on('click', function(e) {
                    e.preventDefault();

                    var jenis = $('#jenis').val();
                    var tanggal = $('#filter-tanggal').val();

                    if (!jenis && !tanggal) {
                        alert('Pilih filter dulu!');
                        return;
                    }

                    // Tampilkan tabel
                    $('#tabel-wrapper').show();
                    $('#btn-print').show();

                    // Reset search
                    table.search('').columns().search('');

                    // Terapkan filter
                    if (jenis) {
                        table.column(4).search(jenis, true, false);
                    }
                    if (tanggal) {
                        table.column(3).search(tanggal);
                    }

                    table.draw();
                });
                // Klik tombol cetak
                $('#btn-print').on('click', function() {
                    window.print();
                });
            });
        </script>
    @endpush

@extends('layouts.master')

@section('title', 'Laporan Kepala Keluarga')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Laporan Kepala Keluarga</h5>
        </div>
        <div class="card-body">
            {{-- Bagian Filter --}}
            <form action="" method="GET" class="mb-4">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="laporan" class="form-label">Jenis Laporan</label>
                        <select class="form-select" id="laporan" name="laporan" required>
                            <option value="">-- Pilih Jenis Laporan --</option>
                            <option value="kesejahteraan" {{ request('laporan') == 'kesejahteraan' ? 'selected' : '' }}>
                                Kesejahteraan Keluarga</option>
                            <option value="fisik_rumah" {{ request('laporan') == 'fisik_rumah' ? 'selected' : '' }}>Kondisi
                                Fisik Rumah</option>
                            <option value="ibu_hamil" {{ request('laporan') == 'ibu_hamil' ? 'selected' : '' }}>Kualitas Ibu
                                Hamil dan Bayi</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control" id="start_date" name="start_date"
                            value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"
                            value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            {{-- Tabel Laporan --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        @if (request('laporan') == 'kesejahteraan')
                            <tr>
                                <th>No</th>
                                <th>Nomor KK</th>
                                <th>Kepala Keluarga</th>
                                <th>Status Ekonomi</th>
                                <th>Pendapatan</th>
                                <th>Penerima Bantuan</th>
                            </tr>
                        @elseif(request('laporan') == 'fisik_rumah')
                            <tr>
                                <th>No</th>
                                <th>Nomor KK</th>
                                <th>Kepala Keluarga</th>
                                <th>Jenis Rumah</th>
                                <th>Kondisi Atap</th>
                                <th>Kondisi Lantai</th>
                                <th>Kondisi Dinding</th>
                            </tr>
                        @elseif(request('laporan') == 'ibu_hamil')
                            <tr>
                                <th>No</th>
                                <th>Nomor KK</th>
                                <th>Kepala Keluarga</th>
                                <th>Nama Ibu</th>
                                <th>Status Kehamilan</th>
                                <th>Kondisi Bayi</th>
                            </tr>
                        @else
                            <tr>
                                <th colspan="6" class="text-center">Silakan pilih jenis laporan untuk menampilkan data.
                                </th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @if (request('laporan'))
                            {{-- Loop data sesuai laporan --}}
                            @forelse ($data ?? [] as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->no_kk }}</td>
                                    <td>{{ $item->kepala_keluarga }}</td>

                                    @if (request('laporan') == 'kesejahteraan')
                                        <td>{{ $item->status_ekonomi }}</td>
                                        <td>{{ $item->pendapatan }}</td>
                                        <td>{{ $item->penerima_bantuan ? 'Ya' : 'Tidak' }}</td>
                                    @elseif(request('laporan') == 'fisik_rumah')
                                        <td>{{ $item->jenis_rumah }}</td>
                                        <td>{{ $item->atap }}</td>
                                        <td>{{ $item->lantai }}</td>
                                        <td>{{ $item->dinding }}</td>
                                    @elseif(request('laporan') == 'ibu_hamil')
                                        <td>{{ $item->nama_ibu }}</td>
                                        <td>{{ $item->status_kehamilan }}</td>
                                        <td>{{ $item->kondisi_bayi }}</td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- Tombol Aksi --}}
            @if (request('laporan'))
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-success" onclick="window.print()">Cetak Laporan</button>
                </div>
            @endif
        </div>
    </div>
@endsection

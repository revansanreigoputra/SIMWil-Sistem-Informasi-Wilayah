@extends('layouts.master')

@section('title', 'Laporan Anggota Keluarga')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Laporan Anggota Keluarga</h5>
        </div>
        <div class="card-body">
            {{-- Bagian Filter --}}
            <form action="" method="GET" class="mb-4">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="laporan" class="form-label">Jenis Laporan</label>
                        <select class="form-select" id="laporan" name="laporan" required>
                            <option value="">-- Pilih Jenis Laporan --</option>
                            <option value="umur" {{ request('laporan') == 'umur' ? 'selected' : '' }}>Kelompok Umur</option>
                            <option value="fisik" {{ request('laporan') == 'fisik' ? 'selected' : '' }}>Kondisi Fisik
                            </option>
                            <option value="jiwa" {{ request('laporan') == 'jiwa' ? 'selected' : '' }}>Kondisi Kejiwaan
                            </option>
                            <option value="darah" {{ request('laporan') == 'darah' ? 'selected' : '' }}>Golongan Darah
                            </option>
                            <option value="hubungan" {{ request('laporan') == 'hubungan' ? 'selected' : '' }}>Hubungan
                                Keluarga</option>
                            <option value="kb" {{ request('laporan') == 'kb' ? 'selected' : '' }}>Kontrasepsi KB</option>
                            <option value="pekerjaan" {{ request('laporan') == 'pekerjaan' ? 'selected' : '' }}>Mata
                                Pencaharian</option>
                            <option value="pendidikan" {{ request('laporan') == 'pendidikan' ? 'selected' : '' }}>Pendidikan
                            </option>
                            <option value="status" {{ request('laporan') == 'status' ? 'selected' : '' }}>Status Perkawinan
                            </option>
                            <option value="kelahiran" {{ request('laporan') == 'kelahiran' ? 'selected' : '' }}>Tingkat
                                Kelahiran</option>
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
                        @if (request('laporan') == 'umur')
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Nomor KK</th>
                            </tr>
                        @elseif(request('laporan') == 'fisik')
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kondisi Fisik</th>
                                <th>Nomor KK</th>
                            </tr>
                        @elseif(request('laporan') == 'jiwa')
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kondisi Kejiwaan</th>
                                <th>Nomor KK</th>
                            </tr>
                        @elseif(request('laporan') == 'darah')
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Golongan Darah</th>
                                <th>Nomor KK</th>
                            </tr>
                        @elseif(request('laporan') == 'hubungan')
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Hubungan Keluarga</th>
                                <th>Nomor KK</th>
                            </tr>
                        @elseif(request('laporan') == 'kb')
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kontrasepsi</th>
                                <th>Nomor KK</th>
                            </tr>
                        @elseif(request('laporan') == 'pekerjaan')
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Pekerjaan</th>
                                <th>Nomor KK</th>
                            </tr>
                        @elseif(request('laporan') == 'pendidikan')
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Pendidikan</th>
                                <th>Nomor KK</th>
                            </tr>
                        @elseif(request('laporan') == 'status')
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Status Perkawinan</th>
                                <th>Nomor KK</th>
                            </tr>
                        @elseif(request('laporan') == 'kelahiran')
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Nomor KK</th>
                            </tr>
                        @else
                            <tr>
                                <th colspan="5" class="text-center">Silakan pilih jenis laporan untuk menampilkan data.
                                </th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @if (request('laporan'))
                            @forelse ($data ?? [] as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama }}</td>

                                    @if (request('laporan') == 'umur')
                                        <td>{{ $item->umur }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                    @elseif(request('laporan') == 'fisik')
                                        <td>{{ $item->kondisi_fisik }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                    @elseif(request('laporan') == 'jiwa')
                                        <td>{{ $item->kondisi_jiwa }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                    @elseif(request('laporan') == 'darah')
                                        <td>{{ $item->golongan_darah }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                    @elseif(request('laporan') == 'hubungan')
                                        <td>{{ $item->hubungan_keluarga }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                    @elseif(request('laporan') == 'kb')
                                        <td>{{ $item->jenis_kb }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                    @elseif(request('laporan') == 'pekerjaan')
                                        <td>{{ $item->pekerjaan }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                    @elseif(request('laporan') == 'pendidikan')
                                        <td>{{ $item->pendidikan }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                    @elseif(request('laporan') == 'status')
                                        <td>{{ $item->status_perkawinan }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                    @elseif(request('laporan') == 'kelahiran')
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data tidak ditemukan.</td>
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

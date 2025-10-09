@extends('layouts.master')

@section('title', 'Detail Data Lembaga Pemerintahan')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Lembaga Pemerintahan</h5>
        </div>
        <div class="card-body">
            
            {{-- Section 1: Data Umum Lembaga Pemerintahan & BPD --}}
            <h6 class="fw-bold text-primary mb-3">Data Umum Organisasi</h6>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th width="30%">Tanggal Data</th>
                            <td>{{ \Carbon\Carbon::parse($potensi->tanggal_data)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Dasar Hukum Pembentukan (Lembaga)</th>
                            <td>{{ $potensi->dasar_hukum_pembentukan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Dasar Hukum Pembentukan BPD</th>
                            <td>{{ $potensi->dasar_hukum_pembentukan_bpd ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Aparat Pemerintah</th>
                            <td>{{ $potensi->jumlah_aparat_pemerintah ?? 0 }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Perangkat Desa</th>
                            <td>{{ $potensi->jumlah_perangkat_desa ?? 0 }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Staf</th>
                            <td>{{ $potensi->jumlah_staf ?? 0 }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Dusun</th>
                            <td>{{ $potensi->jumlah_dusun ?? 0 }}</td>
                        </tr>
                        <tr>
                            <th>Keberadaan BPD</th>
                            <td>{{ optional($bpd)->keberadaan_bpd ?? 'Tidak Ada Data' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Anggota BPD</th>
                            <td>{{ optional($bpd)->jumlah_anggota ?? 0 }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Section 2: Data Personil & Status Jabatan --}}
            <h6 class="mt-4 fw-bold text-primary mb-3">Data Personil & Status Jabatan</h6>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Jabatan</th>
                            <th>Nama Personil</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggotaOrganisasis as $anggota)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ optional($anggota->jabatan)->nama_jabatan ?? 'N/A' }}</td>
                                {{-- Display the person's name from PerangkatDesa --}}
                                <td>{{ optional($anggota->perangkatDesa)->nama ?? 'Belum Ditunjuk' }}</td>
                                <td>
                                    <span class="badge 
                                        @if(Str::contains($anggota->status_jabatan, 'Aktif')) bg-success 
                                        @elseif(Str::contains($anggota->status_jabatan, 'Pasif')) bg-warning 
                                        @else bg-secondary @endif">
                                        {{ $anggota->status_jabatan }}
                                    </span>
                                </td>
                                <td>{{ $anggota->keterangan_tambahan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada penunjukan personil yang tersimpan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('potensi.kelembagaan.pemerintah.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                {{-- Optional: Add Print Button here if the route is defined --}}
                <a href="{{ route('potensi.kelembagaan.pemerintah.print', $potensi->id) }}" target="_blank" class="btn btn-primary ms-2">
                    <i class="bi bi-printer"> Cetak</i> 
                </a>
            </div>
        </div>
    </div>
@endsection
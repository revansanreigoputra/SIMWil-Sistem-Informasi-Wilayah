@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Permohonan Surat</h4>
    </div>
@endsection

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
            margin-right: 4px;
            margin-bottom: 8px;
            font-size: 0.85rem;
        }

        .nav-pills .nav-link.active {
            background-color: #4CAF50 !important;
            color: white !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) !important;
            transform: translateY(-1px);
        }

        .nav-pills .nav-link:hover:not(.active) {
            background-color: #e0e2e5;
        }

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
    </style>
@endsection

@section('action')
    <a href="{{ route('layanan.permohonan.create', ['jenis' => 'sk_domisili']) }}" class="btn btn-primary">
        Tambah Permohonan
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Data Permohonan Surat</h5>
        </div>
        <div class="card-body">
            <!-- Tabs Jenis Surat -->
            <ul class="nav nav-pills mb-3" id="jenisSuratTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#sk_domisili">SK Domisili</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#sk_belum_pernah_nikah">SK Belum Pernah
                        Nikah</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#sp_berlakuan_baik">SP Berlakuan
                        Baik</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#sk_tidak_mampu">SK Tidak Mampu</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#sk_kehilangan_ktp">SK Kehilangan
                        KTP</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#surat_penghibaan_tanah">Surat
                        Penghibaan Tanah</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#sk_umum">SK Umum</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#surat_rekomendasi_rt">Surat Rekomendasi
                        RT</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#sr_ijin_mendirikan_bangunan">Ijin
                        Mendirikan Bangunan</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#sr_ijin_tempat">Ijin Tempat</a></li>
            </ul>

            <hr>

            <!-- Content setiap tab -->
            <div class="tab-content mt-3">
                @php
                    $dummyData = [
                        [
                            '1',
                            '001/DS/2025',
                            '1234567890',
                            'Budi Santoso',
                            'Jakarta, 01-01-2000',
                            'Laki-laki',
                            '2025-09-20',
                        ],
                        [
                            '2',
                            '002/DS/2025',
                            '0987654321',
                            'Siti Aminah',
                            'Bandung, 12-05-1998',
                            'Perempuan',
                            '2025-09-19',
                        ],
                    ];
                @endphp

                @foreach ([
            'sk_domisili' => 'SK Domisili',
            'sk_belum_pernah_nikah' => 'SK Belum Pernah Nikah',
            'sp_berlakuan_baik' => 'SP Berlakuan Baik',
            'sk_tidak_mampu' => 'SK Tidak Mampu',
            'sk_kehilangan_ktp' => 'SK Kehilangan KTP',
            'surat_penghibaan_tanah' => 'Surat Penghibaan Tanah',
            'sk_umum' => 'SK Umum',
            'surat_rekomendasi_rt' => 'Surat Rekomendasi RT',
            'sr_ijin_mendirikan_bangunan' => 'Ijin Mendirikan Bangunan',
            'sr_ijin_tempat' => 'Ijin Tempat',
        ] as $id => $title)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $id }}">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>No Surat</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tempat/Tgl. Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Dibuat/Diupdate</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dummyData as $row)
                                        <tr>
                                            <td>{{ $row[0] }}</td>
                                            <td>{{ $row[1] }}</td>
                                            <td>{{ $row[2] }}</td>
                                            <td>{{ $row[3] }}</td>
                                            <td>{{ $row[4] }}</td>
                                            <td>{{ $row[5] }}</td>
                                            <td>{{ $row[6] }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('layanan.permohonan.edit', $row[0]) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('layanan.permohonan.delete', $row[0]) }}"
                                                    method="POST" style="display:inline-block;"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                                <!-- Tombol Cetak -->
                                                <a href="{{ route('layanan.permohonan.cetak', $row[0]) }}"
                                                    class="btn btn-sm btn-success" target="_blank">Cetak</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

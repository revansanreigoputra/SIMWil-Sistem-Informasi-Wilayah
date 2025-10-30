@extends('layouts.master')

@section('title', 'Detail Data Keluarga (KK)')

@section('content')
    @can('data_keluarga.show')
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i> Detail Data Keluarga (KK)</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <tbody>
                            {{-- I. Data Kartu Keluarga --}}
                            <tr>
                                <th colspan="2" class="table-primary">I. Data Kartu Keluarga</th>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold" width="40%">Nomor KK</th>
                                <td>{{ $dataKeluarga->no_kk ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Nama Kepala Keluarga</th>
                                <td>{{ $dataKeluarga->kepala_keluarga ?? '-' }}</td>
                            </tr>

                            {{-- II. Data Alamat --}}
                            <tr>
                                <th colspan="2" class="table-primary">II. Data Alamat</th>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Alamat Lengkap</th>
                                <td>{{ $dataKeluarga->alamat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">RT / RW</th>
                                <td>{{ $dataKeluarga->rt ?? '-' }} / {{ $dataKeluarga->rw ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Desa</th>
                                <td>{{ optional($dataKeluarga->desas)->nama_desa ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Kecamatan</th>
                                <td>{{ optional($dataKeluarga->kecamatans)->nama_kecamatan ?? '-' }}</td>
                            </tr>

                            {{-- III. Detail Kepala Keluarga --}}
                            <tr>
                                <th colspan="2" class="table-primary">III. Detail Kepala Keluarga</th>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">NIK</th>
                                <td>{{ $kepalaKeluarga->nik ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Nomor Akta Kelahiran</th>
                                <td>{{ $kepalaKeluarga->no_akta_kelahiran ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Tanggal Pencatatan</th>
                                <td>{{ $kepalaKeluarga->tanggal_pencatatan ? \Carbon\Carbon::parse($kepalaKeluarga->tanggal_pencatatan)->format('d F Y') : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Jenis Kelamin</th>
                                <td>{{ $kepalaKeluarga->jenis_kelamin ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Hubungan Dalam Keluarga</th>
                                <td>{{ optional($kepalaKeluarga->hubunganKeluarga)->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Tempat / Tanggal Lahir</th>
                                <td>
                                    {{ $kepalaKeluarga->tempat_lahir ?? '-' }},
                                    {{ $kepalaKeluarga->tanggal_lahir ? \Carbon\Carbon::parse($kepalaKeluarga->tanggal_lahir)->format('d F Y') : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Status Perkawinan</th>
                                <td>{{ $kepalaKeluarga->status_perkawinan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Agama</th>
                                <td>{{ optional($kepalaKeluarga->agama)->agama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Golongan Darah</th>
                                <td>{{ optional($kepalaKeluarga->golonganDarah)->golongan_darah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Kewarganegaraan</th>
                                <td>{{ optional($kepalaKeluarga->kewarganegaraan)->kewarganegaraan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Etnis/Suku</th>
                                <td>{{ $kepalaKeluarga->etnis ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Pendidikan Terakhir</th>
                                <td>{{ optional($kepalaKeluarga->pendidikan)->pendidikan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Mata Pencaharian</th>
                                <td>{{ optional($kepalaKeluarga->mataPencaharian)->mata_pencaharian ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Nama Orang Tua</th>
                                <td>{{ $kepalaKeluarga->nama_orang_tua ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Akseptor KB</th>
                                <td>{{ optional($kepalaKeluarga->kb)->kb ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Kedudukan Pajak</th>
                                <td>{{ optional($kepalaKeluarga->kedudukanPajak)->kedudukan_pajak ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Cacat</th>
                                <td>
                                    {{ optional($kepalaKeluarga->cacat)->tipe ?? 'Tidak Ada' }}
                                    @if ($kepalaKeluarga->nama_cacat)
                                        ({{ $kepalaKeluarga->nama_cacat }})
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Lembaga yang Diikuti</th>
                                <td>
                                    {{ optional($kepalaKeluarga->lembaga)->jenis_lembaga ?? 'Tidak Ada' }}
                                    @if ($kepalaKeluarga->nama_lembaga)
                                        ({{ $kepalaKeluarga->nama_lembaga }})
                                    @endif
                                </td>
                            </tr>

                            {{-- IV. Data Pengisi --}}
                            <tr>
                                <th colspan="2" class="table-primary">IV. Data Pengisi</th>
                            </tr>
                            <tr>
                                <th class="bg-light fw-semibold">Nama Pengisi</th>
                                <td>{{ optional($dataKeluarga->perangkatDesas)->nama ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-end gap-2">
                @can('data_keluarga.show')
                    <a href="{{ route('data_keluarga.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                @endcan

            </div>
        </div>
    </div>
@else
    <div class="alert alert-danger text-center">
        <h4 class="alert-heading">Akses Ditolak!</h4>
        <p>Maaf, Anda tidak memiliki izin untuk melihat detail data ini.</p>
    </div>
@endcan
@endsection

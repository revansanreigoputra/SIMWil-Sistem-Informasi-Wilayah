@extends('layouts.master')

@section('title', 'Detail Batas Wilayah')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Detail Data Batas Wilayah</h5>
            <a href="{{ route('batas-wilayah.index') }}" class="btn btn-secondary btn">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <!-- Informasi Umum -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="fw-bold text-primary mb-3">Informasi Umum</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td width="40%"><strong>Desa</strong></td>
                            <td width="10%">:</td>
                            <td>{{ $batas_wilayah->desa->nama_desa }}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Tahun Pembentukan</strong></td>
                            <td width="10%">:</td>
                            <td>{{ $batas_wilayah->tahun_pembentukan }}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Luas Desa</strong></td>
                            <td width="10%">:</td>
                            <td>{{ $batas_wilayah->luas_desa }}</td>
                        </tr>
                        <tr>
                            <td><strong>Kepala Desa</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->kepala_desa }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Pengisi</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->nama_pengisi }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jabatan</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->jabatan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->tanggal ? $batas_wilayah->tanggal->format('d-m-Y') : '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Batas Wilayah -->
            <h6 class="fw-bold text-primary mb-3">Batas Wilayah</h6>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="fw-bold text-secondary mb-3">Desa</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td width="40%"><strong>Utara</strong></td>
                            <td width="10%">:</td>
                            <td>{{ $batas_wilayah->desa_utara }}</td>
                        </tr>
                        <tr>
                            <td><strong>Selatan</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->desa_selatan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Timur</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->desa_timur }}</td>
                        </tr>
                        <tr>
                            <td><strong>Barat</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->desa_barat }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold text-secondary mb-3">Kecamatan</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td width="40%"><strong>Utara</strong></td>
                            <td width="10%">:</td>
                            <td>{{ $batas_wilayah->kec_utara }}</td>
                        </tr>
                        <tr>
                            <td><strong>Selatan</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->kec_selatan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Timur</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->kec_timur }}</td>
                        </tr>
                        <tr>
                            <td><strong>Barat</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->kec_barat }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Data Lainnya -->
            <h6 class="fw-bold text-primary mb-3">Data Lainnya</h6>
            <div class="row mb-4">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <td width="40%"><strong>Penetapan Batas</strong></td>
                            <td width="10%">:</td>
                            <td>{{ $batas_wilayah->penetapan_batas == 'ada' ? 'Ada' : 'Tidak Ada' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Peta Wilayah</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->peta_wilayah == 'ada' ? 'Ada' : 'Tidak Ada' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Dasar Hukum Perdes</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->dasar_hukum_perdes }}</td>
                        </tr>
                        <tr>
                            <td><strong>Dasar Hukum Perda</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->dasar_hukum_perda }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Referensi -->
            <h6 class="fw-bold text-primary mb-3">Referensi</h6>
            <div class="row mb-4">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <td width="40%"><strong>Referensi 1</strong></td>
                            <td width="10%">:</td>
                            <td>{{ $batas_wilayah->referensi_1 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Referensi 2</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->referensi_2 }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <td width="40%"><strong>Referensi 3</strong></td>
                            <td width="10%">:</td>
                            <td>{{ $batas_wilayah->referensi_3 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Referensi 4</strong></td>
                            <td>:</td>
                            <td>{{ $batas_wilayah->referensi_4 }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-4">
                <div class="d-flex gap-2 justify-content-start">
                    <a href="{{ route('batas-wilayah.edit', $batas_wilayah->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('batas-wilayah.destroy', $batas_wilayah->id) }}" method="POST"
                        style="display:inline-block;"
                        onsubmit="return confirm('Yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

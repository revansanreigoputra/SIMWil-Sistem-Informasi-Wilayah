@extends('layouts.master')

@section('title', 'Detail Data BPD')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Data BPD</h3>
                    </div>
                    <div class="card-body">
                        <!-- Tanggal -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Desa</label>
                                    <p class="form-control-plaintext">{{ $bpd->desa->nama_desa }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal</label>
                                    <p class="form-control-plaintext">{{ $bpd->tanggal->format('d-m-Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian Gedung Kantor -->
                        <div class="card card-primary mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Bagian Gedung Kantor</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Gedung Kantor</label>
                                            <p class="form-control-plaintext">
                                                @if($bpd->gedung_kantor == 'ada')
                                                    <span class="badge badge-success">Ada</span>
                                                @elseif($bpd->gedung_kantor == 'tidak ada')
                                                    <span class="badge badge-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge badge-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Ruang Kerja</label>
                                            <p class="form-control-plaintext">{{ $bpd->ruang_kerja ?: '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian Kondisi -->
                        <div class="card card-info mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Kondisi</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Balai BPD</label>
                                            <p class="form-control-plaintext">
                                                @if($bpd->balai_bpd == 'ada')
                                                    <span class="badge badge-success">Ada</span>
                                                @elseif($bpd->balai_bpd == 'tidak ada')
                                                    <span class="badge badge-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge badge-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Kondisi</label>
                                            <p class="form-control-plaintext">
                                                @if($bpd->kondisi == 'baik')
                                                    <span class="badge badge-success">Baik</span>
                                                @elseif($bpd->kondisi == 'rusak')
                                                    <span class="badge badge-danger">Rusak</span>
                                                @else
                                                    <span class="badge badge-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Listrik</label>
                                            <p class="form-control-plaintext">
                                                @if($bpd->listrik == 'ada')
                                                    <span class="badge badge-success">Ada</span>
                                                @elseif($bpd->listrik == 'tidak ada')
                                                    <span class="badge badge-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge badge-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Air Bersih</label>
                                            <p class="form-control-plaintext">
                                                @if($bpd->air_bersih == 'ada dan kondisi baik')
                                                    <span class="badge badge-success">Ada dan Kondisi Baik</span>
                                                @elseif($bpd->air_bersih == 'ada dan kondisi rusak')
                                                    <span class="badge badge-warning">Ada dan Kondisi Rusak</span>
                                                @elseif($bpd->air_bersih == 'tidak ada air bersih')
                                                    <span class="badge badge-danger">Tidak Ada Air Bersih</span>
                                                @else
                                                    <span class="badge badge-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Telepon</label>
                                            <p class="form-control-plaintext">
                                                @if($bpd->telepon == 'ada')
                                                    <span class="badge badge-success">Ada</span>
                                                @elseif($bpd->telepon == 'tidak ada')
                                                    <span class="badge badge-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge badge-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian Inventaris dan Alat Tulis Kantor -->
                        <div class="card card-success mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Inventaris dan Alat Tulis Kantor</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Mesin Tik</label>
                                            <p class="form-control-plaintext">{{ $bpd->mesin_tik ?: '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Meja</label>
                                            <p class="form-control-plaintext">{{ $bpd->meja ?: '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Kursi</label>
                                            <p class="form-control-plaintext">{{ $bpd->kursi ?: '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Lemari Arsip</label>
                                            <p class="form-control-plaintext">{{ $bpd->lemari_arsip ?: '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Komputer</label>
                                            <p class="form-control-plaintext">{{ $bpd->komputer ?: '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Mesin Fax</label>
                                            <p class="form-control-plaintext">{{ $bpd->mesin_fax ?: '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Inventaris Lainnya</label>
                                            <p class="form-control-plaintext">
                                                @if($bpd->inventaris_lainnya == 'ada')
                                                    <span class="badge badge-success">Ada</span>
                                                @elseif($bpd->inventaris_lainnya == 'tidak ada')
                                                    <span class="badge badge-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge badge-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian Administrasi BPD -->
                        <div class="card card-warning mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Administrasi BPD</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Buku Administrasi Kegiatan</label>
                                            <p class="form-control-plaintext">{{ $bpd->buku_administrasi_kegiatan ?: '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Buku Administrasi Keanggotaan</label>
                                            <p class="form-control-plaintext">{{ $bpd->buku_administrasi_keanggotaan ?: '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Buku Kegiatan</label>
                                            <p class="form-control-plaintext">{{ $bpd->buku_kegiatan ?: '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Buku Himpunan Peraturan Desa</label>
                                            <p class="form-control-plaintext">{{ $bpd->buku_himpunan_peraturan_desa ?: '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Administrasi Lainnya</label>
                                            <p class="form-control-plaintext">
                                                @if($bpd->administrasi_lainnya == 'ada')
                                                    <span class="badge badge-success">Ada</span>
                                                @elseif($bpd->administrasi_lainnya == 'tidak ada')
                                                    <span class="badge badge-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge badge-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Tambahan -->
                        <div class="card card-secondary mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Tambahan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Dibuat Pada</label>
                                            <p class="form-control-plaintext">{{ $bpd->created_at->format('d-m-Y H:i:s') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Terakhir Diperbarui</label>
                                            <p class="form-control-plaintext">{{ $bpd->updated_at->format('d-m-Y H:i:s') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12">
                                <div class="float-right">
                                    @can('bpd.update')
                                        <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-bpd.edit', $bpd) }}"
                                            class="btn btn-warning mr-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    @endcan
                                    @can('bpd.delete')
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-bpd-{{ $bpd->id }}">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    @can('bpd.delete')
        <div class="modal fade" id="delete-bpd-{{ $bpd->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus data?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Data BPD tanggal
                            <strong>{{ $bpd->tanggal->format('d-m-Y') }}</strong> akan dihapus
                            dan tidak bisa dikembalikan.</p>
                        <p>Yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-bpd.destroy', $bpd) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection

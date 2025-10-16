@extends('layouts.master')

@section('title', 'Detail Data Dusun')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Data Dusun</h3>
                    </div>
                    <div class="card-body">
                        <!-- Tanggal -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Desa</label>
                                    <p class="form-control-plaintext">{{ $dusun->desa->nama_desa }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal</label>
                                    <p class="form-control-plaintext">{{ $dusun->tanggal->format('d-m-Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Fasilitas -->
                        <div class="card card-primary mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Fasilitas</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Gedung Kantor</label>
                                            <p class="form-control-plaintext">
                                                @if($dusun->gedung_kantor == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($dusun->gedung_kantor == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Alat Tulis Kantor</label>
                                            <p class="form-control-plaintext">
                                                @if($dusun->alat_tulis_kantor == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($dusun->alat_tulis_kantor == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Barang Inventaris</label>
                                            <p class="form-control-plaintext">
                                                @if($dusun->barang_inventaris == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($dusun->barang_inventaris == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Buku Administrasi</label>
                                            <p class="form-control-plaintext">
                                                @if($dusun->buku_administrasi == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($dusun->buku_administrasi == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kegiatan dan Pengurus -->
                        <div class="card card-info mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Kegiatan dan Pengurus</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jenis Kegiatan</label>
                                            <p class="form-control-plaintext">{{ $dusun->jenis_kegiatan }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Pengurus</label>
                                            <p class="form-control-plaintext">{{ $dusun->jumlah_pengurus }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Lainnya</label>
                                            <p class="form-control-plaintext">
                                                @if($dusun->lainnya == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($dusun->lainnya == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Tambahan -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Tambahan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Dibuat Pada</label>
                                            <p class="form-control-plaintext">{{ $dusun->created_at->format('d-m-Y H:i:s') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Terakhir Diperbarui</label>
                                            <p class="form-control-plaintext">{{ $dusun->updated_at->format('d-m-Y H:i:s') }}</p>
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
                                    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-dusun.edit', $dusun) }}"
                                        class="btn btn-warning mr-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-dusun-{{ $dusun->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="delete-dusun-{{ $dusun->id }}" tabindex="-1"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus data?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Data Dusun tanggal
                        <strong>{{ $dusun->tanggal->format('d-m-Y') }}</strong> akan dihapus
                        dan tidak bisa dikembalikan.</p>
                    <p>Yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-dusun.destroy', $dusun) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

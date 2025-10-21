@extends('layouts.master')

@section('title', 'Detail Data Desa/Kelurahan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>Detail Data Desa/Kelurahan</h3>
                    </div>
                    <div class="card-body">
                        <!-- Desa and Tanggal -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Desa</label>
                                    <p class="form-control-plaintext">{{ $desaKelurahan->desa->nama_desa }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal</label>
                                    <p class="form-control-plaintext">{{ \Carbon\Carbon::parse($desaKelurahan->tanggal)->format('d-m-Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian Gedung Kantor -->
                        <div class="card card-primary mb-4">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-building me-2"></i>Gedung Kantor</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Gedung Kantor</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->gedung_kantor == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($desaKelurahan->gedung_kantor == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Ruang Kerja</label>
                                            <p class="form-control-plaintext">{{ $desaKelurahan->ruang_kerja ?: '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Balai Desa</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->balai_desa == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($desaKelurahan->balai_desa == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Listrik</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->listrik == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($desaKelurahan->listrik == 'tidak ada')
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
                                            <label class="font-weight-bold">Air Bersih</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->air_bersih == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($desaKelurahan->air_bersih == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Telepon</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->telepon == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($desaKelurahan->telepon == 'tidak ada')
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
                                            <label class="font-weight-bold">Rumah Dinas Kepala Desa</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->rumah_dinas_kepala_desa == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($desaKelurahan->rumah_dinas_kepala_desa == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Rumah Dinas Perangkat</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->rumah_dinas_perangkat == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($desaKelurahan->rumah_dinas_perangkat == 'tidak ada')
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

                        <!-- Bagian Kondisi dan Keterangan -->
                        <div class="card card-info mb-4">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-heartbeat me-2"></i>Kondisi dan Keterangan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Kondisi Umum</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->kondisi == 'baik')
                                                    <span class="badge bg-success">Baik</span>
                                                @elseif($desaKelurahan->kondisi == 'buruk')
                                                    <span class="badge bg-danger">Buruk</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Tahun Pembangunan</label>
                                            <p class="form-control-plaintext">{{ $desaKelurahan->tahun_pembangunan ?: '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Keterangan Tambahan</label>
                                            <p class="form-control-plaintext">{{ $desaKelurahan->keterangan ?: '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian Fasilitas Tambahan -->
                        <div class="card card-success mb-4">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-plus-circle me-2"></i>Fasilitas Tambahan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Pos Kamling</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->pos_kamling == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($desaKelurahan->pos_kamling == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Pos Kamling</label>
                                            <p class="form-control-plaintext">{{ $desaKelurahan->jumlah_pos_kamling ?: '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Lapangan Olahraga</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->lapangan_olahraga == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($desaKelurahan->lapangan_olahraga == 'tidak ada')
                                                    <span class="badge bg-danger">Tidak Ada</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Tempat Parkir</label>
                                            <p class="form-control-plaintext">
                                                @if($desaKelurahan->tempat_parkir == 'ada')
                                                    <span class="badge bg-success">Ada</span>
                                                @elseif($desaKelurahan->tempat_parkir == 'tidak ada')
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
                        <div class="card card-secondary mb-4">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-calendar-alt me-2"></i>Informasi Tambahan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Dibuat Pada</label>
                                            <p class="form-control-plaintext">{{ $desaKelurahan->created_at->format('d-m-Y H:i:s') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Terakhir Diperbarui</label>
                                            <p class="form-control-plaintext">{{ $desaKelurahan->updated_at->format('d-m-Y H:i:s') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            @can('dkelurahan.update')
                                <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-dkelurahan.edit', $desaKelurahan) }}"
                                    class="btn btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            @endcan
                            @can('dkelurahan.delete')
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete-desa-kelurahan-{{ $desaKelurahan->id }}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    @can('dkelurahan.delete')
        <div class="modal fade" id="delete-desa-kelurahan-{{ $desaKelurahan->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus data?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Data desa/kelurahan tanggal
                            <strong>{{ \Carbon\Carbon::parse($desaKelurahan->tanggal)->format('d-m-Y') }}</strong> akan dihapus
                            dan tidak bisa dikembalikan.</p>
                        <p>Yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-dkelurahan.destroy', $desaKelurahan) }}"
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

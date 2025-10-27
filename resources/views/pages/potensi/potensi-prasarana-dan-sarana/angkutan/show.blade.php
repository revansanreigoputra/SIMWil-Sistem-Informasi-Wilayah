@extends('layouts.master')

@section('title', 'Detail Data Sarana Transportasi')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-eye me-2"></i>
                            <h4 class="card-title mb-0">Detail Data Sarana Transportasi</h4>
                        </div>
                    </div>
                </div>

                <!-- Detail Information -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-info-circle text-primary me-2"></i>
                            Informasi Lengkap
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td width="30%" class="fw-semibold text-muted">
                                            <i class="fas fa-map-marker-alt me-2"></i>Desa
                                        </td>
                                        <td width="5%" class="text-center">:</td>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $saranaTransportasi->desa->nama_desa ?? 'N/A' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" class="fw-semibold text-muted">
                                            <i class="fas fa-calendar me-2"></i>Tanggal
                                        </td>
                                        <td width="5%" class="text-center">:</td>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $saranaTransportasi->tanggal->format('d-m-Y') }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold text-muted">
                                            <i class="fas fa-layer-group me-2"></i>Kategori
                                        </td>
                                        <td class="text-center">:</td>
                                        <td>
                                            <span class="badge bg-success">
                                                {{ $saranaTransportasi->kategori->nama ?? 'N/A' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold text-muted">
                                            <i class="fas fa-bus me-2"></i>Jenis
                                        </td>
                                        <td class="text-center">:</td>
                                        <td>
                                            <span class="badge bg-warning text-white">
                                                {{ $saranaTransportasi->jenis->nama ?? 'N/A' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold text-muted">
                                            <i class="fas fa-sort-numeric-up me-2"></i>Jumlah
                                        </td>
                                        <td class="text-center">:</td>
                                        <td>
                                            <span class="badge bg-info fs-6">
                                                {{ $saranaTransportasi->jumlah }} Unit
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card shadow-sm">
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                <small>
                                    <i class="fas fa-clock me-1"></i>
                                    Dibuat: {{ $saranaTransportasi->created_at->format('d-m-Y H:i') }}
                                    @if($saranaTransportasi->updated_at != $saranaTransportasi->created_at)
                                        | Diperbarui: {{ $saranaTransportasi->updated_at->format('d-m-Y H:i') }}
                                    @endif
                                </small>
                            </div>

                            <div class="btn-group gap-2">
                                <a href="{{ route('potensi.potensi-prasarana-dan-sarana.angkutan.index') }}"
                                    class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                                <a href="{{ route('potensi.potensi-prasarana-dan-sarana.angkutan.edit', $saranaTransportasi->id) }}"
                                    class="btn btn-warning">
                                    <i class="fas fa-edit me-1"></i> Edit Data
                                </a>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal">
                                    <i class="fas fa-trash me-1"></i> Hapus Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Delete -->
                <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">
                                    <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                                    Konfirmasi Hapus Data
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Data Sarana Transportasi 
                                    <strong>{{ $saranaTransportasi->kategori->nama ?? 'N/A' }} - {{ $saranaTransportasi->jenis->nama ?? 'N/A' }}</strong>
                                    tanggal <strong>{{ $saranaTransportasi->tanggal->format('d-m-Y') }}</strong>
                                    akan dihapus secara permanen.
                                </p>
                                <p class="text-danger mb-0">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Tindakan ini tidak dapat dibatalkan.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-1"></i> Batal
                                </button>
                                <form action="{{ route('potensi.potensi-prasarana-dan-sarana.angkutan.destroy', $saranaTransportasi->id) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-style')
    <style>
        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 0.5rem;
        }

        .card-header {
            border-radius: 0.5rem 0.5rem 0 0 !important;
            border-bottom: 1px solid #dee2e6;
        }

        .btn-group .btn+.btn {
            margin-left: 0.5rem;
        }

        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        .badge {
            padding: 0.5rem 1rem;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .btn-group {
                flex-direction: column;
                width: 100%;
            }

            .btn-group .btn {
                margin-left: 0;
                margin-bottom: 0.5rem;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 1rem;
            }

            .table td {
                font-size: 0.9rem;
            }
        }
    </style>
@endpush

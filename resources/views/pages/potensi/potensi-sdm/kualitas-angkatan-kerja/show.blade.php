@extends('layouts.master')

@section('title', 'Detail Potensi Kualitas Angkatan Kerja')

@section('action')
    @can('p_kualitas_angkatan_kerja.update')
        <a href="{{ route('potensi.potensi-sdm.kualitas-angkatan-kerja.edit', $pKualitasAngkatanKerja->id) }}" class="btn btn-warning">Edit</a>
    @endcan
    @can('p_kualitas_angkatan_kerja.delete')
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-kualitas-angkatan-kerja-{{ $pKualitasAngkatanKerja->id }}">
            Hapus
        </button>
    @endcan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informasi Potensi Kualitas Angkatan Kerja</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Tanggal</label>
                                <p class="fw-semibold">{{ $pKualitasAngkatanKerja->tanggal }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Angkatan Kerja</label>
                                <p class="fw-semibold">{{ $pKualitasAngkatanKerja->angkatan_kerja }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Jumlah Laki-laki</label>
                                <p class="fw-semibold">{{ $pKualitasAngkatanKerja->jumlah_laki_laki }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Jumlah Perempuan</label>
                                <p class="fw-semibold">{{ $pKualitasAngkatanKerja->jumlah_perempuan }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Total</label>
                                <p class="fw-semibold">{{ $pKualitasAngkatanKerja->jumlah_total }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Dibuat Pada</label>
                                <p class="fw-semibold">{{ $pKualitasAngkatanKerja->created_at->format('d F Y H:i') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Diperbarui Pada</label>
                                <p class="fw-semibold">{{ $pKualitasAngkatanKerja->updated_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    @can('p_kualitas_angkatan_kerja.delete')
        <div class="modal fade" id="delete-kualitas-angkatan-kerja-{{ $pKualitasAngkatanKerja->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Hapus Potensi Kualitas Angkatan Kerja?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Data potensi kualitas angkatan kerja <strong>{{ $pKualitasAngkatanKerja->angkatan_kerja }}</strong> yang dihapus tidak bisa dikembalikan.</p>
                        <p>Yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('potensi.potensi-sdm.kualitas-angkatan-kerja.destroy', $pKualitasAngkatanKerja->id) }}" method="POST">
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

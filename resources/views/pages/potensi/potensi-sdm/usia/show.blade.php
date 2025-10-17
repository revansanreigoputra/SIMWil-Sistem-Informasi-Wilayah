@extends('layouts.master')

@section('title', 'Detail Data Usia')

@section('action')
    @can('usia.update')
        <a href="{{ route('potensi.potensi-sdm.usia.edit', $usia->id) }}" class="btn btn-warning">Edit</a>
    @endcan
    @can('usia.delete')
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-usia-{{ $usia->id }}">
            Hapus
        </button>
    @endcan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informasi Data Usia</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label text-muted">Tanggal</label>
                        <p class="fw-semibold">
                            {{ \Carbon\Carbon::parse($usia->tanggal)->format('d/m/Y') }}
                        </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">ID Desa</label>
                        <p class="fw-semibold">
                            {{ $usia->desa_id }}
                        </p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5 class="text-info border-bottom pb-2 mb-3">Data Laki-laki</h5>
                            <div class="row">
                                @for ($i = 0; $i <= 75; $i++)
                                    <div class="col-4 mb-2">
                                        <label class="form-label text-muted">L{{ $i }}</label>
                                        <p class="fw-semibold">{{ $usia->{"l{$i}"} ?? 0 }}</p>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-danger border-bottom pb-2 mb-3">Data Perempuan</h5>
                            <div class="row">
                                @for ($i = 0; $i <= 75; $i++)
                                    <div class="col-4 mb-2">
                                        <label class="form-label text-muted">P{{ $i }}</label>
                                        <p class="fw-semibold">{{ $usia->{"p{$i}"} ?? 0 }}</p>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-4">
                        <label class="form-label text-muted">Dibuat Pada</label>
                        <p class="fw-semibold">{{ $usia->created_at->format('d F Y H:i') }}</p>
                        <p class="fw-semibold">
                            {{ \Carbon\Carbon::parse($usia->create_at)->format('d F Y H:i') }}
                        </p>

                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted">Terakhir Diupdate</label>
                        <p class="fw-semibold">{{ $usia->updated_at->format('d F Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    @can('usia.delete')
        <div class="modal fade" id="delete-usia-{{ $usia->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data Usia?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Data usia pada tanggal <strong>{{ \Carbon\Carbon::parse($usia->tanggal)->format('d/m/Y') }}</strong>
                            yang dihapus tidak
                            bisa dikembalikan.</p>
                        <p>Yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('potensi.potensi-sdm.usia.destroy', $usia->id) }}" method="POST">
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

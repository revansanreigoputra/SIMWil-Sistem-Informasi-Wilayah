@extends('layouts.master')

@section('title')
<div class="d-flex align-items-center px-4 py-2">
    <a href="{{ route('data_keluarga.index') }}" class="btn btn-secondary btn-sm me-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>
    </a>
    <span class="font-sm font-light">Data Kepala Keluarga / </span>
    <span class="title-text-primary">Detail KK No. {{ $dataKeluarga->no_kk }}</span>
</div>
@endsection

@section('action')
@can('anggota_keluarga.create')
<a href="{{ route('anggota_keluarga.create', ['data_keluarga_id' => $dataKeluarga->id]) }}"
    class="btn btn-primary mb-3"><i class="bi bi-plus-circle me-2"></i>Tambah Anggota</a>
@endcan
@endsection

@section('content')
<div class="row">
    {{-- Card Detail Kepala Keluarga (KK) Info --}}
    <div class="col-12 mb-4">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title text-white mb-0"><i class="bi bi-house-door me-2"></i>Informasi Kartu Keluarga</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <strong>No. KK:</strong>
                        <p>{{ $dataKeluarga->no_kk }}</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <strong>Kepala Keluarga:</strong>
                        <p>{{ $dataKeluarga->kepala_keluarga }}</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <strong>Alamat:</strong>
                        <p>{{ $dataKeluarga->alamat }}</p>
                    </div>
                    <div class="col-md-3 mb-2">
                        <strong>RT/RW:</strong>
                        <p>{{ $dataKeluarga->rt }} / {{ $dataKeluarga->rw }}</p>
                    </div>
                    <div class="col-md-3 mb-2">
                        <strong>Desa:</strong>
                        <p>{{ $dataKeluarga->desas->nama_desa ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <strong>Kecamatan:</strong>
                        <p>{{ $dataKeluarga->kecamatans->nama_kecamatan ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <strong>Nama Pengisi Data:</strong>
                        <p>{{ $dataKeluarga->perangkatDesas->nama ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Card Detail Anggota Keluarga --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="bi bi-people me-2"></i>Daftar Anggota Keluarga ({{ $anggotaKeluargas->count() }})</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="anggota-table" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Hubungan</th>
                                <th>Status Kehidupan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($anggotaKeluargas as $anggota)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $anggota->nik }}</td>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->hubunganKeluarga->nama ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge {{ $anggota->status_kehidupan == 'hidup' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($anggota->status_kehidupan) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1"> 
                                        <a href="#" class="btn btn-sm btn-info detail-anggota bi bi-search me-2" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $anggota->id }}">Detail</a>

                                        {{-- Edit --}}
                                        @can('anggota_keluarga.edit')
                                        <a href="{{ route('anggota_keluarga.edit', $anggota->id) }}"
                                            class="btn btn-sm btn-warning bi bi-pencil me-2">Edit</a>
                                        @endcan
                                        {{-- Delete --}}
                                        @can('anggota_keluarga.delete')
                                        <button type="button" class="btn btn-danger btn-sm bi bi-trash me-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#delete-confirm-{{ $anggota->id }}">
                                            Hapus
                                        </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada anggota keluarga yang terdaftar.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL DETAIL ANGGOTA KELUARGA (Copied from your reference) --}}
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Anggota Keluarga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modal-body-content">
                    {{-- Spinner here --}}
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- MODAL DELETE CONFIRM FOR EACH MEMBER --}}
@foreach ($anggotaKeluargas as $anggota)
<x-modal.delete-confirm
    id="delete-confirm-{{ $anggota->id }}"
    title="Yakin hapus anggota ini?"
    description="Aksi ini tidak bisa dikembalikan. Data KK akan tetap ada."
    route="{{ route('anggota_keluarga.destroy', $anggota) }}"
    item="{{ $anggota->nama }}" />
@endforeach
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#anggota-table').DataTable();

        // AJAX Handler for Detail Anggota Keluarga Modal (Copied from your reference)
        $(document).on('click', '.detail-anggota', function(e) {
            e.preventDefault();
            const anggotaId = $(this).data('id');
            const modalBody = $('#modal-body-content');

            modalBody.html(`
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `);

            $.ajax({
                // Ensure this endpoint is correct: /anggota_keluarga/{anggota_keluarga}/get_data
                url: `/anggota_keluarga/${anggotaId}/get_data`, 
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        const anggota = response.data;
                        let content = `
                            <div class="row">
                                <div class="col-md-6 mb-3"><strong>NIK:</strong><p>${anggota.nik || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Nama Lengkap:</strong><p>${anggota.nama || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Jenis Kelamin:</strong><p>${anggota.jenis_kelamin || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Hubungan:</strong><p>${anggota.hubungan_keluarga?.nama || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>No. Akta Kelahiran:</strong><p>${anggota.no_akta_kelahiran || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Tempat/Tgl Lahir:</strong><p>${anggota.tempat_lahir || 'N/A'} / ${anggota.tanggal_lahir ? new Date(anggota.tanggal_lahir).toLocaleDateString() : 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Status Perkawinan:</strong><p>${anggota.status_perkawinan || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Agama:</strong><p>${anggota.agama?.agama || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Golongan Darah:</strong><p>${anggota.golongan_darah?.golongan_darah || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Kewarganegaraan:</strong><p>${anggota.kewarganegaraan?.kewarganegaraan || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Etnis:</strong><p>${anggota.etnis || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Pendidikan:</strong><p>${anggota.pendidikan?.pendidikan || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Mata Pencaharian:</strong><p>${anggota.mata_pencaharian?.mata_pencaharian || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Nama Orang Tua:</strong><p>${anggota.nama_orang_tua || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>KB:</strong><p>${anggota.kb?.kb || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Cacat (Tipe):</strong><p>${anggota.cacat?.tipe || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Cacat (Nama):</strong><p>${anggota.nama_cacat || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Kedudukan Pajak:</strong><p>${anggota.kedudukan_pajak?.kedudukan_pajak || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Lembaga (Jenis):</strong><p>${anggota.lembaga?.jenis_lembaga || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Lembaga (Nama):</strong><p>${anggota.nama_lembaga || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Status Kehidupan:</strong><p>${anggota.status_kehidupan || 'N/A'}</p></div>
                                <div class="col-md-6 mb-3"><strong>Tanggal Pencatatan:</strong><p>${anggota.tanggal_pencatatan ? new Date(anggota.tanggal_pencatatan).toLocaleDateString() : 'N/A'}</p></div>
                            </div>
                        `;
                        modalBody.html(content);
                    } else {
                        modalBody.html('<p class="text-danger">Data anggota tidak ditemukan.</p>');
                    }
                },
                error: function() {
                    modalBody.html('<p class="text-danger">Terjadi kesalahan saat mengambil data.</p>');
                }
            });
        });
    });
</script>
@endpush
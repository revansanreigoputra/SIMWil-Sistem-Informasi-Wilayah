@extends('layouts.master')

@section('title')
<div class="d-flex align-items-center px-4 py-2">
    <a href="{{ route('anggota_keluarga.index') }}" class="btn btn-secondary btn-sm me-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>

    </a>
    <span class="font-sm font-light">Data Kepala Keluarga / </span>
    <span class="title-text-primary">Detail Anggota Keluarga</span>
</div>
@endsection


@section('action')
@can('anggota_keluarga.create')
<a href="{{ route('anggota_keluarga.create', ['data_keluarga_id' => $dataKeluarga->id]) }}"
    class="btn btn-primary mb-3">+ Anggota Keluarga</a>
@endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">

        </div>
        <div class="table-responsive">
            <table id="anggota-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Hubungan</th>
                        <th>No. KK</th>
                        <th>Kepala Keluarga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anggotaKeluargas as $anggota)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $anggota->nik }}</td>
                        <td>{{ $anggota->nama }}</td>
                        <td>{{ $anggota->jenis_kelamin == 'Laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $anggota->hubunganKeluarga?->nama }}</td>
                        <td>{{ $anggota->datakeluarga->no_kk ?? 'N/A' }}</td>
                        <td>{{ $anggota->datakeluarga->kepala_keluarga ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex gap-1 justify-content-center">
                                {{-- Detail --}}
                                <a href="#" class="btn btn-sm btn-info detail-anggota" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $anggota->id }}">Detail</a>


                                <a href="{{ route('anggota_keluarga.edit', $anggota->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                @can('anggota_keluarga.delete')
                                <button type="button" class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#delete-confirm-{{ $anggota->id }}">
                                    Hapus
                                </button>
                                @endcan

                            </div>


                            <!-- modal detail -->
                            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel">Detail Anggota Keluarga</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="modal-body-content">
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
                                    <!-- end modal -->
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Data anggota keluarga masih kosong.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@foreach ($anggotaKeluargas as $anggota)
<x-modal.delete-confirm
    id="delete-confirm-{{ $anggota->id }}"
    title="Yakin hapus data ini?"
    description="Aksi ini tidak bisa dikembalikan."
    route="{{ route('anggota_keluarga.destroy', $anggota) }}"
    item="{{ $anggota->kepala_keluarga }}" />
@endforeach
@push('addon-script')
<script>
    $(document).ready(function() {
        $('#anggota-table').DataTable();

        // Handle klik pada tombol Detail
        $(document).on('click', '.detail-anggota', function(e) {
            e.preventDefault();
            const anggotaId = $(this).data('id');
            const modalBody = $('#modal-body-content');

            // Tampilkan loading spinner saat data sedang dimuat
            modalBody.html(`
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `);

            // Panggilan AJAX untuk mengambil data anggota
            $.ajax({
                url: `/anggota_keluarga/${anggotaId}/get_data`, // Pastikan endpoint ini sesuai
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        const anggota = response.data;
                        // Hasilkan HTML untuk menampilkan data anggota
                        let content = `
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Email:</strong>
                                    <p>${anggota.email || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>NIK:</strong>
                                    <p>${anggota.nik || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Nama Lengkap:</strong>
                                    <p>${anggota.nama}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Jenis Kelamin:</strong>
                                    <p>${anggota.jenis_kelamin}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Hubungan:</strong>
                                    <p>${anggota.hubungan_keluarga?.nama || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>No. KK:</strong>
                                    <p>${anggota.datakeluarga?.no_kk || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Kepala Keluarga:</strong>
                                    <p>${anggota.datakeluarga?.kepala_keluarga || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>No. Akta Kelahiran:</strong>
                                    <p>${anggota.no_akta_kelahiran || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Tempat Lahir:</strong>
                                    <p>${anggota.tempat_lahir || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Tanggal Lahir:</strong>
                                    <p>${anggota.tanggal_lahir ? new Date(anggota.tanggal_lahir).toLocaleDateString() : 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Tanggal Pencatatan:</strong>
                                    <p>${anggota.tanggal_pencatatan ? new Date(anggota.tanggal_pencatatan).toLocaleDateString() : 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Status Perkawinan:</strong>
                                    <p>${anggota.status_perkawinan || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Agama:</strong>
                                    <p>${anggota.agama?.agama || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Golongan Darah:</strong>
                                    <p>${anggota.golongan_darah?.golongan_darah || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Kewarganegaraan:</strong>
                                    <p>${anggota.kewarganegaraan?.kewarganegaraan || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Etnis:</strong>
                                    <p>${anggota.etnis || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Pendidikan:</strong>
                                    <p>${anggota.pendidikan?.pendidikan || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Mata Pencaharian:</strong>
                                    <p>${anggota.mata_pencaharian?.mata_pencaharian || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Nama Orang Tua:</strong>
                                    <p>${anggota.nama_orang_tua || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>KB:</strong>
                                    <p>${anggota.kb?.kb || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Cacat:</strong>
                                    <p>${anggota.cacat?.tipe || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Cacat:</strong>
                                    <p>${anggota.cacat?.nama_cacat || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Kedudukan Pajak:</strong>
                                    <p>${anggota.kedudukan_pajak?.nama || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Lembaga:</strong>
                                    <p>${anggota.lembaga?.jenis_lembaga || 'N/A'}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Lembaga:</strong>
                                    <p>${anggota.lembaga?.nama_lembaga || 'N/A'}</p>
                                </div>
                            </div>
                        `;
                        modalBody.html(content);
                    } else {
                        modalBody.html('<p class="text-danger">Data tidak ditemukan.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                    modalBody.html('<p class="text-danger">Terjadi kesalahan saat mengambil data.</p>');
                }
            });
        });
    });
</script>
@endpush
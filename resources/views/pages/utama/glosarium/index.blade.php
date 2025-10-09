@extends('layouts.master')

@section('title', 'Glosarium')

@push('addon-style')
    <style>
        body.modal-open {
            padding-right: 0 !important;
            overflow: auto !important;
        }
    </style>
@endpush

@section('action')
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#create-glosarium">
        <i></i>Tambah Glosari
    </button>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="glosarium-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Istilah</th>
                            <th>Deskripsi</th>
                            <th class="text-nowrap">Terakhir Update</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($glosarium as $g)
                            <tr class="align-middle">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $g->istilah }}</td>
                                <td>{{ Str::limit($g->deskripsi, 65) }}</td>
                                <td class="text-nowrap">
                                    {{ $g->updated_at->translatedFormat('d M Y') }}
                                    <small class="d-block text-muted">{{ $g->updated_at->diffForHumans() }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                            data-bs-target="#detail-glosarium-{{ $g->id }}" data-bs-toggle="tooltip"
                                            title="Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#edit-glosarium-{{ $g->id }}" data-bs-toggle="tooltip"
                                            title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-glosarium-{{ $g->id }}" data-bs-toggle="tooltip"
                                            title="Hapus">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data glosarium.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($glosarium->isNotEmpty())
        @foreach ($glosarium as $g)
            {{-- Modal Detail --}}
            <div class="modal fade" id="detail-glosarium-{{ $g->id }}" tabindex="-1" aria-hidden="true">
                {{-- Konten Modal Detail --}}
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Istilah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <h5 class="fw-bold">{{ $g->istilah }}</h5>
                            </div>
                            <div>
                                <p class="mb-0" style="text-align: justify;">
                                    {!! nl2br(e($g->deskripsi)) !!}
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Edit --}}
            <div class="modal fade" id="edit-glosarium-{{ $g->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Glosari</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('utama.glosarium.update', $g->id) }}"
                                id="edit-form-{{ $g->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="edit_form_id" value="{{ $g->id }}">
                                <div class="mb-3">
                                    <label class="form-label">Istilah</label>
                                    <input type="text" name="istilah"
                                        class="form-control @error('istilah', 'updateGlosarium') is-invalid @enderror"
                                        value="{{ old('istilah', $g->istilah) }}" required>
                                    @error('istilah', 'updateGlosarium')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi', 'updateGlosarium') is-invalid @enderror"
                                        rows="3" required>{{ old('deskripsi', $g->deskripsi) }}</textarea>
                                    @error('deskripsi', 'updateGlosarium')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Hapus --}}
            <div class="modal fade" id="delete-glosarium-{{ $g->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Glosari?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin ingin menghapus istilah "<strong>{{ $g->istilah }}</strong>"?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form method="POST" action="{{ route('utama.glosarium.destroy', $g->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    {{-- Modal Tambah --}}
    <div class="modal fade" id="create-glosarium" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Glosari Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('utama.glosarium.store') }}" id="create-form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Istilah <span class="text-danger">*</span></label>
                            <input type="text" name="istilah"
                                class="form-control @error('istilah', 'storeGlosarium') is-invalid @enderror"
                                value="{{ old('istilah') }}" required>
                            @error('istilah', 'storeGlosarium')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi', 'storeGlosarium') is-invalid @enderror"
                                rows="3" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi', 'storeGlosarium')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables dan simpan dalam variabel
            var glosariumTable = $('#glosarium-table').DataTable();

            glosariumTable.columns.adjust();

            // Inisialisasi Tooltip Bootstrap
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Script untuk menangani error validasi pada modal
            @if ($errors->any())
                @if ($errors->hasBag('storeGlosarium'))
                    var createModal = new bootstrap.Modal(document.getElementById('create-glosarium'));
                    createModal.show();
                @elseif ($errors->hasBag('updateGlosarium'))
                    var failedEditId = '{{ old('edit_form_id') }}';
                    var editModal = new bootstrap.Modal(document.getElementById('edit-glosarium-' + failedEditId));
                    editModal.show();
                @endif
            @endif
        });
    </script>
@endpush

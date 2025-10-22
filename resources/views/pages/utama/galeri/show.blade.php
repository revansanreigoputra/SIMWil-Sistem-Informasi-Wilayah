@extends('layouts.master')

@section('title', 'Detail Foto Album')

@push('addon-style')
    {{-- CSS untuk uploader di dalam modal --}}
    <style>
        .uploader-container {
            border: 2px dashed #ccc;
            border-radius: 0.5rem;
            padding: 1rem;
            background-color: #f8f9fa;
        }

        .uploader-container .drop-zone-top {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100px;
            /* Memberi tinggi minimal agar tidak pipih */
            text-align: center;
            padding: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .uploader-container .drop-zone-top:hover {
            background-color: #e9ecef;
        }

        .uploader-container .icon {
            font-size: 1rem;
            color: #adb5bd;
        }

        .preview-grid-container {
            display: none;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
            max-height: 300px;
            overflow-y: auto;
            padding: 0.5rem;
            background-color: #fff;
            border-radius: 0.25rem;
        }

        .preview-grid-item {
            position: relative;
            aspect-ratio: 1/1;
        }

        .preview-grid-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.25rem;
        }

        .preview-grid-item .filename {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 0.75rem;
            padding: 2px 5px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            border-bottom-left-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }
    </style>
@endpush

@section('action')
    {{-- TOMBOL UTAMA SEKARANG HANYA UNTUK TAMBAH FOTO --}}
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadPhotoModal">
        <i></i> Tambah Foto
    </button>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Foto: <strong>{{ $album->album }}</strong></h3>
        </div>
        <div class="card-body">
            @if ($album->photos->isEmpty())
                <div class="alert alert-info text-center">
                    Belum ada foto di dalam album ini. Klik tombol "+ Tambah Foto" untuk memulai.
                </div>
            @else
                <div class="row g-3">
                    @foreach ($album->photos as $photo)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <div class="card h-100 shadow-sm">
                                <div style="position: relative;">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete-foto-{{ $photo->id }}"
                                        style="position: absolute; top: 8px; right: 8px; z-index: 10;" title="Hapus Foto">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                    <img src="{{ asset('storage/foto_foto/' . $photo->foto) }}" class="card-img-top"
                                        alt="Foto {{ $loop->iteration }}" style="aspect-ratio: 1 / 1; object-fit: cover;">
                                </div>
                            </div>
                        </div>

                        {{-- Modal Konfirmasi Hapus untuk setiap foto --}}
                        <div class="modal fade" id="delete-foto-{{ $photo->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus Foto</h5> <button type="button"
                                            class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <p>Yakin ingin menghapus foto ini dari album?</p>
                                        <img src="{{ asset('storage/foto_foto/' . $photo->foto) }}" class="img-thumbnail"
                                            width="200" alt="Foto">
                                    </div>
                                    <div class="modal-footer">
                                        <form
                                            action="{{ route('utama.galeri.photo.destroy', ['galeri' => $album->id, 'photo' => $photo->id]) }}"
                                            method="POST">
                                            @csrf @method('DELETE')
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- BAGIAN BARU: Card Footer untuk tombol navigasi --}}
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <a href="{{ route('utama.galeri.index') }}" class="btn btn-warning">
                    <i></i> Kembali
                </a>
            </div>
        </div>
    </div>

    {{-- MODAL UPLOAD FOTO --}}
    <div class="modal fade" id="uploadPhotoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Foto ke Album: <strong>{{ $album->album }}</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('utama.galeri.photo.store', $album->id) }}" method="POST"
                        enctype="multipart/form-data" id="uploadForm">
                        @csrf
                        <input type="file" name="fupload[]" id="fupload" class="d-none" multiple required>
                        <div class="uploader-container" id="uploader-container">
                            <label for="fupload" class="drop-zone-top">
                                <div class="icon"><i class="bi bi-cloud-arrow-up-fill"></i></div>
                                <strong>Tarik & Lepaskan File di Sini</strong>
                                <p class="mb-0 text-muted">atau klik untuk memilih file</p>
                            </label>
                            <div class="preview-grid-container" id="preview-container"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="uploadForm">
                        <i></i> Upload dan Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    {{-- Script untuk uploader modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploaderContainer = document.getElementById('uploader-container');
            const fileInput = document.getElementById('fupload');
            const previewContainer = document.getElementById('preview-container');
            const handleFiles = (files) => {
                previewContainer.innerHTML = '';
                if (files.length > 0) { // <--- Logika baru yang lebih simpel
                    previewContainer.style.display = 'grid'; // Tampilkan jika ada file
                } else {
                    previewContainer.style.display = 'none'; // Sembunyikan jika tidak ada file
                }
                Array.from(files).forEach(file => {
                    if (!file.type.startsWith('image/')) return;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const previewItem =
                            `<div class="preview-grid-item"><img src="${e.target.result}" alt="${file.name}"><div class="filename" title="${file.name}">${file.name}</div></div>`;
                        previewContainer.innerHTML += previewItem;
                    };
                    reader.readAsDataURL(file);
                });
            };
            fileInput.addEventListener('change', () => handleFiles(fileInput.files));
            uploaderContainer.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploaderContainer.style.borderColor = '#0d6efd';
            });
            uploaderContainer.addEventListener('dragleave', () => {
                uploaderContainer.style.borderColor = '#ccc';
            });
            uploaderContainer.addEventListener('drop', (e) => {
                e.preventDefault();
                uploaderContainer.style.borderColor = '#ccc';
                const droppedFiles = e.dataTransfer.files;
                fileInput.files = droppedFiles;
                handleFiles(droppedFiles);
            });
        });
    </script>
@endpush

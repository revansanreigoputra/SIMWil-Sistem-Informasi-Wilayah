@extends('layouts.master')

@section('title', 'Tambah Berita Baru')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Berita</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('utama.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul *</label>
                    <input type="text" name="judul" id="judul" class="form-control"
                        placeholder="Masukkan judul berita" required>
                </div>

                <div class="mb-3">
                    <label for="fupload" class="form-label">Gambar *</label>
                    <input type="file" name="fupload" id="fupload" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="isi_berita" class="form-label">Isi Berita *</label>
                    <textarea name="isi_berita" id="loko1" class="form-control" rows="10"></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('utama.berita.index') }}" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.tiny.cloud/1/9zjmg28d40yb4mn7sv8hwoop1c4aj6pbi8s08chgk8ythl65/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#loko1',
            plugins: 'autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            height: 350,
        });
    </script>
@endpush

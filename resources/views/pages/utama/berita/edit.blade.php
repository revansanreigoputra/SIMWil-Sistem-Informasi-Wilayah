@extends('layouts.master')

@section('title', 'Edit Berita')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Edit Berita</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('utama.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul *</label>
                    <input type="text" name="judul" id="judul" class="form-control"
                        value="{{ old('judul', $berita->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label for="fupload" class="form-label">Gambar</label>
                    <p class="form-text text-muted">Gambar saat ini:</p>
                    <img src="{{ asset('storage/foto_berita/' . $berita->gambar) }}" class="img-thumbnail mb-2"
                        style="max-width: 50px; height: auto;" alt="Gambar {{ $berita->judul }}">
                    <input type="file" name="fupload" id="fupload" class="form-control">
                    <small class="form-text text-danger">Kosongkan jika tidak ingin mengubah gambar.</small>
                </div>

                <div class="mb-3">
                    <label for="isi_berita" class="form-label">Isi Berita *</label>
                    <textarea name="isi_berita" id="loko1" class="form-control" rows="10">{{ old('isi_berita', $berita->isi_berita) }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('utama.berita.index') }}" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

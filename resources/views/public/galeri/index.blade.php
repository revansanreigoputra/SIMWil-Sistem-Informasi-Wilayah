@extends('layouts.public')
@section('title', 'Galeri Foto')

@section('content')

{{-- CSS Kustom - Gaya Flat Minimalis (Sesuai Referensi) --}}
<style>
    .album-card-container { /* Kelas baru untuk link <a> */
        display: block;
        text-decoration: none;
        color: inherit; /* Pastikan teks tidak biru seperti link */
    }

    .album-card { /* Kelas baru untuk kartu album */
        border-radius: 0;
        overflow: hidden;
        box-shadow: none;
        transition: none;
        background: #ffffff; /* Background card keseluruhan (putih) */
        margin-bottom: 30px;
        border: 1px solid #eee; /* Border tipis seperti di referensi */
        display: flex; /* Menggunakan flexbox untuk tata letak vertikal */
        flex-direction: column; /* Konten diatur secara kolom (gambar di atas, teks di bawah) */
        height: auto; /* Tinggi akan menyesuaikan konten */
    }

    /* Pengaturan gambar */
    .album-card .album-image-wrapper {
        width: 100%;
        height: 180px; /* Tinggi gambar, sesuaikan jika perlu */
        overflow: hidden; /* Memastikan gambar tidak keluar dari batas */
    }

    .album-card .album-image-wrapper img {
        width: 100%;
        height: 100%; /* Gambar mengisi wrapper */
        object-fit: cover;
        display: block;
    }

    /* Area konten (Teks):
      Ini yang akan jadi kotak abu-abu di bawah gambar,
      tanpa gradient hitam yang mengganggu.
    */
    .album-card .album-content { /* Kelas baru untuk area teks */
        background: #f5f5f5; /* Latar belakang abu-abu muda */
        padding: 20px 15px; /* Jarak di dalam kotak */
        text-align: center; /* Teks rata tengah */
        flex-grow: 1; /* Memastikan kotak ini mengisi sisa ruang jika diperlukan */
        display: flex; /* Gunakan flexbox juga untuk teks */
        align-items: center; /* Pusatkan secara vertikal */
        justify-content: center; /* Pusatkan secara horizontal */
    }

    /* Pengaturan Judul Album */
    .album-card .album-content h3 {
        color: #666; /* Warna teks abu-abu tua */
        font-size: 1.0rem;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase; /* BUAT KAPITAL */
        margin: 0; /* Hapus semua margin */
        line-height: 1.2; /* Tinggi baris */
    }

    /* Karena kita tidak pakai .blog_post_tag_part lagi,
       class ini bisa diabaikan atau dihapus jika tidak ada di HTML
    */
    .blog_post_tag_part {
        display: none !important;
    }

    /* Penyesuaian untuk headline GALERI FOTO */
    .headline_part span {
        display: block; /* Pastikan subtitle ada di bawah judul utama */
        font-size: 0.9em; /* Sesuaikan ukuran font subtitle */
        color: #888;
        margin-top: 5px;
    }
</style>

<section class="fullwidth_block padding-top-75 padding-bottom-75" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="headline_part centered margin-bottom-50">
                    GALERI FOTO
                    <span>Kumpulan album foto kegiatan</span>
                </h3>
            </div>
        </div>

        <div class="row">
            @forelse ($albums as $album)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('public.galeri.show', $album->id) }}" class="album-card-container">

                        {{-- STRUKTUR CARD BARU --}}
                        <div class="album-card">

                            {{-- Wrapper Gambar --}}
                            <div class="album-image-wrapper">
                                @if($album->photos->first())
                                    <img src="{{ asset('storage/foto_foto/' . $album->photos->first()->foto) }}" alt="{{ $album->album }}">
                                @else
                                    <img src="{{ asset('frontend/images/blog-compact-post-01.jpg') }}" alt="Belum ada foto">
                                @endif
                            </div>

                            {{-- Area Teks (Konten) --}}
                            <div class="album-content">
                                <h3>{{ $album->album }}</h3>
                            </div>

                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Belum ada album galeri yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="utf_pagination_container_part">
                    {{ $albums->links() }}
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

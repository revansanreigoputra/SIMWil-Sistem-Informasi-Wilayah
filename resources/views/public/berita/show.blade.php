{{-- resources/views/public/berita/show.blade.php --}}
@extends('layouts.public')

@section('title', $berita->judul)

@section('content')

<section class="fullwidth_block padding-top-75 padding-bottom-75" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="row">
            {{-- Buat 1 kolom utama di tengah --}}
            <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">

                {{-- 1. Judul & Tanggal (DI LUAR KOTAK) --}}
                {{-- Menggunakan style judul dari home.blade.php --}}
                <h3 class="headline_part centered margin-bottom-35">
                    {{ $berita->judul }}
                    {{-- Tanggal sebagai sub-judul (di dalam span) --}}
                    <span>
                        <i class="fa-solid fa-calendar-days"></i>
                        {{ $berita->created_at->translatedFormat('l, d F Y') }}
                    </span>
                </h3>

                {{-- 2. Kotak Konten (Gambar + Isi Berita) --}}
                <div class="blog-post">
                    {{--
                        Sekarang .post-content adalah satu-satunya turunan
                        dari .blog-post (kotak putih)
                    --}}
                    <div class="post-content">

                        {{-- Gambar Berita (Sekarang di DALAM post-content) --}}
                        <div class="post-img" style="margin-bottom: 30px;">
                            <img src="{{ asset('storage/foto_berita/' . $berita->gambar) }}"
                                 alt="{{ $berita->judul }}"
                                 style="
                                    display: block;
                                    width: 30%; {{-- 100% lebar dari kotak putih --}}
                                    height: auto;
                                    margin: 0 auto;
                                    border-radius: 8px;
                                 ">
                        </div>

                        {{-- Isi Berita --}}
                        <div class="article-content">
                            {!! $berita->isi_berita !!}
                        </div>

                    </div> {{-- / End .post-content --}}
                </div> {{-- / End .blog-post --}}


                {{-- 3. Tombol Kembali --}}
                <div class="text-center margin-top-30">
                    <a href="{{ route('public.berita.index') }}" class="button border">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Berita
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

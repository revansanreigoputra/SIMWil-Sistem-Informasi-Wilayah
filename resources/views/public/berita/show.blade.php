@extends('layouts.public')

@section('title', $berita->judul)

@section('content')

    <section class="fullwidth_block padding-top-75 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
                    <h3 class="headline_part centered margin-bottom-35">
                        {{ $berita->judul }}
                        <span>
                            <i class="fa-solid fa-calendar-days"></i>
                            {{ $berita->created_at->translatedFormat('l, d F Y') }}
                        </span>
                    </h3>
                    <div class="blog-post">
                        <div class="post-content">
                            <div class="post-img" style="margin-bottom: 30px;">
                                <img src="{{ asset('storage/foto_berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                    style="
                                    display: block;
                                    width: 30%;
                                    height: auto;
                                    margin: 0 auto;
                                    border-radius: 8px;
                                 ">
                            </div>
                            <div class="article-content">
                                {!! $berita->isi_berita !!}
                            </div>

                        </div>
                    </div>

                    <div class="text-center margin-top-30">
                        <a href="{{ route('public.berita.index') }}" class="button border">
                            <i></i> Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

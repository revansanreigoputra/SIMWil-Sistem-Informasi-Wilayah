@extends('layouts.public')

@section('title', 'Galeri Foto')

@section('content')

    <style>
        .album-card-container {
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .album-card {
            border-radius: 0;
            overflow: hidden;
            box-shadow: none;
            transition: none;
            background: #ffffff;
            margin-bottom: 30px;
            border: 1px solid #eee;
            display: flex;
            flex-direction: column;
            height: auto;
        }

        .album-card:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
            transform: translateY(-4px);
            transition: all 0.25s ease;
        }

        .album-card .album-image-wrapper {
            width: 100%;
            height: 180px;
            overflow: hidden;
        }

        .album-card .album-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .album-card .album-content {
            background: #f5f5f5;
            padding: 20px 15px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .album-card .album-content h3 {
            color: #666;
            font-size: 1.0rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin: 0;
            line-height: 1.2;
        }

        .blog_post_tag_part {
            display: none !important;
        }

         .headline_part span {
            display: block;
            font-size: 0.9em;
            color: #888;
            margin-top: 5px;
        }
    </style>

    <section class="fullwidth_block padding-top-75 padding-bottom-75">
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
                            <div class="album-card">

                                <div class="album-image-wrapper">
                                    @if ($album->photos->first())
                                        <img src="{{ asset('storage/foto_foto/' . $album->photos->first()->foto) }}"
                                            alt="{{ $album->album }}">
                                    @else
                                        <img src="{{ asset('frontend/images/blog-compact-post-01.jpg') }}"
                                            alt="Belum ada foto">
                                    @endif
                                </div>

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

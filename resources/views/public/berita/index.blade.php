@extends('layouts.public')

@section('content')
    <section class="fullwidth_block padding-top-75 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline_part centered margin-bottom-50">
                        BERITA & INFORMASI
                        <span>Kumpulan berita terbaru seputar wilayah Sleman</span>
                    </h3>
                </div>
            </div>

            <div class="row">
                @forelse ($daftar_berita as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="{{ route('public.berita.show', $item->slug) }}" class="blog_compact_part-container">
                            <div class="blog_compact_part">
                                <img src="{{ asset('storage/foto_berita/' . $item->gambar) }}" alt="{{ $item->judul }}">
                                <div class="blog_compact_part_content">
                                    <h3>{{ $item->judul }}</h3>
                                    <ul class="blog_post_tag_part">
                                        <li>{{ $item->created_at->isoFormat('D MMMM YYYY') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">Belum ada berita yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="utf_pagination_container_part">
                        {{ $daftar_berita->links() }}
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

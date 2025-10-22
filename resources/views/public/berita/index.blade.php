{{-- Gunakan layout landing page Anda, BUKAN layouts.master --}}
@extends('layouts.public')

@section('content')

{{--
    BLOCK KONTEN LAMA (MENGGUNAKAN #titlebar DAN .blog-post) DIHAPUS
    DAN DIGANTIKAN DENGAN STRUKTUR DARI home.blade.php
--}}

<section class="fullwidth_block padding-top-75 padding-bottom-75">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Menggunakan style judul dari home.blade.php --}}
                <h3 class="headline_part centered margin-bottom-50">
                    BERITA & INFORMASI
                    <span>Kumpulan berita terbaru seputar wilayah Sleman</span>
                </h3>
            </div>
        </div>

        <div class="row">
            {{-- Loop data dari PublicBeritaController --}}
            @forelse ($daftar_berita as $item)
                {{-- Menggunakan style card (blog_compact_part) dari home.blade.php --}}
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('public.berita.show', $item->slug) }}" class="blog_compact_part-container">
                        <div class="blog_compact_part">
                            {{-- Path gambar dinamis dari controller --}}
                            <img src="{{ asset('storage/foto_berita/' . $item->gambar) }}" alt="{{ $item->judul }}">
                            <div class="blog_compact_part_content">
                                <h3>{{ $item->judul }}</h3>
                                <ul class="blog_post_tag_part">
                                    {{-- Menampilkan tanggal publish (asumsi dari created_at) --}}
                                    {{-- Pastikan locale 'id' sudah di-set di AppServiceProvider agar formatnya "18 Agustus 2025" --}}
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

            {{-- Tombol "Berita Selengkapnya" dari home.blade.php tidak diperlukan di sini --}}
        </div>

        {{-- Tetap tampilkan pagination dari index.blade.php yang lama --}}
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

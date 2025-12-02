@extends('layouts.public')

@section('title', 'Berita & Informasi')

@push('styles')
    {{-- Kode ini akan MEMAKSA tampilan kartu berita jadi benar --}}
    <style>
        .blog_compact_part {
            position: relative;
            overflow: hidden;
            border-radius: 8px; /* Opsi: tambahkan ini agar sudutnya melengkung */
            height: 100%; /* Pastikan kartu punya tinggi */
        }

        .blog_compact_part img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .blog_compact_part:hover img {
            transform: scale(1.05); /* Efek zoom saat hover */
        }

        .blog_compact_part .blog_compact_part_content {
            /* Ini bagian penting: paksa jadi overlay di bawah */
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 25px 20px;
            /* Tambahkan gradien gelap agar teks terbaca */
            background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0) 100%);
        }

        .blog_compact_part .blog_compact_part_content h3 {
            /* Paksa teks jadi putih */
            color: #ffffff;
            font-size: 1.1rem; /* Sesuaikan ukuran font jika perlu */
            margin-bottom: 5px;
        }

        .blog_compact_part .blog_compact_part_content .blog_post_tag_part li {
            /* Paksa teks tanggal jadi putih */
            color: #f0f0f0;
            font-size: 0.8rem;
        }

        /* Pastikan 'a' mengisi seluruh area kolom */
        .blog_compact_part-container {
            display: block;
            height: 280px; /* Atur tinggi kartu seragam, sesuaikan jika perlu */
            margin-bottom: 30px; /* Beri jarak antar baris */
        }
    </style>
@endpush

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
                    {{-- Ini class grid dari template asli kamu, sudah benar --}}
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="{{ route('public.berita.show', $item->slug) }}" class="blog_compact_part-container">
                            <div class="blog_compact_part">
                                {{-- PERBAIKAN PATH GAMBAR DI SINI --}}
                                <img src="{{ asset('asset/uploads/foto_berita/' . $item->gambar) }}" alt="{{ $item->judul }}">

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
                    <div class="col-md-12">
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

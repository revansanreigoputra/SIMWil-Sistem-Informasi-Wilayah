@extends('layouts.master')

@section('title')

    @push('addon-style')
        <style>
            .article-container {
                max-width: 880px;
                margin: 0 auto;
                padding: 0.5rem 1rem 2rem;
            }

            .article-title {
                font-size: 2.2rem;
                font-weight: 500;
                color: #1f2937;
                margin-bottom: .75rem;
                text-align: center;
            }

            .article-meta {
                font-size: .9rem;
                color: #6b7280;
                margin-bottom: 1rem;
                text-align: center;
            }

            .article-banner {
                display: block;
                margin-left: auto;
                margin-right: auto;
                max-width: 100%;
                width: auto;
                max-height: 200px;
                object-fit: cover;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
                margin-bottom: 1.25rem;
            }

            .article-body {
                font-size: 1.05rem;
                line-height: 1.8;
                color: #374151;
                text-align: justify;
            }

            .article-body p {
                margin-bottom: 1.2rem;
            }

            .article-footer {
                display: flex;
                justify-content: space-between;
                border-top: 1px solid #e5e7eb;
                margin-top: 2rem;
                padding-top: 1rem;
            }
        </style>
    @endpush

@section('content')
    <div class="article-container">
        <h1 class="article-title">{{ $berita->judul }}</h1>
        <div class="article-meta">
            {{ $berita->created_at->translatedFormat('d F Y') }} |
            {{ $berita->created_at->format('H:i') }} WIB
        </div>

        @if ($berita->gambar)
            <img src="{{ asset('storage/foto_berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="article-banner">
        @endif

        <div class="article-body">
            {!! $berita->isi_berita !!}
        </div>

        <div class="article-footer">
            <a href="{{ route('utama.berita.index') }}" class="btn btn-outline-secondary">Kembali</a>
            <a href="{{ route('utama.berita.edit', $berita->id) }}" class="btn btn-primary">Edit Berita</a>
        </div>
    </div>
@endsection

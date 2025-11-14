@extends('layouts.public')

@section('title', 'Detail Album: ' . $album->album)

@push('styles')
<style>
    .utf_gallery_container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 10px;
    }

    .utf_gallery_item {
        aspect-ratio: 1 / 1;
        overflow: hidden;
        display: block;
        border-radius: 8px;
    }

    .utf_gallery_item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .utf_gallery_item:hover img {
        transform: scale(1.05);
    }
</style>
@endpush

@section('content')
    <section class="fullwidth_block padding-top-75 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline_part centered margin-bottom-50">
                        {{ $album->album }}
                        <span>Menampilkan {{ $album->photos->count() }} foto</span>
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="utf_gallery_container mfp-gallery">
                        @forelse ($album->photos as $foto)
                            <a href="{{ asset('storage/foto_foto/' . $foto->foto) }}" class="utf_gallery_item"
                                title="Klik untuk perbesar">
                                <img src="{{ asset('storage/foto_foto/' . $foto->foto) }}" alt="Foto">
                            </a>
                        @empty
                            <div class="col-12">
                                <p class="text-center">Tidak ada foto di dalam album ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="col-md-12 centered_content">
                    <a href="{{ route('public.galeri.index') }}" class="button border margin-top-20">
                        <i></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

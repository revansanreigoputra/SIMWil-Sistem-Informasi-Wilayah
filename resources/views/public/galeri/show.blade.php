@extends('layouts.public')
@section('title', 'Detail Album: ' . $album->album)

{{--
  CSS UNTUK MEMBUAT GALERI MENJADI GRID KOTAK
  CSS ini ditambahkan di sini agar langsung bisa dites.
  Idealnya, pindahkan kode CSS di bawah ini ke file CSS utama Anda.
--}}
<style>
  /* Container utama galeri */
  .utf_gallery_container {
    display: grid;

    /* Membuat kolom-kolom grid yang responsif.
      - 'auto-fill': Isi sebanyak mungkin kolom dalam satu baris.
      - 'minmax(200px, 1fr)': Tiap kolom minimal 200px, dan bisa membesar (1fr)
        untuk mengisi ruang kosong. Ganti 200px jika ingin lebih besar/kecil.
    */
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));

    /* Memberi jarak antar foto */
    gap: 10px;
  }

  /* Item galeri (tag <a>) */
  .utf_gallery_item {
    /* Memaksa setiap item galeri menjadi KOTAK (rasio 1:1) */
    aspect-ratio: 1 / 1;

    /* Menyembunyikan bagian gambar yang ter-crop */
    overflow: hidden;
    display: block;
    border-radius: 8px; /* Opsional: membuat sudut sedikit bulat */
  }

  /* Gambar di dalam item galeri (tag <img>) */
  .utf_gallery_item img {
    width: 100%;
    height: 100%;

    /* Ini KUNCINYA:
      - 'object-fit: cover' membuat gambar (yang ukurannya beda-beda)
        mengisi penuh kotak TANPA menjadi penyet/distorsi.
      - Gambar akan otomatis di-crop dari tengah agar pas.
    */
    object-fit: cover;

    /* Opsional: Efek transisi saat di-hover */
    transition: transform 0.3s ease;
  }

  /* Opsional: Efek zoom kecil saat mouse diarahkan ke gambar */
  .utf_gallery_item:hover img {
    transform: scale(1.05);
  }
</style>
{{-- AKHIR DARI CSS GALERI --}}


@section('content')
<section class="fullwidth_block padding-top-75 padding-bottom-75" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Judul halaman diisi nama album --}}
                <h3 class="headline_part centered margin-bottom-50">
                    {{ $album->album }}
                    <span>Menampilkan {{ $album->photos->count() }} foto</span>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {{--
                    Kita gunakan grid galeri yang sama dengan di landing page.
                    Tambahkan class 'mfp-gallery' ke container
                    agar semua link <a> di dalamnya bisa di-popup.
                --}}

                {{-- Ini adalah container yang di-style oleh CSS di atas --}}
                <div class="utf_gallery_container mfp-gallery">

                    @forelse ($album->photos as $foto)
                        {{-- Link <a> ini akan otomatis diambil oleh magnific-popup --}}
                        <a href="{{ asset('storage/foto_foto/' . $foto->foto) }}"
                           class="utf_gallery_item"
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

            {{-- Tombol Kembali --}}
            <div class="col-md-12 centered_content">
                <a href="{{ route('public.galeri.index') }}" class="button border margin-top-20">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Album
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

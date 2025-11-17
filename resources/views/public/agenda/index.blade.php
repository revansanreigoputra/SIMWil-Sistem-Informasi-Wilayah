@extends('layouts.public')

@section('title', 'Agenda Kegiatan')

@push('styles')
    {{-- CSS KUSTOM (DESAIN BARU ANDA + PERBAIKAN FONT/IKON) --}}
    <style>
        .agenda-card-wrapper {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #f0f0f0;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            height: calc(100% - 30px);

            /* --- FIX 1: FONT --- */
            /* Paksa font agar tidak dirusak stylesheet.css */
            font-family: 'Nunito', 'Open Sans', Arial, sans-serif !important;
        }

        .agenda-card-wrapper:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
        }

        /* Status Badge (pojok kanan atas) */
        .agenda-status {
            position: absolute;
            top: 14px;
            right: 14px;
            font-size: 0.7rem;
            padding: 4px 12px;
            border-radius: 50px;
            color: #fff;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            z-index: 2;

            /* --- FIX 1: FONT --- */
            font-family: 'Nunito', 'Open Sans', Arial, sans-serif !important;
        }

        .agenda-status i {
            font-size: 0.65rem;

            /* --- FIX 2: IKON --- */
            /* Paksa ikon status agar tidak rusak */
            font-family: "Font Awesome 6 Free", "Font Awesome 6 Solid" !important;
            font-weight: 900 !important;
            font-style: normal !important;
        }

        .agenda-status.upcoming { background-color: #ff5a5f; }
        .agenda-status.ongoing { background-color: #00bcd4; }
        .agenda-status.finished { background-color: #adb5bd; }

        /* Konten Card */
        .agenda-card-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        /* Header (Tanggal + Judul) */
        .agenda-header {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
            padding-top: 1.5rem;
        }

        /* Kotak Tanggal (kiri) */
        .agenda-date {
            background-color: #f8f9fa;
            border-radius: 10px;
            width: 70px;
            padding: 6px 0;
            line-height: 1.3;
            text-align: center;
            flex-shrink: 0;
            margin-right: 15px;
            border: 1px solid #eee;
        }

        .agenda-date .day {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            display: block;
        }

        .agenda-date .month {
            font-size: 0.8rem;
            text-transform: uppercase;
            font-weight: 600;
            color: #6c757d;
            display: block;
        }

        /* Judul (kanan) */
        .agenda-title {
            flex-grow: 1;
        }

        .agenda-title h6 {
            font-size: 0.95rem;
            font-weight: 600;
            color: #222;
            line-height: 1.4;
            margin: 0;
            min-height: 2.8em;

            /* --- FIX 1: FONT --- */
            font-family: 'Nunito', 'Open Sans', Arial, sans-serif !important;
        }

        /* Garis pemisah */
        .agenda-card-content hr {
            border: 0;
            border-top: 1px solid #f0f0f0;
            margin: 0.75rem 0 1rem 0;
        }

        /* Detail (Waktu, Lokasi, Peserta) */
        .agenda-details {
            font-size: 0.85rem;
            color: #666;
            flex-grow: 1;
        }

        .agenda-detail-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 0.8rem;
            line-height: 1.5;
        }

        .agenda-detail-item i {
            width: 18px;
            text-align: center;
            margin-right: 8px;
            margin-top: 3px;
            color: #00bcd4; /* Warna ikon default */

            /* --- FIX 2: IKON --- */
            /* Paksa ikon detail agar tidak rusak */
            font-family: "Font Awesome 6 Free", "Font Awesome 6 Solid" !important;
            font-weight: 900 !important;
            font-style: normal !important;
        }

        /* Warna ikon spesifik (Sudah Benar) */
        .agenda-detail-item i.fa-location-dot { color: #28a745; }
        .agenda-detail-item i.fa-users { color: #17a2b8; }
        .agenda-detail-item i.fa-clock { color: #6c757d; }

        /* Jaga tinggi konsisten (Sudah Benar) */
        .agenda-detail-item:has(i.fa-clock) { min-height: 3.2em; }
        .agenda-detail-item:has(i.fa-location-dot) { min-height: 3.2em; }

        /* Alert kustom jika kosong (Sudah Benar) */
        .agenda-empty-alert {
            border: 1px solid #eee;
            background-color: #f9f9f9;
            color: #777;
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
        }

        /* --- TAMBAHAN UNTUK PAGINATION KE TENGAH --- */
        .utf_pagination_container_part {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('content')
    <section class="fullwidth_block padding-top-75 padding-bottom-75">
        <div class="container">

            {{-- Ini adalah Judul Halaman (Sudah Benar) --}}
            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline_part centered margin-bottom-50">
                        AGENDA KEGIATAN
                        <span>Daftar semua jadwal kegiatan wilayah</span>
                    </h3>
                </div>
            </div>

            {{-- Ini adalah Grid Konten (Sudah Benar) --}}
            <div class="row">
                @forelse ($agendas as $agenda)
                    @php
                        $tglMulai = \Carbon\Carbon::parse($agenda->tgl_dari);
                        $tglSelesai = \Carbon\Carbon::parse($agenda->tgl_sampai);
                        $now = \Carbon\Carbon::now();

                        if ($now->lt($tglMulai)) {
                            $status = 'Akan Datang';
                            $badgeClass = 'upcoming';
                            $statusIcon = 'fa-solid fa-bell';
                        } elseif ($now->between($tglMulai, $tglSelesai)) {
                            $status = 'Berlangsung';
                            $badgeClass = 'ongoing';
                            $statusIcon = 'fa-solid fa-circle-dot';
                        } else {
                            $status = 'Selesai';
                            $badgeClass = 'finished';
                            $statusIcon = 'fa-solid fa-check';
                        }
                    @endphp

                    {{-- =============================================== --}}
                    {{--               INI PERUBAHANNYA                  --}}
                    {{--  Saya ganti 'col-md-3' menjadi 'col-md-4'       --}}
                    {{-- =============================================== --}}
                    <div class="col-md-4 col-sm-6 col-xs-12">

                        {{-- 2. KITA PAKAI KARTU KUSTOM BARU --}}
                        <div class="agenda-card-wrapper">
                            <span class="agenda-status {{ $badgeClass }}">
                                <i class="{{ $statusIcon }}"></i> <span>{{ $status }}</span>
                            </span>

                            <div class="agenda-card-content">
                                <div class="agenda-header">
                                    <div class="agenda-date">
                                        <span class="day">{{ $tglMulai->format('d') }}</span>
                                        <span class="month">{{ $tglMulai->translatedFormat('M') }}</span>
                                    </div>
                                    <div class="agenda-title">
                                        <h6>{{ $agenda->kegiatan }}</h6>
                                    </div>
                                </div>

                                <hr>

                                <div class="agenda-details">
                                    <p class="agenda-detail-item">
                                        <i class="fa-solid fa-clock"></i>
                                        <span>
                                            <strong>Waktu:</strong> {{ $tglMulai->translatedFormat('d M Y') }}
                                            @if ($tglMulai->diffInDays($tglSelesai) > 0)
                                                s/d {{ $tglSelesai->translatedFormat('d M Y') }}
                                            @endif
                                        </span>
                                    </p>
                                    <p class="agenda-detail-item">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>{{ $agenda->lokasi }}</span>
                                    </p>
                                    @if ($agenda->peserta)
                                        <p class="agenda-detail-item">
                                            <i class="fa-solid fa-users"></i>
                                            <span>Peserta: {{ $agenda->peserta }}</span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="agenda-empty-alert" role="alert">
                            Belum ada agenda kegiatan yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($agendas->hasPages())
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        {{-- 3. KITA PAKAI PAGINATION ASLI DARI TEMPLATE (sama kayak Berita) --}}
                        <div class="utf_pagination_container_part">
                            {{ $agendas->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

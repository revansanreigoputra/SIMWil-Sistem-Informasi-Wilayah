@extends('layouts.public')

@section('title', 'Agenda Kegiatan')

@push('styles')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .agenda-card {
            border-radius: 16px;
            background: linear-gradient(180deg, #ffffff 0%, #fafafa 100%);
            border: 1px solid #f0f0f0;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            overflow: hidden;
            position: relative;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);

        }

        .agenda-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
            border-color: #ffebeb;
        }

        .agenda-date-box {
            background-color: #fff3f3;
            border: 1px solid #ffd6d6;
            border-radius: 10px;
            width: 70px;
            padding: 6px 0;
            line-height: 1.3;
            box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.05);
            flex-shrink: 0;
        }

        .agenda-date-box span {
            display: block;
        }

        .agenda-card .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }

        .agenda-card h6 {
            color: #222;
            font-weight: 600;
            line-height: 1.4;
        }

        .agenda-card p {
            line-height: 1.6;
            font-size: 0.9rem;
            margin-bottom: 0.8rem;
        }

        hr {
            border-color: rgba(0, 0, 0, 0.05);
            margin: 0.75rem 0 1rem 0;
        }

        .agenda-icon {
            width: 18px;
            text-align: center;
            margin-right: 8px;
        }

        .agenda-status {
            position: absolute;
            top: 14px;
            right: 14px;
            font-size: 0.7rem;
            padding: 4px 12px;
            border-radius: 50px;
            color: #fff;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .agenda-status i {
            font-size: 0.65rem;
        }

        .agenda-status.upcoming {
            background-color: #ff5a5f;
        }

        .agenda-status.ongoing {
            background-color: #00bcd4;
        }

        .agenda-status.finished {
            background-color: #adb5bd;
        }

        .equal-height .agenda-card {
            flex: 1;
        }

        @media (max-width: 768px) {
            .equal-height {
                flex-direction: column;
            }

            .equal-height>[class*='col-'] {
                display: block;
                margin-bottom: 1rem;
            }

            .agenda-card {
                height: auto;
                min-height: unset;
            }

            .agenda-date-box {
                width: 60px;
            }

            .agenda-card .card-body {
                padding: 1rem;
            }

            .agenda-card h6 {
                font-size: 1rem;
                text-align: center;
            }
        }

        .agenda-card h6 {
            min-height: 2.8em;
        }

        .agenda-card p.card-text:has(i.fa-clock) {
            min-height: 3.2em;
        }

        .agenda-card p.card-text:has(i.fa-location-dot) {
            min-height: 3.2em;
        }

        .agenda-card div.pt-2>p.card-text:has(i.fa-users) {
            min-height: 3.2em;
        }

        .agenda-column-item {
            margin-bottom: 1.5rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 1.5rem;
            list-style: none;
            padding: 0;
        }

        .pagination .page-item {
            display: inline;
        }

        .pagination .page-link {
            border: none;
            background: #ff5a5f;
            color: #fff;
            font-weight: 600;
            font-size: 15px;
            padding: 4px 8px;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .pagination .page-link:hover {
            color: #0097a7;
            text-decoration: underline;
        }

        .pagination .page-item.active .page-link {
            background: #ff5a5f;
            color: #fff;
            text-decoration: underline;
            cursor: default;
        }

        .pagination .page-item.disabled .page-link {
            color: #c0c0c0;
            cursor: not-allowed;
        }
    </style>
@endpush

@section('content')
    <section class="fullwidth_block padding-top-75 padding-bottom-75">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline_part centered margin-bottom-50">
                        AGENDA KEGIATAN
                        <span>Daftar semua jadwal kegiatan wilayah</span>
                    </h3>
                </div>
            </div>

            <div class="row g-4">
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

                    <div class="col-lg-3 col-md-6 col-12 d-flex agenda-column-item">
                        <div class="card agenda-card shadow-sm w-100">
                            <span class="agenda-status {{ $badgeClass }}">
                                <i class="{{ $statusIcon }}"></i>
                                <span>{{ $status }}</span>
                            </span>

                            <div class="card-body">
                                <div>
                                    <div
                                        class="d-flex flex-column flex-md-row align-items-center align-items-md-start mb-4 pt-3">
                                        <div class="agenda-date-box text-center me-md-3 mb-3 mb-md-0">
                                            <span class="fs-5 fw-bold text-primary">{{ $tglMulai->format('d') }}</span>
                                            <span class="small text-uppercase fw-semibold text-secondary">
                                                {{ $tglMulai->translatedFormat('M') }}
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 text-center text-md-start">
                                            <h6 class="card-title mb-0">{{ $agenda->kegiatan }}</h6>
                                        </div>
                                    </div>

                                    <hr>
                                    <p class="card-text text-muted d-flex align-items-start">
                                        <i class="fa-solid fa-clock agenda-icon"></i>
                                        <span>
                                            <strong>Waktu:</strong> {{ $tglMulai->translatedFormat('d M Y') }}
                                            @if ($tglMulai->diffInDays($tglSelesai) > 0)
                                                s/d {{ $tglSelesai->translatedFormat('d M Y') }}
                                            @endif
                                        </span>
                                    </p>
                                    <p class="card-text text-muted d-flex align-items-start">
                                        <i class="fa-solid fa-location-dot agenda-icon text-success"></i>
                                        <span>{{ $agenda->lokasi }}</span>
                                    </p>
                                </div>

                                @if ($agenda->peserta)
                                    <div class="pt-2">
                                        <p class="card-text text-muted d-flex align-items-start mb-0">
                                            <i class="fa-solid fa-users agenda-icon text-info"></i>
                                            <span>Peserta: {{ $agenda->peserta }}</span>
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center" role="alert">
                            Belum ada agenda kegiatan yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($agendas->hasPages())
                <nav class="d-flex justify-content-center mt-4">
                    <ul class="pagination pagination-sm justify-content-center" style="gap: 6px;">

                        <li class="page-item {{ $agendas->onFirstPage() ? 'disabled' : '' }}">
                            <a href="{{ $agendas->previousPageUrl() }}"
                                class="page-link border-0 fw-semibold d-flex align-items-center justify-content-center"
                                style="width:30px; height:30px; font-size:14px; border-radius:8px; background:{{ $agendas->onFirstPage() ? '#e9f4ff' : '#fff' }}; color:#00bcd4;">
                                < </a>
                        </li>

                        {{-- Halaman --}}
                        @php
                            $current = $agendas->currentPage();
                            $last = $agendas->lastPage();
                            $start = max($current - 2, 1);
                            $end = min($current + 2, $last);
                        @endphp

                        @if ($start > 1)
                            <li class="page-item">
                                <a href="{{ $agendas->url(1) }}" class="page-link border-0 fw-semibold"
                                    style="width:30px; height:30px; border-radius:8px; background: #ff5a5f;; color: #fff;">1</a>
                            </li>
                            @if ($start > 2)
                                <li class="page-item disabled">
                                    <span class="page-link border-0 bg-transparent text-muted"
                                        style="font-size:13px;">...</span>
                                </li>
                            @endif
                        @endif

                        @for ($page = $start; $page <= $end; $page++)
                            <li class="page-item {{ $page == $current ? 'active' : '' }}">
                                <a href="{{ $agendas->url($page) }}"
                                    class="page-link border-0 fw-semibold d-flex align-items-center justify-content-center"
                                    style="width:30px; height:30px; border-radius:8px; font-size:14px; background:{{ $page == $current ? '#00bcd4' : '#fff' }}; color:{{ $page == $current ? '#fff' : '#00bcd4' }};">
                                    {{ $page }}
                                </a>
                            </li>
                        @endfor

                        @if ($end < $last)
                            @if ($end < $last - 1)
                                <li class="page-item disabled">
                                    <span class="page-link border-0 bg-transparent text-muted"
                                        style="font-size:13px;">...</span>
                                </li>
                            @endif
                            <li class="page-item">
                                <a href="{{ $agendas->url($last) }}" class="page-link border-0 fw-semibold"
                                    style="width:30px; height:30px; border-radius:8px; background: #ff5a5f;; color: #fff;">{{ $last }}</a>
                            </li>
                        @endif

                        {{-- Tombol Berikutnya --}}
                        <li class="page-item {{ $agendas->hasMorePages() ? '' : 'disabled' }}">
                            <a href="{{ $agendas->nextPageUrl() }}"
                                class="page-link border-0 fw-semibold d-flex align-items-center justify-content-center"
                                style="width:30px; height:30px; font-size:14px; border-radius:8px; background:{{ $agendas->hasMorePages() ? '#fff' : '#e9f4ff' }}; color:#00bcd4;">
                                >
                            </a>
                        </li>

                    </ul>
                </nav>
            @endif
        </div>
    </section>
@endsection

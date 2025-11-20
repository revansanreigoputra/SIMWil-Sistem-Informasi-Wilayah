@extends('layouts.master')

@section('title', '')

@push('addon-style')
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        #modern-dashboard-wrapper *,
        #modern-dashboard-wrapper *::before,
        #modern-dashboard-wrapper *::after {
            box-sizing: border-box;
        }

        #modern-dashboard-wrapper {
            margin-top: 0;
            padding-top: 1rem;
            max-width: 100%;
            overflow-x: hidden;
        }

        #modern-dashboard-wrapper .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -12px;
            margin-left: -12px;
        }

        #modern-dashboard-wrapper .col,
        #modern-dashboard-wrapper .col-1,
        #modern-dashboard-wrapper .col-2,
        #modern-dashboard-wrapper .col-3,
        #modern-dashboard-wrapper .col-4,
        #modern-dashboard-wrapper .col-5,
        #modern-dashboard-wrapper .col-6,
        #modern-dashboard-wrapper .col-7,
        #modern-dashboard-wrapper .col-8,
        #modern-dashboard-wrapper .col-9,
        #modern-dashboard-wrapper .col-10,
        #modern-dashboard-wrapper .col-11,
        #modern-dashboard-wrapper .col-12,
        #modern-dashboard-wrapper .col-auto,
        #modern-dashboard-wrapper .col-lg-8,
        #modern-dashboard-wrapper .col-md-6,
        #modern-dashboard-wrapper .col-xl-3,
        #modern-dashboard-wrapper .col-xl-4,
        #modern-dashboard-wrapper .col-xl-8 {
            position: relative;
            width: 100%;
            padding-right: 12px;
            padding-left: 12px;
        }

        #modern-dashboard-wrapper .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        #modern-dashboard-wrapper .col-xl-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }

        #modern-dashboard-wrapper .col-xl-4 {
            flex: 0 0 33.33333%;
            max-width: 33.33333%;
        }

        #modern-dashboard-wrapper .col-xl-8 {
            flex: 0 0 66.66667%;
            max-width: 66.66667%;
        }

        #modern-dashboard-wrapper .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        #modern-dashboard-wrapper h1,
        #modern-dashboard-wrapper h2,
        #modern-dashboard-wrapper h3,
        #modern-dashboard-wrapper h4,
        #modern-dashboard-wrapper h5,
        #modern-dashboard-wrapper h6 {
            margin: 0;
            padding: 0;
            font-weight: inherit;
            line-height: 1.2;
        }

        #modern-dashboard-wrapper p {
            margin-top: 0;
            margin-bottom: 0;
        }

        #modern-dashboard-wrapper a {
            color: inherit;
            text-decoration: none;
        }

        #modern-dashboard-wrapper .text-decoration-underline {
            text-decoration: underline !important;
        }

        #modern-dashboard-wrapper .card {
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.375rem;
            background-color: #fff;
        }

        #modern-dashboard-wrapper .card-body {
            padding: 1.5rem;
        }

        #modern-dashboard-wrapper .card-header {
            padding: 1rem 1.5rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, .03);
            border-bottom: 1px solid rgba(0, 0, 0, .125);
        }

        #modern-dashboard-wrapper .card-animate {
            transition: all .3s ease-in-out;
        }

        #modern-dashboard-wrapper .card-animate:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.08);
        }

        #modern-dashboard-wrapper .avatar-sm {
            height: 3rem;
            width: 3rem;
        }

        #modern-dashboard-wrapper .avatar-title {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            background-color: #f8f9fa;
            color: #495057;
        }

        #modern-dashboard-wrapper .avatar-title i {
            opacity: 0.85;
        }


        #modern-dashboard-wrapper .rounded {
            border-radius: 0.375rem !important;
        }

        #modern-dashboard-wrapper .fs-3 {
            font-size: 1.5rem !important;
        }

        #modern-dashboard-wrapper .bg-success-subtle {
            background-color: rgba(2, 182, 122, 0.15) !important;
        }

        #modern-dashboard-wrapper .text-success {
            color: #02b67a !important;
        }

        #modern-dashboard-wrapper .bg-info-subtle {
            background-color: rgba(41, 156, 219, 0.15) !important;
        }

        #modern-dashboard-wrapper .text-info {
            color: #299cdb !important;
        }

        #modern-dashboard-wrapper .bg-warning-subtle {
            background-color: rgba(247, 184, 75, 0.15) !important;
        }

        #modern-dashboard-wrapper .text-warning {
            color: #f7b84b !important;
        }

        #modern-dashboard-wrapper .bg-primary-subtle {
            background-color: rgba(64, 81, 137, 0.15) !important;
        }

        #modern-dashboard-wrapper .text-dark {
            color: #000000 !important;
        }

        #modern-dashboard-wrapper .text-primary {
            color: #3c40c6 !important;
        }

        #modern-dashboard-wrapper .bg-danger-subtle {
            background-color: rgba(240, 101, 72, 0.15) !important;
        }

        #modern-dashboard-wrapper .text-danger {
            color: #f06548 !important;
        }

        #modern-dashboard-wrapper .fs-16 {
            font-size: 16px !important;
        }

        #modern-dashboard-wrapper .fs-22 {
            font-size: 22px !important;
        }

        #modern-dashboard-wrapper .fw-semibold {
            font-weight: 600 !important;
        }

        #modern-dashboard-wrapper .fw-medium {
            font-weight: 500 !important;
        }

        #modern-dashboard-wrapper .text-muted {
            color: #878a99 !important;
        }

        #modern-dashboard-wrapper .text-uppercase {
            text-transform: uppercase !important;
        }

        #modern-dashboard-wrapper .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        #modern-dashboard-wrapper .ff-secondary {
            font-family: 'Poppins', sans-serif;
        }

        #modern-dashboard-wrapper .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        #modern-dashboard-wrapper .table th,
        #modern-dashboard-wrapper .table td {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        #modern-dashboard-wrapper .table-borderless> :not(caption)>> {
            border-bottom-width: 0;
            border-top-width: 0;
        }

        #modern-dashboard-wrapper .table-centered> :not(caption)>> {
            vertical-align: middle;
        }

        #modern-dashboard-wrapper .table-nowrap th,
        #modern-dashboard-wrapper .table-nowrap td {
            white-space: nowrap;
        }

        #modern-dashboard-wrapper .table-light {
            --bs-table-bg: #f8f9fa;
            --bs-table-border-color: #e9ebec;
            color: #212529;
        }

        #modern-dashboard-wrapper .align-middle {
            vertical-align: middle !important;
        }

        #modern-dashboard-wrapper .badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: .75em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }

        #modern-dashboard-wrapper .d-flex {
            display: flex !important;
        }

        #modern-dashboard-wrapper .align-items-center {
            align-items: center !important;
        }

        #modern-dashboard-wrapper .justify-content-between {
            justify-content: space-between !important;
        }

        #modern-dashboard-wrapper .flex-grow-1 {
            flex-grow: 1 !important;
        }

        #modern-dashboard-wrapper .flex-shrink-0 {
            flex-shrink: 0 !important;
        }

        #modern-dashboard-wrapper .mb-0 {
            margin-bottom: 0 !important;
        }

        #modern-dashboard-wrapper .mb-1 {
            margin-bottom: 0.25rem !important;
        }

        #modern-dashboard-wrapper .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        #modern-dashboard-wrapper .mt-3 {
            margin-top: 1rem !important;
        }

        #modern-dashboard-wrapper .mt-4 {
            margin-top: 1.5rem !important;
        }

        .text-success {
            color: #00b98e !important;
        }

        .text-warning {
            color: #f6b93b !important;
        }

        .text-primary {
            color: #3c40c6 !important;
        }

        @media (max-width: 767.98px) {

            #modern-dashboard-wrapper .col-xl-3,
            #modern-dashboard-wrapper .col-md-6,
            #modern-dashboard-wrapper .col-xl-8,
            #modern-dashboard-wrapper .col-xl-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
@endpush


@section('content')
    <div id="modern-dashboard-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="h-100">
                    <div class="row mb-4 pb-1">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-md-center flex-md-row flex-column">
                                {{-- <div class="flex-grow-1">
                                    <h1 class="fw-bold fs-2 text-dark mb-3 ms-3" style="letter-spacing: 0.5px;">
                                        {{ salamWaktu() . ', ' . Auth::user()->name }}!
                                    </h1>
                                   
                                </div>
                                <div class="mt-3 mt-lg-0">
                                    <div class="input-group" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Pilih rentang tanggal untuk filter statistik">
                                        <input type="text" id="dash-filter-picker"
                                            class="form-control border-0 dash-filter-picker shadow"
                                            data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y"
                                            placeholder="Pilih rentang tanggal"
                                            data-default-date="01 Jan 2025 to 31 Dec 2025">
                                        <div class="input-group-text bg-primary border-primary text-white">
                                            <i class="ri-calendar-2-line"></i>
                                        </div>
                                    </div>
                                </div> --}}
                                
                            </div>
                        </div>
                    </div>

                    {{-- Bagian Card Statistik --}}
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total
                                                Kecamatan</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                <span class="counter-value" data-target="{{ $totalKecamatan }}">0</span>
                                            </h4>
                                            <a href="{{ route('kecamatan.index') }}"
                                                class="text-decoration-underline text-muted" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Klik untuk melihat daftar kecamatan">Lihat
                                                Detail</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-success-subtle rounded fs-3">
                                                <i class="bx bxs-landmark text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total
                                                Desa/Kelurahan</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                <span class="counter-value" data-target="{{ $totalDesa }}">0</span>
                                            </h4>
                                            <a href="{{ route('desa.index') }}" class="text-decoration-underline text-muted"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Klik untuk melihat daftar desa/kelurahan">Lihat Detail</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                <i class="bx bx-buildings text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Keluarga
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                <span class="counter-value" data-target="{{ $totalKeluarga }}">0</span>
                                            </h4>
                                            <a href="{{ route('data_keluarga.index') }}"
                                                class="text-decoration-underline text-muted" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Klik untuk melihat data keluarga">Lihat
                                                Detail</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                <i class="bx bxs-user-account text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Penduduk
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                <span class="counter-value" data-target="{{ $totalPenduduk }}">0</span>
                                            </h4>
                                            <a href="{{ route('anggota_keluarga.index') }}"
                                                class="text-decoration-underline text-muted" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Klik untuk melihat data penduduk">Lihat
                                                Detail</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                <i class="bx bxs-group text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bagian Grafik --}}
                    <div class="row d-flex mb-5">
                        <div class="col-xl-8">
                            <div class="card h-100  ">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Grafik Umur Penduduk</h4>
                                </div>
                                <div class="card-body">
                                    @if (!empty($umurLabels))
                                        <div id="column-charts" class="apex-charts" dir="ltr"></div>
                                    @else
                                        {{-- Placeholder baru yang lebih bagus --}}
                                        <div class="d-flex align-items-center justify-content-center flex-column text-muted"
                                            style="height: 333px; opacity: 0.8;">
                                            <i class="ri-bar-chart-2-line"
                                                style="font-size: 3.5rem; margin-bottom: 0.5rem;"></i>
                                            <h5 class="text-muted mb-0">Belum ada data.</h5>
                                            {{-- <p>Grafik umur akan muncul di sini.</p> --}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card h-100 ">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Populasi Berdasarkan Gender</h4>
                                </div>
                                <div class="card-body">
                                    @if (!empty($genderSeries))
                                        <div id="pie-charts" class="apex-charts"></div>
                                    @else
                                        {{-- Placeholder baru yang lebih bagus --}}
                                        <div class="d-flex align-items-center justify-content-center flex-column text-muted"
                                            style="height: 333px; opacity: 0.8;">
                                            <i class="ri-pie-chart-line"
                                                style="font-size: 3.5rem; margin-bottom: 0.5rem;"></i>
                                            <h5 class="text-muted mb-0">Belum ada data.</h5>
                                            {{-- <p>Grafik gender akan muncul di sini.</p> --}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex">
                        <div class="col-xl-4">
                            <div class="card h-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Statistik Penganut Agama</h4>
                                </div>
                                <div class="card-body">
                                    @if (!empty($agamaSeries))
                                        <div id="store-visits-source" class="apex-charts" dir="ltr"></div>
                                    @else
                                        {{-- Placeholder baru yang lebih bagus --}}
                                        <div class="d-flex align-items-center justify-content-center flex-column text-muted"
                                            style="height: 333px; opacity: 0.8;">
                                            <i class="ri-donut-chart-line"
                                                style="font-size: 3.5rem; margin-bottom: 0.5rem;"></i>
                                            <h5 class="text-muted mb-0">Belum ada data.</h5>
                                            {{-- <p>Statistik agama akan muncul di sini.</p> --}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card h-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Status Pengajuan Terakhir</h4>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('permohonan.unverified') }}">
                                            <button type="button" class="btn btn-soft-info btn-sm"><i
                                                    class="bi bi-search me-2"></i> Detail</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table
                                            class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                            <thead class="text-muted table-light">
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Penduduk</th>
                                                    <th scope="col">Nama Surat</th>
                                                    <th scope="col">Status Pengajuan</th>
                                                    <th scope="col">Tgl Pengajuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($pengajuanTerakhir as $permohonan)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            {{-- Mengambil nama dari relasi 'anggotaKeluarga' --}}
                                                            {{-- 'nama_lengkap' adalah kolom di tabel 'anggota_keluargas' (sesuaikan jika beda) --}}
                                                            {{ $permohonan->anggotaKeluarga->nama ?? 'Data Penduduk Dihapus' }}
                                                        </td>
                                                        <td>
                                                            {{-- Mengambil nama dari relasi 'kopTemplate' --}}
                                                            {{-- 'nama_template' adalah asumsi kolom di 'kop_templates' (sesuaikan jika beda) --}}
                                                            {{ $permohonan->jenisSurat->nama ?? 'Surat Tidak Ditemukan' }}
                                                        </td>
                                                        <td>
                                                            @if ($permohonan->status == 'Closing')
                                                                <span
                                                                    class="badge bg-success-subtle text-success">{{ $permohonan->status }}</span>
                                                            @elseif($permohonan->status == 'Dalam Proses')
                                                                <span
                                                                    class="badge bg-warning-subtle text-warning">{{ $permohonan->status }}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-danger-subtle text-danger">{{ $permohonan->status ?? 'Status T/A' }}</span>
                                                            @endif
                                                        </td>
                                                        <td>

                                                            {{ $permohonan->created_at->format('d/m/Y') }}
                                                        </td>
                                                    </tr>
                                                @empty

                                                    <tr>
                                                        <td colspan="5" class="text-center">Belum ada data pengajuan.
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    {{-- Library JS yang dibutuhkan --}}
    <script src="{{ asset('backend/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/libs/flatpickr/flatpickr.min.js') }}"></script>

    {{-- Script Inisialisasi --}}
    <script>
        $(document).ready(function() {

            $('.counter-value').each(function() {
                var $this = $(this);
                var target = parseInt($this.data('target'));

                $({
                    Counter: 0
                }).animate({
                    Counter: target
                }, {
                    duration: 2000, // Durasi animasi 2 detik
                    easing: 'swing',
                    step: function() {
                        // Format angka dengan pemisah ribuan (titik)
                        $this.text(Math.ceil(this.Counter).toLocaleString('id-ID'));
                    },
                    complete: function() {
                        // Pastikan angka akhir sesuai target dengan format yg benar
                        $this.text(target.toLocaleString('id-ID'));
                    }
                });
            });

            // --- Chart Statistik Agama (Donut) ---
            const $chartEl = $('#store-visits-source');
            if ($chartEl.length) {
                const options = {
                    chart: {
                        height: 333,
                        type: 'donut'
                    },
                    series: {!! json_encode($agamaSeries) !!},
                    labels: {!! json_encode($agamaLabels) !!},
                    colors: ["#13c56b", "#6691e7", "#e8bc52", "#ed5e5e", "#50c3e6", "#865ce2"],
                    legend: {
                        position: "bottom"
                    },
                    stroke: {
                        show: false
                    },
                    dataLabels: {
                        dropShadow: {
                            enabled: false
                        }
                    },
                };
                const chart = new ApexCharts($chartEl[0], options);
                chart.render();
            }

            // --- Chart Populasi Gender (Donut) ---
            const $pieCharts = $('#pie-charts');
            if ($pieCharts.length) {
                const pieoptions = {
                    chart: {
                        height: 333,
                        type: 'donut'
                    },
                    series: {!! json_encode($genderSeries) !!},
                    labels: {!! json_encode($genderLabels) !!},
                    legend: {
                        position: "bottom"
                    },
                    stroke: {
                        show: false
                    },
                    dataLabels: {
                        dropShadow: {
                            enabled: false
                        }
                    }
                };
                const piechart = new ApexCharts($pieCharts[0], pieoptions);
                piechart.render();
            }

            // --- Chart Umur Penduduk (Column) ---
            const $columnCharts = document.querySelector("#column-charts");
            if ($columnCharts) {
                var columnOptions = {
                    series: [{
                        name: 'Perempuan',
                        data: {!! json_encode($umurSeriesPerempuan) !!}
                    }, {
                        name: 'Laki-laki',
                        data: {!! json_encode($umurSeriesLaki) !!}
                    }],
                    chart: {
                        type: 'bar',
                        height: 333,
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '20px',
                            borderRadius: 5,
                            borderRadiusApplication: 'end'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: {!! json_encode($umurLabels) !!},
                        title: {
                            text: 'Kelompok Umur (Thn)'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Jumlah Penduduk'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        x: {
                            formatter: function(val) {
                                return val + " Thn";
                            }
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'center'
                    },
                };
                var columnChart = new ApexCharts($columnCharts, columnOptions);
                columnChart.render();
            }
        });

        // Script ini tidak memakai jQuery, jadi aman dijalankan di luar
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Flatpickr
            document.querySelectorAll('[data-provider="flatpickr"]').forEach(function(el) {
                if (typeof flatpickr !== 'undefined') {
                    flatpickr(el, {
                        mode: el.dataset.rangeDate ? "range" : "single",
                        dateFormat: el.dataset.dateFormat || "d M, Y",
                        defaultDate: el.dataset.defaultDate ? el.dataset.defaultDate.split(
                            " to ") : null,
                    });
                }
            });

            // Inisialisasi semua tooltip Bootstrap
            if (typeof bootstrap !== 'undefined' && typeof bootstrap.Tooltip !== 'undefined') {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            }
        });
    </script>
@endpush

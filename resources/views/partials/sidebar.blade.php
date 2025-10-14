<aside class="navbar navbar-vertical navbar-expand-lg">
    <div class="container-fluid">
        <!-- BEGIN NAVBAR TOGGLER -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- END NAVBAR TOGGLER -->
        <!-- BEGIN NAVBAR LOGO -->
        <div class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('dashboard') }}" aria-label="{{ $websiteSetting?->website_name ?? 'Laravel POS' }}">
                @if ($websiteSetting?->logo)
                <img src="{{ asset('storage/' . $websiteSetting->logo) }}" alt="{{ $websiteSetting->website_name }}"
                    class="navbar-brand-image" style="height: 32px; width: auto; max-width: 150px;">
                @else
                {{ $websiteSetting?->website_name ?? 'Laravel POS' }}
                @endif
            </a>
        </div>
        <!-- MOBILE USER & NOTIFICATION -->
        <div class="d-lg-none d-flex align-items-center gap-3">

            <!-- MOBILE NOTIFICATION -->
            <div class="dropdown">
                <a href="#" class="nav-link position-relative p-0" data-bs-toggle="dropdown"
                    aria-label="Show notifications" data-bs-auto-close="outside">
                    <!-- ikon notifikasi -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-1">
                        <path
                            d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                        </path>
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                    </svg>
                </a>

                <!-- Dropdown isi notifikasi -->
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow dropdown-menu-card">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h3 class="card-title">Notifikasi Stok</h3>
                            <button type="button" class="btn-close ms-auto" aria-label="Close"
                                onclick="closeDropdown(this)"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DROPDOWN PROFIL MOBILE -->
            <div class="dropdown">
                <a href="#" class="nav-link p-0 d-flex align-items-center" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm me-2" style="background-image: url(./static/avatars/000m.jpg)"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <!-- Nama User -->
                    <span class="dropdown-item-text fw-bold text-center">
                        {{ auth()->user() ? auth()->user()->name : '' }}
                    </span>
                    <div class="dropdown-divider"></div>

                    <!-- Settings -->
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog me-2"></i> Settings
                    </a>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>

        </div>
        <!-- END MOBILE USER & NOTIFICATION -->


        <div class="navbar-collapse collapse" id="sidebar-menu" style="">
            <!-- BEGIN NAVBAR MENU -->
            <ul class="navbar-nav pt-lg-3">
                {{-- Dashboard --}}
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-1">
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title"> Dashboard </span>
                    </a>
                </li>

                {{-- Master Wilayah (Kecamatan & Desa) --}}
                @canany(['kecamatan.view', 'desa.view'])
                <li
                    class="nav-item dropdown {{ request()->is('kecamatan*') || request()->is('desa*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-wilayah" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Icon Wilayah -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                <path
                                    d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                            </svg>
                        </span>
                        <span class="nav-link-title"> Master Wilayah </span>
                    </a>
                    <div
                        class="dropdown-menu {{ request()->is('kecamatan*') || request()->is('desa*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                @can('kecamatan.view')
                                <a class="dropdown-item {{ request()->is('kecamatan*') ? 'active' : '' }}"
                                    href="{{ route('kecamatan.index') }}">
                                    Kecamatan
                                </a>
                                @endcan

                                @can('desa.view')
                                <a class="dropdown-item {{ request()->is('desa*') ? 'active' : '' }}"
                                    href="{{ route('desa.index') }}">
                                    Desa
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </li>
                @endcanany

                {{-- Master Pegawai (Dropdown Menu) --}}
                @canany(['jabatan.view', 'perangkat_desa.view', 'ttd.view'])
                <li
                    class="nav-item dropdown {{ request()->is('jabatan*') || request()->is('perangkat_desa*') || request()->is('ttd*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-pegawai" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Icon Pegawai -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                            </svg>
                        </span>
                        <span class="nav-link-title"> Master Pegawai </span>
                    </a>
                    <div
                        class="dropdown-menu {{ request()->is('jabatan*') || request()->is('perangkat_desa*') || request()->is('ttd*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <!-- Quick Create Jabatan Button -->
                                @can('jabatan.create')
                                <div class="dropdown-item">
                                    <a href="{{ route('jabatan.create') }}"
                                        class="d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-plus me-1" width="20"
                                            height="20" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg>
                                        Buat Jabatan Baru
                                    </a>
                                </div>
                                @endcan

                                @can('jabatan.view')
                                <a class="dropdown-item {{ request()->is('jabatan*') && !request()->is('jabatan/create*') ? 'active' : '' }}"
                                    href="{{ route('jabatan.index') }}">
                                    Daftar Jabatan
                                </a>
                                @endcan

                                @can('perangkat_desa.view')
                                <a class="dropdown-item {{ request()->is('perangkat_desa*') ? 'active' : '' }}"
                                    href="{{ route('perangkat_desa.index') }}">
                                    Perangkat Desa
                                </a>
                                @endcan


                            </div>
                        </div>
                    </div>
                </li>
                @endcanany
                {{-- Layanan Surat --}}
                <li class="nav-item dropdown {{ request()->is('layanan-surat*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-layanan" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 7l9 6l9 -6" />
                                <path
                                    d="M21 7v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2z" />
                            </svg>
                        </span>
                        <span class="nav-link-title"> Layanan Surat </span>
                    </a>

                    <div class="dropdown-menu {{ request()->is('layanan-surat*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                {{-- Template Surat (submenu di dalam Layanan Surat) --}}
                                <div class="dropend">
                                    <a class="dropdown-item dropdown-toggle {{ request()->is('layanan-surat/template*') || request()->is('ttd*') || request()->is('layanan-surat/profil-desa*') ? 'active' : '' }}"
                                        href="#" data-bs-toggle="dropdown" data-bs-auto-close="false">
                                        Template Dokumen
                                    </a>
                                    <div class="dropdown-menu {{ request()->is('layanan-surat/template*') || request()->is('ttd*') || request()->is('layanan-surat/profil-desa*') ? 'show' : '' }}">
                                        {{-- Menu-menu anak (inner menus) --}}

                                        <a class="dropdown-item {{ request()->is('layanan-surat/template/kop-templates*') ? 'active' : '' }}"
                                            href="{{ route('kop_templates.index') }}">
                                            Kop Template
                                        </a>

                                        <a class="dropdown-item {{ request()->is('layanan-surat/template/jenis-surats*') ? 'active' : '' }}"
                                            href="{{ route('jenis_surats.index') }}">
                                            Jenis Surat
                                        </a>

                                        @can('ttd.view')
                                        <a class="dropdown-item {{ request()->is('/ttd*') ? 'active' : '' }}"
                                            href="{{ route('ttd.index') }}">
                                            Penanda Tangan Surat
                                        </a>
                                        @endcan


                                    </div>
                                </div>

                                {{-- Permohonan Surat --}}
                                <a class="dropdown-item {{ request()->is('layanan-surat/permohonan*') ? 'active' : '' }}"
                                    href="{{ route('layanan.permohonan.index') }}">
                                    Permohonan Surat +
                                </a>


                                {{-- Data Laporan --}}
                                {{-- <div class="dropend">
                                    <a class="dropdown-item {{ request()->is('layanan-surat/laporan/surat*') ? 'active' : '' }}"
                                        href="{{ route('layanan-surat.laporan-surat.index') }}">
                                        Data Laporan Surat
                                    </a>
                                    <div
                                        class="dropdown-menu {{ request()->is('layanan-surat/laporan*') ? 'show' : '' }}">
                                        <a class="dropdown-item {{ request()->is('layanan-surat/laporan/surat*') ? 'active' : '' }}"
                                            href="{{ route('layanan.laporan-surat.index') }}">
                                            Data Laporan Surat
                                        </a>

                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </li>

                {{-- Awal Menu Dasar Data Keluarga --}}
                @can('data_keluarga.view')
                <li
                    class="nav-item dropdown {{ request()->is('data_keluarga*') || request()->is('anggota_keluarga*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-data-keluarga" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            {{-- Icon Database --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-database">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 6m-8 0a8 3 0 1 0 16 0a8 3 0 1 0 -16 0" />
                                <path d="M4 6v6a8 3 0 0 0 16 0v-6" />
                                <path d="M4 12v6a8 3 0 0 0 16 0v-6" />
                            </svg>
                        </span>
                        <span class="nav-link-title"> Dasar Data Keluarga </span>
                    </a>

                    {{-- sub menus --}}
                    <div
                        class="dropdown-menu {{ request()->is('data_keluarga*') || request()->is('anggota_keluarga*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item {{ request()->is('data_keluarga*') ? 'active' : '' }}"
                                    href="{{ route('data_keluarga.index') }}">
                                    Data Kepala Keluarga
                                </a>
                                <a class="dropdown-item {{ request()->is('anggota_keluarga*') ? 'active' : '' }}"
                                    href="{{ route('anggota_keluarga.index') }}">
                                    Data Anggota Keluarga
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                @endcan
                {{-- Mutasi --}}
                <li class="nav-item dropdown {{ request()->is('mutasi*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-mutasi" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-arrows-exchange" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 4l-2 2l2 2" />
                                <path d="M14 20l2 -2l-2 -2" />
                                <path d="M4 6h12a2 2 0 0 1 2 2v2" />
                                <path d="M20 18h-12a2 2 0 0 1 -2 -2v-2" />
                            </svg>
                        </span>

                        <span class="nav-link-title"> Mutasi </span>
                    </a>
                    <div class="dropdown-menu {{ request()->is('mutasi*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item {{ request()->is('mutasi*') ? 'active' : '' }}"
                                    href="{{ route('mutasi.index') }}">
                                    Mutasi Data Penduduk
                                </a>
                                {{-- <a class="dropdown-item {{ request()->is('mutasi/histori*') ? 'active' : '' }}"
                                    href="{{ route('mutasi.index') }}">
                                    Histori Mutasi Penduduk
                                </a> --}}
                            </div>
                        </div>
                     
                </li>

                {{-- Potensi --}}
                <li class="nav-item dropdown {{ request()->is('potensi*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-potensi" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button"
                        aria-expanded="{{ request()->is('potensi*') ? 'true' : 'false' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bar"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 12h18" />
                                <path d="M12 3v18" />
                                <path d="M7 9v12" />
                                <path d="M17 9v12" />
                            </svg>
                        </span>
                        <span class="nav-link-title"> Potensi </span>
                    </a>
                    <div class="dropdown-menu {{ request()->is('potensi*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">

                                {{-- Potensi Sumber Daya Manusia --}}
                                <div class="dropend">
                                    <a class="dropdown-item dropdown-toggle {{ request()->is('potensi/potensi-sdm*') ? 'active' : '' }}"
                                        href="#sidebar-potensi-sdm" data-bs-toggle="dropdown"
                                        data-bs-auto-close="false" role="button"
                                        aria-expanded="{{ request()->is('potensi/potensi-sdm*') ? 'true' : 'false' }}">
                                        Potensi Sumber <br> Daya Manusia
                                    </a>
                                    <div
                                        class="dropdown-menu {{ request()->is('potensi/potensi-sdm*') ? 'show' : '' }}">
                                        <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/jumlah*') ? 'active' : '' }}"
                                            href="{{ route('potensi.potensi-sdm.jumlah.index') }}">
                                            Jumlah
                                        </a>
                                    </div>
                                </div>

                                {{-- Potensi Kelembagaan --}}
                                <div class="dropend">
                                    <a class="dropdown-item dropdown-toggle {{ request()->is('potensi/potensi-kelembagaan*') ? 'active' : '' }}"
                                        href="#sidebar-potensi-kelembagaan" data-bs-toggle="dropdown"
                                        data-bs-auto-close="false" role="button"
                                        aria-expanded="{{ request()->is('potensi/potensi-kelembagaan*') ? 'true' : 'false' }}">
                                        Potensi Kelembagaan
                                    </a>
                                    <div
                                        class="dropdown-menu {{ request()->is('potensi/potensi-kelembagaan*') ? 'show' : '' }}">
                                        <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/pemerintah*') ? 'active' : '' }}"
                                            href="{{ route('potensi.kelembagaan.pemerintah.index') }}">
                                            Lembaga Pemerintah
                                        </a>
                                        <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/kemasyarakatan*') ? 'active' : '' }}"
                                            href="{{ route('potensi.kelembagaan.kemasyarakatan.index') }}">
                                            Lembaga Kemasyarakatan
                                        </a>
                                        <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/politik*') ? 'active' : '' }}"
                                            href="{{ route('potensi.kelembagaan.politik.index') }}">
                                            Partisipasi Politik
                                        </a>
                                        <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/ekonomi*') ? 'active' : '' }}"
                                            href="{{ route('potensi.kelembagaan.ekonomi.index') }}">
                                            Lembaga Ekonomi
                                        </a>
                                        <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/pengangkutan*') ? 'active' : '' }}"
                                            href="{{ route('potensi.kelembagaan.pengangkutan.index') }}">
                                            Jasa Pengangkutan
                                        </a>
                                        <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/hiburan*') ? 'active' : '' }}"
                                            href="{{ route('potensi.kelembagaan.hiburan.index') }}">
                                            Jasa, Hiburan, DLL
                                        </a>
                                        <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/pendidikan*') ? 'active' : '' }}"
                                            href="{{ route('potensi.kelembagaan.pendidikan.index') }}">
                                            Lembaga Pendidikan
                                        </a>
                                        <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/adat*') ? 'active' : '' }}"
                                            href="{{ route('potensi.kelembagaan.adat.index') }}">
                                            Lembaga Adat
                                        </a>
                                        <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/keamanan*') ? 'active' : '' }}"
                                            href="{{ route('potensi.kelembagaan.keamanan.index') }}">
                                            Lembaga Keamanan
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>

                {{-- Master Data (Dropdown Menu) --}}
                <li
                    class="nav-item dropdown {{ request()->is('master-ddk*') || request()->is('master-perkembangan*') || request()->is('master-potensi*') || request()->is('user*') || request()->is('role*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
                                <path d="M12 12l8 -4.5"></path>
                                <path d="M12 12l0 9"></path>
                                <path d="M12 12l-8 -4.5"></path>
                                <path d="M16 5.25l-8 4.5"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title"> Master Data </span>
                    </a>
                    <div
                        class="dropdown-menu {{ request()->is('master-ddk*') || request()->is('master-perkembangan*') || request()->is('master-potensi*') || request()->is('user*') || request()->is('role*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a href="{{ route('master.ddk.index') }}"
                                    class="dropdown-item {{ request()->is('master-ddk*') ? 'active' : '' }}">
                                    Master DDK
                                </a>
                                <a href="{{ route('master.perkembangan.index') }}"
                                    class="dropdown-item {{ request()->is('master-perkembangan*') ? 'active' : '' }}">
                                    Master Perkembangan
                                </a>
                                <a href="{{ route('master.potensi.index') }}"
                                    class="dropdown-item {{ request()->is('master-potensi*') ? 'active' : '' }}">
                                    Master Potensi
                                </a>

                                @can('user.view')
                                <a class="dropdown-item {{ request()->is('user*') ? 'active' : '' }}"
                                    href="{{ route('user.index') }}">
                                    User
                                </a>
                                @endcan
                                @can('role.view')
                                <a class="dropdown-item {{ request()->is('role*') ? 'active' : '' }}"
                                    href="{{ route('role.index') }}">
                                    Hak Akses
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </li>
                {{-- Menu Utama --}}
                <li class="nav-item dropdown {{ request()->is('utama/*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-utama" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            {{-- Icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 6h11"></path>
                                <path d="M9 12h11"></path>
                                <path d="M9 18h11"></path>
                                <path d="M5 6v.01"></path>
                                <path d="M5 12v.01"></path>
                                <path d="M5 18v.01"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title"> Utama </span>
                    </a>
                    <div class="dropdown-menu {{ request()->is('utama/*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item {{ request()->routeIs('utama.agenda.*') ? 'active' : '' }}"
                                    href="{{ route('utama.agenda.index') }}">
                                    Agenda Kegiatan
                                </a>
                                <a class="dropdown-item {{ request()->routeIs('utama.glosarium.*') ? 'active' : '' }}"
                                    href="{{ route('utama.glosarium.index') }}">
                                    Glosarium
                                </a>
                                <a class="dropdown-item {{ request()->routeIs('utama.berita.*') ? 'active' : '' }}"
                                    href="{{ route('utama.berita.index') }}">
                                    Berita Penting
                                </a>
                                <a class="dropdown-item {{ request()->routeIs('utama.galeri.*') ? 'active' : '' }}"
                                    href="{{ route('utama.galeri.index') }}">
                                    Galeri Foto
                                </a>
                                <a class="dropdown-item {{ request()->routeIs('utama.tap.*') ? 'active' : '' }}"
                                    href="{{ route('utama.tap.index') }}">
                                    TA Pendamping
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item {{ request()->is('pengaturan*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('settings.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                <path
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title"> Pengaturan </span>
                    </a>
                </li>


            </ul>
            <!-- END NAVBAR MENU -->
        </div>
    </div>
</aside>

<script>
    function closeDropdown(btn) {
        // Cari parent .dropdown-menu
        let dropdownMenu = btn.closest('.dropdown-menu');
        if (dropdownMenu) {
            // Bootstrap 5: tutup dropdown dengan instance
            let dropdown = bootstrap.Dropdown.getOrCreateInstance(dropdownMenu.previousElementSibling);
            dropdown.hide();
        }
    }
</script>

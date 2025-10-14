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

                                    @can('ttd.view')
                                        <a class="dropdown-item {{ request()->is('ttd*') ? 'active' : '' }}"
                                            href="{{ route('ttd.index') }}">
                                            Penanda Tangan Surat
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
                                    <a class="dropdown-item dropdown-toggle {{ request()->is('layanan-surat/template*') ? 'active' : '' }}"
                                        href="#" data-bs-toggle="dropdown" data-bs-auto-close="false">
                                        Template Surat
                                    </a>
                                    <div class="dropdown-menu {{ request()->is('layanan-surat/template*') ? 'show' : '' }}">
                                        <a class="dropdown-item {{ request()->is('layanan-surat/template/kop-templates*') ? 'active' : '' }}"
                                            href="{{ route('kop_templates.index') }}">
                                            Kop Template
                                        </a>
                                        <a class="dropdown-item {{ request()->is('layanan-surat/template/jenis-surats*') ? 'active' : '' }}"
                                            href="{{ route('jenis_surats.index') }}">
                                           Jenis Surat
                                        </a>
                                    </div>
                                </div>

                                {{-- Permohonan Surat --}}
                                <a class="dropdown-item {{ request()->is('layanan-surat/permohonan*') ? 'active' : '' }}"
                                    href="{{ route('layanan.permohonan.index') }}">
                                    Permohonan Surat +
                                </a>

                                {{-- Profil Desa (di luar Template) --}}
                                <a class="dropdown-item {{ request()->is('layanan-surat/profil-desa*') ? 'active' : '' }}"
                                    href="{{ route('layanan.profil_desa.index') }}">
                                    Profil Desa
                                </a>

                                {{-- Data Laporan --}}
                                <div class="dropend">
                                    <a class="dropdown-item dropdown-toggle {{ request()->is('layanan-surat/laporan*') ? 'active' : '' }}"
                                        href="#" data-bs-toggle="dropdown" data-bs-auto-close="false">
                                        Data Laporan
                                    </a>
                                    <div
                                        class="dropdown-menu {{ request()->is('layanan-surat/laporan*') ? 'show' : '' }}">
                                        <a class="dropdown-item {{ request()->is('layanan-surat/laporan/surat*') ? 'active' : '' }}"
                                            href="{{ route('layanan.laporan.surat.index') }}">
                                            Data Laporan Surat
                                        </a>
                                        {{-- <a class="dropdown-item {{ request()->is('layanan-surat/laporan/arsip*') ? 'active' : '' }}"
                                            href="{{ route('layanan.laporan.arsip.index') }}">
                                            Data Arsip Surat
                                        </a> --}}
                                    </div>
                                </div>
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
                                <a class="dropdown-item {{ request()->is('mutasi/data*') ? 'active' : '' }}"
                                    href="{{ route('mutasi.data.index') }}">
                                    Data Mutasi
                                </a>
                                {{-- <a class="dropdown-item {{ request()->is('mutasi/masuk*') ? 'active' : '' }}"
                                href="{{ route('mutasi.masuk.index') }}">
                                Masuk Desa
                                </a> --}}
                                <a class="dropdown-item {{ request()->is('mutasi/laporan*') ? 'active' : '' }}"
                                    href="{{ route('mutasi.laporan.index') }}">
                                    Laporan Mutasi
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                {{-- potensi --}}
                @canany('jumlah.view')
                    <li class="nav-item dropdown {{ request()->is('potensi*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-potensi" data-bs-toggle="dropdown"
                            data-bs-auto-close="false" role="button" aria-expanded="false">
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
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('potensi/potensi-sdm*') ? 'active' : '' }}"
                                            href="#sidebar-potensi-sdm" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Potensi Sumber <br> Daya Manusia
                                        </a>
                                        <div
                                            class="dropdown-menu {{ request()->is('potensi/potensi-sdm*') ? 'show' : '' }}">
                                            @can('jumlah.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/jumlah*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-sdm.jumlah.index') }}">
                                                    Jumlah
                                                </a>
                                            @endcan
                                            @can('usia.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/usia*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-sdm.usia.index') }}">
                                                    Usia
                                                </a>
                                            @endcan
                                            @can('p_pendidikan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/pendidikan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-sdm.pendidikan.index') }}">
                                                    Pendidikan
                                                </a>
                                            @endcan
                                            @can('mata_pencaharian_pokok.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/mata-pencaharian-pokok*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-sdm.mata-pencaharian-pokok.index') }}">
                                                    Mata Pencaharian <br> Pokok
                                                </a>
                                            @endcan
                                            @can('p_agama.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/agama*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-sdm.agama.index') }}">
                                                    Agama
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('potensi/potensi-prasarana-dan-sarana*') ? 'active' : '' }}"
                                            href="#sidebar-potensi-prasarana" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Potensi Prasarana<br>dan Sarana
                                        </a>

                                        <div
                                            class="dropdown-menu {{ request()->is('potensi/potensi-prasarana-dan-sarana*') ? 'show' : '' }}">
                                            @can('transportasi_darat.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/transportasi-darat*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.index') }}">
                                                    Transportasi Darat
                                                </a>
                                            @endcan

                                            @can('irigasi.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/irigasi*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.irigasi.index') }}">
                                                    Prasarana dan Irigasi
                                                </a>
                                            @endcan

                                            @can('sanitasi.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/sanitasi*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.index') }}">
                                                    Prasarana Sanitasi
                                                </a>
                                            @endcan

                                            @can('air_bersih.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/air-bersih*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.index') }}">
                                                    Prasarana Air Bersih
                                                </a>
                                            @endcan

                                            <br>

                                            @can('dkelurahan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/dkelurahan.view*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-dkelurahan.index') }}">
                                                    Desa atau Kelurahan
                                                </a>
                                            @endcan

                                            @can('bpd.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/prasarana-bpd*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-bpd.index') }}">
                                                    Badan Perwakilan Desa
                                                </a>
                                            @endcan

                                            @can('dusun.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/prasarana-dusun*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-dusun.index') }}">
                                                    Dusun atau Blok
                                                </a>
                                            @endcan

                                            <br>

                                            @can('kemasyarakatan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/kemasyarakatan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.kemasyarakatan.index') }}">
                                                    Lemb. Kemasyarakatan
                                                </a>
                                            @endcan
                                            
                                            @can('kemasyarakatan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/energiPenerangan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.index') }}">
                                                    Energi & Penerangan
                                                </a>
                                            @endcan

                                        </div>
                                    </div>
                                </div>
                                {{-- <a class="dropdown-item {{ request()->is('potensi/laporan*') ? 'active' : '' }}"
                                href="{{ route('potensi.laporan.index') }}">
                                Laporan Mutasi
                                </a> --}}
                            </div>
                        </div>
                    </li>
                @endcanany

                {{-- perkembangan --}}
                @canany(['apb.view', 'pertanggungjawaban.view', 'pembinaanpusat.view', 'pembinaanprovinsi.view','organisasi.view'])
                    <li class="nav-item dropdown {{ request()->is('perkembangan*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-perkembangan" data-bs-toggle="dropdown"
                            data-bs-auto-close="false" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-code">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M6 4v4" />
                                    <path d="M6 12v8" />
                                    <path d="M13.557 14.745a2 2 0 1 0 -1.557 3.255" />
                                    <path d="M12 4v10" />
                                    <path d="M12 18v2" />
                                    <path d="M16 7a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M18 4v1" />
                                    <path d="M18 9v4" />
                                    <path d="M20 21l2 -2l-2 -2" />
                                    <path d="M17 17l-2 2l2 2" />
                                </svg>
                            </span>

                            <span class="nav-link-title"> Perkembangan </span>
                        </a>
                        <div class="dropdown-menu {{ request()->is('perkembangan*') ? 'show' : '' }}">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">

                                    {{-- Pemerintah Desa dan Kelurahan --}}
                                    <div class="dropend">
                                        @can('apb.view')
                                            <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/pemerintahdesadankelurahan*') ? 'active' : '' }}"
                                                href="#sidebar-pemerintahandesadankelurahan" data-bs-toggle="dropdown"
                                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                                Pemerintah Desa <br> dan Kelurahan
                                            </a>
                                        @endcan
                                        <div
                                            class="dropdown-menu {{ request()->is('perkembangan/pemerintahdesadankelurahan*') ? 'show' : '' }}">
                                            <a class="dropdown-item {{ request()->is('perkembangan/pemerintahdesadankelurahan/apbdesa*') ? 'active' : '' }}"
                                                href="{{ route('perkembangan.pemerintahdesadankelurahan.apbdesa.index') }}">
                                                APB Desa dan <br> Anggaran Kelurahan
                                            </a>
                                            @can('pertanggungjawaban.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/pemerintahdesadankelurahan/pertanggungjawaban*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index') }}">
                                                    Pertanggungjawaban<br> Kepala Desa/Lurah
                                                </a>
                                            @endcan
                                            @can('pembinaanpusat.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/pemerintahdesadankelurahan/pembinaanpusat*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.index') }}">
                                                    Pembinaan<br> Pemerintah Pusat
                                                </a>
                                            @endcan
                                            @can('pembinaanprovinsi.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/pemerintahdesadankelurahan/pembinaanprovinsi*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.index') }}">
                                                    Pembinaan<br> Pemerintah Provinsi
                                                </a>
                                            @endcan
                                            @can('pembinaankabupaten.view')
                                            <a class="dropdown-item {{ request()->is('perkmebangan/pemerintahdesadankelurahan/pembinaankabupaten*') ? 'active' : '' }}"
                                                href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.index') }}">
                                                Pembinaan Pemerintah<br> Kabupaten/Kota
                                            </a>
                                            @endcan
                                            @can('pembinaankecamatan.view')
                                            <a class="dropdown-item {{ request()->is('perkembangan/pemerintahdesadankelurahan/pembinaankecamatan*') ? 'active' : '' }}"
                                                href        ="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.index') }}">
                                                Pembinaan dan<br> Pengawasan Camat
                                            </a>
                                            @endcan
                                        </div>
                                    </div>

                                    {{-- Lembaga Kemasyarakatan --}}
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/lembagakemasyarakatan*') ? 'active' : '' }}"
                                            href="#sidebar-lembagakemasyarakatan" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Lembaga <br> Kemasyarakatan
                                        </a>
                                        <div class="dropdown-menu {{ request()->is('perkembangan/lembagakemasyarakatan*') ? 'show' : '' }}">
                                            @can('organisasi.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/lembagakemasyarakatan/organisasi*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.lembagakemasyarakatan.organisasi.index') }}">
                                                    Organisasi Lembaga <br> Masyarakat
                                                </a>
                                            @endcan
                                        </div>
                                    </div>

                                    {{-- Peran Serta Masyarakat dalam Pembangunan --}}
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/peransertamasyarakat*') ? 'active' : '' }}"
                                            href="#sidebar-peransertamasyarakat" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Peran Masyarakat <br> dalam Pembangunan
                                        </a>
                                        <div class="dropdown-menu {{ request()->is('perkembangan/peransertamasyarakat*') ? 'show' : '' }}">
                                            @can('musrenbangdesa.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/peransertamasyarakat/musrenbangdesa*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.peransertamasyarakat.musrenbangdesa.index') }}">
                                                    Musrenbang <br> Desa/Kelurahan
                                                </a>
                                            @endcan
                                            @can('hasilpembangunan.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/peransertamasyarakat/hasilpembangunan*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.peransertamasyarakat.hasilpembangunan.index') }}">
                                                    Pelaksaan <br> Hasil Pembangunan
                                                </a>
                                            @endcan
                                            @can('gotongroyong.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/peransertamasyarakat/gotongroyong*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.peransertamasyarakat.gotongroyong.index') }}">
                                                    Gotongroyong <br> Penduduk
                                                </a>
                                            @endcan
                                            @can('adatistiadat.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/peransertamasyarakat/adatistiadat*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.peransertamasyarakat.adatistiadat.index') }}">
                                                    Adat Istiadat
                                                </a>
                                            @endcan

                                        </div>
                                    </div>

                                    {{-- Ekonomi Masyarakat --}}
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/ekonomi*') ? 'active' : '' }}"
                                            href="#sidebar-ekonomi" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                            role="button" aria-expanded="false">
                                            Ekonomi Masyarakat
                                        </a>
                                        <div class="dropdown-menu {{ request()->is('perkembangan/ekonomi*') ? 'show' : '' }}">
                                            @can('pengangguran.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/ekonomi/pengangguran*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.ekonomimasyarakat.pengangguran.index') }}">
                                                    Pengangguran
                                                </a>
                                            @endcan
                                            @can('kesejahteraan.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/ekonomimasyarakat/kesejahteraan_keluarga*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index') }}">
                                                    Kesejahteraan Keluarga
                                                </a>
                                            @endcan
                                        </div>
                                    </div>

                                    {{-- Pendapatan Perkapital --}}
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/pendapatanperkapital*') ? 'active' : '' }}"
                                            href="#sidebar-pendapatanperkapital" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                            role="button" aria-expanded="false">
                                            Pendapatan Perkapital
                                        </a>
                                        <div class="dropdown-menu {{ request()->is('perkembangan/pendapatanperkapital*') ? 'show' : '' }}">
                                            
                                            {{-- Menurut Sektor Usaha --}}
                                            @can('menurut_sektor_usaha.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/pendapatanperkapital/menurut_sektor_usaha*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index') }}">
                                                    Menurut Sektor Usaha
                                                </a>
                                            @endcan

                                            {{-- Pendapatan Riil Keluarga --}}
                                            @can('pendapatan_rill_keluarga.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/pendapatanperkapital/pendapatan_rill_keluarga*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index') }}">
                                                    Pendapatan Riil Keluarga
                                                </a>
                                            @endcan
                                        </div>
                                    </div>

                                    {{-- Perkembangan Penduduk --}}
                                    @can('perkembangan-penduduk.view')
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/penduduk*') ? 'active' : '' }}"
                                                href="#sidebar-perkembanganpenduduk" data-bs-toggle="dropdown"
                                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                                Perkembangan <br> Penduduk
                                            </a>
                                            <div class="dropdown-menu {{ request()->is('perkembangan/penduduk*') ? 'show' : '' }}">
                                                <a class="dropdown-item {{ request()->is('perkembangan/penduduk*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan-penduduk.index') }}">
                                                    Penduduk dan <br> Kepala Keluarga
                                                </a>
                                            </div>
                                        </div>
                                    @endcan

                                    {{-- Produk Domestik Desa/Kelurahan --}}
                                    @canany(['sektor-pertambangan.view', 'subsektor-kerajinan.view'])
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/produk-domestik*') ? 'active' : '' }}"
                                                href="#sidebar-produkdomestik" data-bs-toggle="dropdown"
                                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                                Produk Domestik <br> Desa/Kelurahan
                                            </a>

                                            <div class="dropdown-menu {{ request()->is('perkembangan/produk-domestik*') ? 'show' : '' }}">
                                                @can('sektor-pertambangan.view')
                                                    <a class="dropdown-item {{ request()->is('perkembangan/produk-domestik/sektor-pertambangan*') ? 'active' : '' }}"
                                                        href="{{ route('perkembangan.produk-domestik.sektor-pertambangan.index') }}">
                                                        Sektor Pertambangan <br> dan Galian
                                                    </a>
                                                @endcan

                                                @can('subsektor-kerajinan.view')
                                                    <a class="dropdown-item {{ request()->is('perkembangan/produk-domestik/subsektor-kerajinan*') ? 'active' : '' }}"
                                                        href="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.index') }}">
                                                        Subsektor Kerajinan
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                    @endcanany

                                </div>
                            </div>
                        </div>
                    </li>
                @endcanany

                {{-- Master Data (Dropdown Menu) --}}
                <li class="nav-item dropdown {{ request()->is('master-ddk*') || request()->is('master-perkembangan*') || request()->is('master-potensi*') || request()->is('user*') || request()->is('role*') ? 'active' : '' }}">
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
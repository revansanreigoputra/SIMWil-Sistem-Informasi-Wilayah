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
            <a href="{{ route('dashboard') }}" aria-label="{{ $websiteSetting?->website_name ?? 'Sistem Wilayah' }}">
                @if ($websiteSetting?->logo)
                    <img src="{{ asset('storage/' . $websiteSetting->logo) }}" alt="{{ $websiteSetting->website_name }}"
                        class="navbar-brand-image" style="height: 32px; width: auto; max-width: 150px;">
                @else
                    {{ $websiteSetting?->website_name ?? 'Sistem Wilayah' }}
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
                    <span class="avatar avatar-sm me-2"
                        style="background-image: url({{ asset('static/avatars/000m.jpg') }})"></span>
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


                                    <div
                                        class="dropdown-menu {{ request()->is('layanan-surat/template*') || request()->is('ttd*') || request()->is('layanan-surat/profil-desa*') ? 'show' : '' }}">

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
                                <a class="dropdown-item {{ request()->is('layanan-surat/permohonan') ? 'active' : '' }}"
                                    href="{{ route('permohonan.index') }}">
                                    <i class="bi bi-plus-circle me-2 py-1"></i>
                                     Permohonan Surat  
                                </a>
                                <a class="dropdown-item {{ request()->is('layanan-surat/permohonan/unverified') ? 'active' : ''}}"
                                href="{{route('permohonan.unverified')}}">
                                    Surat Belum Diverifikasi
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

                {{-- potensi --}}
                @canany('jumlah.view')
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

                                    {{-- Potensi Umum --}}
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('potensi/umum*') ? 'active' : '' }}"
                                            href="#sidebar-potensi-prasarana" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Potensi Umum
                                        </a>

                                        <div class="dropdown-menu {{ request()->is('potensi/umum*') ? 'show' : '' }}">

                                            @can('batas_wilayah.view')
                                                <a class="dropdown-item {{ request()->is('potensi/umum/batas-wilayah*') ? 'active' : '' }}"
                                                    href="{{ route('batas-wilayah.index') }}">
                                                    Batas Wilayah
                                                </a>
                                            @endcan

                                        </div>
                                    </div>

                                    {{-- Potensi Sumber Daya Alam --}}
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('potensi/sda*') ? 'active' : '' }}"
                                            href="#sidebar-potensi-prasarana" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Potensi Sumber <br> Daya Alam
                                        </a>

                                        <div class="dropdown-menu {{ request()->is('potensi/sda*') ? 'show' : '' }}">


                                            @can('jlahan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/jlahan*') ? 'active' : '' }}"
                                                    href="{{ route('jlahan.index') }}">
                                                    Jenis Lahan
                                                </a>
                                            @endcan

                                            @can('iklim.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/iklim*') ? 'active' : '' }}"
                                                    href="{{ route('iklim.index') }}">
                                                    Iklim
                                                </a>
                                            @endcan

                                            @can('topografi.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/topografi*') ? 'active' : '' }}"
                                                    href="{{ route('topografi.index') }}">
                                                    Topografi
                                                </a>
                                            @endcan

                                            <br>

                                            @can('lahan.view')
                                                <a class="dropdown-item {{ request()->routeIs('lahan.*') ? 'active' : '' }}"
                                                    href="{{ route('lahan.index') }}">
                                                    Kep. Lahan Tanaman
                                                </a>
                                            @endcan

                                            @can('hasiltanaman.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/hasiltanaman*') ? 'active' : '' }}"
                                                    href="{{ route('hasiltanaman.index') }}">
                                                    Hasil & Produksi <br> Tanaman
                                                </a>
                                            @endcan

                                            <br>

                                            @can('kepemilikan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/kepemilikan*') ? 'active' : '' }}"
                                                    href="{{ route('kepemilikan.index') }}">
                                                    Kep. Lahan Buah
                                                </a>
                                            @endcan

                                            @can('hasilbuah.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/hasilbuah*') ? 'active' : '' }}"
                                                    href="{{ route('hasilbuah.index') }}">
                                                    Hasil & Produksi Buah
                                                </a>
                                            @endcan

                                            @can('apotikhidup.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/apotikhidup*') ? 'active' : '' }}"
                                                    href="{{ route('apotikhidup.index') }}">
                                                    Apotik Hidup
                                                </a>
                                            @endcan

                                            <br>

                                            @can('kebun.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/kebun*') ? 'active' : '' }}"
                                                    href="{{ route('kebun.index') }}">
                                                    Kep. Lahan Kebun
                                                </a>
                                            @endcan

                                            @can('hasilkebun.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/hasilkebun*') ? 'active' : '' }}"
                                                    href="{{ route('hasilkebun.index') }}">
                                                    Hasil & Produksi Kebun
                                                </a>
                                            @endcan

                                            <br>

                                            @can('hutan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/hutan*') ? 'active' : '' }}"
                                                    href="{{ route('hutan.index') }}">
                                                    Kep. Lahan Hutan
                                                </a>
                                            @endcan

                                            @can('hasilhutan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/hasilhutan*') ? 'active' : '' }}"
                                                    href="{{ route('hasilhutan.index') }}">
                                                    Hasil & Produksi Hutan
                                                </a>
                                            @endcan

                                            @can('kondisihutan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/kondisihutan*') ? 'active' : '' }}"
                                                    href="{{ route('kondisihutan.index') }}">
                                                    Kondisi Hutan
                                                </a>
                                            @endcan

                                            @can('dampakpengolahan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/dampakpengolahan*') ? 'active' : '' }}"
                                                    href="{{ route('dampakpengolahan.index') }}">
                                                    Dampah Pengolahan <br>
                                                    Hutan
                                                </a>
                                            @endcan

                                            <br>

                                            @can('jenis-populasi-ternak.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/populasi-ternak*') ? 'active' : '' }}"
                                                    href="{{ route('jenis-populasi-ternak.index') }}">
                                                    Populasi Ternak
                                                </a>
                                            @endcan

                                            @can('produksi-ternak.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/produksi-ternak*') ? 'active' : '' }}"
                                                    href="{{ route('produksi-ternak.index') }}">
                                                    Produksi Ternak
                                                </a>
                                            @endcan

                                            @can('pengolahan-hasil-ternak.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/pengolahan-hasil-ternak*') ? 'active' : '' }}"
                                                    href="{{ route('pengolahan-hasil-ternak.index') }}">
                                                    Pengolahan Hasil <br> Ternak
                                                </a>
                                            @endcan

                                            @can('lahan-pakan-ternak.view')
                                                <a class="dropdown-item {{ request()->routeIs('lahan-pakan-ternak.*') ? 'active' : '' }}"
                                                    href="{{ route('lahan-pakan-ternak.index') }}">
                                                    Lahan Pakan Ternak
                                                </a>
                                            @endcan

                                            <br>
                                            
                                            @can('p-alat-produksi-ikan-laut.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/alat-produksi-ikan-laut*') ? 'active' : '' }}"
                                                    href="{{ route('p-alat-produksi-ikan-laut.index') }}">
                                                    Alat Produksi Ikan Laut
                                                </a>
                                            @endcan

                                            @can('p-alat-produksi-ikan-tawar.view')
                                                <a class="dropdown-item {{ request()->is('potensi/sda/alat-produksi-ikan-tawar*') ? 'active' : '' }}"
                                                    href="{{ route('p-alat-produksi-ikan-tawar.index') }}">
                                                    Alat Produksi Ikan <br> Tawar
                                                </a>
                                            @endcan

                                        </div>
                                    </div>


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
                                            @can('p_kewarganegaraan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/kewarganegaraan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-sdm.kewarganegaraan.index') }}">
                                                    Kewarganegaraan
                                                </a>
                                            @endcan
                                            @can('p_cacat.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/cacat*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-sdm.cacat.index') }}">
                                                    Cacat
                                                </a>
                                            @endcan
                                            @can('p_etnis_suku.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/etnis-suku*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-sdm.etnis-suku.index') }}">
                                                    Etnis/Suku
                                                </a>
                                            @endcan
                                            @can('p_tenaga_kerja.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/tenaga-kerja*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-sdm.tenaga-kerja.index') }}">
                                                    Tenaga Kerja
                                                </a>
                                            @endcan
                                            @can('p_kualitas_angkatan_kerja.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-sdm/kualitas-angkatan-kerja*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-sdm.kualitas-angkatan-kerja.index') }}">
                                                    Kualitas Angkatan <br> Kerja
                                                </a>
                                            @endcan
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
                                            @can('potensi.kelembagaan.pemerintah.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/pemerintah*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-kelembagaan.pemerintah.index') }}">
                                                    Lembaga Pemerintah
                                                </a>
                                            @endcan
                                            @can('lembaga-kemasyarakatan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/lembaga-kemasyarakatan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-kelembagaan.lembaga-kemasyarakatan.index') }}">
                                                    Lembaga Kemasyarakatan
                                                </a>
                                            @endcan
                                            @can('lembaga-kemasyarakatan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/politik*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-kelembagaan.politik.index') }}">
                                                    Partisipasi Politik
                                                </a>
                                            @endcan
                                            @can('lembaga-ekonomi.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/ekonomi*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-kelembagaan.ekonomi.index') }}">
                                                    Lembaga Ekonomi
                                                </a>
                                            @endcan
                                            <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/pengangkutan*') ? 'active' : '' }}"
                                                href="{{ route('potensi.potensi-kelembagaan.pengangkutan.index') }}">
                                                Jasa Pengangkutan
                                            </a>
                                            <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/hiburan*') ? 'active' : '' }}"
                                                href="{{ route('potensi.potensi-kelembagaan.hiburan.index') }}">
                                                Jasa, Hiburan, DLL
                                            </a>
                                            <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/pendidikan*') ? 'active' : '' }}"
                                                href="{{ route('potensi.potensi-kelembagaan.pendidikan.index') }}">
                                                Lembaga Pendidikan
                                            </a>
                                            @can('adat.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/lembagaAdat*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-kelembagaan.lembagaAdat.index') }}">
                                                    Lembaga Adat
                                                </a>
                                            @endcan
                                            <a class="dropdown-item {{ request()->is('potensi/potensi-kelembagaan/keamanan*') ? 'active' : '' }}"
                                                href="{{ route('potensi.potensi-kelembagaan.keamanan.index') }}">
                                                Lembaga Keamanan
                                            </a>
                                        </div>
                                    </div>

                                    {{-- Prasarana dan Sarana --}}
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

                                            @can('angkutan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/angkutan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.angkutan.index') }}">
                                                    Prasarana Angkutan
                                                </a>
                                            @endcan

                                            @can('komunikasiinformasi.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/komunikasiinformasi*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.index') }}">
                                                    Komunikasi Informasi
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

                                            @can('peribadatan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/peribadatan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.peribadatan.index') }}">
                                                    Peribadatan
                                                </a>
                                            @endcan

                                            @can('olahraga.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/olahraga*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.olahraga.index') }}">
                                                    Prasarana Olahraga
                                                </a>
                                            @endcan

                                            @can('kesehatan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/kesehatan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.kesehatan.index') }}">
                                                    Prasarana Kesehatan
                                                </a>
                                            @endcan

                                            @can('skesehatan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/skesehatan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.skesehatan.index') }}">
                                                    Sarana Kesehatan
                                                </a>
                                            @endcan

                                            @can('ppendidikan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/ppendidikan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.ppendidikan.index') }}">
                                                    Prasarana Pendidikan
                                                </a>
                                            @endcan

                                            @can('kemasyarakatan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/energiPenerangan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.index') }}">
                                                    Energi & Penerangan
                                                </a>
                                            @endcan

                                            @can('hiburan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/hiburan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.hiburan.index') }}">
                                                    Prasarana Hiburan
                                                </a>
                                            @endcan

                                            @can('kebersihan.view')
                                                <a class="dropdown-item {{ request()->is('potensi/potensi-prasarana-dan-sarana/kebersihan*') ? 'active' : '' }}"
                                                    href="{{ route('potensi.potensi-prasarana-dan-sarana.kebersihan.index') }}">
                                                    Prasarana Kebersihan
                                                </a>
                                            @endcan

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endcanany

                {{-- perkembangan --}}
                @canany(['apb.view', 'pertanggungjawaban.view', 'pembinaanpusat.view', 'pembinaanprovinsi.view',
                    'organisasi.view'])
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
                                        <div
                                            class="dropdown-menu {{ request()->is('perkembangan/lembagakemasyarakatan*') ? 'show' : '' }}">
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
                                        <div
                                            class="dropdown-menu {{ request()->is('perkembangan/peransertamasyarakat*') ? 'show' : '' }}">
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
                                            @can('sikapdanmental.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/peransertamasyarakat/sikapdanmental*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.peransertamasyarakat.sikapdanmental.index') }}">
                                                    Sikap dan Mental <br> Masyarakat
                                                </a>
                                            @endcan

                                        </div>
                                    </div>

                                    {{-- Kedaulatan Politik Masyarakat --}}
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/kedaulatanmasyarakatan*') ? 'active' : '' }}"
                                            href="#sidebar-kedaulatanmasyarakatan" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Kedaulatan <br> Politik Masyarakat
                                        </a>
                                        <div
                                            class="dropdown-menu {{ request()->is('perkembangan/Kedaulatanmasyarakat*') ? 'show' : '' }}">
                                            @can('berbangsa.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/kedaulatanmasyarakat/berbangsa*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.index') }}">
                                                    Kesadaran Berbangsa <br>dan Bernegara
                                                </a>
                                            @endcan
                                            @can('pajak.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/kedaulatanmasyarakat/pajak*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.kedaulatanmasyarakat.pajak.index') }}">
                                                    Kesadaran Membayar <br> Pajak dan Retribusi
                                                </a>
                                            @endcan
                                            @can('politik.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/kedaulatanmasyarakat/politik*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.kedaulatanmasyarakat.politik.index') }}">
                                                    Partisipasi Politik
                                                </a>
                                            @endcan
                                        </div>
                                    </div>

                                    {{-- Keamanan dan ketertiban --}}
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/keamanandanketertiban*') ? 'active' : '' }}"
                                            href="#sidebar-keamanandanketertiban" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Keamanan dan <br> Ketertiban
                                        </a>
                                        <div
                                            class="dropdown-menu {{ request()->is('perkembangan/keamanandanketertiban*') ? 'show' : '' }}">
                                            @can('konfliksara.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/konfliksara*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.konfliksara.index') }}">
                                                    Konflik Sara
                                                </a>
                                            @endcan
                                            @can('perkelahian.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/perkelahian*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.perkelahian.index') }}">
                                                    Perkelahian
                                                </a>
                                            @endcan
                                            @can('pencurian.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/pencurian*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.pencurian.index') }}">
                                                    Pencurian
                                                </a>
                                            @endcan
                                            @can('penjarahan.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/penjarahan*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.penjarahan.index') }}">
                                                    Penjarahan dan <br> Penyerobotan Tanah
                                                </a>
                                            @endcan

                                            @can('perjudian.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/perjudian*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.perjudian.index') }}">
                                                    Perjudian, Penipuan<br> dan Penggelapan
                                                </a>
                                            @endcan
                                            @can('miras.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/miras*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.miras.index') }}">
                                                    Pemakaian Miras<br> dan Narkoba
                                                </a>
                                            @endcan
                                            @can(abilities: 'prostitusi.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/prostitusi*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.prostitusi.index') }}">
                                                    Prostitusi
                                                </a>
                                            @endcan
                                            @can(abilities: 'pembunuhan.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/pembunuhan*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.pembunuhan.index') }}">
                                                    Pembunuhan
                                                </a>
                                            @endcan
                                            @can(abilities: 'penculikan.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/penculikan*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.penculikan.index') }}">
                                                    Penculikan
                                                </a>
                                            @endcan
                                            @can(abilities: 'seksual.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/seksual*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.seksual.index') }}">
                                                    Kejahatan Seksual
                                                </a>
                                            @endcan
                                            @can(abilities: 'sosial.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/sosial*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.sosial.index') }}">
                                                    Kesejahteraan Sosial
                                                </a>
                                            @endcan
                                            @can(abilities: 'kdrt.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/kdrt*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.kdrt.index') }}">
                                                    Kekerasan Dalam<br> Rumah Tangga
                                                </a>
                                            @endcan
                                            @can(abilities: 'teror.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/teror*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.teror.index') }}">
                                                    Teror dan Intimidasi
                                                </a>
                                            @endcan
                                            @can(abilities: 'sistemkeamanan.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/keamanandanketertiban/sistemkeamanan*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.index') }}">
                                                    Perlembagaan Sistem<br> Keamanan
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
                                        <div
                                            class="dropdown-menu {{ request()->is('perkembangan/ekonomi*') ? 'show' : '' }}">
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
                                            href="#sidebar-pendapatanperkapital" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Pendapatan Perkapital
                                        </a>
                                        <div
                                            class="dropdown-menu {{ request()->is('perkembangan/pendapatanperkapital*') ? 'show' : '' }}">

                                            {{-- Menurut Sektor Usaha --}}
                                            @can('menurut_sektor_usaha.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/pendapatanperkapital/menurut_sektor_usaha*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index') }}">
                                                    Sektor Usaha
                                                </a>
                                            @endcan

                                            {{-- Pendapatan Riil Keluarga --}}
                                            @can('pendapatan_rill_keluarga.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/pendapatanperkapital/pendapatan_rill_keluarga*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index') }}">
                                                    Pendapatan Riil
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
                                            <div
                                                class="dropdown-menu {{ request()->is('perkembangan/penduduk*') ? 'show' : '' }}">
                                                <a class="dropdown-item {{ request()->is('perkembangan/penduduk*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan-penduduk.index') }}">
                                                    Penduduk dan <br> Kepala Keluarga
                                                </a>
                                            </div>
                                        </div>
                                    @endcan

                                    {{-- Pendidikan Masyarakat --}}
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('pendidikanmasyarakat*') ? 'active' : '' }}"
                                            href="#sidebar-pendidikanmasyarakat" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Pendidikan Masyarakat
                                        </a>
                                        <div
                                            class="dropdown-menu {{ request()->is('pendidikanmasyarakat*') ? 'show' : '' }}">

                                            {{-- Tingkat Pendidikan Masyarakat --}}
                                            @can('tingkat_pendidikan_masyarakat.view')
                                                <a class="dropdown-item {{ request()->is('pendidikanmasyarakat/tingkat_pendidikan_masyarakat*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index') }}">
                                                    Tingkat Pendidikan
                                                </a>
                                            @endcan

                                            {{-- Wajib Belajar 9 Tahun --}}
                                            @can('wajib_belajar_9_tahun.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/pendidikanmasyarakat/wajib_belajar_9_tahun*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index') }}">
                                                    Wajib Belajar
                                                </a>
                                            @endcan

                                            {{-- Rasio Guru & Murid --}}
                                            @can('rasio_guru_dan_murid.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/pendidikanmasyarakat/rasio_guru_dan_murid*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index') }}">
                                                    Rasio Guru & Murid
                                                </a>
                                            @endcan

                                            {{-- Kelembagaan Pendidikan Masyarakat --}}
                                            @can('kelembagaan.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/pendidikanmasyarakat/kelembagaan*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.index') }}">
                                                    Kelembagaan
                                                </a>
                                            @endcan

                                        </div>
                                    </div>

                                    {{-- Penggunaan Aset Ekonomi Masyarakat --}}
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle {{ request()->is('asetekonomi*') ? 'active' : '' }}"
                                            href="#sidebar-asetekonomi" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false">
                                            Aset Ekonomi
                                        </a>
                                        <div class="dropdown-menu {{ request()->is('asetekonomi*') ? 'show' : '' }}">

                                            {{-- Aset Tanah --}}
                                            @can('aset_tanah.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/asetekonomi/aset_tanah*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.asetekonomi.aset_tanah.index') }}">
                                                    Aset Tanah
                                                </a>
                                            @endcan

                                            {{-- Sarana Transportasi Umum --}}
                                            @can('sarana_transportasi_umum.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/asetekonomi/sarana_transportasi_umum*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.index') }}">
                                                    Transportasi Umum
                                                </a>
                                            @endcan

                                            {{-- Sarana Produksi --}}
                                            @can('sarana_produksi.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/asetekonomi/sarana_produksi*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.asetekonomi.sarana_produksi.index') }}">
                                                    Sarana Produksi
                                                </a>
                                            @endcan


                                            {{-- Rumah Menurut Dinding --}}
                                            @can('rumah_menurut_dinding.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/asetekonomi/rumah_menurut_dinding*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.asetekonomi.rumah_menurut_dinding.index') }}">
                                                    Rumah (Dinding)
                                                </a>
                                            @endcan

                                            {{-- Rumah Menurut Lantai --}}
                                            @can('rumah_menurut_lantai.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/asetekonomi/rumah_menurut_lantai*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.asetekonomi.rumah_menurut_lantai.index') }}">
                                                    Rumah (Lantai)
                                                </a>
                                            @endcan

                                            {{-- Rumah Menurut Atap --}}
                                            @can('rumah_menurut_atap.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/asetekonomi/rumah_menurut_atap*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.index') }}">
                                                    Rumah (Atap)
                                                </a>
                                            @endcan


                                            {{-- Pemilik Aset Ekonomi Lainnya --}}
                                            @can('pemilik_aset_ekonomi_lainnya.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/asetekonomi/pemilik_aset_ekonomi_lainnya*') ? 'active' : '' }}"
                                                    href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index') }}">
                                                    Aset Lainnya
                                                </a>
                                            @endcan

                                        </div>
                                    </div>

                                    {{-- Produk Domestik Desa/Kelurahan --}}
                                    @canany(['sektor-pertambangan.view', 'subsektor-kerajinan.view'])
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/produk-domestik*') ? 'active' : '' }}"
                                                href="#sidebar-produkdomestik" data-bs-toggle="dropdown"
                                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                                Produk Domestik <br> Desa/Kelurahan
                                            </a>

                                            <div
                                                class="dropdown-menu {{ request()->is('perkembangan/produk-domestik*') ? 'show' : '' }}">
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

                                                @can('sektor-industri-pengolahan.view')
                                                    <a class="dropdown-item {{ request()->is('perkembangan/produk-domestik/sektor-industri-pengolahan*') ? 'active' : '' }}"
                                                        href="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.index') }}">
                                                        Sektor Industri <br> Pengolahan
                                                    </a>
                                                @endcan

                                               @can('subsektor-kehutanan.view')
                                            <a class="dropdown-item {{ request()->is('perkembangan/produk-domestik/subsektor-kehutanan*') ? 'active' : '' }}"
                                            href="{{ route('perkembangan.produk-domestik.subsektor-kehutanan.index') }}">
                                                Subsektor <br> Kehutanan
                                            </a>
                                        @endcan
                                         @can('sektor-bangunan.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/produk-domestik/sektor-bangunan*') ? 'active' : '' }}"
                                                href="{{ route('perkembangan.produk-domestik.sektor-bangunan.index') }}">
                                                    Sektor <br> Bangunan/konstruksi
                                                </a>
                                            @endcan

                                             @can('sektor-jasa-jasa.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/produk-domestik/sektor-jasa-jasa*') ? 'active' : '' }}"
                                                href="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.index') }}">
                                                    Sektor Jasa Jasa
                                                </a>
                                            @endcan

                                             @can('sektor-keuangan-jasa-perusahaan.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/produk-domestik/sektor-keuangan-jasa-perusahaan*') ? 'active' : '' }}"
                                                href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.index') }}">
                                                    Sektor keungan <br> jasa perusahaan
                                                </a>
                                            @endcan

                                              @can('sektor-angkutan.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/produk-domestik/sektor-angkutan') ? 'active' : '' }}"
                                                href="{{ route('perkembangan.produk-domestik.sektor-angkutan.index') }}">
                                                    Sektor Angkutan <br> Dan Komunikasi
                                                </a>
                                            @endcan

                                             @can('sektor-listrik-gas-air-minum.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/produk-domestik/sektor-listrik-gas-air-minum') ? 'active' : '' }}"
                                                href="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.index') }}">
                                                    Sektor listrik, Gas <br> dan minum
                                                </a>
                                            @endcan

                                                @can('sektor-perdagangan-hotel-restoran.view')
                                                <a class="dropdown-item {{ request()->is('perkembangan/produk-domestik/sektor-perdagangan-hotel-restoran') ? 'active' : '' }}"
                                                href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.index') }}">
                                                    Sektor perdagangan <br> hotel dan restoran
                                                </a>
                                            @endcan
                                        </div>

                                        </div>
                                    @endcanany

                               {{-- Struktur Mata Pencaharian Menurut Sektor --}}
                    @canany(['sektor-pertanian.view', 'sektor-pertanian.create', 'sektor-pertanian.show', 'sektor-pertanian.edit', 'sektor-pertanian.destroy'])
                        <div class="dropend">
                            <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/struktur-mata-pencaharian*') ? 'active' : '' }}"
                                 href="#sidebar-strukturmatapencaharian" data-bs-toggle="dropdown"
                                 data-bs-auto-close="false" role="button" aria-expanded="false">
                                Struktur Mata <br> Pencaharian <br> Menurut Sektor
                            </a>

                            <div class="dropdown-menu {{ request()->is('perkembangan/struktur-mata-pencaharian*') ? 'show' : '' }}">
                                @can('sektor-pertanian.view')
                                    <a class="dropdown-item {{ request()->is('perkembangan/struktur-mata-pencaharian/sektor-pertanian*') ? 'active' : '' }}"
                                        href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.index') }}">
                                        Sektor Pertanian
                                    </a>
                                @endcan

                                 @can('sektor-perkebunan.view')
                                    <a class="dropdown-item {{ request()->is('perkembangan/struktur-mata-pencaharian/sektor-perkebunan*') ? 'active' : '' }}"
                                        href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.index') }}">
                                        Sektor Perkebunan
                                    </a>
                                @endcan

                                 @can('sektor-peternakan.view')
                                    <a class="dropdown-item {{ request()->is('perkembangan/struktur-mata-pencaharian/sektor-peternakan*') ? 'active' : '' }}"
                                        href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.index') }}">
                                        Sektor Perternakan
                                    </a>
                                @endcan

                                 @can('sektor-perikanan.view')
                                    <a class="dropdown-item {{ request()->is('perkembangan/struktur-mata-pencaharian/sektor-perikanan*') ? 'active' : '' }}"
                                        href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perikanan.index') }}">
                                        Sektor Perikanan
                                    </a>
                                @endcan

                                @can('sektor-kehutanan.view')
                                    <a class="dropdown-item {{ request()->is('perkembangan/struktur-mata-pencaharian/sektor-kehutanan*') ? 'active' : '' }}"
                                        href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-kehutanan.index') }}">
                                        Sektor Kehutanan
                                    </a>
                                @endcan

                                  @can('sektor-tambang.view')
                                    <a class="dropdown-item {{ request()->is('perkembangan/struktur-mata-pencaharian/sektor-tambang*') ? 'active' : '' }}"
                                        href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-tambang.index') }}">
                                        Sektor Pertambangan
                                    </a>
                                @endcan

                                 @can('sektor-perdagangan.view')
                                    <a class="dropdown-item {{ request()->is('perkembangan/struktur-mata-pencaharian/sektor-perdagangan*') ? 'active' : '' }}"
                                        href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.index') }}">
                                        Sektor Perdagangan
                                    </a>
                                @endcan

                                 @can('sektor-industri-kecil.view')
                                    <a class="dropdown-item {{ request()->is('perkembangan/struktur-mata-pencaharian/sektor-industri-kecil*') ? 'active' : '' }}"
                                        href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.index') }}">
                                        Sektor industri kecil <br> dan Kerajinan RT
                                    </a>
                                @endcan

                                 @can('sektor-industri-menengah-besar.view')
                                    <a class="dropdown-item {{ request()->is('perkembangan/struktur-mata-pencaharian/sektor-industri-menengah-besar*') ? 'active' : '' }}"
                                        href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-industri-menengah-besar.index') }}">
                                        Sektor industri besar <br> Menengah
                                    </a>
                                @endcan


                                 @can('sektor-jasa-usaha.view')
                                    <a class="dropdown-item {{ request()->is('perkembangan/struktur-mata-pencaharian/sektor-jasa-usahar*') ? 'active' : '' }}"
                                        href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.index') }}">
                                        Sektor Jasa
                                    </a>
                                @endcan

                            </div>
                        </div>
                    @endcanany

                                     {{-- Kesehatan Masyarakat --}}
                                    @canany(['kualitas-ibu-hamil.view', 'kualitas-bayi.view'])
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle {{ request()->is('perkembangan/kesehatan-masyarakat*') ? 'active' : '' }}"
                                                href="#sidebar-kesehatanmasyarakat" data-bs-toggle="dropdown"
                                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                                Kesehatan Masyarakat
                                            </a>

                                            <div class="dropdown-menu {{ request()->is('perkembangan/kesehatan-masyarakat*') ? 'show' : '' }}">
                                                @can('kualitas-ibu-hamil.view')
                                                    <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/kualitas-ibu-hamil*') ? 'active' : '' }}"
                                                        href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index') }}">
                                                        Kualitas Ibu Hamil
                                                    </a>
                                                @endcan

                                              @can('kualitas-bayi.view')
                                            <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/kualitas-bayi*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index') }}">
                                                Kualitas Bayi
                                            </a>
                                        @endcan

                                             @can('kualitas-persalinan.view')
                                            <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/kualitas-persalinan*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index') }}">
                                                Kualitas persalinan
                                            </a>
                                        @endcan

                                         @can('cakupan-imunisasi.view')
                                        <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/cakupan-imunisasi*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index') }}">
                                                Cakupan imunisasi
                                            </a>
                                    @endcan
                                     @can('wabah-penyakit.view')
                                        <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/wabah-penyakit*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.wabah-penyakit.index') }}">
                                                Wabah penyakit
                                            </a>
                                    @endcan
                                      @can('gizi-balita.view')
                                        <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/gizi-balita*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.gizi-balita.index') }}">
                                             Status Gizi Balita
                                            </a>
                                    @endcan
                                      @can('subsektor-harapan.view')
                                        <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/subsektor-harapan*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.subsektor-harapan.index') }}">
                                              Angka Harapan <br> Hidup
                                            </a>
                                    @endcan
                                      @can('penderita-sakit.view')
                                        <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/penderita-sakit*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.penderita-sakit.index') }}">
                                              Penderita Sakit
                                            </a>
                                    @endcan
                                     @can('sarana-prasarana.view')
                                        <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/sarana-prasarana*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.sarana-prasarana.index') }}">
                                              Perkembangan sarana <br> dan prasarana
                                            </a>
                                    @endcan
                                     @can('pasangan-usia-subur.view')
                                        <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/pasangan-usia-subur*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.pasangan-usia-subur.index') }}">
                                               Pasangan usia subur<br> KB
                                            </a>
                                    @endcan
                                     @can('cakupan-air-bersih.view')
                                        <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/cakupan-air-bersih*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.index') }}">
                                               Cakupan pemenuhan <br>kebutuhan air<br> bersih
                                            </a>
                                    @endcan
                                     @can('perilaku-hidup-bersih-dan-sehat.view')
                                        <a class="dropdown-item {{ request()->is('perkembangan/kesehatan-masyarakat/perilaku-hidup-bersih-dan-sehat*') ? 'show' : '' }}"
                                                href="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.index') }}">
                                               Perilaku hidup bersih <br> dan sehat
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
                                <a href="{{ route('master-perkembangan.index') }}"
                                    class="dropdown-item {{ request()->is('master-perkembangan*') ? 'active' : '' }}">
                                    Master Perkembangan
                                </a>
                                <a href="{{ route('master-potensi.index') }}"
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

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
                    @if (isset($notificationCount) && $notificationCount > 0)
                        <span class="badge bg-red position-absolute top-0 start-100 translate-middle">
                            {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                        </span>
                    @endif
                </a>

                <!-- Dropdown isi notifikasi -->
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow dropdown-menu-card">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h3 class="card-title">Notifikasi Stok</h3>
                            <button type="button" class="btn-close ms-auto" aria-label="Close"
                                onclick="closeDropdown(this)"></button>
                        </div>
                        <div class="list-group list-group-flush list-group-hoverable">
                            @if (isset($notifications) && $notifications->count() > 0)
                                @foreach ($notifications->take(5) as $notification)
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span
                                                    class="status-dot status-dot-animated {{ $notificationService->getPriorityColor($notification['priority']) }} d-block"></span>
                                            </div>
                                            <div class="col text-truncate">
                                                <a href="{{ $notification['url'] }}" class="text-body d-block">
                                                    {{ $notification['product']['name'] }}
                                                </a>
                                                <div class="d-block text-secondary text-truncate mt-n1">
                                                    Stok: {{ number_format($notification['product']['stock']) }} /
                                                    Min: {{ number_format($notification['product']['minimum_stock']) }}
                                                    <span
                                                        class="badge badge-sm {{ $notificationService->getPriorityColor($notification['priority']) }} ms-1">
                                                        {{ $notificationService->getPriorityLabel($notification['priority']) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="list-group-item-actions"
                                                    onclick="markAsRead({{ $notification['id'] }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="icon text-muted icon-2">
                                                        <path d="M20 6L9 17l-5-5"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if ($notifications->count() > 5)
                                    <div class="text-center list-group-item">
                                        <a href="{{ route('stock.index') }}" class="text-muted">
                                            Lihat {{ $notifications->count() - 5 }} notifikasi lainnya...
                                        </a>
                                    </div>
                                @endif
                            @else
                                <div class="py-4 text-center list-group-item">
                                    <div class="text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="mb-2 icon">
                                            <path d="M20 6L9 17l-5-5"></path>
                                        </svg>
                                        <div>Tidak ada notifikasi stok rendah</div>
                                        <small>Semua produk memiliki stok yang cukup</small>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if (isset($notifications) && $notifications->count() > 0)
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('stock.index') }}" class="btn btn-outline-primary w-100">
                                            <i class="fas fa-warehouse me-1"></i> Lihat Stok
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="#" class="btn btn-primary w-100" onclick="markAllAsRead()">
                                            <i class="fas fa-check-double me-1"></i> Tandai Dibaca
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
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
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                @canany(['jabatan.view', 'perangkat_desa.view'])
                    <li
                        class="nav-item dropdown {{ request()->is('jabatan*') || request()->is('perangkat_desa*') ? 'active' : '' }}">
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
                            class="dropdown-menu {{ request()->is('jabatan*') || request()->is('perangkat_desa*') ? 'show' : '' }}">
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
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M9 6l11 0" />
                                        <path d="M9 12l11 0" />
                                        <path d="M9 18l11 0" />
                                        <path d="M5 6l0 .01" />
                                        <path d="M5 12l0 .01" />
                                        <path d="M5 18l0 .01" />
                                    </svg> --}}
                                            Daftar Jabatan
                                        </a>
                                    @endcan

                                    @can('perangkat_desa.view')
                                        <a class="dropdown-item {{ request()->is('perangkat_desa*') ? 'active' : '' }}"
                                            href="{{ route('perangkat_desa.index') }}">
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg> --}}
                                            Perangkat Desa
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </li>
                @endcanany


                {{-- Awal Menu Dasar Data Keluarga --}}
                @can('data_keluarga.view')
                    <li class="nav-item dropdown {{ request()->is('data_keluarga*') ? 'active' : '' }}">
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
                        <div class="dropdown-menu {{ request()->is('data_keluarga*') ? 'show' : '' }}">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item {{ request()->is('data-keluarga') && !request()->is('data-keluarga/*') ? 'active' : '' }}"
                                        href="{{ route('data_keluarga.index') }}"> Data Kepala Keluarga </a>
                                    <a class="dropdown-item {{ request()->is('data-keluarga/laporan/kepala-keluarga') ? 'active' : '' }}"
                                        href="{{ route('data_keluarga.report.heads') }}"> Laporan Kepala Keluarga </a>
                                    <a class="dropdown-item {{ request()->is('data-keluarga/laporan/anggota-keluarga') ? 'active' : '' }}"
                                        href="{{ route('data_keluarga.report.members') }}"> Laporan Anggota Keluarga </a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endcan

                {{-- <li class="nav-item dropdown {{ request()->is('penjualan*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-sales" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-1">
                                <path d="M3 3h18l-1 13H4L3 3z"></path>
                                <path d="M16 16a1 1 0 1 1 2 0a1 1 0 0 1 -2 0"></path>
                                <path d="M7 16a1 1 0 1 1 2 0a1 1 0 0 1 -2 0"></path>
                                <path d="M8.5 4.5l.5 7h6l.5 -7"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title"> Penjualan </span>
                    </a>
                    <div class="dropdown-menu {{ request()->is('penjualan*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item {{ request()->is('penjualan') && !request()->is('penjualan/riwayat') ? 'active' : '' }}"
                                    href="{{ route('sales.pos') }}"> Point of Sale </a>
                                <a class="dropdown-item {{ request()->is('penjualan/riwayat*') ? 'active' : '' }}"
                                    href="{{ route('sales.history') }}"> Riwayat Penjualan </a>
                            </div>
                        </div>
                    </div>
                </li>
                @can('purchase.view')
                <li class="nav-item {{ request()->is('pembelian*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('purchases.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-1">
                                <rect x="3" y="7" width="18" height="13" rx="2" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M3 10h18" />
                            </svg>
                        </span>
                        <span class="nav-link-title"> Pembelian </span>
                    </a>
                </li>
                @endcan
                @can('stock.view')
                <li class="nav-item {{ request()->is('stok*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('stock.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-1">
                                <path d="M3 3h18v18H3z"></path>
                                <path d="M9 9h6v6H9z"></path>
                                <path d="M3 9h6"></path>
                                <path d="M15 9h6"></path>
                                <path d="M9 3v6"></path>
                                <path d="M9 15v6"></path>
                                <path d="M15 3v6"></path>
                                <path d="M15 15v6"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title"> Manajemen Stok </span>
                    </a>
                </li>
                @endcan --}}
                {{-- Master Data (Dropdown Menu) --}}

                <li
                    class="nav-item dropdown {{ request()->is('role*') || request()->is('kategori*') || request()->is('supplier*') || request()->is('konsumen*') || request()->is('satuan*') || request()->is('produk*') || request()->is('user*') ? 'active' : '' }}">
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
                            </svg></span>
                        <span class="nav-link-title"> Master Data </span>
                    </a>
                    <div
                        class="dropdown-menu {{ request()->is('role*') || request()->is('kategori*') || request()->is('supplier*') || request()->is('konsumen*') || request()->is('satuan*') || request()->is('produk*') || request()->is('user*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                {{--  --}}
                                <a href="{{ route('master.ddk.index') }}" class="dropdown-item">Master DDK</a>
                                {{-- <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="">filter Hubungan Keluarga</a></li>
                                    <li><a class="dropdown-item" href="">filter Agama</a></li>
                                    <li><a class="dropdown-item" href="">filter Golongan Darah</a></li>
                                    <li><a class="dropdown-item" href="">filter Kewarganegaraan</a></li>
                                    <li><a class="dropdown-item" href="">filter Pendidikan terakhir</a></li>
                                    <li><a class="dropdown-item" href="">filter Mata Pencaharian Pokok</a></li>
                                    <li><a class="dropdown-item" href="">filter Akseptor KB</a></li>
                                    <li><a class="dropdown-item" href="">filter Cacat Fisik</a></li>
                                    <li><a class="dropdown-item" href="">filter Cacat Mental</a></li>
                                    <li><a class="dropdown-item" href="">filter Kedudukan sebagai Wajib Pajak</a></li>
                                    <li><a class="dropdown-item" href="">filter Lembaga Pemerintahan yang diikuti</a></li>
                                    <li><a class="dropdown-item" href="">filter Lembaga Kemasyarakatan yang diikuti</a></li>
                                    <li><a class="dropdown-item" href="">filter Lembaga Ekonomi yang diikuti</a></li>
                                </ul> --}}
                                {{--  --}}
                                @can('category.view')
                                    <a class="dropdown-item {{ request()->is('kategori*') ? 'active' : '' }}"
                                        href="{{ route('category.index') }}"> Kategori </a>
                                @endcan
                                @can('product.view')
                                    <a class="dropdown-item {{ request()->is('produk*') ? 'active' : '' }}"
                                        href="{{ route('product.index') }}"> Produk </a>
                                @endcan
                                @can('user.view')
                                    <a class="dropdown-item {{ request()->is('user*') ? 'active' : '' }}"
                                        href="{{ route('user.index') }}"> User </a>
                                @endcan
                                @can('customer.view')
                                    <a class="dropdown-item {{ request()->is('konsumen*') ? 'active' : '' }}"
                                        href="{{ route('customer.index') }}"> Konsumen </a>
                                @endcan
                                @can('unit.view')
                                    <a class="dropdown-item {{ request()->is('satuan*') ? 'active' : '' }}"
                                        href="{{ route('unit.index') }}"> Satuan </a>
                                @endcan
                                @can('supplier.view')
                                    <a class="dropdown-item {{ request()->is('supplier*') ? 'active' : '' }}"
                                        href="{{ route('supplier.index') }}"> Supplier </a>
                                @endcan
                                @can('role.view')
                                    <a class="dropdown-item {{ request()->is('role*') ? 'active' : '' }}"
                                        href="{{ route('role.index') }}"> Hak Akses </a>
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

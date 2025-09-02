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
                    {{-- <span>{{ auth()->user() ? auth()->user()->name : '' }}</span> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Settings</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <a href="#" class="dropdown-item"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Keluar
                        </a>
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
                {{-- Kepala Desa --}}
                @can('kecamatan.view')
                    <li class="nav-item {{ request()->is('kecamatan*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('kecamatan.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Icon Kecamatan -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-building-townhall" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12h4v8h-4z" />
                                    <path d="M12 6l-8 6h16z" />
                                    <path d="M4 12v8h16v-8" />
                                </svg>
                            </span>
                            <span class="nav-link-title"> Kecamatan </span>
                        </a>
                    </li>
                @endcan

                {{-- Kepala Desa --}}
                @can('desa.view')
                    <li class="nav-item {{ request()->is('desa*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('desa.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Icon Kecamatan -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-building-community" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 21v-12l9 -4l9 4v12" />
                                    <path d="M13 13h4v8h-4z" />
                                    <path d="M7 13h4v8h-4z" />
                                </svg>
                            </span>
                            <span class="nav-link-title"> Desa </span>
                        </a>
                    </li>
                @endcan

                {{-- Jabatan --}}
                @can('jabatan.view')
                    <li class="nav-item {{ request()->is('jabatan*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('jabatan.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Icon Jabatan -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-star"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h.5" />
                                    <path
                                        d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411z" />
                                </svg>
                            </span>
                            <span class="nav-link-title"> Jabatan </span>
                        </a>
                    </li>
                @endcan

                {{-- Perangkat Desa --}}
                @can('perangkat_desa.view')
                    <li class="nav-item {{ request()->is('perangkat_desa*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('perangkat_desa.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Icon Perangkat Desa -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-star"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h.5" />
                                    <path
                                        d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411z" />
                                </svg>
                            </span>
                            <span class="nav-link-title"> Perangkat Desa </span>
                        </a>
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
                                {{-- dummy The nested dropdown for Master DDK --}}
                                {{-- <a class="dropdown-item dropdown-toggle {{ request()->is('ddk*') ? 'active' : '' }}"
                                    href="#" data-bs-toggle="dropdown">
                                    Master DDK
                                </a>
                                <ul class="dropdown-menu">
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

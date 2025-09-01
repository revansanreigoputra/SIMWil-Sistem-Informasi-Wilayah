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
        <!-- END NAVBAR LOGO -->
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
                {{-- Kepala Desa --}}
                @can('kepala-desa.view')
                    <li class="nav-item {{ request()->is('kepala-desa*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('kepala-desa.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Icon Kecamatan -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-star">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h.5" />
                                    <path
                                        d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                                </svg>
                            </span>
                            <span class="nav-link-title"> Kecamatan </span>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-1">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-1">
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

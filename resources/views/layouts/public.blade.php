<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimWil - @yield('title', 'Sistem Informasi Wilayah')</title>

    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" id="colors">
    {{-- Menggunakan Font Awesome 6.x (sesuai link Anda) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=swap&subset=latin-ext,vietnamese"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet"
        type="text/css">

    @stack('styles')

    {{-- STYLE UNTUK GALERI --}}
    <style>
        .utf_gallery_container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }

        .utf_gallery_item {
            display: block;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            aspect-ratio: 1 / 1;
            /* Membuat gambar kotak */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .utf_gallery_item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .utf_gallery_item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Gambar memenuhi kotak tanpa distorsi */
        }
    </style>
</head>

<body>

    <div class="preloader">
        <div class="utf-preloader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="main_wrapper">

        <header id="header_part" class="fullwidth">
            <div id="header">
                <div class="container">
                    <div class="utf_left_side">
                        <div id="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/images/logo-dark.png') }}" alt="">
                            </a>
                        </div>
                        <div class="mmenu-trigger">
                            <button class="hamburger utfbutton_collapse" type="button">
                                <span class="utf_inner_button_box">
                                    <span class="utf_inner_section"></span>
                                </span>
                            </button>
                        </div>

                        {{-- Navigasi yang sudah benar --}}
                        <nav id="navigation" class="style_one">
                            <ul id="responsive">
                                <li><a class="{{ request()->routeIs('home') ? 'current' : '' }}"
                                        href="{{ route('home') }}">Home</a></li>
                                <li><a class="{{ request()->routeIs('public.berita.*') ? 'current' : '' }}"
                                        href="{{ route('public.berita.index') }}">Berita</a></li>
                                <li><a class="{{ request()->routeIs('public.galeri.*') ? 'current' : '' }}"
                                        href="{{ route('public.galeri.index') }}">Galeri</a></li>
                                <li><a class="{{ request()->routeIs('public.agenda.index') ? 'current' : '' }}"
                                        href="{{ route('public.agenda.index') }}">Agenda</a></li>
                                <li><a href="#">Kontak</a></li>
                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                    </div>
                    <div class="utf_right_side">
                        <div class="header_widget">
                            <a href="{{ route('login') }}" class="button border">
                                <i class="fa-solid fa-right-to-bracket"></i> Sign In
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="clearfix"></div>

        <main>
            @yield('content')
        </main>

        <div id="footer" class="margin-top-20">
            <div class="container">
                <div class="row">

                    {{-- Kolom 1: Logo & Deskripsi (Lebih Lebar) --}}
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <a href="{{ url('/') }}"><img class="footer-logo"
                                src="{{ asset('frontend/images/logo-dark.png') }}" alt=""></a>
                        <p>Sistem Informasi Wilayah yang memberikan kemudahan bagi anda dalam mengurus segala bentuk
                            urusan.</p>
                    </div>

                    {{-- Kolom 2: Tautan (Lebih Sempit) --}}
                    <div class="col-md-2 col-sm-4 col-xs-12">
                        <h4>Tautan</h4>
                        <ul class="utf_footer_links">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('public.berita.index') }}">Berita</a></li>
                            <li><a href="{{ route('public.galeri.index') }}">Galeri</a></li>
                            <li><a href="{{ route('public.agenda.index') }}">Agenda</a></li>
                        </ul>
                    </div>

                    {{-- Kolom 3: Bantuan --}}
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <h4>Bantuan</h4>
                        <ul class="utf_footer_links">
                            <li><a href="#">Kebijakan Privasi</a></li>
                            <li><a href="#">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>

                    {{-- Kolom 4: Hubungi Kami --}}
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <h4>Hubungi Kami</h4>
                        <ul class="utf_footer_contact_details">
                            <li><i class="fa-solid fa-location-dot"></i> Jl. Contoh No. 123, Yogyakarta</li>
                            <li><i class="fa-solid fa-envelope"></i> Email: info@simwil.go.id</li>
                            <li><i class="fa-solid fa-phone"></i> Telepon: (0274) 123456</li>
                        </ul>
                    </div>
                </div>

                <div class="row margin-top-40" style="padding-bottom: 30px;">
                    <div class="col-md-12">
                        <div class="copyrights text-center">Copyright © {{ date('Y') }} All Rights Reserved.</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="bottom_backto_top"><a href="#"></a></div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('frontend/scripts/chosen.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/rangeslider.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/mmenu.js') }}"></script>
    <script src="{{ asset('frontend/scripts/tooltips.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/color_switcher.js') }}"></script>
    <script src="{{ asset('frontend/scripts/jquery_custom.js') }}"></script>

    <script src="{{ asset('frontend/scripts/extensions/themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/extensions/themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/extensions/revolution.extension.video.min.js') }}"></script>

    @stack('script')

</body>

</html>

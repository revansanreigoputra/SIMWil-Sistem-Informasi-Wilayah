<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimWil - Sistem Informasi Wilayah</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" id="colors">
    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet"
        type="text/css">
</head>

<body>

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="utf-preloader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper -->
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
                        <nav id="navigation" class="style_one">
                            <ul id="responsive">
                                {{-- Ganti link Home yang lama dengan ini --}}
                                <li><a class="{{ request()->routeIs('home') ? 'current' : '' }}"
                                        href="{{ route('home') }}">Home</a></li>
                                {{-- Link ke Halaman Berita Publik --}}
                                <li><a class="{{ request()->routeIs('public.berita.*') ? 'current' : '' }}"
                                        href="{{ route('public.berita.index') }}">Berita</a></li>
                                <li><a class="{{ request()->routeIs('public.galeri.*') ? 'current' : '' }}"
                                        href="{{ route('public.galeri.index') }}">Galeri</a></li>
                                <li><a href="#">Agenda</a></li>
                                <li><a href="#">Kontak</a></li>
                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                    </div>
                    <div class="utf_right_side">
                        <div class="header_widget">
                            <a href="{{ route('login') }}" class="button border">
                                <i class="fa fa-sign-in"></i> Sign In
                            </a>
                        </div>
                    </div>

                    <div id="dialog_signin_part" class="zoom-anim-dialog mfp-hide">
                        <div class="small_dialog_header">
                            <h3>Sign In</h3>
                        </div>
                        <div class="utf_signin_form style_one">
                            <ul class="utf_tabs_nav">
                                <li class=""><a href="#tab1">Log In</a></li>
                                <li><a href="#tab2">Register</a></li>
                            </ul>
                            <div class="tab_container alt">
                                <div class="tab_content" id="tab1" style="display:none;">
                                    <form method="post" class="login">
                                        <p class="utf_row_form utf_form_wide_block">
                                            <label for="username">
                                                <input type="text" class="input-text" name="username" id="username"
                                                    value="" placeholder="Username" />
                                            </label>
                                        </p>
                                        <p class="utf_row_form utf_form_wide_block">
                                            <label for="password">
                                                <input class="input-text" type="password" name="password" id="password"
                                                    placeholder="Password" />
                                            </label>
                                        </p>
                                        <div class="utf_row_form utf_form_wide_block form_forgot_part"> <span
                                                class="lost_password fl_left"> <a href="javascript:void(0);">Forgot
                                                    Password?</a> </span>
                                            <div class="checkboxes fl_right">
                                                <input id="remember-me" type="checkbox" name="check">
                                                <label for="remember-me">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="utf_row_form">
                                            <input type="submit" class="button border margin-top-5" name="login"
                                                value="Login" />
                                        </div>
                                        <div class="utf-login_with my-3">
                                            <span class="txt">Or Login in With</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                <a href="javascript:void(0);" class="social_bt facebook_btn mb-0"><i
                                                        class="fa fa-facebook"></i> Facebook</a>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <a href="javascript:void(0);" class="social_bt google_btn mb-0"><i
                                                        class="fa fa-google"></i> Google</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab_content" id="tab2" style="display:none;">
                                    <form method="post" class="register">
                                        <p class="utf_row_form utf_form_wide_block">
                                            <label for="username2">
                                                <input type="text" class="input-text" name="username"
                                                    id="username2" value="" placeholder="Username" />
                                            </label>
                                        </p>
                                        <p class="utf_row_form utf_form_wide_block">
                                            <label for="email2">
                                                <input type="text" class="input-text" name="email"
                                                    id="email2" value="" placeholder="Email" />
                                            </label>
                                        </p>
                                        <p class="utf_row_form utf_form_wide_block">
                                            <label for="password1">
                                                <input class="input-text" type="password" name="password1"
                                                    id="password1" placeholder="Password" />
                                            </label>
                                        </p>
                                        <p class="utf_row_form utf_form_wide_block">
                                            <label for="password2">
                                                <input class="input-text" type="password" name="password2"
                                                    id="password2" placeholder="Confirm Password" />
                                            </label>
                                        </p>
                                        <input type="submit" class="button border fw margin-top-10" name="register"
                                            value="Register" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="clearfix"></div>

        <div id="utf_rev_slider_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
            data-alias="classicslider1"
            style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <div id="utf_rev_slider_block" class="rev_slider home fullwidthabanner" style="display:none;"
                data-version="5.0.7">
                <ul>
                    <li data-index="rs-1" data-transition="fade" data-slotamount="default"
                        data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="1000"
                        data-rotate="0" data-fstransition="fade" data-fsmasterspeed="800" data-fsslotamount="7"
                        data-saveperformance="off">
                        <img src="{{ asset('frontend/images/search_slider_bg_1.jpg') }}" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            data-bgparallax="10" class="rev-slidebg" data-no-retina data-kenburns="on"
                            data-duration="12000" data-ease="Linear.easeNone" data-scalestart="100"
                            data-scaleend="112" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0"
                            data-offsetend="0 0">
                        <div class="container main_inner_search_block margin-top-100">
                            <div class="main_input_search_part">
                                <div class="main_input_search_part_item">
                                    <input type="text" placeholder="What are you looking for?" value="" />
                                </div>
                                <div class="main_input_search_part_item location">
                                    <input type="text" placeholder="Search Location..." value="" />
                                    <a href="#"><i class="sl sl-icon-location"></i></a>
                                </div>
                                <div class="main_input_search_part_item intro-search-field">
                                    <select data-placeholder="All Categories" class="selectpicker default"
                                        title="All Categories" data-selected-text-format="count" data-size="4">
                                        <option>Resto & Coffe Shop</option>
                                        <option>Taman Bermain</option>
                                        <option>Tempat Ibadah</option>
                                        <option>Tempat Wisata</option>
                                        <option>Sekolah</option>
                                    </select>
                                </div>
                                <button class="button" onclick="window.location.">Search</button>
                            </div>
                        </div>
                        <div class="tp-caption centered utf_custom_caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0"
                            id="utf_slide_layer_item_one" data-x="['center','center','center','center']"
                            data-hoffset="['0']" data-y="['70','30','20','0']" data-voffset="['0']"
                            data-width="['900','620', 640','420','320']" data-height="auto" data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:0;opacity:0;s:1000;e:Power2.easeOutExpo;s:400;e:Power2.easeOutExpo"
                            data-transform_out="" data-mask_in="x:0px;y:[20%];s:inherit;e:inherit;"
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000"
                            data-responsive_offset="on">
                            <div class="utf_item_title margin-bottom-15" id="utf_slide_layer_detail_one"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['20','20','20','20']" data-voffset="['-40','-40','-20','-80']"
                                data-fontsize="['56','46','30','34','22']"
                                data-lineheight="['70','60','34','30','25']"
                                data-width="['960','620', 640','420','320']" data-height="none"
                                data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:-50px;sX:2;sY:2;opacity:0;s:1000;e:Power4.easeOut;"
                                data-transform_out="opacity:0;s:300;" data-start="600" data-splitin="none"
                                data-splitout="none" data-basealign="slide" data-responsive_offset="off"
                                data-responsive="off"
                                style="z-index:6;color:#fff;letter-spacing:0px;font-weight:600;">Cek & Monitoring
                                Status Pengajuan</div>
                            <div class="utf_rev_description_text">SiKAB Sleman - Aplikasi yang akan memberikan
                                kemudahan bagi anda dalam mengurus segala bentuk urusan yang berkaitan dengan
                                pemerintahan daerah secara online.
                            </div>
                            {{-- <a href="#" class="button medium">Selengkapnya</a> --}}
                        </div>
                    </li>

                    <li data-index="rs-2" data-transition="fade" data-slotamount="default"
                        data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="1000"
                        data-rotate="0" data-fstransition="fade" data-fsmasterspeed="800" data-fsslotamount="7"
                        data-saveperformance="off">
                        <img src="{{ asset('frontend/images/search_slider_bg_2.jpg') }}" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            data-bgparallax="10" class="rev-slidebg" data-no-retina data-kenburns="on"
                            data-duration="12000" data-ease="Linear.easeNone" data-scalestart="100"
                            data-scaleend="112" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0"
                            data-offsetend="0 0">
                        <div class="container main_inner_search_block margin-top-100">
                            <div class="main_input_search_part">
                                <div class="main_input_search_part_item">
                                    <input type="text" placeholder="What are you looking for?" value="" />
                                </div>
                                <div class="main_input_search_part_item location">
                                    <input type="text" placeholder="Search Location..." value="" />
                                    <a href="#"><i class="sl sl-icon-location"></i></a>
                                </div>
                                <div class="main_input_search_part_item intro-search-field">
                                    <select data-placeholder="All Categories" class="selectpicker default"
                                        title="All Categories" data-selected-text-format="count" data-size="4">
                                        <option>Resto & Coffe Shop</option>
                                        <option>Taman Bermain</option>
                                        <option>Tempat Ibadah</option>
                                        <option>Tempat Wisata</option>
                                        <option>Sekolah</option>
                                    </select>
                                </div>
                                <button class="button" onclick="window.location.">Search</button>
                            </div>
                        </div>
                        <div class="tp-caption centered utf_custom_caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0"
                            id="utf_slide_layer_item_two" data-x="['center','center','center','center']"
                            data-hoffset="['0']" data-y="['70','30','20','0']" data-voffset="['0']"
                            data-width="['900','620', 640','420','320']" data-height="auto" data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:0;opacity:0;s:1000;e:Power2.easeOutExpo;s:400;e:Power2.easeOutExpo"
                            data-transform_out="" data-mask_in="x:0px;y:[20%];s:inherit;e:inherit;"
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000"
                            data-responsive_offset="on">
                            <div class="utf_item_title margin-bottom-15" id="utf_slide_layer_detail_two"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['20','20','20','20']" data-voffset="['-40','-40','-20','-80']"
                                data-fontsize="['56','42','30','27','22']"
                                data-lineheight="['70','60','34','30','25']"
                                data-width="['960','620', 640','420','320']" data-height="none"
                                data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:-50px;sX:2;sY:2;opacity:0;s:1000;e:Power4.easeOut;"
                                data-transform_out="opacity:0;s:300;" data-start="600" data-splitin="none"
                                data-splitout="none" data-basealign="slide" data-responsive_offset="off"
                                data-responsive="off"
                                style="z-index:6;color:#fff;letter-spacing:0px;font-weight:600;">Cari & Jelajahi Tempat
                                Hits</div>
                            <div class="utf_rev_description_text">SiKAB Sleman - Aplikasi yang akan memberikan
                                kemudahan bagi anda dalam mengurus segala bentuk urusan yang berkaitan dengan
                                pemerintahan daerah secara online.
                            </div>
                            {{-- <a href="#" class="button medium">Selengkapnya</a> --}}
                        </div>
                    </li>

                    <li data-index="rs-3" data-transition="fade" data-slotamount="default"
                        data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="1000"
                        data-rotate="0" data-fstransition="fade" data-fsmasterspeed="800" data-fsslotamount="7"
                        data-saveperformance="off">
                        <img src="{{ asset('frontend/images/search_slider_bg_3.jpg') }}" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            data-bgparallax="10" class="rev-slidebg" data-no-retina data-kenburns="on"
                            data-duration="12000" data-ease="Linear.easeNone" data-scalestart="100"
                            data-scaleend="112" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0"
                            data-offsetend="0 0">
                        <div class="container main_inner_search_block margin-top-100">
                            <div class="main_input_search_part">
                                <div class="main_input_search_part_item">
                                    <input type="text" placeholder="What are you looking for?" value="" />
                                </div>
                                <div class="main_input_search_part_item location">
                                    <input type="text" placeholder="Search Location..." value="" />
                                    <a href="#"><i class="sl sl-icon-location"></i></a>
                                </div>
                                <div class="main_input_search_part_item intro-search-field">
                                    <select data-placeholder="All Categories" class="selectpicker default"
                                        title="All Categories" data-selected-text-format="count" data-size="4">
                                        <option>Resto & Coffe Shop</option>
                                        <option>Taman Bermain</option>
                                        <option>Tempat Ibadah</option>
                                        <option>Tempat Wisata</option>
                                        <option>Sekolah</option>
                                    </select>
                                </div>
                                <button class="button" onclick="window.location.">Search</button>
                            </div>
                        </div>
                        <div class="tp-caption centered utf_custom_caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0"
                            id="utf_slide_layer_item_three" data-x="['center','center','center','center']"
                            data-hoffset="['0']" data-y="['70','30','20','0']" data-voffset="['0']"
                            data-width="['900','620', 640','420','320']" data-height="auto" data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:0;opacity:0;s:1000;e:Power2.easeOutExpo;s:400;e:Power2.easeOutExpo"
                            data-transform_out="" data-mask_in="x:0px;y:[20%];s:inherit;e:inherit;"
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000"
                            data-responsive_offset="on">
                            <div class="utf_item_title margin-bottom-15" id="utf_slide_layer_detail_three"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['20','20','20','20']" data-voffset="['-40','-40','-20','-80']"
                                data-fontsize="['56','46','30','30','22']"
                                data-lineheight="['70','60','34','30','25']"
                                data-width="['960','620', 640','420','320']" data-height="none"
                                data-whitespace="normal" data-transform_idle="o:1;"
                                data-transform_in="y:-50px;sX:2;sY:2;opacity:0;s:1000;e:Power4.easeOut;"
                                data-transform_out="opacity:0;s:300;" data-start="600" data-splitin="none"
                                data-splitout="none" data-basealign="slide" data-responsive_offset="off"
                                data-responsive="off"
                                style="z-index:6;color:#fff;letter-spacing:0px;font-weight:600;">Cari & Jelajahi
                                Informasi Terupdate</div>
                            <div class="utf_rev_description_text">SiKAB Sleman - Aplikasi yang akan memberikan
                                kemudahan bagi anda dalam mengurus segala bentuk urusan yang berkaitan dengan
                                pemerintahan daerah secara online.
                            </div>
                            {{-- <a href="#" class="button medium">Selengkapnya</a> --}}
                        </div>
                    </li>
                </ul>
                <div class="tp-static-layers"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline_part centered margin-top-75">
                        SHORTCUT SURAT
                        <span>Daftar shortcut pengajuan berbagai jenis surat ijin, permohonan, keterangan maupun
                            pengantar</span>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="container_categories_box margin-top-5 margin-bottom-30">
                        <a href="#" class="utf_category_small_box_part">
                            <i class="im im-icon-File-ClipboardFileText"></i>
                            <h4 style="margin-bottom:0">SPBB</h4>
                            <p style="margin-bottom:0">SP Berkelakuan Baik</p>
                            <span>01</span>
                        </a>
                        <a href="#" class="utf_category_small_box_part">
                            <i class="im im-icon-File-ClipboardFileText"></i>
                            <h4 style="margin-bottom:0">SPT</h4>
                            <p style="margin-bottom:0">Surat Penghibaan Tanah</p>
                            <span>02</span>
                        </a>
                        <a href="#" class="utf_category_small_box_part">
                            <i class="im im-icon-File-ClipboardFileText"></i>
                            <h4 style="margin-bottom:0">SKU</h4>
                            <p style="margin-bottom:0">Surat Keterangan Umum</p>
                            <span>03</span>
                        </a>
                        <a href="#" class="utf_category_small_box_part">
                            <i class="im im-icon-File-ClipboardFileText"></i>
                            <h4 style="margin-bottom:0">SRRT</h4>
                            <p style="margin-bottom:0">Surat Rekomendasi RT</p>
                            <span>04</span>
                        </a>
                        <a href="#" class="utf_category_small_box_part">
                            <i class="im im-icon-File-ClipboardFileText"></i>
                            <h4 style="margin-bottom:0">STM</h4>
                            <p style="margin-bottom:0">Surat Keterangan Tidak Mampu</p>
                            <span>05</span>
                        </a>
                        <a href="#" class="utf_category_small_box_part">
                            <i class="im im-icon-File-ClipboardFileText"></i>
                            <h4 style="margin-bottom:0">SKBPN</h4>
                            <p style="margin-bottom:0">Surat Keterangan Belum Pernah Nikah</p>
                            <span>06</span>
                        </a>
                        <a href="#" class="utf_category_small_box_part">
                            <i class="im im-icon-File-ClipboardFileText"></i>
                            <h4 style="margin-bottom:0">SKD</h4>
                            <p style="margin-bottom:0">Surat Keterangan Domisili</p>
                            <span>07</span>
                        </a>
                        <a href="#" class="utf_category_small_box_part">
                            <i class="im im-icon-File-ClipboardFileText"></i>
                            <h4 style="margin-bottom:0">SKKTP</h4>
                            <p style="margin-bottom:0">Surat Keterangan Kehilangan Kartu Tanda Penduduk (KTP)</p>
                            <span>08</span>
                        </a>
                        <a href="#" class="utf_category_small_box_part">
                            <i class="im im-icon-File-ClipboardFileText"></i>
                            <h4 style="margin-bottom:0">SRIMB</h4>
                            <p style="margin-bottom:0">Surat Rekomendasi Ijin Mendirikan Bangunan</p>
                            <span>09</span>
                        </a>
                        <a href="#" class="utf_category_small_box_part">
                            <i class="im im-icon-File-ClipboardFileText"></i>
                            <h4 style="margin-bottom:0">SRIT</h4>
                            <p style="margin-bottom:0">Surat Rekomendasi Ijin Tempat</p>
                            <span>10</span>
                        </a>
                    </div>
                    <div class="col-md-12 centered_content">
                        <a href="#" class="button border margin-top-20">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="fullwidth_block padding-top-75 padding-bottom-75">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="headline_part centered margin-bottom-50">
                            BERITA TERBARU
                            <span>Berita seputar Kabupaten Sleman</span>
                        </h3>
                    </div>
                </div>
                <div class="row">

                    @forelse ($beritas as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ route('public.berita.show', $item->slug) }}"
                                class="blog_compact_part-container">
                                <div class="blog_compact_part">
                                    <img src="{{ asset('storage/foto_berita/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}">
                                    <div class="blog_compact_part_content">
                                        <h3>{{ $item->judul }}</h3>
                                        <ul class="blog_post_tag_part">
                                            <li>{{ $item->created_at->isoFormat('D MMMM YYYY') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <p class="text-center">Belum ada berita terbaru yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                    <div class="col-md-12 centered_content">
                        <a href="{{ route('public.berita.index') }}" class="button border margin-top-20">
                            Berita Selengkapnya
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <section class="utf_cta_area_item utf_cta_area2_block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="utf_subscribe_block clearfix">
                            <div class="col-md-8 col-sm-7">
                                <div class="section-heading">
                                    <h2 class="utf_sec_title_item utf_sec_title_item2">Subscribe to Newsletter!</h2>
                                    <p class="utf_sec_meta">
                                        Subscribe to get latest updates and information.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <span class="la la-envelope-o"></span>
                                        <input class="form-control" type="email" placeholder="Enter your email"
                                            required="">
                                        <button class="utf_theme_btn" type="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <div id="footer" class="footer_sticky_part">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <h4>Link Rekomendasi</h4>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <h4>Akun Saya</h4>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <h4>Informasi</h4>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <h4>Bantuan</h4>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <h4>Tentang SIKAB</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="footer_copyright_part">Copyright © 2025 All Rights Reserved.</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bottom_backto_top"><a href="#"></a></div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('frontend/scripts/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/chosen.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/rangeslider.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/mmenu.js') }}"></script>
    <script src="{{ asset('frontend/scripts/tooltips.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/color_switcher.js') }}"></script>
    <script src="{{ asset('frontend/scripts/jquery_custom.js') }}"></script>

    <script>
        var tpj = jQuery;
        var revapi4;
        tpj(document).ready(function() {
            if (tpj("#utf_rev_slider_block").revolution == undefined) {
                revslider_showDoubleJqueryError("#utf_rev_slider_block");
            } else {
                revapi4 = tpj("#utf_rev_slider_block").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "scripts/",
                    sliderLayout: "auto",
                    dottedOverlay: "none",
                    delay: 6000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "on",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "zeus",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '<div class="tp-title-wrap"></div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 40,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 40,
                                v_offset: 0
                            }
                        },
                        bullets: {
                            enable: false,
                            hide_onmobile: true,
                            hide_under: 600,
                            style: "hermes",
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 30,
                            space: 6,
                            tmp: ''
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%"
                    },
                    responsiveLevels: [1200, 992, 768, 480],
                    visibilityLevels: [1200, 992, 768, 480],
                    gridwidth: [1180, 1024, 778, 480],
                    gridheight: [565, 900, 800, 800],
                    lazyType: "none",
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 2200,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 25, 47, 48, 49, 50, 51, 55],
                        type: "mouse",
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        });
    </script>
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
</body>

</html>

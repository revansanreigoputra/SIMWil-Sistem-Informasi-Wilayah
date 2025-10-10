<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | {{ $websiteSetting?->website_name ?? 'SimWil' }}</title>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
            background-color: #f0f4f9;
            margin: 0;
            overflow-x: hidden;
        }

        .auth-wrapper {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        /* Lapisan Background Baru */
        .auth-background {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            /* Paling Bawah */
            background-image: url("{{ asset('asset/images/auth-one-bg.jpg') }}");
            background-size: cover;
            background-position: center 70%;
        }

        /* Bagian atas background bergelombang (Wadah Utama) */
        .auth-top-section {
            height: 75vh;
            position: relative;
            color: white;
            clip-path: url(#wave-clip-new);
            -webkit-clip-path: url(#wave-clip-new);
        }

        /* Lapisan untuk efek partikel dan gambar background */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            /* background-image: url("{{ asset('asset/images/auth-one-bg.jpg') }}");
            background-size: cover;
            background-position: center 38%; */
        }

        /* Lapisan Overlay Gelap */
        .auth-top-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        /* Header Teks (Logo, dll) */
        .auth-header {
            position: relative;
            z-index: 3;
            text-align: center;
            text-shadow: 1px 2px 4px rgba(0, 0, 0, 0.5);
            width: 100%;
            padding-top: 8vh;
        }

        .auth-header h1 {
            font-weight: 800;
            font-size: 3rem;
            letter-spacing: 1px;
        }

        .auth-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Container form */
        .auth-form-container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 1.5rem;
            border-radius: 14px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
            margin: -45vh auto 0;
            /* Ubah dari -14vh menjadi -45vh */
            position: relative;
            z-index: 10;
            /* margin-top: -280px; */
            /* Naikkan juga untuk versi mobile */
        }

        .auth-form-container h3 {
            font-weight: 700;
            font-size: 1.15rem;
        }

        /* -- SISA CSS ANDA (SUDAH BENAR) -- */
        .form-group-with-icon {
            position: relative;
            margin-bottom: 1.10rem;
        }

        .form-group-with-icon .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1rem;
            z-index: 3;
        }

        .form-group-with-icon .form-control,
        .form-group-with-icon .form-select {
            padding-left: 45px;
            height: 3.2rem;
            border-radius: 8px;
            border: 1px solid #ced4da;
            font-size: 0.95rem;
        }

        .form-floating label {
            padding-left: 45px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 0.2rem rgba(22, 163, 74, 0.2);
        }

        .btn-submit {
            background-color: #16a34a;
            border: none;
            color: white;
            padding: 11px;
            border-radius: 8px;
            font-weight: 700;
            transition: 0.2s;
        }

        .btn-submit:hover {
            background-color: #15803d;
            transform: translateY(-1px);
        }

        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            color: #4a5568;
            font-size: 0.9rem;
        }

        .auth-footer a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        .link-forgot-password {
            font-size: 0.9rem;
            color: #4a5568;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s ease-in-out;
        }

        .link-forgot-password:hover {
            color: #16a34a;
        }

        @media (max-width: 576px) {
            .auth-header h1 {
                font-size: 2.2rem;
            }

            .auth-form-container {
                margin-top: -150px;
                padding: 1.5rem;
            }
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px white inset !important;
            box-shadow: 0 0 0 30px white inset !important;
            -webkit-text-fill-color: #212529 !important;
        }

        #particles-js canvas {
            filter: drop-shadow(0 0 1px #ffffff);
        }
    </style>

</head>

<body>
    <!-- SVG Wave -->
    <svg style="position: absolute; width: 0; height: 0;" xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
            <clipPath id="wave-clip-new" clipPathUnits="objectBoundingBox">
                <path d="M 0,0.7 Q 0.5,0.9 1,0.7 L 1,0 L 0,0 Z"></path>
            </clipPath>
        </defs>
    </svg>

    <div class="auth-wrapper">
        <!-- BAGIAN ATAS -->
        <div class="auth-top-section">
            <div class="auth-background"></div>
            <div id="particles-js"></div>
            <div class="auth-header">
                <h1>SimWil</h1>
                <p>Sistem Informasi Wilayah</p>
            </div>
        </div>

        <!-- FORM LOGIN -->
        <div class="auth-form-container">
            <div class="text-center mb-4">
                <h3>Welcome Back!</h3>
                <p class="text-muted" style="font-size: 0.95rem;">Silakan login ke akun SimWil Anda</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group-with-icon">
                    <i class="fa fa-user form-icon"></i>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" placeholder="Email atau Username" required autofocus>
                        <label for="email">Email atau Username</label>
                    </div>
                </div>

                <div class="form-group-with-icon">
                    <i class="fa fa-map-marker-alt form-icon"></i>

                    <select name="desa_id" id="desa_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Desa</option>

                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group-with-icon">
                    <i class="fa fa-lock form-icon"></i>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember" style="font-size: 0.9rem;">Ingat Saya</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="link-forgot-password">Lupa Password?</a>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-submit">Masuk</button>
                </div>
            </form>
        </div>
        <div class="auth-footer">
            <p>Belum punya akun? <a href="#">Daftar di sini</a></p>
            <p class="text-muted mt-2" style="font-size: 0.85rem;">
                &copy; {{ date('Y') }} SimWil. All Rights Reserved.
            </p>
        </div>
    </div>
</body>
<script>
    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 105, // Jumlah partikel
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff" // Warna partikel
            },
            "shape": {
                "type": "circle"
            },
            "opacity": {
                "value": 0.5, // Nilai awal (bisa diabaikan jika anim diaktifkan)
                "random": true,
                "anim": {
                    "enable": true, // AKTIFKAN animasi opacity
                    "speed": 0.4, // Kecepatan kelip (semakin kecil, semakin lambat)
                    "opacity_min": 0.1, // Tingkat transparansi minimum (hampir hilang)
                    "sync": false // Buat setiap partikel berkelip sendiri-sendiri
                }
            },
            "size": {
                "value": 3, // Ukuran partikel
                "random": true
            },
            "line_linked": {
                "enable": false // Tidak ada garis antar partikel
            },
            "move": {
                "enable": true,
                "speed": 1.2, // Kecepatan gerak
                "direction": "none",
                "random": true,
                "straight": false,
                "out_mode": "out",
                "bounce": false
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": false
                },
                "onclick": {
                    "enable": false
                },
                "resize": true
            }
        },
        "retina_detect": true
    });
</script>

</html>

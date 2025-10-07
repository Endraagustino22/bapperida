<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bapperida - Sistem Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4fbff;
            color: #0d3b66;
        }

        /* Navbar */
        .navbar {
            background: #0046FF;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 600;
            color: white !important;
            font-size: 1.4rem;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-link:hover {
            opacity: 0.8;
        }

        /* Hero section */
        .hero {
            padding: 80px 0;
            border-radius: 20px;
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.1);
            margin-top: 30px;
        }

        .hero h1 {
            font-weight: 700;
            color: #004b8d;
        }

        .hero p {
            font-size: 1.1rem;
            color: #0d3b66;
        }

        .hero img {
            width: 50%;
            max-width: 400px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Card section */
        .card {
            border: none;
            border-radius: 16px;
            transition: all 0.4s ease;
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.1);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.2);
        }

        .card-body {
            padding: 30px;
        }

        .card-title {
            color: #004b8d;
            font-weight: 600;
        }

        .btn-custom {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
        }

        /* Footer */
        footer {
            background: #0046FF;
            color: white;
            padding: 30px 0;
            margin-top: 80px;
            text-align: center;
        }

        footer p {
            margin: 0;
            opacity: 0.9;
        }

        footer a {
            color: #ffffff;
            text-decoration: underline;
            font-weight: 500;
        }

        footer a:hover {
            color: #e0f3ff;
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('title', 'Edit Pendaftaran Magang')

    @section('content')

    <!-- Hero Section -->
    <div class="container hero text-center text-lg-start">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h1>Selamat Datang di Sistem Pendaftaran Bapperida</h1>
                <p class="mt-3">Platform digital untuk mengelola pendaftaran <strong>Magang</strong>, <strong>Penelitian</strong>, dan <strong>Kuliah Kerja Nyata (KKN)</strong> secara online dengan mudah dan cepat.</p>
                <a href="#menu" class="btn btn-primary btn-custom mt-3">Mulai Sekarang</a>
            </div>
            <div class="col-lg-5 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/4840/4840759.png" alt="Ilustrasi Bapperida">
            </div>
        </div>
    </div>

    <!-- Card Section -->
    <div class="container my-5" id="menu">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Pilih Jenis Pendaftaran</h2>
            <p class="text-muted">Silakan pilih program sesuai kebutuhan Anda.</p>
        </div>

        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Pendaftaran Magang</h4>
                        <p class="card-text mb-4">Daftarkan diri Anda untuk program magang di lingkungan Bapperida.</p>
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary btn-custom">Login untuk Daftar</a>
                        @else
                            <a href="{{ route('magang.index') }}" class="btn btn-primary btn-custom">Daftar Magang</a>
                        @endguest
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Pendaftaran Penelitian</h4>
                        <p class="card-text mb-4">Ajukan proposal penelitian Anda secara daring dengan mudah.</p>
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-success btn-custom">Login untuk Daftar</a>
                        @else
                            <a href="{{ route('penelitian.index') }}" class="btn btn-success btn-custom">Daftar Penelitian</a>
                        @endguest
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Pendaftaran KKN</h4>
                        <p class="card-text mb-4">Ikuti program Kuliah Kerja Nyata secara online dan terintegrasi.</p>
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-warning btn-custom text-white">Login untuk Daftar</a>
                        @else
                            <a href="{{ route('kkn.index') }}" class="btn btn-warning btn-custom text-white">Daftar KKN</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

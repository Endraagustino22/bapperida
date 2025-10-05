<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bapperida')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f8fafc;
            color: #333;
            padding-top: 70px;
            font-family: "Poppins", sans-serif;
        }

        .navbar {
            background: #0046FF;
        }

        .navbar-brand {
            font-weight: 600;
            color: #fff !important;
            letter-spacing: 0.5px;
        }

        .navbar-nav .nav-link {
            color: #f8f9fa !important;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffe082 !important;
        }

        .btn-logout {
            border-color: #ffc107;
            color: #fff;
        }

        .btn-logout:hover {
            background-color: #ffc107;
            color: #212529;
        }

        .content-wrapper {
            max-width: 1100px;
            margin: 0 auto;
        }

        .card-content {
            background: #fff;
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }

        .footer {
            background: #ffffff;
            border-top: 1px solid #dee2e6;
            padding: 15px 0;
            text-align: center;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .alert {
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Bapperida</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-light rounded"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-warning text-dark px-3 py-1" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <span class="nav-link">Halo, <strong>{{ Auth::user()->name }}</strong></span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-logout ms-lg-2 px-3 py-1">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <!-- Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3 shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mt-5">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} <strong>Bapperida</strong>. All Rights Reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>

</html>

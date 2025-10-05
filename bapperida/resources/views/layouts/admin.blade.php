<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Bapperida')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: "Segoe UI", sans-serif;
            background-color: #eef3f9;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: #0d6efd;
            color: #fff;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            text-align: center;
            padding: 20px;
            background: #0b5ed7;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-header h4 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .nav-link {
            color: #e0e7ff;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            transition: all 0.2s ease-in-out;
        }

        .nav-link i {
            margin-right: 10px;
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: #5aa5f0;
            color: #fff;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 15px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-footer button {
            width: 100%;
            font-size: 0.9rem;
        }

        /* Content */
        .content {
            flex-grow: 1;
            padding: 30px;
            background: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .card-header {
            border-radius: 12px 12px 0 0;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4><i class="bi bi-speedometer2 me-2"></i>Admin Bapperida</h4>
        </div>

        <nav class="nav flex-column mt-3">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
            <a href="{{ route('admin.magang.index') }}" class="nav-link {{ request()->routeIs('admin.magang.*') ? 'active' : '' }}">
                <i class="bi bi-briefcase-fill"></i> Data Magang
            </a>
            <a href="{{ route('admin.penelitian.index') }}" class="nav-link {{ request()->routeIs('admin.penelitian.*') ? 'active' : '' }}">
                <i class="bi bi-journal-text"></i> Data Penelitian
            </a>
            <a href="{{ route('admin.kkn.index') }}" class="nav-link {{ request()->routeIs('admin.kkn.*') ? 'active' : '' }}">
                <i class="bi bi-building"></i> Data KKN
            </a>
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Manajemen User
            </a>
            <a href="{{ route('admin.pengumuman.index') }}" class="nav-link {{ request()->routeIs('admin.pengumuman.*') ? 'active' : '' }}">
                <i class="bi bi-megaphone-fill"></i> Pengumuman
            </a>
        </nav>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-light btn-sm d-flex align-items-center justify-content-center text-primary fw-semibold">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Bapperida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            flex-shrink: 0;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background: #f8f9fa;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center py-3 border-bottom">Admin Bapperida</h4>
        <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
        <a href="{{ route('admin.magang.index') }}">👨‍💻 Data Magang</a>
        <a href="{{ route('admin.penelitian.index') }}">📑 Data Penelitian</a>
        <a href="{{ route('admin.kkn.index') }}">🏫 Data KKN</a>
        <a href="{{ route('admin.users.index') }}">👥 Manajemen User</a>
        <a href="{{ route('admin.pengumuman.index') }}">📢 Pengumuman</a>
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button class="btn btn-danger w-100">Logout</button>
        </form>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

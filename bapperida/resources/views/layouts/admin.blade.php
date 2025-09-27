<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Bapperida</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> <!-- atau AdminLTE CSS -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Bapperida</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.magang.index') }}">Data Magang</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.penelitian.index') }}">Data
                        Penelitian</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.kkn.index') }}">Data KKN</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">Manajemen User</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.pengumuman.index') }}">Pengumuman</a>
                </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

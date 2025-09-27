<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bapperida - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <div class="text-center my-5">
            <h1 class="mb-3">Selamat Datang di Sistem Pendaftaran Bapperida</h1>
            <p class="lead">Silakan pilih menu pendaftaran sesuai kebutuhan Anda.</p>
        </div>

        <div class="row text-center">
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Pendaftaran Magang</h4>
                        <p class="card-text">Daftarkan diri Anda untuk program magang.</p>
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Daftar</a>
                        @else
                            <a href="{{ route('magang.index') }}" class="btn btn-primary">Daftar Magang</a>
                        @endguest
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Pendaftaran Penelitian</h4>
                        <p class="card-text">Ajukan proposal penelitian Anda secara online.</p>
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-success">Login untuk Daftar</a>
                        @else
                            <a href="{{ route('penelitian.index') }}" class="btn btn-success">Daftar Penelitian</a>
                        @endguest
                    </div>
                </div>
            </div>


            {{-- <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Pendaftaran KKN</h4>
                        <p class="card-text">Ikuti program Kuliah Kerja Nyata.</p>
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-warning">Login untuk Daftar</a>
                        @else
                            <a href="{{ route('kkn.index') }}" class="btn btn-warning">Daftar KKN</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div> --}}


            <div class="text-center mt-4">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-success">Register</a>
                @else
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Logout</button>
                    </form>
                @endguest
            </div>
        </div>

</body>

</html>

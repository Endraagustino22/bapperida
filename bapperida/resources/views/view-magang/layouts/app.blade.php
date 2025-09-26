<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Magang Bapperida Pekalongan</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body class="flex flex-col min-h-screen bg-gradient-to-br from-gray-100 via-gray-200 to-gray-100 text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-blue-600 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4 py-3">
            <a href="{{ url('/') }}" class="text-white font-bold text-lg">
                Bapperida Pekalongan
            </a>

            {{-- Menu --}}
            <div class="flex items-center space-x-6">
                @auth
                    @if(Auth::user()->role === 'peserta')
                        <a href="{{ route('pendaftaran.create') }}" class="text-white hover:text-gray-200">Daftar Magang</a>
                        <a href="{{ route('peserta.status') }}" class="text-white hover:text-gray-200">Status</a>
                    @elseif(Auth::user()->role === 'admin')
                        <a href="{{ url('/admin/dashboard') }}" class="text-white hover:text-gray-200">Dashboard Admin</a>
                    @endif
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                    <a href="#" class="text-white hover:text-gray-200"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Login</a>
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="text-white hover:text-gray-200">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    {{-- Alert --}}
    <div class="container mx-auto mt-4 px-4">
        @if (session('success'))
            <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 text-red-800 bg-red-100 border border-red-300 rounded-lg">
                {{ session('error') }}
            </div>
        @endif
    </div>

    {{-- Content --}}
    <main class="flex-grow py-6">
        <div class="container mx-auto px-4">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-100 border-t py-4">
        <div class="container mx-auto text-center text-gray-600">
            &copy; {{ date('Y') }} Bapperida Pekalongan - Sistem Pendaftaran Magang
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

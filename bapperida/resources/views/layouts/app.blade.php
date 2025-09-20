<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'BAPPERIDA')</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

  <!-- Header -->
  <header class="bg-blue-900 text-white shadow-lg">
    <div class="container mx-auto flex justify-between items-center p-4">
      <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Bapperida" class="h-12">
        <h1 class="text-xl font-bold">BAPPERIDA</h1>
      </div>
      <nav class="space-x-6 hidden md:block">
        <a href="{{ route('home') }}" class="hover:text-yellow-300">Beranda</a>
        <a href="{{ route('profil') }}" class="hover:text-yellow-300">Profil</a>
        <a href="{{ route('dokumen') }}" class="hover:text-yellow-300">Dokumen</a>
        <a href="{{ route('riset') }}" class="hover:text-yellow-300">Riset & Inovasi</a>
        <a href="{{ route('layanan') }}" class="hover:text-yellow-300">Layanan</a>
        <a href="{{ route('berita') }}" class="hover:text-yellow-300">Berita</a>
        <a href="{{ route('kontak') }}" class="hover:text-yellow-300">Kontak</a>
      </nav>
    </div>
  </header>

  <!-- Konten Halaman -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-blue-800 text-white text-center py-4 mt-10">
    <p>&copy; {{ date('Y') }} BAPPERIDA. All Rights Reserved.</p>
  </footer>

</body>
</html>

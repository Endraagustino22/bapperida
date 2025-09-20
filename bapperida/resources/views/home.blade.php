@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-blue-900 to-blue-600 text-white text-center py-20">
    <h2 class="text-4xl font-bold mb-4">Badan Perencanaan, Riset, dan Inovasi Daerah</h2>
    <p class="text-lg">Mendukung pembangunan daerah melalui perencanaan strategis, riset, dan inovasi.</p>
  </section>

  <!-- Profil -->
  <section id="profil" class="container mx-auto py-12 px-6">
    <h3 class="text-2xl font-bold text-blue-900 mb-6">Profil</h3>
    <p>BAPPERIDA memiliki tugas menyusun rencana pembangunan daerah, melaksanakan penelitian, serta mendorong inovasi daerah.</p>
  </section>

  <!-- Dokumen -->
  <section id="dokumen" class="bg-white py-12 px-6">
    <div class="container mx-auto">
      <h3 class="text-2xl font-bold text-blue-900 mb-6">Dokumen Perencanaan</h3>
      <ul class="list-disc list-inside space-y-2">
        <li><a href="#" class="text-blue-700 hover:underline">RPJPD</a></li>
        <li><a href="#" class="text-blue-700 hover:underline">RPJMD</a></li>
        <li><a href="#" class="text-blue-700 hover:underline">RKPD</a></li>
        <li><a href="#" class="text-blue-700 hover:underline">Kajian & Studi</a></li>
      </ul>
    </div>
  </section>

  <!-- Riset & Inovasi -->
  <section id="riset" class="container mx-auto py-12 px-6">
    <h3 class="text-2xl font-bold text-blue-900 mb-6">Riset & Inovasi</h3>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white p-4 shadow rounded">
        <h4 class="font-bold">Penelitian Daerah</h4>
        <p class="text-sm">Kajian ilmiah untuk mendukung kebijakan berbasis data.</p>
      </div>
      <div class="bg-white p-4 shadow rounded">
        <h4 class="font-bold">Inovasi Daerah</h4>
        <p class="text-sm">Program inovasi untuk meningkatkan pelayanan publik.</p>
      </div>
      <div class="bg-white p-4 shadow rounded">
        <h4 class="font-bold">Kolaborasi</h4>
        <p class="text-sm">Kerja sama dengan universitas, lembaga penelitian, dan komunitas.</p>
      </div>
    </div>
  </section>

  <!-- Layanan -->
  <section id="layanan" class="bg-white py-12 px-6">
    <div class="container mx-auto">
      <h3 class="text-2xl font-bold text-blue-900 mb-6">Layanan Publik</h3>
      <div class="grid md:grid-cols-2 gap-6">
        <div class="p-4 bg-gray-50 shadow rounded">
          <h4 class="font-bold">Izin Penelitian</h4>
          <p class="text-sm">Pengajuan izin penelitian bagi akademisi dan lembaga.</p>
        </div>
        <div class="p-4 bg-gray-50 shadow rounded">
          <h4 class="font-bold">Usulan Inovasi</h4>
          <p class="text-sm">Formulir pengajuan ide inovasi masyarakat.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Berita -->
  <section id="berita" class="container mx-auto py-12 px-6">
    <h3 class="text-2xl font-bold text-blue-900 mb-6">Berita & Agenda</h3>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white shadow rounded p-4">
        <img src="{{ asset('images/berita1.jpg') }}" alt="Berita 1" class="mb-3 rounded">
        <h4 class="font-bold">Kegiatan Musrenbang</h4>
        <p class="text-sm">Diskusi bersama masyarakat untuk menyusun RKPD.</p>
      </div>
      <div class="bg-white shadow rounded p-4">
        <img src="{{ asset('images/berita2.jpg') }}" alt="Berita 2" class="mb-3 rounded">
        <h4 class="font-bold">Inovasi Baru</h4>
        <p class="text-sm">Peluncuran aplikasi monitoring pembangunan daerah.</p>
      </div>
      <div class="bg-white shadow rounded p-4">
        <img src="{{ asset('images/berita3.jpg') }}" alt="Berita 3" class="mb-3 rounded">
        <h4 class="font-bold">Seminar Riset</h4>
        <p class="text-sm">Kolaborasi dengan universitas lokal dalam penelitian.</p>
      </div>
    </div>
  </section>

  <!-- Kontak -->
  <section id="kontak" class="bg-blue-900 text-white py-12 px-6">
    <div class="container mx-auto text-center">
      <h3 class="text-2xl font-bold mb-6">Kontak Kami</h3>
      <p>Email: info@bapperida.go.id | Telp: (021) 123456</p>
      <p>Jl. Contoh No. 123, Kota, Provinsi</p>
    </div>
  </section>

@endsection

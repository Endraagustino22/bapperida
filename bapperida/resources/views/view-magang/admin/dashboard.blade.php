@extends('view-magang.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Judul --}}
    <div class="mb-8 border-b border-gray-200 pb-4">
        <h1 class="text-2xl font-bold text-blue-700">Dashboard Admin</h1>
        <p class="mt-1 text-sm text-gray-500">Ringkasan data peserta magang dan menu cepat.</p>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Peserta -->
        <div class="rounded-xl bg-blue-600 p-6 shadow-md text-white">
            <h5 class="text-sm font-medium">Total Peserta</h5>
            <p class="mt-2 text-3xl font-bold">{{ $totalPeserta }}</p>
        </div>

        <!-- Diterima -->
        <div class="rounded-xl bg-green-600 p-6 shadow-md text-white">
            <h5 class="text-sm font-medium">Diterima</h5>
            <p class="mt-2 text-3xl font-bold">{{ $diterima }}</p>
        </div>

        <!-- Ditolak -->
        <div class="rounded-xl bg-red-600 p-6 shadow-md text-white">
            <h5 class="text-sm font-medium">Ditolak</h5>
            <p class="mt-2 text-3xl font-bold">{{ $ditolak }}</p>
        </div>

        <!-- Menunggu -->
        <div class="rounded-xl bg-yellow-500 p-6 shadow-md text-white">
            <h5 class="text-sm font-medium">Menunggu</h5>
            <p class="mt-2 text-3xl font-bold">{{ $menunggu }}</p>
        </div>
    </div>

    {{-- Menu Cepat --}}
    <div class="mt-10">
        <h4 class="text-lg font-semibold text-gray-800 mb-4">Menu Cepat</h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('admin.peserta.index') }}"
               class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm transition hover:shadow-md hover:border-blue-500">
                <h5 class="text-blue-600 font-medium">Kelola Peserta Magang</h5>
                <p class="mt-1 text-sm text-gray-500">Lihat dan kelola data pendaftaran peserta magang.</p>
            </a>
            <a href="{{ route('admin.pengumuman.index') }}"
               class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm transition hover:shadow-md hover:border-blue-500">
                <h5 class="text-blue-600 font-medium">Kelola Pengumuman</h5>
                <p class="mt-1 text-sm text-gray-500">Tambahkan, ubah, atau hapus pengumuman magang.</p>
            </a>
        </div>
    </div>
</div>
@endsection

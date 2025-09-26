@extends('view-magang.layouts.app')

@section('title', 'Dashboard Peserta')

@section('content')
<div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="mb-8 text-2xl font-semibold text-gray-800">Dashboard Peserta</h2>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
        {{-- Kartu status pendaftaran --}}
        <div class="rounded-xl bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <h5 class="mb-3 text-lg font-semibold text-gray-800">Status Pendaftaran</h5>
            <p class="mb-4">
                @if($pesertaMagang)
                    <span class="inline-flex items-center rounded-full px-3 py-1 text-sm font-medium
                        @if($pesertaMagang->status == 'diterima') bg-green-100 text-green-700
                        @elseif($pesertaMagang->status == 'ditolak') bg-red-100 text-red-700
                        @else bg-yellow-100 text-yellow-700 @endif">
                        {{ ucfirst($pesertaMagang->status) }}
                    </span>
                @else
                    <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-600">
                        Belum mendaftar
                    </span>
                @endif
            </p>

            @if(!$pesertaMagang)
                <a href="{{ route('pendaftaran.create') }}"
                   class="inline-block rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-blue-700">
                    Daftar Magang
                </a>
            @else
                <a href="{{ route('peserta.status') }}"
                   class="inline-block rounded-lg border border-blue-600 px-4 py-2 text-sm font-medium text-blue-600 transition hover:bg-blue-50">
                    Lihat Detail
                </a>
            @endif
        </div>

        {{-- Kartu pengumuman terbaru --}}
        <div class="rounded-xl bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <h5 class="mb-3 text-lg font-semibold text-gray-800">Pengumuman Terbaru</h5>
            @if(isset($pengumuman) && $pengumuman)
                <p class="mb-4 text-gray-700 line-clamp-2">{{ $pengumuman->judul }}</p>
                <a href="{{ route('pengumuman.show', $pengumuman->id) }}"
                   class="inline-block rounded-lg border border-blue-600 px-4 py-2 text-sm font-medium text-blue-600 transition hover:bg-blue-50">
                    Baca Selengkapnya
                </a>
            @else
                <p class="text-gray-500">Belum ada pengumuman.</p>
            @endif
        </div>

        {{-- Kartu edit profil --}}
        <div class="rounded-xl bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <h5 class="mb-3 text-lg font-semibold text-gray-800">Profil</h5>
            <p class="mb-4 text-gray-600">Kelola dan perbarui data diri Anda agar tetap valid.</p>
            <a href="{{ route('pendaftaran.edit', Auth::id()) }}"
               class="inline-block rounded-lg border border-blue-600 px-4 py-2 text-sm font-medium text-blue-600 transition hover:bg-blue-50">
                Edit Profil
            </a>
        </div>
    </div>
</div>
@endsection

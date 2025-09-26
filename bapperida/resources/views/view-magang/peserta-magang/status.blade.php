@extends('view-magang.layouts.app')

@section('title', 'Status Pendaftaran Magang')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10">
    <h2 class="mb-6 text-3xl font-bold text-gray-800">Status Pendaftaran Magang</h2>

    @if($peserta)
        <div class="overflow-hidden rounded-xl shadow-lg bg-white">
            {{-- Header Status --}}
            <div class="
                @if($peserta->status == 'menunggu') bg-yellow-500
                @elseif($peserta->status == 'diterima') bg-green-600
                @else bg-red-600 @endif
                px-6 py-4 text-white flex items-center justify-between
            ">
                <h3 class="text-xl font-semibold">
                    @if($peserta->status == 'menunggu')
                        Menunggu Verifikasi
                    @elseif($peserta->status == 'diterima')
                        Selamat! Anda Diterima
                    @else
                        Mohon Maaf, Ditolak
                    @endif
                </h3>
                <span class="rounded-full bg-white/20 px-3 py-1 text-sm font-medium">
                    {{ ucfirst($peserta->status) }}
                </span>
            </div>

            {{-- Body Data Peserta --}}
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="text-sm text-gray-500">Nama</p>
                        <p class="font-medium">{{ $peserta->nama }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Universitas</p>
                        <p class="font-medium">{{ $peserta->universitas }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Jurusan</p>
                        <p class="font-medium">{{ $peserta->jurusan }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">No HP</p>
                        <p class="font-medium">{{ $peserta->no_hp }}</p>
                    </div>
                </div>
            </div>

            {{-- Footer Action --}}
            <div class="bg-gray-50 px-6 py-4 flex justify-end">
                @if($peserta->status == 'diterima')
                    <a href="{{ route('peserta.status') }}" 
                        class="inline-flex items-center rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700">
                        Lihat Detail Penerimaan
                    </a>
                @elseif($peserta->status == 'menunggu')
                    <span class="inline-flex items-center rounded-lg bg-yellow-100 px-4 py-2 text-sm font-medium text-yellow-800 animate-pulse">
                        Menunggu Konfirmasi Admin
                    </span>
                @else
                    <a href="{{ route('pendaftaran.create') }}" 
                        class="inline-flex items-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                        Daftar Ulang
                    </a>
                @endif
            </div>
        </div>
    @else
        {{-- Empty State --}}
        <div class="text-center py-12 px-6 rounded-xl border border-dashed border-gray-300 bg-gray-50">
            <div class="text-5xl mb-4">📝</div>
            <h3 class="text-lg font-semibold text-gray-800">Belum ada pendaftaran</h3>
            <p class="mt-2 text-gray-600">Anda belum mendaftar magang. Segera lakukan pendaftaran agar bisa diproses oleh admin.</p>
            <a href="{{ route('pendaftaran.create') }}" 
                class="mt-6 inline-flex items-center rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                Daftar Sekarang
            </a>
        </div>
    @endif
</div>
@endsection

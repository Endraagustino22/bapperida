@extends('view-magang.layouts.app')

@section('title', 'Detail Pengumuman')

@section('content')

    <div class="mb-8 border-b border-gray-200 pb-4 text-center">
        <h1 class="text-3xl font-bold text-black">Detail Pengumuman</h1>
    </div>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-white rounded-xl shadow-md">
    {{-- Judul --}}
    <h2 class="text-2xl font-semibold text-gray-800 mb-2">
        {{ $pengumuman->judul }}
    </h2>
    <p class="text-sm text-gray-500 mb-6">
        {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d M Y') }}
    </p>

    {{-- Isi --}}
    <div class="prose prose-blue max-w-none mb-6">
        {!! nl2br(e($pengumuman->isi)) !!}
    </div>

    {{-- Lampiran jika ada --}}
    @if($pengumuman->file_pengumuman)
        <div class="mb-6">
            <a href="{{ asset('storage/' . $pengumuman->file_pengumuman) }}" target="_blank"
               class="inline-block rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700">
                Lihat Lampiran
            </a>
        </div>
    @endif

    {{-- Tombol kembali --}}
</div>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <a href="{{ route('peserta.dashboard') }}"
       class="inline-block rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-white transition bg-blue-600 hover:bg-blue-700">
        ← Kembali
    </a>
</div>
@endsection

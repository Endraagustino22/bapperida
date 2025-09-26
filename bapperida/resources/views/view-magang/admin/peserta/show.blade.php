@extends('view-magang.layouts.app')

@section('title', 'Detail Peserta Magang')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Judul Halaman --}}
    <div class="mb-8 border-b border-gray-200 pb-4">
        <h1 class="text-2xl font-bold text-blue-700">Detail Peserta Magang</h1>
        <p class="mt-1 text-sm text-gray-500">Informasi lengkap mengenai peserta magang.</p>
    </div>

    {{-- Card Detail --}}
    <div class="bg-white shadow rounded-xl p-6 space-y-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-500">Nama</p>
                <p class="font-medium text-gray-800">{{ $peserta->nama }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Universitas</p>
                <p class="font-medium text-gray-800">{{ $peserta->universitas }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Jurusan</p>
                <p class="font-medium text-gray-800">{{ $peserta->jurusan }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">No HP</p>
                <p class="font-medium text-gray-800">{{ $peserta->no_hp }}</p>
            </div>

            <div class="sm:col-span-2">
                <p class="text-sm text-gray-500">Alamat</p>
                <p class="font-medium text-gray-800">{{ $peserta->alamat }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Status</p>
                @if($peserta->status == 'Diterima')
                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">Diterima</span>
                @elseif($peserta->status == 'Ditolak')
                    <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">Ditolak</span>
                @else
                    <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">Menunggu</span>
                @endif
            </div>

            @if($peserta->alasan_penolakan)
                <div class="sm:col-span-2">
                    <p class="text-sm text-gray-500">Alasan Penolakan</p>
                    <p class="font-medium text-red-700">{{ $peserta->alasan_penolakan }}</p>
                </div>
            @endif

            <div>
                <p class="text-sm text-gray-500">CV</p>
                @if($peserta->cv_file)
                    <a href="{{ asset('storage/'.$peserta->cv_file) }}" target="_blank" 
                       class="text-blue-600 hover:underline">Lihat CV</a>
                @else
                    <span class="text-gray-400">-</span>
                @endif
            </div>

            <div>
                <p class="text-sm text-gray-500">Surat Pengantar</p>
                @if($peserta->surat_pengantar)
                    <a href="{{ asset('storage/'.$peserta->surat_pengantar) }}" target="_blank" 
                       class="text-blue-600 hover:underline">Lihat Surat</a>
                @else
                    <span class="text-gray-400">-</span>
                @endif
            </div>

            <div class="sm:col-span-2">
                <p class="text-sm text-gray-500 mb-2">Foto</p>
                @if($peserta->foto)
                    <img src="{{ asset('storage/'.$peserta->foto) }}" 
                         class="w-40 h-40 object-cover rounded-lg border">
                @else
                    <span class="text-gray-400">-</span>
                @endif
            </div>
        </div>
    </div>

    {{-- Tombol Kembali --}}
    <div class="mt-6">
        <a href="{{ route('admin.peserta.index') }}" 
           class="inline-block px-5 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
           Kembali
        </a>
    </div>
</div>
@endsection

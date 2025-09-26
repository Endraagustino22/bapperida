@extends('view-magang.layouts.app')

@section('title', 'Edit Pendaftaran Magang')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    {{-- Judul Halaman --}}
    <div class="mb-8 border-b border-gray-200 pb-4">
        <h1 class="text-2xl font-bold text-black">Edit Pendaftaran Magang</h1>
        <p class="mt-1 text-sm text-gray-700">Perbarui data pendaftaran magang Anda dengan informasi terbaru.</p>
    </div>

    {{-- Card Form --}}
    <div class="rounded-xl bg-white p-6 shadow-lg">
        <form action="{{ route('pendaftaran.update', $pesertaMagang->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $pesertaMagang->nama) }}" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                @error('nama') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Universitas --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Universitas</label>
                <input type="text" name="universitas" value="{{ old('universitas', $pesertaMagang->universitas) }}" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                @error('universitas') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Jurusan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                <input type="text" name="jurusan" value="{{ old('jurusan', $pesertaMagang->jurusan) }}" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                @error('jurusan') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- No HP --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">No. HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $pesertaMagang->no_hp) }}" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                @error('no_hp') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" rows="3" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('alamat', $pesertaMagang->alamat) }}</textarea>
                @error('alamat') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- CV --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">CV (PDF)</label>
                <input type="file" name="cv" class="mt-1 block w-full text-sm text-gray-700 file:mr-3 file:rounded-md file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-sm file:font-medium file:text-white hover:file:bg-blue-700">
                @if($pesertaMagang->cv_file)
                    <p class="mt-2 text-sm text-gray-500">File sekarang: <a href="{{ asset('storage/'.$pesertaMagang->cv_file) }}" target="_blank" class="text-blue-600 hover:underline">Lihat CV</a></p>
                @endif
                @error('cv') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Surat Pengantar --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Surat Pengantar (PDF)</label>
                <input type="file" name="surat_pengantar" class="mt-1 block w-full text-sm text-gray-700 file:mr-3 file:rounded-md file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-sm file:font-medium file:text-white hover:file:bg-blue-700">
                @if($pesertaMagang->surat_pengantar)
                    <p class="mt-2 text-sm text-gray-500">File sekarang: <a href="{{ asset('storage/'.$pesertaMagang->surat_pengantar) }}" target="_blank" class="text-blue-600 hover:underline">Lihat Surat</a></p>
                @endif
                @error('surat_pengantar') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Foto --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Foto (JPG/PNG)</label>
                <input type="file" name="foto" class="mt-1 block w-full text-sm text-gray-700 file:mr-3 file:rounded-md file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-sm file:font-medium file:text-white hover:file:bg-blue-700">
                @if($pesertaMagang->foto)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$pesertaMagang->foto) }}" alt="Foto" class="h-24 w-24 rounded-lg object-cover border">
                    </div>
                @endif
                @error('foto') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex items-center space-x-3 pt-4">
                <button type="submit"
                    class="inline-flex justify-center rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700">
                    Update Data
                </button>
                <a href="{{ route('peserta.status') }}"
                   class="inline-flex justify-center rounded-lg border border-gray-300 px-5 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

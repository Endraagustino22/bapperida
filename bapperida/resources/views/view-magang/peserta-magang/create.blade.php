@extends('view-magang.layouts.app')

@section('title', 'Form Pendaftaran Magang')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-xl p-8">
        
        <h1 class="text-2xl font-bold text-blue-700 mb-2">Pendaftaran Magang Bapperida Pekalongan</h1>
        <p class="text-gray-600 mb-6">Silakan isi formulir berikut untuk mendaftar program magang.</p>

        @if(session('success'))
            <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- NIM --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                <input type="text" name="nim" value="{{ old('nim') }}"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Universitas --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Universitas <span class="text-red-500">*</span></label>
                <input type="text" name="universitas" value="{{ old('universitas') }}" required
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Jurusan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jurusan <span class="text-red-500">*</span></label>
                <input type="text" name="jurusan" value="{{ old('jurusan') }}" required
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- No HP --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">No HP <span class="text-red-500">*</span></label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" required
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea name="alamat" rows="3"
                          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm
                                 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('alamat') }}</textarea>
            </div>

            {{-- CV --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload CV (PDF, max 2MB)</label>
                <input type="file" name="cv_file"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Surat Pengantar --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Surat Pengantar (PDF, max 2MB)</label>
                <input type="file" name="surat_pengantar"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Foto --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto (JPG/PNG, max 2MB)</label>
                <input type="file" name="foto"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Tombol --}}
            <button type="submit"
                    class="w-full py-2 px-4 rounded-lg bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition">
                Daftar
            </button>
        </form>
    </div>
</div>
@endsection

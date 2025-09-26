@extends('view-magang.layouts.app')

@section('title', 'Edit Pengumuman')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <h1 class="text-2xl font-bold text-blue-700 mb-6">Edit Pengumuman</h1>

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $pengumuman->judul) }}" required
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                @error('judul')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Isi --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Isi</label>
                <textarea name="isi" rows="5" required
                          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2
                                 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">{{ old('isi', $pengumuman->isi) }}</textarea>
                @error('isi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $pengumuman->tanggal) }}" required
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                @error('tanggal')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- File --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">File (Opsional)</label>
                @if($pengumuman->file_pengumuman)
                    <p class="text-sm text-gray-600 mb-2">
                        File saat ini: 
                        <a href="{{ asset('storage/' . $pengumuman->file_pengumuman) }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">
                            Lihat
                        </a>
                    </p>
                @endif
                <input type="file" name="file_pengumuman"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                <p class="text-xs text-gray-500 mt-1">Upload baru akan mengganti file lama</p>
                @error('file_pengumuman')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex items-center gap-3">
                <button type="submit"
                        class="px-5 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium shadow hover:bg-blue-700 transition">
                    Update
                </button>
                <a href="{{ route('admin.pengumuman.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

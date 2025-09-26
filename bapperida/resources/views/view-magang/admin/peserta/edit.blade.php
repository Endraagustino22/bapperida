@extends('view-magang.layouts.app')

@section('title', 'Ubah Status Peserta')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Judul Halaman --}}
    <div class="mb-8 border-b border-gray-200 pb-4">
        <h1 class="text-2xl font-bold text-blue-700">Ubah Status Peserta Magang</h1>
        <p class="mt-1 text-sm text-gray-500">Perbarui status peserta dan tambahkan alasan jika diperlukan.</p>
    </div>

    {{-- Card Info Peserta --}}
    <div class="bg-white shadow rounded-xl p-6 mb-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
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
                <p class="text-sm text-gray-500">Status Saat Ini</p>
                @if($peserta->status == 'Diterima')
                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">Diterima</span>
                @elseif($peserta->status == 'Ditolak')
                    <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">Ditolak</span>
                @else
                    <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">Menunggu</span>
                @endif
            </div>
        </div>
    </div>

    {{-- Form Ubah Status --}}
    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ route('admin.peserta.update', $peserta->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Pilih Status</label>
                <select name="status" id="status" required
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    <option value="Menunggu" {{ $peserta->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Diterima" {{ $peserta->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Ditolak" {{ $peserta->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
                @error('status') 
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                @enderror
            </div>

            <div>
                <label for="alasan_penolakan" class="block text-sm font-medium text-gray-700">Alasan Penolakan (Opsional)</label>
                <textarea name="alasan_penolakan" id="alasan_penolakan" rows="3"
                          class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('alasan_penolakan', $peserta->alasan_penolakan) }}</textarea>
                @error('alasan_penolakan') 
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                @enderror
            </div>

            <div class="flex items-center space-x-3">
                <button type="submit" 
                        class="px-5 py-2 rounded-lg bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.peserta.index') }}" 
                   class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

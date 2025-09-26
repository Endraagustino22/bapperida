@extends('view-magang.layouts.app')

@section('title', 'Kelola Pengumuman')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-blue-700">Daftar Pengumuman</h1>
        <a href="{{ route('admin.pengumuman.create') }}"
           class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium shadow hover:bg-blue-700 transition">
            + Tambah Pengumuman
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="overflow-x-auto bg-white shadow rounded-xl">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 font-medium">Judul</th>
                    <th class="px-4 py-3 font-medium">Tanggal</th>
                    <th class="px-4 py-3 font-medium">File</th>
                    <th class="px-4 py-3 font-medium text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengumuman as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $item->judul }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                        <td class="px-4 py-3">
                            @if($item->file_pengumuman)
                                <a href="{{ asset('storage/' . $item->file_pengumuman) }}" target="_blank"
                                   class="inline-block px-3 py-1 rounded-md bg-blue-100 text-blue-700 text-xs font-medium hover:bg-blue-200">
                                    Lihat File
                                </a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.pengumuman.edit', $item->id) }}"
                                   class="px-3 py-1 rounded-md bg-yellow-100 text-yellow-700 text-xs font-medium hover:bg-yellow-200">
                                    Edit
                                </a>
                                <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 rounded-md bg-red-100 text-red-700 text-xs font-medium hover:bg-red-200">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">Belum ada pengumuman</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $pengumuman->links() }}
    </div>
</div>
@endsection

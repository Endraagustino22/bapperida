@extends('view-magang.layouts.app')

@section('title', 'Daftar Peserta Magang')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Judul Halaman --}}
    <div class="mb-8 border-b border-gray-200 pb-4">
        <h1 class="text-2xl font-bold text-blue-700">Daftar Peserta Magang</h1>
        <p class="mt-1 text-sm text-gray-500">Kelola data peserta magang yang sudah mendaftar.</p>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="mb-6 rounded-sm bg-green-100 border border-green-300 text-green-700 px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Peserta --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow-md">
        <table class="min-w-full text-sm text-left text-gray-600">
            <thead class="bg-blue-600 text-white text-xs uppercase">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Universitas</th>
                    <th class="px-6 py-3">Jurusan</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($peserta as $p)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $p->nama }}</td>
                        <td class="px-6 py-4">{{ $p->universitas }}</td>
                        <td class="px-6 py-4">{{ $p->jurusan }}</td>
                        <td class="px-6 py-4">
                            @if($p->status == 'Diterima')
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Diterima</span>
                            @elseif($p->status == 'Ditolak')
                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">Ditolak</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">Menunggu</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('admin.peserta.show', $p->id) }}" 
                               class="inline-block px-3 py-1 text-xs rounded-md bg-blue-100 text-blue-700 hover:bg-blue-200">
                               Detail
                            </a>
                            <a href="{{ route('admin.peserta.edit', $p->id) }}" 
                               class="inline-block px-3 py-1 text-xs rounded-md bg-yellow-100 text-yellow-700 hover:bg-yellow-200">
                               Edit
                            </a>
                            <form action="{{ route('admin.peserta.destroy', $p->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus peserta ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 text-xs rounded-md bg-red-100 text-red-700 hover:bg-red-200">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada peserta</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $peserta->links() }}
    </div>
</div>
@endsection

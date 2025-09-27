@extends('layouts.admin')

@section('title', 'Data Pendaftaran Magang')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Data Pendaftaran Magang</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('admin.magang.create') }}" class="btn btn-primary">Tambah Pendaftaran Magang</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Universitas</th>
                        <th>Jurusan</th>
                        <th>No HP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($magangs as $index => $magang)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $magang->nama }}</td>
                            <td>{{ $magang->universitas }}</td>
                            <td>{{ $magang->jurusan }}</td>
                            <td>{{ $magang->no_hp }}</td>
                            <td>
                                <span
                                    class="badge 
                        @if ($magang->status == 'menunggu') bg-warning 
                        @elseif($magang->status == 'diterima') bg-success 
                        @else bg-danger @endif">
                                    {{ ucfirst($magang->status ?? 'Belum diverifikasi') }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.magang.show', $magang->id) }}"
                                    class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('admin.magang.edit', $magang->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.magang.destroy', $magang->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada pendaftaran magang</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

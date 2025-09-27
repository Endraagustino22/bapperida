@extends('layouts.admin')

@section('title', 'Data Pendaftaran Penelitian')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Data Pendaftaran Penelitian</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('admin.penelitian.create') }}" class="btn btn-primary">Tambah Pendaftaran Penelitian</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Judul Penelitian</th>
                        <th>Nama Peneliti</th>
                        <th>Universitas</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penelitians as $index => $penelitian)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $penelitian->judul }}</td>
                            <td>{{ $penelitian->nama_peneliti }}</td>
                            <td>{{ $penelitian->universitas }}</td>
                            <td>{{ $penelitian->jurusan }}</td>
                            <td>
                                <span
                                    class="badge 
                        @if ($penelitian->status == 'menunggu') bg-warning 
                        @elseif($penelitian->status == 'diterima') bg-success 
                        @else bg-danger @endif">
                                    {{ ucfirst($penelitian->status ?? 'Belum diverifikasi') }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.penelitian.show', $penelitian->id) }}"
                                    class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('admin.penelitian.edit', $penelitian->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.penelitian.destroy', $penelitian->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada pendaftaran penelitian</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

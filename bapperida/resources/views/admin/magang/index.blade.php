@extends('layouts.admin')

@section('title', 'Data Pendaftaran Magang')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-semibold">
                <i class="bi bi-briefcase-fill me-2"></i> Data Pendaftaran Magang
            </h3>
            <a href="{{ route('admin.magang.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Pendaftaran
            </a>
        </div>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Universitas</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">No. HP</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($magangs as $index => $magang)
                                <tr class="text-center">
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-start">{{ $magang->nama }}</td>
                                    <td>{{ $magang->universitas }}</td>
                                    <td>{{ $magang->jurusan }}</td>
                                    <td>{{ $magang->no_hp }}</td>
                                    <td>
                                        @if ($magang->status == 'menunggu')
                                            <span class="badge bg-warning text-dark px-3 py-2">Menunggu</span>
                                        @elseif ($magang->status == 'diterima')
                                            <span class="badge bg-success px-3 py-2">Diterima</span>
                                        @else
                                            <span class="badge bg-danger px-3 py-2">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.magang.show', $magang->id) }}"
                                                class="btn btn-sm btn-outline-info">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="{{ route('admin.magang.edit', $magang->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('admin.magang.destroy', $magang->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox-fill fs-3 d-block mb-2"></i>
                                        Belum ada pendaftaran magang
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

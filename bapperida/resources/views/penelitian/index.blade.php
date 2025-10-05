@extends('layouts.app')

@section('title', 'Daftar Pengajuan Penelitian')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Daftar Pengajuan Penelitian Saya</h2>
            <p class="text-muted">Lihat dan kelola pengajuan penelitian yang telah Anda buat.</p>
        </div>

        {{-- Tombol Tambah --}}
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('penelitian.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i> Ajukan Penelitian
            </a>
        </div>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Tabel Data Penelitian --}}
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 align-middle">
                        <thead class="table-primary text-white">
                            <tr>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Instansi</th>
                                <th>Tujuan</th>
                                <th>Status</th>
                                <th>Proposal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penelitians as $p)
                                <tr>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->judul_penelitian }}</td>
                                    <td>{{ $p->instansi }}</td>
                                    <td>{{ $p->tujuan_penelitian }}</td>
                                    <td>
                                        @if ($p->status == 'pending')
                                            <span class="badge bg-warning text-dark px-3 py-2">Menunggu</span>
                                        @elseif($p->status == 'disetujui')
                                            <span class="badge bg-success px-3 py-2">Disetujui</span>
                                        @else
                                            <span class="badge bg-danger px-3 py-2">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($p->file_proposal)
                                            <a href="{{ asset('storage/' . $p->file_proposal) }}" 
                                               target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-file-earmark-text"></i> Lihat
                                            </a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('penelitian.show', $p->id) }}" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('penelitian.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('penelitian.destroy', $p->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        Belum ada pengajuan penelitian.
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

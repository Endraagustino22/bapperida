@extends('layouts.app')

@section('title', 'Pendaftaran Magang | Bapperida')

@section('content')
    <div class="container py-5">
        <!-- Header Section -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-primary mb-2">Pendaftaran Magang</h1>
            <p class="text-muted fs-5">Lihat status pendaftaran dan informasi terbaru Anda di sini.</p>
            <hr class="w-25 mx-auto border-2 border-primary">
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                {{-- Flash Messages --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Informasi Pendaftaran --}}
                @if ($pesertaMagang)
                    <div class="card shadow-lg border-0 mb-4" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                                    style="width: 60px; height: 60px;">
                                    <i class="bi bi-person-workspace text-primary fs-3"></i>
                                </div>
                                <div>
                                    <h4 class="card-title mb-0">{{ $pesertaMagang->nama }}</h4>
                                    <small class="text-muted">Pendaftar Magang</small>
                                </div>
                            </div>

                            <div class="ps-1 mt-3">
                                <p class="mb-1"><strong>Universitas:</strong> {{ $pesertaMagang->universitas }}</p>
                                <p class="mb-1"><strong>Jurusan:</strong> {{ $pesertaMagang->jurusan }}</p>
                                <p class="mb-2"><strong>Status:</strong>
                                    <span
                                        class="badge 
                                        @if ($pesertaMagang->status === 'Diterima') bg-success 
                                        @elseif ($pesertaMagang->status === 'Ditolak') bg-danger 
                                        @else bg-warning text-dark @endif">
                                        {{ $pesertaMagang->status ?? 'Belum diverifikasi' }}
                                    </span>
                                </p>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <a href="{{ route('magang.edit', $pesertaMagang->id) }}"
                                    class="btn btn-outline-warning">
                                    <i class="bi bi-pencil-square me-1"></i>Edit Pendaftaran
                                </a>
                                <a href="{{ route('magang.status') }}" class="btn btn-outline-primary">
                                    <i class="bi bi-info-circle me-1"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card shadow-lg border-0 text-center mb-4" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <i class="bi bi-clipboard-check text-primary mb-3" style="font-size: 3rem;"></i>
                            <h5 class="fw-bold mb-2">Belum Mendaftar Magang</h5>
                            <p class="text-muted mb-3">Mulailah perjalanan magang Anda dengan mendaftar sekarang!</p>
                            <a href="{{ route('magang.create') }}" class="btn btn-primary btn-lg shadow-sm">
                                <i class="bi bi-pencil-fill me-1"></i> Daftar Magang
                            </a>
                        </div>
                    </div>
                @endif

                {{-- Pengumuman --}}
                @if ($pengumuman)
                    <div class="card shadow border-0" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px;">
                                    <i class="bi bi-megaphone text-info fs-4"></i>
                                </div>
                                <h5 class="card-title mb-0">Pengumuman Terbaru</h5>
                            </div>

                            <p class="card-text">{{ $pengumuman->judul }}</p>
                            <a href="{{ route('pengumuman.show', $pengumuman->id) }}" class="btn btn-outline-info">
                                <i class="bi bi-eye me-1"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

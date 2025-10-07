@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary mb-0">Dashboard Admin</h2>
            <span class="text-muted small">Selamat datang di panel administrasi</span>
        </div>

        {{-- Flash message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Statistik singkat --}}
        <div class="row g-4 mb-5">
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body text-center py-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:60px; height:60px;">
                            <i class="bi bi-briefcase-fill fs-4"></i>
                        </div>
                        <h6 class="fw-semibold mb-1">Data Magang</h6>
                        <p class="text-muted small mb-2">Total Pendaftar</p>
                        <h4 class="fw-bold">{{ $totalMagang }}</h4>
                        <a href="{{ route('admin.magang.index') }}" class="btn btn-outline-primary btn-sm rounded-pill mt-2">Lihat Data</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body text-center py-4">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:60px; height:60px;">
                            <i class="bi bi-journal-text fs-4"></i>
                        </div>
                        <h6 class="fw-semibold mb-1">Data Penelitian</h6>
                        <p class="text-muted small mb-2">Total Pendaftar</p>
                        <h4 class="fw-bold">{{ $totalPenelitian }}</h4>
                        <a href="{{ route('admin.penelitian.index') }}" class="btn btn-outline-success btn-sm rounded-pill mt-2">Lihat Data</a>
                    </div>
                </div>
            </div>

            {{-- card KKN --}}
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body text-center py-4">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:60px; height:60px;">
                            <i class="bi bi-journal-text fs-4"></i>
                        </div>
                        <h6 class="fw-semibold mb-1">Data KKN</h6>
                        <p class="text-muted small mb-2">Total Pendaftar</p>
                        <h4 class="fw-bold">{{ $totalKkn }}</h4>
                        <a href="{{ route('admin.kkn.index') }}" class="btn btn-outline-success btn-sm rounded-pill mt-2">Lihat Data</a>
                    </div>
                </div>
            </div>


            {{-- card User --}}
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body text-center py-4">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:60px; height:60px;">
                            <i class="bi bi-journal-text fs-4"></i>
                        </div>
                        <h6 class="fw-semibold mb-1">Manajemen User</h6>
                        <p class="text-muted small mb-2">Total Pendaftar</p>
                        <h4 class="fw-bold">{{ $totalUsers }}</h4>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-success btn-sm rounded-pill mt-2">Lihat Data</a>
                    </div>
                </div>
            </div>

        </div>

        {{-- Ringkasan terbaru --}}
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-transparent border-0 d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold text-primary mb-0">
                            <i class="bi bi-people me-2"></i>Pendaftar Magang Terbaru
                        </h6>
                        <span class="badge bg-primary bg-opacity-10 text-primary">Terbaru</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($latestMagang as $magang)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-semibold">{{ $magang->nama }}</span>
                                    <small class="d-block text-muted">{{ $magang->universitas }}</small>
                                </div>
                                <span class="badge bg-info text-dark">{{ ucfirst($magang->status ?? 'pending') }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted py-3">Belum ada pendaftar</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-transparent border-0 d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold text-success mb-0">
                            <i class="bi bi-file-earmark-text me-2"></i>Pendaftar Penelitian Terbaru
                        </h6>
                        <span class="badge bg-success bg-opacity-10 text-success">Terbaru</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($latestPenelitian as $penelitian)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-semibold">{{ $penelitian->judul }}</span>
                                    <small class="d-block text-muted">{{ $penelitian->user->name ?? '-' }}</small>
                                </div>
                                <span class="badge bg-info text-dark">{{ ucfirst($penelitian->status ?? 'pending') }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted py-3">Belum ada pendaftar</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

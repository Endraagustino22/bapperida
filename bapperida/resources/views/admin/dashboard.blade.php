@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Dashboard Admin</h1>

        {{-- Flash message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-3">
            <!-- Card Magang -->
            <div class="col-md-3">
                <div class="card text-bg-primary h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Data Magang</h5>
                        <p class="card-text">Total Pendaftar: <strong>{{ $totalMagang }}</strong></p>
                        <a href="{{ route('admin.magang.index') }}" class="btn btn-light btn-sm">Lihat Data</a>
                    </div>
                </div>
            </div>

            <!-- Card Penelitian -->
            <div class="col-md-3">
                <div class="card text-bg-success h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Data Penelitian</h5>
                        <p class="card-text">Total Pendaftar: <strong>{{ $totalPenelitian }}</strong></p>
                        <a href="{{ route('admin.penelitian.index') }}" class="btn btn-light btn-sm">Lihat Data</a>
                    </div>
                </div>
            </div>

            {{-- <!-- Card KKN -->
            <div class="col-md-3">
                <div class="card text-bg-warning h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Data KKN</h5>
                        <p class="card-text">Total Pendaftar: <strong>{{ $totalKkn }}</strong></p>
                        <a href="{{ route('admin.kkn.index') }}" class="btn btn-light btn-sm">Lihat Data</a>
                    </div>
                </div>
            </div> --}}

            <!-- Card User -->
            <div class="col-md-3">
                <div class="card text-bg-dark h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manajemen User</h5>
                        <p class="card-text">Total Users: <strong>{{ $totalUsers }}</strong></p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-sm">Kelola User</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ringkasan terbaru --}}
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">Pendaftar Magang Terbaru</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($latestMagang as $magang)
                            <li class="list-group-item">
                                {{ $magang->nama }} - {{ $magang->universitas }} <span
                                    class="badge bg-info float-end">{{ ucfirst($magang->status ?? 'pending') }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Belum ada pendaftar</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h6 class="mb-0">Pendaftar Penelitian Terbaru</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($latestPenelitian as $penelitian)
                            <li class="list-group-item">
                                {{ $penelitian->judul }} - {{ $penelitian->user->name ?? '-' }}
                                <span
                                    class="badge bg-info float-end">{{ ucfirst($penelitian->status ?? 'pending') }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Belum ada pendaftar</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1>Pendaftaran Magang</h1>
            <p class="lead">Lihat status pendaftaran dan informasi terbaru di sini.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- Notifikasi --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                {{-- Info Pendaftaran --}}
                @if ($pesertaMagang)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pesertaMagang->nama }}</h5>
                            <p class="card-text">
                                Universitas: {{ $pesertaMagang->universitas }} <br>
                                Jurusan: {{ $pesertaMagang->jurusan }} <br>
                                Status: <span class="fw-bold">{{ $pesertaMagang->status ?? 'Belum diverifikasi' }}</span>
                            </p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('magang.edit', $pesertaMagang->id) }}" class="btn btn-warning">Edit
                                    Pendaftaran</a>
                                <a href="{{ route('magang.status') }}" class="btn btn-info">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card mb-4 shadow-sm text-center">
                        <div class="card-body">
                            <p>Anda belum mendaftar magang.</p>
                            <a href="{{ route('magang.create') }}" class="btn btn-primary">Daftar Magang</a>
                        </div>
                    </div>
                @endif

                {{-- Pengumuman --}}
                @if ($pengumuman)
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Pengumuman Terbaru</h5>
                            <p class="card-text">{{ $pengumuman->judul }}</p>
                            <a href="{{ route('pengumuman.show', $pengumuman->id) }}" class="btn btn-info">Detail</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Status Pendaftaran Magang')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">Status Pendaftaran Magang</h2>

        @if ($pesertaMagang)
            <div class="card shadow-sm mb-4">
                <div
                    class="card-header 
                @if ($pesertaMagang->status == 'menunggu') bg-warning text-dark
                @elseif ($pesertaMagang->status == 'diterima') bg-success text-white
                @else bg-danger text-white @endif
            ">
                    <h5 class="mb-0">
                        @if ($pesertaMagang->status == 'menunggu')
                            Menunggu Verifikasi
                        @elseif ($pesertaMagang->status == 'diterima')
                            Selamat! Anda Diterima
                        @else
                            Mohon Maaf, Ditolak
                        @endif
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6"><strong>Nama:</strong> {{ $pesertaMagang->nama }}</div>
                        <div class="col-md-6"><strong>Universitas:</strong> {{ $pesertaMagang->universitas }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6"><strong>Jurusan:</strong> {{ $pesertaMagang->jurusan }}</div>
                        <div class="col-md-6"><strong>No HP:</strong> {{ $pesertaMagang->no_hp }}</div>
                    </div>
                    @if ($pesertaMagang->alamat)
                        <div class="mb-3"><strong>Alamat:</strong> {{ $pesertaMagang->alamat }}</div>
                    @endif
                </div>
                <div class="card-footer text-end">
                    @if ($pesertaMagang->status == 'diterima')
                        <a href="{{ route('magang.status') }}" class="btn btn-success">Lihat Detail Penerimaan</a>
                    @elseif ($pesertaMagang->status == 'menunggu')
                        <span class="badge bg-warning text-dark">Menunggu Konfirmasi Admin</span>
                    @else
                        <a href="{{ route('magang.create') }}" class="btn btn-danger">Daftar Ulang</a>
                    @endif
                </div>
            </div>
        @else
            <div class="card text-center border-dashed border-secondary">
                <div class="card-body">
                    <div class="mb-3 display-4">📝</div>
                    <h5 class="card-title">Belum ada pendaftaran</h5>
                    <p class="card-text">Anda belum mendaftar magang. Segera lakukan pendaftaran agar bisa diproses oleh
                        admin.</p>
                    <a href="{{ route('magang.create') }}" class="btn btn-primary">Daftar Sekarang</a>
                </div>
            </div>
        @endif
    </div>
@endsection

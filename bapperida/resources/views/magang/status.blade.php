@extends('layouts.app')

@section('title', 'Status Pendaftaran Magang | Bapperida')

@section('content')
    <div class="container py-5">
        <!-- Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-2">Status Pendaftaran Magang</h2>
            <p class="text-muted">Pantau status pendaftaran dan hasil verifikasi Anda di sini.</p>
            <hr class="w-25 mx-auto border-2 border-primary">
        </div>

        @if ($pesertaMagang)
            <div class="card shadow-lg border-0 mb-5" style="border-radius: 15px; overflow: hidden;">
                <div class="card-header text-center fw-semibold py-3
                    @if ($pesertaMagang->status == 'menunggu') bg-warning-subtle text-dark
                    @elseif ($pesertaMagang->status == 'diterima') bg-success text-white
                    @else bg-danger text-white @endif
                ">
                    @if ($pesertaMagang->status == 'menunggu')
                        <i class="bi bi-hourglass-split me-2"></i>Menunggu Verifikasi
                    @elseif ($pesertaMagang->status == 'diterima')
                        <i class="bi bi-check-circle-fill me-2"></i>Selamat! Anda Diterima
                    @else
                        <i class="bi bi-x-circle-fill me-2"></i>Mohon Maaf, Anda Tidak Diterima
                    @endif
                </div>

                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-person-circle text-primary fs-5 me-2"></i>
                                <span><strong>Nama:</strong> {{ $pesertaMagang->nama }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-mortarboard text-primary fs-5 me-2"></i>
                                <span><strong>Universitas:</strong> {{ $pesertaMagang->universitas }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-journal-text text-primary fs-5 me-2"></i>
                                <span><strong>Jurusan:</strong> {{ $pesertaMagang->jurusan }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-telephone text-primary fs-5 me-2"></i>
                                <span><strong>No HP:</strong> {{ $pesertaMagang->no_hp }}</span>
                            </div>

                            @if ($pesertaMagang->alamat)
                                <div class="d-flex align-items-start mb-2">
                                    <i class="bi bi-geo-alt text-primary fs-5 me-2 mt-1"></i>
                                    <span><strong>Alamat:</strong> {{ $pesertaMagang->alamat }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light py-3 text-center">
                    @if ($pesertaMagang->status == 'diterima')
                        <a href="{{ route('magang.status') }}" class="btn btn-success px-4">
                            <i class="bi bi-eye-fill me-1"></i>Lihat Detail Penerimaan
                        </a>
                    @elseif ($pesertaMagang->status == 'menunggu')
                        <span class="badge bg-warning text-dark fs-6 py-2 px-3">
                            <i class="bi bi-hourglass-split me-1"></i>Menunggu Konfirmasi Admin
                        </span>
                    @else
                        <a href="{{ route('magang.create') }}" class="btn btn-danger px-4">
                            <i class="bi bi-arrow-repeat me-1"></i>Daftar Ulang
                        </a>
                    @endif
                </div>
            </div>
        @else
            <!-- Jika belum mendaftar -->
            <div class="card text-center border-0 shadow-sm p-5" style="border-radius: 15px;">
                <div class="mb-3 display-4 text-primary">
                    <i class="bi bi-clipboard2-check"></i>
                </div>
                <h5 class="fw-bold">Belum Ada Pendaftaran</h5>
                <p class="text-muted mb-4">Anda belum mengisi form pendaftaran magang. Silakan mendaftar untuk melanjutkan proses.</p>
                <a href="{{ route('magang.create') }}" class="btn btn-primary btn-lg px-4 shadow-sm">
                    <i class="bi bi-pencil-square me-2"></i>Daftar Sekarang
                </a>
            </div>
        @endif
    </div>
@endsection

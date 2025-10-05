@extends('layouts.app')

@section('title', 'Register | Bapperida')

@section('content')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg border-0"
            style="max-width: 500px; width: 100%; border-radius: 15px; background: rgba(255,255,255,0.95);">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <div class="d-flex justify-content-center mb-2">
                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-person-plus-fill text-primary" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1">Buat Akun Baru</h3>
                    <p class="text-muted small mb-0">Daftar untuk mendaftar magang, penelitian, atau KKN</p>
                </div>

                {{-- Error Message --}}
                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="name" name="name" required
                                value="{{ old('name') }}" placeholder="Masukkan nama lengkap">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required
                                value="{{ old('email') }}" placeholder="Masukkan email aktif">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required
                                placeholder="Masukkan password">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-shield-check"></i></span>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required placeholder="Konfirmasi password">
                        </div>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm"
                            style="background: linear-gradient(45deg, #007bff, #6610f2); border: none;">
                            <i class="bi bi-person-plus-fill me-1"></i> Daftar
                        </button>
                    </div>

                    <hr class="my-4">

                    <p class="text-center text-muted small mb-0">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">
                            Login di sini
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection

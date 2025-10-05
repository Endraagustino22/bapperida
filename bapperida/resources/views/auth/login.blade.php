@extends('layouts.app')

@section('title', 'Login | Bapperida')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100"
        style="">
        <div class="card shadow-lg border-0" style="max-width: 420px; width: 100%; border-radius: 15px;">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <div class="d-flex justify-content-center mb-2">
                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-person-circle text-primary" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1">Selamat Datang</h3>
                    <p class="text-muted small mb-0">Silakan login untuk melanjutkan ke sistem</p>
                </div>

                {{-- Flash messages --}}
                @if (session('success'))
                    <div class="alert alert-success py-2">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan email" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan password" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label small text-muted" for="remember">Ingat saya</label>
                        </div>
                        <a href="#" class="small text-primary text-decoration-none">Lupa password?</a>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm"
                            style="background: linear-gradient(45deg, #007bff, #6610f2); border: none;">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </button>
                    </div>

                    <hr class="my-4">

                    <p class="text-center text-muted small mb-0">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">
                            Daftar di sini
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection

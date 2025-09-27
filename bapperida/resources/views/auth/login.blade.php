@extends('layouts.app')

@section('content')
    <div class="vh-100 d-flex align-items-center justify-content-center"
        style="background: linear-gradient(135deg, #6C63FF, #48C6EF);">
        <div class="card shadow-lg p-4"
            style="width: 100%; max-width: 420px; border-radius: 15px; background: rgba(255,255,255,0.95);">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Login</h2>
                <p class="text-muted">Masuk untuk melanjutkan ke sistem pendaftaran</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        value="{{ old('email') }}" placeholder="Masukkan email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required
                        placeholder="Masukkan password">
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary"
                        style="background: linear-gradient(45deg, #6C63FF, #48C6EF); border: none;">Login</button>
                </div>

                <p class="text-center text-muted">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
                </p>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="vh-100 d-flex align-items-center justify-content-center"
        style="background: linear-gradient(135deg, #6C63FF, #48C6EF);">
        <div class="card shadow-lg p-4"
            style="width: 100%; max-width: 500px; border-radius: 15px; background: rgba(255,255,255,0.95);">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Register</h2>
                <p class="text-muted">Buat akun untuk mendaftar magang, penelitian, atau KKN</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        value="{{ old('name') }}" placeholder="Masukkan nama lengkap">
                </div>

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

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        required placeholder="Konfirmasi password">
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-success"
                        style="background: linear-gradient(45deg, #48C6EF, #6C63FF); border: none;">Register</button>
                </div>

                <p class="text-center text-muted">
                    Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                </p>
            </form>
        </div>
    </div>
@endsection

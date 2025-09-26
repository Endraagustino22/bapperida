{{-- resources/views/view-magang/login.blade.php --}}

@extends('view-magang.layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-gray-100 via-gray-200 to-gray-100 px-6 py-12">

    {{-- Login Card --}}
    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-xl transition hover:shadow-2xl">
        
        {{-- Header --}}
        <div class="text-center">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">
                <span class="bg-gradient-to-r from-blue-600 to-indigo-500 bg-clip-text text-transparent">
                    Selamat Datang
                </span>
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Silakan masuk ke akun magang Anda
            </p>
        </div>

        {{-- Form --}}
        <form class="mt-8 space-y-6" method="POST" action="{{ url('/login') }}">
            @csrf

            <div class="space-y-4">
                {{-- Email --}}
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        value="{{ old('email') }}"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 sm:text-sm"
                        placeholder="Email address">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 sm:text-sm"
                        placeholder="Password">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Button --}}
            <div class="mt-6">
                <button type="submit"
                    class="w-full rounded-lg bg-gradient-to-r from-blue-600 to-indigo-500 py-2.5 px-4 text-sm font-semibold text-white shadow-md transition hover:from-blue-700 hover:to-indigo-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Login
                </button>
            </div>
        </form>

        {{-- Register link --}}
        <p class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                Daftar sekarang
            </a>
        </p>
    </div>
</div>
@endsection

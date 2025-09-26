@extends('view-magang.layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
        
        <h1 class="text-2xl font-bold text-center text-blue-700 mb-6">Register</h1>

        <form method="POST" action="{{ url('/register') }}" class="space-y-5">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Tombol --}}
            <button type="submit"
                    class="w-full py-2 px-4 rounded-lg bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition">
                Register
            </button>
        </form>
    </div>
</div>
@endsection

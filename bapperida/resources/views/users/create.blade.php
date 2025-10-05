@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-semibold">
            <i class="bi bi-person-plus-fill me-2"></i> Tambah User
        </h3>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left-circle me-1"></i> Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control shadow-sm" 
                           value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold text-secondary">Email</label>
                    <input type="email" name="email" id="email" class="form-control shadow-sm" 
                           value="{{ old('email') }}" placeholder="Masukkan email" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold text-secondary">Password</label>
                    <input type="password" name="password" id="password" class="form-control shadow-sm" 
                           placeholder="Minimal 8 karakter" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="role" class="form-label fw-semibold text-secondary">Role</label>
                    <select name="role" id="role" class="form-select shadow-sm" required>
                        <option value="peserta">Peserta</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save2-fill me-1"></i> Simpan
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary px-4 ms-2">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

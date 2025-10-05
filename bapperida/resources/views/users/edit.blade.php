@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="bi bi-person-fill fs-4 me-2"></i>
            <h4 class="mb-0">Edit User</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="mt-2">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama</label>
                    <input type="text" name="name" class="form-control" 
                        value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" 
                        value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="peserta" {{ $user->role == 'peserta' ? 'selected' : '' }}>Peserta</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password <small class="text-muted">(kosongkan jika tidak diubah)</small></label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

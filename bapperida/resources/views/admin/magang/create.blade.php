@extends('layouts.admin')

@section('title', 'Tambah Pendaftaran Magang')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-semibold">
                <i class="bi bi-person-plus-fill me-2"></i> Tambah Pendaftaran Magang
            </h3>
            <a href="{{ route('admin.magang.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.magang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control shadow-sm"
                            value="{{ old('nama') }}" required>
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="universitas" class="form-label fw-semibold text-secondary">Universitas</label>
                            <input type="text" name="universitas" id="universitas" class="form-control shadow-sm"
                                value="{{ old('universitas') }}" required>
                            @error('universitas')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jurusan" class="form-label fw-semibold text-secondary">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control shadow-sm"
                                value="{{ old('jurusan') }}" required>
                            @error('jurusan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label fw-semibold text-secondary">No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control shadow-sm"
                            value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label fw-semibold text-secondary">Status</label>
                        <select name="status" id="status" class="form-select shadow-sm">
                            <option value="menunggu" selected>Menunggu</option>
                            <option value="diterima">Diterima</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label fw-semibold text-secondary">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control shadow-sm" rows="3" placeholder="Masukkan alamat lengkap...">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save2-fill me-1"></i> Simpan Data
                        </button>
                        <a href="{{ route('admin.magang.index') }}" class="btn btn-outline-secondary px-4 ms-2">
                            <i class="bi bi-x-circle me-1"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

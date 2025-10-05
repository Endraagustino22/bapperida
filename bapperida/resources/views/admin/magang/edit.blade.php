@extends('layouts.admin')

@section('title', 'Edit Pendaftaran Magang')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-semibold">
                <i class="bi bi-pencil-square me-2"></i> Edit Pendaftaran Magang
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
                <form action="{{ route('admin.magang.update', $magang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control shadow-sm"
                            value="{{ old('nama', $magang->nama) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="universitas" class="form-label fw-semibold text-secondary">Universitas</label>
                            <input type="text" name="universitas" id="universitas" class="form-control shadow-sm"
                                value="{{ old('universitas', $magang->universitas) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jurusan" class="form-label fw-semibold text-secondary">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control shadow-sm"
                                value="{{ old('jurusan', $magang->jurusan) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label fw-semibold text-secondary">No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control shadow-sm"
                            value="{{ old('no_hp', $magang->no_hp) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label fw-semibold text-secondary">Status</label>
                        <select name="status" id="status" class="form-select shadow-sm">
                            <option value="menunggu" {{ $magang->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diterima" {{ $magang->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="ditolak" {{ $magang->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label fw-semibold text-secondary">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control shadow-sm" rows="3" placeholder="Masukkan alamat lengkap...">{{ old('alamat', $magang->alamat) }}</textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save2-fill me-1"></i> Simpan Perubahan
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

@extends('layouts.admin')

@section('title', 'Tambah Pendaftaran Magang')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Tambah Pendaftaran Magang</h1>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.magang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}"
                            required>
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="universitas" class="form-label">Universitas</label>
                            <input type="text" name="universitas" id="universitas" class="form-control"
                                value="{{ old('universitas') }}" required>
                            @error('universitas')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control"
                                value="{{ old('jurusan') }}" required>
                            @error('jurusan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp') }}"
                            required>
                        @error('no_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="menunggu" selected>Menunggu</option>
                            <option value="diterima">Diterima</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.magang.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="mb-2">Form Pendaftaran Magang</h1>
            <p class="lead text-muted">Isi data Anda dengan lengkap untuk mendaftar program magang Bapperida.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body p-5">
                <form action="{{ route('magang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nim" class="form-label fw-bold">NIM</label>
                        <input type="text" name="nim" id="nim" class="form-control"
                            value="{{ old('nim') }}">
                        @error('nim')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            value="{{ old('nama') }}">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="universitas" class="form-label fw-bold">Universitas</label>
                            <input type="text" name="universitas" id="universitas" class="form-control"
                                value="{{ old('universitas') }}" required>
                            @error('universitas')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jurusan" class="form-label fw-bold">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control"
                                value="{{ old('jurusan') }}" required>
                            @error('jurusan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label fw-bold">No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control"
                            value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-bold">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cv_file" class="form-label fw-bold">CV (PDF)</label>
                        <input type="file" name="cv_file" id="cv_file" class="form-control" accept=".pdf">
                        @error('cv_file')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="surat_pengantar" class="form-label fw-bold">Surat Pengantar (PDF)</label>
                        <input type="file" name="surat_pengantar" id="surat_pengantar" class="form-control"
                            accept=".pdf">
                        @error('surat_pengantar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="form-label fw-bold">Foto (JPG/PNG)</label>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                        @error('foto')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center gap-3">
                        <button type="submit" class="btn btn-primary btn-lg px-5">Kirim Pendaftaran</button>
                        <a href="{{ route('magang.index') }}" class="btn btn-secondary btn-lg px-5">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Form Pendaftaran Magang | Bapperida')

@section('content')
    <div class="container py-5">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-primary">Form Pendaftaran Magang</h1>
            <p class="text-muted fs-5">Isi data Anda dengan lengkap untuk mendaftar program magang di Bapperida.</p>
            <hr class="w-25 mx-auto border-2 border-primary">
        </div>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Card Form -->
        <div class="card shadow-lg border-0" style="border-radius: 15px;">
            <div class="card-body p-5">
                <form action="{{ route('magang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Kolom kiri -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nim" class="form-label fw-semibold">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}" placeholder="Masukkan NIM Anda">
                                @error('nim')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap Anda">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="universitas" class="form-label fw-semibold">Universitas</label>
                                <input type="text" name="universitas" id="universitas" class="form-control" value="{{ old('universitas') }}" placeholder="Contoh: Universitas Diponegoro">
                                @error('universitas')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jurusan" class="form-label fw-semibold">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ old('jurusan') }}" placeholder="Contoh: Informatika">
                                @error('jurusan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_hp" class="form-label fw-semibold">Nomor HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp') }}" placeholder="Contoh: 081234567890">
                                @error('no_hp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Kolom kanan -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat" class="form-label fw-semibold">Alamat Lengkap</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Tuliskan alamat domisili lengkap Anda">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cv_file" class="form-label fw-semibold">Upload CV (PDF)</label>
                                <input type="file" name="cv_file" id="cv_file" class="form-control" accept=".pdf">
                                <small class="text-muted">Maksimal 2MB.</small><br>
                                @error('cv_file')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="surat_pengantar" class="form-label fw-semibold">Surat Pengantar (PDF)</label>
                                <input type="file" name="surat_pengantar" id="surat_pengantar" class="form-control" accept=".pdf">
                                <small class="text-muted">Dari universitas atau lembaga terkait.</small><br>
                                @error('surat_pengantar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="foto" class="form-label fw-semibold">Foto Diri (JPG/PNG)</label>
                                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                                <small class="text-muted">Gunakan foto formal dengan ukuran maksimal 2MB.</small><br>
                                @error('foto')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                            <i class="bi bi-send-fill me-2"></i>Kirim Pendaftaran
                        </button>
                        <a href="{{ route('magang.index') }}" class="btn btn-outline-secondary btn-lg px-5 ms-2">
                            <i class="bi bi-arrow-left-circle me-2"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

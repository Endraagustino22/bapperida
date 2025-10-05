@extends('layouts.app')

@section('title', 'Form Pengajuan Penelitian')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0">Form Pengajuan Penelitian</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('penelitian.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Input Nama --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                            </div>

                            {{-- Input Judul --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Judul Penelitian</label>
                                <input type="text" name="judul_penelitian" class="form-control"
                                    placeholder="Masukkan judul penelitian" required>
                            </div>

                            {{-- Input Instansi --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Instansi</label>
                                <input type="text" name="instansi" class="form-control" placeholder="Nama instansi atau universitas" required>
                            </div>

                            {{-- Tujuan Penelitian --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tujuan Penelitian</label>
                                <textarea name="tujuan_penelitian" rows="4" class="form-control" placeholder="Tuliskan tujuan penelitian Anda..." required></textarea>
                            </div>

                            {{-- File Proposal --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">File Proposal (PDF)</label>
                                <input type="file" name="file_proposal" class="form-control" accept="application/pdf">
                                <div class="form-text text-muted">Format file harus PDF. Maksimal ukuran 10 MB.</div>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('penelitian.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-send"></i> Kirim Pengajuan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

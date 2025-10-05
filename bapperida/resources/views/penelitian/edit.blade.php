@extends('layouts.app')

@section('title', 'Edit Pengajuan Penelitian')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-primary mb-1">Edit Pengajuan Penelitian</h3>
                            <p class="text-muted mb-0">Perbarui data penelitian Anda dengan benar dan lengkap</p>
                        </div>

                        <hr class="mb-4">

                        <form action="{{ route('penelitian.update', $penelitian->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label text-muted small">Nama</label>
                                <input type="text" name="nama" class="form-control form-control-lg rounded-3"
                                    value="{{ $penelitian->nama }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted small">Judul Penelitian</label>
                                <input type="text" name="judul_penelitian"
                                    class="form-control form-control-lg rounded-3"
                                    value="{{ $penelitian->judul_penelitian }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted small">Instansi</label>
                                <input type="text" name="instansi" class="form-control form-control-lg rounded-3"
                                    value="{{ $penelitian->instansi }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted small">Tujuan Penelitian</label>
                                <textarea name="tujuan_penelitian" class="form-control rounded-3" rows="4"
                                    placeholder="Tuliskan tujuan atau latar belakang penelitian Anda...">{{ $penelitian->tujuan_penelitian }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-muted small">File Proposal (PDF)</label>
                                @if ($penelitian->file_proposal)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $penelitian->file_proposal) }}" target="_blank"
                                            class="btn btn-outline-primary btn-sm rounded-pill">
                                            <i class="bi bi-file-earmark-pdf me-2"></i>Lihat Proposal Lama
                                        </a>
                                    </div>
                                @endif
                                <input type="file" name="file_proposal" class="form-control rounded-3"
                                    accept="application/pdf">
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('penelitian.index') }}" class="btn btn-light border rounded-pill px-4">
                                    <i class="bi bi-arrow-left"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary rounded-pill px-4">
                                    <i class="bi bi-check-circle"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

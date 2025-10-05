@extends('layouts.app')

@section('title', 'Detail Pengajuan Penelitian')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold mb-1 text-primary">Detail Pengajuan Penelitian</h3>
                            <p class="text-muted mb-0">Informasi lengkap mengenai pengajuan Anda</p>
                        </div>

                        <hr class="mb-4">

                        <div class="mb-3">
                            <label class="text-muted small">Nama</label>
                            <p class="fs-6 fw-semibold">{{ $penelitian->nama }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="text-muted small">Judul Penelitian</label>
                            <p class="fs-6 fw-semibold">{{ $penelitian->judul_penelitian }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="text-muted small">Instansi</label>
                            <p class="fs-6 fw-semibold">{{ $penelitian->instansi }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="text-muted small">Tujuan Penelitian</label>
                            <p class="border rounded-3 p-3 bg-light">{{ $penelitian->tujuan_penelitian }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="text-muted small">Status</label><br>
                            @if ($penelitian->status == 'pending')
                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Menunggu</span>
                            @elseif($penelitian->status == 'disetujui')
                                <span class="badge bg-success px-3 py-2 rounded-pill">Disetujui</span>
                            @else
                                <span class="badge bg-danger px-3 py-2 rounded-pill">Ditolak</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="text-muted small">Proposal</label><br>
                            @if ($penelitian->file_proposal)
                                <a href="{{ asset('storage/' . $penelitian->file_proposal) }}" target="_blank"
                                    class="btn btn-outline-primary rounded-pill px-4 py-2">
                                    <i class="bi bi-file-earmark-pdf me-2"></i>Lihat Proposal
                                </a>
                            @else
                                <p class="text-muted fst-italic">Tidak ada file proposal yang diunggah.</p>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('penelitian.index') }}" class="btn btn-light border rounded-pill px-4">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('penelitian.edit', $penelitian->id) }}" class="btn btn-primary rounded-pill px-4">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

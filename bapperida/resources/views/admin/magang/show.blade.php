@extends('layouts.admin')

@section('title', 'Detail Pendaftaran Magang')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-semibold">
                <i class="bi bi-person-badge-fill me-2"></i> Detail Pendaftaran Magang
            </h3>
            <a href="{{ route('admin.magang.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-4 text-center">
                        @if ($magang->foto)
                            <img src="{{ asset('storage/' . $magang->foto) }}" alt="Foto" 
                                class="img-thumbnail rounded-3 shadow-sm" style="max-width: 200px;">
                        @else
                            <div class="border rounded-3 bg-light py-5">
                                <i class="bi bi-person-circle text-secondary" style="font-size: 4rem;"></i>
                                <p class="text-muted mt-2">Tidak ada foto</p>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-8">
                        <div class="mb-3">
                            <h5 class="fw-semibold text-dark">{{ $magang->nama }}</h5>
                            <span class="text-muted">Mahasiswa dari {{ $magang->universitas }}</span>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <strong>Jurusan:</strong>
                                <p class="mb-0">{{ $magang->jurusan }}</p>
                            </div>
                            <div class="col-sm-6">
                                <strong>No. HP:</strong>
                                <p class="mb-0">{{ $magang->no_hp }}</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <strong>Alamat:</strong>
                            <p class="mb-0">{{ $magang->alamat }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Status:</strong><br>
                            @if ($magang->status == 'menunggu')
                                <span class="badge bg-warning text-dark px-3 py-2">Menunggu</span>
                            @elseif ($magang->status == 'diterima')
                                <span class="badge bg-success px-3 py-2">Diterima</span>
                            @else
                                <span class="badge bg-danger px-3 py-2">Ditolak</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            @if ($magang->cv_file)
                                <a href="{{ asset('storage/' . $magang->cv_file) }}" target="_blank"
                                    class="btn btn-outline-info btn-sm me-2">
                                    <i class="bi bi-file-earmark-person-fill me-1"></i> Lihat CV
                                </a>
                            @endif
                            @if ($magang->surat_pengantar)
                                <a href="{{ asset('storage/' . $magang->surat_pengantar) }}" target="_blank"
                                    class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-envelope-paper-fill me-1"></i> Lihat Surat Pengantar
                                </a>
                            @endif
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('admin.magang.edit', $magang->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil-square me-1"></i> Edit Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

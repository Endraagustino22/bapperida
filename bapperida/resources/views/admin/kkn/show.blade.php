@extends('layouts.admin')

@section('title', 'Detail KKN')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Detail Pendaftaran KKN</h2>

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Nama Peneliti</div>
                    <div class="col-md-8">{{ $kkn->nama }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Judul KKN</div>
                    <div class="col-md-8">{{ $kkn->judul_kkn }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Instansi</div>
                    <div class="col-md-8">{{ $kkn->instansi }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Tujuan KKN</div>
                    <div class="col-md-8">{{ $kkn->tujuan_kkn ?? '-' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">File Proposal</div>
                    <div class="col-md-8">
                        @if ($kkn->file_proposal)
                            <a href="{{ asset('storage/' . $kkn->file_proposal) }}" target="_blank"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat Proposal
                            </a>
                        @else
                            <span class="text-muted">Tidak ada file</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Status</div>
                    <div class="col-md-8">
                        @if ($kkn->status == 'pending')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif($kkn->status == 'disetujui')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif($kkn->status == 'ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('admin.kkn.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection

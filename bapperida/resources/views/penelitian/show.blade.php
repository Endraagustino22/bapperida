@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Detail Pengajuan Penelitian</h3>

        <div class="card">
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $penelitian->nama }}</p>
                <p><strong>Judul:</strong> {{ $penelitian->judul_penelitian }}</p>
                <p><strong>Instansi:</strong> {{ $penelitian->instansi }}</p>
                <p><strong>Tujuan:</strong> {{ $penelitian->tujuan_penelitian }}</p>
                <p><strong>Status:</strong>
                    @if ($penelitian->status == 'pending')
                        <span class="badge bg-warning">Menunggu</span>
                    @elseif($penelitian->status == 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </p>
                <p><strong>Proposal:</strong>
                    @if ($penelitian->file_proposal)
                        <a href="{{ asset('storage/' . $penelitian->file_proposal) }}" target="_blank">Lihat Proposal</a>
                    @else
                        Tidak ada file
                    @endif
                </p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('penelitian.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('penelitian.edit', $penelitian->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
@endsection

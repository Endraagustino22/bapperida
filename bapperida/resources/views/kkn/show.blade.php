@extends('layouts.app')

@section('title', 'Detail KKN')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Detail Pendaftaran KKN</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $kkn->nama }}</p>
                <p><strong>Judul KKN:</strong> {{ $kkn->judul_kkn }}</p>
                <p><strong>Instansi:</strong> {{ $kkn->instansi }}</p>
                <p><strong>Tujuan:</strong> {{ $kkn->tujuan_kkn }}</p>
                <p><strong>Status:</strong>
                    @if ($kkn->status == 'pending')
                        <span class="badge bg-warning">Menunggu</span>
                    @elseif($kkn->status == 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </p>
                @if ($kkn->file_proposal)
                    <p><strong>Proposal:</strong> <a href="{{ asset('storage/' . $kkn->file_proposal) }}"
                            target="_blank">Lihat
                            File</a></p>
                @endif

                <a href="{{ route('kkn.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection

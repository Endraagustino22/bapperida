@extends('layouts.admin')

@section('title', 'Detail Pendaftaran Magang')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Detail Pendaftaran Magang</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nama:</strong> {{ $magang->nama }}
                </div>
                <div class="mb-3">
                    <strong>Universitas:</strong> {{ $magang->universitas }}
                </div>
                <div class="mb-3">
                    <strong>Jurusan:</strong> {{ $magang->jurusan }}
                </div>
                <div class="mb-3">
                    <strong>No HP:</strong> {{ $magang->no_hp }}
                </div>
                <div class="mb-3">
                    <strong>Alamat:</strong> {{ $magang->alamat }}
                </div>
                <div class="mb-3">
                    <strong>Status:</strong> {{ ucfirst($magang->status) }}
                </div>
                @if ($magang->cv_file)
                    <div class="mb-3">
                        <strong>CV:</strong> <a href="{{ asset('storage/' . $magang->cv_file) }}" target="_blank"
                            class="btn btn-sm btn-info">Lihat CV</a>
                    </div>
                @endif
                @if ($magang->surat_pengantar)
                    <div class="mb-3">
                        <strong>Surat Pengantar:</strong> <a href="{{ asset('storage/' . $magang->surat_pengantar) }}"
                            target="_blank" class="btn btn-sm btn-info">Lihat Surat</a>
                    </div>
                @endif
                @if ($magang->foto)
                    <div class="mb-3">
                        <strong>Foto:</strong><br>
                        <img src="{{ asset('storage/' . $magang->foto) }}" alt="Foto" class="img-fluid rounded"
                            style="max-width:200px;">
                    </div>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('admin.magang.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('admin.magang.edit', $magang->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Detail Pendaftaran Penelitian')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Detail Pendaftaran Penelitian</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nama Peneliti:</strong> {{ $penelitian->nama }}
                    <div class="mb-3">
                        <strong>Judul Penelitian:</strong> {{ $penelitian->judul_penelitian }}
                    </div>
                </div>
                <div class="mb-3">
                    <strong>Instansi:</strong> {{ $penelitian->instansi }}
                </div>
                <div class="mb-3">
                    <strong>Tujuan:</strong> {{ $penelitian->tujuan_penelitian }}
                </div>
                <div class="mb-3">
                    <strong>Status:</strong> {{ ucfirst($penelitian->status) }}
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('admin.penelitian.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('admin.penelitian.edit', $penelitian->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection

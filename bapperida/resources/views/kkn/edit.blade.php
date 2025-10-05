@extends('layouts.app')

@section('title', 'Edit Pendaftaran KKN')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Edit Pendaftaran KKN</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('kkn.update', $kkn->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Peserta</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            value="{{ old('nama', $kkn->nama) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="judul_kkn" class="form-label">Judul KKN</label>
                        <input type="text" name="judul_kkn" id="judul_kkn" class="form-control"
                            value="{{ old('judul_kkn', $kkn->judul_kkn) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" name="instansi" id="instansi" class="form-control"
                            value="{{ old('instansi', $kkn->instansi) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tujuan_kkn" class="form-label">Tujuan</label>
                        <textarea name="tujuan_kkn" id="tujuan_kkn" class="form-control">{{ old('tujuan_kkn', $kkn->tujuan_kkn) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="file_proposal" class="form-label">Upload Proposal Baru (PDF)</label>
                        <input type="file" name="file_proposal" id="file_proposal" class="form-control">
                        @if ($kkn->file_proposal)
                            <p class="mt-2">File saat ini: <a href="{{ asset('storage/' . $kkn->file_proposal) }}"
                                    target="_blank">Lihat Proposal</a></p>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('kkn.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

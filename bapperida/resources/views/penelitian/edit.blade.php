@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Edit Pengajuan Penelitian</h3>

        <form action="{{ route('penelitian.update', $penelitian->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $penelitian->nama }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Judul Penelitian</label>
                <input type="text" name="judul_penelitian" class="form-control"
                    value="{{ $penelitian->judul_penelitian }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Instansi</label>
                <input type="text" name="instansi" class="form-control" value="{{ $penelitian->instansi }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tujuan Penelitian</label>
                <textarea name="tujuan_penelitian" class="form-control">{{ $penelitian->tujuan_penelitian }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">File Proposal (PDF)</label>
                @if ($penelitian->file_proposal)
                    <p>File lama: <a href="{{ asset('storage/' . $penelitian->file_proposal) }}" target="_blank">Lihat
                            Proposal</a></p>
                @endif
                <input type="file" name="file_proposal" class="form-control" accept="application/pdf">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('penelitian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

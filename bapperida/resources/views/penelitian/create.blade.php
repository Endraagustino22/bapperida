@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Form Pengajuan Penelitian</h3>

        <form action="{{ route('penelitian.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Judul Penelitian</label>
                <input type="text" name="judul_penelitian" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Instansi</label>
                <input type="text" name="instansi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tujuan Penelitian</label>
                <textarea name="tujuan_penelitian" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">File Proposal (PDF)</label>
                <input type="file" name="file_proposal" class="form-control" accept="application/pdf">
            </div>

            <button type="submit" class="btn btn-success">Kirim Pengajuan</button>
            <a href="{{ route('penelitian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

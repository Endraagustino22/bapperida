@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Edit KKN</h3>

        <form action="{{ route('admin.kkn.update', $kkn->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ $kkn->nama }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Judul KKN</label>
                <input type="text" name="judul_kkn" value="{{ $kkn->judul_kkn }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Instansi</label>
                <input type="text" name="instansi" value="{{ $kkn->instansi }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tujuan KKN</label>
                <textarea name="tujuan_kkn" class="form-control">{{ $kkn->tujuan_kkn }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">File Proposal (PDF)</label>
                <input type="file" name="file_proposal" class="form-control" accept="application/pdf">
                @if ($kkn->file_proposal)
                    <p>File saat ini: <a href="{{ asset('storage/' . $kkn->file_proposal) }}" target="_blank">Lihat</a></p>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="pending" {{ $kkn->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="disetujui" {{ $kkn->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="ditolak" {{ $kkn->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.kkn.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Tambah KKN</h3>

        <form action="{{ route('admin.kkn.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Judul KKN</label>
                <input type="text" name="judul_kkn" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Instansi</label>
                <input type="text" name="instansi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tujuan KKN</label>
                <textarea name="tujuan_kkn" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">File Proposal (PDF)</label>
                <input type="file" name="file_proposal" class="form-control" accept="application/pdf">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="pending">Pending</option>
                    <option value="disetujui">Disetujui</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.kkn.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

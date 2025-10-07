@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <div class="card shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-body px-4 py-4">
            <h3 class="fw-semibold text-primary mb-4">
                <i class="bi bi-mortarboard-fill me-2"></i> Tambah KKN
            </h3>

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('admin.kkn.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-secondary">Nama</label>
                        <input type="text" name="nama" class="form-control border-primary" placeholder="Masukkan nama peserta" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-secondary">Judul KKN</label>
                        <input type="text" name="judul_kkn" class="form-control border-primary" placeholder="Masukkan judul KKN" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-secondary">Instansi</label>
                        <input type="text" name="instansi" class="form-control border-primary" placeholder="Masukkan instansi tujuan" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-secondary">Status</label>
                        <select name="status" class="form-select border-primary" required>
                            <option value="pending">Pending</option>
                            <option value="disetujui">Disetujui</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-secondary">Tujuan KKN</label>
                    <textarea name="tujuan_kkn" class="form-control border-primary" rows="3" placeholder="Jelaskan tujuan kegiatan KKN..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-secondary">File Proposal (PDF)</label>
                    <input type="file" name="file_proposal" class="form-control border-primary" accept="application/pdf">
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="bi bi-save-fill me-1"></i> Simpan
                    </button>
                    <a href="{{ route('admin.kkn.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-arrow-left-circle me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

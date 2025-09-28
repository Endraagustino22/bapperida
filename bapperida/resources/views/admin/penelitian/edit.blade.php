@extends('layouts.admin')

@section('title', 'Edit Pendaftaran Penelitian')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Edit Pendaftaran Penelitian</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.penelitian.update', $penelitian->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Peneliti</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            value="{{ old('nama', $penelitian->nama) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="judul_penelitian" class="form-label">Judul Penelitian</label>
                        <input type="text" name="judul_penelitian" id="judul_penelitian" class="form-control"
                            value="{{ old('judul_penelitian', $penelitian->judul_penelitian) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="instansi" class="form-label">Instansi</label>
                            <input type="text" name="instansi" id="instansi" class="form-control"
                                value="{{ old('instansi', $penelitian->instansi) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tujuan_penelitian" class="form-label">Tujuan</label>
                            <input type="text" name="tujuan_penelitian" id="tujuan_penelitian" class="form-control"
                                value="{{ old('tujuan_penelitian', $penelitian->tujuan_penelitian) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="pending" {{ $penelitian->status == 'pending' ? 'selected' : '' }}>Menunggu
                            </option>
                            <option value="disetujui" {{ $penelitian->status == 'disetujui' ? 'selected' : '' }}>Diterima
                            </option>
                            <option value="ditolak" {{ $penelitian->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                            </option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('admin.penelitian.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

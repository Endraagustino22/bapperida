@extends('layouts.admin')

@section('title', 'Tambah Pendaftaran Penelitian')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Tambah Pendaftaran Penelitian</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.penelitian.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Penelitian</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_peneliti" class="form-label">Nama Peneliti</label>
                        <input type="text" name="nama_peneliti" id="nama_peneliti" class="form-control"
                            value="{{ old('nama_peneliti') }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="universitas" class="form-label">Universitas</label>
                            <input type="text" name="universitas" id="universitas" class="form-control"
                                value="{{ old('universitas') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control"
                                value="{{ old('jurusan') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="menunggu" selected>Menunggu</option>
                            <option value="diterima">Diterima</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.penelitian.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

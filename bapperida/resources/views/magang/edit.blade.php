@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Edit Pendaftaran Magang</h2>
        <form action="{{ route('magang.update', $pesertaMagang->id) }}" method="POST" enctype="multipart/form-data"
            class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $pesertaMagang->nama) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Universitas</label>
                <input type="text" name="universitas" value="{{ old('universitas', $pesertaMagang->universitas) }}"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Jurusan</label>
                <input type="text" name="jurusan" value="{{ old('jurusan', $pesertaMagang->jurusan) }}"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $pesertaMagang->no_hp) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat', $pesertaMagang->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label>CV (PDF)</label>
                <input type="file" name="cv_file" class="form-control">
                @if ($pesertaMagang->cv_file)
                    <p>File sekarang: <a href="{{ asset('storage/' . $pesertaMagang->cv_file) }}" target="_blank">Lihat CV</a>
                    </p>
                @endif
            </div>

            <div class="mb-3">
                <label>Surat Pengantar (PDF)</label>
                <input type="file" name="surat_pengantar" class="form-control">
                @if ($pesertaMagang->surat_pengantar)
                    <p>File sekarang: <a href="{{ asset('storage/' . $pesertaMagang->surat_pengantar) }}"
                            target="_blank">Lihat Surat</a></p>
                @endif
            </div>

            <div class="mb-3">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
                @if ($pesertaMagang->foto)
                    <img src="{{ asset('storage/' . $pesertaMagang->foto) }}" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('magang.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

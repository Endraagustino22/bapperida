@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Data KKN</h3>
        <a href="{{ route('admin.kkn.create') }}" class="btn btn-primary mb-3">+ Tambah KKN</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Judul KKN</th>
                    <th>Instansi</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kkns as $kkn)
                    <tr>
                        <td>{{ $kkn->nama }}</td>
                        <td>{{ $kkn->judul_kkn }}</td>
                        <td>{{ $kkn->instansi }}</td>
                        <td>{{ $kkn->tujuan_kkn }}</td>
                        <td>
                            <span
                                class="badge bg-{{ $kkn->status == 'disetujui' ? 'success' : ($kkn->status == 'ditolak' ? 'danger' : 'warning') }}">
                                {{ ucfirst($kkn->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.kkn.show', $kkn->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('admin.kkn.edit', $kkn->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.kkn.destroy', $kkn->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data KKN</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

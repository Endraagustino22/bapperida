@extends('layouts.app')

@section('title', 'Daftar KKN Saya')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Daftar KKN Saya</h1>

        <a href="{{ route('kkn.create') }}" class="btn btn-primary mb-3">+ Daftar KKN</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Judul KKN</th>
                            <th>Instansi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kkns as $kkn)
                            <tr>
                                <td>{{ $kkn->nama }}</td>
                                <td>{{ $kkn->judul_kkn }}</td>
                                <td>{{ $kkn->instansi }}</td>
                                <td>
                                    @if ($kkn->status == 'pending')
                                        <span class="badge bg-warning">Menunggu</span>
                                    @elseif($kkn->status == 'disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('kkn.show', $kkn->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('kkn.edit', $kkn->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kkn.destroy', $kkn->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin hapus data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data KKN</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $kkns->links() }}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Daftar Pengajuan Penelitian Saya</h3>

        <a href="{{ route('penelitian.create') }}" class="btn btn-primary mb-3">
            + Ajukan Penelitian
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Instansi</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Proposal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penelitians as $p)
                    <tr>
                        <td>{{ $p->judul_penelitian }}</td>
                        <td>{{ $p->instansi }}</td>
                        <td>{{ $p->waktu_mulai }} s/d {{ $p->waktu_selesai }}</td>
                        <td>
                            @if ($p->status == 'pending')
                                <span class="badge bg-warning">Menunggu</span>
                            @elseif($p->status == 'disetujui')
                                <span class="badge bg-success">Disetujui</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                        <td>
                            @if ($p->file_proposal)
                                <a href="{{ asset('storage/' . $p->file_proposal) }}" target="_blank">Lihat</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('penelitian.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('penelitian.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('penelitian.destroy', $p->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada pengajuan penelitian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

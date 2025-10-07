@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-semibold text-primary">
            <i class="bi bi-mortarboard-fill me-2"></i> Data KKN
        </h3>
        <a href="{{ route('admin.kkn.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah KKN
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    <thead class="table-primary text-center">
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
                            <tr class="text-center">
                                <td>{{ $kkn->nama }}</td>
                                <td>{{ $kkn->judul_kkn }}</td>
                                <td>{{ $kkn->instansi }}</td>
                                <td>{{ $kkn->tujuan_kkn }}</td>
                                <td>
                                    <span class="badge bg-{{ 
                                        $kkn->status == 'disetujui' ? 'success' : 
                                        ($kkn->status == 'ditolak' ? 'danger' : 'warning') 
                                    }} px-3 py-2">
                                        {{ ucfirst($kkn->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.kkn.show', $kkn->id) }}" 
                                       class="btn btn-info btn-sm me-1">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{ route('admin.kkn.edit', $kkn->id) }}" 
                                       class="btn btn-warning btn-sm me-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.kkn.destroy', $kkn->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus data ini?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    <i class="bi bi-folder2-open fs-4 d-block mb-2"></i>
                                    Belum ada data KKN
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

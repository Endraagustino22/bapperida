<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesertaMagang;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $peserta = PesertaMagang::with('user')->latest()->paginate(10);
        return view('view-magang.admin.peserta.index', compact('peserta'));
    }

    public function show($id)
    {
        $peserta = PesertaMagang::with('user')->findOrFail($id);
        return view('view-magang.admin.peserta.show', compact('peserta'));
    }

    public function edit($id)
    {
        $peserta = PesertaMagang::findOrFail($id);
        return view('view-magang.admin.peserta.edit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        $peserta = PesertaMagang::findOrFail($id);

        $request->validate([
            'status' => 'required|in:Menunggu,Diterima,Ditolak',
            'alasan_penolakan' => 'nullable|string',
        ]);

        $peserta->update($request->only('status', 'alasan_penolakan'));

        return redirect()->route('admin.peserta.index')->with('success', 'Status peserta berhasil diperbarui');
    }

    public function destroy($id)
    {
        $peserta = PesertaMagang::findOrFail($id);
        $peserta->delete();

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil dihapus');
    }
}

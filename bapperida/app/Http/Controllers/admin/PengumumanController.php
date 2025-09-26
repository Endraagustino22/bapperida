<?php

namespace App\Http\Controllers\admin;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PengumumanController extends Controller
{
    /**
     * Tampilkan semua pengumuman (admin).
     */
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);
        return view('view-magang.admin.pengumuman.index', compact('pengumuman'));
    }

    /**
     * Form tambah pengumuman.
     */
    public function create()
    {
        return view('view-magang.admin.pengumuman.create');
    }

    /**
     * Simpan pengumuman baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'tanggal' => 'required|date',
            'file_pengumuman' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file_pengumuman')) {
            $filePath = $request->file('file_pengumuman')->store('pengumuman', 'public');
        }

        Pengumuman::create([
            'judul' => $request->judul,
            'isi'   => $request->isi,
            'tanggal' => $request->tanggal,
            'file_pengumuman' => $filePath,
        ]);

        return redirect()->route('admin.pengumuman.index')
                         ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    /**
     * Form edit pengumuman.
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('view-magang.admin.pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update pengumuman.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'tanggal' => 'required|date',
            'file_pengumuman' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $pengumuman->file_pengumuman;
        if ($request->hasFile('file_pengumuman')) {
            // hapus file lama
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_pengumuman')->store('pengumuman', 'public');
        }

        $pengumuman->update([
            'judul' => $request->judul,
            'isi'   => $request->isi,
            'tanggal' => $request->tanggal,
            'file_pengumuman' => $filePath,
        ]);

        return redirect()->route('admin.pengumuman.index')
                         ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Hapus pengumuman.
     */
    public function destroy(Pengumuman $pengumuman)
    {
        if ($pengumuman->file_pengumuman && Storage::disk('public')->exists($pengumuman->file_pengumuman)) {
            Storage::disk('public')->delete($pengumuman->file_pengumuman);
        }

        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')
                         ->with('success', 'Pengumuman berhasil dihapus.');
    }

    public function show($id)
{
    $pengumuman = Pengumuman::findOrFail($id);

    return view('view-magang.peserta-magang.pengumuman.show', compact('pengumuman'));
}


    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use Illuminate\Http\Request;

class AdminPenelitianController extends Controller
{
    public function index()
    {
        $penelitians = Penelitian::latest()->paginate(10);
        return view('admin.penelitian.index', compact('penelitians'));
    }

    public function create()
    {
        return view('admin.penelitian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul_penelitian' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'tujuan_penelitian' => 'nullable|string',
            'file_proposal' => 'nullable|mimes:pdf|max:2048',
            'status' => 'required|in:pending,disetujui,ditolak',
        ]);

        $file = null;
        if ($request->hasFile('file_proposal')) {
            $file = $request->file('file_proposal')->store('proposal', 'public');
        }

        Penelitian::create([
            'user_id' => $request->user_id ?? null, // bisa kosong kalau admin yg buat
            'nama' => $request->nama,
            'judul_penelitian' => $request->judul_penelitian,
            'instansi' => $request->instansi,
            'tujuan_penelitian' => $request->tujuan_penelitian,
            'file_proposal' => $file,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.penelitian.index')->with('success', 'Data penelitian berhasil ditambahkan.');
    }

    public function show($id)
    {
        $penelitian = Penelitian::findOrFail($id);
        return view('admin.penelitian.show', compact('penelitian'));
    }

    public function edit($id)
    {
        $penelitian = Penelitian::findOrFail($id);
        return view('admin.penelitian.edit', compact('penelitian'));
    }

    public function update(Request $request, $id)
    {
        $penelitian = Penelitian::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'judul_penelitian' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'tujuan_penelitian' => 'nullable|string',
            'file_proposal' => 'nullable|mimes:pdf|max:2048',
            'status' => 'required|in:pending,disetujui,ditolak',
        ]);

        $data = $request->only(['nama', 'judul_penelitian', 'instansi', 'tujuan_penelitian', 'status']);

        if ($request->hasFile('file_proposal')) {
            $data['file_proposal'] = $request->file('file_proposal')->store('proposal', 'public');
        }

        $penelitian->update($data);

        return redirect()->route('admin.penelitian.index')->with('success', 'Data penelitian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Penelitian::findOrFail($id)->delete();
        return redirect()->route('admin.penelitian.index')->with('success', 'Data penelitian berhasil dihapus.');
    }
}

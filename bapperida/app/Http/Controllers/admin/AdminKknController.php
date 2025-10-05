<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kkn;

class AdminKknController extends Controller
{
    // Menampilkan semua data KKN
    public function index()
    {
        $kkns = Kkn::latest()->paginate(10);
        return view('admin.kkn.index', compact('kkns'));
    }

    // Form tambah data
    public function create()
    {
        return view('admin.kkn.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul_kkn' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'tujuan_kkn' => 'nullable|string',
            'file_proposal' => 'nullable|mimes:pdf|max:2048',
            'status' => 'required|in:pending,disetujui,ditolak',
        ]);

        $data = $request->only(['nama', 'judul_kkn', 'instansi', 'tujuan_kkn', 'status']);

        if ($request->hasFile('file_proposal')) {
            $data['file_proposal'] = $request->file('file_proposal')->store('proposal_kkn', 'public');
        }

        Kkn::create($data);

        return redirect()->route('admin.kkn.index')
            ->with('success', 'Data KKN berhasil ditambahkan');
    }

    // Menampilkan detail data
    public function show($id)
    {
        $kkn = Kkn::findOrFail($id);
        return view('admin.kkn.show', compact('kkn'));
    }

    // Form edit data
    public function edit($id)
    {
        $kkn = Kkn::findOrFail($id);
        return view('admin.kkn.edit', compact('kkn'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul_kkn' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'tujuan_kkn' => 'nullable|string',
            'file_proposal' => 'nullable|mimes:pdf|max:2048',
            'status' => 'required|in:pending,disetujui,ditolak',
        ]);

        $kkn = Kkn::findOrFail($id);

        $data = $request->only(['nama', 'judul_kkn', 'instansi', 'tujuan_kkn', 'status']);

        if ($request->hasFile('file_proposal')) {
            $data['file_proposal'] = $request->file('file_proposal')->store('proposal_kkn', 'public');
        }

        $kkn->update($data);

        return redirect()->route('admin.kkn.index')
            ->with('success', 'Data KKN berhasil diupdate');
    }

    // Hapus data
    public function destroy($id)
    {
        $kkn = Kkn::findOrFail($id);
        $kkn->delete();

        return redirect()->route('admin.kkn.index')
            ->with('success', 'Data KKN berhasil dihapus');
    }
}

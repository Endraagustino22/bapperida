<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penelitian;
use Illuminate\Support\Facades\Auth;

class PenelitianController extends Controller
{
    public function index()
    {
        $penelitians = Penelitian::where('user_id', Auth::id())->get();
        return view('penelitian.index', compact('penelitians'));
    }

    public function create()
    {
        return view('penelitian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul_penelitian' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'tujuan_penelitian' => 'nullable|string',
            'file_proposal' => 'nullable|mimes:pdf|max:2048',
        ]);

        $file = null;
        if ($request->hasFile('file_proposal')) {
            $file = $request->file('file_proposal')->store('proposal', 'public');
        }

        Penelitian::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'judul_penelitian' => $request->judul_penelitian,
            'instansi' => $request->instansi,
            'tujuan_penelitian' => $request->tujuan_penelitian,
            'file_proposal' => $file,
            'status' => 'pending',
        ]);

        return redirect()->route('penelitian.index')->with('success', 'Pengajuan penelitian berhasil diajukan');
    }

    public function show($id)
    {
        $penelitian = Penelitian::where('user_id', Auth::id())->findOrFail($id);
        return view('penelitian.show', compact('penelitian'));
    }

    public function edit($id)
    {
        $penelitian = Penelitian::where('user_id', Auth::id())->findOrFail($id);
        return view('penelitian.edit', compact('penelitian'));
    }

    public function update(Request $request, $id)
    {
        $penelitian = Penelitian::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'judul_penelitian' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'tujuan_penelitian' => 'nullable|string',
            'file_proposal' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only(['nama', 'judul_penelitian', 'instansi', 'tujuan_penelitian']);

        if ($request->hasFile('file_proposal')) {
            $data['file_proposal'] = $request->file('file_proposal')->store('proposal', 'public');
        }

        $penelitian->update($data);

        return redirect()->route('penelitian.index')->with('success', 'Pengajuan penelitian berhasil diperbarui');
    }

    public function destroy($id)
    {
        $penelitian = Penelitian::where('user_id', Auth::id())->findOrFail($id);
        $penelitian->delete();

        return redirect()->route('penelitian.index')->with('success', 'Pengajuan penelitian berhasil dihapus');
    }
}

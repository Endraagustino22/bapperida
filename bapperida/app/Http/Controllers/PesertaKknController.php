<?php

namespace App\Http\Controllers;

use App\Models\Kkn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaKknController extends Controller
{
    public function index()
    {
        $kkns = Kkn::where('user_id', Auth::id())->latest()->paginate(10);
        return view('kkn.index', compact('kkns'));
    }

    public function create()
    {
        return view('kkn.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul_kkn' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'tujuan_kkn' => 'nullable|string',
            'file_proposal' => 'nullable|mimes:pdf|max:2048',
        ]);

        $file = null;
        if ($request->hasFile('file_proposal')) {
            $file = $request->file('file_proposal')->store('proposal_kkn', 'public');
        }

        Kkn::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'judul_kkn' => $request->judul_kkn,
            'instansi' => $request->instansi,
            'tujuan_kkn' => $request->tujuan_kkn,
            'file_proposal' => $file,
            'status' => 'pending',
        ]);

        return redirect()->route('kkn.index')->with('success', 'Pendaftaran KKN berhasil dikirim.');
    }

    public function show($id)
    {
        $kkn = Kkn::where('user_id', Auth::id())->findOrFail($id);
        return view('kkn.show', compact('kkn'));
    }

    public function edit($id)
    {
        $kkn = Kkn::where('user_id', Auth::id())->findOrFail($id);
        return view('kkn.edit', compact('kkn'));
    }

    public function update(Request $request, $id)
    {
        $kkn = Kkn::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'judul_kkn' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'tujuan_kkn' => 'nullable|string',
            'file_proposal' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only(['nama', 'judul_kkn', 'instansi', 'tujuan_kkn']);

        if ($request->hasFile('file_proposal')) {
            $data['file_proposal'] = $request->file('file_proposal')->store('proposal_kkn', 'public');
        }

        $kkn->update($data);

        return redirect()->route('kkn.index')->with('success', 'Pendaftaran KKN berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kkn = Kkn::where('user_id', Auth::id())->findOrFail($id);
        $kkn->delete();

        return redirect()->route('kkn.index')->with('success', 'Pendaftaran KKN berhasil dihapus.');
    }
}

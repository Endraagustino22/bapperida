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
            'judul_penelitian' => 'required',
            'instansi' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'file_proposal' => 'nullable|mimes:pdf|max:2048',
        ]);

        $file = null;
        if ($request->hasFile('file_proposal')) {
            $file = $request->file('file_proposal')->store('proposal', 'public');
        }

        Penelitian::create([
            'user_id' => Auth::id(),

            'judul_penelitian' => $request->judul_penelitian,
            'instansi' => $request->instansi,
            'tujuan_penelitian' => $request->tujuan_penelitian,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'file_proposal' => $file,
        ]);

        return redirect()->route('penelitian.index')->with('success', 'Pengajuan penelitian berhasil diajukan');
    }


    /**
     * Display the specified resource.
     */
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
            'judul_penelitian' => 'required',
            'instansi' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'file_proposal' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only(['judul_penelitian', 'instansi', 'tujuan_penelitian', 'waktu_mulai', 'waktu_selesai']);

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

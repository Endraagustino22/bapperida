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
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'dosen_pembimbing' => 'nullable|string|max:255',
            'tahun' => 'nullable|integer',
        ]);

        Penelitian::create($request->all());
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
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'dosen_pembimbing' => 'nullable|string|max:255',
            'tahun' => 'nullable|integer',
        ]);

        $penelitian->update($request->all());
        return redirect()->route('admin.penelitian.index')->with('success', 'Data penelitian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Penelitian::findOrFail($id)->delete();
        return redirect()->route('admin.penelitian.index')->with('success', 'Data penelitian berhasil dihapus.');
    }
}

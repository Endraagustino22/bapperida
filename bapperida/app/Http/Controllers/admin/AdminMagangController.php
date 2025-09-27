<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesertaMagang;
use Illuminate\Http\Request;

class AdminMagangController extends Controller
{
    public function index()
    {
        $magangs = PesertaMagang::latest()->paginate(10);
        return view('admin.magang.index', compact('magangs'));
    }

    public function create()
    {
        return view('admin.magang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'universitas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        PesertaMagang::create($request->all());

        return redirect()->route('admin.magang.index')->with('success', 'Data magang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $magang = PesertaMagang::findOrFail($id);
        return view('admin.magang.show', compact('magang'));
    }

    public function edit($id)
    {
        $magang = PesertaMagang::findOrFail($id);
        return view('admin.magang.edit', compact('magang'));
    }

    public function update(Request $request, $id)
    {
        $magang = PesertaMagang::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'universitas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $magang->update($request->all());

        return redirect()->route('admin.magang.index')->with('success', 'Data magang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PesertaMagang::findOrFail($id)->delete();
        return redirect()->route('admin.magang.index')->with('success', 'Data magang berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PesertaMagang;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PesertaMagangController extends Controller
{
    // Halaman awal Magang
    public function index()
    {
        $user = Auth::user();
        $pesertaMagang = PesertaMagang::where('user_id', $user->id)->latest()->first();
        $pengumuman = Pengumuman::latest()->first();

        return view('magang.index', compact('pesertaMagang', 'pengumuman'));
    }

    // Form pendaftaran
    public function create()
    {
        return view('magang.create');
    }

    // Simpan data pendaftaran
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'nullable|string|max:50',
            'nama' => 'required|string|max:50',
            'universitas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'nullable|string',
            'cv_file' => 'nullable|mimes:pdf|max:2048',
            'surat_pengantar' => 'nullable|mimes:pdf|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nim', 'nama', 'universitas', 'jurusan', 'no_hp', 'alamat']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('cv_file')) {
            $data['cv_file'] = $request->file('cv_file')->store('cv', 'public');
        }
        if ($request->hasFile('surat_pengantar')) {
            $data['surat_pengantar'] = $request->file('surat_pengantar')->store('surat_pengantar', 'public');
        }
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        PesertaMagang::create($data);

        return redirect()->route('magang.index')->with('success', 'Pendaftaran magang berhasil dikirim.');
    }

    // Edit data pendaftaran
    public function edit($id)
    {
        $pesertaMagang = PesertaMagang::findOrFail($id);

        if ($pesertaMagang->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak');
        }

        return view('magang.edit', compact('pesertaMagang'));
    }

    // Update data pendaftaran
    public function update(Request $request, $id)
    {
        $pesertaMagang = PesertaMagang::findOrFail($id);

        if ($pesertaMagang->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'universitas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'cv_file' => 'nullable|mimes:pdf|max:2048',
            'surat_pengantar' => 'nullable|mimes:pdf|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'universitas', 'jurusan', 'no_hp', 'alamat']);

        if ($request->hasFile('cv_file')) {
            $data['cv_file'] = $request->file('cv_file')->store('cv', 'public');
        }
        if ($request->hasFile('surat_pengantar')) {
            $data['surat_pengantar'] = $request->file('surat_pengantar')->store('surat_pengantar', 'public');
        }
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $pesertaMagang->update($data);

        return redirect()->route('magang.index')->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

    // Lihat status pendaftaran
    public function status()
    {
        $pesertaMagang = PesertaMagang::where('user_id', Auth::id())->first();
        return view('magang.status', compact('pesertaMagang'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PesertaMagang;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PesertaMagangController extends Controller
{
    /**
     * Tampilkan form pendaftaran magang
     */
    public function dashboard()
    {
        $user = Auth::user();
        $pesertaMagang = PesertaMagang::where('user_id', $user->id)->latest()->first();
        $pengumuman = Pengumuman::latest()->first();

        return view('view-magang.peserta-magang.dashboard', compact('pesertaMagang', 'pengumuman'));
    }



    public function create()
    {
        return view('view-magang.peserta-magang.create');
    }

    /**
     * Simpan data pendaftaran magang
     */
    public function store(Request $request)
{
    $request->validate([
        'nim'             => 'nullable|string|max:50',
        'nama'            => 'nullable|string|max:50',
        'universitas'     => 'required|string|max:255',
        'jurusan'         => 'required|string|max:255',
        'no_hp'           => 'required|string|max:20',
        'alamat'          => 'nullable|string',
        'cv_file'         => 'nullable|mimes:pdf|max:2048',
        'surat_pengantar' => 'nullable|mimes:pdf|max:2048',
        'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    try {
        $data = $request->only([
            'nim', 'nama', 'universitas', 'jurusan', 'no_hp', 'alamat'
        ]);

        $data['user_id'] = Auth::id();

        // Upload file jika ada
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

        return redirect()->route('peserta.dashboard')
                         ->with('success', 'Pendaftaran magang berhasil dikirim.');

    } catch (\Exception $e) {

        // Kembali ke form dengan pesan error
        return redirect()->back()
                         ->withInput()
                         ->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
    }
}


    /**
     * Lihat status pendaftaran peserta
     */
    public function status()
    {
        $peserta = PesertaMagang::where('user_id', Auth::id())->first();

        return view('view-magang.peserta-magang.status', compact('peserta'));
    }

    /**
     * Edit data pendaftaran (opsional)
     */
    public function edit($id)
{
    $pesertaMagang = PesertaMagang::where('user_id', $id)->firstOrFail();
    // cek agar peserta hanya bisa edit datanya sendiri
    if ($pesertaMagang->user_id !== Auth::id()) {
        abort(403, 'Akses ditolak');
    }

    return view('view-magang.peserta-magang.edit', compact('pesertaMagang'));
}

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
        'cv' => 'nullable|mimes:pdf|max:2048',
        'surat_pengantar' => 'nullable|mimes:pdf|max:2048',
        'foto' => 'nullable|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only(['nama', 'universitas', 'jurusan', 'no_hp', 'alamat']);

    if ($request->hasFile('cv')) {
        $data['cv'] = $request->file('cv')->store('cv', 'public');
    }
    if ($request->hasFile('surat_pengantar')) {
        $data['surat_pengantar'] = $request->file('surat_pengantar')->store('surat_pengantar', 'public');
    }
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('foto', 'public');
    }

    $pesertaMagang->update($data);

    return redirect()->route('peserta.status')->with('success', 'Data pendaftaran berhasil diperbarui.');
}



}

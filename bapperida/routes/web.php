<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');




// // ========================
// // 🔹 PUBLIC ROUTES (Tanpa Login)
// // ========================

//     // Halaman beranda (landing page)
//     Route::get('/', [HomeController::class, 'index'])->name('home');

//     // Halaman tentang program magang Bapperida
//     Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');

//     // Formulir pendaftaran magang (tampil form)
//     Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.form');

//     // Proses simpan data pendaftaran ke database
//     Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

//     // Halaman daftar pengumuman hasil seleksi
//     Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');

//     // Detail pengumuman tertentu (misal hasil seleksi batch 1)
//     Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');


// // ========================
// // 🔹 PESERTA ROUTES (Login Sebagai Peserta)
// // ========================
// Route::middleware(['auth', 'role:peserta'])->group(function () {
    
//     // Dashboard peserta → menampilkan status pendaftaran
//     Route::get('/peserta/dashboard', [PesertaController::class, 'dashboard'])->name('peserta.dashboard');
    
//     // Halaman profil peserta → biodata & dokumen yang diunggah
//     Route::get('/peserta/profile', [PesertaController::class, 'profile'])->name('peserta.profile');
    
//     // Proses update/edit profil peserta
//     Route::post('/peserta/profile/update', [PesertaController::class, 'updateProfile'])->name('peserta.update');
// });


// // ========================
// // 🔹 ADMIN ROUTES (Login Sebagai Admin)
// // ========================
// Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    
//     // Dashboard admin → ringkasan data pendaftar
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

//     // Daftar semua pendaftar magang
//     Route::get('/pendaftar', [PendaftarController::class, 'index'])->name('admin.pendaftar.index');
    
//     // Detail pendaftar tertentu (lihat biodata + download dokumen)
//     Route::get('/pendaftar/{id}', [PendaftarController::class, 'show'])->name('admin.pendaftar.show');
    
//     // Update status pendaftar (menunggu → diterima/ditolak)
//     Route::post('/pendaftar/{id}/status', [PendaftarController::class, 'updateStatus'])->name('admin.pendaftar.status');

//     // Manajemen pengumuman → daftar semua pengumuman
//     Route::get('/pengumuman', [PengumumanController::class, 'adminIndex'])->name('admin.pengumuman.index');
    
//     // Form tambah pengumuman baru
//     Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('admin.pengumuman.create');
    
//     // Simpan pengumuman baru ke database
//     Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('admin.pengumuman.store');
    
//     // Edit pengumuman yang sudah ada
//     Route::get('/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('admin.pengumuman.edit');
    
//     // Proses update pengumuman
//     Route::post('/pengumuman/{id}', [PengumumanController::class, 'update'])->name('admin.pengumuman.update');
    
//     // Hapus pengumuman tertentu
//     Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('admin.pengumuman.destroy');

//     // Export data pendaftar ke Excel
//     Route::get('/export/excel', [ExportController::class, 'excel'])->name('admin.export.excel');
    
//     // Export data pendaftar ke PDF
//     Route::get('/export/pdf', [ExportController::class, 'pdf'])->name('admin.export.pdf');
// });




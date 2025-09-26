<?php

use App\Http\Controllers\PesertaMagangController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\PengumumanController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('home');


// Route Pendaftaran Magang

    //Route Authentikasi
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    //Route Peserta Magang

    Route::middleware(['auth', 'role:peserta'])->group(function () {
        Route::get('/peserta/dashboard', [PesertaMagangController::class, 'dashboard'])->name('peserta.dashboard');
        Route::get('/pendaftaran', [PesertaMagangController::class, 'create'])->name('pendaftaran.create');
        Route::post('/pendaftaran', [PesertaMagangController::class, 'store'])->name('pendaftaran.store');
        Route::get('/status', [PesertaMagangController::class, 'status'])->name('peserta.status');
        Route::get('/pendaftaran/{id}/edit', [PesertaMagangController::class, 'edit'])->name('pendaftaran.edit');
        Route::put('/pendaftaran/{id}', [PesertaMagangController::class, 'update'])->name('pendaftaran.update');
        
        
        // daftar pengumuman
    Route::get('pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    // detail pengumuman
    Route::get('pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
    });

    // Group route admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Manajemen Peserta Magang
    Route::resource('peserta', PesertaController::class);

    // Manajemen Pengumuman
    Route::resource('pengumuman', PengumumanController::class);
});




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




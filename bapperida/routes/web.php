<?php

use App\Http\Controllers\PesertaMagangController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\PengumumanController;

// ubah nk ws ono dashboard inti
Route::get('/', [AuthController::class, 'showLoginForm'])->name('home');



// Route Pendaftaran Magang

    //Grop route Authentikasi
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    // Group route Peserta Magang
    Route::middleware(['auth', 'role:peserta'])->group(function () {
        Route::get('/peserta/dashboard', [PesertaMagangController::class, 'dashboard'])->name('peserta.dashboard');
        Route::get('/pendaftaran', [PesertaMagangController::class, 'create'])->name('pendaftaran.create');
        Route::post('/pendaftaran', [PesertaMagangController::class, 'store'])->name('pendaftaran.store');
        Route::get('/status', [PesertaMagangController::class, 'status'])->name('peserta.status');
        Route::get('/pendaftaran/{id}/edit', [PesertaMagangController::class, 'edit'])->name('pendaftaran.edit');
        Route::put('/pendaftaran/{id}', [PesertaMagangController::class, 'update'])->name('pendaftaran.update');
        
        Route::get('pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
        Route::get('pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
        });


    // Group route admin
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('peserta', PesertaController::class);
        Route::resource('pengumuman', PengumumanController::class);
});

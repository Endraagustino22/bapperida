<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaMagangController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminMagangController;
use App\Http\Controllers\Admin\AdminPenelitianController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPengumumanController;
use App\Http\Controllers\Admin\AdminKknController;

/*
|--------------------------------------------------------------------------
| Halaman Utama (Home)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home'); // halaman umum sekaligus jadi "dashboard" peserta
})->name('home');

/*
|--------------------------------------------------------------------------
| Autentikasi
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Route Peserta (role: peserta)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:peserta'])->group(function () {
    // Magang
    Route::get('/magang', [PesertaMagangController::class, 'index'])->name('magang.index');
    Route::get('/magang/create', [PesertaMagangController::class, 'create'])->name('magang.create');
    Route::post('/magang', [PesertaMagangController::class, 'store'])->name('magang.store');
    Route::get('/magang/{id}/edit', [PesertaMagangController::class, 'edit'])->name('magang.edit');
    Route::put('/magang/{id}', [PesertaMagangController::class, 'update'])->name('magang.update');
    Route::get('/magang/status', [PesertaMagangController::class, 'status'])->name('magang.status');

    // Penelitian
    Route::resource('penelitian', PenelitianController::class);
});


/*
|--------------------------------------------------------------------------
| Route Admin (role: admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('magang', AdminMagangController::class);
    Route::resource('penelitian', AdminPenelitianController::class);
    Route::resource('kkn', AdminKknController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('pengumuman', AdminPengumumanController::class);
});

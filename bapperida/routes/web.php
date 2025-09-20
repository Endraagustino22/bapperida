<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/profil', fn() => view('profil'))->name('profil');
Route::get('/dokumen', fn() => view('dokumen'))->name('dokumen');
Route::get('/riset', fn() => view('riset'))->name('riset');
Route::get('/layanan', fn() => view('layanan'))->name('layanan');
Route::get('/berita', fn() => view('berita'))->name('berita');
Route::get('/kontak', fn() => view('kontak'))->name('kontak');

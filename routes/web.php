<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\KategoriController;


Route::get('/', function () {
    return view('home');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
Route::get('/admin/dashboard', function () {
return view('admin.dashboard'); // Buat view sederhana untuk dashboard
})->name('dashboard');
});
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('kategoris', KategoriController::class);
Route::resource('infos', InfoController::class);
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

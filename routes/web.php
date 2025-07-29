<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StaticPageController;

Route::get('/home', function () {
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
Route::resource('contacts', ContactController::class);
Route::resource('downloads', DownloadController::class);
Route::resource('galleries', GalleryController::class)->middleware(['auth']);
Route::resource('menus', MenuController::class);
Route::get('/', function () {
    return view('homepage');
})->name('website');
Route::get('/artikel', function () {
    return view('artikel');
})->name('artikel');
Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');
Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');
Route::get('/kontak', [ContactController::class, 'formKontak'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.kirim');
Route::get('/stifin/halaman/{slug}', [StaticPageController::class, 'show'])->name('static.page');
Route::get('/admin/index', [StaticPageController::class, 'index'])->name('admin.index');
Route::get('/readmore', function () {
    return view('readmore');
})->name('readmore');
Route::get('/galeri', [GalleryController::class, 'publicGallery'])->name('galeri');

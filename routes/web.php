<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DownloadCategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PromotorController;

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
Route::resource('download_categories', DownloadCategoryController::class);
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
Route::get('/readmore', function () {
    return view('readmore');
})->name('readmore');
Route::get('/galeri', [GalleryController::class, 'publicGallery'])->name('galeri');
Route::resource('gallery_categories', GalleryCategoryController::class);
Route::resource('albums', AlbumController::class);
Route::get('/halaman/{slug}', [PageController::class, 'show'])->name('pages.show');
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('infos', \App\Http\Controllers\Admin\InfoController::class);
});
Route::get('/', [InfoController::class, 'index'])->name('website');
Route::get('/artikel/{slug}', [InfoController::class, 'show'])->name('public.show');
Route::get('/artikel', [InfoController::class, 'indexPublic'])->name('artikel');
Route::post('/daftar', [PendaftaranController::class, 'store'])->name('daftar');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/pendaftaran', [PendaftaranController::class, 'index'])->name('admin.pendaftaran.index');
    Route::delete('/admin/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('admin.pendaftaran.destroy');
        Route::get('pendaftaran/{id}/show', [PendaftaranController::class, 'show'])->name('admin.pendaftaran.show');
});
Route::get('/', [GalleryController::class, 'homepageSlides'])->name('website');
Route::resource('testimonials', TestimonialController::class);
Route::resource('branches', BranchController::class);
Route::resource('promotors', PromotorController::class);
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::put('admin/pendaftaran/{id}/status', [PendaftaranController::class, 'updateStatus'])->name('admin.pendaftaran.updateStatus');

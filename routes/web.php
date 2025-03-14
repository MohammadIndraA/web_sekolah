<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BeritaHomeController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\DaftarSekolahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventHomeController;
use App\Http\Controllers\GambarLombaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KategoriLombaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PersertaLombaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagBeritaController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\UserController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('/run-storage-link', function () {
    Artisan::call('storage:link');
    return "Storage link has been created!";
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/event', [EventHomeController::class, 'index'])->name('event');
    Route::post('/event/konformasi', [EventHomeController::class, 'konfirmasi'])->name('event.confirmasi');
    Route::get('/tamu', [HomeController::class, 'tamu'])->name('tamu');
    Route::post('/tamu', [HomeController::class, 'tamuSubmit'])->name('tamu.store');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/berita',  [BeritaHomeController::class, 'index'])->name('berita');
    Route::get('/berita/{slug}',  [BeritaHomeController::class, 'show'])->name('berita.detail');

    Route::get('/contak', function(){
        return view('frontend.contak');
    });

    Route::get('/profile', function(){
        return view('frontend.profile');
    });

    // Calon Siswa
    Route::get('/siswa-baru', [CalonSiswaController::class, 'index'])->name('siswa-baru');
    Route::get('/siswa-pindahan', [CalonSiswaController::class, 'index'])->name('siswa-pindahan');
    Route::post('/siswa-store', [CalonSiswaController::class, 'store'])->name('siswa.store');
    
    // Auth
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post'); 
});

Route::group(['middleware' => 'auth'], function () {
   
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.delete');

    // jurusan
    Route::get('/jurusans', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::post('/jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('/jurusan/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::put('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('/jurusan/delete', [JurusanController::class, 'destroy'])->name('jurusan.delete');

    // daftar sekolah
    Route::get('/daftar-sekolah', [DaftarSekolahController::class, 'index'])->name('daftar-sekolah.index');
    Route::post('/daftar-sekolah/store', [DaftarSekolahController::class, 'store'])->name('daftar-sekolah.store');
    Route::get('/daftar-sekolah/edit', [DaftarSekolahController::class, 'edit'])->name('daftar-sekolah.edit');
    Route::put('/daftar-sekolah/update/{id}', [DaftarSekolahController::class, 'update'])->name('daftar-sekolah.update');
    Route::delete('/daftar-sekolah/delete', [DaftarSekolahController::class, 'destroy'])->name('daftar-sekolah.delete');

    // Event
    Route::get('/events', [EventController::class, 'index'])->name('event.index');
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/delete', [EventController::class, 'destroy'])->name('event.delete');

    // Kategori Lomb
    Route::get('/kategori-lomba', [KategoriLombaController::class, 'index'])->name('kategori-lomba.index');
    Route::post('/kategori-lomba/store', [KategoriLombaController::class, 'store'])->name('kategori-lomba.store');
    Route::get('/kategori-lomba/edit', [KategoriLombaController::class, 'edit'])->name('kategori-lomba.edit');
    Route::put('/kategori-lomba/update/{id}', [KategoriLombaController::class, 'update'])->name('kategori-lomba.update');
    Route::delete('/kategori-lomba/delete', [KategoriLombaController::class, 'destroy'])->name('kategori-lomba.delete');

    // Daftar Peserta
    Route::get('/daftar-peserta', [PersertaLombaController::class, 'index'])->name('daftar-peserta.index');
    Route::post('/daftar-peserta/store', [PersertaLombaController::class, 'store'])->name('daftar-peserta.store');
    Route::get('/daftar-peserta/edit', [PersertaLombaController::class, 'edit'])->name('daftar-peserta.edit');
    Route::put('/daftar-peserta/update/{id}', [PersertaLombaController::class, 'update'])->name('daftar-peserta.update');
    Route::delete('/daftar-peserta/delete', [PersertaLombaController::class, 'destroy'])->name('daftar-peserta.delete');

    // Daftar Peserta
    Route::get('/gambar-lomba', [GambarLombaController::class, 'index'])->name('gambar-lomba.index');
    Route::post('/gambar-lomba/store', [GambarLombaController::class, 'store'])->name('gambar-lomba.store');
    Route::get('/gambar-lomba/edit', [GambarLombaController::class, 'edit'])->name('gambar-lomba.edit');
    Route::put('/gambar-lomba/update/{id}', [GambarLombaController::class, 'update'])->name('gambar-lomba.update');
    Route::delete('/gambar-lomba/delete', [GambarLombaController::class, 'destroy'])->name('gambar-lomba.delete');

    // Banner
    Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banner/edit', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('/banner/delete', [BannerController::class, 'destroy'])->name('banner.delete');

    // About
    Route::get('/abouts', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/about/delete', [AboutController::class, 'destroy'])->name('about.delete');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/setting/store', [SettingController::class, 'store'])->name('setting.store');

    // Berita
    Route::get('/beritas', [BeritaController::class, 'index'])->name('berita.index');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/show/{slug}', [BeritaController::class, 'show'])->name('berita.show');
    // Route::get('/berita/edit', [BeritaController::class, 'edit'])->name('berita.show');
    Route::put('/berita/update/{slug}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/delete', [BeritaController::class, 'destroy'])->name('berita.delete');

    // Tag Berita
    Route::get('/tag-berita', [TagBeritaController::class, 'index'])->name('tag-berita.index');
    Route::post('/tag-berita/store', [TagBeritaController::class, 'store'])->name('tag-berita.store');
    Route::get('/tag-berita/edit', [TagBeritaController::class, 'edit'])->name('tag-berita.edit');
    Route::put('/tag-berita/update/{id}', [TagBeritaController::class, 'update'])->name('tag-berita.update');
    Route::delete('/tag-berita/delete', [TagBeritaController::class, 'destroy'])->name('tag-berita.delete');

    // Kategori Berita
    Route::get('/kategori-berita', [KategoriBeritaController::class, 'index'])->name('kategori-berita.index');
    Route::post('/kategori-berita/store', [KategoriBeritaController::class, 'store'])->name('kategori-berita.store');
    Route::get('/kategori-berita/edit', [KategoriBeritaController::class, 'edit'])->name('kategori-berita.edit');
    Route::put('/kategori-berita/update/{id}', [KategoriBeritaController::class, 'update'])->name('kategori-berita.update');
    Route::delete('/kategori-berita/delete', [KategoriBeritaController::class, 'destroy'])->name('kategori-berita.delete');

    // tamus
    Route::get('/tamus', [TamuController::class, 'index'])->name('tamu.index');



        // Permissoes
        Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
        Route::post('/permission-store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('/permission-edit', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::put('/permission-update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::delete('/permission-delete', [PermissionController::class, 'destroy'])->name('permission.delete');
    
        // roles
        Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
        Route::post('/role-store', [RoleController::class, 'store'])->name('role.store');
        Route::get('/role-edit', [RoleController::class, 'edit'])->name('role.edit');
        Route::put('/role-update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::delete('/role-delete', [RoleController::class, 'destroy'])->name('role.delete');
    

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

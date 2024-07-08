<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DaftarController;

use Illuminate\Auth\Middleware\Authenticate;

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('pasien', PasienController::class);
    Route::resource('daftar', DaftarController::class);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::resource('matakuliah', MatakuliahController::class);

Route::get('mahasiswa', [MahasiswaController::class, 'index']);
Route::get('mahasiswa/create', [MahasiswaController::class, 'create']);
Route::get('mahasiswa/tambah', [MahasiswaController::class, 'tambah']);

Route::get('dosen', [DosenController::class, 'index']);
Route::get('dosen/tambah', [DosenController::class, 'tambah']);


Route::get('profil', function () {
    return 'hello world';
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

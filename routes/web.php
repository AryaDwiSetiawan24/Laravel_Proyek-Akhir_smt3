<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route untuk Data Buku
Route::get('/buku', [BukuController::class, 'bukutampil'])->name('buku');
Route::post('/bukutambah',[BukuController::class, 'bukutambah']);
Route::post('/buku/tambah',[BukuController::class, 'bukutambah']);
Route::get('/buku/hapus/{idbuku}',[BukuController::class, 'bukuhapus']);
Route::put('/buku/edit/{idbuku}', [BukuController::class,'bukuedit']);

//Route untuk Data Mahasiswa
Route::get('/siswa', [SiswaController::class,'siswatampil'])->name('siswa');
Route::post('/siswatambah', [SiswaController::class,'siswatambah']);
Route::post('/siswa/tambah', [SiswaController::class,'siswatambah']);
Route::post('/siswa/hapus/{idsiswa}', [SiswaController::class,'siswahapus']);
Route::put('/siswa/edit/{idsiswa}', [SiswaController::class,'siswaedit']);

//Route untuk Data Petugas
Route::get('/petugas', [PetugasController::class,'petugastampil'])->name('petugas');
Route::post('/petugastambah', [PetugasController::class,'petugastambah']);
Route::post('/petugas/tambah', [PetugasController::class,'petugastambah']);
Route::get('/petugas/hapus/{idpetugas}', [PetugasController::class,'petugashapus']);
Route::get('/petugas/edit/{idpetugas}', [PetugasController::class,'petugasedit']);

//Route untuk Data Peminjaman
Route::get('/pinjam', [PinjamController::class,'pinjamtampil'])->name('pinjam');
Route::post('/pinjam/tambah',[PinjamController::class,'pinjamtambah'])->name('pinjamtambah');
Route::get('/pinjam/hapus/{idpinjam}',[PinjamController::class,'pinjamhapus']);
Route::put('/pinjam/edit/{idpinjam}', [PinjamController::class,'pinjamedit']);

//Route untuk Data Perpustakaan
Route::get('/resources/views/halaman/view_tentang.blade.php', function () {
    return view('/halaman/view_tentang');
});

// Auth::routes();

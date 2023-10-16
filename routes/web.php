<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function(){
    Route::get('/', [LoginController::class,'loginView'])->name('login');
    Route::post('/login', [LoginController::class,'login']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin/kakom',[AdminController::class,'kakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/formsiswa',[AdminController::class,'kakomFormSiswa'])->middleware('userAkses:kakom')->name('kakomformsiswa');
    Route::get('/admin/kakom/formsiswa/detail/{id_formulir}',[AdminController::class,'kakomDetailFormSiswa'])->middleware('userAkses:kakom');
    Route::post('/admin/kakom/formsiswa/approve',[AdminController::class,'approveKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarperusahaan',[AdminController::class,'daftarperusahaanKakom'])->middleware('userAkses:kakom');

    Route::get('/admin/hubin',[AdminController::class,'hubin'])->middleware('userAkses:hubin');

    Route::get('/admin/kurikulum',[AdminController::class,'kurikulum'])->middleware('userAkses:kurikulum');

    Route::get('/admin/superadmin',[AdminController::class,'superadmin'])->middleware('userAkses:superadmin');

    Route::get('/siswa/pemilihan', [SiswaController::class,'pemilihan'])->middleware('userAkses:siswa');
    Route::get('/siswa/pengajuan', [SiswaController::class, 'pengajuan'])->middleware('userAkses:siswa')->name('pengajuanSiswa');
    Route::get('/siswa/monitoring', [SiswaController::class, 'monitoring'])->middleware('userAkses:siswa')->name('monitoringSiswa');

    Route::get('/logout',[LoginController::class,'logout']);
});
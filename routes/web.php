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
    Route::get('/admin/cari-perusahaan', [AdminController::class,'cariDaftarperusahaan']);
    Route::get('/admin/cari-formsiswa', [AdminController::class,'cariFormsiswa']);
    Route::get('/admin/cari-siswa', [AdminController::class,'cariDaftarsiswa']);
    Route::get('/admin/cari-akunsiswa', [AdminController::class,'cariAkunsiswa']);
    Route::get('/admin/cari-guru', [AdminController::class,'cariDaftarguru']);
    Route::get('/admin/cari-akunpembimbing', [AdminController::class,'cariAkunpembimbing']);
    Route::get('/admin/cari-angkatan', [AdminController::class,'cariAngkatan']);

    Route::get('/admin/kakom',[AdminController::class,'kakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/formsiswa',[AdminController::class,'formsiswa'])->middleware('userAkses:kakom')->name('kakomformsiswa');
    Route::get('/admin/kakom/formsiswa/detail/{id_formulir}',[AdminController::class,'detailFormSiswa'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/formsiswa/tambah',[AdminController::class,'tambahFormulir'])->middleware('userAkses:kakom')->name('tambahFormulirKakom');
    Route::post('/admin/kakom/formsiswa/approve',[AdminController::class,'approveKakom'])->middleware('userAkses:kakom');
    Route::post('/admin/kakom/formsiswa/store',[AdminController::class,'storeFormulirKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarperusahaan',[AdminController::class,'daftarperusahaan'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarperusahaan/detail/{id_perusahaan}',[AdminController::class,'detailDaftarperusahaan'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarperusahaan/tambah',[AdminController::class,'tambahDaftarperusahaan'])->middleware('userAkses:kakom')->name('tambahPerusahaanKakom');
    Route::post('/admin/kakom/daftarperusahaan/store',[AdminController::class, 'storePerusahaanKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarperusahaan/edit/{id_perusahaan}',[AdminController::class, 'editPerusahaan'])->middleware('userAkses:kakom');
    Route::put('/admin/kakom/daftarperusahaan/update/{id_perusahaan}',[AdminController::class, 'updatePerusahaanKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarperusahaan/delete/{id_perusahaan}',[AdminController::class, 'deletePerusahaanKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarsiswa',[AdminController::class, 'daftarsiswa'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarsiswa/detail/{id_siswa}',[AdminController::class,'detailDaftarsiswa'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarsiswa/tambah',[AdminController::class,'tambahDaftarsiswa'])->middleware('userAkses:kakom')->name('tambahSiswaKakom');
    Route::post('/admin/kakom/daftarsiswa/store',[AdminController::class,'storeDaftarsiswaKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarsiswa/edit/{id_siswa}',[AdminController::class, 'editSiswa'])->middleware('userAkses:kakom');
    Route::put('/admin/kakom/daftarsiswa/update/{id_siswa}',[AdminController::class, 'updateSiswaKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarsiswa/delete/{id_siswa}',[AdminController::class, 'deleteSiswaKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/akunsiswa',[AdminController::class, 'akunsiswa'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/akunsiswa/detail/{id_siswa}',[AdminController::class,'detailAkunsiswa'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/akunsiswa/tambah',[AdminController::class,'tambahAkunsiswa'])->middleware('userAkses:kakom')->name('tambahAkunsiswaKakom');
    Route::post('/admin/kakom/akunsiswa/store',[AdminController::class,'storeAkunsiswaKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/akunsiswa/edit/{id_siswa}',[AdminController::class, 'editAkunsiswa'])->middleware('userAkses:kakom');
    Route::put('/admin/kakom/akunsiswa/update/{id_siswa}',[AdminController::class, 'updateAkunsiswaKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/akunsiswa/delete/{id}',[AdminController::class, 'deleteAkunsiswaKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarguru',[AdminController::class, 'daftarguru'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarguru/detail/{id_guru}',[AdminController::class,'detailDaftarguru'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarguru/tambah',[AdminController::class,'tambahDaftarguru'])->middleware('userAkses:kakom')->name('tambahGuruKakom');
    Route::post('/admin/kakom/daftarguru/store',[AdminController::class,'storeDaftarguruKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarguru/edit/{id_guru}',[AdminController::class, 'editGuru'])->middleware('userAkses:kakom');
    Route::put('/admin/kakom/daftarguru/update/{id_guru}',[AdminController::class, 'updateGuruKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/daftarguru/delete/{id_guru}',[AdminController::class, 'deleteGuruKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/akunpembimbing',[AdminController::class, 'akunpembimbing'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/akunpembimbing/detail/{id_guru}',[AdminController::class,'detailAkunpembimbing'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/akunpembimbing/tambah',[AdminController::class,'tambahAkunpembimbing'])->middleware('userAkses:kakom')->name('tambahAkunpembimbingKakom');
    Route::post('/admin/kakom/akunpembimbing/store',[AdminController::class,'storeAkunpembimbingKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/akunpembimbing/edit/{id_guru}',[AdminController::class, 'editAkunpembimbing'])->middleware('userAkses:kakom');
    Route::put('/admin/kakom/akunpembimbing/update/{id_guru}',[AdminController::class, 'updateAkunpembimbingKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/akunpembimbing/delete/{id}',[AdminController::class, 'deleteAkunpembimbingKakom'])->middleware('userAkses:kakom');
    
    Route::get('/admin/hubin',[AdminController::class,'hubin'])->middleware('userAkses:hubin');
    Route::get('/admin/hubin/formsiswa',[AdminController::class,'formsiswa'])->middleware('userAkses:hubin')->name('hubinformsiswa');
    Route::get('/admin/hubin/formsiswa/detail/{id_formulir}',[AdminController::class,'detailFormSiswa'])->middleware('userAkses:hubin');
    Route::post('/admin/hubin/formsiswa/approve',[AdminController::class,'approveHubin'])->middleware('userAkses:hubin');
    Route::get('/admin/hubin/daftarperusahaan',[AdminController::class,'daftarperusahaan'])->middleware('userAkses:hubin');
    Route::get('/admin/hubin/daftarperusahaan/detail/{id_perusahaan}',[AdminController::class,'detailDaftarperusahaan'])->middleware('userAkses:hubin');
    Route::get('/admin/hubin/daftarperusahaan/tambah',[AdminController::class,'tambahDaftarperusahaan'])->middleware('userAkses:hubin')->name('tambahPerusahaanHubin');
    Route::post('/admin/hubin/daftarperusahaan/store',[AdminController::class, 'storePerusahaanHubin'])->middleware('userAkses:hubin');
    Route::get('/admin/hubin/daftarperusahaan/edit/{id_perusahaan}',[AdminController::class, 'editPerusahaan'])->middleware('userAkses:hubin');
    Route::put('/admin/hubin/daftarperusahaan/update/{id_perusahaan}',[AdminController::class, 'updatePerusahaanHubin'])->middleware('userAkses:hubin');
    Route::get('/admin/hubin/daftarperusahaan/delete/{id_perusahaan}',[AdminController::class, 'deletePerusahaanHubin'])->middleware('userAkses:hubin');

    Route::get('/admin/kurikulum',[AdminController::class,'kurikulum'])->middleware('userAkses:kurikulum');
    Route::get('/admin/kurikulum/formsiswa',[AdminController::class,'formsiswa'])->middleware('userAkses:kurikulum')->name('kurikulumformsiswa');
    Route::get('/admin/kurikulum/formsiswa/detail/{id_formulir}',[AdminController::class,'detailFormSiswa'])->middleware('userAkses:kurikulum');
    Route::post('/admin/kurikulum/formsiswa/approve',[AdminController::class,'approveKurikulum'])->middleware('userAkses:kurikulum');

    Route::get('/admin/superadmin',[AdminController::class,'superadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarakun',[AdminController::class,'daftarakun'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/angkatan',[AdminController::class,'angkatan'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/angkatan/tambah',[AdminController::class,'tambahAngkatan'])->middleware('userAkses:superadmin')->name('tambahAngkatan');
    Route::post('/admin/superadmin/angkatan/store',[AdminController::class, 'storeAngkatan'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/angkatan/edit/{id_angkatan}',[AdminController::class,'editAngkatan'])->middleware('userAkses:superadmin');
    Route::put('/admin/superadmin/angkatan/update/{id_angkatan}',[AdminController::class, 'updateAngkatan'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/angkatan/delete/{id_angkatan}',[AdminController::class, 'deleteAngkatan'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/jurusan',[AdminController::class,'jurusan'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/jurusan/tambah',[AdminController::class,'tambahJurusan'])->middleware('userAkses:superadmin')->name('tambahJurusan');
    Route::post('/admin/superadmin/jurusan/store',[AdminController::class, 'storeJurusan'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/jurusan/edit/{id_jurusan}',[AdminController::class,'editJurusan'])->middleware('userAkses:superadmin');
    Route::put('/admin/superadmin/jurusan/update/{id_jurusan}',[AdminController::class, 'updateJurusan'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/jurusan/delete/{id_jurusan}',[AdminController::class, 'deleteJurusan'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarperusahaan',[AdminController::class,'daftarperusahaan'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarperusahaan/detail/{id_perusahaan}',[AdminController::class,'detailDaftarperusahaan'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarperusahaan/tambah',[AdminController::class,'tambahDaftarperusahaan'])->middleware('userAkses:superadmin')->name('tambahPerusahaanSuperadmin');
    Route::post('/admin/superadmin/daftarperusahaan/store',[AdminController::class, 'storePerusahaanSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarperusahaan/edit/{id_perusahaan}',[AdminController::class, 'editPerusahaan'])->middleware('userAkses:superadmin');
    Route::put('/admin/superadmin/daftarperusahaan/update/{id_perusahaan}',[AdminController::class, 'updatePerusahaanSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarperusahaan/delete/{id_perusahaan}',[AdminController::class, 'deletePerusahaanSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarsiswa',[AdminController::class, 'daftarsiswa'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarsiswa/detail/{id_siswa}',[AdminController::class,'detailDaftarsiswa'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarsiswa/tambah',[AdminController::class,'tambahDaftarsiswa'])->middleware('userAkses:superadmin')->name('tambahSiswaSuperadmin');
    Route::post('/admin/superadmin/daftarsiswa/store',[AdminController::class,'storeDaftarsiswaSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarsiswa/edit/{id_siswa}',[AdminController::class, 'editSiswa'])->middleware('userAkses:superadmin');
    Route::put('/admin/superadmin/daftarsiswa/update/{id_siswa}',[AdminController::class, 'updateSiswasuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarsiswa/delete/{id_siswa}',[AdminController::class, 'deleteSiswasuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunsiswa',[AdminController::class, 'akunsiswa'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunsiswa/detail/{id_siswa}',[AdminController::class,'detailAkunsiswa'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunsiswa/tambah',[AdminController::class,'tambahAkunsiswa'])->middleware('userAkses:superadmin')->name('tambahAkunsiswaSuperadmin');
    Route::post('/admin/superadmin/akunsiswa/store',[AdminController::class,'storeAkunsiswaSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunsiswa/edit/{id_siswa}',[AdminController::class, 'editAkunsiswa'])->middleware('userAkses:superadmin');
    Route::put('/admin/superadmin/akunsiswa/update/{id_siswa}',[AdminController::class, 'updateAkunsiswaSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunsiswa/delete/{id}',[AdminController::class, 'deleteAkunsiswaSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarguru',[AdminController::class, 'daftarguru'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarguru/detail/{id_guru}',[AdminController::class,'detailDaftarguru'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarguru/tambah',[AdminController::class,'tambahDaftarguru'])->middleware('userAkses:superadmin')->name('tambahGuruSuperadmin');
    Route::post('/admin/superadmin/daftarguru/store',[AdminController::class,'storeDaftarguruSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarguru/edit/{id_guru}',[AdminController::class, 'editGuru'])->middleware('userAkses:superadmin');
    Route::put('/admin/superadmin/daftarguru/update/{id_guru}',[AdminController::class, 'updateGuruSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/daftarguru/delete/{id_guru}',[AdminController::class, 'deleteGuruSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunpembimbing',[AdminController::class, 'akunpembimbing'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunpembimbing/detail/{id_guru}',[AdminController::class,'detailAkunpembimbing'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunpembimbing/tambah',[AdminController::class,'tambahAkunpembimbing'])->middleware('userAkses:superadmin')->name('tambahAkunpembimbingSuperadmin');
    Route::post('/admin/superadmin/akunpembimbing/store',[AdminController::class,'storeAkunpembimbingSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunpembimbing/edit/{id_guru}',[AdminController::class, 'editAkunpembimbing'])->middleware('userAkses:superadmin');
    Route::put('/admin/superadmin/akunpembimbing/update/{id_guru}',[AdminController::class, 'updateAkunpembimbingSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunpembimbing/delete/{id}',[AdminController::class, 'deleteAkunpembimbingSuperadmin'])->middleware('userAkses:superadmin');

    Route::get('/siswa/pemilihan', [SiswaController::class,'pemilihan'])->middleware('userAkses:siswa');
    Route::get('/siswa/pengajuan', [SiswaController::class, 'pengajuan'])->middleware('userAkses:siswa')->name('pengajuanSiswa');
    Route::get('/siswa/monitoring', [SiswaController::class, 'monitoring'])->middleware('userAkses:siswa')->name('monitoringSiswa');

    Route::get('/logout',[LoginController::class,'logout']);
});
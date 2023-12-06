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
    Route::get('/admin/cari-jurusan', [AdminController::class,'cariJurusan']);
    Route::get('/admin/cari-permintaan', [AdminController::class,'cariPermintaan']);
    Route::get('/admin/cari-lowongan', [AdminController::class,'cariLowongan']);
    Route::get('/admin/cari-panduan', [AdminController::class,'cariPanduan']);

    Route::get('/admin/kakom',[AdminController::class,'kakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/formsiswa',[AdminController::class,'formsiswa'])->middleware('userAkses:kakom')->name('kakomformsiswa');
    Route::get('/admin/kakom/formsiswa/detail/{id_formulir}',[AdminController::class,'detailFormSiswa'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/formsiswa/tambah',[AdminController::class,'tambahFormulir'])->middleware('userAkses:kakom')->name('tambahFormulirKakom');
    Route::post('/admin/kakom/formsiswa/approve',[AdminController::class,'approveKakom'])->middleware('userAkses:kakom');
    Route::post('/admin/kakom/formsiswa/store',[AdminController::class,'storeFormulirKakom'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/permintaan',[AdminController::class,'permintaan'])->middleware('userAkses:kakom');
    Route::post('/admin/kakom/permintaan/approve',[AdminController::class,'permintaanApprove'])->middleware('userAkses:kakom');
    Route::post('/admin/kakom/permintaan/tolak',[AdminController::class,'permintaanTolak'])->middleware('userAkses:kakom');
    
    Route::get('/admin/kakom/lowongan',[AdminController::class,'lowongan'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/lowongan/tambah',[AdminController::class,'tambahLowongan'])->middleware('userAkses:kakom')->name('tambahLowongan');
    Route::post('/admin/kakom/lowongan/store',[AdminController::class, 'storeLowongan'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/lowongan/edit/{id_lowongan}',[AdminController::class, 'editLowongan'])->middleware('userAkses:kakom');
    Route::put('/admin/kakom/lowongan/update/{id_lowongan}',[AdminController::class, 'updateLowongan'])->middleware('userAkses:kakom');
    Route::get('/admin/kakom/lowongan/delete/{id_lowongan}',[AdminController::class, 'deleteLowongan'])->middleware('userAkses:kakom');

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
    Route::get('/admin/hubin/panduan',[AdminController::class,'panduan'])->middleware('userAkses:hubin');
    Route::get('doc/{pdf}',[AdminController::class,'preview'])->middleware('userAkses:hubin');
    Route::get('/admin/hubin/panduan/tambah',[AdminController::class,'tambahPanduan'])->middleware('userAkses:hubin')->name('tambahPanduanHubin');
    Route::post('/admin/hubin/panduan/store',[AdminController::class, 'storePanduanHubin'])->middleware('userAkses:hubin');
    Route::get('/admin/hubin/panduan/edit/{id_panduan}',[AdminController::class, 'editPanduan'])->middleware('userAkses:hubin');
    Route::put('/admin/hubin/panduan/update/{id_panduan}',[AdminController::class, 'updatePanduanHubin'])->middleware('userAkses:hubin');
    Route::get('/admin/hubin/panduan/delete/{id_panduan}',[AdminController::class, 'deletePanduanHubin'])->middleware('userAkses:hubin');

    Route::get('/admin/kurikulum',[AdminController::class,'kurikulum'])->middleware('userAkses:kurikulum');
    Route::get('/admin/kurikulum/formsiswa',[AdminController::class,'formsiswa'])->middleware('userAkses:kurikulum')->name('kurikulumformsiswa');
    Route::get('/admin/kurikulum/formsiswa/detail/{id_formulir}',[AdminController::class,'detailFormSiswa'])->middleware('userAkses:kurikulum');
    Route::post('/admin/kurikulum/formsiswa/approve',[AdminController::class,'approveKurikulum'])->middleware('userAkses:kurikulum');

    Route::get('/admin/superadmin',[AdminController::class,'superadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/formsiswa',[AdminController::class,'formsiswa'])->middleware('userAkses:superadmin')->name('superadminformsiswa');
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
    Route::get('/admin/superadmin/akunhubin',[AdminController::class, 'akunhubin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunhubin/detail/{id_guru}',[AdminController::class,'detailAkunhubin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunhubin/tambah',[AdminController::class,'tambahAkunhubin'])->middleware('userAkses:superadmin')->name('tambahAkunhubinSuperadmin');
    Route::post('/admin/superadmin/akunhubin/store',[AdminController::class,'storeAkunhubinSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunhubin/edit/{id_guru}',[AdminController::class, 'editAkunhubin'])->middleware('userAkses:superadmin');
    Route::put('/admin/superadmin/akunhubin/update/{id_guru}',[AdminController::class, 'updateAkunhubinSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunhubin/delete/{id}',[AdminController::class, 'deleteAkunhubinSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunkurikulum',[AdminController::class, 'akunkurikulum'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunkurikulum/detail/{id_guru}',[AdminController::class,'detailAkunakunKurikulum'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunkurikulum/tambah',[AdminController::class,'tambahAkunkurikulum'])->middleware('userAkses:superadmin')->name('tambahAkunkurikulumSuperadmin');
    Route::post('/admin/superadmin/akunkurikulum/store',[AdminController::class,'storeAkunkurikulumSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunkurikulum/edit/{id_guru}',[AdminController::class, 'editAkunkurikulum'])->middleware('userAkses:superadmin');
    Route::put('/admin/superadmin/akunkurikulum/update/{id_guru}',[AdminController::class, 'updateAkunkurikulumSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunkurikulum/delete/{id}',[AdminController::class, 'deleteAkunkurikulumSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunkakom',[AdminController::class, 'akunkakom'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunkakom/detail/{id_guru}',[AdminController::class,'detailAkunkakom'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunkakom/tambah',[AdminController::class,'tambahAkunkakom'])->middleware('userAkses:superadmin')->name('tambahAkunkakomSuperadmin');
    Route::post('/admin/superadmin/akunkakom/store',[AdminController::class,'storeAkunkakomSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunkakom/edit/{id_guru}',[AdminController::class, 'editAkunkakom'])->middleware('userAkses:superadmin');
    Route::put('/admin/superadmin/akunkakom/update/{id_guru}',[AdminController::class, 'updateAkunkakomSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/akunkakom/delete/{id}',[AdminController::class, 'deleteAkunkakomSuperadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/history',[AdminController::class, 'history'])->middleware('userAkses:superadmin');
    Route::get('/admin/superadmin/history/delete/{id_historylogin}',[AdminController::class, 'deleteHistorylogin'])->middleware('userAkses:superadmin');

    Route::get('/siswa/pemilihan', [SiswaController::class,'pemilihan'])->middleware('userAkses:siswa');
    Route::get('/siswa/pengajuan', [SiswaController::class, 'pengajuan'])->middleware('userAkses:siswa')->name('pengajuanSiswa');
    Route::get('/siswa/lowongan', [SiswaController::class, 'lowongan'])->middleware('userAkses:siswa');
    Route::get('/siswa/lowongan/detail/{id_lowongan}', [SiswaController::class, 'lowonganDetail'])->middleware('userAkses:siswa');
    Route::post('/siswa/lowongan/ajukan', [SiswaController::class, 'lowonganAjukan'])->middleware('userAkses:siswa');
    Route::get('/siswa/panduanartikel', [SiswaController::class, 'panduanartikel'])->middleware('userAkses:siswa');
    Route::get('/siswa/panduanartikel/panduan', [SiswaController::class, 'panduan'])->middleware('userAkses:siswa');
    Route::get('/siswa/profil', [SiswaController::class, 'profil'])->middleware('userAkses:siswa');
    Route::put('/siswa/profil/update/{id_siswa}', [SiswaController::class, 'updateProfil'])->middleware('userAkses:siswa');
    Route::put('/siswa/profil/detail/update/{id_siswadetail}', [SiswaController::class, 'updateProfilDetail'])->middleware('userAkses:siswa');
    Route::get('/siswa/monitoring', [SiswaController::class, 'monitoring'])->middleware('userAkses:siswa')->name('monitoringSiswa');

    Route::get('/logout',[LoginController::class,'logout']);
});
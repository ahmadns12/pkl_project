<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Lowongan;
use App\Models\Permintaan;
use App\Models\Perusahaan;
use App\Models\Panduan;
use App\Models\Siswa;
use App\Models\Siswadetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    function pemilihan(){
        return view('Pengajuan.Siswa.pemilihanSiswa');
    }

    function pengajuan(){
        $user = Auth::user(); // mendeklarasikan function user dari fitur authentication
        $jurusan = $user->siswa->jurusan->id_jurusan; // mengambil data id_jurusan dari akun siswa

        $lowongan = Lowongan::where('id_jurusan', $jurusan)->latest()->take(5)->get();

        return view('Pengajuan.Siswa.dashboard', ['lowongan' => $lowongan]);
    }
    
    function lowongan(){
        $user = Auth::user(); // mendeklarasikan function user dari fitur authentication
        $jurusan = $user->siswa->jurusan->id_jurusan; // mengambil data id_jurusan dari akun siswa

        $lowongan = Lowongan::where('id_jurusan', $jurusan)->get();

        return view('Pengajuan.Siswa.lowongan', ['lowongan' => $lowongan]);
    }

    function lowonganDetail($id_lowogan){
        $lowongan = Lowongan::find($id_lowogan);

        return view('Pengajuan.Siswa.lowonganDetail', ['lowongan' => $lowongan]);
    }

    function lowonganAjukan(Request $request)
    {
        $permintaan = new Permintaan;
        $permintaan->id_siswa = $request->id_siswa;
        $permintaan->id_lowongan = $request->id_lowongan;
        $permintaan->approve = '0';
        $permintaan->save();

        $siswa = Siswa::find($request->id_siswa);

        $siswa->update([
            'sudah_memilih' => '1'
        ]);

        return redirect('/siswa/lowongan')->with('ajukan', 'Berhasil mengajukan!');
    }

    function panduanartikel(){
        $totalPanduan = Panduan::count();
        $panduanTerbaru = Panduan::latest()->take(1)->first();

        return view('Pengajuan.Siswa.panduanartikel', ['totalPanduan' => $totalPanduan, 'panduanTerbaru' => $panduanTerbaru]);
    }

    function panduan(){
        $datapanduan = Panduan::paginate(10);

        return view('Pengajuan.Siswa.panduan', ['datapanduan' => $datapanduan]);
    }

    function profil(){
        $user = Auth::user();
        $id_jurusan_siswa = $user->siswa->id_jurusan; // mengambil id_jurusan user siswa

        $jurusan = Jurusan::get();

        return view('Pengajuan.Siswa.profil', ['datajurusan' => $jurusan, 'jurusansiswa' => $id_jurusan_siswa]);
    }

    function updateProfil(Request $request, $id_siswa){
        $siswa = Siswa::find($id_siswa);
        $old_image = asset("img/siswa/" . $siswa->gambar_siswa);
        if ($request->hasFile('image')) {
            if (File::exists($old_image)) {
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $image->move('img/siswa', $image_name);
        } else {
            $image_name = $siswa->gambar_siswa;
        }

        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nis = $request->nis;
        $siswa->nomor_telepon = $request->nomor_telepon;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_jurusan = $request->id_jurusan;
        $siswa->gambar_siswa = $request->hasFile('image') ? $image_name : $siswa->gambar_siswa;
        $siswa->save();
    
        return redirect('/siswa/profil')->with('update', 'Data anda berhasil di Perbarui!');
    }

    function updateProfilDetail(Request $request, $id_siswadetail){
        $siswadetail = Siswadetail::find($id_siswadetail);

        $siswadetail->nama_bapak = $request->nama_bapak;
        $siswadetail->nama_ibu = $request->nama_ibu;
        $siswadetail->pekerjaan_bapak = $request->pekerjaan_bapak;
        $siswadetail->pekerjaan_ibu = $request->pekerjaan_ibu;
        $siswadetail->nomor_telepon_bapak = $request->nomor_telepon_bapak;
        $siswadetail->nomor_telepon_ibu = $request->nomor_telepon_ibu;
        $siswadetail->agama = $request->agama;
        $siswadetail->umur_ibu = $request->umur_ibu;
        $siswadetail->umur_bapak = $request->umur_bapak;
        $siswadetail->umur = $request->umur;
        $siswadetail->tempat_lahir = $request->tempat_lahir;
        $siswadetail->tanggal_lahir = $request->tanggal_lahir;
        $siswadetail->save();
    
        return redirect('/siswa/profil')->with('update', 'Data anda berhasil di Perbarui!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Hubin
    function hubin(){
        return view('Pengajuan.Admin.dashboard');
    }
    // Hubin-END

    // Kakom
    function kakom(){
        return view('Pengajuan.Admin.dashboard');
    }

    function kakomFormSiswa(){
        $formulir = DB::table('formulir')->get();

        return view('Pengajuan.Admin.formsiswa',['dataformulir'=>$formulir]);
    }

    function kakomDetailFormSiswa($id_formulir){
        $formulir = DB::table('formulir')->where('id_formulir',$id_formulir)->get();

        return view('Pengajuan.Admin.formsiswadetail',['dataformulir' => $formulir]);
    }

    function approveKakom(Request $request) {
        $id_formulir = $request->input('id_formulir'); 

        $affected = DB::table('formulir')
        ->where('id_formulir', $id_formulir)
        ->update(['approve_kakom' => 1]);

        if ($affected) {
            return redirect('/admin/kakom/formsiswa')->with('success', 'Data Siswa telah diapprove oleh Kakom!');
        }

        return redirect('/admin/kakom/formsiswa')->with('error', 'Error, Data sudah diapprove!');
    }

    function daftarperusahaanKakom(){
        $daftarperusahaan = DB::table('perusahaan')->get();

        return view('Pengajuan.Admin.daftarperusahaan',['dataperusahaan'=>$daftarperusahaan]);
    }
    // Kakom-END
    
    // Kurikulum
    function kurikulum(){
        return view('Pengajuan.Admin.dashboard');
    }
    // Kurikulum-END

    // SuperAdmin
    function superadmin(){
        return view('Pengajuan.Admin.dashboard');
    }
    // SuperAdmin-END
}

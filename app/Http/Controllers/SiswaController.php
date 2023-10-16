<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function pemilihan(){
        return view('Pengajuan.Siswa.pemilihanSiswa');
    }
}

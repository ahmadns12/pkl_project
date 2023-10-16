<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Login Admin Section
    function loginView(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required'=>'Username Wajib Diisi',
            'password.required'=>'Password Wajib Diisi'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'kakom'){
                return redirect('admin/kakom');
            }elseif(Auth::user()->role == 'kurikulum'){
                return redirect('admin/kurikulum');
            }elseif(Auth::user()->role == 'hubin'){
                return redirect('admin/hubin');
            }elseif(Auth::user()->role == 'superadmin'){
                return redirect('admin/superadmin');
            }elseif(Auth::user()->role == 'siswa'){
                return redirect('siswa/pemilihan');
            }
        }else{
            return redirect('')->withErrors("Password yang dimasukkan salah!")->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function loginView(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            $userId = Auth::user()->id;
            History::create([
                'id' => $userId,
            ]);

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
            }elseif(Auth::user()->role == 'pembimbing'){
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

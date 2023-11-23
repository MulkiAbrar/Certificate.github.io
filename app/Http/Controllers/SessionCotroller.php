<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionCotroller extends Controller
{
    function index(){
        return view('index');
    }
    function login(Request $request){
        Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'isi email',
            'password.required'=>'isi password'
        ]);
        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
      if (Auth::attempt($infologin)) {
        return redirect('dashboard')->with('Berhasil login');
      }else{
        return redirect('sesi')->withErrors('Username dan Password salah');
      }
    }
    function logout(){
        Auth::logout();
        return redirect('sesi')->with('berhasil keluar');
    }
    function register()
    {
        return view('sesi/register');
    }
    function createRegister(Request $request)
    {
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ],[
            'name.required'=>'isi nama',
            'email.required'=>'isi email',
            'email.email'=>'masukan email yang valid',
            'email.unique'=>'email sudah pernah di gunakan',
            'password.required'=>'isi password',
            'password.min'=>'minimum password adalah 5 karakter'
        ]);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        User::created($data);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
      if (Auth::attempt($infologin)) {
        return redirect('sertifikat')->with( Auth::user()->name.'Berhasil login');
      }else{
        return redirect('sesi')->withErrors('Username dan Password salah');
      }
    }
}


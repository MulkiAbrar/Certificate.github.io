<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class LoginUserController extends Controller
{
    function index(){
        return view('login-user');
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
        return redirect('dashboard-user')->with('Berhasil login');
      }else{
        return redirect('login-user')->withErrors('Username dan Password salah');
      }
    }
    function logout(){
        Auth::logout();
        return redirect('login-user')->with('berhasil logout');
    }
}

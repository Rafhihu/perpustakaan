<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
   
    public function postlogin(Request $request)
{
    if(Auth::attempt($request->only('email', 'password'))){
        return redirect('/dashboard');
    }else{
        return back()->with('gagal','Email atau Password salah!');
    }

   
}
public function logout()
   {
    Auth::logout();
    return view('auth.login');
   }
}

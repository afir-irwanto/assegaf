<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/admin/dashboard');
        } else {
            Alert::error('Terjadi Kesalahan', 'Silahkan periksa kembali email/password anda!');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

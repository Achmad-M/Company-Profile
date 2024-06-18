<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nama', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login' => 'Nama atau password salah.',
        ]);
    }
}

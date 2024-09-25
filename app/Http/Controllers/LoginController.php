<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ], [
            'username.required' => 'Mohon isi username terlebih dahulu',
            'password.required' => 'Mohon isi password terlebih dahulu',
        ]);

        $dataLogin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($dataLogin)) {
            if (Auth::user()->role == 'Admin') {
                $request->session()->regenerate();
                return redirect()->intended('admin/')->with('success', 'Anda berhasil login');
            } else if (Auth::user()->role == 'Dokter') {
                $request->session()->regenerate();
                return redirect()->intended('dokter/')->with('success', 'Anda berhasil login');
            }
        } else {
            return back()->with('error', 'Username dan password tidak valid');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda berhasil logout');
    }
}

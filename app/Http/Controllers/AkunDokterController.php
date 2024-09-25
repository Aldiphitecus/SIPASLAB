<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunDokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $breadcrumb = (object) [
            'title' => 'Informasi Akun',
            'list' => ['Informasi Akun']
        ];
        $page = (object) [
            'title' => 'Akun Anda'
        ];
        $isActive = '';

        return view('dokter.akun', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = Auth::user($id);

        $breadcrumb = (object) [
            'title' => 'Informasi Akun',
            'list' => ['Informasi Akun']
        ];
        $page = (object) [
            'title' => 'Akun Anda'
        ];
        $isActive = '';

        return view('dokter.akun-edit', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_user' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (substr($value, 0, 3) !== 'Dr.' && substr($value, 0, 3) !== 'dr.') {
                        $fail('Nama harap diawali dengan "Dr. ".');
                    }
                }
            ],
            'username' => ['required'],
            'role' => ['required'],
        ], [
            'nama_user.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'role.required' => 'Role tidak boleh kosong',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('akun.index')->with('error', 'Data pengguna tidak ditemukan');
        }

        $user->role = $request->input('role');
        $user->nama_user = ucwords($request->input('nama_user'));
        $user->username = $request->input('username');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('akun.dokter')->with('success', 'Data pengguna berhasil diubah');
    }
}
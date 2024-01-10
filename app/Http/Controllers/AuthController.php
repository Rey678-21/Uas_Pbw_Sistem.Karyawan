<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $karyawan = Auth::user();

            if ($karyawan->account_type == 1) {
                return redirect()->route('admin.index');
            } elseif ($karyawan->account_type == 2) {
                return redirect()->route('karyawan.index');
            }
        }

        return redirect()->route('index')->with('msg', 'Login failed');
    }

    public function logout()
    {
        return redirect()->route('index');
    }
}

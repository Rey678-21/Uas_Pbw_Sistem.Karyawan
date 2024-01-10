<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    public function akun()
    {
        $karyawan = DB::table('karyawan')->get();
        return view('admin.akun', compact('karyawan'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;

class CetakAbsensiController extends Controller
{
    public function cetakAbsensi()
    {
        $nama = auth()->user()->name;
        $data = Absensi::where('nama_karyawan', $nama)->orderBy('id', 'DESC')->get();

        return view('cetak_absensi', compact('nama', 'data'));
    }
}

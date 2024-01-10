<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function dashboard()
    {
    return view('admin.halaman.dashboard');
    }
    public function karyawan()
    {
    return view('admin.halaman.karyawan');
    }
}

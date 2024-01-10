<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = ['nama_karyawan', 'waktu', 'lokasi', 'pesan', 'gambar', 'tipe_absen', 'hadir'];
}


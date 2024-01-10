<?php

// app/Models/Karyawan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Karyawan extends Authenticatable
{
    use HasFactory, Notifiable;

    // ...

    protected $table = 'karyawan'; // Sesuaikan dengan nama tabel di database Anda

    // ...
}


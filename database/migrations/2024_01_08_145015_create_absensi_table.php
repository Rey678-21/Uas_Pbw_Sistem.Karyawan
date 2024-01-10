<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->datetime('waktu');
            $table->string('lokasi');
            $table->string('pesan');
            $table->string('gambar');
            $table->integer('tipe_absen')->default(0);
            $table->integer('hadir')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}

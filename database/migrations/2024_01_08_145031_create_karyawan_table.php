<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->integer('account_type');
            $table->string('nama');
            $table->char('jenis_kelamin', 1);
            $table->string('no_telp');
            $table->string('email');
            $table->string('no_ktp');
            $table->string('alamat');
            $table->string('foto');
            $table->integer('id_shift');
            $table->integer('id_departemen');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartemenTable extends Migration
{
    public function up()
    {
        Schema::create('departemen', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kepala_dept');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departemen');
    }
}

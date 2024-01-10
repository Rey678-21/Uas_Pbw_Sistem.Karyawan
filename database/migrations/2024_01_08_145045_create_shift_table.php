<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftTable extends Migration
{
    public function up()
    {
        Schema::create('shift', function (Blueprint $table) {
            $table->id();
            $table->string('shift');
            $table->string('jam_mulai');
            $table->string('jam_berhenti');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shift');
    }
}

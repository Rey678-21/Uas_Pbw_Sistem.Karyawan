<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateKaryawanPassword extends Migration
{
    public function up()
    {
        // Update kolom password dengan menggunakan bcrypt
        $karyawan = DB::table('karyawan')->get();

        foreach ($karyawan as $row) {
            DB::table('karyawan')->where('id', $row->id)->update(['password' => bcrypt($row->password)]);
        }
    }

    public function down()
    {
        // Down method tidak perlu diimplementasikan jika hanya melakukan update
    }
}

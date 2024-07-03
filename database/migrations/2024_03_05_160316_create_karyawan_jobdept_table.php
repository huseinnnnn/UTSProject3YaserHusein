<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawan_jobdept', function (Blueprint $table) {
            $table->increments('id_jobdept');
            $table->integer('nopeg')->unsigned();
            $table->foreign('nopeg')->references('nopeg')-> on('pegawai');
            $table->integer('id_dept')->unsigned();
            $table->foreign('id_dept')->references('id_dept')-> on('department');
            $table->integer('id_jabatan')->unsigned();
            $table->foreign('id_jabatan')->references('id_jabatan')-> on('jabatan');
            $table->date('tgl_mulai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan_jobdept');
    }
};

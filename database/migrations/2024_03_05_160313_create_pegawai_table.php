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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->unsignedInteger('nip')->unique();
            $table->string('nama',25);
            $table->string('alamat', 50);
            $table->date('tgl_lahir');
            $table->string('j_kelamin', 10);
            $table->string('email', 50)->unique();
            $table->integer('id_jabatan')->unsigned();
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
            $table->integer('id_dept')->unsigned();
            $table->foreign('id_dept')->references('id_dept')->on('department');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};

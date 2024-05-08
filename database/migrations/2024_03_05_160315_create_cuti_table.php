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
        Schema::create('cuti', function (Blueprint $table) {
            $table->increments('id_cuti');
            $table->integer('nip')->unsigned();
            $table->foreign('nip')->references('nip')-> on('pegawai');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('jenis_cuti', 50);
            $table->string('keterangan', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti');
    }
};

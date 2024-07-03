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
        Schema::create('gaji', function (Blueprint $table) {
            $table->increments('id_gaji');
            $table->integer('nopeg')->unsigned();
            $table->foreign('nopeg')->references('nopeg')->on('pegawai');
            $table->date('tgl_gaji');
            $table->integer('gaji');
            $table->integer('total_gaji');
            $table->integer('tunjangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji');
    }
};

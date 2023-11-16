<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaktuKelasTable extends Migration
{
    public function up()
    {
        Schema::create('waktu_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hari_kelas_id');
            $table->unsignedBigInteger('sesi_kelas_id');
            $table->timestamps();

            $table->foreign('hari_kelas_id')->references('id')->on('hari_kelas')->onDelete('cascade');
            $table->foreign('sesi_kelas_id')->references('id')->on('sesi_kelas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('waktu_kelas');
    }
}



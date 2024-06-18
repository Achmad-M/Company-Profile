<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('waktu_kelas_id');
            $table->unsignedBigInteger('pengajar_kelas_id');            
            $table->string('nama');
            $table->integer('kapasitas');
            $table->integer('terisi');
            // ... (Tambahkan kolom lain sesuai kebutuhan)
            $table->timestamps();

            $table->foreign('waktu_kelas_id')->references('id')->on('waktu_kelas')->onDelete('cascade');
            $table->foreign('pengajar_kelas_id')->references('id')->on('pengajar_kelas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}


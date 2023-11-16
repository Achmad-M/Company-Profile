<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajarKelasTable extends Migration
{
    public function up()
    {
        Schema::create('pengajar_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengajar_id');
            $table->timestamps();

            $table->foreign('pengajar_id')->references('id')->on('pengajars')->onDelete('cascade');
            
            // ... (Tambahkan kolom lain sesuai kebutuhan)
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengajar_kelas');
    }
}

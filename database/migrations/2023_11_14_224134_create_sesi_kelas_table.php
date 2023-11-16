<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesiKelasTable extends Migration
{
    public function up()
    {
        Schema::create('sesi_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pukul');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sesi_kelas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHariKelasTable extends Migration
{
    public function up()
    {
        Schema::create('hari_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hari_kelas');
    }
}


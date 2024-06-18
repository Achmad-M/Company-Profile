<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatPenggunasTable extends Migration
{
    public function up()
    {
        Schema::create('alamat_penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jalan');
            $table->string('nomor_rumah');
            $table->string('rt_rumah');
            $table->string('nama_perumahan');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kota');
            // ... (Tambahkan kolom lain sesuai kebutuhan)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alamat_penggunas');
    }
}


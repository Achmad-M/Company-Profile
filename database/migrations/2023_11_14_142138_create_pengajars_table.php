<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajarsTable extends Migration
{
    public function up()
    {
        Schema::create('pengajars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alamat_pengajar_id')->references('id')->on('alamat_pengajars')->onDelete('cascade');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tmpt_tgl_lahir');
            $table->string('agama');
            $table->binary('foto_diri'); // Tipe data BLOB untuk foto
            $table->string('email');
            $table->string('no_hp');
            // ... (Tambahkan kolom lain sesuai kebutuhan)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('nama_tabel', function (Blueprint $table) {
            $table->dropForeign(['nama_kolom']);
        });
    
        Schema::dropIfExists('pengajars');
    }
    
}


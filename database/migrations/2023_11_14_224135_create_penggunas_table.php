<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunasTable extends Migration
{
    public function up()
    {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alamat_pengguna_id');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('jenis_kelamin');
            $table->string('tmpt_tgl_lahir');
            $table->binary('foto_diri'); // Tipe data BLOB untuk foto
            $table->string('agama');
            $table->string('no_hp');
            $table->string('email');
            $table->string('tingkat_sekolah');
            $table->string('asal_sekolah');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->binary('bukti_pembayaran');
            $table->string('status_pembayaran');
            // ... (Tambahkan kolom lain sesuai kebutuhan)
            $table->timestamps();

            $table->foreign('alamat_pengguna_id')->references('id')->on('alamat_penggunas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penggunas');
    }
}

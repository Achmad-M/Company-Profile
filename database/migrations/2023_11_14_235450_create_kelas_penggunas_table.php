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
        Schema::create('kelas_penggunas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penggunas_id');
            $table->unsignedBigInteger('kelas_id');
            $table->timestamps();

            $table->foreign('penggunas_id')->references('id')->on('penggunas')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_penggunas');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_kelas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pengajar_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kelas_id')->constrained()->cascadeOnDelete();
            $table->foreignId('waktu_kelas_id')->constrained()->cascadeOnDelete();

            $table->integer('kapasitas');
            $table->integer('terisi')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_kelas');
    }
};

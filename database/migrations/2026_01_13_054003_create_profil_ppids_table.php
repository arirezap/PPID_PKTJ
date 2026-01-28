<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_ppids', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->default('PROFILE PPID'); // Untuk Gambar 1
            $table->text('konten_pembuka'); // Untuk Teks di Gambar 1
            $table->string('judul_sub')->default('GAMBARAN SINGKAT'); // Untuk Gambar 2
            $table->text('konten_detail'); // Untuk Teks di Gambar 2 & 3
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_ppids');
    }
};
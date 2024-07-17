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
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prodi');
            $table->timestamps();
        });

        Schema::create('kelompok', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok');
            $table->timestamps();
        });

        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa');
            $table->string('no_telp');
            $table->foreignId('prodi_id')->constrained('prodi')->onDelete('cascade');
            $table->foreignId('kelompok_id')->constrained('kelompok')->onDelete('cascade');
            $table->string('nama_skill');
            $table->text('deskripsi_skill');
            $table->string('photo_piagam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
        Schema::dropIfExists('kelompok');
        Schema::dropIfExists('prodi');
    }
};

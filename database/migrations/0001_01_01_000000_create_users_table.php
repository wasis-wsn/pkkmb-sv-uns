<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Prodi Table
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prodi');
            $table->timestamps();
        });

        // Kelompok Table
        Schema::create('kelompok', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok');
            $table->timestamps();
        });

        // Mahasiswa Table
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

        // Users Table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->onDelete('cascade');
            $table->integer('unseen_messages')->nullable();
            $table->enum('last_sender', ['admin', 'user']);
            $table->rememberToken();
            $table->timestamps();
        });

        // Pesan Table
        Schema::create('pesan', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['text', 'file', 'image']);
            $table->text('message');
            $table->enum('sender', ['admin', 'customer']);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('is_seen')->default(0);
            $table->timestamps();
        });

        // Galeri Table
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('photo_galeri');
            $table->timestamps();
        });

        // Hima Table
        Schema::create('hima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_hima');
            $table->string('logo_hima');
            $table->timestamps();
        });

        // Sponsor Table
        Schema::create('sponsor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_sponsor');
            $table->string('logo_sponsor');
            $table->timestamps();
        });

        // Dokumentasi Table
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('photo_dokum');
            $table->string('judul_dokum');
            $table->string('jenis_dokum');
            $table->text('deskripsi_dokum');
            $table->timestamps();
        });

        // Youtube Table
        Schema::create('youtube', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_youtube');
            $table->string('link_youtube');
            $table->timestamps();
        });

        // Materi Table
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('judul_materi');
            $table->text('deskripsi_materi');
            $table->text('isi_materi');
            $table->timestamps();
        });

        // Password Reset Tokens Table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Sessions Table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('materi');
        Schema::dropIfExists('youtube');
        Schema::dropIfExists('dokumentasi');
        Schema::dropIfExists('sponsor');
        Schema::dropIfExists('hima');
        Schema::dropIfExists('galeri');
        Schema::dropIfExists('pesan');
        Schema::dropIfExists('users');
        Schema::dropIfExists('mahasiswa');
        Schema::dropIfExists('kelompok');
        Schema::dropIfExists('prodi');
    }
};

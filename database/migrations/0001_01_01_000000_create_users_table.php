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
            $table->string('nama_prodi')->unique();
            $table->timestamps();
        });

        // Gardana Table
        Schema::create('gardana', function (Blueprint $table) {
            $table->id();
            $table->string('nama_gardana');
            $table->string('link_wa');
            $table->timestamps();
        });

        // Kelompok Table
        Schema::create('kelompok', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok')->unique();
            $table->unsignedBigInteger('gardana_id');
            $table->foreign('gardana_id')->references('id')->on('gardana');
            $table->timestamps();
        });

        // Skill Table
        Schema::create('skill', function (Blueprint $table) {
            $table->id();
            $table->string('nama_skill');
            $table->timestamps();
        });

        // Mahasiswa Table
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->index('nama_mahasiswa');
            $table->string('nama_mahasiswa');
            $table->string('no_telp')->nullable();
            $table->string('nama_prodi');
            $table->string('nama_kelompok');
            $table->foreign('nama_prodi')->references('nama_prodi')->on('prodi')->onUpdate('cascade');
            $table->foreign('nama_kelompok')->references('nama_kelompok')->on('kelompok')->onUpdate('cascade');
            $table->timestamps();
        });


        // Users Table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->nullable()->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('nama_mahasiswa')->nullable()->unique();
            $table->unsignedBigInteger('mahasiswa_id')->nullable();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('set null');
            $table->rememberToken();
            $table->timestamps();
        });

        // Chats Room
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_id');
            $table->timestamps();
            $table->integer('unseen_messages')->default(0);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('admin_id')->references('id')->on('users');
        });

        // Pesan Table
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('user_id');
            $table->text('message');
            $table->boolean('is_seen')->default(1);
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });

        // Keterangan Table
        Schema::create('keterangan', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi_skill');
            $table->string('photo_piagam')->nullable();
            $table->foreignId('skill_id')->constrained('skill');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa');
            $table->timestamps();
        });

        // FAQ Table
        Schema::create('faq', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('pertanyaan');
            $table->text('jawaban');
            $table->timestamps();
        });

        // Galeri Table
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('photo_galeri');
            $table->timestamps();
        });

        // Hima Table
        Schema::create('hima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama_hima');
            $table->string('logo_hima');
            $table->timestamps();
        });

        // Sponsor Table
        Schema::create('sponsor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama_sponsor');
            $table->string('logo_sponsor');
            $table->timestamps();
        });

        // Dokumentasi Table
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('photo_dokum');
            $table->string('judul_dokum');
            $table->text('deskripsi_dokum');
            $table->timestamps();
        });

        // Youtube Table
        Schema::create('youtube', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('judul_youtube');
            $table->string('link_youtube');
            $table->text('deskripsi_youtube');
            $table->timestamps();
        });

        // Link Materi Table
        Schema::create('link_materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('judul_file');
            $table->string('link_drive');
            $table->timestamps();
        });

        // Materi Table
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
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

        // Feedback Table
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->text('feedback');
            $table->timestamps();
        });

        // Sertifikat Table
        Schema::create('sertifikat_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa')->unique();
            $table->string('nama_file');
            $table->timestamps();

            $table->foreign('nama_mahasiswa')->references('nama_mahasiswa')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables that have foreign keys referencing users
        Schema::dropIfExists('messages');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('galeri');
        Schema::dropIfExists('hima');
        Schema::dropIfExists('sponsor');
        Schema::dropIfExists('dokumentasi');
        Schema::dropIfExists('youtube');
        Schema::dropIfExists('link_materi');
        Schema::dropIfExists('materi');
        Schema::dropIfExists('gardana');
        Schema::dropIfExists('sessions');

        // Drop users table after dependent tables are dropped
        Schema::dropIfExists('users');

        // Drop tables that are dependent on users
        Schema::dropIfExists('keterangan');
        Schema::dropIfExists('mahasiswa');
        Schema::dropIfExists('kelompok');
        Schema::dropIfExists('prodi');
        Schema::dropIfExists('skill');
        Schema::dropIfExists('feedback');
        Schema::dropIfExists('password_reset_tokens');
    }
};

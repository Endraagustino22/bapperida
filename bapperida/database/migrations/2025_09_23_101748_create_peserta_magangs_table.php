<?php

// database/migrations/2025_09_23_000001_create_peserta_magang_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('peserta_magang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nim')->nullable();
            $table->string('nama');
            $table->string('universitas');
            $table->string('jurusan');
            $table->string('no_hp');
            $table->text('alamat')->nullable();
            $table->string('cv_file')->nullable();
            $table->string('surat_pengantar')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->string('alasan_penolakan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('peserta_magang');
    }
};

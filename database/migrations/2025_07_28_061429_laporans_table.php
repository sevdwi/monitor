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
// database/migrations/xxxx_create_laporans_table.php
        Schema::create('opds', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode')->nullable();
            $table->timestamps();
        });

        Schema::create('lokasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('koordinat')->nullable();
            $table->foreignId('opd_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->enum('status_pekerjaan', ['belum', 'proses', 'selesai', 'tertunda']);
            $table->datetime('mulai_pekerjaan');
            $table->datetime('selesai_pekerjaan')->nullable();
            $table->text('deskripsi');
            $table->string('bukti_dukung')->nullable();
            $table->string('bukti_url')->nullable();
            $table->foreignId('opd_id')->constrained()->onDelete('cascade');
            $table->foreignId('lokasi_id')->constrained()->onDelete('cascade');
            $table->enum('kategori', ['aplikasi', 'infrastruktur', 'jaringan']);
            $table->text('analisis_masalah')->nullable();
            $table->text('solusi')->nullable();
            $table->boolean('penggunaan_perangkat')->default(false);
            $table->string('perangkat')->nullable();
            $table->enum('status_perangkat', ['baru', 'bekas'])->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

// Pivot untuk PIC
        Schema::create('laporan_pic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });

// Tabel kolaborator (vendor/pihak ketiga)
        Schema::create('kolaborators', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('instansi')->nullable();
            $table->string('kontak')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kolaborators'); // bisa dihapus juga kalau sudah nggak dipakai
        Schema::dropIfExists('laporan_pic');
        Schema::dropIfExists('laporans');
        Schema::dropIfExists('lokasis');
        Schema::dropIfExists('opds');
    }

};

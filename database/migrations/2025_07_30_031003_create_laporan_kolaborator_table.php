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
        Schema::create('laporan_kolaborator', function (Blueprint $table) {
            $table->unsignedBigInteger('laporan_id');
            $table->unsignedBigInteger('kolaborator_id');

            $table->foreign('laporan_id')->references('id')->on('laporans')->onDelete('cascade');
            $table->foreign('kolaborator_id')->references('id')->on('kolaborators')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kolaborator');
    }
};

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
        Schema::create('perserta_lombas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daftar_sekolah_id')->constrained();
            $table->foreignId('kategori_lomba_id')->constrained();
            $table->integer('no_perserta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perserta_lombas');
    }
};

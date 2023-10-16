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
        Schema::create('laporan', function (Blueprint $table) {
            $table->integer('id_laporan')->autoIncrement();
            $table->string('file_upload');
            $table->integer('nis');
            $table->datetime('bukti_pemeriksaan');
            $table->datetime('tanggal_pengumpulan');
            $table->string('checkbox');
            $table->string('review');
            $table->integer('angkatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};

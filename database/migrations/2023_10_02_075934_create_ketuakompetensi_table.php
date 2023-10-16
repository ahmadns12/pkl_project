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
        Schema::create('ketuakompetensi', function (Blueprint $table) {
            $table->integer('id_kakom')->primary();
            $table->integer('nip');
            $table->integer('nik');
            $table->string('nama_ketuakompetensi');
            $table->string('jabatan');
            $table->integer('kd_jurusan');
            $table->integer('angkatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ketuakompetensi');
    }
};

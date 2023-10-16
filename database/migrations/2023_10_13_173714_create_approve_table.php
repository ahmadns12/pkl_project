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
        Schema::create('formulir', function (Blueprint $table) {
            $table->integer('id_formulir')->autoIncrement();
            $table->integer('nis');
            $table->string('nama_lengkap');
            $table->string('alamat_siswa');
            $table->string('no_hp');
            $table->string('no_ortu');
            $table->string('umur');
            $table->string('posisi');
            $table->string('jurusan');
            // Atribut nama_perusahaan ganti menjadi id_perusahaan kalau udh direlasikan!!
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');    
            $table->integer('approve_hubin');
            $table->integer('id_hubin')->nullable();
            $table->integer('approve_kurikulum');
            $table->integer('id_kurikulum')->nullable();
            $table->integer('approve_kakom');
            $table->integer('id_kakom')->nullable();
            $table->integer('angkatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approve');
    }
};

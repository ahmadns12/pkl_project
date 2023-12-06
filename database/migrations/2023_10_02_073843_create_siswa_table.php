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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->integer('id_guru')->nullable();
            $table->integer('id_siswadetail');
            $table->integer('id_jurusan');
            $table->integer('id_formulir')->nullable();
            $table->integer('id_angkatan');
            $table->string('nis');
            $table->string('nomor_telepon');
            $table->string('gambar_siswa')->nullable();
            $table->string('nama_siswa');
            $table->string('alamat');
            $table->enum('jenis_kelamin', ['l','p'])->default('l');
            $table->integer('status');
            $table->integer('sudah_memilih');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};

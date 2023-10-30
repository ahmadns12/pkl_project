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
        Schema::create('guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->integer('id_pembimbing')->nullable();
            $table->string('nip');
            $table->string('nik');
            $table->string('nama_guru');
            $table->string('jabatan');
            $table->string('gambar_guru')->nullable();
            $table->string('jurusan')->nullable();
            $table->enum('jenis_kelamin', ['l','p'])->default('l');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};

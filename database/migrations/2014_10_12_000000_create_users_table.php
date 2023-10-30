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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('id_siswa')->nullable();
            $table->integer('id_guru')->nullable();
            $table->integer('is_choosen')->nullable();
            $table->enum('role',['hubin','kurikulum','kakom','superadmin','siswa','pembimbing'])->default('siswa');
            $table->integer('angkatan');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
            $table->id('id_formulir');
            $table->integer('id_siswa');
            $table->integer('id_perusahaan');
            $table->string('posisi');
            $table->integer('approve_hubin');
            $table->integer('id_hubin')->nullable();
            $table->integer('approve_kurikulum');
            $table->integer('id_kurikulum')->nullable();
            $table->integer('approve_kakom');
            $table->integer('id_kakom')->nullable();
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

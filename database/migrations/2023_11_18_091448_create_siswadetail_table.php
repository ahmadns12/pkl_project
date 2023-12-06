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
        Schema::create('siswadetail', function (Blueprint $table) {
            $table->id('id_siswadetail');
            $table->string('nama_bapak');
            $table->string('nama_ibu');
            $table->string('pekerjaan_bapak');
            $table->string('pekerjaan_ibu');
            $table->string('nomor_telepon_bapak');
            $table->string('nomor_telepon_ibu');
            $table->string('umur');
            $table->string('umur_bapak');
            $table->string('umur_ibu');
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswadetail');
    }
};

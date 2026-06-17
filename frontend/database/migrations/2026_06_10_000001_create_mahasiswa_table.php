<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id('id_mahasiswa');
            $table->string('nama_lengkap');
            $table->string('universitas');
            $table->string('prodi');
            $table->string('jenis_kelamin');
            $table->integer('usia');
            $table->string('semester');
            $table->string('status_ta');
            $table->string('jam_tidur');
            $table->string('bekerja');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};

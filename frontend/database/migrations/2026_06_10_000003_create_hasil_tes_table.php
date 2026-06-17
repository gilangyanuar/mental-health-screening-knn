<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_tes', function (Blueprint $table) {
            $table->id('id_hasil');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->dateTime('tanggal_tes')->useCurrent();
            $table->integer('total_skor_stres')->default(0);
            $table->integer('total_skor_kecemasan')->default(0);
            $table->integer('total_skor_depresi')->default(0);
            $table->string('label_knn');    // Normal/Ringan/Sedang/Berat/Sangat Berat
            $table->string('dimensi_dominan'); // Stres / Kecemasan / Depresi
            $table->string('jenis_data')->default('testing');
            $table->timestamps();

            $table->foreign('id_mahasiswa')
                  ->references('id_mahasiswa')
                  ->on('mahasiswa')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_tes');
    }
};

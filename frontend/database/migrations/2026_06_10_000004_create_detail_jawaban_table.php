<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_jawaban', function (Blueprint $table) {
            $table->id('id_detail');
            $table->unsignedBigInteger('id_hasil');
            $table->unsignedBigInteger('id_pertanyaan');
            $table->integer('skor_jawaban'); // 0, 1, 2, 3
            $table->timestamps();

            $table->foreign('id_hasil')
                  ->references('id_hasil')
                  ->on('hasil_tes')
                  ->onDelete('cascade');

            $table->foreign('id_pertanyaan')
                  ->references('id_pertanyaan')
                  ->on('pertanyaan')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_jawaban');
    }
};

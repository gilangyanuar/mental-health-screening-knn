<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations
     */
    public function up(): void
    {
        Schema::table('jawaban_dass', function (Blueprint $table) {

            $table->string('nama_lengkap')->nullable();

            $table->string('universitas')->nullable();

            $table->string('prodi')->nullable();

            $table->string('jenis_kelamin')->nullable();

            $table->string('semester')->nullable();

            $table->integer('usia')->nullable();

            $table->string('status_ta')->nullable();

            $table->string('jam_tidur')->nullable();

            $table->string('bekerja')->nullable();

        });
    }

    /**
     * Reverse migrations
     */
    public function down(): void
    {
        Schema::table('jawaban_dass', function (Blueprint $table) {

            $table->dropColumn([

                'nama_lengkap',
                'universitas',
                'prodi',
                'jenis_kelamin',
                'semester',
                'usia',
                'status_ta',
                'jam_tidur',
                'bekerja'

            ]);

        });
    }
};
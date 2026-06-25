<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Mengubah kolom dimensi_dominan pada tabel hasil_tes menjadi nullable.
     * Diperlukan karena responden dengan skor stres, kecemasan, dan depresi
     * yang semuanya 0 (atau seri/sama tinggi) tidak memiliki dimensi yang
     * benar-benar dominan, sehingga nilainya harus boleh NULL.
     */
    public function up(): void
    {
        Schema::table('hasil_tes', function (Blueprint $table) {
            $table->string('dimensi_dominan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hasil_tes', function (Blueprint $table) {
            $table->string('dimensi_dominan')->nullable(false)->change();
        });
    }
};
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
        if (! Schema::hasTable('jawaban_dass')) {
            return;
        }

        Schema::table('jawaban_dass', function (Blueprint $table) {

            if (! Schema::hasColumn('jawaban_dass', 'nama_lengkap')) {
                $table->string('nama_lengkap')->nullable();
            }

            if (! Schema::hasColumn('jawaban_dass', 'universitas')) {
                $table->string('universitas')->nullable();
            }

            if (! Schema::hasColumn('jawaban_dass', 'prodi')) {
                $table->string('prodi')->nullable();
            }

            if (! Schema::hasColumn('jawaban_dass', 'jenis_kelamin')) {
                $table->string('jenis_kelamin')->nullable();
            }

            if (! Schema::hasColumn('jawaban_dass', 'semester')) {
                $table->string('semester')->nullable();
            }

            if (! Schema::hasColumn('jawaban_dass', 'usia')) {
                $table->integer('usia')->nullable();
            }

            if (! Schema::hasColumn('jawaban_dass', 'status_ta')) {
                $table->string('status_ta')->nullable();
            }

            if (! Schema::hasColumn('jawaban_dass', 'jam_tidur')) {
                $table->string('jam_tidur')->nullable();
            }

            if (! Schema::hasColumn('jawaban_dass', 'bekerja')) {
                $table->string('bekerja')->nullable();
            }

        });
    }

    /**
     * Reverse migrations
     */
    public function down(): void
    {
        if (! Schema::hasTable('jawaban_dass')) {
            return;
        }

        $columns = array_filter([
            Schema::hasColumn('jawaban_dass', 'nama_lengkap') ? 'nama_lengkap' : null,
            Schema::hasColumn('jawaban_dass', 'universitas') ? 'universitas' : null,
            Schema::hasColumn('jawaban_dass', 'prodi') ? 'prodi' : null,
            Schema::hasColumn('jawaban_dass', 'jenis_kelamin') ? 'jenis_kelamin' : null,
            Schema::hasColumn('jawaban_dass', 'semester') ? 'semester' : null,
            Schema::hasColumn('jawaban_dass', 'usia') ? 'usia' : null,
            Schema::hasColumn('jawaban_dass', 'status_ta') ? 'status_ta' : null,
            Schema::hasColumn('jawaban_dass', 'jam_tidur') ? 'jam_tidur' : null,
            Schema::hasColumn('jawaban_dass', 'bekerja') ? 'bekerja' : null,
        ]);

        if ($columns === []) {
            return;
        }

        Schema::table('jawaban_dass', function (Blueprint $table) use ($columns) {

            $table->dropColumn($columns);

        });
    }
};

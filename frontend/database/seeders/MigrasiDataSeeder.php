<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Pindahkan semua data lama dari jawaban_dass
 * ke 3 tabel baru: mahasiswa, hasil_tes, detail_jawaban
 *
 * Jalankan SETELAH PertanyaanSeeder:
 *   php artisan db:seed --class=PertanyaanSeeder
 *   php artisan db:seed --class=MigrasiDataSeeder
 */
class MigrasiDataSeeder extends Seeder
{
    public function run(): void
    {
        $kodeToId = DB::table('pertanyaan')
            ->pluck('id_pertanyaan', 'kode_pertanyaan')
            ->toArray();

        $dataLama = DB::table('jawaban_dass')->get();

        foreach ($dataLama as $row) {

            // Hitung dimensi dominan dari skor
            $scores = [
                'Stres'     => $row->skor_stres     ?? 0,
                'Kecemasan' => $row->skor_kecemasan ?? 0,
                'Depresi'   => $row->skor_depresi   ?? 0,
            ];
            $dimensiDominan = array_search(max($scores), $scores);

            // 1. Simpan ke mahasiswa
            $idMahasiswa = DB::table('mahasiswa')->insertGetId([
                'nama_lengkap'  => $row->nama_lengkap  ?? 'Anonymous',
                'universitas'   => $row->universitas   ?? '-',
                'prodi'         => $row->prodi         ?? '-',
                'jenis_kelamin' => $row->jenis_kelamin ?? '-',
                'usia'          => $row->usia          ?? 0,
                'semester'      => $row->semester      ?? '-',
                'status_ta'     => $row->status_ta     ?? '-',
                'jam_tidur'     => $row->jam_tidur     ?? '-',
                'bekerja'       => $row->bekerja       ?? '-',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            // 2. Simpan ke hasil_tes
            $idHasil = DB::table('hasil_tes')->insertGetId([
                'id_mahasiswa'        => $idMahasiswa,
                'tanggal_tes'         => $row->created_at ?? now(),
                'total_skor_stres'    => $row->skor_stres     ?? 0,
                'total_skor_kecemasan'=> $row->skor_kecemasan ?? 0,
                'total_skor_depresi'  => $row->skor_depresi   ?? 0,
                'label_knn'           => $row->hasil_knn      ?? 'Normal',
                'dimensi_dominan'     => $dimensiDominan,
                'jenis_data'          => 'testing',
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);

            // 3. Simpan ke detail_jawaban (Q1-Q21)
            for ($i = 1; $i <= 21; $i++) {
                $kode = 'Q' . $i;
                $kolom = 'q' . $i;
                $idPertanyaan = $kodeToId[$kode] ?? null;

                if ($idPertanyaan) {
                    DB::table('detail_jawaban')->insert([
                        'id_hasil'      => $idHasil,
                        'id_pertanyaan' => $idPertanyaan,
                        'skor_jawaban'  => isset($row->$kolom) ? (int)$row->$kolom : 0,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]);
                }
            }
        }

        $this->command->info('Selesai! ' . count($dataLama) . ' baris dipindahkan dari jawaban_dass.');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertanyaanSeeder extends Seeder
{
    public function run(): void
    {
        // Mapping soal DASS-21 sesuai urutan Q1-Q21
        // Sesuaikan teks dengan yang tampil di assessment.js kamu
        $data = [
            ['kode' => 'Q1',  'kategori' => 'Stres',     'teks' => 'Saya merasa sulit untuk tenang.'],
            ['kode' => 'Q2',  'kategori' => 'Kecemasan', 'teks' => 'Saya menyadari mulut saya terasa kering.'],
            ['kode' => 'Q3',  'kategori' => 'Depresi',   'teks' => 'Saya tidak dapat merasakan perasaan positif sama sekali.'],
            ['kode' => 'Q4',  'kategori' => 'Kecemasan', 'teks' => 'Saya mengalami gangguan pernapasan tanpa sebab fisik.'],
            ['kode' => 'Q5',  'kategori' => 'Depresi',   'teks' => 'Saya merasa tidak mampu berinisiatif untuk melakukan sesuatu.'],
            ['kode' => 'Q6',  'kategori' => 'Stres',     'teks' => 'Saya cenderung bereaksi berlebihan terhadap suatu situasi.'],
            ['kode' => 'Q7',  'kategori' => 'Kecemasan', 'teks' => 'Saya mengalami gemetar (tangan, tubuh).'],
            ['kode' => 'Q8',  'kategori' => 'Stres',     'teks' => 'Saya merasa banyak menghabiskan energi karena cemas.'],
            ['kode' => 'Q9',  'kategori' => 'Kecemasan', 'teks' => 'Saya merasa khawatir dengan situasi di mana saya mungkin panik.'],
            ['kode' => 'Q10', 'kategori' => 'Depresi',   'teks' => 'Saya merasa tidak ada yang dapat saya harapkan di masa depan.'],
            ['kode' => 'Q11', 'kategori' => 'Stres',     'teks' => 'Saya merasa gelisah.'],
            ['kode' => 'Q12', 'kategori' => 'Stres',     'teks' => 'Saya merasa sulit untuk bersantai.'],
            ['kode' => 'Q13', 'kategori' => 'Depresi',   'teks' => 'Saya merasa sedih dan murung.'],
            ['kode' => 'Q14', 'kategori' => 'Stres',     'teks' => 'Saya tidak dapat mentoleransi hal-hal yang menghalangi saya.'],
            ['kode' => 'Q15', 'kategori' => 'Kecemasan', 'teks' => 'Saya merasa hampir panik.'],
            ['kode' => 'Q16', 'kategori' => 'Depresi',   'teks' => 'Saya tidak dapat merasakan antusias terhadap apapun.'],
            ['kode' => 'Q17', 'kategori' => 'Depresi',   'teks' => 'Saya merasa diri saya tidak berharga.'],
            ['kode' => 'Q18', 'kategori' => 'Stres',     'teks' => 'Saya merasa mudah tersinggung.'],
            ['kode' => 'Q19', 'kategori' => 'Kecemasan', 'teks' => 'Saya menyadari detak jantung saya tanpa melakukan aktivitas fisik.'],
            ['kode' => 'Q20', 'kategori' => 'Kecemasan', 'teks' => 'Saya merasa takut tanpa alasan yang jelas.'],
            ['kode' => 'Q21', 'kategori' => 'Depresi',   'teks' => 'Saya tidak dapat melihat hal yang positif dari suatu kejadian.'],
        ];

        foreach ($data as $i => $p) {
            DB::table('pertanyaan')->insert([
                'id_pertanyaan'   => $i + 1,
                'kode_pertanyaan' => $p['kode'],
                'teks_pertanyaan' => $p['teks'],
                'kategori'        => $p['kategori'],
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
}

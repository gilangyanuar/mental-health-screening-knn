<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanDass extends Model
{
    // NAMA TABEL
    protected $table = 'jawaban_dass';

    // AKTIFKAN created_at & updated_at
    public $timestamps = false;

    // FIELD YANG BOLEH DISIMPAN
    protected $fillable = [

        // PROFILE
        'nama_lengkap',
        'universitas',
        'prodi',
        'jenis_kelamin',
        'semester',
        'usia',
        'status_ta',
        'jam_tidur',
        'bekerja',

        // Q1 - Q21
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',

        'q8',
        'q9',
        'q10',
        'q11',
        'q12',
        'q13',
        'q14',

        'q15',
        'q16',
        'q17',
        'q18',
        'q19',
        'q20',
        'q21',

        // HASIL
        'skor_depresi',
        'skor_kecemasan',
        'skor_stres',
        'hasil_knn',

    ];
}
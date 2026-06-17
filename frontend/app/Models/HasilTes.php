<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilTes extends Model
{
    protected $table      = 'hasil_tes';
    protected $primaryKey = 'id_hasil';
    public    $timestamps = false;

    protected $fillable = [
        'id_mahasiswa',
        'total_skor_stres',
        'total_skor_kecemasan',
        'total_skor_depresi',
        'label_knn',
        'dimensi_dominan',
        'jenis_data',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function detailJawaban()
    {
        return $this->hasMany(DetailJawaban::class, 'id_hasil', 'id_hasil');
    }
}
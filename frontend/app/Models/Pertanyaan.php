<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table      = 'pertanyaan';
    protected $primaryKey = 'id_pertanyaan';
    public    $timestamps = false;

    protected $fillable = [
        'kode_pertanyaan',
        'teks_pertanyaan',
        'dimensi',
    ];

    public function detailJawaban()
    {
        return $this->hasMany(DetailJawaban::class, 'id_pertanyaan', 'id_pertanyaan');
    }
}
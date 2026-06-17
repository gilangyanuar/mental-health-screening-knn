<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailJawaban extends Model
{
    protected $table      = 'detail_jawaban';
    protected $primaryKey = 'id_detail';
    public    $timestamps = false;

    protected $fillable = [
        'id_hasil',
        'id_pertanyaan',
        'skor_jawaban',
    ];

    public function hasilTes()
    {
        return $this->belongsTo(HasilTes::class, 'id_hasil', 'id_hasil');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan', 'id_pertanyaan');
    }
}
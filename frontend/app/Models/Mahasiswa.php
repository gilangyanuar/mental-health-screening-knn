<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    public    $timestamps = false;

    protected $fillable = [
        'nama_lengkap',
        'universitas',
        'prodi',
        'jenis_kelamin',
        'usia',
        'semester',
        'status_ta',
        'jam_tidur',
        'bekerja',
    ];

    public function hasilTes()
    {
        return $this->hasMany(HasilTes::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}
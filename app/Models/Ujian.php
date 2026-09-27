<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $table = 'ujians';

    protected $fillable = [
        'nama_ujian',
        'deskripsi',
        'durasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }

    public function hasilUjians()
    {
        return $this->hasMany(HasilUjian::class);
    }
}
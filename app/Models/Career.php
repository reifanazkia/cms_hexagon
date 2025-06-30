<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'career'; // pakai nama tabel sesuai database

    protected $fillable = [
        'lowong_krj',
        'ket_lowong',
        'tipe',
    ];

    protected $casts = [
        'ket_lowong' => 'array', // ini penting agar otomatis diconvert dari/ke JSON
    ];
}

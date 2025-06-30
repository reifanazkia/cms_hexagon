<?php

// app/Models/News.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table      = 'news';
    protected $primaryKey = 'news_id';   // <-- tambahkan

    // kalau kolomnya integer dan auto-increment (ya)
    public $incrementing = true;
    protected $keyType   = 'int';

    protected $fillable = [
        'category_id',
        'judul_news',
        'ket_news',
        // ...tambahan lain
    ];
}

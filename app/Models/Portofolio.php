<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';
    protected $primaryKey = 'portofolio_id';

    protected $fillable = [
        'category_id',
        'judul_porto',
        'ket_porto',
        'url_youtube'
    ];

    public function photos()
    {
        return $this->hasMany(FotoPorto::class, 'project_id', 'portofolio_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}

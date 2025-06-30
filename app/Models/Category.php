<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table      = 'category';
    protected $primaryKey = 'category_id';
    public    $timestamps = false;          // ubah ke true jika nanti pakai kolom timestamp

    protected $fillable   = ['nama_category'];

    /* relasi: 1 kategori → banyak portfolio */
    public function portfolios()
    {
        return $this->hasMany(Portofolio::class, 'category_id', 'category_id');
    }
}

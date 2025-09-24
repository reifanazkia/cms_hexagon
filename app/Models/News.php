<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'news_id';
    public $timestamps = true;

    protected $fillable = [
        'judul_news',
        'category_id',
        'ket_news',
        'url_youtube',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship with Foto model
     * One news can have many photos
     */
    public function fotos()
    {
        return $this->hasMany(FotoNews::class, 'news_id', 'news_id');
    }

    /**
     * Get the first photo of the news
     */
    public function getFirstPhotoAttribute()
    {
        return $this->fotos->first();
    }

    /**
     * Get categories as array
     */
    public function getCategoriesArrayAttribute()
    {
        return $this->category_id ? explode(',', $this->category_id) : [];
    }

    /**
     * Scope to filter by category
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category_id', 'like', "%{$category}%");
    }

    /**
     * Scope to search by title or content
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('judul_news', 'like', "%{$search}%")
              ->orWhere('ket_news', 'like', "%{$search}%");
        });
    }
}

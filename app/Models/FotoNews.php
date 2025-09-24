<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FotoNews extends Model
{
    use HasFactory;

    protected $table = 'fotonews';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'news_id',
        'nama_foto',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship with News model
     * Each photo belongs to one news
     */
    public function news()
    {
        return $this->belongsTo(News::class, 'news_id', 'news_id');
    }

    /**
     * Get full URL of the photo
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->nama_foto) {
            return Storage::disk('public')->url($this->nama_foto);
        }
        return null;
    }

    /**
     * Check if photo file exists
     */
    public function photoExists()
    {
        return $this->nama_foto && Storage::disk('public')->exists($this->nama_foto);
    }

    /**
     * Delete photo file from storage
     */
    public function deletePhotoFile()
    {
        if ($this->nama_foto && Storage::disk('public')->exists($this->nama_foto)) {
            return Storage::disk('public')->delete($this->nama_foto);
        }
        return false;
    }
}

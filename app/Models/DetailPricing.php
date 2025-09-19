<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPricing extends Model
{
    use HasFactory;

    protected $table = 'detail_pricings';

    protected $fillable = [
        'id_pricings',
        'name',
        'deskripsi',
        'status',
    ];

    /**
     * Relasi ke Pricing (many to one).
     */
    public function pricing()
    {
        return $this->belongsTo(Pricing::class, 'id_pricings');
    }
}

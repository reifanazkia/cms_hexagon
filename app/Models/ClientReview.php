<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientReview extends Model
{
    protected $table = 'client_review';

    protected $fillable = [
        'nama',
        'dari',
        'review',
        'foto'
    ];

    public $timestamps = true;
}

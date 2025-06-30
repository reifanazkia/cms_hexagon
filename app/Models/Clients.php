<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = 'about_client';

    protected $fillable = [
        'name',
        'foto_client',
        'status',
    ];
}
    
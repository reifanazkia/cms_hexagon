<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $table = 'values';
    protected $fillable = [
        
        'type',
        'value',

    ];
}

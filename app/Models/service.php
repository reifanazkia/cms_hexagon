<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    
    protected $table = 'benefits';

    protected $fillable = [

        'title',
        'subtitle'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    protected $table = 'communication';

    protected $fillable = [

        'fullName',
        'email',
        'subject',
        'message'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    protected $table = 'vision_mission';

    protected $fillable = [
        
        'type',
        'value'
    ];

    public $timestamps = true;
}

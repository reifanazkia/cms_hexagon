<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    protected $table = 'about';
    protected $fillable = [
        'youtube_url',
        'journey_title',
        'journey_text_1',
        'journey_text_2',
        'philosophy',
    ];
    public $timestamps = false;
}

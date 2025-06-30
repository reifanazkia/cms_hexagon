<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutTeam extends Model
{
    protected $table = 'about_team';

    protected $fillable = [
        'foto_orang',
        'nama_orang',
        'jabatan',
        'link_ig',
        'link_in',
        'link_fb',
        'link_twt',
    ];
}

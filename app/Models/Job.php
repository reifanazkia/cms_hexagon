<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job_applications';

    protected $fillable = [
        'job_id',
        'full_name',
        'email',
        'phone',
        'position',
        'summary',
        'resume_path',
        'created_at',
        'updated_at',
    ];
}

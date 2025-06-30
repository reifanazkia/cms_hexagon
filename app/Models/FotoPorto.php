<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FotoPorto extends Model
{
    use HasFactory;

    protected $table = 'foto_porto';

    protected $fillable = [
        'nama_foto',
        'project_id'
    ];

    /* relasi: foto milik satu portfolio */
    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class, 'project_id', 'portofolio_id');
    }
}

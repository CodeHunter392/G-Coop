<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;
    protected $fillable = [
        'projet_id',
        'nom',
        'description',
        'date',
        'responsable',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}

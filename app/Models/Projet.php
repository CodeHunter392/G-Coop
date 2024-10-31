<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'organisme_id',
        'nom',
        'description',
        'date_debut',
        'date_fin',
        'budget',
    ];

    public function organisme()
    {
        return $this->belongsTo(Organisme::class);
    }

    public function activites()
    {
        return $this->hasMany(Activite::class);
    }
}

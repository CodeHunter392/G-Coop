<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneProgramme extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'echeance',
        'montant',
    ];

    public function ligneCoops()
    {
        return $this->hasMany(LigneCoop::class);
    }
    public function objectifs(){
        return $this->hasMany(ObjectifLigneProgramme::class,'ligne_programme_id');
    }

}
